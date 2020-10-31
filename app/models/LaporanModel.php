<?php
/**
 * LaporanModel
 */
class LaporanModel extends dsModel
{
    public function __construct()
    {
    }

    // Demo function
    public function getLaporan($fill)
    {
        $fill_by = '%d %m %y'; // Berdasar tanggal
        switch ($fill['berdasar']) {
            case 'bulan':
                $fill_by = '%M %y'; // bulan
                break;
            case 'tahun':
                $fill_by = '%y'; // tahun
                break;
            
            default:break;
        }
        return $this->select([
                    "DATE_FORMAT(a.tanggal_masuk, '$fill_by')" => "tanggal",
                    'j.jenis' => 'jenis',
                    'COUNT(a.id_pelayanan)' => 'hasil',
                    'COUNT(laki.no_bpjs)' => 'tlaki',
                    'COUNT(perempuan.no_bpjs)' => 'tperempuan',
                    'SUM(IF(a.triase = \'merah\', 1, 0)) as triase_merah',
                    'SUM(IF(a.triase = \'kuning\', 1, 0)) as triase_kuning'
                ],
                'pelayanan a')
                ->left_join('jenis_tindakan j', [
                        'j.id' => 'a.id_jenis_tindakan'
                    ])
                ->left_join('pasien laki', [
                        'laki.no_bpjs'          => 'a.no_bpjs',
                        'laki.jenis_kelamin'    => 0
                    ])
                ->left_join('pasien perempuan', [
                        'perempuan.no_bpjs'     => 'a.no_bpjs',
                        'perempuan.jenis_kelamin' => 1
                    ])
                ->greater_equal('a.tanggal_masuk', $fill['dari'])
                ->lower_equal('a.tanggal_masuk', $fill['sampai'])
                ->groupBy("j.jenis, DATE_FORMAT(a.tanggal_masuk, '$fill_by')")
                ->asc("DATE_FORMAT(a.tanggal_masuk, '$fill_by'),j.jenis")
                ->get_all();

        // $merah = $this->select([
        //     "date_format(tanggal_masuk, '$fill_by')" => 'tanggal',
        //     'triase',
        //     'count(id_pelayanan)' => 'merah'
        // ],'pelayanan')
        // ->where('triase', 'merah')
        // ->groupBy("date_format(tanggal_masuk, '$fill_by'),triase")
        // ->get_query();

        // $kuning = $this->select([
        //     "date_format(tanggal_masuk, '$fill_by')" => 'tanggal',
        //     'triase',
        //     'count(id_pelayanan)' => 'kuning'
        // ],'pelayanan')
        // ->where('triase', 'kuning')
        // ->groupBy("date_format(tanggal_masuk, '$fill_by') ,triase")
        // ->get_query();

        // return $this->select([
        //             "DATE_FORMAT(a.tanggal_masuk, '$fill_by')" => "tanggal",
        //             'j.jenis' => 'tJenis',
        //             'COUNT(a.id_pelayanan)' => 'hasil',
        //             'COUNT(laki.no_bpjs)' => 'tlaki',
        //             'COUNT(perempuan.no_bpjs)' => 'tperempuan',
        //             'MAX(tmerah.merah) as triase_merah',
        //             'MAX(tkuning.kuning) as triase_kuning'
        //         ],
        //         'pelayanan a')
        //         ->left_join('pasien laki', [
        //                 'laki.no_bpjs'          => 'a.no_bpjs',
        //                 'laki.jenis_kelamin'    => 0
        //             ])
        //         ->left_join('pasien perempuan', [
        //                 'perempuan.no_bpjs'     => 'a.no_bpjs',
        //                 'perempuan.jenis_kelamin' => 1
        //             ])
        //         ->left_join("($merah) tmerah", [
        //             "tmerah.tanggal" => "DATE_FORMAT(a.tanggal_masuk, '$fill_by')"
        //         ])
        //         ->left_join("($kuning) tkuning", [
        //             "tkuning.tanggal" => "DATE_FORMAT(a.tanggal_masuk, '$fill_by')"
        //         ])
        //         ->left_join('jenis_tindakan j', [
        //                 'j.id' => 'a.id_jenis_tindakan',
        //             ])
        //         ->greater_equal('a.tanggal_masuk', $fill['dari'])
        //         ->lower_equal('a.tanggal_masuk', $fill['sampai'])
        //         ->groupBy("DATE_FORMAT(a.tanggal_masuk, '$fill_by'), j.jenis")
        // ->get_all();
    }
}
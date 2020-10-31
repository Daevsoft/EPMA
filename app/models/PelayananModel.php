<?php
/**
 * PelayananModel
 */
class PelayananModel extends dsModel
{
    public function __construct()
    {
    }

    // Demo function
    public function insertData(&$pelayanan)
    {
        return $this->insert_get('pelayanan', $pelayanan)->get_row();
    }
    public function updateData(&$id_pelayanan,&$pelayanan)
    {
        $this->update('pelayanan', $pelayanan, ['id_pelayanan' => $id_pelayanan]);
        return $this->getData($id_pelayanan);
    }
    public function getPoli()
    {
        return $this->distinct('poli', 'pelayanan')->get_all();
    }
    public function getHistoryPasien($bpjs)
    {
        return $this->select([
                        'a.*',
                        'b.*',
                        'd.nama_pegawai' => 'nama_dokter',
                        'p.nama_pegawai' => 'nama_perawat',
                        'j.jenis' => 'jenis_tindakan'
                    ], 'pelayanan a')
                    ->join('pasien b', 'a.no_bpjs = b.no_bpjs')
                    ->left_join('pegawai d', [
                            'd.id_pegawai' => 'a.id_dokter',
                            'd.posisi' => "'dokter'"
                        ])
                    ->left_join('pegawai p', [
                            'p.id_pegawai' => 'a.id_perawat',
                            'p.posisi' => "'perawat'"
                        ])
                    ->left_join('jenis_tindakan j', [
                            'j.id' => 'a.id_jenis_tindakan',
                        ])
                    ->where('a.no_bpjs', $bpjs)
                    ->get_all();
    }
    public function getData($id_pelayanan)
    {
        return $this->select([
                        'a.*',
                        'b.*',
                        'd.nama_pegawai' => 'nama_dokter',
                        'p.nama_pegawai' => 'nama_perawat',
                        'j.jenis' => 'jenis_tindakan'
                    ], 'pelayanan a')
                    ->join('pasien b', 'a.no_bpjs = b.no_bpjs')
                    ->left_join('pegawai d', [
                            'd.id_pegawai' => 'a.id_dokter',
                            'd.posisi' => "'dokter'"
                        ])
                    ->left_join('pegawai p', [
                            'p.id_pegawai' => 'a.id_perawat',
                            'p.posisi' => "'perawat'"
                        ])
                    ->left_join('jenis_tindakan j', [
                            'j.id' => 'a.id_jenis_tindakan',
                        ])
                    ->where('a.id_pelayanan='.$id_pelayanan)
                    ->get_row();
    }
    public function getJenisTindakan()
    {
        return $this->select('jenis_tindakan')->get_assoc();
    }
    public function getAll()
    {
        return $this->select([
                        'a.*',
                        'b.*',
                        'd.nama_pegawai' => 'nama_dokter',
                        'p.nama_pegawai' => 'nama_perawat',
                        'j.jenis' => 'jenis_tindakan'
                    ], 'pelayanan a')
                    ->join('pasien b', 'a.no_bpjs = b.no_bpjs')
                    ->left_join('pegawai d', [
                            'd.id_pegawai' => 'a.id_dokter',
                            'd.posisi' => "'dokter'"
                        ])
                    ->left_join('pegawai p', [
                            'p.id_pegawai' => 'a.id_perawat',
                            'p.posisi' => "'perawat'"
                        ])
                    ->left_join('jenis_tindakan j', [
                            'j.id' => 'a.id_jenis_tindakan',
                        ])
                    ->get_assoc();
    }
    public function getAllToday()
    {
        return $this->select([
                        'a.*',
                        'b.*',
                        'd.nama_pegawai' => 'nama_dokter',
                        'p.nama_pegawai' => 'nama_perawat',
                        'j.jenis' => 'jenis_tindakan'
                    ], 'pelayanan a')
                    ->join('pasien b', 'a.no_bpjs = b.no_bpjs')
                    ->left_join('pegawai d', [
                            'd.id_pegawai' => 'a.id_dokter',
                            'd.posisi' => "'dokter'"
                        ])
                    ->left_join('pegawai p', [
                            'p.id_pegawai' => 'a.id_perawat',
                            'p.posisi' => "'perawat'"
                        ])
                    ->left_join('jenis_tindakan j', [
                            'j.id' => 'a.id_jenis_tindakan',
                        ])
                    ->greater_equal('a.tanggal_masuk', date('Y-m-d'))
                    ->asc('a.status, a.tanggal_masuk')
                    ->get_all();
    }
    public function getTodaySearch($key)
    {
        return $this->select([
                        'a.*',
                        'b.*',
                        'd.nama_pegawai' => 'nama_dokter',
                        'p.nama_pegawai' => 'nama_perawat',
                        'j.jenis' => 'jenis_tindakan'
                    ], 'pelayanan a')
                    ->join('pasien b', 'a.no_bpjs = b.no_bpjs')
                    ->left_join('pegawai d', [
                            'd.id_pegawai' => 'a.id_dokter',
                            'd.posisi' => "'dokter'"
                        ])
                    ->left_join('pegawai p', [
                            'p.id_pegawai' => 'a.id_perawat',
                            'p.posisi' => "'perawat'"
                        ])
                    ->left_join('jenis_tindakan j', [
                            'j.id' => 'a.id_jenis_tindakan',
                        ])
                    ->like([
                            'b.no_bpjs'     => $key.'%',
                            'b.nama_lengkap'=> '%'.$key.'%',
                            'b.nik'         => '%'.$key.'%'
                        ])
                    ->greater_equal('a.tanggal_masuk', date('Y-m-d'))
                    ->asc('a.status, a.tanggal_masuk')
                    ->get_all();
    }
    public function getMonitor()
    {
        return $this->select([
                        'a.*',
                        'b.*',
                        'd.nama_pegawai' => 'nama_dokter',
                        'p.nama_pegawai' => 'nama_perawat',
                        'j.jenis' => 'jenis_tindakan'
                    ], 'pelayanan a')
                    ->join('pasien b', 'a.no_bpjs = b.no_bpjs')
                    ->left_join('pegawai d', [
                            'd.id_pegawai' => 'a.id_dokter',
                            'd.posisi' => "'dokter'"
                        ])
                    ->left_join('pegawai p', [
                            'p.id_pegawai' => 'a.id_perawat',
                            'p.posisi' => "'perawat'"
                        ])
                    ->left_join('jenis_tindakan j', [
                            'j.id' => 'a.id_jenis_tindakan',
                        ])
                    ->greater_equal('a.tanggal_masuk', date('Y-m-d'))
                    ->where('a.status', '0')
                    ->asc('a.triase')
                    ->limit(0, 10)
                    ->get_all();
    }
    public function updateTindakan($pelayanan, $tindakan)
    {
        return $this->update('pelayanan', $tindakan, $pelayanan);
    }
    public function deleteData($id_pelayanan)
    {
        $this->delete('pelayanan', ['id_pelayanan' => $id_pelayanan]);
    }
    public function selesai($id_pelayanan)
    {
        $this->update('pelayanan', ['status'=>'1'], ['id_pelayanan' => $id_pelayanan]);
        return $this->getData($id_pelayanan);
    }
}
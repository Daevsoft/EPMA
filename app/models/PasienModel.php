<?php
/**
 * PasienModel
 */
class PasienModel extends dsModel
{
    public function __construct()
    {
    }

    public function insertPasien(&$pasien)
    {
        $result = false;
        $isExist = $this->select('pasien')->where('no_bpjs',$pasien['no_bpjs'])->get_exist();
        if( !$isExist ){
            $result = $this->insert('pasien', $pasien);
        }else {
            $result = $this->update('pasien', $pasien, ['no_bpjs' => $pasien['no_bpjs']]);
        }
        return $result;
    }

    // Demo function
    public function getData(&$bpjs)
    {
        return $this->select('pasien')->where('no_bpjs', $bpjs)->get_row();
    }
    public function deleteData(&$bpjs)
    {
        $this->delete('pasien', ['no_bpjs' => $bpjs]);
    }
    public function search($keyword = STRING_EMPTY)
    {
        return $this->select([
                        'a.*',
                        'count(b.no_bpjs)' => 'total_riwayat'
                ],'pasien a')
                ->join('pelayanan b', 'b.no_bpjs=a.no_bpjs')
                ->like([
                        'a.no_bpjs'     => $keyword.'%',
                        'a.nama_lengkap'=> '%'.$keyword.'%',
                        'a.nik'         => '%'.$keyword.'%'
                    ])
                ->groupBy('b.no_bpjs')
                ->get_assoc();
    }
}
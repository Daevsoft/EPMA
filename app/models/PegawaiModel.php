<?php
/**
 * PegawaiModel
 */
class PegawaiModel extends dsModel
{
    public function __construct()
    {
    }
    
    public function insertGet(&$data)
    {
        return $this->insert_get('pegawai', $data);
    }

    public function getPegawai($id)
    {
        return $this->select('pegawai')
                    ->where('id_user', $id)
                    ->get_row();
    }

    // Demo function
    public function getDokter()
    {
        return $this->select('pegawai')->where('posisi', 'dokter')->get_all();
    }
    // Demo function
    public function getPerawat()
    {
        return $this->select('pegawai')->where('posisi', 'perawat')->get_all();
    }
    public function search($keyword = STRING_EMPTY)
    {
        return $this->select('pegawai')
                ->where([
                    'posisi' => 'dokter',
                    'posisi' => 'perawat'
                ],'OR','','', TRUE)
                ->like([
                        'nama_pegawai'=> '%'.$keyword.'%'
                    ])
                ->get_assoc();
    }
}
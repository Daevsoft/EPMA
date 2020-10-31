<?php
/**
 * PasienController
 */
class PasienController extends dsController
{
    public function __construct()
    {
        parent::__construct();
        $this->add_model('pasien');
        $this->add_model('pelayanan');
    }
    public function preview($id)
    {
        $data = array(
            'menu'       => "",
            'pasien'  => $this->pasien->getData($id)
        );
        layout('Pasien', 'pasien.pie', $data);
    }
    public function edit($bpjs)
    {
        $data = array(
            'menu'          => '',
            'pasien'        => $this->pasien->getData($bpjs),
            'action'        => 'edit_pasien',
            'riwayat_list'  => $this->pelayanan->getHistoryPasien($bpjs)
        );
        layout('Edit Pasien', 'pasien.pie', $data);
    }
    public function edit_pasien()
    {
        $this->save_pasien();
        $bpjs = Input::post('no_bpjs');
        redirect('pasien/edit/'.$bpjs);
    }
    public function save_pasien()
    {
        $pasien = [
            'no_bpjs'       => Input::post('no_bpjs'),
            'nama_lengkap'  => Input::post('nama_lengkap'),
            'jenis_kelamin' => Input::post('jenis_kelamin'),
            'tempat_lahir'  => Input::post('tempat_lahir'),
            'tanggal_lahir' => Input::post('tanggal_lahir'),
            'umur'          => Input::post('umur'),
            'nik'           => Input::post('nik'),
            'alamat'        => Input::post('alamat')
        ];
        $this->pasien->insertPasien($pasien);
        return $pasien;
    }
    public function hapus_pasien($bpjs)
    {
        $this->pasien->deleteData($bpjs);
        redirect('home');
    }
}
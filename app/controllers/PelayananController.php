<?php

/**
 * PelayananController
 */
class PelayananController extends dsController
{
    public function __construct()
    {
        parent::__construct();
        auth();
        $this->add_model('pasien', 'mPasien');
        $this->add_model('pelayanan', 'mPelayanan');
        $this->add_controller('pasien');
    }

    public function index()
    {
        $data = array(
            'menu'       => "pelayanan",
            'action'     => 'save_pelayanan',
            'poli_list'  => $this->mPelayanan->getPoli()
        );
        layout('Pelayanan Baru', 'pelayanan.pie', $data);
    }
    public function buat_baru($bpjs = STRING_EMPTY)
    {
        $data = array(
            'menu'       => "pelayanan",
            'action'     => 'save_pelayanan',
            'poli_list'  => $this->mPelayanan->getPoli()
        );
        if (!string_empty($bpjs)) {
            $data['pelayanan'] = $this->mPasien->getData($bpjs);
        }
        layout('Pelayanan Baru', 'pelayanan.pie', $data);
    }
    private function edit($id, $action, $title = STRING_EMPTY)
    {
        $data = array(
            'menu'       => 'pelayanan',
            'pelayanan'  => $this->mPelayanan->getData($id),
            'action'     => $action,
            'poli_list'  => $this->mPelayanan->getPoli()
        );
        layout('Edit '.$title, 'pelayanan.pie', $data);
    }
    public function edit_pelayanan_form($id)
    {
        $this->edit($id, 'edit_pelayanan', 'Pelayanan');
    }
    public function edit_pelayanan()
    {
        $save_type = Input::post('submit');
        if ($save_type == 'kembali') {
            redirect('home');
            return;
        }

        $pasien = $this->pasien->save_pasien();
        $data = NULL;
        $pelayanan = NULL;
        if($pasien){
            $id_pelayanan = Input::post('id_pelayanan');
            $pelayanan = [
                'keluhan'      => Input::post('keluhan'),
                'poli'         => Input::post('poli'),
                'triase'    => Input::post('triase')
            ];
            $data = $this->mPelayanan->updateData($id_pelayanan, $pelayanan);
        }

        if ($save_type == 'edit_tindakan') {
            redirect('tindakan/edit/' . $data['id_pelayanan']);
        }
        if ($save_type == 'edit_pelayanan'){
            redirect('pelayanan/preview/'.$data['id_pelayanan']);
        }
    }
    public function save_pelayanan()
    {
        $save_type = Input::post('submit');
        if ($save_type == 'kembali') {
            redirect('home');
            return;
        }
        $pasien = $this->pasien->save_pasien();
        $data = NULL;
        $pelayanan = NULL;
        if($pasien){
            $pelayanan = [
                'no_bpjs' => $pasien['no_bpjs'],
                'keluhan' => Input::post('keluhan'),
                'poli'    => Input::post('poli'),
                'triase'  => Input::post('triase')
            ];
            $data = $this->mPelayanan->insertData($pelayanan);
        }

        if ($save_type == 'simpan_tindak') {
            redirect('tindakan/edit/' . $data['id_pelayanan']);
        }else if ($save_type == 'simpan_perubahan') {
            redirect('pelayanan/edit_pelayanan_form/' . $data['id_pelayanan']);
        }else{
            redirect('home');
        }
    }
    public function preview($id)
    {
        $data = array(
            'menu'       => "",
            'pelayanan'  => $this->mPelayanan->getData($id)
        );
        layout('Pelayanan', 'preview.pie', $data);
    }
    public function hapus_pelayanan($id)
    {
        $this->mPelayanan->deleteData($id);
        redirect('home');
    }
    public function selesai_pelayanan($id_pelayanan)
    {
        $this->mPelayanan->selesai($id_pelayanan);
        redirect('pelayanan/preview/'.$id_pelayanan);
    }
}

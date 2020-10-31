<?php
/**
 * TindakanController
 */
class TindakanController extends dsController
{
    public function __construct()
    {
        parent::__construct();
        $this->add_model('pelayanan');
        $this->add_model('pegawai');
    }
    
    public function index()
    {
        $data = array(
            'menu'       => "pelayanan"
        );
        layout('Tindakan','tindakan.pie',$data);
    }
    public function edit($id)
    {
        $pelayanan = $this->pelayanan->getData($id);
        $dokter = $this->pegawai->getDokter();
        $perawat = $this->pegawai->getPerawat();
        
        $data = array(
            'menu'          => "Pelayanan > Tindakan",
            'pelayanan'     => $pelayanan,
            'dokter_list'   => $dokter,
            'perawat_list'  => $perawat,
            'jenis_tindakan'  => $this->pelayanan->getJenisTindakan()
        );
        layout('Tindakan','tindakan.pie',$data);
    }
    public function form()
    {
        $submit = Input::post('submit');
        if ($submit == 'simpan'){
            $tindakan = [
                'id_dokter' => Input::post('id_dokter'),
                'id_perawat' => Input::post('id_perawat'),
                'tindakan' => Input::post('tindakan'),
                'id_jenis_tindakan' => Input::post('jenis_tindakan'),
                'resep_obat' => Input::post('resep_obat'),
                'triase' => Input::post('triase'),
                'estimasi_waktu' => Input::post('estimasi_waktu')
            ];
            $pelayanan = [
                'id_pelayanan' => Input::post('id_pelayanan'),
            ];
            $result = $this->pelayanan->updateTindakan($pelayanan, $tindakan);
            if($result) redirect('home');
        }
    }
}
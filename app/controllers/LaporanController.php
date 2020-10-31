<?php
/**
 * LaporanController
 */
class LaporanController extends dsController
{
    public function __construct()
    {
        parent::__construct();
        $this->add_model('laporan', 'mLaporan');
    }
    
    public function index($fill = FALSE)
    {
        $input = [
            'dari'  => $fill ? Input::post('dari') : date('Y-m-d'),
            'sampai'  => $fill ? Input::post('sampai') : date('Y-m-d'),
            'berdasar'  => $fill ? Input::post('berdasar') : 'bulan'
        ];

        $data = array(
            'menu'          => "laporan",
            'laporan_list'  => $this->mLaporan->getLaporan($input),
            'fillby'        => $input['berdasar']
        );
        layout('Laporan','laporan.pie',$data);
    }
}
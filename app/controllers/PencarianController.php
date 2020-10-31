<?php
/**
 * PencarianController
 */
class PencarianController extends dsController
{
    public function __construct()
    {
        parent::__construct();
        $this->add_model('pasien');
    }
    
    public function index($search = false)
    {
        $data = array(
            'menu'          => "pencarian",
            'pasien_list'   => $search ? $this->pasien->search(Input::post('keyword')) : 
                                $this->pasien->search()
        );
        layout('Pencarian Data Pasien','pencarian.pie',$data);
    }
}
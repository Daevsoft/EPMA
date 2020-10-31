<?php
/**
 * HomeController
 */
class HomeController extends dsController
{
    public function __construct()
    {
        parent::__construct();
        auth();
        $this->add_model('pelayanan');
    }

    public function index($search = false)
    {
        $data = array(
            'menu'       => "home",
            'pelayanan_list' => $search ? $this->pelayanan->getTodaySearch(Input::post('search')):
                                $this->pelayanan->getAllToday()
        );
        layout('Dashboard','home.pie',$data);
    }
}
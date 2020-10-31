<?php
/**
 * MonitorController
 */
class MonitorController extends dsController
{
    public function __construct()
    {
        parent::__construct();
        $this->add_model('pelayanan');
    }
    public function index()
    {
        $data = array(
            'title'       => "Monitor",
            'pelayanan_list' => $this->pelayanan->getMonitor()
        );
        view('monitor.pie',$data);
    }
}
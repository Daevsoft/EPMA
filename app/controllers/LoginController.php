<?php
/**
 * LoginController
 */
class LoginController extends dsController
{
    public function __construct()
    {
        parent::__construct();
        $this->add_model('user');
        $this->add_model('pegawai');

        if($this->has_login()){
            redirect('home');
        }
    }
    public function daftar_baru()
    {
        $data = array(
            'menu'       => "Daftar Baru"
        );
        page('register.pie',$data);
    }
    public function index()
    {
        $data = array(
            'menu'       => "Login"
        );
        page('login.pie',$data);
    }
    public function forgot()
    {
        $data = array(
            'menu'       => "Lupa Password"
        );
        page('forgot.pie',$data);
    }
    public function form()
    {
        $data = [
            'nik' => Input::post('nik'),
            'password' => md5(Input::post('password'))
        ];
        $is_user = $this->user->getUser($data);
        if($is_user){
            $pegawai = $this->pegawai->getPegawai($is_user['id_user']);
            _get('session')->set('user', $pegawai);
            redirect('home');
        }else{
            redirect('login');
        }
    }
    public function form_forgot()
    {
        if (!$this->user
            ->select('secret')
            ->where('password', Input::post('password'))
            ->get_exist()) 
        {
            echo '<script>
            alert("Kode Puskes anda salah!\nSilahkan tanyakan Kode Puskes kepada Admin Puskes!");
            document.location="'.site('login/forgot').'";
            </script>';
        }

        $data = [
            'nik' => Input::post('nik')
        ];
        $is_user = $this->user->getUser($data);
        if($is_user){
            $pegawai = $this->pegawai->getPegawai($is_user['id_user']);
            _get('session')->set('user', $pegawai);
            redirect('home');
        }else{
            redirect('login');
        }
    }
    public function register()
    {
        $data = [
            'nik'       => Input::post('nik'),
            'password'  => md5(Input::post('password')),
            'level'     => 'general'
        ];
        $user = $this->user->insertUser($data);

        $pegawai = [
            'id_user'       => $user['id_user'],
            'nama_pegawai'  => Input::post('nama_pegawai'),
            'posisi'        => Input::post('posisi')
        ];
        $this->pegawai->insertGet($pegawai);
        redirect('login');
    }
    private function has_login()
    {
        return _get('session')->exist('user');
    }
}
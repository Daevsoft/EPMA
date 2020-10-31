<?php

/**
 * UserController
 */
class UserController extends dsController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        view('login.pie');
    }

    public function logout()
    {
        unset_session('user');
        if (!_get('session')->exist('user'))
            redirect('login');
    }
}

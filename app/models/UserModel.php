<?php
/**
 * UserModel
 */
class UserModel extends dsModel
{
    public function __construct()
    {
    }
    
    public function index()
    {

    }

    public function insertUser(&$user)
    {
        return $this->insert_get('user', $user)->get_row();
    }
    // Demo function
    public function getUser(&$where)
    {
        return $this->select('user')
                    ->where($where)
                    ->get_row();
    }
}
<?php defined('BASEPATH') OR exit('No direct script access allowed');

class cities_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get($where = array())
    {
        if (empty($where))
        {
            return FALSE;
        }

        return $this->db
                    ->where($where)
                    ->get('cities');
    }

    // public function post($set = array())
    // {
    //     if (empty($set))
    //     {
    //         return FALSE;
    //     }
        
    //     return $this->db
    //                 ->set($set)
    //                 ->insert('account_setup');
    // }

    // public function put($where = array(), $set = array())
    // {
    //     if (empty($where) || empty($set))
    //     {
    //         return FALSE;
    //     }
        
    //     return $this->db
    //                 ->set($set)
    //                 ->where($where)
    //                 ->update('account_setup');
    // }
}
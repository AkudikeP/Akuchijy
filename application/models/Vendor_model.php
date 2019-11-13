<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Draft_files_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get($where = array())
    {
        if (empty($where))
        {
            return '';
        }

        return $this->db
                    ->where($where)
                    ->get('project_draft_files');
    }

    public function delete($where = array())
    {
        if (empty($where))
        {
            return FALSE;
        }

        return $this->db
                    ->where($where)
                    ->delete('project_draft_files');
    }

    public function post($set = array())
    {
        if (empty($set))
        {
            return FALSE;
        }

        return $this->db
                    ->set($set)
                    ->insert('project_draft_files');
    }
}
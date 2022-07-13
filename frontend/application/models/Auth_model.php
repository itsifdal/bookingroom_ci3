<?php
class Auth_model extends CI_Model {

    function cek_login($u,$p)
    {
      $this->db->where('username',$u);
      $this->db->where('password',$p);
      return $this->db->get('user');
    }

    function get()
    {
      $this->db->select('*');
		  return $this->db->get('user');
    }

}
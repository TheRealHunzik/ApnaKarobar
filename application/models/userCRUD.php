<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserCRUD extends CI_Model
{
    
    function __contruct()
    {
        parent::__contruct();
    }
    public function login($data)
    {
        
        $condition = "user_email ='". $data['username'] ."' AND  user_password ='". $data['password'] ."'";
        $this->db->select('*');
        $this->db->from('userdata');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
        return true;
        } else {
        return false;
        }
    }
    public function userRegister($data)
    {
        $this->db->insert('userdata',$data);
        $num= $this->db->affected_rows();
        if($num>0)
        {
            return true;
        }else
        {
            $this->db->error_message();
        }
    }
    public function emailValidation($email)
    {
        $this->db->select('*');
        $this->db->from('userdata');
        $this->db->where('user_email',$email);
        $query=$this->db->get();
        if($query->num_rows()>0)
        {   
            return true;
        }
        else
        {
            return false;
        }

    }
    public function getAllUser()
    {
        $this->db->select('*');
        $this->db->from('userdata');
        $query=$this->db->get();
        return $query->result();
    }
    public function getUser($email)
    {
        $condition = "user_email ='". $email ."'";
        $this->db->select('*');
        $this->db->from('userdata');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
        return $query->result();
        } else {
        return false;
        }
    }
    public function ordersByUser($user)
    {
      $this->db->select('order.*,site.*');
      $this->db->from('order');
      $this->db->join('site','order.site_id=site.site_id','inner');
      $this->db->where('order.user_id',$user);
      $query=$this->db->get();
      return $query->result();
    }

};
?>
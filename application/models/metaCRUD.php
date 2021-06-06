<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MetaCRUD extends CI_Model
{
   public function getTheme()
    {
        $this->db->select("*");
        $this->db->from("theme");
        $query=$this->db->get();
        return $query->result();
    }
    public function getCount()
    {
        $count=array();
      $this->db->select('count(*) as total_site');
      $this->db->from('site');
      $site=$this->db->get()->result();
      array_push($count,$site[0]->total_site);
      $this->db->select('count(*) as total_user');
      $this->db->from('userdata');
      $site=$this->db->get()->result();
      array_push($count,$site[0]->total_user);
      $this->db->select('count(*) as total_orders');
      $this->db->from('order');
      $site=$this->db->get()->result();
      array_push($count,$site[0]->total_orders);
      return $count;
    }
    public function login($data)
    {
        $condition = "admin_email ='". $data['username'] ."' AND  admin_password ='". $data['password'] ."'";
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
        return true;
        } else {
        return false;
        }
    }
    public function getAdmin($email)
    {
        $condition = "admin_email ='". $email ."'";
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where($condition);
        $query = $this->db->get();
        if ($query->num_rows() == 1) {
        return $query->result();
        } else {
        return false;
        }
    }
    public function addCatagory($data)
    {
        $this->db->insert('catagory',$data);
        if($this->db->affected_rows()>0)
        {
            return true;
        }else{
            return false;
        }
    }
    public function getCatagoryData()
    {
        $this->db->select('catagory.*, count(site.catagory_id) as Sites');    
        $this->db->from('catagory');
        $this->db->join('site', 'catagory.catagory_id = site.catagory_id', 'left');
        $this->db->group_by('catagory.catagory_id');
        $query=$this->db->get();
        return $query->result();
    }
    public function getCatagory()
    {
        $this->db->select("*");
        $this->db->from("catagory");
        $query=$this->db->get();
        return $query->result();
    }
    public function addProduct($data)
    {
        $this->db->insert('product',$data['product']);
        return $this->db->insert_id();
        // $insert_id = $this->db->insert_id();
        // return $insert_id;
    }
    public function addProductMeta($data)
    {
        $this->db->insert_batch('product_meta',$data['productMeta']);
        if($this->db->affected_rows()>0)
        {
            return true;
        }else{
            
            echo $this->db->error();
        }
    }
    public function getAllProducts()
    {
        $result=array();
        $this->db->select('*');
        $this->db->from('product');
        $query=$this->db->get();
        foreach($query->result() as $row)
        {
            $select ='product.*, catagory.catagory_name AS catagory,
            COUNT(product_meta.product_id) AS Attributes, 
            COUNT(stockmain.product_id) AS Stock';
            $this->db->select($select);
            $this->db->from('product');
            $this->db->join('catagory', 'product.product_catagoryid=catagory.catagory_id', 'inner');
            $this->db->join('product_meta', 'product_meta.product_id=product.product_id', 'left');
            $this->db->join('stockmain', 'product.product_id=stockmain.product_id', 'left');
            $this->db->where('product.product_id',$row->product_id);
            $products=$this->db->get();
            array_push($result,$products->result());
            
        }
        return $result;

    }
    public function getProductByCatagory($catagoryid)
    {
        $this->db->select('product.*');
        $this->db->from('product');
        $this->db->where('product.product_catagoryid',$catagoryid);
        $query=$this->db->get();
        return $query->result();
    }
    public function getproductbyID($productid)
    {
        $select ='product.*, catagory.catagory_name AS catagory,
        COUNT(product_meta.product_id) AS Attributes, 
        COUNT(stockmain.product_id) AS Stock';
        $this->db->select($select);
        $this->db->from('product');
        $this->db->join('catagory', 'product.product_catagoryid=catagory.catagory_id', 'inner');
        $this->db->join('product_meta', 'product_meta.product_id=product.product_id', 'left');
        $this->db->join('stockmain', 'product.product_id=stockmain.product_id', 'left');
        $this->db->where('product.product_id',$productid);
        $products=$this->db->get();
        return $products->result();
    }
}
?>
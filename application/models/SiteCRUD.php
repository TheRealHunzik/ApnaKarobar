<?php
if(!defined('BASEPATH')) exit('No Direct script Access is allowed');
/**
   * 
   */
class SiteCRUD extends CI_Model
{
   private $tableName='site'; 
    	function __construct()
  	{
  		parent::__construct();
    }
    public function getAlItemsByID($id)
    {
        $this->db->select('*');
        $this->db->from('stockmain');
        $this->db->where('product_id',$id);
        $query=$this->db->get();
        return $query->result();
    }
    function update_counter($slug) {
      // return current article views 
          $this->db->where('site_id', $slug);
          $this->db->select('site_view');
          $count = $this->db->get('site')->row();
      // then increase by one 
          $this->db->where('site_id', $slug);
          $this->db->set('site_view', ($count->site_view + 1));
          $this->db->update('site');
      }
  	public function insert($data)
  	{
      // var_dump($data);
      $query=$this->db->insert('site',$data);
      if($this->db->affected_rows() > 0)
        {
        // Code here after successful insert
          return true; // to the controller
        }
  		
    }
    public function addDeliveryDetails($data,$id)
    {
      $this->db->trans_start();
      $this->db->insert('delivery',$data);
      $delivery_id = $this->db->insert_id();
      $update=array(
        'delivery_id' => $delivery_id,
        'status'  => 'dispatched'
      );
      $this->db->where('order_id', $id);
      $this->db->update('order', $update);
      $this->db->trans_complete();
      if ($this->db->trans_status() === TRUE)
      {
         return true;
      }else{
        return $this->db->error();
      }
      
    }
    public function getOrderDetailByID($id)
    {
      $this->db->select('order.*,site.*,userdata.*');
      $this->db->from('order');
      $this->db->join('site','order.site_id=site.site_id','inner');
      $this->db->join('userdata','order.user_id=userdata.user_id','inner');
      $this->db->where('order.order_id',$id);
      $query=$this->db->get();
      return $query->result();
    }
    public function updatestock($update,$id)
    {
      
      $this->db->trans_start();
      $this->db->where('stock_id',$id);
      $this->db->update('stockmain',$update);
      $this->db->trans_complete();

      if ($this->db->trans_status() === TRUE)
      {
         return true;
      }else{
        return $this->db->error();
      }
    }
    public function getOrderItemsByID($id)
    {
      $this->db->select('order_items.*,stockmain.*');
      $this->db->from('order_items');
      $this->db->join('stockmain','order_items.stock_id=stockmain.stock_id','inner');
      $this->db->where('order_items.order_id',$id);
      $query=$this->db->get();
      return $query->result();
    }
    public function updateProfile($update,$siteID)
    {
      $this->db->trans_start();
      $this->db->where('site_id',$siteID);
      $this->db->update('site',$update);
      $this->db->trans_complete();

      if ($this->db->trans_status() === TRUE)
      {
         return true;
      }else{
        return $this->db->error();
      }
    }
    public function addToCart($data)
    {
      $this->db->insert('cart',$data);
      if($this->db->affected_rows() > 0)
      {
        return true;
      }
    }
    public function cartItems()
    {
      $this->db->select('cart.*,stockmain.*');
      $this->db->from('cart');
      $this->db->join('stockmain','cart.stock_id= stockmain.stock_id','inner');
      $this->db->where('cart.site_id',$this->session->userdata('siteID'));
      $this->db->where('cart.user_id',$this->session->userdata('user_id'));
      $query=$this->db->get();
      // var_dump($query->result());
      // exit();
      return $query->result();
    }
    public function newOrder($data)
    {
      $query=$this->db->insert('order',$data);
      if($this->db->affected_rows() > 0)
      {
        $orderID=$this->db->insert_id();
        return $orderID;
      }
      else{
        echo $this->db->error(); 
      }
    }
    public function newOrderItems($data)
    {
      $this->db->insert('order_items',$data);
      if($this->db->affected_rows() > 0)
      {
        redirect(base_url().'order');
      }
      else{
        echo $this->db->error(); 
      }
    }
    public function deleteCartItem($id)
    {
      $this->db->where('cart_id', $id);
      $this->db->delete('cart'); 
      if($this->db->affected_rows() > 0)
      {
        return true;
      }

    }
    public function searchStock($name)
    {
      $items=array();
      $this->db->select('*');
      $this->db->from('product');
      $query=$this->db->get();
      $products=$query->result();
      foreach($products as $product) {
        
        $this->db->select('*,site.site_title');
        $this->db->from('stockmain');
        $this->db->join('site','stockmain.site_id=site.site_id','inner');
        if($name)
          {
            $this->db->or_like('stock_des', $name);
          }
          $this->db->where('stock_id',$product->product_id);
        $query=$this->db->get();
        $results=$query->result();
        array_push($items,$results);
      }
      return $items;
      
      
    }
    public function searchSites($name)
    {
      $this->db->select('site.*,theme.theme_name,userdata.user_name,catagory.catagory_name as Catagory');
      $this->db->from('site');
      $this->db->join('theme','theme.theme_id=site.theme_id','inner');
      $this->db->join('userdata','userdata.user_id=site.user_id','inner');
      $this->db->join('catagory','catagory.catagory_id=site.catagory_id','inner');
      if($name)
      {
        $this->db->or_like('site_title', $name);
      }
      $query=$this->db->get();
      $result=$query->result();
      return $result;
    }
    public function getSitesData()
    {
      $this->db->select('site.*,theme.theme_name,userdata.user_name,catagory.catagory_name as Catagory');
      $this->db->from('site');
      $this->db->join('theme','theme.theme_id=site.theme_id','inner');
      $this->db->join('userdata','userdata.user_id=site.user_id','inner');
      $this->db->join('catagory','catagory.catagory_id=site.catagory_id','inner');
      $query=$this->db->get();
      return $query->result();
    }
    public function getSite($data)
    {
      $this->db->select('site.*,theme.*');    
      $this->db->from('site');
      $this->db->join('theme', 'theme.theme_id=site.theme_id');
      $this->db->where('site.user_id',$this->session->userdata('user_id'));
      $query=$this->db->get();
      return $query->result();
    }
    public function getAlItems()
    {
      $result=array();
        $this->db->select('*');
        $this->db->from('stockmain');
        $query=$this->db->get();
        return $query->result();
    }
    public function productMetaDetails($product_id)
    {
      $this->db->select('product_meta.name,stock_value.value');
      $this->db->from('stock_value');
      $this->db->join('product_meta','stock_value.productmeta_id=product_meta.productmeta_id','inner');
      $this->db->where('stock_value.stock_id',$product_id);
      $query=$this->db->get();
      return $query->result();
    }
    public function getAllStock(Type $var = null)
    {
      $this->db->select('stockmain.*,site.site_title');
      $this->db->from('stockmain');
      $this->db->join('site','stockmain.site_id=site.site_id','inner');
      $query=$this->db->get();
      return $query->result();

    }
    public function stockDetails($product_id)
    {
      $this->db->select('*');
      $this->db->from('stockmain');
      $this->db->where('stockmain.stock_id',$product_id);
      $query=$this->db->get();
      return $query->result();
      
    }
    public function getStockByCatagory($catID)
    {
      
      $items=array();
      $this->db->select('*');
      $this->db->from('product');
      $this->db->where('product_catagoryid',$catID);
      $query=$this->db->get();
      $products=$query->result();
      foreach($products as $product) {
        
        $this->db->select('*,site.site_title');
        $this->db->from('stockmain');
        $this->db->join('site','stockmain.site_id=site.site_id','inner');
        $this->db->where('product_id',$product->product_id);
        $query=$this->db->get();
        $results=$query->result();
        array_push($items,$results);
      }
      return $items;
    }
    public function getSitesBycatagory($catID)
    {
      $this->db->select('site.*,theme.theme_name,userdata.user_name,catagory.catagory_name as Catagory');
      $this->db->from('site');
      $this->db->join('theme','theme.theme_id=site.theme_id','inner');
      $this->db->join('userdata','userdata.user_id=site.user_id','inner');
      $this->db->join('catagory','catagory.catagory_id=site.catagory_id','inner');
      $this->db->where('site.catagory_id',$catID);
      $query=$this->db->get();
      return $query->result();
    }
    public function ordersBySite($site)
    {
      $this->db->select('order.*,userdata.*');
      $this->db->from('order');
      $this->db->join('userdata','order.user_id=userdata.user_id','inner');
      $this->db->where('site_id',$site);
      $query=$this->db->get();
      return $query->result();
    }
    public function stockMetaDetails($product_id)
    {
      $this->db->select('stock_value.value');
      $this->db->from('stock_value');
      $this->db->where('stock_value.stock_id',$product_id);
      $query=$this->db->get();
      $result['stockDetails']=$query->result();
      return $result;
    }
    public function getAllResturant()
    {
      $this->db->select('site.site_id,site.site_title,site.site_logo,site.site_lat,site.site_long');
      $this->db->from('site');
      $this->db->where('catagory_id',1);
      $query=$this->db->get();
      return $query->result();
    }
    public function getSiteProducts($site)
    {
      $this->db->select('*');
      $this->db->from('stockmain');
      $this->db->where('site_id',$site);
      $query=$this->db->get();
      return $query->result();
    }
    public function getSiteById($data) 
    {
      $this->db->select('site.*,theme.*,catagory.catagory_name,userdata.user_name');    
      $this->db->from('site');
      $this->db->join('theme', 'theme.theme_id=site.theme_id');
      $this->db->join('catagory', 'catagory.catagory_id=site.catagory_id');
      $this->db->join('userdata', 'site.user_id=userdata.user_id');
      $this->db->where('site.site_id',$data);
      $query=$this->db->get();
      
      return $query->result();
    }
    public function getAllSites()
    {
      $this->db->select('*');
      $this->db->from('site');
      $query=$this->db->get(); 
      return $query->result();
    }
    public function addStock($data)
    {
      $this->db->insert('stockmain',$data);
      $stockID=$this->db->insert_id();
      return $stockID;
    }
    public function addstockMeta($input)
    {
      $this->db->insert('stock_value',$input);
      $stockID=$this->db->insert_id();
      return $stockID;
    }
    public function getProductMeta($id)
    {
      $this->db->select('product_meta.*, product.product_pic ');
      $this->db->from('product_meta');
      $this->db->join('product','product_meta.product_id=product.product_id','inner');
      $this->db->where('product_meta.product_id',$id);
      $query=$this->db->get();
      return $query->result();

    }
    public function getStockMeta($id)
    {
      $this->db->select('stock_value.*, stockmain.stock_pic');
      $this->db->from('stock_value');
      $this->db->join('stockmain','stock_value.stock_id=stockmain.stock_id','inner');
      $this->db->where('stock_value.stock_id',$id);
      $query=$this->db->get();
      return $query->result();

    }
    public function emailValidation($email)
    {
        $this->db->select('*');
        $this->db->from('site');
        $this->db->where('site_email',$email);
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
   

} 
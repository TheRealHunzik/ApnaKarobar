<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('siteCRUD');
		$this->load->model('metaCRUD');
	}
	public function orders()
	{ 
		$data['orders']=$this->siteCRUD->ordersBySite($this->session->userdata('site_id'));
		$data['page_name']='orders';
		$this->load->view('seller/index',$data);
	}
	public function updateProfile()
	{
		$this->form_validation->set_rules('theme', 'theme', 'trim|required|numeric');
		$this->form_validation->set_rules('site_id', 'site_id', 'trim|required|numeric');
		$this->form_validation->set_rules('name', 'name', 'trim|required');
		$this->form_validation->set_rules('slogan', 'slogan', 'trim|required|alpha_numeric_spaces');
		$this->form_validation->set_rules('mobile', 'mobile', 'trim|required|numeric');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		if($this->form_validation->run()==FALSE)
		{
			$this->session->set_flashdata('error',$this->form_validation->first_error());
			redirect(base_url().'seller/profile');
		}else{
			$site_id=$this->input->post('site_id');
			$data = array(
				'theme_id' => $this->input->post('theme'),
				'site_title' => $this->input->post('name'),
				'site_slogan' => $this->input->post('slogan'),
				'site_mobile' => $this->input->post('mobile'),
				'site_email' => $this->input->post('email'),
			);
			$result=$this->siteCRUD->updateProfile($data,$site_id);
			if($result==TRUE){
				$this->session->set_flashdata('success','Updated Successfully');
				redirect(base_url().'seller/profile');
			}else{
				$this->session->set_flashdata('error',$result);
				redirect(base_url().'seller/profile');
			}
		}
		
	}
	public function index()
	{
		if($this->session->userdata('site_login')!=1)
		{
			$site=$this->siteCRUD->getSiteById($this->input->get('siteID'));
			$this->setSession($site);
		}
		$data['page_name']='body';
		$this->load->view('seller/index',$data);
	}
	public function setSession($Site)
	{
		$this->session->set_userdata('site_title',$Site[0]->site_title);
		$this->session->set_userdata('site_logo',$Site[0]->site_logo);
		$this->session->set_userdata('site_id',$Site[0]->site_id);
		$this->session->set_userdata('catagory_id',$Site[0]->catagory_id);
		$this->session->set_userdata('site_login',1);
		

	}
	public function costumers(Type $var = null)
	{
		if($this->session->userdata('site_login')!=1)
		{
			redirect(base_url().'seller');
		}else{
			$data['product']=$this->siteCRUD->getSiteProducts($this->session->userdata('site_id'));
			$data['page_name']='costumers';
			$this->load->view('seller/index',$data);
		}
	}
	public function product()
	{
		if($this->session->userdata('site_login')!=1)
		{
			redirect(base_url().'seller');
		}else{
			$data['product']=$this->siteCRUD->getSiteProducts($this->session->userdata('site_id'));
			$data['page_name']='Stock';
			$this->load->view('seller/index',$data);
		}
		
	} 
	public function allproducts()
	{ 
		$data['page_name']='allproduct';
		$new=array();
		$result=$this->metaCRUD->getProductByCatagory($this->session->userdata('catagory_id'));
		foreach ($result as $product) {
			$products=$this->metaCRUD->getproductbyID($product->product_id);
			array_push($new,$products);
		}
		$data['product']=$new;
		$this->load->view('seller/index',$data);
	}
	public function profile(Type $var = null)
	{	
		$data['theme']=$this->metaCRUD->getTheme();
		$data['site']=$this->siteCRUD->getSiteById($this->session->userdata('site_id'));
		$data['page_name']='profile';
		$this->load->view('seller/index',$data);
	}
	public function logout() 
	{
		$this->session->unset_userdata('site_title');
		$this->session->unset_userdata('site_logo');
		$this->session->unset_userdata('catagory_id');
		$this->session->unset_userdata('site_login');
		redirect(base_url());
		# code...
	}
	public function addproduct()
	{
		$product_id=$this->input->get('product_id');
		$data['product']=$this->siteCRUD->getProductMeta($product_id);
		$data['product_id']=$product_id;
		$data['page_name']='addproduct';
		$this->load->view('seller/index',$data);
	}
	public function review()
	{
		$this->db->select('*');
		$this->db->from('order_items');
		$this->db->join('order','order.order_id=order_items.order_id','inner');
		$query=$this->db->get();
		$result=$query->result();
		foreach ($result as $item) {
			$data=array(
				'user_id' => $item->user_id,
				'rated_stars' => rand(2,5),
				'stock_id' => $item->stock_id,
				'total_stars'=> 5,
				'comment' =>'good'
			);
			$this->db->insert('stock_review',$data);
		}
		exit();

	}
	public function addStock()
	{
		$input=$this->input->post();
		$id=$input['id'];
		unset($input['id']);
		$des=$input['stockDes'];
		$price=$input['price'];
		$dis=$input['discount'];
		unset($input['stockDes']);
		unset($input['price']);
		unset($input['discount']);
		$file='userfile';
		$filename=$this->uploadFile('stock',$file,$des.rand(1, 1000000));
		$stock=array(
			'product_id' => $id,
			'site_id'=>$this->session->userdata('site_id'),
			'stock_des'=> $des,
			'stock_dis' => $dis,
			'stock_price' => $price,
			'stock_pic' =>$filename
		);
		
		$cnt=0;
		$stockid=$this->siteCRUD->addStock($stock);
		foreach($input as $key=>$value){
			$meta=array(
				'productmeta_id'=>$key,
				'stock_id'=>$stockid,
				'value'=>$value
			);
			$done=$this->siteCRUD->addstockMeta($meta);
			++$cnt;
		}
		if($cnt==count($input))
		{
			$this->session->set_flashdata('success','Stock Added SuccessFully');
			redirect(base_url().'seller/product');
		}else{
			$this->session->set_flashdata('error',$this->db->error());
			redirect(base_url().'seller/addproduct');
		}
		
		
	}
	public function uploadFile($type,$file,$name)
	{   
		$config['upload_path']          = './uploads/'.$type.'/';
		$config['file_name'] 			= 	$name;
        $config['allowed_types']        = '*';
        $config['max_size']             = 10000;
        $config['max_width']            = 6000;
        $config['max_height']           = 6000;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('userfile'))
        {
			$this->session->set_flashdata('error',$this->upload->display_errors());
			redirect(base_url().'seller/addproduct');
            
        }else{
                    
            $image_path=$this->upload->data();
            $file_name=$image_path['file_name'];
            return $file_name;
                    
        }
	}

}

/* End of file Seller.php */
/* Location: ./application/controllers/Seller.php */
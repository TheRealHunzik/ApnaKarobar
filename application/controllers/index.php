<?php 

/**
* 
*/
class Index extends CI_Controller
{
	function __construct()
	{
		# code...
		parent::__construct();
		$this->load->library('google');
		$this->load->library('facebook');
		 $this->load->helper('url'); 
		 $this->load->model('siteCRUD');
		 $this->load->model('metaCRUD');
		 $this->load->model('userCRUD');
	}
	public function index()
	{	
		if($this->session->userdata('login')!=1)
    	{	
			$data['google_login_url']=$this->google->get_login_url();
		}
		else{
			$data['site']=$this->siteCRUD->getSite($this->session->userdata['user_id']);
			
		}
		$data['theme']=$this->metaCRUD->getTheme();
		$data['count']=$this->metaCRUD->getCount();
		$data['stock']=$this->siteCRUD->getAllStock();
		$data['shops']=$this->siteCRUD->getSitesData();
		$data['catagory']=$this->metaCRUD->getCatagory();
		$data['page_name']='body';
		$this->load->view('header',$data);
	}
	public function search()
	{
		$search=$this->input->get('searchAll');
		if($this->session->userdata('login')!=1)
    	{	
			$data['google_login_url']=$this->google->get_login_url();
		}
		else{
			$data['site']=$this->siteCRUD->getSite($this->session->userdata['user_id']);
			
		}
		$data['stock']=$this->siteCRUD->searchStock($search);
		$data['shops']=$this->siteCRUD->searchSites($search);
		$data['catagory']=$this->metaCRUD->getCatagory();
		$data['page_name']='catagory';
		$this->load->view('header',$data);
	}
	public function catagory()
	{	
		$catagoryID=$this->input->get('cat_id');
		if($this->session->userdata('login')!=1)
    	{	
			$data['google_login_url']=$this->google->get_login_url();
		}
		else{
			$data['site']=$this->siteCRUD->getSite($this->session->userdata['user_id']);
			
		}
		$data['stock']=$this->siteCRUD->getStockByCatagory($catagoryID);
		$data['shops']=$this->siteCRUD->getSitesBycatagory($catagoryID);
		$data['catagory']=$this->metaCRUD->getCatagory();
		$data['page_name']='catagory';
		$this->load->view('header',$data);
	}
	public function compare()
	{
		if($this->session->userdata('login')!=1)
    	{	
			$data['google_login_url']=$this->google->get_login_url();
		}
		else{
			$data['site']=$this->siteCRUD->getSite($this->session->userdata['user_id']);
			
		}
		$data['catagory']=$this->metaCRUD->getCatagory();
		$data['page_name']='compare';
		$this->load->view('header.php',$data);
	}
	public function checkout()
	{
		$amount=$this->input->post('amount');
		$payment=$this->input->post('payment');
		$data['amount']=$amount;
		if($this->session->userdata('login')!=1)
    	{	
			$data['google_login_url']=$this->google->get_login_url();
			redirect(base_url());
		}
		else{
			$data['site']=$this->siteCRUD->getSite($this->session->userdata['user_id']);
			
		}
		$data['catagory']=$this->metaCRUD->getCatagory();
		$data['amount']=$amount;
		if($payment=='stripe')
		{
			$data['page_name']='checkout';
			$this->load->view('header',$data);
		}elseif($payment=='cash'){
			$data['page_name']='checkout1';
			$this->load->view('header',$data);
		}
	}
	public function order()
	{ 
		if($this->session->userdata('login')!=1)
    	{	
			$data['google_login_url']=$this->google->get_login_url();
		}
		else{
			$data['site']=$this->siteCRUD->getSite($this->session->userdata['user_id']);
			
		}
		$data['orders']=$this->userCRUD->ordersByUser($this->session->userdata('user_id'));
		$data['page_name']='order';
		$this->load->view('header.php',$data);
	}
	public function foodcorner()
	{
		if($this->session->userdata('login')!=1)
    	{	
			$data['google_login_url']=$this->google->get_login_url();
		}
		else{
			$data['site']=$this->siteCRUD->getSite($this->session->userdata['user_id']);
			
		}
		$data['catagory']=$this->metaCRUD->getCatagory();
		$data['resturant']=$this->siteCRUD->getAllResturant();
		$data['page_name']='foodcorner';
		$this->load->view('header.php',$data);
	}
	public function profile()
	{
		if($this->session->userdata('login')!=1)
    	{	
			redirect(base_url());
		}
		else{
			$data['site']=$this->siteCRUD->getSite($this->session->userdata['user_id']);
			
		}
		$data['page_name']='profile';
		$this->load->view('header.php',$data);
	}
	
	
}
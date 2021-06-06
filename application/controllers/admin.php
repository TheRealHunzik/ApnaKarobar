<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
        $this->load->helper('url','text','form');
        $this->load->model('metaCRUD');
        $this->load->model('userCRUD');
        
        $this->load->model('siteCRUD');
    }
    public function index()
    {
        if($this->session->userdata('login')!=1)
        {
            redirect(base_url().'admin/login');
        }
        $data['page_title']='Dashboard';
        $data['page_name']='body';
        $this->load->view('admin/index',$data);
    }
    public function login()
    {
        
        $this->load->view('admin/login');
    }
    public function adminLogin()
    {
        $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
		if ($this->form_validation->run()=='FALSE') {
			# code...
		} 
		else {
			$data = array(
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			);
			$result = $this->metaCRUD->login($data);
			if ($result == TRUE) 
			{
				$email = $this->input->post('username');
                $user=$this->metaCRUD->getAdmin($email);
                $this->session->set_userdata('login',1); 
                $this->session->set_userdata('user_id',$user[0]->admin_id);
                $this->session->set_userdata('admin_name',$user[0]->admin_name);
                $this->session->set_userdata('user_name',$user[0]->admin_name);
                $this->session->set_userdata('admin_email',$user[0]->admin_email);
                redirect(base_url().'admin');

				
			}
			else{
                $this->session->set_flashdata('login_error','Invalid Username and Password');
                redirect('admin/login');
			}
		}
    }
    public function user($param1)
    {
        if($this->session->userdata('login')!=1)
        {
            redirect(base_url().'admin/login');
        }
        if($param1=='new') 
        {
            $data['page_title']='New User';
            $data['page_name']='newUser';
            $this->load->view('admin/index',$data);
        }elseif($param1=='add'){
            $this->form_validation->set_rules('fname', 'fname', 'alpha|required');
            $this->form_validation->set_rules('lname', 'lname', 'alpha|required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('password', 'password', 'required|min_length[8]|max_length[20]');
            $this->form_validation->set_rules('cpassword', 'cpassword', 'trim|required|matches[password]');
            $this->form_validation->set_rules('contact', 'contact', 'alpha|required');
            if($this->form_validation->run()==FALSE){
                $this->session->set_flashdata('error',$this->form_validation->first_error());
                redirect(base_url().'admin/user/new');
            }else{
                $email=$this->input->post('email');
                $result=$this->userCRUD->emailValidation($email);
                if($result==TRUE){
                    $this->session->set_flashdata('error','User Already Exists');
                    redirect(base_url().'admin/user/new');

                }else {
                    $user=array(
                        'user_name' => $this->input->post('fname').' '.$this->input->post('lname'),
                        'user_password' => $this->input->post('password'),
                        'user_source' => 'admin',
                        'user_registerdate' => date('h-i-s, j-m-y, it is w Day'),
                        'user_email' => $this->input->post('email'),
                        'user_contact' => $this->input->post('contact'),
                        'user_hash' => md5(rand(0, 1000))
                    );
                    $result=$this->userCRUD->userRegister($user);
                    if($result==TRUE)
                    {
                        $this->session->set_flashdata('success','User Added SuccessFully');
                        redirect(base_url().'admin/user/new');
                    }
                    else{
                        $this->session->set_flashdata('error',$result);
                        redirect(base_url().'admin/user/new');
                    }
                }
            }
        }elseif($param1=='view'){
            $data['page_title']='Users';
            $data['page_name']='viewUser';
            $data['user']=$this->userCRUD->getAllUser();
            $this->load->view('admin/index',$data);
        }

    }
    public function site($param1)
    {
        if($this->session->userdata('login')!=1)
        {
            redirect(base_url().'admin/login');
        }
        if($param1=='new')
        {
            $data['page_title']='Add Site';
            $data['theme']=$this->metaCRUD->getTheme();
            $data['catagory']=$this->metaCRUD->getCatagory();
            $data['users']=$this->userCRUD->getAllUser();
            $data['page_name']='newSite';
            $this->load->view('admin/index',$data);
        }elseif($param1=='add'){
            $result=$this->siteCRUD->emailValidation($this->input->post('email'));
            if($result==true){
                $this->session->set_flashdata('error','Email Already Exists');
                redirect(base_url().'admin/site/new');

            }else {
                # code...
                $filename= $this->uploadFile('logos','userfile',$this->input->post('name'));
                if($filename==FAlSE)
                {
                    redirect(base_url().'admin/site/new');
                }
                $data = array(
				'user_id' =>$this->input->post('user_id'),
				'theme_id' => $this->input->post('theme'),
				'catagory_id' => $this->input->post('catagory'),
				'site_title' => $this->input->post('name'),
				'site_slogan' => $this->input->post('slogan'),
				'site_mobile' => $this->input->post('mobile'),
				'site_lat'=>$this->input->post('latitude'), 
				'site_long'=>$this->input->post('longitude'), 
				'site_email' => $this->input->post('email'),
				'site_logo' => $filename
				);
				if ( $this->siteCRUD->insert($data)  )  {
                   $this->session->set_flashdata('success','Site Added SuccessFully');
                   redirect(base_url().'admin/site/new');
				}else{
					$this->session->set_flashdata('error',$this->db->error_message());
                    redirect(base_url().'admin/site/new');
				}
            }
        }elseif($param1=='view'){
            $data['page_title']='Sites';
            $data['site']=$this->siteCRUD->getSitesData();
            $data['page_name']='viewSite';
            $this->load->view('admin/index',$data);
        }

    }
    public function product($param1)
    {
        if($this->session->userdata('login')!=1)
        {
            redirect(base_url().'admin/login');
        }
        if($param1=='new')
        {
            $data['page_title']='New Product';
            $data['catagory']=$this->metaCRUD->getcatagory();
            $data['page_name']='newProduct';
            $this->load->view('admin/index',$data);
        }elseif($param1=='add'){
            $filename= $this->uploadFile('product','userfile',$this->input->post('productName'));
            if($filename==FAlSE)
            {
                redirect(base_url().'admin/product/new');
            }
            $data['product']=array(
                'product_description' => $this->input->post('productName'),
                'product_catagoryid' => $this->input->post('catagory_id'),
                'product_pic' => $filename
            );
            $product_id=$this->metaCRUD->addProduct($data);
                $j=count($_POST['name']);
                $insert=array();
                for ($i=0; $i <$j ; $i++) { 
                    $product=array(
                        'name'=>$_POST['name'][$i],
                        'datatype'=>$_POST['datatype'][$i],
                        'lenght'=>$_POST['length'][$i],
                        'product_id'=>$product_id,
                        'max_size'=>$_POST['max_size'][$i],
                        'placedolder'=>$_POST['placeholder'][$i],
                        'required'=>$_POST['required'][$i]
                    );
                    array_push($insert,$product);
                    
                }
                $data['productMeta']=$insert;
                $result=$this->metaCRUD->addProductMeta($data);
                if($result==TRUE)
                {
                    $this->session->set_flashdata('success','Product Added SuccessFully');
                    redirect(base_url().'admin/product/new');  
                }else{
                    $this->session->set_flashdata('error',$result);
                    redirect(base_url().'admin/product/new');  
                }
            
            
            
           
        // var_dump($data);
        }elseif($param1=='view'){
            $data['page_title']='Products';
            $products=$this->metaCRUD->getAllProducts();
            $data['products']=$products;
            $data['page_name']='viewProduct';
            $this->load->view('admin/index',$data);
        }

    }
    public function catagory($param1)
    {
        if($this->session->userdata('login')!=1)
        {
            redirect(base_url().'admin/login');
        }
        if($param1=='new')
        {
            $data['page_title']='New Catagory';
            $data['page_name']='newCatagory';
            $this->load->view('admin/index',$data);
        }elseif($param1=='add'){
            $filename= $this->uploadFile('catagory','userfile',$this->input->post('catagory'));
            if($filename==FAlSE)
            {
                redirect(base_url().'admin/catagory/new');
            }
            $catagory=array(
                'catagory_name' => $this->input->post('catagory'),
                'catagory_Description' => $this->input->post('catdesc'),
                'catagory_pic' => $filename
            );
            $result=$this->metaCRUD->addCatagory($catagory);
            if($result==true)
            {
                $this->session->set_flashdata('success','Product Added SuccessFully');
                redirect(base_url().'admin/catagory/new'); 
            }else{
                $this->session->set_flashdata('error',$result);
                redirect(base_url().'admin/catagory/new');  
            }
        }elseif($param1=='view')
        {
            $data['page_title']='Catagories';
            $data['page_name']='viewCatagory';
            $data['catagory']=$this->metaCRUD->getCatagoryData();
            $this->load->view('admin/index',$data);
        }
    } 
    public function theme($param1)
    {
        if($param1=='new'){
            $data['page_title']='New Theme';
            $data['page_name']='newTheme';
            $this->load->view('admin/index',$data);
        }elseif ($param1=='add') {
            # code...
        }elseif ($param1=='view') {
            $data['page_title']='Themes';
            $data['page_name']='viewTheme';
            $this->load->view('admin/index',$data);
        }
    }
    public function logout(){
		session_destroy();
		unset($_SESSION['access_token']);
		$session_data=array(
				'sess_logged_in'=>0);
		$this->session->set_userdata($session_data);
		redirect(base_url().'admin/login');
    }
    public function uploadFile($type,$file,$name)
	{   
		$config['upload_path']          = './uploads/'.$type.'/';
		$config['file_name'] 			= 	$name;
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 6000;
        $config['max_height']           = 6000;
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('userfile'))
        {
            $this->session->set_flashdata('error',$this->upload->display_errors());
            return FALSE;
           
        }else{
                    
            $image_path=$this->upload->data();
            $file_name=$image_path['file_name'];
            return $file_name;
                    
        }
    }
    public function profile()
    {
        $data['page_title']='Profile';
        $data['page_name']='profile';
        $this->load->view('admin/index',$data);
    }
}
?>
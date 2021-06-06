<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Auth extends CI_Controller 
{
	 function __construct() {
        parent::__construct();
		$this->load->library('google');
		$this->load->library('MY_Form_validation');
		
		$this->load->helper('url');
		$this->load->model('UserCRUD');	
    }
	public function index(){
		$data['google_login_url']=$this->google->get_login_url();
		$this->load->view('home',$data);
	}
	public function setSession($user)
	{
		
		
		
	}
	public function userlogin()
	{
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run()==FALSE) {
			$this->json['status']=false;
			$this->json['message']=$this->form_validation->first_error();
			echo json_encode($this->json);
		} 
		else {
			$data = array(
				'username' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'user_source' => 'local'
			);
			$result = $this->UserCRUD->login($data);
			if ($result == TRUE) 
			{
				$email = $this->input->post('email');
				$user=$this->UserCRUD->getUser($email);
				$this->session->set_userdata('login',1);
				$this->session->set_userdata('user_id',$user[0]->user_id);
				$this->session->set_userdata('user_name',$user[0]->user_name);
				$this->session->set_userdata('user_email',$user[0]->user_email);
				
				
					$this->json['status']=true;
					$this->json['message']='Success';
					echo json_encode($this->json);
				

				
			}
			else{
				$this->json['status']=false;
				$this->json['message']='Invalid Username Or Password';
				echo json_encode($this->json);
			}
		}
	}
	function alpha_dash_space($fname){
		if (! preg_match('/^[a-zA-Z\s]+$/', $fname)) {
			$this->form_validation->set_message('alpha_dash_space', 'The %s field may only contain alpha characters & White spaces');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	function accept_terms() {
		if (isset($_POST['accept_terms'])) return true;
		$this->form_validation->set_message('accept_terms', 'Please read and accept our terms and conditions.');
		return false;
	}
	public function singUp()
	{
		$this->form_validation->set_rules('fname', 'Name', 'callback_alpha_dash_space|required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'password', 'required|min_length[8]|max_length[20]');
		$this->form_validation->set_rules('cpassword', 'cpassword', 'trim|required|matches[password]');
		$this->form_validation->set_rules('accept_terms', '...', 'callback_accept_terms');
		if($this->form_validation->run()==FALSE)
		{
			$this->json['status']=false;
			$this->json['message']=$this->form_validation->first_error();
			echo json_encode($this->json);
			
		}else
		{
			$email=$this->input->post('email');
			if($this->UserCRUD->emailValidation($email)==TRUE)
			{
				$this->json['status']=false;
				$this->json['message']='Email Already Exists';
				echo json_encode($this->json);
			}else{
				$data=array(
					'user_name' => $this->input->post('fname'),
					'user_password' => $this->input->post('password'),
					'user_source' => 'local',
					'user_registerdate' => date("Y/m/d"),
					'user_email' => $this->input->post('email'),
					'user_hash' => md5(rand(0, 1000))
				);
				if($this->UserCRUD->userRegister($data)>0)
				{
					$email = $this->input->post('email');
					$user=$this->UserCRUD->getUser($email);
					$this->session->set_userdata('login',1);
					$this->session->set_userdata('user_id',$user[0]->user_id);
					$this->session->set_userdata('user_name',$user[0]->user_name);
					$this->session->set_userdata('user_email',$user[0]->user_email);
					$this->json['status']=true;
					$this->json['message']='Login SuccesFully';
					echo json_encode($this->json);
				}	
			}
		}
	} 
	public function web_login()
	{
		$data['user'] = array();
		
		$this->load->library('facebook');

		// Check if user is logged in
		if ($this->facebook->is_authenticated())
		{
			// User logged in, get user details
			$user = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email');
			if (!isset($user['error']))
			{
				$data['user'] = $user;
				$this->setSession($data);
				redirect(base_url());
			}else{
				echo 'user not set';
			}

		}else{
			
			redirect($this->facebook->login_url());
		}
		
	}
	public function oauth2callback(){
		$google_data=$this->google->validate();
		
		$email=$google_data['email']; 
		$data = array(
				'user_name'=>$google_data['name'],
				'user_email'=>$google_data['email'],
				'user_source'=>'google',
				'user_registerdate' => date('h-i-s, j-m-y, it is w Day'),
		
			);
		
		if($this->UserCRUD->emailValidation($email)==FALSE)
		{
			$this->UserCRUD->UserRegister($data);
		}
		$user=$this->UserCRUD->getUser($email);
		$this->session->set_userdata('login',1);
					$this->session->set_userdata('user_id',$user[0]->user_id);
					$this->session->set_userdata('user_name',$user[0]->user_name);
					$this->session->set_userdata('user_email',$user[0]->user_email);
		redirect(base_url());
	}
	public function profile()
	{
		$this->load->view('header');
		$this->load->view('profile');
	}
	public function uploadFile($type,$name)
	{
		$config['upload_path']          =  base_url().'assets/uploads/'.$type;
		$config['allowed_types']        = 'jpg|png';
		$config['max_size']             = 100;
		$config['max_width']            = 200;
		$config['max_height']           = 200;

		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload($name))
		{
				return false;
		}
		else
		{
			return true;
		}
	}
	public function logout(){
		session_destroy();
		unset($_SESSION['access_token']);
		$session_data=array(
				'sess_logged_in'=>0);
		$this->session->set_userdata($session_data);
		redirect(base_url());
	}
}
?>
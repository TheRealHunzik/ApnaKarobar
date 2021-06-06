<?php 

/**
* 
*/
class User extends CI_Controller
{
	function __construct()
	{
		# code...
		parent::__construct();
		 $this->load->helper('url','form');
		 $this->load->library('google'); 
	}
	
	public function register()
	{
		if(isset($_POST['register']))
		{
			$this->form_validation->set_rules('fname','Firstname','required');
			$this->form_validation->set_rules('lname','Lastname','required');
			$this->form_validation->set_rules('email','Email','required');
			$this->form_validation->set_rules('contact','Contact','required');
			$this->form_validation->set_rules('password','Password','required|min_length[5]');
			$this->form_validation->set_rules('cpassword','Confirm password','required|min_length[5]|matches[password]');
			if($this->form_validation->run()==TRUE)
			{
				$data = array(
				'first_name' =>$_POST['fname'] , 
				'last_name' => $_POST['lname'], 
				'user_name' => $_POST['fname'],
				'user_email' => $_POST['email'],
				'user_contact' => $_POST['contact'], 
				'user_password' => $_POST['password'], 
				);
				$data = array(
				  'name' => $_POST['fname'],
				  'loggedin' => TRUE
				);
				$this->session->set_userdata($data);
				redirect(base_url(),"refresh");
			}
			else
			{

			}
		}
		$this->load->view('header');
		$this->load->view('signup');
		# code...
	}

	public function destroy()
	{
		$this->session->unset_userdata('login');
		redirect(base_url(),"refresh");
	}
	

}

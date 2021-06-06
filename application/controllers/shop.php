<?php 

/**
* 
*/
class Shop extends CI_Controller
{
	private $site;
	function __construct()
	{
		parent::__construct();
		 $this->load->helper('url');
		 $this->load->model('metaCRUD');
		 $this->load->model('siteCRUD');
		 $this->load->library("stripePayment");
		 $this->load->library("MY_Form_validation");
	}
	// This is the counter function.. 
	function add_count($slug)
	{
		// load cookie helper
			$this->load->helper('cookie');
		// this line will return the cookie which has slug name
		$check_visitor = $this->input->cookie(urldecode($slug), FALSE);
		// this line will return the visitor ip address
			$ip = $this->input->ip_address();
		// if the visitor visit this article for first time then //
		//set new cookie and update article_views column  ..
		//you might be notice we used slug for cookie name and ip 
		//address for value to distinguish between articles  views
			if ($check_visitor == false) {
				$cookie = array(
					"name"   => $slug,
					"value"  => "$ip",
					"expire" =>  time() + 7200,
					"secure" => false
				);
				$this->input->set_cookie($cookie);
				$this->siteCRUD->update_counter($slug);
			}
	}
	public function create()
    {
    	if($this->session->userdata('login')!=1)
    		redirect(base_url().'user/login');
		$this->load->view('header');
		$data['catagory']=$this->metaCRUD->getCatagory();
    	$this->load->view('registerForm',$data);
    	$this->load->view('footer');
    }
    public function site($params1)
    {
		 if ($this->session->userdata('login')!=1) {
		 	redirect(base_url().'user/login');
		 }
		 if($params1=='create')
		 { 	 
			$filename= $this->uploadFile('logos','userfile',$this->input->post('name'));
			$data = array(
				'user_id' =>$this->session->userdata('user_id'),
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
					redirect(base_url());
				
					# code...
				}else{
					echo 'Data Not Added';
				
				}
		 }
	}
	public function index()
	{
		
		$siteID=$this->input->get('id');
		$site=$this->siteCRUD->GetSitebyID($siteID);
		$this->session->set_userdata('currentsite',$site);
		$this->session->set_userdata('siteID',$siteID);
		$data['products']=$this->siteCRUD->getSiteProducts($siteID);
		$data['product']=$this->metaCRUD->getProductByCatagory($site[0]->catagory_id);
		$data['siteID']=$this->input->get('id');
		$data['site']=$site[0];
		$data['page_name']='main';
		// $this->add_count($siteID);
		$this->load->view($site[0]->theme_link.'/index',$data);
	}
	function alpha_dash_space($fname){
		if (! preg_match('/^[a-zA-Z\s]+$/', $fname)) {
			$this->form_validation->set_message('alpha_dash_space', 'The %s field may only contain alpha characters & White spaces');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	public function delivery()
	{
		$this->form_validation->set_rules('cname', 'cname', 'callback_alpha_dash_space|required');
		$this->form_validation->set_rules('disDate', 'disDate', 'required');
		$this->form_validation->set_rules('delDate', 'delDate', 'required');
		$this->form_validation->set_rules('conNo', 'conNo', 'trim|required|alpha_numeric');
		$this->form_validation->set_rules('orderID', 'orderID', 'numeric|required');
		if($this->form_validation->run()==FALSE){
			$this->json['status']=false;
			$this->json['message']=$this->form_validation->first_error();
			echo json_encode($this->json);
		}else{
			$orderID = $this->input->post('orderID');
			$deliveryDetail = array(
				
				'delivery_name' =>  $this->input->post('cname'),
				'dispatch_date' =>  $this->input->post('disDate'),
				'delivery_Date' =>  $this->input->post('delDate'),
				'conNo' =>  $this->input->post('conNo')
			);
			$result=$this->siteCRUD->addDeliveryDetails($deliveryDetail,$orderID);
			if($result==false){
				$this->json['status']=false;
				$this->json['message']=$result;
				echo json_encode($this->json);
			}else{
				$this->json['status']=true;
				$this->json['message']='success';
				echo json_encode($this->json);
			}
		}
	}
	public function compare($param1)
	{
		if($param1=='getProduct')
		{
			$result=$this->metaCRUD->getAllProducts();
			echo json_encode($result);
		}elseif ($param1=='getItem') {
			$proID=$_POST['proID'];
			$result=$this->siteCRUD->getAlItemsByID($proID);
			echo json_encode($result);

		}
		
	}
	public function compareProductMeta()
	{
		$pid=$_POST["proId"];
		$result=$this->siteCRUD->getProductMeta($pid);
		echo json_encode($result);
	}
	public function compareStocktMeta()
	{
		$iid=$_POST["itemId"];
		$result=$this->siteCRUD->getStockMeta($iid);
		echo json_encode($result);
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
						
                        echo $this->upload->display_errors();

                }
                else
                {
					$image_path=$this->upload->data();
                    $file_name=$image_path['file_name'];
                    return $file_name;
                }
	}
	public function getOrderByID()
	{
		$orderID=$this->input->post('orderID');
		$data['orderDetails']=$this->siteCRUD->getOrderDetailByID($orderID);
		$data['orderItems']=$this->siteCRUD->getOrderItemsByID($orderID);
		echo json_encode($data);
	}
	public function cart()
	{
		if($this->session->userdata('user_id')=='')
		{
			redirect(base_url());
		}
		$site=$this->siteCRUD->GetSitebyID($this->session->userdata('siteID'));
		$this->session->set_userdata('currentsite',$site);
		$data['siteID']=$this->session->userdata('siteID');
		$site=$this->session->userdata('currentsite');
		$cartItems=$this->siteCRUD->cartItems();
		$data['items']=$cartItems;
		
		$data['site']=$site[0];
		$data['page_name']='cart';
		$this->load->view($site[0]->theme_link.'/index',$data);

	}
	public function update()
	{
		
	}
	public function getcartItems()
	{
		$cartItems=$this->siteCRUD->cartItems();
		echo json_encode($cartItems);
	}
	public function checkOut($param1)
	{
		if($param1=='stripe'){
			$items=$this->siteCRUD->cartItems();
			$sum = array_sum($items);
			$payament=array(
				"number"=>435783942323,
				"exp_month"=>12,
				"exp_year"=>2021,
				"exp_amount"=>500
			);
			$message =$this->stripePayment->checkout($data);
			$order=array(
				
				`user_id` => $this->session->userdata('user_id'),  
				`site_id`=> $this->session->userdata('siteID'), 
				'payment_method' =>		'Cash On Delivery',
				`order_date` => date(), 
				`order_addtress` =>$this->input->post('address').$this->input->post('city').$this->input->post('state'), 
				`status`=> 'Pending'
			);
		}elseif($param1=='cash'){
			$this->form_validation->set_rules('user_id', 'User ID', 'required|numeric');
			$this->form_validation->set_rules('siteID', 'Site Name', 'required|numeric');
			$this->form_validation->set_rules('amount', 'Total Gross', 'required|numeric');
			$this->form_validation->set_rules('address', 'Address', 'required|callback_alpha_dash_space');
			$this->form_validation->set_rules('city', 'City', 'required|callback_alpha_dash_space');
			$this->form_validation->set_rules('contact', 'Contact No#', 'required|numeric');
			$this->form_validation->set_rules('name', 'Full Name', 'required|callback_alpha_dash_space');
			if ($this->form_validation->run() == FALSE)
            {
				$this->session->set_flashdata('error',$this->form_validation->first_error());
				return;
            }
			$order=array(
				'user_id' => $this->session->userdata('user_id'),  
				'site_id'=> $this->session->userdata('siteID'), 
				'payment_id' => '0',
				'amount' => $this->input->post('amount'),
				'payment_method' =>	'Cash On Delivery',
				'order_date' => date('Y-m-d H:i:s'),
				'order_addtress' =>$this->input->post('address').' '.$this->input->post('city').' '.$this->input->post('state'), 
				'status'=> 'Undelivered'
			);
			
			$orderID=$this->siteCRUD->newOrder($order);
			$items=$this->siteCRUD->cartItems();
			foreach ($items as $item) {
				$orderItem=array(
					'order_id' => $orderID, 
					'stock_id'=> $item->stock_id, 
					'quantity'=> $item->quantity, 
					'amount' => ($item->stock_price * $item->quantity)
				);
				$this->siteCRUD->newOrderItems($orderItem);

			}
			
			
		}
	}
	public function Delete($param1)
	{
		if($param1=='cart')
		{
			$id=$this->input->get('itemID');
			echo $id;
			if($this->siteCRUD->deleteCartItem($id))
			{
				redirect('shop/cart');
			}
		}
	}
	public function addToCart()
	{
		$cart=array(
		'stock_id' => $this->input->post('stock_id'),
		'quantity' => $this->input->post('quantity'),
		'user_id'  => $this->session->userdata('user_id'),
		'site_id'  => $this->session->userdata('siteID')
		);
		$result=$this->siteCRUD->addtocart($cart);
		if($result==TRUE)
		{
			redirect('shop/cart');
		}else{
			$this->session->set_flashdata('error','Not Added');
		}

	}
	
	public function productDetail()
	{ 	
		$data['siteID']=$this->session->userdata('siteID');
		$productID=$this->input->get('product_id');
		$stock=$this->siteCRUD->stockDetails($productID);
		$siteID=$stock[0]->site_id;
		if($this->session->userdata('siteID')=='')
		{
			
			$this->session->set_userdata('siteID',$siteID);
		}
		$site=$this->siteCRUD->GetSitebyID($siteID);
		$this->session->set_userdata('currentsite',$site);
		$data['products']=$this->siteCRUD->getSiteProducts($siteID);
		// $this->add_count($siteID);
		$data['product']=$this->metaCRUD->getProductByCatagory($site[0]->catagory_id);
		$data['siteID']=$this->input->get('id');
		$data['productDetail']=$stock;
		$data['stockMetaDetail']=$this->siteCRUD->productMetaDetails($productID);
		$site=$this->session->userdata('currentsite');
		$data['site']=$site[0];
		
		$data['page_name']='product-details';
		$this->load->view($site[0]->theme_link.'/index',$data);
	
	}
	public function getStockDetail()
	{
		$productID=$this->input->post('stock_id');
		$stock=$this->siteCRUD->stockDetails($productID);
		echo json_encode($stock);
	}
	public function updateStock()
	{
		$this->form_validation->set_rules('stock_des', 'stock_des', 'required');
		$this->form_validation->set_rules('stock_price', 'stock_price', 'required|integer');
		$this->form_validation->set_rules('stock_discount', 'stock_discount', 'required|integer');
		$this->form_validation->set_rules('stock_quantity', 'stock_quantity', 'required|integer');
		$this->form_validation->set_rules('stock_id', 'stock_id', 'required|integer');
		if($this->form_validation->run() == FALSE){
			$this->json['status']=false;
			$this->json['message']=$this->form_validation->first_error();
			echo json_encode($this->json);
		}
		else{
			$id = $this->input->post('stock_id');
			$update = array(
				'stock_des' => $this->input->post('stock_des') ,
				'stock_price' => $this->input->post('stock_price'),
				'stock_dis' => $this->input->post('stock_discount'),
				'quantity' => $this->input->post('stock_quantity') 
			);
			$status=$this->siteCRUD->updatestock($update,$id);
			if($status===TRUE){
				$this->json['status']=true;
				$this->json['message']='Update SuccesFully';
				echo json_encode($this->json);
			}else{
				$this->json['status']=false;
				$this->json['message']=$this->db->error();
				echo json_encode($this->json);
			}
		}
	}
	public function sendEmail()
	{
		$email=$this->input->post('email');
		//generate simple random code
		$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$code = substr(str_shuffle($set), 0, 12);
			//set up email
			$config = array(
				'protocol' => 'smtp',
				'smtp_host' => 'ssl://smtp.googlemail.com',
				'smtp_port' => 465,
				'smtp_user' => '<a href="mailto:alyhunzik@gmail.com" rel="nofollow">testsourcecodester@gmail.com</a>', // change it to yours
				'smtp_pass' => 'aquamarine8162	', // change it to yours
				'mailtype' => 'html',
				'charset' => 'iso-8859-1',
				'wordwrap' => TRUE
		  );

		  $message = 	"
					  <html>
					  <head>
						  <title>Verification Code</title>
					  </head>
					  <body>
						  <h2>Thank you for Registering.</h2>
						  <p>Your Account:</p>
						  <p>Email: ".$email."</p>
						  <p>Please click the link below to activate your account.</p>
						  <h4><a href='".base_url()."shop/activate/".$id."/".$code."'>Activate My Account</a></h4>
					  </body>
					  </html>
					  ";

		  $this->load->library('email', $config);
		  $this->email->set_newline("\r\n");
		  $this->email->from($config['smtp_user']);
		  $this->email->to($email);
		  $this->email->subject('Signup Verification Email');
		  $this->email->message($message);

		  //sending email
		  if($this->email->send()){
			  $this->session->set_flashdata('message','Activation code sent to email');
		  }
		  else{
			  $this->session->set_flashdata('message', $this->email->print_debugger());

		  }

	}
	public function activate(){
		$id =  $this->uri->segment(3);
		$code = $this->uri->segment(4);
 
		//fetch user details
		$user = $this->users_model->getUser($id);
 
		//if code matches
		if($user['code'] == $code){
			//update user active status
			$data['active'] = true;
			$query = $this->users_model->activate($data, $id);
 
			if($query){
				$this->session->set_flashdata('message', 'User activated successfully');
			}
			else{
				$this->session->set_flashdata('message', 'Something went wrong in activating account');
			}
		}
		else{
			$this->session->set_flashdata('message', 'Cannot activate account. Code didnt match');
		}
 
		redirect('register');
 
	}
	
	public function indexId()
	{
		$result=$this->siteCRUD->getSiteById($siteId);
		return $result;
	}
	
}
?>
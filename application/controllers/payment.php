<?php 

/**
* 
*/
class Index extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library("stripePayment");
    }
    public function stripeCheckOut()
    {
        $data=array(
            "number"=>$this->input->post('cardnumber'),
            "exp_month"=>$this->input->post('expirymonth'),
            "exp_year"=>$this->input->post('expiryyear'),
            "exp_amount"=>$this->input->post('amount')
        );
        $message =$this->stripePayment->checkout($data);
    }
}
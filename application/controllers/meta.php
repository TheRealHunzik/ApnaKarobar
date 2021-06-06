<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Admin controller class
 */

class Admin extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
		 $this->load->helper('url');
		 $this->load->model('metaCRUD');
		 $this->load->model('siteCRUD');
    }
    public function addcatagory()
    {
        
    }
    public function getAllCatagories()
    {
        
    }
}
?>
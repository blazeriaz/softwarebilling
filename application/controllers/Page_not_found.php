<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Page_not_found extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		 
		$this->load->library('form_validation');
		$this->load->language(array('flash_message','form_validation'), 'english');			
		$this->load->model(array('base_model')); 
		
		$this->load->helper('frontend_helper');
	}
	public function index()
	{
		$this->load->library('user_agent');
		$this->output->set_status_header('404');
		$data['main_content'] = 'index_err';
		$data['page_title']  = 'Target USMLE 404 page';  
		//$this->load->view(SITE_LAYOUT_PATH, $data);
		$this->load->view('index_err');
	} 
	
}

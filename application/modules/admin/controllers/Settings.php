<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->language(array('flash_message','form_validation'), 'english');
		$this->load->helper('thumb_helper');
		$this->load->helper('html');
		if(!$this->session->has_userdata('admin_is_logged_in'))
		{
			redirect(SITE_ADMIN_URI);
		}
		$this->load->helper('function_helper');
		$this->load->model('base_model'); 
	}
	public function index($id = 1)
	{

		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			save_site_settings('settings',$this->lang->line('update_record'));
		}
		
		$site_settings_cond[] = array( TRUE, 'is_show', 1);
		$site_settings_categories_cond[] = array(TRUE,'is_show',1);
		$site_settings_categories_cond[] = array(TRUE,'is_active',1);
		$data = list_site_settings($site_settings_cond,$site_settings_categories_cond);

		$data['main_content'] = 'settings';
		$data['page_title']  = 'Settings';
		$this->load->view(ADMIN_LAYOUT_PATH, $data); 	
	}
	function valid_url($url, $field_name)
	{
		if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
		    $this->form_validation->set_message('valid_url', 'Enter valid '.$field_name);
		    return FALSE;
		}else{
			return TRUE;
		}
	}
	function valid_phone($no, $field_name)
	{
	    $this->form_validation->set_message('valid_phone', 'Enter valid '.$field_name);
		return FALSE;
	}
}

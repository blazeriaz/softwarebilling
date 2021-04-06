<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->language(array('flash_message','form_validation'), 'english');
		if(!$this->session->has_userdata('admin_is_logged_in'))
		{
			redirect(SITE_ADMIN_URI);
		}
		//getSearchDetails($this->router->fetch_class());
		$this->load->helper('function_helper');
		$this->load->model('base_model');

	}
	public function index($page_num = 1)
	{  
		$search_name_keyword  =  isset($_POST['search_name'])?trim($_POST['search_name']):(isset($_SESSION['contact_search_name'])?$_SESSION['contact_search_name']:'');
		$this->session->set_userdata('contact_search_name', $search_name_keyword); 		
		$keyword_name_session = $this->session->userdata('contact_search_name');
		if($keyword_name_session != '')
		{
			$keyword_name = $this->session->userdata('contact_search_name');
		}
		else
		{
			isset($_SESSION['contact_search_name'])?$this->session->unset_userdata('contact_search_name'):'';
			$keyword_name = "";
		}
		$this->load->helper('thumb_helper');
		$this->load->helper('html');
		$this->load->library('pagination');
		$config  = $this->config->item('back_pagination');
		
		$config["base_url"] = base_url().SITE_ADMIN_URI."/contact_us/index";
		$data["per_page"] = $config["per_page"] = $this->config->item('admin_page_per_limit'); 
		$config["uri_segment"] = 4;
		$data['limit_end'] = $limit_end = ($page_num - 1) * $config['per_page'];  
		$limit_start = $config['per_page'];
		$where = array();  
		if($keyword_name)
		{
			$where[] = array( TRUE, 'e.name LIKE ', '%'.$keyword_name.'%' );
			$data['keyword_name'] = $keyword_name;
		}
		else{
			$data['keyword_name'] = "";
		}

		$join_tables[] = array('users u','u.id = e.user_id','LEFT');
 		$fields = 'e.id,e.name,e.email_id,e.phone_number,e.created,e.is_read';
		$data['total_rows'] = $config['total_rows'] = $this->base_model->get_advance_list('enquiry_form e', $join_tables, $fields, $where, 'num_rows','','','e.id');
		$data['contact_us'] = $this->base_model->get_advance_list('enquiry_form e', '', $fields, $where, '', 'e.id', 'desc', 'e.id', $limit_start, $limit_end);

		$this->pagination->initialize($config);
		$data['main_content'] = 'contact_us/index';
		$data['page_title']  = 'Contact Us'; 
		$this->load->view(ADMIN_LAYOUT_PATH, $data); 	

	}
	public function reset()
	{
		$this->session->unset_userdata('contact_search_name');
		redirect(base_url().SITE_ADMIN_URI.'/contact_us/');
	}
	public function validate_select($val, $fieldname){
		if($val==""){
			$this->form_validation->set_message('validate_select', 'Please choose the '.$fieldname.'.');
			return FALSE;
		}			
	}
	
	public function view($id = NULL){
		$status_data = array('is_read' => '1');
		$this->base_model->update_status($id, $status_data, 'enquiry_form');
 		$join_tables[] = array('users u','u.id = e.user_id','left');
 		$fields = 'e.id,e.name,e.user_id,e.email_id as email,e.phone_number,e.created,e.is_read,e.comments,u.id,u.first_name,u.last_name,u.email_id';
		$where[] = array( TRUE, 'e.id', $id);

		$data['contact_us'] = $this->base_model->get_advance_list('enquiry_form e', $join_tables, $fields, $where, '', 'e.id', 'desc', 'e.id', '','');

			$data['main_content'] = 'contact_us/view';
		  	$data['page_title']  = 'View Contact';  
			$this->load->view(ADMIN_LAYOUT_PATH, $data); 	
		}
	function update_status($id,$status,$pageredirect,$pageno)
	{
		$table_name = 'enquiry_form';
		change_status($table_name,$id,$status,$pageredirect,$pageno);
		$this->session->set_flashdata('flash_message', $this->lang->line('update_record'));
		redirect(base_url().SITE_ADMIN_URI.'/contact_us/'.$pageredirect.'/'.$pageno.'/'.$fieldsorts.'/'.$typesorts);
	}
	 
	function bulkactions($pageredirect=null,$pageno){
		
		$fieldsorts = $this->input->get('sortingfied');
		$typesorts = $this->input->get('sortype');
		$bulk_type= $this->input->post('more_action_id');
		$bulk_ids= $this->input->post('checkall_box');
		if($bulk_type == 1){
			foreach($bulk_ids as $id) {
				$data = array('status' => '1');
				$this->base_model->update_status($id, $data, 'product');
			}
			$this->session->set_flashdata('flash_message', $this->lang->line('bulk_enabled') );
		}
		else if($bulk_type == 2){
			foreach($bulk_ids as $id) {
				$data = array('status' => '0');
				$this->base_model->update_status($id, $data, 'product');
			}
			$this->session->set_flashdata('flash_message', $this->lang->line('bulk_disabled') );
		}
		else if($bulk_type == 3)
		{
			foreach($bulk_ids as $id) 
			{
 
				 
				$this->base_model->delete('enquiry_form', array('id' => $id));
				
			
			}
			$this->session->set_flashdata('flash_message', $this->lang->line('bulk_deleted') );
		}
		else {
			$this->session->set_flashdata('flash_message', $this->lang->line('edit_error') );
			redirect(base_url().SITE_ADMIN_URI.'/contact_us/'.$pageredirect.'/'.$pageno.'/'.$fieldsorts.'/'.$typesorts);
		}
		redirect(base_url().SITE_ADMIN_URI.'/contact_us/'.$pageredirect.'/'.$pageno.'/'.$fieldsorts.'/'.$typesorts);
	}
	function valid_url($url, $field_name){	
	if($url){
		if (filter_var($url, FILTER_VALIDATE_URL) === FALSE) {
		    $this->form_validation->set_message('valid_url', 'Enter valid '.$field_name);
		    return FALSE;
		}else{
			return TRUE;
		}
	}else{
		return FALSE;
	}
	}

	public function delete($id,$pageredirect=null,$pageno) 
	{
		 
		$this->base_model->delete ('enquiry_form',array('id' => $id));
		$this->session->set_flashdata('flash_message', $this->lang->line('delete_record') );
		redirect(base_url().SITE_ADMIN_URI.'/contact_us/'.$pageredirect.'/'.$pageno.'/'.$fieldsorts.'/'.$typesorts);
	}



}

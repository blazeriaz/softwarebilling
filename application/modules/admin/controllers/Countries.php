<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Countries extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation','csv_import'));
		$this->load->language(array('flash_message','form_validation'), 'english');
		if(!$this->session->has_userdata('admin_is_logged_in'))
		{
			redirect(SITE_ADMIN_URI);
		}
		$this->load->helper('function_helper');
		$this->load->model('base_model'); 
	}
	public function index($page_num = 1)
	{  
		$search_name_keyword  = isset($_POST['search_name'])?trim($_POST['search_name']):(isset($_SESSION['countries_search_name'])?$_SESSION['countries_search_name']:'');
		$this->session->set_userdata('countries_search_name', $search_name_keyword); 		
		$keyword_name_session = $this->session->userdata('countries_search_name');
		if($keyword_name_session != '')
		{
			$keyword_name = $this->session->userdata('countries_search_name');
		}
		else
		{
			isset($_SESSION['countries_search_name'])?$this->session->unset_userdata('countries_search_name'):'';
			$keyword_name = "";
		}
		$this->load->helper('thumb_helper');
		$this->load->helper('html');
		$this->load->library('pagination');
		$config  = $this->config->item('back_pagination');
		$config["base_url"] = base_url().SITE_ADMIN_URI."/countries/index";
		$data["per_page"] = $config["per_page"] = $this->config->item('admin_page_per_limit'); 
		$config["uri_segment"] = 4;
		$data['limit_end'] = $limit_end = ($page_num - 1) * $config['per_page'];  
		$limit_start = $config['per_page'];
		$join_tables = $where = array();
		if($keyword_name)
		{
			$where[] = array( FALSE,"(name LIKE '%$keyword_name%' or country_code LIKE '%$keyword_name%')");
			$data['keyword_name'] = $keyword_name;
		}
		else{
			$data['keyword_name'] = "";
		}  
		$fields = 'id, name,country_code,status'; 			  	
		$data['total_rows'] = $config['total_rows'] = $this->base_model->get_advance_list('countries', $join_tables, $fields, $where, 'num_rows','','','id');
		$data['countries'] = $this->base_model->get_advance_list('countries', '', $fields, $where, '', 'name', 'asc', 'id', $limit_start, $limit_end);
		$this->pagination->initialize($config);
		$data['main_content'] = 'countries/index';
		$data['page_title']  = 'Countries'; 
		$this->load->view(ADMIN_LAYOUT_PATH, $data); 	

	}
	public function reset()
	{
		$this->session->unset_userdata('countries_search_name');
		redirect(base_url().SITE_ADMIN_URI.'/countries/');
	}
	public function validate_select($val, $fieldname){
		if($val==""){
			$this->form_validation->set_message('validate_select', 'Please choose the '.$fieldname.'.');
			return FALSE;
		}			
	}
	public function add()
	{

		$data['css'] = $data['js'] = array();		
		$data['css'][]='assets/themes/css/jquery-ui.min.css';
		$data['js'][]='assets/themes/js/jquery-ui.min.js';

		$this->load->helper('thumb_helper');
		$this->load->helper('html');
		$data['post'] = FALSE;
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{ 
			$this->form_validation->set_rules('name', 'Name','trim|required|callback_alpha_space|max_length[35]|is_unique[countries.name]');
			$this->form_validation->set_rules('country_code', 'Country Code','trim|required|callback__alpha|is_unique[countries.country_code]');
			
			if ($this->form_validation->run())
			{   
				$date = date('Y-m-d H:i:s');
				
				$update_array = array (	'name' => $this->input->post('name'),
										'slug' => create_slug($this->input->post('name'),'countries'),
										'country_code' => $this->input->post('country_code'),
										'status' => $this->input->post('status')
									  );
				$this->base_model->insert( 'countries', $update_array);
				$this->session->set_flashdata('flash_message', $this->lang->line('add_record'));
				redirect(base_url().SITE_ADMIN_URI.'/countries/');
				
			}
			$data['post'] = TRUE;
		}
		$data['main_content'] = 'countries/add';
		$data['page_title']  = 'Add Countries'; 
		$this->load->view(ADMIN_LAYOUT_PATH, $data); 	
	}
	
	function alpha_space($str)
	{
		//return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
				
		//if (! preg_match('/^[a-zA-Z\s]+$/', $str)) {}
		if (! preg_match("/^([a-zA-Z ])+$/i", $str)) {
			$this->form_validation->set_message('alpha_space', 'The %s field may only contain alpha characters & White spaces');
			return FALSE;
		} else {
			return TRUE;
		}		
	} 
	
	
	function _alpha($str)
	{
		if (! preg_match("/^([a-zA-Z])+$/i", $str)) {
			$this->form_validation->set_message('_alpha', 'The %s field may only contain alpha characters');
			return FALSE;
		} else {
			return TRUE;
		}		
	} 
	
	public function edit($id = NULL)
	{
		$this->load->helper('thumb_helper');
		$this->load->helper('html');
		$data['post'] = FALSE;
		$join_tables = $where = array(); 
		$where[] = array( TRUE, 'id', $id);
		$fields = 'name,country_code'; 
		$getValues = $this->base_model->get_advance_list('countries', $join_tables, $fields, $where, 'row_array');
		
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			if($this->input->post('name') != $getValues['name']) {
				$is_unique_name =  '|is_unique[countries.name]' ;
			} else {
				$is_unique_name =  '' ;
			}
			if($this->input->post('country_code') != $getValues['country_code']) {
				$is_unique_code =  '|is_unique[countries.country_code]' ;
			} else {
				$is_unique_code =  '' ;
			}
	      	$this->form_validation->set_rules('name', 'Name', 'trim|required|callback_alpha_space|max_length[35]'.$is_unique_name);
			$this->form_validation->set_rules('country_code', 'Country Code','trim|required|callback__alpha'.$is_unique_code);
			//$this->form_validation->set_message('alpha_space', 'The %s field may only contain alpha characters & White spaces');
			
			if ($this->form_validation->run())
			{  
				$date = date('Y-m-d H:i:s');
				
				$update_array = array (	'name' => $this->input->post('name'),
										'country_code' => $this->input->post('country_code'),
										'status' => $this->input->post('status')
									);

				if(($this->input->post('name') != $getValues['name'])){
					$update_array['slug'] = create_slug($this->input->post('name'),'countries');
				}

				$this->base_model->update ( 'countries', $update_array, array('id'=>$id));
				$this->session->set_flashdata('flash_message', $this->lang->line('update_record'));
				redirect(base_url().SITE_ADMIN_URI.'/countries/');
			}
				$data['post'] = TRUE;
			}
		
		$join_tables = $where = array();  
		$fields = 'id, name, country_code,status'; 
		$where[] = array( TRUE, 'id', $id);
		$data['countries'] = $this->base_model->get_advance_list('countries', $join_tables, $fields, $where, 'row_array');
		$data['main_content'] = 'countries/edit';
		$data['page_title']  = 'Edit Countries'; 
		$this->load->view(ADMIN_LAYOUT_PATH, $data); 	
	}
	function update_status($id,$status,$pageredirect,$pageno)
	{
		$table_name = 'countries';
		change_status($table_name,$id,$status,$pageredirect,$pageno);
		$this->session->set_flashdata('flash_message', $this->lang->line('update_record'));
		redirect(base_url().SITE_ADMIN_URI.'/countries/'.$pageredirect.'/'.$pageno.'/'.$fieldsorts.'/'.$typesorts);
	}
	public function delete($id,$pageredirect=null,$pageno) 
	{
		$this->base_model->delete ('countries',array('id' => $id));
		$this->session->set_flashdata('flash_message', $this->lang->line('delete_record') );
		redirect(base_url().SITE_ADMIN_URI.'/countries/'.$pageredirect.'/'.$pageno.'/'.$fieldsorts.'/'.$typesorts);
	}
	function bulkactions($pageredirect=null,$pageno){
		
		$fieldsorts = $this->input->get('sortingfied');
		$typesorts = $this->input->get('sortype');
		$bulk_type= $this->input->post('more_action_id');
		$bulk_ids= $this->input->post('checkall_box');
		if($bulk_type == 1){
			foreach($bulk_ids as $id) {
				$data = array('status' => '1');
				$this->base_model->update_status($id, $data, 'countries');
			}
			$this->session->set_flashdata('flash_message', $this->lang->line('bulk_enabled') );
		}
		else if($bulk_type == 2){
			foreach($bulk_ids as $id) {
				$data = array('status' => '0');
				$this->base_model->update_status($id, $data, 'countries');
			}
			$this->session->set_flashdata('flash_message', $this->lang->line('bulk_disabled') );
		}
		else if($bulk_type == 3)
		{
			foreach($bulk_ids as $id) 
			{
				$this->base_model->delete('countries', array('id' => $id));
			
			}
			$this->session->set_flashdata('flash_message', $this->lang->line('bulk_deleted') );
		}
		else {
			$this->session->set_flashdata('flash_message', $this->lang->line('edit_error') );
			redirect(base_url().SITE_ADMIN_URI.'/countries/'.$pageredirect.'/'.$pageno.'/'.$fieldsorts.'/'.$typesorts);
		}
		redirect(base_url().SITE_ADMIN_URI.'/countries/'.$pageredirect.'/'.$pageno.'/'.$fieldsorts.'/'.$typesorts);
	}
	
}

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cities extends Admin_Controller
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
		$search_name_keyword  = isset($_POST['search_name'])?trim($_POST['search_name']):(isset($_SESSION['cities_search_name'])?$_SESSION['cities_search_name']:'');
		$this->session->set_userdata('cities_search_name', $search_name_keyword);
		$keyword_name_session = $this->session->userdata('cities_search_name');
		if($keyword_name_session != '')
		{
			$keyword_name = $this->session->userdata('cities_search_name');
		}
		else
		{
			isset($_SESSION['cities_search_name'])?$this->session->unset_userdata('cities_search_name'):'';
			$keyword_name = "";
		}

		$search_country_keyword  = isset($_POST['search_country'])?trim($_POST['search_country']):(isset($_SESSION['cities_search_country'])?$_SESSION['cities_search_country']:'');
		$this->session->set_userdata('cities_search_country', $search_country_keyword);
		$search_country_session = $this->session->userdata('cities_search_country');
		if($search_country_session != '')
		{
			$search_country = $this->session->userdata('cities_search_country');
		}
		else
		{
			isset($_SESSION['cities_search_country'])?$this->session->unset_userdata('cities_search_country'):'';
			$search_country = "";
		}

		$this->load->helper('thumb_helper');
		$this->load->helper('html');
		$this->load->library('pagination');
		$config  = $this->config->item('back_pagination');
		$config["base_url"] = base_url().SITE_ADMIN_URI."/cities/index";
		$data["per_page"] = $config["per_page"] = $this->config->item('admin_page_per_limit'); 
		$config["uri_segment"] = 4;
		$data['limit_end'] = $limit_end = ($page_num - 1) * $config['per_page'];  
		$limit_start = $config['per_page'];
		$join_tables = $where = array();
		if($keyword_name)
		{
			$where[] = array( FALSE,"(ci.name LIKE '%$keyword_name%' or ci.city_code LIKE '%$keyword_name%')");
			$data['keyword_name'] = $keyword_name;
		}
		else{
			$data['keyword_name'] = "";
		}
		if($search_country)
		{
			$where[] = array( FALSE,"(ci.country_id = '".$search_country."')");
			$data['keyword_search_country'] = $search_country;
		}
		else{
			$data['keyword_search_country'] = "";
		}
		
		$fields = 'ci.id,ci.name as city_name,ci.city_code,co.name as country_name,ci.status';
		$join_tables[] = array('countries co','co.id=ci.country_id','inner');
		$data['total_rows'] = $config['total_rows'] = $this->base_model->get_advance_list('cities ci', $join_tables, $fields, $where, 'num_rows','','','ci.id');
		$data['cities'] = $this->base_model->get_advance_list('cities ci', $join_tables, $fields, $where, '', 'ci.id', 'desc', 'ci.id', $limit_start, $limit_end);
		$this->pagination->initialize($config);
		$data['countries_list'] = $this->base_model->getArrayList('countries');
		$data['main_content'] = 'cities/index';
		$data['page_title']  = 'Areas'; 
		$this->load->view(ADMIN_LAYOUT_PATH, $data); 	

	}
	public function reset()
	{
		$this->session->unset_userdata('cities_search_name');
		$this->session->unset_userdata('cities_search_country');
		redirect(base_url().SITE_ADMIN_URI.'/cities/');
	}
	public function validate_select($val, $fieldname){
		if($val==""){
			$this->form_validation->set_message('validate_select', 'Please choose the '.$fieldname.'.');
			return FALSE;
		}		
		return TRUE;
	}
	public function validate_city_name($name, $fieldname){
		$country_id = $this->input->post('country_id');	
		//echo $country_id;die;
		if($country_id && $country_id==null){
			$list = $this->base_model->getArrayList('cities',array('country_id'=>$country_id));
			unset($list['']);
			function formatize($a){
				return strtolower(trim($a));
			}
			$list = array_map('formatize',$list);
			if(in_array(strtolower(trim($name)),$list)){
				$this->form_validation->set_message('validate_city_name', 'This '.$fieldname.' already exists.Please enter unique '.$fieldname.'.');
				return FALSE;
			}
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function validate_city_code($code, $fieldname){
		$country_id = $this->input->post('country_id');	
		$list = $this->base_model->getArrayList('cities',array('country_id'=>$country_id),'','id,city_code');
		unset($list['']);		
		$list = array_map('formatize',$list);
		if(in_array(strtolower(trim($code)),$list)){
			$this->form_validation->set_message('validate_city_code', 'This '.$fieldname.' already exists. Please enter unique '.$fieldname.'.');
			return FALSE;
		}
		return TRUE;
	}
	
	
	public function unique_city_add($field_name,$country_id)
	{	
		$this->db->select('*');
		$this->db->from('cities');
		$array = array('name' => $field_name, 'country_id' => $country_id);
		$this->db->where($array);	
		$query = $this->db->get();
		$num = $query->num_rows();	
		if ($num >= 1)
		{
			$this->form_validation->set_message('unique_city_add', 'This %s already exists. Please enter unique Name.');
			return FALSE;
		}
		else
		{
			return TRUE;
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
			$country_id = $this->input->post('country_id');
	      	//$this->form_validation->set_rules('name', 'Name', 'trim|required|callback_alpha_space|max_length[35]|callback_validate_city_name[Name]|callback_unique_city_add['.$country_id.']');
			$this->form_validation->set_rules('name', 'Name', 'trim|required|callback_alpha_space|max_length[35]|callback_unique_city_add['.$country_id.']');
			//$this->form_validation->set_rules('city_code', 'City Code','trim|required|max_length[35]|callback_validate_city_code[City Code]');
			//$this->form_validation->set_rules('country_id', 'Country','trim|callback_validate_select[Country]');
			$this->form_validation->set_rules('country_id', 'Country','trim|required|callback_validate_select['.$country_id.']', array('required' => 'Please enter the %s.'));
			
			if ($this->form_validation->run())
			{   
				$date = date('Y-m-d H:i:s');
				
				$update_array = array (	'name' => $this->input->post('name'),
										'slug' => create_slug($this->input->post('name'),'cities'),
										//'city_code' => $this->input->post('city_code'),
										'country_id' => $this->input->post('country_id'),
										'status' => $this->input->post('status')
									  );
				$this->base_model->insert( 'cities', $update_array);
				$this->session->set_flashdata('flash_message', $this->lang->line('add_record'));
				redirect(base_url().SITE_ADMIN_URI.'/cities/');
				
			}
			$data['post'] = TRUE;
		}
		//$data['countries_list'] = $this->base_model->getSelectList('countries');
		$data['countries_list'] = array(1=>'India');
		$data['main_content'] = 'cities/add';
		$data['page_title']  = 'Add Cities'; 
		$this->load->view(ADMIN_LAYOUT_PATH, $data); 	
	}
		
	function alpha_space($str)
	{
		if (! preg_match("/^([a-zA-Z ])+$/i", $str)) {
			$this->form_validation->set_message('alpha_space', 'The %s field may only contain alpha characters & White spaces');
			return FALSE;
		} else {
			return TRUE;
		}		
	} 
	
	public function unique_city_edit($field_name, $second_param)
	{
		//list($parent, $id) = split('||', $second_param);
		$second_param = explode("|||", $second_param);
		$country_id = $second_param[0];
		$id = $second_param[1];
		$this->db->select('*');
		$this->db->from('cities');	
		$array = array('id !=' => $id, 'name' => $field_name, 'country_id' => $country_id);
		$this->db->where($array);	
		$query = $this->db->get();
		$num = $query->num_rows();			
		if ($num >= 1)
		{
			$this->form_validation->set_message('unique_city_edit', 'This %s already exists. Please enter unique Name.');
			return FALSE;
		}
		else
		{
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
		$fields = 'name,city_code,country_id'; 
		$getValues = $this->base_model->get_advance_list('cities', $join_tables, $fields, $where, 'row_array');
		
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			if(($this->input->post('name') != $getValues['name']) || ($this->input->post('country_id') != $getValues['country_id']) ) {
				$is_unique_name =  '|callback_validate_city_name[Name]' ;
			} else {
				$is_unique_name =  '' ;
			}
			if(($this->input->post('city_code') != $getValues['city_code']) || ($this->input->post('country_id') != $getValues['country_id'])) {
				$is_unique_code =  '|callback_validate_city_code[City Code]' ;
			} else {
				$is_unique_code =  '' ;
			}
	      	//$this->form_validation->set_rules('name', 'Name', 'trim|required|callback_alpha_space|max_length[35]'.$is_unique_name);
			
			$country_id = $this->input->post('country_id');
			$second_parameter = $country_id . '|||' . $id;
	      	$this->form_validation->set_rules('name', 'Name', 'trim|required|callback_alpha_space|max_length[35]|callback_unique_city_edit['.$second_parameter.']');
			//$this->form_validation->set_rules('city_code', 'City Code','trim|required|max_length[35]'.$is_unique_code);
			$this->form_validation->set_rules('country_id', 'Country','trim|callback_validate_select[Country]');

			
			if ($this->form_validation->run())
			{  
				$date = date('Y-m-d H:i:s');
				
				$update_array = array (	'name' => $this->input->post('name'),
										//'city_code' => $this->input->post('city_code'),
										'country_id' => $this->input->post('country_id'),
										'status' => $this->input->post('status')
									);
				if(($this->input->post('name') != $getValues['name'])){
					$update_array['slug'] = create_slug($this->input->post('name'),'cities');
				}
					$this->base_model->update ( 'cities', $update_array, array('id'=>$id));
					$this->session->set_flashdata('flash_message', $this->lang->line('update_record'));
					redirect(base_url().SITE_ADMIN_URI.'/cities/');
			}
				$data['post'] = TRUE;
			}
		
		$join_tables = $where = array();
		$join_tables[] = array('countries co','co.id=ci.country_id','inner');
		$fields = 'ci.id, ci.name as city_name,ci.city_code,ci.country_id,ci.status,co.name as country_name'; 
		$where[] = array( TRUE, 'ci.id', $id);
		$data['cities'] = $this->base_model->get_advance_list('cities ci', $join_tables, $fields, $where, 'row_array');
		$data['countries_list'] = $this->base_model->getArrayList('countries');
		$data['main_content'] = 'cities/edit';
		$data['page_title']  = 'Edit Cities'; 
		$this->load->view(ADMIN_LAYOUT_PATH, $data); 	
	}
	function update_status($id,$status,$pageredirect,$pageno)
	{
		$table_name = 'cities';
		change_status($table_name,$id,$status,$pageredirect,$pageno);
		$this->session->set_flashdata('flash_message', $this->lang->line('update_record'));
		redirect(base_url().SITE_ADMIN_URI.'/cities/'.$pageredirect.'/'.$pageno.'/'.$fieldsorts.'/'.$typesorts);
	}
	public function delete($id,$pageredirect=null,$pageno) 
	{
		$this->base_model->delete ('cities',array('id' => $id));
		$this->session->set_flashdata('flash_message', $this->lang->line('delete_record') );
		redirect(base_url().SITE_ADMIN_URI.'/cities/'.$pageredirect.'/'.$pageno.'/'.$fieldsorts.'/'.$typesorts);
	}
	function bulkactions($pageredirect=null,$pageno){
		
		$fieldsorts = $this->input->get('sortingfied');
		$typesorts = $this->input->get('sortype');
		$bulk_type= $this->input->post('more_action_id');
		$bulk_ids= $this->input->post('checkall_box');
		if($bulk_type == 1){
			foreach($bulk_ids as $id) {
				$data = array('status' => '1');
				$this->base_model->update_status($id, $data, 'cities');
			}
			$this->session->set_flashdata('flash_message', $this->lang->line('bulk_enabled') );
		}
		else if($bulk_type == 2){
			foreach($bulk_ids as $id) {
				$data = array('status' => '0');
				$this->base_model->update_status($id, $data, 'cities');
			}
			$this->session->set_flashdata('flash_message', $this->lang->line('bulk_disabled') );
		}
		else if($bulk_type == 3)
		{
			foreach($bulk_ids as $id) 
			{
				$this->base_model->delete('cities', array('id' => $id));
			
			}
			$this->session->set_flashdata('flash_message', $this->lang->line('bulk_deleted') );
		}
		else {
			$this->session->set_flashdata('flash_message', $this->lang->line('edit_error') );
			redirect(base_url().SITE_ADMIN_URI.'/cities/'.$pageredirect.'/'.$pageno.'/'.$fieldsorts.'/'.$typesorts);
		}
		redirect(base_url().SITE_ADMIN_URI.'/cities/'.$pageredirect.'/'.$pageno.'/'.$fieldsorts.'/'.$typesorts);
	}
	
}

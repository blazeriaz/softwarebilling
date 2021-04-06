<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase_users extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation','email_template'));
		$this->load->language(array('flash_message','form_validation'), 'english');
		$this->load->helper('profile_helper');
		if(!$this->session->has_userdata('admin_is_logged_in'))
		{
			redirect(SITE_ADMIN_URI);
		}
		
		$this->load->helper('function_helper');
		$this->load->helper('html');
		$this->load->helper('thumb_helper');
		$this->load->model('base_model'); 
	}
	public function index($page_num = 1)
	{  		
		$search_name_keyword  = isset($_POST['search_name'])?trim($_POST['search_name']):(isset($_SESSION['users_search_name'])?$_SESSION['users_search_name']:'');
		$this->session->set_userdata('users_search_name', $search_name_keyword); 		
		$keyword_name_session = $this->session->userdata('users_search_name');
		if($keyword_name_session != ''){
			$keyword_name = $this->session->userdata('users_search_name');
		}else{
			isset($_SESSION['users_search_name'])?$this->session->unset_userdata('users_search_name'):'';
			$keyword_name = "";
		}
		
		$sorting_order_post  = isset($_POST['sorting_order'])?trim($_POST['sorting_order']):(isset($_SESSION['users_sorting_order'])?$_SESSION['users_sorting_order']:'');
		$this->session->set_userdata('users_sorting_order', $sorting_order_post);
		$sorting_order_sess = $this->session->userdata('users_sorting_order');
		if($sorting_order_sess){
			$sorting_order = $this->session->userdata('users_sorting_order');
		}else{
			isset($_SESSION['users_sorting_order'])?$this->session->unset_userdata('users_sorting_order'):'';
			$sorting_order = "";
		}
				
		$this->load->library('pagination');
		$config = $this->config->item('back_pagination');
		$config["base_url"] = base_url().SITE_ADMIN_URI."/purchase_users/index";
		$data["per_page"] = $config["per_page"] = $this->config->item('admin_page_per_limit');
		$config["uri_segment"] = 4;
		$data['limit_end'] = $limit_end = ($page_num - 1) * $config['per_page'];  
		$limit_start = $config['per_page'];
		$join_tables = array();
		$where = array();
		
		if($keyword_name){
			$where[] = array( FALSE,"(first_name LIKE '%$keyword_name%' OR phone_no LIKE '%$keyword_name%' OR skype_id LIKE '%$keyword_name%')");
			
			 
			$data['keyword_name'] = $keyword_name;
		}else{
			$data['keyword_name'] = "";
		}
		
		$data['sorting_order']=$sorting_order;
		
		if($data['keyword_name']&&$data['sorting_order']){
			$sorting_field = 'username';
		}else{
			$sorting_field = 'id';
		}
		
		if($data['sorting_order']){
			$sorting_field = 'username';
		}
		
		$data['sorting_field'] = $sorting_field;
		
		if(empty($sorting_order)){
			$sorting_order = 'desc';
		}

		$fields = '*';
		$data['total_rows'] = $config['total_rows'] = $this->base_model->get_advance_list('purchase_users', $join_tables, $fields, $where, 'num_rows','','','id');
		$data['users'] = $this->base_model->get_advance_list('purchase_users', '', $fields, $where, '', $sorting_field, $sorting_order, 'id', $limit_start, $limit_end);

		$data['get_countries'] = $this->base_model->getArrayList('countries','','','id,name');
		
		$data['get_cities'] = $this->base_model->getArrayList('cities','','','id,name');
		
		$this->pagination->initialize($config);
		$data['main_content'] = 'purchase_users/index';
		$data['page_title']  = 'Users'; 
		$this->load->view(ADMIN_LAYOUT_PATH, $data); 	
	}
	public function reset(){
		$this->session->unset_userdata('users_sorting_order');
		$this->session->unset_userdata('users_search_name');
		
		redirect(base_url().SITE_ADMIN_URI.'/purchase_users/');
	}
	public function validate_select($val, $fieldname){
		if($val==""){
			$this->form_validation->set_message('validate_select', 'Please choose the '.$fieldname.'.');
			return FALSE;
		}			
	}
	
	function name_check($name){
		if(!preg_match('/^[a-z0-9 .\-]+$/i', $name)){
			$this->form_validation->set_message('name_check', 'Allowed Only Alphabhet (a-z A-z),Numbers(0-9),space,dot(.),dash(-)');					
			return FALSE;
		}
		return true;
	}
	


	
	public function add(){
		$data['post'] = FALSE;
		
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
		$data = $this->input->post();	
		
		$this->form_validation->set_rules('first_name', 'Store name','trim|required'); 		
		$this->form_validation->set_rules('skype_id', 'GSTIN','trim|required');
		$this->form_validation->set_rules('phone_no', 'Contact Number','trim|numeric');		
		
		
		if ($this->form_validation->run() == True){
			
			
			$data['created'] = date('Y-m-d h:i:s');
			$data['modified'] = date('Y-m-d h:i:s');
			
			

			
			$last_user_id = $this->base_model->insert('purchase_users', $data);
			if($last_user_id > 0){
					
				$this->session->set_flashdata('flash_message', $this->lang->line('New User added successfully'));
				redirect(base_url().SITE_ADMIN_URI.'/purchase_users');
			}
			
		}
		
		$data['post'] = TRUE;
		}
		$errors = $this->form_validation->get_error_array();
		
		
		$data['css'][]='assets/themes/css/jquery.datetimepicker.css';
		$data['js'][]='assets/themes/js/jquery.datetimepicker.full.js';
		$data['main_content'] = 'purchase_users/add';
		$data['page_title']  = 'Users'; 
		$this->load->view(ADMIN_LAYOUT_PATH, $data); 	
	}
	
	public function get_cities($country_id){
		if($country_id){
			$conditions = array('status = 1 and country_id ='.$country_id);
		}else{
		$conditions = array('status = 1');
		}
		$cities = $this->base_model->getArrayList('cities',$conditions,'','id,name');
		
		$js = 'id="city" class="form-control"';
		$city_select_box =  form_dropdown('city', $cities, '', $js);
		 echo json_encode($city_select_box);
	}
	
	public function edit($id = NULL){
	
		$data['post'] = FALSE;
		$join_tables = $where = array(); 
		$where1[] = array( TRUE, 'id', $id);
		$fields = '*'; 
		$getValues = $this->base_model->get_advance_list('purchase_users', $join_tables, $fields, $where1, 'row_array');
		
		if(empty($getValues)){
			$this->session->set_flashdata('flash_message', $this->lang->line('invalid_action'));
			redirect(base_url().SITE_ADMIN_URI.'/purchase_users/');
		}
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$data = $this->input->post();
			
			
			
			if($this->input->post('skype_id') != $getValues['skype_id']){
				$is_unique_skype =  '|is_unique[purchase_users.skype_id]' ;
			}else{
				$is_unique_skype =  '' ;
			}
			
			if($this->input->post('phone_no') != $getValues['phone_no']){
				$is_unique_phone =  '|is_unique[purchase_users.phone_no]' ;
			}else{
				$is_unique_phone =  '' ;
			}
			
		$this->form_validation->set_rules('first_name', 'Store name','trim|required'); 
		//$this->form_validation->set_rules('last_name', 'Name','trim');
		
		$this->form_validation->set_rules('skype_id', 'GSTIN','trim|required');
		$this->form_validation->set_rules('phone_no', 'Phone Number','trim|numeric');	
		
		
		if ($this->form_validation->run() == True){
			
			
		   $where = "id=".$id;
					
			$data['modified'] = date('Y-m-d h:i:s');
			
			$update1 = $this->base_model->update('purchase_users',$data,$where);
			
			//echo $this->db->last_query(); exit;
			
			$this->session->set_flashdata('flash_message', $this->lang->line('update_record'));
			redirect(base_url().SITE_ADMIN_URI.'/purchase_users/');
		}
		
		}
		
		
		$data['css'][]='assets/themes/css/jquery.datetimepicker.css';
		$data['js'][]='assets/themes/js/jquery.datetimepicker.full.js';
		
		$data['id'] = $id;
		$data['users'] = $getValues;
		
		$data['main_content'] = 'purchase_users/edit';
		$data['page_title']  = 'users'; 
		$this->load->view(ADMIN_LAYOUT_PATH, $data); 	
	}
	
	
	public function approve($id=NULL){
		$join_tables = $where = array();  
		$fields = '*'; 
		$where[] = array( TRUE, 'id', $id);
		$data['users'] = $getValues =  $this->base_model->get_advance_list('purchase_users', $join_tables, $fields, $where, 'row_array');
		//print_r($data['users']);
		
		$data['css'][]='assets/themes/css/jquery.datetimepicker.css';
		$data['js'][]='assets/themes/js/jquery.datetimepicker.full.js';
		
		$data['id'] = $id;
		$data['main_content'] = 'purchase_users/edit';
		$data['page_title']  = 'users'; 
		$this->load->view(ADMIN_LAYOUT_PATH, $data);
	}
	
	function update_status($id,$status,$pageredirect,$pageno){
			
		$table_name = 'users';
		if($status == 0){
			$status = 1;
		}else{
			$status = 0;
		}
		$data = array('status' => $status);
		$this->base_model->update_status($id, $data,'purchase_users');
		$this->session->set_flashdata('flash_message', $this->lang->line('update_record'));
		redirect(base_url().SITE_ADMIN_URI.'/purchase_users/'.$pageredirect.'/'.$pageno.'/'.$fieldsorts.'/'.$typesorts);
	}
	public function delete($id){
		$table_name = 'purchase_users';
		$this->base_model->delete('purchase_users', array('id' => $id));
		$this->session->set_flashdata('flash_message', $this->lang->line('delete_record') );
		redirect(base_url().SITE_ADMIN_URI.'/purchase_users/');
	}
	function bulkactions($pageredirect=null,$pageno){
		$fieldsorts = $this->input->get('sortingfied');
		$typesorts = $this->input->get('sortype');
		$bulk_type= $this->input->post('more_action_id');
		$bulk_ids= $this->input->post('checkall_box');
		if($bulk_type == 1)
		{
			foreach($bulk_ids as $id)
			{
				$data = array('status' => '1');
				$this->base_model->update_status($id, $data,'purchase_users');
			}
			$this->session->set_flashdata('flash_message', $this->lang->line('bulk_enabled') );
		}
		else if($bulk_type == 2)
		{
			foreach($bulk_ids as $id) 
			{
				$data = array('status' => '0');
				$this->base_model->update_status($id, $data,'purchase_users');
			}
			$this->session->set_flashdata('flash_message', $this->lang->line('bulk_disabled') );
		}
		else if($bulk_type == 3)
		{
			foreach($bulk_ids as $id) 
			{
				$this->base_model->delete('purchase_users', array('id' => $id));
			
			}
			$this->session->set_flashdata('flash_message', $this->lang->line('bulk_deleted') );
		}
		else 
		{
			$this->session->set_flashdata('flash_message', $this->lang->line('edit_error') );
			redirect(base_url().SITE_ADMIN_URI.'/purchase_users/'.$pageredirect.'/'.$pageno.'/'.$fieldsorts.'/'.$typesorts);
		}
		redirect(base_url().SITE_ADMIN_URI.'/purchase_users/'.$pageredirect.'/'.$pageno.'/'.$fieldsorts.'/'.$typesorts);
	}
}

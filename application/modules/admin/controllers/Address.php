<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Address extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation','csv_import'));
		$this->load->language(array('flash_message','form_validation'), 'english');
		$this->load->helper('profile_helper');
		$this->load->helper('thumb_helper');
		$this->load->library('upload');
		if(!$this->session->has_userdata('admin_is_logged_in'))
		{
			redirect(SITE_ADMIN_URI);
		}
		
		$this->load->helper('function_helper');
		$this->load->helper('html');
		$this->load->model('base_model'); 
	}
	public function index($page_num = 1)
	{  
		$user_id = $this->input->get('user_id', TRUE);
		
		$this->load->library('pagination');
		$config = $this->config->item('back_pagination');
		$config["base_url"] = base_url().SITE_ADMIN_URI."/users/index";
		$data["per_page"] = $config["per_page"] = $this->config->item('admin_page_per_limit');
		$config["uri_segment"] = 4;
		$data['limit_end'] = $limit_end = ($page_num - 1) * $config['per_page'];  
		$limit_start = $config['per_page'];
		
		
		$where[] = array( FALSE,"(user_id = '".$user_id."')");

		
		$fields = '*';
		$join_tables = array();
		
		$data['total_rows'] = $config['total_rows'] = $this->base_model->get_advance_list('user_address', $join_tables, $fields, $where, 'num_rows','','','id');
		$data['testimonial'] = $this->base_model->get_advance_list('user_address', $join_tables, $fields, $where, '', 'id', 'desc', 'id', $limit_start, $limit_end);
		$this->pagination->initialize($config);
		
		
		$data['main_content'] = 'address/index';
		$data['page_title']  = 'Manage Address'; 
		$this->load->view(ADMIN_LAYOUT_PATH, $data); 	
	}
	public function reset()
	{
		$this->session->unset_userdata('testimonial_search_name');
		$this->session->unset_userdata('testimonial_search_category');
		$this->session->unset_userdata('testimonial_search_type');
		redirect(base_url().SITE_ADMIN_URI.'/testimonial/');
	}
	public function validate_select($val, $fieldname){
		if($val==""){
			$this->form_validation->set_message('validate_select', 'Please choose the '.$fieldname.'.');
			return FALSE;
		}			
	}
	public function validate_name($name, $fieldname){
		$category_id = $this->input->post('category_id');	
		$list = $this->base_model->getArrayList('testimonial',array('category_id'=>$category_id),'','id,name');
		unset($list['']);
		function formatize($a){
			return strtolower(trim($a));
		}
		$list = array_map('formatize',$list);
		if(in_array(strtolower(trim($name)),$list)){
			$this->form_validation->set_message('validate_name', 'This '.$fieldname.' already exists.Please enter unique '.$fieldname.'.');
			return FALSE;
		}
		return TRUE;
	}
	public function validate_link($link,$fieldname){
		$this->form_validation->set_message('validate_link', 'Please Enter valid '.$fieldname.'.');
	}
	
	public function file_check($str){
		$allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
		$mime = $this->get_mime_by_extension($_FILES['image']['name']);
		if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=""){
			list($width, $height, $type, $attr) = getimagesize($_FILES["image"]['tmp_name']);
			
			if(!in_array($mime, $allowed_mime_type_arr)){
				
				$this->form_validation->set_message('file_check', 'Please select only gif/jpg/png file.');
				return false;
			}else if($width != 124 && $height != 124){
				$this->form_validation->set_message('file_check', 'Please check the image Size 124 * 124');
				return false;
			}else{
				return true;
			}
		}else{
			$this->form_validation->set_message('file_check', 'Please choose a file to upload.');
			return false;
		}
	}
	function get_mime_by_extension($filename){
	  static $mimes;
	  if ( ! is_array($mimes)) // <- Will only return TRUE on the first call
	  {
		$mimes = get_mimes(); // <- By removing the &reference declaration
		// Any subsequent changes to `$_mimes` will not be accounted for
		if (empty($mimes))
		{
		  return FALSE;
		}
	  }
	  $extension = strtolower(substr(strrchr($filename, '.'), 1));
	  if (isset($mimes[$extension]))
	  {
		  return is_array($mimes[$extension])
			  ? current($mimes[$extension])
			  : $mimes[$extension];
	  }
	  return FALSE;
	}

	public function add()
	{
		$data['post'] = FALSE;
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{ 
			$this->form_validation->set_rules('address_line1', 'Address Line 1','trim|required');
			$this->form_validation->set_rules('address_line2', 'Address Line 2','trim|required');
			$this->form_validation->set_rules('address_line3', 'Address Line 3','trim');
			$this->form_validation->set_rules('address_line4', 'Address Line 4','trim');
			
			
			
			
			
			

			if ($this->form_validation->run()){   
				$date = date('Y-m-d H:i:s');
				$image = '';
				
				
				$update_array = array (	'user_id' => $this->input->post('user_id'),
										'address_line1' => $this->input->post('address_line1'),
										'address_line2' => $this->input->post('address_line2'),
										'address_line3' => $this->input->post('address_line3'),
										'address_line4' => $this->input->post('address_line4'),										
										'status' => $this->input->post('status'),										
										'created' => $date
									  );
				$this->base_model->insert( 'user_address', $update_array);
				$this->session->set_flashdata('flash_message', $this->lang->line('add_record'));
				redirect(base_url().SITE_ADMIN_URI.'/address?user_id='.$this->input->post('user_id'));
			}
			$data['post'] = TRUE;
		}
		$data['category_list'] = $this->base_model->getArrayList('testimonial_categories');
		$data['testimonial_type_list'] = $this->config->item('testimonial_type');
		$data['user_id'] =  $this->input->get('user_id', TRUE);
		$data['main_content'] = 'address/add';
		$data['page_title']  = 'Add Address'; 
		$this->load->view(ADMIN_LAYOUT_PATH, $data); 	
	}
	public function edit($id = NULL)
	{
		$data['post'] = FALSE;
		$join_tables = $where = array(); 
		$where1[] = array( TRUE, 'id', $id);
		$fields = '*'; 
		$getValues = $this->base_model->get_advance_list('user_address', $join_tables, $fields, $where1, 'row_array');
		
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			
		   	$this->form_validation->set_rules('address_line1', 'Address Line 1', 'trim|required');
		   	$this->form_validation->set_rules('address_line2', 'Address Line 2', 'trim|required');
		   	$this->form_validation->set_rules('address_line3', 'Address Line 3', 'trim|required');
		   	$this->form_validation->set_rules('address_line4', 'Address Line 4', 'trim|required');	
		   	$this->form_validation->set_rules('user_id', 'user id', 'trim|required');	
			
			

			if ($this->form_validation->run())
			{   
				$date = date('Y-m-d H:i:s');
			
			
				$update_array = array (	'address_line1' => $this->input->post('address_line1'),
										'address_line2' => $this->input->post('address_line2'),
										'address_line3' => $this->input->post('address_line3'),
										'address_line4' => $this->input->post('address_line4'),										
										'status' => $this->input->post('status')
									  );
				$this->base_model->update ( 'user_address', $update_array, array('id'=>$id));
				$this->session->set_flashdata('flash_message', $this->lang->line('update_record'));
				redirect(base_url().SITE_ADMIN_URI.'/address?user_id='.$this->input->post('user_id'));
			}
			$data['post'] = TRUE;
		}
		$join_tables = $where = array();
		
		$fields = '*';
		$where[] = array( TRUE, 'id', $id);
		$data['testimonial'] = $this->base_model->get_advance_list('user_address', $join_tables, $fields, $where, 'row_array');
		
		$data['main_content'] = 'address/edit';
		$data['page_title']  = 'Edit Address'; 
		$this->load->view(ADMIN_LAYOUT_PATH, $data); 	
	}
	function update_status($id,$status,$pageredirect,$pageno)
	{
		$table_name = 'user_address';
		change_status($table_name,$id,$status,$pageredirect,$pageno);
		$this->session->set_flashdata('flash_message', $this->lang->line('update_record'));
		redirect(base_url().SITE_ADMIN_URI.'/address/'.$pageredirect.'/'.$pageno.'/'.$fieldsorts.'/'.$typesorts);
	}
	public function delete($id,$pageredirect=null,$pageno) 
	{
		$this->base_model->delete ('user_address',array('id' => $id));
		$this->session->set_flashdata('flash_message', $this->lang->line('delete_record') );
		redirect(base_url().SITE_ADMIN_URI.'/address/'.$pageredirect.'/'.$pageno.'/'.$fieldsorts.'/'.$typesorts);
	}
	function bulkactions($pageredirect=null,$pageno){
		
		$fieldsorts = $this->input->get('sortingfied');
		$typesorts = $this->input->get('sortype');
		$bulk_type= $this->input->post('more_action_id');
		$bulk_ids= $this->input->post('checkall_box');
		if($bulk_type == 1){
			foreach($bulk_ids as $id) {
				$data = array('status' => '1');
				$this->base_model->update_status($id, $data, 'user_address');
			}
			$this->session->set_flashdata('flash_message', $this->lang->line('bulk_enabled') );
		}
		else if($bulk_type == 2){
			foreach($bulk_ids as $id) {
				$data = array('status' => '0');
				$this->base_model->update_status($id, $data, 'user_address');
			}
			$this->session->set_flashdata('flash_message', $this->lang->line('bulk_disabled') );
		}
		else if($bulk_type == 3)
		{
			foreach($bulk_ids as $id) 
			{
				$this->base_model->delete('user_address', array('id' => $id));
			
			}
			$this->session->set_flashdata('flash_message', $this->lang->line('bulk_deleted') );
		}
		else {
			$this->session->set_flashdata('flash_message', $this->lang->line('edit_error') );
			redirect(base_url().SITE_ADMIN_URI.'/address/'.$pageredirect.'/'.$pageno.'/'.$fieldsorts.'/'.$typesorts);
		}
		redirect(base_url().SITE_ADMIN_URI.'/address/'.$pageredirect.'/'.$pageno.'/'.$fieldsorts.'/'.$typesorts);
	}
}

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends Admin_Controller
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
		$search_name_keyword  = isset($_POST['search_name'])?trim($_POST['search_name']):(isset($_SESSION['purchase_search_name'])?$_SESSION['purchase_search_name']:'');
		$this->session->set_userdata('purchase_search_name', $search_name_keyword); 		
		$keyword_name_session = $this->session->userdata('purchase_search_name');
		if($keyword_name_session != ''){
			$keyword_name = $this->session->userdata('purchase_search_name');
		}else{
			isset($_SESSION['purchase_search_name'])?$this->session->unset_userdata('purchase_search_name'):'';
			$keyword_name = "";
		}
		
		$invoice_date_from  = isset($_POST['invoice_date_from'])?trim($_POST['invoice_date_from']):(isset($_SESSION['invoice_date_from'])?$_SESSION['invoice_date_from']:'');
		$this->session->set_userdata('invoice_date_from', $invoice_date_from); 		
		$invoice_date_from = $this->session->userdata('invoice_date_from');
		if($invoice_date_from != ''){
			$keyword_invoicefrom = $this->session->userdata('invoice_date_from');
		}else{
			isset($_SESSION['invoice_date_from'])?$this->session->unset_userdata('invoice_date_from'):'';
			$keyword_invoicefrom = "";
		}
		
		$invoice_date_to  = isset($_POST['invoice_date_to'])?trim($_POST['invoice_date_to']):(isset($_SESSION['invoice_date_to'])?$_SESSION['invoice_date_to']:'');
		$this->session->set_userdata('invoice_date_to', $invoice_date_to); 		
		$invoice_date_to = $this->session->userdata('invoice_date_to');
		if($invoice_date_to != ''){
			$keyword_invoiceto = $this->session->userdata('invoice_date_to');
		}else{
			isset($_SESSION['invoice_date_to'])?$this->session->unset_userdata('invoice_date_to'):'';
			$keyword_invoiceto = "";
		}
		
		$sorting_order_post  = isset($_POST['sorting_order'])?trim($_POST['sorting_order']):(isset($_SESSION['purchase_sorting_order'])?$_SESSION['purchase_sorting_order']:'');
		$this->session->set_userdata('purchase_sorting_order', $sorting_order_post);
		$sorting_order_sess = $this->session->userdata('purchase_sorting_order');
		if($sorting_order_sess){
			$sorting_order = $this->session->userdata('purchase_sorting_order');
		}else{
			isset($_SESSION['purchase_sorting_order'])?$this->session->unset_userdata('purchase_sorting_order'):'';
			$sorting_order = "";
		}
				
		$this->load->library('pagination');
		$config = $this->config->item('back_pagination');
		$config["base_url"] = base_url().SITE_ADMIN_URI."/purchase/index";
		$data["per_page"] = $config["per_page"] = $this->config->item('admin_page_per_limit');
		$config["uri_segment"] = 4;
		$data['limit_end'] = $limit_end = ($page_num - 1) * $config['per_page'];  
		$data['css'][]='assets/themes/css/jquery.datetimepicker.css';
		$data['js'][]='assets/themes/js/jquery.datetimepicker.full.js';
		$limit_start = $config['per_page'];
		$join_tables = array();
		$where = array();
		
		if($keyword_name){
			$where[] = array( FALSE,"(seller_name LIKE '%$keyword_name%' OR seller_gst LIKE '%$keyword_name%')");			
			 
			$data['keyword_name'] = $keyword_name;
		}else{
			$data['keyword_name'] = "";
		}
		if($keyword_invoicefrom != "" && $keyword_invoiceto !=""){
			$from = date('Y-m-d',strtotime($keyword_invoicefrom));
			$to = date('Y-m-d',strtotime($keyword_invoiceto));
			$where[] = array( FALSE,"(invoice_date BETWEEN '$from' AND '$to')");			
			 
			$data['keyword_invoicefrom'] = $from;
			$data['keyword_invoiceto'] = $to;
		}else if($keyword_invoicefrom != "" && $keyword_invoiceto == ""){
			$from = date('Y-m-d',strtotime($keyword_invoicefrom));
			$to = date('Y-m-d');
			$where[] = array( FALSE,"(invoice_date BETWEEN '$from' AND '$to')");
			$data['keyword_invoicefrom'] = $from;
			$data['keyword_invoiceto'] = $to;
		}else if($keyword_invoicefrom == "" && $keyword_invoiceto != ""){
			$from = date('Y-m-d');
			$to = date('Y-m-d',strtotime($keyword_invoiceto));
			$where[] = array( FALSE,"(invoice_date BETWEEN '$from' AND '$to')");
			$data['keyword_invoicefrom'] = $from;
			$data['keyword_invoiceto'] = $to;
		}else{
			$data['keyword_invoicefrom'] = "";
			$data['keyword_invoiceto'] = "";
		}
		
		$data['sorting_order']=$sorting_order;
		
		if($data['keyword_name']&&$data['sorting_order']){
			$sorting_field = 'seller_name';
		}else{
			$sorting_field = 'id';
		}
		
		if($data['sorting_order']){
			$sorting_field = 'seller_name';
		}
		
		$data['sorting_field'] = $sorting_field;
		
		if(empty($sorting_order)){
			$sorting_order = 'desc';
		}

		$fields = '*';
		$data['total_rows'] = $config['total_rows'] = $this->base_model->get_advance_list('new_purchase', $join_tables, $fields, $where, 'num_rows','','','id');
		$data['purchase'] = $this->base_model->get_advance_list('new_purchase', '', $fields, $where, '', 'invoice_date', 'desc', 'id', $limit_start, $limit_end);

				
		$this->pagination->initialize($config);
		$data['main_content'] = 'purchase/index';
		$data['page_title']  = 'Manage Purchase'; 
		$this->load->view(ADMIN_LAYOUT_PATH, $data); 	
	}
	public function export(){
		$search_name_keyword  = isset($_POST['search_name'])?trim($_POST['search_name']):(isset($_SESSION['purchase_search_name'])?$_SESSION['purchase_search_name']:'');
		$this->session->set_userdata('purchase_search_name', $search_name_keyword); 		
		$keyword_name_session = $this->session->userdata('purchase_search_name');
		if($keyword_name_session != ''){
			$keyword_name = $this->session->userdata('purchase_search_name');
		}else{
			isset($_SESSION['purchase_search_name'])?$this->session->unset_userdata('purchase_search_name'):'';
			$keyword_name = "";
		}
		
		$invoice_date_from  = isset($_POST['invoice_date_from'])?trim($_POST['invoice_date_from']):(isset($_SESSION['invoice_date_from'])?$_SESSION['invoice_date_from']:'');
		$this->session->set_userdata('invoice_date_from', $invoice_date_from); 		
		$invoice_date_from = $this->session->userdata('invoice_date_from');
		if($invoice_date_from != ''){
			$keyword_invoicefrom = $this->session->userdata('invoice_date_from');
		}else{
			isset($_SESSION['invoice_date_from'])?$this->session->unset_userdata('invoice_date_from'):'';
			$keyword_invoicefrom = "";
		}
		
		$invoice_date_to  = isset($_POST['invoice_date_to'])?trim($_POST['invoice_date_to']):(isset($_SESSION['invoice_date_to'])?$_SESSION['invoice_date_to']:'');
		$this->session->set_userdata('invoice_date_to', $invoice_date_to); 		
		$invoice_date_to = $this->session->userdata('invoice_date_to');
		if($invoice_date_to != ''){
			$keyword_invoiceto = $this->session->userdata('invoice_date_to');
		}else{
			isset($_SESSION['invoice_date_to'])?$this->session->unset_userdata('invoice_date_to'):'';
			$keyword_invoiceto = "";
		}
		
		$sorting_order_post  = isset($_POST['sorting_order'])?trim($_POST['sorting_order']):(isset($_SESSION['purchase_sorting_order'])?$_SESSION['purchase_sorting_order']:'');
		$this->session->set_userdata('purchase_sorting_order', $sorting_order_post);
		$sorting_order_sess = $this->session->userdata('purchase_sorting_order');
		if($sorting_order_sess){
			$sorting_order = $this->session->userdata('purchase_sorting_order');
		}else{
			isset($_SESSION['purchase_sorting_order'])?$this->session->unset_userdata('purchase_sorting_order'):'';
			$sorting_order = "";
		}
		
		$join_tables = array();
		$where = array();
		
		if($keyword_name){
			$where[] = array( FALSE,"(seller_name LIKE '%$keyword_name%' OR seller_gst LIKE '%$keyword_name%')");			
			 
			$data['keyword_name'] = $keyword_name;
		}else{
			$data['keyword_name'] = "";
		}
		if($keyword_invoicefrom != "" && $keyword_invoiceto !=""){
			$from = date('Y-m-d',strtotime($keyword_invoicefrom));
			$to = date('Y-m-d',strtotime($keyword_invoiceto));
			$where[] = array( FALSE,"(invoice_date BETWEEN '$from' AND '$to')");			
			 
			$data['keyword_invoicefrom'] = $from;
			$data['keyword_invoiceto'] = $to;
		}else if($keyword_invoicefrom != "" && $keyword_invoiceto == ""){
			$from = date('Y-m-d',strtotime($keyword_invoicefrom));
			$to = date('Y-m-d');
			$where[] = array( FALSE,"(invoice_date BETWEEN '$from' AND '$to')");
			$data['keyword_invoicefrom'] = $from;
			$data['keyword_invoiceto'] = $to;
		}else if($keyword_invoicefrom == "" && $keyword_invoiceto != ""){
			$from = date('Y-m-d');
			$to = date('Y-m-d',strtotime($keyword_invoiceto));
			$where[] = array( FALSE,"(invoice_date BETWEEN '$from' AND '$to')");
			$data['keyword_invoicefrom'] = $from;
			$data['keyword_invoiceto'] = $to;
		}else{
			$data['keyword_invoicefrom'] = "";
			$data['keyword_invoiceto'] = "";
		}
		
		$data['sorting_order']=$sorting_order;
		
		if($data['keyword_name']&&$data['sorting_order']){
			$sorting_field = 'seller_name';
		}else{
			$sorting_field = 'id';
		}
		
		if($data['sorting_order']){
			$sorting_field = 'seller_name';
		}
		
		$data['sorting_field'] = $sorting_field;
		
		if(empty($sorting_order)){
			$sorting_order = 'desc';
		}

		$fields = 'id,seller_gst,seller_name,invoice_no,invoice_date,commodity_code,hsn_code,tonage,sales_value,rate_of_tax,sgst,cgst,total_value,tcs_amount,tcs_tax_percent';
		
		$data = $this->base_model->get_advance_list('new_purchase', '', $fields, $where, '', 'invoice_date', 'asc', 'id', 0, 10000);
		
		$colnames[] = array(
			'id' => "Sl.No",
			'seller_gst' => "SELLER GST",
			'seller_name' => "NAME OF SELLER",
			'invoice_no' => "INVOICE NO",
			'invoice_date' => "INVOICE DATE",
			'commodity_code' => "COMMIDITY CODE",
			'hsn_code' => "HSN CODE",
			'tonage' => "TONAGE",
			'sales_value' => "SALES VALUE",
			'rate_of_tax' => "RATE OF TAX",
			'sgst' => "SGST",
			'cgst' => "CGST",
			'total_value' => "TOTAL VALUE",
			'tcs_amount'=> "TCS AMOUNT",
			'tcs_tax_percent'=> "TCS PERCENTAGE"
			
		);
		
		$result = array_merge($colnames,$data);	
		
		$filename = "PURCHASE_data_" . date('YmdHis') . ".csv";
		
		header("Content-Disposition: attachment; filename=\"$filename\"");
		header("Content-Type: text/csv");
		$out = fopen("php://output", 'w');		
		
	  $flag = TRUE;
	  foreach($result as $row) {
		if(!$flag) {
		  // display field/column names as first row
		  $firstline = array_map('map_colnames', array_keys($row));
		  fputcsv($out, $firstline, ',', '"');
		  $flag = true;
		}
		array_walk($row, 'cleanData');
		fputcsv($out, array_values($row), ',', '"');
	  }
		fclose($out);
		exit;
	}
	function map_colnames($input)
  {
    global $colnames;
    return isset($colnames[$input]) ? $colnames[$input] : $input;
  }

  function cleanData(&$str)
  {
    if($str == 't') $str = 'TRUE';
    if($str == 'f') $str = 'FALSE';
    if(preg_match("/^0/", $str) || preg_match("/^\+?\d{8,}$/", $str) || preg_match("/^\d{4}.\d{1,2}.\d{1,2}/", $str)) {
      $str = "'$str";
    }
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
  }
	public function reset(){
		$this->session->unset_userdata('purchase_sorting_order');
		$this->session->unset_userdata('purchase_search_name');
		$this->session->unset_userdata('invoice_date_from');
		$this->session->unset_userdata('invoice_date_to');
		
		redirect(base_url().SITE_ADMIN_URI.'/purchase/');
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
	public function password_check($str){
	   if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
		 return TRUE;
	   }
	   if (preg_match('#[0-9]#', $str)) {
		 $this->form_validation->set_message('password_check', 'Atleast One Alphabhet Should be present');	
		 return FALSE;
	   }
	   if (preg_match('#[a-zA-Z]#', $str)) {
		 $this->form_validation->set_message('password_check', 'Atleast One Numeric value Should be present');	
		 return FALSE;
	   }
	   if($str){
		   $this->form_validation->set_message('password_check', 'Atleast One Alphabhet and Numeric value Should be present');	
	   }
	   $this->form_validation->set_message('password_check', 'Please enter the password.');	
	   return FALSE;
	}

public function randPass($length, $strength=8) {
    $vowels = 'aeuy';
    $consonants = 'bdghjmnpqrstvz';
    if ($strength >= 1) {
        $consonants .= 'BDGHJLMNPQRSTVWXZ';
    }
    if ($strength >= 2) {
        $vowels .= "AEUY";
    }
    if ($strength >= 4) {
        $consonants .= '23456789';
    }
    if ($strength >= 8) {
        $consonants .= '@#$%';
    }

    $password = '';
    $alt = time() % 2;
    for ($i = 0; $i < $length; $i++) {
        if ($alt == 1) {
            $password .= $consonants[(rand() % strlen($consonants))];
            $alt = 0;
        } else {
            $password .= $vowels[(rand() % strlen($vowels))];
            $alt = 1;
        }
    }
    return $password;
}
	
	public function add(){
		$data['post'] = FALSE;
		
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
		$data = $this->input->post();	
		
		$this->form_validation->set_rules('seller_gst', 'Seller gst','trim|required'); 
		$this->form_validation->set_rules('seller_name', 'seller name','trim|required');
		$this->form_validation->set_rules('invoice_no', 'invoice no','trim|required|numeric');
		$this->form_validation->set_rules('invoice_date', 'invoice date','trim|required');
		$this->form_validation->set_rules('commodity_code', 'commodity code','trim|required');
		$this->form_validation->set_rules('hsn_code', 'hsn code','trim|required');
		$this->form_validation->set_rules('tonage', 'tonage','trim|required');
		$this->form_validation->set_rules('sales_value', 'sales amount','trim|required');
		$this->form_validation->set_rules('rate_of_tax', 'rate of tax','trim|required');
		$this->form_validation->set_rules('sgst', 'SGST','trim|required');
		$this->form_validation->set_rules('cgst', 'CGST','trim|required');
		$this->form_validation->set_rules('total_value', 'Total amount','trim|required');	
		
		
		if ($this->form_validation->run() == True){
			
			unset($data['user_id']);
			$data['created'] = date('Y-m-d h:i:s');				
			
			$data['invoice_date'] = date('Y-m-d',strtotime($data['invoice_date']));
			$last_user_id = $this->base_model->insert('new_purchase', $data);
			if($last_user_id > 0){					
				$this->session->set_flashdata('flash_message', $this->lang->line('New Purchase added successfully'));
				redirect(base_url().SITE_ADMIN_URI.'/purchase');
			}			
		}
		
		$data['post'] = TRUE;
		}
		
		$fields = array('id','name');
		$conditions = array('status'=>1);
		$return = array('return' => 'result_array');
		$sort_field = 'name';
		$order_by = 'asc';
		$data['css'][]='assets/themes/css/jquery.datetimepicker.css';
		$data['js'][]='assets/themes/js/jquery.datetimepicker.full.js';
		$data['js'][]='assets/themes/js/select2.full.min.js';
		$data['js'][]='assets/themes/js/jquery-ui.min.js';	
		
		$where = $join_tables =  array();
		$fields = array('id','first_name');
		$where = array('status'=>1);
		$keys = array('id','first_name');
		$users_list = $this->base_model->getSelectList('purchase_users', $where, '',$fields, 'first_name','asc',$keys);	
		
		$data['users_list'] = $users_list;
		 
		$data['main_content'] = 'purchase/add';
		$data['page_title']  = 'Purchase'; 
		$this->load->view(ADMIN_LAYOUT_PATH, $data); 	
	}
	
	public function getpurchaseusers(){
		$post = $this->input->post();
		
		$join_tables = $where = array(); 
		$where1[] = array( TRUE, 'id', $post['id']);
		$fields = '*'; 
		$getValues1 = $this->base_model->get_advance_list('purchase_users', $join_tables, $fields, $where1, 'row_array');
		
		$details = array('store_details' => array(		
											'store_name'=>$getValues1['first_name'],											
											'phone_no'=>$getValues1['phone_no'],
											'gstin'=>$getValues1['skype_id'],
										    'address'=>$getValues1['address']
											)						
							);		
		echo json_encode($details);
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
		$getValues = $this->base_model->get_advance_list('new_purchase', $join_tables, $fields, $where1, 'row_array');
		
		if(empty($getValues)){
			$this->session->set_flashdata('flash_message', $this->lang->line('invalid_action'));
			redirect(base_url().SITE_ADMIN_URI.'/purchase/');
		}
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$data = $this->input->post();	
			
			
		$this->form_validation->set_rules('seller_gst', 'Seller gst','trim|required'); 
		$this->form_validation->set_rules('seller_name', 'seller name','trim|required');
		$this->form_validation->set_rules('invoice_no', 'invoice no','trim|required|numeric');
		$this->form_validation->set_rules('invoice_date', 'invoice date','trim|required');
		$this->form_validation->set_rules('commodity_code', 'commodity code','trim|required');
		$this->form_validation->set_rules('hsn_code', 'hsn code','trim|required');
		$this->form_validation->set_rules('tonage', 'tonage','trim|required');
		$this->form_validation->set_rules('sales_value', 'sales amount','trim|required');
		$this->form_validation->set_rules('rate_of_tax', 'rate of tax','trim|required');
		$this->form_validation->set_rules('sgst', 'SGST','trim|required');
		$this->form_validation->set_rules('cgst', 'CGST','trim|required');
		$this->form_validation->set_rules('total_value', 'Total amount','trim|required');
		
		if ($this->form_validation->run() == True){			
			$where = "id=".$id;	
			unset($data['user_id']);
			$data['invoice_date'] = date('Y-m-d',strtotime($data['invoice_date']));
			$update1 = $this->base_model->update('new_purchase',$data,$where);			
			$this->session->set_flashdata('flash_message', $this->lang->line('update_record'));
			redirect(base_url().SITE_ADMIN_URI.'/purchase/');
		}		
		}	
		
		$data['css'][]='assets/themes/css/jquery.datetimepicker.css';
		$data['js'][]='assets/themes/js/jquery.datetimepicker.full.js';
		$data['js'][]='assets/themes/js/select2.full.min.js';
		$data['js'][]='assets/themes/js/jquery-ui.min.js';	
		$data['purchase'] = $getValues;
		$data['id'] = $id;
		
		$where = $join_tables =  array();
		$fields = array('id','first_name');
		$where = array('status'=>1);
		$keys = array('id','first_name');
		$users_list = $this->base_model->getSelectList('purchase_users', $where, '',$fields, 'first_name','asc',$keys);	
		$data['users_list'] = $users_list;
		$data['main_content'] = 'purchase/edit';
		$data['page_title']  = 'Purchase'; 
		$this->load->view(ADMIN_LAYOUT_PATH, $data); 	
	}
	
	public function change_password($id=Null,$pageredirect,$pageno,$fieldsorts='id',$typesorts='desc'){
	
	if(empty($id)){
		redirect(base_url().SITE_ADMIN_URI.'/users/');
	}
	
	if ($this->input->server('REQUEST_METHOD') === 'POST'){
		$this->form_validation->set_rules('password', 'Password','trim|required|min_length[6]|max_length[32]|callback_password_check');
		$this->form_validation->set_rules('confirm_password', 'confirm password','trim|required|matches[password]|min_length[6]|max_length[32]');
		
		if ($this->form_validation->run() == True){
			$data = $this->input->post();
			$password = $this->input->post('password');
			if($data['password']){
				$data['password'] = md5($data['password']);
			}
			unset($data['confirm_password']);
			$where = "id=".$id;
			$this->base_model->update('users',$data,$where);
			
			$join_tables = $where = array(); 
		$where1[] = array( TRUE, 'id', $id);
		$fields = 'first_name,last_name,email_id'; 
		$getValues = $this->base_model->get_advance_list('users', $join_tables, $fields, $where1, 'row_array');
			
			$email_config_data = array('[USERNAME]'=> $getValues['first_name'], 
										   '[PASSWORD]' => $password,
										   '[USER_EMAIL]' => $getValues['email_id'],
										   '[SITE_NAME]' => $this->config->item('site_name'),
										   '[SITE_LINK]'=>"<a href='".base_url()."'>Link</a>"
										   );
					 $to_email = $getValues['email_id'];
					 $admin_email_settings = get_site_settings('emailtemplate.from_email');
					$from_email = $admin_email_settings['value'];
					
					$template = 'Change Password Admin';
					
					$res = $this->email_template->send_mail($to_email,$from_email,$template,$email_config_data);
					$this->session->set_flashdata('flash_message','Password has been changed Successfully');
			
			
			
			redirect(base_url().SITE_ADMIN_URI.'/users/'.$pageredirect.'/'.$pageno.'/'.$fieldsorts.'/'.$typesorts);
		}
	}
	
	
	
		$data['main_content'] = 'users/change_password';
		$data['page_title']  = 'Change Password'; 
		$this->load->view(ADMIN_LAYOUT_PATH, $data); 	
	}
	
	public function approve($id=NULL){
		$join_tables = $where = array();  
		$fields = '*'; 
		$where[] = array( TRUE, 'id', $id);
		$data['users'] = $getValues =  $this->base_model->get_advance_list('users', $join_tables, $fields, $where, 'row_array');
		//print_r($data['users']);
		$data['options'] = $this->config->item('know_about_us');
		$data['css'][]='assets/themes/css/jquery.datetimepicker.css';
		$data['js'][]='assets/themes/js/jquery.datetimepicker.full.js';
		$data['countries'] = $this->base_model->getArrayList('countries','','','id,name');
		$conditions = array('status = 1 and country_id ='.$getValues['country']);
		$data['cities'] = $this->base_model->getArrayList('cities',$conditions,'','id,name');	
		//$data['approve_hidden'] = 1;
		$data['id'] = $id;
		$data['main_content'] = 'users/edit';
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
		$this->base_model->update_status($id, $data,'users');
		$this->session->set_flashdata('flash_message', $this->lang->line('update_record'));
		redirect(base_url().SITE_ADMIN_URI.'/users/'.$pageredirect.'/'.$pageno.'/'.$fieldsorts.'/'.$typesorts);
	}
	public function delete($id){
		$table_name = 'purchase';
		$this->base_model->delete('new_purchase', array('id' => $id));
		$this->session->set_flashdata('flash_message', $this->lang->line('delete_record') );
		redirect(base_url().SITE_ADMIN_URI.'/purchase/');
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
				$this->base_model->update_status($id, $data,'new_purchase');
			}
			$this->session->set_flashdata('flash_message', $this->lang->line('bulk_enabled') );
		}
		else if($bulk_type == 2)
		{
			foreach($bulk_ids as $id) 
			{
				$data = array('status' => '0');
				$this->base_model->update_status($id, $data,'new_purchase');
			}
			$this->session->set_flashdata('flash_message', $this->lang->line('bulk_disabled') );
		}
		else if($bulk_type == 3)
		{
			foreach($bulk_ids as $id) 
			{
				$this->base_model->delete('new_purchase', array('id' => $id));
			
			}
			$this->session->set_flashdata('flash_message', $this->lang->line('bulk_deleted') );
		}
		else 
		{
			$this->session->set_flashdata('flash_message', $this->lang->line('edit_error') );
			redirect(base_url().SITE_ADMIN_URI.'/purchase/'.$pageredirect.'/'.$pageno.'/'.$fieldsorts.'/'.$typesorts);
		}
		redirect(base_url().SITE_ADMIN_URI.'/purchase/'.$pageredirect.'/'.$pageno.'/'.$fieldsorts.'/'.$typesorts);
	}
}

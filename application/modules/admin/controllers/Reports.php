<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation','Excel'));
		$this->load->language(array('flash_message','form_validation'), 'english');
		if(!$this->session->has_userdata('admin_is_logged_in'))
		{
			redirect(SITE_ADMIN_URI);
		}
		
		$this->load->helper('function_helper');
		$this->load->model('base_model');

	}
	
	public function export(){
		
		$search_name_keyword  =  isset($_POST['report_search_name'])?trim($_POST['report_search_name']):(isset($_SESSION['report_search_name'])?$_SESSION['report_search_name']:'');
		$search_from_date_keyword  = isset($_POST['report_search_from_date'])?trim($_POST['report_search_from_date']):(isset($_SESSION['report_search_from_date'])?$_SESSION['report_search_from_date']:'');
		$search_to_date_keyword  = isset($_POST['report_search_to_date'])?trim($_POST['report_search_to_date']):(isset($_SESSION['report_search_to_date'])?$_SESSION['report_search_to_date']:'');
		$search_email_keyword  = isset($_POST['report_search_email'])?trim($_POST['report_search_email']):(isset($_SESSION['report_search_email'])?$_SESSION['report_search_email']:'');
		$search_orderid_keyword  = isset($_POST['report_search_orderid'])?trim($_POST['report_search_orderid']):(isset($_SESSION['report_search_orderid'])?$_SESSION['report_search_orderid']:'');
		$search_product_type_keyword  = isset($_POST['report_search_product_type'])?trim($_POST['report_search_product_type']):(isset($_SESSION['report_search_product_type'])?$_SESSION['report_search_product_type']:'');
		
		$this->session->set_userdata('report_search_name', $search_name_keyword); 
		$this->session->set_userdata('report_search_from_date', $search_from_date_keyword);
		$this->session->set_userdata('report_search_to_date', $search_to_date_keyword);
		$this->session->set_userdata('report_search_email', $search_email_keyword);
		$this->session->set_userdata('report_search_orderid', $search_orderid_keyword);
		$this->session->set_userdata('report_search_product_type', $search_product_type_keyword);
		
		$keyword_name_session = $this->session->userdata('report_search_name');
		$keyword_from_date_session = $this->session->userdata('report_search_from_date');
		$keyword_to_date_session = $this->session->userdata('report_search_to_date');
		$keyword_email_session = $this->session->userdata('report_search_email');
		$keyword_orderid_session = $this->session->userdata('report_search_orderid');
		$keyword_product_type_session = $this->session->userdata('report_search_product_type');
		
		
		if($keyword_orderid_session != ''){
			$keyword_orderid = $this->session->userdata('report_search_orderid');
			
		}else{
			isset($_SESSION['search_orderid'])?$this->session->unset_userdata('report_search_orderid'):'';
			$keyword_orderid = "";
		}
		
		if($keyword_email_session != ''){
			$keyword_email = $this->session->userdata('report_search_email');
			
		}else{
			isset($_SESSION['report_search_email'])?$this->session->unset_userdata('report_search_email'):'';
			$keyword_email = "";
		}
		
		if($keyword_from_date_session != ''){
			$keyword_from_date = $this->session->userdata('report_search_from_date');
			$keyword_from_date = date('Y-m-d',strtotime($keyword_from_date));
		}else{
			isset($_SESSION['search_from_date'])?$this->session->unset_userdata('report_search_from_date'):'';
			$keyword_from_date = "";
		}
		if($keyword_to_date_session != ''){
			$keyword_to_date = $this->session->userdata('report_search_to_date');
			$keyword_to_date = date('Y-m-d',strtotime($keyword_to_date));
		}else{
			isset($_SESSION['report_search_to_date'])?$this->session->unset_userdata('report_search_to_date'):'';
			$keyword_to_date = "";
		}
		
		if($keyword_name_session != ''){
			$keyword_name = $this->session->userdata('report_search_name');
		}else{
			isset($_SESSION['report_search_name'])?$this->session->unset_userdata('report_search_name'):'';
			$keyword_name = "";
		}
		
		
		$this->load->helper('html');
		
		
		$where = $join_tables =  array();  
		
		if($keyword_orderid){
			$where[] = array( FALSE,"(o.order_id LIKE '%$keyword_orderid%' or o.transcation_id LIKE '%$keyword_orderid%')");
			$data['keyword_orderid'] = $keyword_orderid;
		}else{
			$data['keyword_orderid'] = "";
		}
		
		if($keyword_product_type_session != ''){
			$keyword_product_type = $this->session->userdata('report_search_product_type');
			
		}else{
			isset($_SESSION['report_search_product_type'])?$this->session->unset_userdata('report_search_product_type'):'';
			$keyword_product_type = "";
		}
		
		if($keyword_email){
			$where[] = array( TRUE, 'o.user_email LIKE ', '%'.$keyword_email.'%' );
			$data['keyword_email'] = $keyword_email;
		}else{
			$data['keyword_email'] = "";
		}
		
		if($keyword_name){
			$where[] = array( TRUE, 'o.product_name LIKE ', '%'.$keyword_name.'%' );
			$data['keyword_name'] = $keyword_name;
		}
		else{
			$data['keyword_name'] = "";
		}
		
		if($keyword_product_type){
			$where[] = array( TRUE, 'o.product_type', $keyword_product_type );
			$data['keyword_product_type'] = $keyword_product_type;
		}
		else{
			$data['keyword_product_type'] = "";
		}
		$data['keyword_from_date'] = "";
		$data['keyword_to_date'] = "";
		
		if($keyword_from_date&&empty($keyword_to_date)){
			$where[] = array( FALSE,"(DATE_FORMAT(o.created,'%Y-%m-%d') >= DATE_FORMAT('".$keyword_from_date."','%Y-%m-%d'))");
			$data['keyword_from_date'] = date('d-m-Y',strtotime($keyword_from_date));
		}
		
		if($keyword_to_date&&empty($keyword_from_date)){
			$where[] = array( FALSE,"(DATE_FORMAT(o.created,'%Y-%m-%d') <= DATE_FORMAT('".$keyword_to_date."','%Y-%m-%d'))");
			$data['keyword_to_date'] = date('d-m-Y',strtotime($keyword_to_date));
		}
		
		if($keyword_from_date&&$keyword_to_date){
			$where[] = array( FALSE,"(DATE_FORMAT(o.created,'%Y-%m-%d') >= DATE_FORMAT('".$keyword_from_date."','%Y-%m-%d') AND DATE_FORMAT(o.created,'%Y-%m-%d') <= DATE_FORMAT('".$keyword_to_date."','%Y-%m-%d'))");

			$data['keyword_from_date'] = date('d-m-Y',strtotime($keyword_from_date));
			$data['keyword_to_date'] = date('d-m-Y',strtotime($keyword_to_date));
		}
		$fields = '*';
		
		$orders = $this->base_model->get_advance_list('orders o', $join_tables, $fields, $where, '', 'id', 'desc', 'id');
		
		$header = array('Order Id','First Name','Last Name',"Email","Skype","Contact No","Address","Country","City","Product name","Amount","Valid Date","Transcation Id","Order Status","Order Placed On");
		
		$country = $this->base_model->getArrayList('countries','','','id,name');
		
		$cities = $this->base_model->getArrayList('cities','','','id,name');
		
		if(count($orders) > 0){

		foreach($orders as $order_report){
			if($order_report['user_country'] > 0){
				$country_name = $country[$order_report['user_country']];
			}else{
				$country_name = 'N/A';
			}
			if($order_report['user_city'] > 0){
				$city_name  = $country[$order_report['user_city']];
			}else{
				$city_name = 'N/A';
			}
			
			$status = $order_report['status'];
			switch($status){
					case 1 : $transcation_status = 'Completed';break;
					case 2 : $transcation_status = 'Cancelled';break;
					case 3 : $transcation_status = 'Failed';break;
					case 4 : $transcation_status = 'Placed';break;
					case 5 : $transcation_status = 'Processing';break;
					case 6 : $transcation_status = 'Refunded';break;
					case 7 : $transcation_status = 'Refused';break;
					case 8 : $transcation_status = 'Removed';break;
					case 9 : $transcation_status = 'Returned';break;
					case 10 : $transcation_status = 'Reversed';break;
					case 11 : $transcation_status = 'Unclaimed';break;
					case 12 : $transcation_status = 'On hold';break;
					case 13 : $transcation_status = 'Held';break;
					case 14 : $transcation_status = 'Denied';break;
					case 15 : $transcation_status = 'default';break;
				}
			
			$expiry_or_venue_date = "N/A";
			switch($order_report['product_type']){
				case 6: $expiry_or_venue_date = $order_report['prod_attr_location_date'];break;
				case 4: $expiry_or_venue_date = $order_report['prod_attr_location_date'];break;
				case 12: $expiry_or_venue_date = 'N/A';break;
				default: $expiry_or_venue_date = $order_report['expiry_date'];break;
			}
			if($expiry_or_venue_date == '0000-00-00 00:00:00'){
				$expiry_or_venue_date = 'N/A';
			}
			
			$report_data[] = array(
								'#'.$order_report['order_id'],
								($order_report['user_first_name'])?$order_report['user_first_name']:'N/A',
								($order_report['user_last_name'])?$order_report['user_last_name']:'N/A',
								$order_report['user_email'],
								$order_report['user_skype'],
								($order_report['user_phone'])?$order_report['user_phone']:'N/A',
								($order_report['user_address'])?$order_report['user_address']:'',
								$country_name,
								$city_name,
								$order_report['product_name'],
								'$ '.$order_report['amount'],
								$expiry_or_venue_date,
								//($expiry_or_venue_date && !$expiry_or_venue_date ='0000-00-00 00:00:00') ? $expiry_or_venue_date : 'N/A',
								$order_report['transcation_id'],
								$transcation_status,
								$order_report['created']
							);
		}
		
		
		$filename = 'sales_report-'.date('Y-m-d_h-i-s').'.xls';
		
		$this->excel->export($report_data,$header,$filename);
		}else{
			$this->session->set_flashdata('flash_message', 'No Records to Export');
		}
		
		
		redirect(base_url().SITE_ADMIN_URI.'/reports/');
		
	}
	public function index($page_num = 1)
	{  
		
		$data['css'] = $data['js'] = array();
		$data['css'][]='assets/themes/css/jquery.datetimepicker.css';
		$data['js'][]='assets/themes/js/jquery.datetimepicker.full.js';
		
		$search_name_keyword  =  isset($_POST['report_search_name'])?trim($_POST['report_search_name']):(isset($_SESSION['report_search_name'])?$_SESSION['report_search_name']:'');
		$search_from_date_keyword  = isset($_POST['report_search_from_date'])?trim($_POST['report_search_from_date']):(isset($_SESSION['report_search_from_date'])?$_SESSION['report_search_from_date']:'');
		$search_to_date_keyword  = isset($_POST['report_search_to_date'])?trim($_POST['report_search_to_date']):(isset($_SESSION['report_search_to_date'])?$_SESSION['report_search_to_date']:'');
		$search_email_keyword  = isset($_POST['report_search_email'])?trim($_POST['report_search_email']):(isset($_SESSION['report_search_email'])?$_SESSION['report_search_email']:'');
		$search_orderid_keyword  = isset($_POST['report_search_orderid'])?trim($_POST['report_search_orderid']):(isset($_SESSION['report_search_orderid'])?$_SESSION['report_search_orderid']:'');
		$search_product_type_keyword  = isset($_POST['report_search_product_type'])?trim($_POST['report_search_product_type']):(isset($_SESSION['report_search_product_type'])?$_SESSION['report_search_product_type']:'');
		$search_product_order_status  = isset($_POST['report_search_order_status'])?trim($_POST['report_search_order_status']):(isset($_SESSION['report_search_order_status'])?$_SESSION['report_search_order_status']:'');
		
		$this->session->set_userdata('report_search_name', $search_name_keyword); 
		$this->session->set_userdata('report_search_from_date', $search_from_date_keyword);
		$this->session->set_userdata('report_search_to_date', $search_to_date_keyword);
		$this->session->set_userdata('report_search_email', $search_email_keyword);
		$this->session->set_userdata('report_search_orderid', $search_orderid_keyword);
		$this->session->set_userdata('report_search_product_type', $search_product_type_keyword);
		$this->session->set_userdata('report_search_order_status', $search_product_order_status);
		
		$keyword_name_session = $this->session->userdata('report_search_name');
		$keyword_from_date_session = $this->session->userdata('report_search_from_date');
		$keyword_to_date_session = $this->session->userdata('report_search_to_date');
		$keyword_email_session = $this->session->userdata('report_search_email');
		$keyword_orderid_session = $this->session->userdata('report_search_orderid');
		$keyword_product_type_session = $this->session->userdata('report_search_product_type');
		$keyword_order_status_session = $this->session->userdata('report_search_order_status');
		
		
		if($keyword_orderid_session != ''){
			$keyword_orderid = $this->session->userdata('report_search_orderid');
			
		}else{
			isset($_SESSION['report_search_orderid'])?$this->session->unset_userdata('report_search_orderid'):'';
			$keyword_orderid = "";
		}
		
		if($keyword_product_type_session != ''){
			$keyword_product_type = $this->session->userdata('report_search_product_type');			
		}else{
			isset($_SESSION['report_search_product_type'])?$this->session->unset_userdata('report_search_product_type'):'';
			$keyword_product_type = "";
		}
		
		
		
		if($keyword_order_status_session != ''){
			$keyword_order_status = $this->session->userdata('report_search_order_status');			
		}else{
			isset($_SESSION['report_search_order_status'])?$this->session->unset_userdata('report_search_order_status'):'';
			$keyword_order_status = "";
		}
		
		if($keyword_email_session != ''){
			$keyword_email = $this->session->userdata('report_search_email');
			
		}else{
			isset($_SESSION['report_search_email'])?$this->session->unset_userdata('report_search_email'):'';
			$keyword_email = "";
		}
		
		if($keyword_from_date_session != ''){
			$keyword_from_date = $this->session->userdata('report_search_from_date');
			$keyword_from_date = date('Y-m-d',strtotime($keyword_from_date));
		}else{
			isset($_SESSION['search_from_date'])?$this->session->unset_userdata('report_search_from_date'):'';
			$keyword_from_date = "";
		}
		if($keyword_to_date_session != ''){
			$keyword_to_date = $this->session->userdata('report_search_to_date');
			$keyword_to_date = date('Y-m-d',strtotime($keyword_to_date));
		}else{
			isset($_SESSION['report_search_to_date'])?$this->session->unset_userdata('report_search_to_date'):'';
			$keyword_to_date = "";
		}
		
		if($keyword_name_session != ''){
			$keyword_name = $this->session->userdata('report_search_name');
		}else{
			isset($_SESSION['report_search_name'])?$this->session->unset_userdata('report_search_name'):'';
			$keyword_name = "";
		}
		
		$this->load->helper('thumb_helper');
		$this->load->helper('html');
		$this->load->library('pagination');
		$config  = $this->config->item('back_pagination');
		
		$config["base_url"] = base_url().SITE_ADMIN_URI."/reports/index";
		$data["per_page"] = $config["per_page"] = $this->config->item('admin_page_per_limit'); 
		$config["uri_segment"] = 4;
		$data['limit_end'] = $limit_end = ($page_num - 1) * $config['per_page'];  
		$limit_start = $config['per_page'];
		$where = $join_tables =  array();  
		
		if($keyword_orderid){
			$where[] = array( FALSE,"(o.order_id LIKE '%$keyword_orderid%' or o.transcation_id LIKE '%$keyword_orderid%')");
			$data['keyword_orderid'] = $keyword_orderid;
		}else{
			$data['keyword_orderid'] = "";
		}
		
		if($keyword_email){
			$where[] = array( TRUE, 'o.user_email LIKE ', '%'.$keyword_email.'%' );
			$data['keyword_email'] = $keyword_email;
		}else{
			$data['keyword_email'] = "";
		}
		
		if($keyword_name)
		{
			$where[] = array( TRUE, 'o.product_name LIKE ', '%'.$keyword_name.'%' );
			$data['keyword_name'] = $keyword_name;
		}
		else{
			$data['keyword_name'] = "";
		}
		$data['keyword_from_date'] = "";
		$data['keyword_to_date'] = "";
		
		if($keyword_from_date&&empty($keyword_to_date)){
			$where[] = array( FALSE,"(DATE_FORMAT(o.created,'%Y-%m-%d') >= DATE_FORMAT('".$keyword_from_date."','%Y-%m-%d'))");
			$data['keyword_from_date'] = date('d-m-Y',strtotime($keyword_from_date));
		}
		
		if($keyword_to_date&&empty($keyword_from_date)){
			$where[] = array( FALSE,"(DATE_FORMAT(o.created,'%Y-%m-%d') <= DATE_FORMAT('".$keyword_to_date."','%Y-%m-%d'))");
			$data['keyword_to_date'] = date('d-m-Y',strtotime($keyword_to_date));
		}
		
		if($keyword_product_type){
			$where[] = array( TRUE, 'o.product_type', $keyword_product_type );
			$data['keyword_product_type'] = $keyword_product_type;
		}
		else{
			$data['keyword_product_type'] = "";
		}
		
		if($keyword_order_status){
			$where[] = array( TRUE, 'o.status', $keyword_order_status );
			$data['keyword_order_status'] = $keyword_order_status;
		}
		else{
			$data['keyword_order_status'] = "";
		}
		
		if($keyword_from_date&&$keyword_to_date){
			$where[] = array( FALSE,"(DATE_FORMAT(o.created,'%Y-%m-%d') >= DATE_FORMAT('".$keyword_from_date."','%Y-%m-%d') AND DATE_FORMAT(o.created,'%Y-%m-%d') <= DATE_FORMAT('".$keyword_to_date."','%Y-%m-%d'))");

			$data['keyword_from_date'] = date('d-m-Y',strtotime($keyword_from_date));
			$data['keyword_to_date'] = date('d-m-Y',strtotime($keyword_to_date));
		}
		$fields = '*';
		$data['total_rows'] = $config['total_rows'] = $this->base_model->get_advance_list('orders o', $join_tables, $fields, $where, 'num_rows','','','id');
		$data['orders'] = $this->base_model->get_advance_list('orders o', $join_tables, $fields, $where, '', 'id', 'desc', 'id', $limit_start, $limit_end);
		
		$fields = 'id,name';
		$where = array("slug != 'webinar' && slug != 'webinar-group'");
		$product_type = $this->base_model->getArrayList('product_type', $where, '',$fields);
		$data['product_type'] = $product_type;
		//pr($product_type);die;
		
		$order_status = $this->order_status();
		$data['order_status'] = $order_status;
		
		$this->pagination->initialize($config);
		$data['main_content'] = 'reports/sales';
		$data['page_title']  = 'Sales Report'; 
		$this->load->view(ADMIN_LAYOUT_PATH, $data); 	

	}
	
	public function order_status(){
		$order_status = array(
										'' => 'Select',
										1 => 'Completed',
										2 => 'Cancelled',
										3 => 'Failed',
										4 => 'Placed',
										5 => 'Processing',
										6 => 'Refunded',
										7 => 'Refused',
										8 => 'Removed',
										9 => 'Returned',
										10 => 'Reversed',
										11 => 'Unclaimed',
										12 => 'On hold',
										13 => 'Held',
										14 => 'Denied',
										15 => 'default'
										);
		return $order_status;
	}	
		
	public function reset()
	{
		$this->session->unset_userdata('report_search_name');
		$this->session->unset_userdata('report_search_from_date');
		$this->session->unset_userdata('report_search_to_date');
		$this->session->unset_userdata('report_search_email');
		$this->session->unset_userdata('report_search_orderid');
		$this->session->unset_userdata('report_search_product_type');
		$this->session->unset_userdata('report_search_order_status');
		redirect(base_url().SITE_ADMIN_URI.'/reports/');
	}
	
	
}

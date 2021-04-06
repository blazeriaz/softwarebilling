<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Orders extends Admin_Controller
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
	
	public function searchorders(){
		$email = $this->input->get('email', TRUE);
		$this->session->set_userdata('order_search_email', $email);
		redirect(SITE_ADMIN_URI.'/orders/index');
	}
	public function index($page_num = 1)
	{  
		$data['css'] = $data['js'] = array();
		$data['css'][]='assets/themes/css/jquery.datetimepicker.css';
		$data['js'][]='assets/themes/js/jquery.datetimepicker.full.js';
		
		$search_name_keyword  =  isset($_POST['search_name'])?trim($_POST['search_name']):(isset($_SESSION['order_search_name'])?$_SESSION['order_search_name']:'');
		$search_from_date_keyword  = isset($_POST['search_from_date'])?trim($_POST['search_from_date']):(isset($_SESSION['order_search_from_date'])?$_SESSION['order_search_from_date']:'');
		$search_to_date_keyword  = isset($_POST['search_to_date'])?trim($_POST['search_to_date']):(isset($_SESSION['order_search_to_date'])?$_SESSION['order_search_to_date']:'');
		$search_email_keyword  = isset($_POST['search_email'])?trim($_POST['search_email']):(isset($_SESSION['order_search_email'])?$_SESSION['order_search_email']:'');
		$search_orderid_keyword  = isset($_POST['search_orderid'])?trim($_POST['search_orderid']):(isset($_SESSION['order_search_orderid'])?$_SESSION['order_search_orderid']:'');
		
		$this->session->set_userdata('order_search_name', $search_name_keyword); 
		$this->session->set_userdata('order_search_from_date', $search_from_date_keyword);
		$this->session->set_userdata('order_search_to_date', $search_to_date_keyword);
		$this->session->set_userdata('order_search_email', $search_email_keyword);
		$this->session->set_userdata('order_search_orderid', $search_orderid_keyword);
		
		$keyword_name_session = $this->session->userdata('order_search_name');
		$keyword_from_date_session = $this->session->userdata('order_search_from_date');
		$keyword_to_date_session = $this->session->userdata('order_search_to_date');
		$keyword_email_session = $this->session->userdata('order_search_email');
		$keyword_orderid_session = $this->session->userdata('order_search_orderid');
		
		
		if($keyword_orderid_session != ''){
			$keyword_orderid = $this->session->userdata('order_search_orderid');
			
		}else{
			isset($_SESSION['order_search_orderid'])?$this->session->unset_userdata('order_search_orderid'):'';
			$keyword_orderid = "";
		}
		
		if($keyword_email_session != ''){
			$keyword_email = $this->session->userdata('order_search_email');
			
		}else{
			isset($_SESSION['order_search_email'])?$this->session->unset_userdata('order_search_email'):'';
			$keyword_email = "";
		}
		
		if($keyword_from_date_session != ''){
			$keyword_from_date = $this->session->userdata('order_search_from_date');
			$keyword_from_date = date('Y-m-d',strtotime($keyword_from_date));
		}else{
			isset($_SESSION['order_search_from_date'])?$this->session->unset_userdata('order_search_from_date'):'';
			$keyword_from_date = "";
		}
		if($keyword_to_date_session != ''){
			$keyword_to_date = $this->session->userdata('order_search_to_date');
			$keyword_to_date = date('Y-m-d',strtotime($keyword_to_date));
		}else{
			isset($_SESSION['order_search_to_date'])?$this->session->unset_userdata('order_search_to_date'):'';
			$keyword_to_date = "";
		}
		
		if($keyword_name_session != ''){
			$keyword_name = $this->session->userdata('order_search_name');
		}else{
			isset($_SESSION['order_search_name'])?$this->session->unset_userdata('order_search_name'):'';
			$keyword_name = "";
		}
		
		$this->load->helper('thumb_helper');
		$this->load->helper('html');
		$this->load->library('pagination');
		$config  = $this->config->item('back_pagination');
		
		$config["base_url"] = base_url().SITE_ADMIN_URI."/orders/index";
		$data["per_page"] = $config["per_page"] = $this->config->item('admin_page_per_limit'); 
		$config["uri_segment"] = 4;
		$data['limit_end'] = $limit_end = ($page_num - 1) * $config['per_page'];  
		$limit_start = $config['per_page'];
		$where = $join_tables =  array();  
		
		if($keyword_orderid){
			$where[] = array( FALSE,"(o.order_id LIKE '%$keyword_orderid%')");
			$data['keyword_orderid'] = $keyword_orderid;
		}else{
			$data['keyword_orderid'] = "";
		}
		
		if($keyword_email){
			$where[] = array( TRUE, 'o.phone_no LIKE ', '%'.$keyword_email.'%' );
			$data['keyword_email'] = $keyword_email;
		}else{
			$data['keyword_email'] = "";
		}
		
		if($keyword_name)
		{
			$where[] = array( TRUE, 'o.store_name LIKE ', '%'.$keyword_name.'%' );
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
		
		if($keyword_from_date&&$keyword_to_date){
			$where[] = array( FALSE,"(DATE_FORMAT(o.created,'%Y-%m-%d') >= DATE_FORMAT('".$keyword_from_date."','%Y-%m-%d') AND DATE_FORMAT(o.created,'%Y-%m-%d') <= DATE_FORMAT('".$keyword_to_date."','%Y-%m-%d'))");

			$data['keyword_from_date'] = date('d-m-Y',strtotime($keyword_from_date));
			$data['keyword_to_date'] = date('d-m-Y',strtotime($keyword_to_date));
		}

		$whereyear[] = array(FALSE,"(YEAR(from_date) <= YEAR(CURDATE()) and MONTH(from_date) >= 4)");
		$academic_year = $this->base_model->get_advance_list('academic_year ay', [], '*', $whereyear, '', 'id', 'asc', 'id');
		$curr_year = date('Y');
		$data['current_year_selected'] = 1;

		
		if(isset($_SESSION['academic_year_id'])){
			$data['current_year_selected'] = $_SESSION['academic_year_id'];
			$order_year_from = $this->session->userdata('order_year_from');
			$order_year_to = $this->session->userdata('order_year_to');
			$current_from_order = date('Y-m-d',strtotime($order_year_from));
			$current_to_order = date('Y-m-d',strtotime($order_year_to));
			$where[] = array( FALSE,"(DATE_FORMAT(o.created,'%Y-%m-%d') >= DATE_FORMAT('".$current_from_order."','%Y-%m-%d') AND DATE_FORMAT(o.created,'%Y-%m-%d') <= DATE_FORMAT('".$current_to_order."','%Y-%m-%d'))");
		}else{
		foreach($academic_year as $year){

			if($curr_year == date('Y',strtotime($year['from_date']))){
				$data['current_year_selected'] = $year['id'];
				$current_from_order = date('Y-m-d',strtotime($year['from_date']));
				$current_to_order = date('Y-m-d',strtotime($year['to_date']));
				$where[] = array( FALSE,"(DATE_FORMAT(o.created,'%Y-%m-%d') >= DATE_FORMAT('".$current_from_order."','%Y-%m-%d') AND DATE_FORMAT(o.created,'%Y-%m-%d') <= DATE_FORMAT('".$current_to_order."','%Y-%m-%d'))");				
			}
		}
	}

		$fields = '*';
		$data['total_rows'] = $config['total_rows'] = $this->base_model->get_advance_list('orders o', $join_tables, $fields, $where, 'num_rows','','','id');
		 
		$data['orders'] = $this->base_model->get_advance_list('orders o', $join_tables, $fields, $where, '', 'order_id', 'desc', 'id', $limit_start, $limit_end);		

		$data['academic_year'] = $academic_year;
		$this->pagination->initialize($config);
		$data['main_content'] = 'orders/index';
		$data['page_title']  = 'My Orders'; 
		$this->load->view(ADMIN_LAYOUT_PATH, $data); 	

	}

	public function setyear(){
		$data = $this->input->post();		
		if($data['academic_year']){
			$db_row = $this->base_model->getRow('academic_year','*',array('id' => $data['academic_year']));
		   
			if(!empty($db_row)){
					
					$this->session->set_userdata('order_year_from', $db_row->from_date); 
					$this->session->set_userdata('order_year_to', $db_row->to_date); 
					$this->session->set_userdata('academic_year_id', $db_row->id); 
			}
			
		}
		redirect(base_url().SITE_ADMIN_URI.'/orders/');			
	}
	
	public function getproductdetails(){
		$data = $this->input->post();
		$product_id = $data['product_id'];
		$userid = $data['userid'];
		$type_id = $data['product_type'];
		
		if($product_id){
		$where = $join_tables =  array(); 
		$where[] = array(TRUE,'p.status',1);
		$where[] = array(TRUE,'p.id',$product_id);
		$fields = 'p.id,p.name,pt.name as type_name,pt.slug as type_slug,p.price,p.product_type_id';
		$join_tables[] = array('product_type pt','pt.id = p.product_type_id','inner');
		$products = $this->base_model->get_advance_list('product p', $join_tables, $fields, $where, '', 'id', 'asc', 'id');
		
		$product_price ='<div class="form-group">';
        $product_price .= '<label for="price" class="col-sm-2 control-label">Price ($)</label> 
							<div class="col-sm-4" id="price_div">
							<input type="text" id="price_val" class="form-control" value="'.$products[0]['price'].'" name="price" /></div>
							</div>';
		
		
		if($products[0]['type_slug'] == 'assesment-preparation' || $products[0]['type_slug'] =='complete-comprehensive-course' || $products[0]['type_slug'] =='rapid-review-course' || $products[0]['type_slug'] =='online-mock-exam' || $products[0]['type_slug'] =='patient-note-correction'){
		
		$time_slot_ids = [];
		if($products[0]['type_slug'] == 'online-mock-exam'){
		$where = $join_tables =  array(); 
			
			$where[] = array(TRUE,'o.user_id',$userid);
			$where[] = array(TRUE,'o.product_type',$type_id);
			$fields = 'o.id,o.timeslot_id,o.prod_attr_city,o.prod_attr_location,o.prod_attr_location_date';
			$order_purchased = $this->base_model->get_advance_list('orders o', $join_tables, $fields, $where, '', 'id', 'asc', 'id');
			
			if($order_purchased){
				foreach($order_purchased as $online_exam_pur){
					$time_slot_ids[] = $online_exam_pur['timeslot_id'];
					
				}
			}
			
		
		}
		
		
		$now = date('Y-m-d h:i:s');	
		$where = $join_tables =  array(); 
		$where[] = array(TRUE,'status',1);
		if(count($time_slot_ids) > 0){
			$this->db->where_not_in('id', $time_slot_ids);
		}
		$where[] = array(TRUE,'is_complete',0);
		$where[] = array(TRUE,'product_type_id',$products[0]['product_type_id']);
		$where[] = array(TRUE,'product_id',$product_id);
		$where[] = array(TRUE,'date_time >=',$now);
		$fields = '*';
		
		$availability = $this->base_model->get_advance_list('admin_availability_time_slot', $join_tables, $fields, $where, '', 'id', 'asc', 'id');
		
		
		if(count($availability) > 0){
			
			
			
			
			$product_price .='<div class="form-group">';
        $product_price .= '<label for="timeslot" class="col-sm-2 control-label">Time Slot </label> 
							<div class="col-sm-4" id="timeslot_div">
							<select name="time_slot" class="form-control" id="time_slot_val"> 
							<option value="">Select</option>';
						foreach($availability as $available){
							$product_price .= '<option data-datetime="'.$available['date_time'].'" value="'.$available['id'].'">'.$available['timeslot_name'].' - ('.$available['batch_name'].') '.date('Y-m-d',strtotime($available['date_time'])).' </option>';
						}
		 $product_price .='</select>
							</div>
							</div>';
		$product_price .="<style> #add_order_submit button{ display:block; }</style>";
		}else{
			
			$product_price .='<div class="form-group">';
        $product_price .= '<label for="timeslot" class="col-sm-2 control-label ">Time Slot </label> 
							<div class="col-sm-4" id="timeslot_div">
							<label class="error"><p class="error">Please First Create Time Slot and then Add Order</p><label>
							</div>
							</div>';
		 $product_price .="<style> #add_order_submit button{ display:none; }</style>";
				
			
		}
		
		}
		}else{
			$product_price = '';
			$product_price .="<style> #add_order_submit button{ display:none; }</style>";
		}
							
		echo $product_price;
	}
	
	public function getuseraddress(){
		
		$post = $this->input->post();	
		
		
		$join_tables = $where = array(); 
		$where[] = array( TRUE, 'id', $post['id']);
		$fields = '*'; 
		$getValues = $this->base_model->get_advance_list('user_address', $join_tables, $fields, $where, 'row_array');
		
		
		$join_tables1 = $where = array(); 
		$where1[] = array( TRUE, 'id', $getValues['user_id']);
		$fields1 = 'first_name,last_name,phone_no,skype_id,'; 
		$getValues1 = $this->base_model->get_advance_list('users', $join_tables, $fields, $where1, 'row_array');
		
		
		$address_list = array();
		
		if(!empty($getValues)){		
		
			
			$address_list = array(
							'id'	=>$getValues['id'],							
							'address_line1'=>$getValues['address_line1'],
							'address_line2'=>$getValues['address_line2'],
							'address_line3'=>$getValues['address_line3'],
							'address_line4'=>$getValues['address_line4'],
							'store_name'=>$getValues1['first_name'],
							'name'=>$getValues1['last_name'],
							'phone_no'=>$getValues1['phone_no'],
							'gstin'=>$getValues1['skype_id']							
								);
		
		}
		//print_r($getValues);
		echo json_encode($address_list);
		
	}
	
	public function getaddress(){
		$post = $this->input->post();
		
		$join_tables1 = $where = array(); 
		$where1[] = array( TRUE, 'id', $post['user_id']);
		$fields1 = 'first_name,last_name,phone_no,skype_id,'; 
		$getValues1 = $this->base_model->get_advance_list('users', $join_tables, $fields, $where1, 'row_array');	
		
		//print_r($getValues1);exit;
		
		
		
		
		$details = array('store_details' => array(		
											'store_name'=>$getValues1['first_name'],
											'name'=>$getValues1['last_name'],
											'phone_no'=>$getValues1['phone_no'],
											'gstin'=>$getValues1['skype_id'],
										    'address'=>$getValues1['address']
											)						
							);
		//print_r($details);
		echo json_encode($details);
		
		}
		
	
	public function getproduct(){
		
		$post = $this->input->post();
		
		$join_tables1 = $where = array(); 
		$where1[] = array( TRUE, 'id', $post['pid']);
		$fields = '*'; 
		$getValues1 = $this->base_model->get_advance_list('product', $join_tables, $fields, $where1, 'row_array');
		echo json_encode($getValues1);
	}
	
	public function delete($id){
		$table_name = 'orders';
		$this->base_model->delete($table_name, array('id' => $id));
		
		$table_name2 = 'order_item';
		$this->base_model->delete($table_name2, array('order_id' => $id));
		$this->session->set_flashdata('flash_message', $this->lang->line('delete_record') );
		redirect(base_url().SITE_ADMIN_URI.'/orders/');			
	}
	
	public function updatetonage(){
			//echo 'hii'; exit;
		    $join_tables = $where = array();
           // $where1[] = array( TRUE, 'id', $id);
            $fields = '*';
            $order_details = $this->base_model->get_advance_list('orders', $join_tables, $fields, $where, 'result_array');
			
			foreach($order_details as $main_order){
				
				
				
			$join_tables3 = $where3 = array();
            $where3[] = array( TRUE, 'order_id', $main_order['id']);
            $fields3 = '*';
            $orderitem_details = $this->base_model->get_advance_list('order_item', $join_tables3, $fields3, $where3, 'result_array');
			
			
			$total_qty = 0;
			$sub_total = 0;
				foreach($orderitem_details as $order_items){
						//echo '<pre>';print_r($order_items);
					$total_qty += $order_items['qty'];
					$sub_total += $order_items['total_price'];					
				}
				
				$total_tax_percentage = ($main_order['c_tax_percentage'] + $main_order['s_tax_percentage']);
				
				$total_amount_han_tras = ($sub_total + $main_order['handling_charge'] + $main_order['transport_charge']);
				
				$total_tax = (($total_amount_han_tras * $total_tax_percentage) / 100);

				$grand_total = $total_amount_han_tras + $total_tax;
				
			$update_data = array(
							'total_qty' => $total_qty,
							'grand_total' => $grand_total,
							'global_hsn_code'=>$orderitem_details[0]['hsn_code']
							);
			$order_id = $this->base_model->update( 'orders', $update_data, array('id'=>$main_order['id']));	
				
			}
			echo 'Done';
			exit;
	}
	
	public function deleteorderItem(){
		$data = $this->input->post();
		
		$table_name2 = 'order_item';
		$this->base_model->delete($table_name2, array('id' => $data['item_id']));		
		
		
		$join_tables3 = $where3 = array();
		$where3[] = array( TRUE, 'order_id', $data['order_id']);
		$fields3 = '*';
		$orderitem_details = $this->base_model->get_advance_list('order_item', $join_tables3, $fields3, $where3, 'result_array');
		//echo count($orderitem_details);
		if(count($orderitem_details) > 0){
			
		$join_tables = $where = array();
		$where[] = array( TRUE, 'id', $data['order_id']);
		$fields = '*';
		$order_details = $this->base_model->get_advance_list('orders', $join_tables, $fields, $where, 'result_array');	
		
		
			
		$total_qty = 0;
		$sub_total = 0;
		foreach($orderitem_details as $order_items){
				//echo '<pre>';print_r($order_items);
			$total_qty += $order_items['qty'];
			$sub_total += $order_items['total_price'];					
		}
		$total_amt_with_hand = $sub_total + $order_details[0]['transport_charge'] + $order_details[0]['handling_charge'];
		
		$total_tax_percentage = ($order_details[0]['c_tax_percentage'] + $order_details[0]['s_tax_percentage']);
		
		$total_tax = (($total_amt_with_hand * $total_tax_percentage) / 100);
		
		$grand_total = $total_amt_with_hand + $total_tax;
		
		$global_hsn_code = $orderitem_details[0]['hsn_code'];
		
		$total_price_with_tax = (($sub_total * $total_tax_percentage) / 100);
		
		$total_price_c_tax = (($sub_total * $order_details[0]['c_tax_percentage']) / 100);
		
		$total_price_s_tax = (($sub_total * $order_details[0]['s_tax_percentage']) / 100);
		
		
		}else{
			$total_qty = 0;
			$sub_total = 0;
			$grand_total = 0;
			$global_hsn_code ='';
			$total_price_with_tax = 0;
			$total_price_c_tax = 0;
			$total_price_s_tax = 0;
		}
		
		$update_data = array(
							'total_qty' => $total_qty,
							'total_with_tax' => $total_price_with_tax,
							'c_tax_amount' => $total_price_c_tax,
							's_tax_amount' => $total_price_s_tax,
							'total'		=> $sub_total,
							'grand_total' => $grand_total,
							'global_hsn_code'=> $global_hsn_code
							);
		
		$order_id = $this->base_model->update( 'orders', $update_data, array('id'=>$data['order_id']));	
		//echo $this->db->last_query();
		//print_r($update_data);
		
	}
	
	function edit($id){

        $data['css'] = $data['js'] = array();
        $data['css'][]='assets/themes/css/select2.min.css';
        $data['css'][]='assets/themes/css/jquery-ui.min.css';
        $data['js'][]='assets/themes/js/select2.full.min.js';
        $data['js'][]='assets/themes/js/jquery-ui.min.js';
        $data['product_id'] = array(''=>'Select');
        $fields = "id,CONCAT(first_name, ' - ', last_name) as firstlast";
        //$where = array('is_email_verified' => 1);
        $where = $join_tables =  array();
        $keys = array('id','firstlast');
        $users_list = $this->base_model->getSelectList('users', $where, '',$fields, 'first_name','asc',$keys);
        if($id){

            $join_tables = $where = array();
            $where1[] = array( TRUE, 'id', $id);
            $fields = '*';
            $order_details = $this->base_model->get_advance_list('orders', $join_tables, $fields, $where1, 'row_array');
            $data['edit_order'] = $order_details;

            $join_tables3 = $where = array();
            $where3[] = array( TRUE, 'order_id', $id);
            $fields3 = '*';
            $orderitem_details = $this->base_model->get_advance_list('order_item', $join_tables3, $fields3, $where3, 'result_array');
            $data['edit_orderitems'] = $orderitem_details;         

        }
		
        $site_settings = get_site_settings(array('site.cgst','site.sgst','site.lastorder'));
        $cgst_tax_percentage = $site_settings[1]['value'];
        $sgst_tax_percentage = $site_settings[2]['value'];
        $data['cgst_tax_percentage'] = $cgst_tax_percentage;
        $data['sgst_tax_percentage'] = $sgst_tax_percentage;
        $data['total_tax_percentage'] = $cgst_tax_percentage + $sgst_tax_percentage;
		
		
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			$data = $this->input->post();
			
			$this->form_validation->set_rules('store_name', 'Store Name','trim|required');
			$this->form_validation->set_rules('last_name', 'Customer Name','trim');
			$this->form_validation->set_rules('phone_no', 'Phone number','trim');
			$this->form_validation->set_rules('address_line1', 'Address Line 1','trim|required');
			$this->form_validation->set_rules('delivery_at', 'Delivery at','trim');
			$this->form_validation->set_rules('gstin', 'GSTIN No','trim|required');
			
			foreach($data['product']  as $key => $product){
				if($product['name'] == "" || $product['qty'] == "" || $product['unit_price'] == "" || $product['total_price'] == ""){					
					unset($data['product'][$key]);					 
				 }
			}			
			if(count($data['product']) == 0){
				$this->form_validation->set_rules('product', 'Product Order Item Below','trim|required');
			}			
			if ($this->form_validation->run()){
				$grand_total = 0;
				$total_qty = 0;
				foreach($data['product']  as $key => $product){					
					$grand_total += $product['total_price'];
					$total_qty += $product['qty'];
				}
				
				$sub_total = $grand_total;
				
				
				$total_tax_percentage = $cgst_tax_percentage + $sgst_tax_percentage;
				$total_tax_amount = (($grand_total * $total_tax_percentage)/100);
				$c_tax_amount = (($grand_total * $cgst_tax_percentage)/100);
				$s_tax_amount = (($grand_total * $sgst_tax_percentage)/100);
				$total_with_tax = $grand_total + $total_tax_amount;
				
                $grand_total = $total_with_tax - $order_details['discount'];
				
				$handling = $order_details['handling_charge'];
				if($handling > 0){
					$cgst_handling_tax_amount = (($handling * $cgst_tax_percentage)/100);
					$sgst_handling_tax_amount = (($handling * $sgst_tax_percentage)/100);
				}else{
					$cgst_handling_tax_amount = 0;
					$sgst_handling_tax_amount = 0;
				}
				$transport = $order_details['transport_charge'];
				if($transport > 0){
					$cgst_transport_tax_amount = (($transport * $cgst_tax_percentage)/100);
					$sgst_transport_tax_amount = (($transport * $sgst_tax_percentage)/100);
				}else{
					$cgst_transport_tax_amount = 0;
					$sgst_transport_tax_amount = 0;
				}
				
				
				$new_grand_total_tax = ((($sub_total + $handling + $transport)* $total_tax_percentage) / 100);
				
				$new_grand_total = $sub_total + $handling + $transport + $new_grand_total_tax;
				$tcs_tax = 0;
				$tcs_percent = 0;
				if($order_details['display_tcs'] == 1){
					$tcs_tax_settings = get_site_settings(array('site.tcs_tax_percent'));
					$tcs_percent = $tcs_tax_settings[0]['value'];
					$tcs_tax = (($new_grand_total * $tcs_percent) / 100);
					$new_grand_total = $new_grand_total + $tcs_tax;	
	
				}
				
							$order_data = array(								
								'store_name'	=> $data['store_name'],
								'global_hsn_code'=> $data['product'][0]['hsn_code'],
								'total_qty'		=> $total_qty, 
								'display_tcs'=> $order_details['display_tcs'],
								'tcs_amount'=>$tcs_tax,
								'tcs_percent'=>$tcs_percent,
								'customer_name' => $data['last_name'],
								'phone_no'		=> $data['phone_no'],
								'gstin'			=> $data['gstin'],
								'address_line1' => $data['address_line1'],
								'delivery_at' => $data['delivery_at'],
								'address_line3' => $data['address_line3'],
								'address_line4' => $data['address_line4'],
								'total'			=> $sub_total,
								'total_with_tax'=> $total_with_tax,
                                'grand_total'=>$new_grand_total,
								'c_tax_amount'  => $c_tax_amount,
								's_tax_amount'	=> $s_tax_amount,
								'c_tax_percentage' => $cgst_tax_percentage,
								's_tax_percentage' => $sgst_tax_percentage,
								'handling_charge' => $handling,
								'handling_charge_tax' => $cgst_handling_tax_amount,
								'handling_charge_stax' => $sgst_handling_tax_amount,
								'transport_charge' => $transport,
								'transport_charge_tax' => $cgst_transport_tax_amount,
								'transport_charge_stax' => $sgst_transport_tax_amount,
								);
							$order_id = $this->base_model->update( 'orders', $order_data, array('id'=>$id));
							
							
													
						//print_r($data['product']);
						//exit;
				
				foreach($data['product']  as $key => $product){
								
					$total_tax_percentage = $total_tax_amount = $c_tax_amount = $s_tax_amount = $total_with_tax = 0;
					
					$total_tax_percentage = $cgst_tax_percentage + $sgst_tax_percentage;
					$total_tax_amount = (($product['total_price'] * $total_tax_percentage)/100);
					$c_tax_amount = (($product['total_price'] * $cgst_tax_percentage)/100);
					$s_tax_amount = (($product['total_price'] * $sgst_tax_percentage)/100);
					$total_with_tax = $product['total_price'] + $total_tax_amount;				
					
					$update_order_item = array();			
					$update_order_item = array(
												'order_id'		=> $id,
												'product_id'	=> $product['name'],
												'hsn_code'	=> $product['hsn_code'],
												'product_options'	=> $product['product_addition'],
												'product_name'	=> $product['product_name'],
												'qty'			=> $product['qty'],
												'unit_price'	=> $product['unit_price'],
												'total_price'	=> $product['total_price'],
												'total_price_with_tax' => $total_with_tax,
												'c_tax_amount'		=> $c_tax_amount,
												's_tax_amount'		=> $s_tax_amount,
												'c_tax_percentage'	=> $cgst_tax_percentage,
												's_tax_percentage'	=> $sgst_tax_percentage,												
												'updated'			=> date('Y-m-d h:i:s')
												);	
					if(isset($product['item_id']) && $product['item_id'] != ""){
						$this->base_model->update ( 'order_item', $update_order_item, array('id'=>$product['item_id']));
					}else{						
						$update_order_item['created'] = date('Y-m-d h:i:s');
						$this->base_model->insert( 'order_item', $update_order_item);
					}
				}
				
				$this->session->set_flashdata('flash_message', 'Order Updated Sucessfully');

				redirect(base_url().SITE_ADMIN_URI.'/orders/index');	
				
			}		
		}

        

        

        $users_address = array();		

        $data['users_address'] = $users_address;

        $data['users_list'] = $users_list;

        $wherenew = $join_tables =  array();

        $fields_new = "id,name";

        $mykeys = array('id','name');

        $products = $this->base_model->getSelectList('product', $wherenew, '', $fields_new,'name','asc',$mykeys);


        $data['products'] = $products;
        $data['main_content'] = 'orders/edit';
        $data['page_title']  = 'Edit Order';
        $this->load->view(ADMIN_LAYOUT_PATH, $data);

    }
    
    public function discount(){
     $data = $this->input->post();
     
    $join_tables = $where1 = array();
    $where1[] = array( TRUE, 'id', $data['order_id']);
    $fields = '*';
    $order_details = $this->base_model->get_advance_list('orders', $join_tables, $fields, $where1, 'row_array');

    $discount = isset($data['discount'])?$data['discount']:0;
    $handling = isset($data['handling'])?$data['handling']:0;
    $transport = isset($data['transport'])?$data['transport']:0;
   $display_igst = isset($data['display_igst'])?$data['display_igst']:0;
   $display_tcs = isset($data['display_tcs'])?$data['display_tcs']:0;
	
	
    $cgst_tax_percentage = $order_details['c_tax_percentage'];
    $sgst_tax_percentage = $order_details['s_tax_percentage'];
    
    $total_tax_percentage = $cgst_tax_percentage + $sgst_tax_percentage;
    $cgst_handling_tax_amount = $sgst_handling_tax_amount = $cgst_transport_tax_amount = $sgst_transport_tax_amount = 0;
    if($handling > 0){
        $cgst_handling_tax_amount = (($handling * $cgst_tax_percentage)/100);
        $sgst_handling_tax_amount = (($handling * $sgst_tax_percentage)/100);
    }
    if($transport > 0){
        $cgst_transport_tax_amount = (($transport * $cgst_tax_percentage)/100);
        $sgst_transport_tax_amount = (($transport * $sgst_tax_percentage)/100);
    }    
    $total = ((($order_details['total_with_tax'] + $handling + $transport) * total_tax_percentage) / 100);
    $grand_total = round($total);
	
	
	$total_tax_new = ((($order_details['total'] + $handling + $transport) * $total_tax_percentage) / 100);
	
	$grand_total_new = ($order_details['total'] + $handling + $transport + $total_tax_new);
	
	$tcs_tax = 0;
	$tcs_percent = 0;
    
	if($display_tcs == 1){
	$tcs_tax_settings = get_site_settings(array('site.tcs_tax_percent'));
	$tcs_percent = $tcs_tax_settings[0]['value'];	
	
	$tcs_tax = (($grand_total_new * $tcs_percent) / 100);
	
	$grand_total_new = $grand_total_new + $tcs_tax;	
	
	}
	
	$discount_data = array(
                    'discount' => $data['discount'],
					'display_igst'=> $display_igst,
					'display_tcs'=> $display_tcs,
					'tcs_amount'=>$tcs_tax,
					'tcs_percent'=>$tcs_percent,
					'address_line2'=>$data['vehicle_no'],
					'address_line3'=>$data['way_bill'],
                    'order_id' => $data['invoice_no'],
                    'delivery_at'=>$data['delivery_at'],
                    'grand_total' => $grand_total_new,                    
                    'handling_charge' => $handling,
                    'handling_charge_tax' => $cgst_handling_tax_amount,
                    'handling_charge_stax' => $sgst_handling_tax_amount,
                    'transport_charge' => $transport,
                    'transport_charge_tax' => $cgst_transport_tax_amount,
                    'transport_charge_stax' => $sgst_transport_tax_amount,
                    );
     $this->base_model->update( 'orders', $discount_data, array('id'=> $data['order_id']));
     $this->session->set_flashdata('flash_message', 'Order Updated successfully');
     redirect(base_url().SITE_ADMIN_URI.'/orders/view/'.$data['order_id']);	
    }
	
	public function add(){
		
		$data['css'] = $data['js'] = array();
		
		$data['css'][]='assets/themes/css/select2.min.css';
		$data['css'][]='assets/themes/css/jquery-ui.min.css';
		
		$data['js'][]='assets/themes/js/select2.full.min.js';
		$data['js'][]='assets/themes/js/jquery-ui.min.js';	
		
		$data['css'][]='assets/themes/css/jquery.datetimepicker.css';
		$data['js'][]='assets/themes/js/jquery.datetimepicker.full.js';
		
		$site_settings = get_site_settings(array('site.cgst','site.sgst','site.lastorder'));
		$cgst_tax_percentage = $site_settings[1]['value'];
		$sgst_tax_percentage = $site_settings[2]['value'];
		$data['cgst_tax_percentage'] = $cgst_tax_percentage;
		$data['sgst_tax_percentage'] = $sgst_tax_percentage;
		$data['total_tax_percentage'] = $cgst_tax_percentage + $sgst_tax_percentage;
		
		
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{ 			
		    $data = $this->input->post();
			
			$this->form_validation->set_rules('store_name', 'Store Name','trim|required');
			$this->form_validation->set_rules('last_name', 'Customer Name','trim');
			$this->form_validation->set_rules('phone_no', 'Phone number','trim');
			$this->form_validation->set_rules('address_line1', 'Address Line 1','trim');			
			$this->form_validation->set_rules('gstin', 'GSTIN No','trim|required');
			
			foreach($data['product']  as $key => $product){				
				
				if($product['name'] == "" || $product['qty'] == "" || $product['unit_price'] == "" || $product['total_price'] == ""){
					
					unset($data['product'][$key]);
					 
				 }
			}
			
			
			
			if(count($data['product']) == 0){
				$this->form_validation->set_rules('product', 'Product Order Item Below','trim|required');
			}
			
			
			
			if ($this->form_validation->run()){

				/*$site_setting_data = array(
										'setting_category_id' => 1,
										'name' => 'site.tcs_tax_percent',
										'value' => 0.075,
										'description'=> 'You can change this value in the Admin Settings',
										'type'=> 'text',
										'options'=>'',
										'include_class'=>'',
										'include_validation'=>'trim',
										'label'=> 'Tcs tax percentage',
										'sort_order' => 7,
										'is_show' => 1
				);
				
				echo $this->base_model->insert('site_settings', $site_setting_data);
				
				exit;*/
				
				$grand_total = 0;
				$total_qty = 0;
				foreach($data['product']  as $key => $product){
					
					$grand_total += $product['total_price'];
					$total_qty += $product['qty'];
					
				}
				$site_settings = get_site_settings(array('site.cgst','site.sgst','site.lastorder'));
				$cgst_tax_percentage = $site_settings[1]['value'];
				$sgst_tax_percentage = $site_settings[2]['value'];
				$total_tax_percentage = $cgst_tax_percentage + $sgst_tax_percentage;
				
				$total_tax_amount = (($grand_total * $total_tax_percentage)/100);
				$c_tax_amount = (($grand_total * $cgst_tax_percentage)/100);
				$s_tax_amount = (($grand_total * $sgst_tax_percentage)/100);
				$total_with_tax = $grand_total + $total_tax_amount;
				
				
				
				if(isset($data['user_id']) && $data['user_id'] == ''){					
					
					$user_data = array(
									'first_name' => $data['store_name'],
									'last_name'  => $data['last_name'],
									'skype_id'   => $data['gstin'],
									'phone_no'	 => $data['phone_no'],
									'address'	 => $this->input->post('address1'),
									'country'	 => 1,
									'created'	 => date('Y-m-d h:i:s'),
									'modified'	 => date('Y-m-d h:i:s'),
									'is_email_verified' => 1,
                                    'status'    => 1
									);					
					$last_user_id = $this->base_model->insert('users', $user_data);
				}else{
					$last_user_id = $data['user_id'];
				}
				
				
				
				$join_tables = $where = array();		
				$fields = '*'; 
				$getordercnt = $this->base_model->get_advance_list('orders', $join_tables, $fields, $where, 'num_rows','','','id');
				if($getordercnt == 0){
					$last_order_incremented = $last_order_config;
				}else{
					$join_tables = $where = array();		
					$fields = 'order_id'; 
					$last_order_details = $this->base_model->get_advance_list('orders', $join_tables, $fields, $where, 'row_array','id','desc','id',0,1);	
					$last_order_incremented =  (int)$last_order_details['order_id'] + 1;				
				}		
				if($data['created']!= ""){
					$created = date('Y-m-d h:i:s',strtotime($data['created']));
				}else{
					$created = date('Y-m-d h:i:s');
				}
							
							$order_data = array(
								'order_id'		=> $last_order_incremented,	
								'total_qty'		=> $total_qty,
								'user_id'		=> $last_user_id,								
								'store_name'	=> $data['store_name'],
								'customer_name' => $data['last_name'],
								'phone_no'		=> $data['phone_no'],
								'gstin'			=> $data['gstin'],
								'address_line1' => $this->input->post('address1'),
								'delivery_at' => $this->input->post('delivery_at'),								
								'total'			=> $grand_total,
								'total_with_tax'=> $total_with_tax,
								'c_tax_amount'  => $c_tax_amount,
								's_tax_amount'	=> $s_tax_amount,
								'global_hsn_code'=> $data['product'][0]['hsn_code'],
								'c_tax_percentage' => $cgst_tax_percentage,
								's_tax_percentage' => $sgst_tax_percentage,
								'discount'         => 0,
								'handling_charge' => 0,
								'handling_charge_tax'   => 0,
								'handling_charge_stax'   => 0,
								'transport_charge'  => 0,
								'transport_charge_tax'  => 0,
								'transport_charge_stax'  => 0,
								'grand_total'=> $total_with_tax,
								'created'=> $created
								);
							$order_id = $this->base_model->insert( 'orders', $order_data);

							// Adding Order Item
							
							
							foreach($data['product']  as $key => $product){
								
								$total_tax_percentage = $total_tax_amount = $c_tax_amount = $s_tax_amount = $total_with_tax = 0;
								
								$total_tax_percentage = $cgst_tax_percentage + $sgst_tax_percentage;
								$total_tax_amount = (($product['total_price'] * $total_tax_percentage)/100);
								$c_tax_amount = (($product['total_price'] * $cgst_tax_percentage)/100);
								$s_tax_amount = (($product['total_price'] * $sgst_tax_percentage)/100);
								$total_with_tax = $product['total_price'] + $total_tax_amount;
								$product_option = $product['product_addition'];
									
								$order_item = array(
												'order_id'		=> $order_id,
												'product_id'	=> $product['name'],
												'product_name'	=> $product['product_name'],
												'product_options'=>	$product_option,
                                                'hsn_code'      => $product['hsn_code'],
												'qty'			=> $product['qty'],
												'unit_price'	=> $product['unit_price'],
												'total_price'	=> $product['total_price'],
												'total_price_with_tax' => $total_with_tax,
												'c_tax_amount'		=> $c_tax_amount,
												's_tax_amount'		=> $s_tax_amount,
												'c_tax_percentage'	=> $cgst_tax_percentage,
												's_tax_percentage'	=> $sgst_tax_percentage,
												'created'			=> date('Y-m-d h:i:s'),
												'updated'			=> date('Y-m-d h:i:s')
												);
								$order_item_id = $this->base_model->insert( 'order_item', $order_item);				
												
							}
						$this->session->set_flashdata('flash_message', 'Order Created Sucessfully');

						redirect(base_url().SITE_ADMIN_URI.'/orders/view/'.$order_id);	
								
			}
		}
		$data['product_id'] = array(''=>'Select');
		
		$fields = "id,CONCAT(first_name, ' - ', last_name) as firstlast";
		
		//$where = array('is_email_verified' => 1);
		$where = $join_tables =  array();
		$keys = array('id','firstlast');
		$users_list = $this->base_model->getSelectList('users', $where, '',$fields, 'first_name','asc',$keys);
		
		//echo '<pre>';print_r($users_list);exit;
		
		$users_address = array('--Please Select Customer--');
		
		$data['users_address'] = $users_address;
		
		$data['users_list'] = $users_list;
		
		$wherenew = $join_tables =  array(); 
		
		$fields_new = "id,name";
		
		$mykeys = array('id','name');
		
		$products = $this->base_model->getSelectList('product', $wherenew, '', $fields_new,'name','asc',$mykeys);
		
		$site_settings = get_site_settings(array('site.cgst','site.sgst','site.lastorder'));
		$cgst_tax_percentage = $site_settings[1]['value'];
		$sgst_tax_percentage = $site_settings[2]['value'];
		$data['cgst_tax_percentage'] = $cgst_tax_percentage;
		$data['sgst_tax_percentage'] = $sgst_tax_percentage;
		$data['total_tax_percentage'] = $cgst_tax_percentage + $sgst_tax_percentage;		
		
		$data['products'] = $products;
		$data['main_content'] = 'orders/add';
		$data['page_title']  = 'Add Order'; 
		$this->load->view(ADMIN_LAYOUT_PATH, $data); 
		
	}
	
	public function export(){
		$search_name_keyword  =  isset($_POST['search_name'])?trim($_POST['search_name']):(isset($_SESSION['order_search_name'])?$_SESSION['order_search_name']:'');
		$search_from_date_keyword  = isset($_POST['search_from_date'])?trim($_POST['search_from_date']):(isset($_SESSION['order_search_from_date'])?$_SESSION['order_search_from_date']:'');
		$search_to_date_keyword  = isset($_POST['search_to_date'])?trim($_POST['search_to_date']):(isset($_SESSION['order_search_to_date'])?$_SESSION['order_search_to_date']:'');
		$search_email_keyword  = isset($_POST['search_email'])?trim($_POST['search_email']):(isset($_SESSION['order_search_email'])?$_SESSION['order_search_email']:'');
		$search_orderid_keyword  = isset($_POST['search_orderid'])?trim($_POST['search_orderid']):(isset($_SESSION['order_search_orderid'])?$_SESSION['order_search_orderid']:'');
		
		$this->session->set_userdata('order_search_name', $search_name_keyword); 
		$this->session->set_userdata('order_search_from_date', $search_from_date_keyword);
		$this->session->set_userdata('order_search_to_date', $search_to_date_keyword);
		$this->session->set_userdata('order_search_email', $search_email_keyword);
		$this->session->set_userdata('order_search_orderid', $search_orderid_keyword);
		
		$keyword_name_session = $this->session->userdata('order_search_name');
		$keyword_from_date_session = $this->session->userdata('order_search_from_date');
		$keyword_to_date_session = $this->session->userdata('order_search_to_date');
		$keyword_email_session = $this->session->userdata('order_search_email');
		$keyword_orderid_session = $this->session->userdata('order_search_orderid');
		
		
		if($keyword_orderid_session != ''){
			$keyword_orderid = $this->session->userdata('order_search_orderid');
			
		}else{
			isset($_SESSION['order_search_orderid'])?$this->session->unset_userdata('order_search_orderid'):'';
			$keyword_orderid = "";
		}
		
		if($keyword_email_session != ''){
			$keyword_email = $this->session->userdata('order_search_email');
			
		}else{
			isset($_SESSION['order_search_email'])?$this->session->unset_userdata('order_search_email'):'';
			$keyword_email = "";
		}
		
		if($keyword_from_date_session != ''){
			$keyword_from_date = $this->session->userdata('order_search_from_date');
			$keyword_from_date = date('Y-m-d',strtotime($keyword_from_date));
		}else{
			isset($_SESSION['order_search_from_date'])?$this->session->unset_userdata('order_search_from_date'):'';
			$keyword_from_date = "";
		}
		if($keyword_to_date_session != ''){
			$keyword_to_date = $this->session->userdata('order_search_to_date');
			$keyword_to_date = date('Y-m-d',strtotime($keyword_to_date));
		}else{
			isset($_SESSION['order_search_to_date'])?$this->session->unset_userdata('order_search_to_date'):'';
			$keyword_to_date = "";
		}
		
		if($keyword_name_session != ''){
			$keyword_name = $this->session->userdata('order_search_name');
		}else{
			isset($_SESSION['order_search_name'])?$this->session->unset_userdata('order_search_name'):'';
			$keyword_name = "";
		}
		
		$where = $join_tables =  array();  
		
		if($keyword_orderid){
			$where[] = array( FALSE,"(o.order_id LIKE '%$keyword_orderid%')");
			$data['keyword_orderid'] = $keyword_orderid;
		}else{
			$data['keyword_orderid'] = "";
		}
		
		if($keyword_email){
			$where[] = array( TRUE, 'o.phone_no LIKE ', '%'.$keyword_email.'%' );
			$data['keyword_email'] = $keyword_email;
		}else{
			$data['keyword_email'] = "";
		}
		
		if($keyword_name)
		{
			$where[] = array( TRUE, 'o.store_name LIKE ', '%'.$keyword_name.'%' );
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
		
		if($keyword_from_date&&$keyword_to_date){
			$where[] = array( FALSE,"(DATE_FORMAT(o.created,'%Y-%m-%d') >= DATE_FORMAT('".$keyword_from_date."','%Y-%m-%d') AND DATE_FORMAT(o.created,'%Y-%m-%d') <= DATE_FORMAT('".$keyword_to_date."','%Y-%m-%d'))");

			$data['keyword_from_date'] = date('d-m-Y',strtotime($keyword_from_date));
			$data['keyword_to_date'] = date('d-m-Y',strtotime($keyword_to_date));
		}
		$fields = '*';
		
		 
		$orders = $this->base_model->get_advance_list('orders o', $join_tables, $fields, $where, '', 'order_id', 'desc', 'id', 0, 10000);
		
		
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
			'tcs_percent' => "TCS PERCENTAGE",
			'tcs_amount' => 'TCS AMOUNT'
		);
		
		$data = array();
		$i=1;
		foreach($orders as $sales){
			
			$total_sale = $sales['total'] + $sales['handling_charge'] + $sales['transport_charge'];
			$total_percentage = $sales['c_tax_percentage'] + $sales['s_tax_percentage'];
			
			$data[] = array(
						'id'     		=> $i,
						'seller_gst'  	=> $sales['gstin'],
						'seller_name'	=> $sales['store_name'],
						'invoice_no'	=> $sales['order_id'],
						'invoice_date'	=> date('d-m-Y',strtotime($sales['created'])),
						'commodity_code'=> '2041',
						'hsn_code'		=> $sales['global_hsn_code'],
						'tonage'		=> $sales['total_qty'],
						'sales_value'	=> $total_sale,
						'rate_of_tax'   => $total_percentage.'%', 
						'sgst' 			=> (($total_sale * $sales['s_tax_percentage'])/100),
						'cgst' 			=> (($total_sale * $sales['c_tax_percentage'])/100),
						'total_value'	=>  round($sales['grand_total']),
						'tcs_percent'	=>  $sales['tcs_percent'],
						'tcs_amount'	=>  $sales['tcs_amount']
						);
						$i++;
		}
		
		$result = array_merge($colnames,$data);	
		
		$filename = "SALE_data_" . date('YmdHis') . ".csv";
		
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
	
	function process_order(){
		$data = $this->input->post();
		
		$data['product_type'];
		$data['product_id'];
		
		
		//amt:price_val,cc:'USD',item_name:product_name,item_number:product_id,st:'Completed',tx:'ADMIN ADDED',cm:cm,is_admin:1
		
	/*	<pre>Array
(
    [user_id] => 1
    [product_type] => 2
    [product_id] => 11
    [price] => 100
    [time_slot] => 18
    [order_status] => 1
)
</pre>
*/
		pr($data);
	}
	
	function getproductByType(){
		
		$post = $this->input->post();
		$type_id = $post['type_id'];
		$userid = $post['userid'];
		
		
		if($type_id){
			
			$type_details = $this->base_model->getRow('product_type','*','id = "'.$type_id.'"');
		
			$select_product_id  = '';
		
		if($type_details->slug == 'live-mock-exam'){
			
			
			$where = $join_tables =  array(); 
			
			$where[] = array(TRUE,'o.user_id',$userid);
			$where[] = array(TRUE,'o.product_type',$type_id);
			$fields = 'o.id,o.timeslot_id,o.prod_attr_city,o.prod_attr_location,o.prod_attr_location_date';
			$order_purchased = $this->base_model->get_advance_list('orders o', $join_tables, $fields, $where, '', 'id', 'asc', 'id');
		
			$live_purchased_ids = [];
			if($order_purchased){
				foreach($order_purchased as $purchased){
					$city_id =  $purchased['prod_attr_city'];
					$location =  $purchased['prod_attr_location'];
					$venue_date =  $purchased['prod_attr_location_date'];
					
					$cond[] = array(TRUE, 'city_id', $city_id); 
					$cond[] = array(TRUE, 'location', $location ); 
					$cond[] = array(TRUE, 'date_time', $venue_date ); 
					$live_purchased = $this->base_model->get_records('product_mock_exam','*', $cond, 'result_array','id','asc');
					foreach($live_purchased as $purchased_mock_ids){
						$live_purchased_ids[] = $purchased_mock_ids['id'];
					}
					
				}
			}
			
			//pr($live_purchased_ids);
						
			$now = date('Y-m-d h:i:s');
			$where = $join_tables =  array(); 
			//$where[] = array(TRUE,'pme.product_id',$type_details->id);
			$where[] = array(TRUE,'pme.date_time >=',$now);
			if(count($live_purchased_ids) > 0){
				
				$this->db->where_not_in('pme.product_id', $live_purchased_ids);
			}
				
			$fields = 'pme.product_id,pme.country_id,pme.id,c.name as city_name,pme.location,pme.date_time,cty.name as country_name';
			$join_tables[] = array('cities c','c.id = pme.city_id','inner');
			$join_tables[] = array('countries cty','cty.id = pme.country_id','inner');
			
			$products = $this->base_model->get_advance_list('product_mock_exam pme', $join_tables, $fields, $where, '', 'id', 'asc', 'id');
			//echo $this->db->last_query();
			//pr($products);	
			
			$select_product_id .= '<select name="product_id" id="product_id" class="form-control">';
			$select_product_id .= '<option value="" selected="selected">Select</option>';

			foreach($products as $product_items){
				$id = $product_items['product_id'];
				$name = $product_items['country_name'].' - '.$product_items['city_name'].' - '.$product_items['location'].' - '.date('Y-m-d',strtotime($product_items['date_time']));
				$select_product_id .= '<option data-date="'.$product_items['date_time'].'" data-livemockid="'.$product_items['id'].'" value="'.$id.'">'.$name.'</option>';
			}
			$select_product_id .= '</select>';
			$select_product_id .= '<input id="product_type_slug" type="hidden" name="type_slug" value="'.$type_details->slug.'">';
		}else{
			
		$where = $join_tables =  array(); 
		$where[] = array(TRUE,'p.status',1);
		$where[] = array(TRUE,'pt.id',$type_id);
		$fields = 'p.id,p.name,pa.content_one as title,pt.name as type_name,pt.slug as type_slug,pa.product_included,pa.included_valid_days';
		$join_tables[] = array('product_type pt','pt.id = p.product_type_id','inner');
		$join_tables[] = array('product_attributes pa','pa.product_id = p.id','left');
		$products = $this->base_model->get_advance_list('product p', $join_tables, $fields, $where, '', 'id', 'asc', 'id');
		
		//pr($products);
		$select_product_id .= '<select name="product_id" id="product_id" class="form-control">';
		$select_product_id .= '<option value="" selected="selected">Select</option>';

		foreach($products as $product_items){
			$id = $product_items['id'];
			$name = $product_items['name'];
			$select_product_id .= '<option value="'.$id.'">'.$name.'</option>';
		}
		$select_product_id .= '</select>';
		
		$select_product_id .= '<input id="product_type_slug" type="hidden" name="type_slug" value="'.$products[0]['type_slug'].'">';
			
		}
		
		}else{
			$select_product_id = '';
			$select_product_id .= '<select name="product_id" id="product_id" class="form-control">';
			$select_product_id .= '<option value="" selected="selected">Select</option>';
			$select_product_id .= '</select>';
		}
		
		
		
		echo $select_product_id;
		
	}
        
        public function words($number){
            $no = floor($number);
   $point = round($number - $no, 2) * 100;
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'one', '2' => 'two',
    '3' => 'three', '4' => 'four', '5' => 'five', '6' => 'six',
    '7' => 'seven', '8' => 'eight', '9' => 'nine',
    '10' => 'ten', '11' => 'eleven', '12' => 'twelve',
    '13' => 'thirteen', '14' => 'fourteen',
    '15' => 'fifteen', '16' => 'sixteen', '17' => 'seventeen',
    '18' => 'eighteen', '19' =>'nineteen', '20' => 'twenty',
    '30' => 'thirty', '40' => 'forty', '50' => 'fifty',
    '60' => 'sixty', '70' => 'seventy',
    '80' => 'eighty', '90' => 'ninety');
   $digits = array('', 'hundred', 'thousand', 'lakh', 'crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);
  $points = ($point) ?
    "." . $words[$point / 10] . " " . 
          $words[$point = $point % 10] : '';
  if($points){
       return $result . "Rupees  " . $points . " Paise";
  }else{
       return $result . "Rupees  " . $points;
  }
 
        }
	public function reset()
	{
		$this->session->unset_userdata('order_search_name');
		$this->session->unset_userdata('order_search_from_date');
		$this->session->unset_userdata('order_search_to_date');
		$this->session->unset_userdata('order_search_email');
		$this->session->unset_userdata('order_search_orderid');
		redirect(base_url().SITE_ADMIN_URI.'/orders/');
	}
        
        public function printpdf($id){
         $data['css'] = $data['js'] = array();

        $data['css'][]='assets/themes/css/select2.min.css';
        $data['css'][]='assets/themes/css/jquery-ui.min.css';

        $data['js'][]='assets/themes/js/select2.full.min.js';
        $data['js'][]='assets/themes/js/jquery-ui.min.js';
        
        if($id){

            $join_tables = $where = array();
            $where1[] = array( TRUE, 'id', $id);
            $fields = '*';
            $order_details = $this->base_model->get_advance_list('orders', $join_tables, $fields, $where1, 'row_array');
            $data['edit_order'] = $order_details;
           // echo $order_details['grand_total'];exit;
            $invoice_amount_words = $this->words(round($order_details['grand_total']));
             $data['grand_total_words'] = $invoice_amount_words;  
            $join_tables3 = $where = array();
            $where3[] = array( TRUE, 'order_id', $id);
            $fields3 = '*';
            $orderitem_details = $this->base_model->get_advance_list('order_item', $join_tables3, $fields3, $where3, 'result_array');
            $data['edit_orderitems'] = $orderitem_details;         

        }
        $site_settings = get_site_settings(array('site.cgst','site.sgst','site.phone','site.phone_sec','site.terms','site.bank_details',
            'site.gstin','site.address'));
        $data['billing_name_store'] = $order_details['store_name'] .' - '. $order_details['customer_name'];
        $data['cus_address'] = $order_details['address_line1'];
        $data['vehicle_no'] = $order_details['address_line2'];
        $data['way_bill'] = $order_details['address_line3'];
        $data['cus_phone_no'] = $order_details['phone_no'];
        $data['customer_gstin'] = $order_details['gstin'];
        $address = $site_settings[0]['value'];        
        $gstin = $site_settings[4]['value'];
        $phone_sec = $site_settings[5]['value'];
        $bank_details = $site_settings[6]['value'];
        $terms= $site_settings[7]['value'];
        $phone = $site_settings[1]['value'];
        $data['delivery_at'] = $order_details['delivery_at'];
        $data['cgst_tax_percentage'] = $order_details['c_tax_percentage'];
        $data['sgst_tax_percentage'] = $order_details['s_tax_percentage'];
        $data['phone'] = $phone;
        $data['phone_sec'] = $phone_sec;
        $data['terms'] = $terms ; 
        $data['bank_details'] = $bank_details;
        $data['gstin'] = $gstin;
        $data['address'] = $address;                
        $data['total_tax_percentage'] = $order_details['c_tax_percentage'] + $order_details['s_tax_percentage'];
        $data['main_content'] = 'orders/print';
        $data['page_title']  = '';
        $this->load->view(ADMIN_LAYOUT_PATH, $data); 
        
        }
	public function view($id = NULL){

        $data['css'] = $data['js'] = array();

        $data['css'][]='assets/themes/css/select2.min.css';
        $data['css'][]='assets/themes/css/jquery-ui.min.css';

        $data['js'][]='assets/themes/js/select2.full.min.js';
        $data['js'][]='assets/themes/js/jquery-ui.min.js';

        $data['product_id'] = array(''=>'Select');

        $fields = "id,CONCAT(first_name, ' - ', last_name) as firstlast";

        //$where = array('is_email_verified' => 1);
        $where = $join_tables =  array();
        $keys = array('id','firstlast');
        $users_list = $this->base_model->getSelectList('users', $where, '',$fields, 'first_name','asc',$keys);
		
		$site_settings = get_site_settings(array('site.cgst','site.sgst','site.lastorder'));
		$cgst_tax_percentage = $site_settings[1]['value'];
		$sgst_tax_percentage = $site_settings[2]['value'];
		$data['cgst_tax_percentage'] = $cgst_tax_percentage;
		$data['sgst_tax_percentage'] = $sgst_tax_percentage;
		$data['total_tax_percentage'] = $cgst_tax_percentage + $sgst_tax_percentage;
        if($id){

            $join_tables = $where = array();
            $where1[] = array( TRUE, 'id', $id);
            $fields = '*';
            $order_details = $this->base_model->get_advance_list('orders', $join_tables, $fields, $where1, 'row_array');
            $data['edit_order'] = $order_details;

            $join_tables3 = $where = array();
            $where3[] = array( TRUE, 'order_id', $id);
            $fields3 = '*';
            $orderitem_details = $this->base_model->get_advance_list('order_item', $join_tables3, $fields3, $where3, 'result_array');
            $data['edit_orderitems'] = $orderitem_details;         

        }

        

        $users_address = array();		

        $data['users_address'] = $users_address;

        $data['users_list'] = $users_list;

        $wherenew = $join_tables =  array();

        $fields_new = "id,name";

        $mykeys = array('id','name');

        $products = $this->base_model->getSelectList('product', $wherenew, '', $fields_new,'name','asc',$mykeys);


        $data['products'] = $products;
        $data['main_content'] = 'orders/view';
        $data['page_title']  = 'view Order';
        $this->load->view(ADMIN_LAYOUT_PATH, $data); 	
		}

		public function update_order_status(){

			$id = $this->input->post('id');
			$status = $this->input->post('status');

		}
	public function misc_orders($page_num = 1)
	{  
		$data['css'] = $data['js'] = array();
		$data['css'][]='assets/themes/css/jquery.datetimepicker.css';
		$data['js'][]='assets/themes/js/jquery.datetimepicker.full.js';
		
		
		$search_from_date_keyword  = isset($_POST['search_from_date'])?trim($_POST['search_from_date']):(isset($_SESSION['order_search_from_date'])?$_SESSION['misc_order_search_from_date']:'');
		$search_to_date_keyword  = isset($_POST['search_to_date'])?trim($_POST['search_to_date']):(isset($_SESSION['order_search_to_date'])?$_SESSION['misc_order_search_to_date']:'');
		$search_email_keyword  = isset($_POST['search_email'])?trim($_POST['search_email']):(isset($_SESSION['order_search_email'])?$_SESSION['misc_order_search_email']:'');
		
		
		$this->session->set_userdata('misc_order_search_from_date', $search_from_date_keyword);
		$this->session->set_userdata('misc_order_search_to_date', $search_to_date_keyword);
		$this->session->set_userdata('misc_order_search_email', $search_email_keyword);
	
		

		$keyword_from_date_session = $this->session->userdata('misc_order_search_from_date');
		$keyword_to_date_session = $this->session->userdata('misc_order_search_to_date');
		$keyword_email_session = $this->session->userdata('misc_order_search_email');
			
		if($keyword_email_session != ''){
			$keyword_email = $this->session->userdata('misc_order_search_email');
			
		}else{
			isset($_SESSION['order_search_email'])?$this->session->unset_userdata('misc_order_search_email'):'';
			$keyword_email = "";
		}
		
		if($keyword_from_date_session != ''){
			$keyword_from_date = $this->session->userdata('misc_order_search_from_date');
			$keyword_from_date = date('Y-m-d',strtotime($keyword_from_date));
		}else{
			isset($_SESSION['misc_order_search_from_date'])?$this->session->unset_userdata('misc_order_search_from_date'):'';
			$keyword_from_date = "";
		}
		if($keyword_to_date_session != ''){
			$keyword_to_date = $this->session->userdata('misc_order_search_to_date');
			$keyword_to_date = date('Y-m-d',strtotime($keyword_to_date));
		}else{
			isset($_SESSION['misc_order_search_to_date'])?$this->session->unset_userdata('misc_order_search_to_date'):'';
			$keyword_to_date = "";
		}
		
		
		$this->load->helper('thumb_helper');
		$this->load->helper('html');
		$this->load->library('pagination');
		$config  = $this->config->item('back_pagination');
		
		$config["base_url"] = base_url().SITE_ADMIN_URI."/orders/misc_orders";
		$data["per_page"] = $config["per_page"] = $this->config->item('admin_page_per_limit'); 
		$config["uri_segment"] = 4;
		$data['limit_end'] = $limit_end = ($page_num - 1) * $config['per_page'];  
		$limit_start = $config['per_page'];
		$where = $join_tables =  array();  
		
		
		if($keyword_email){
			$where[] = array( TRUE, 'o.email_id LIKE ', '%'.$keyword_email.'%' );
			$data['keyword_email'] = $keyword_email;
		}else{
			$data['keyword_email'] = "";
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
		$fields = 'id,name,email_id,phone_number,amount,status,created';
		$data['total_rows'] = $config['total_rows'] = $this->base_model->get_advance_list('order_offline o', $join_tables, $fields, $where, 'num_rows','','','id');
		
		$data['order_offline'] = $this->base_model->get_advance_list('order_offline o', $join_tables, $fields, $where, '', 'id', 'desc', 'id', $limit_start, $limit_end);
		
		$this->pagination->initialize($config);
		$data['main_content'] = 'orders/misc_orders';
		$data['page_title']  = 'My Orders'; 
		$this->load->view(ADMIN_LAYOUT_PATH, $data); 	

	}
	public function reset_misc_orders()
	{
		$this->session->unset_userdata('misc_order_search_from_date');
		$this->session->unset_userdata('misc_search_to_date');
		$this->session->unset_userdata('misc_search_email');

		redirect(base_url().SITE_ADMIN_URI.'/orders/misc_orders');
	}
	public function view_misc_order($id = NULL){
			$fields = 'id,name,email_id,phone_number,comments,amount,status,created';
			$data['misc_order_detail'] = $order_detail = $this->base_model->getRow('order_offline',$fields,array('id'=>$id),array('return'=>'row_array'));
			
			$data['main_content'] = 'orders/view_misc_order';
		  	$data['page_title']  = 'View Miscellaneous Order';  
			$this->load->view(ADMIN_LAYOUT_PATH, $data); 	
		}
}

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends Public_Controller
{
	  	function __construct(){
    		parent::__construct();
			
			$this->load->library(array('form_validation','email_template'));
			$this->load->language(array('flash_message','form_validation'), 'english');
			$this->load->model('base_model'); 
			$this->load->helper('frontend_helper');
			$this->load->helper('profile_helper');
				
		}

		public function webinar($id){
			
			$where = array();
			$join_tables = array();
			$join_tables = [];
			$join_tables[] = array('product_type pt','pt.id = p.product_type_id','left');
			$where[] = array(TRUE,'p.id',$id);
			
			$fields = 'p.*,pt.slug as product_type_slug';
			$prod_detail = $product= $this->base_model->get_advance_list('product p',$join_tables,$fields,$where, 'row_array');

			if(empty($prod_detail)){
				redirect('404page');
			}
			
			$user_data['user_id'] = 0;
			if($prod_detail['product_type_slug'] == 'webinar-group'){
				$prod_detail['content_one'] = 'Webinar Group';
				$data['product'] = $product = $prod_detail;
			}else{
				$where = array();
				$join_tables = array();
				$where[] = array(TRUE,'p.id',$id);
				$join_tables[] = array('product_webinar pw','pw.product_id = p.id','inner');
				$fields = 'p.id,p.price,p.special_price,pw.title as content_one';
				$data['product'] = $product= $this->base_model->get_advance_list('product p',$join_tables,$fields,$where, 'row_array');
			}
			
			
			$data['user_details'] = $user_data;
			
			
			if($this->session->userdata('webinarfree') == 1){
			
			
			$join_tables = [];
			$join_tables[] = array('product_type pt','pt.id = p.product_type_id','left');
			$join_tables[] = array('product_attributes pa','pa.product_id = p.id','left');
			$where = [];
			$where[] = array(TRUE,'p.id',$id);
			$fields = 'p.*,pt.slug as product_type_slug,pt.name as type_name,pa.product_included,pa.included_valid_days';
			$product_detail = $this->base_model->get_advance_list('product p', $join_tables, $fields, $where, 'row_array','','','p.id');
			

			
 
			$product_type_id = $product_detail['product_type_id'];
			$product_type_slug = $product_detail['product_type_slug'];
			$product_name = $product_detail['name'];
			$product_type_name = $product_detail['type_name'];
			$product_slug = $product_detail['slug'];
			$expiry_date_time 	= '';
			$valid_days 		= '';
			$attr_country 		= '';
			$attr_city 			= '';
			$attr_location 		= '';
			$attr_date_time 	= '';
			$is_webinar = 0;
			
			
			$join_tables = [];
			$where = [];
			$fields = 'id';
			
			 $fields = 'orders.id';
			$total_cnt = $this->base_model->get_advance_list('orders', $join_tables, $fields, $where, 'num_rows','','','orders.id');
			 			$order_id = sprintf("%06d", $total_cnt+1);
			
			if($product_type_slug !='webinar' && $product_type_slug !='webinar-group'){ // this is because passing customer vaiable
			
				if($mock_id != 'NIL'){
					//Product Mock Detail
					$prod_mock_detail = $this->base_model->getRow('product_mock_exam','country_id,city_id,location,date_time','id = "'.$mock_id.'"');
					$attr_country 		= $prod_mock_detail->country_id;
					$attr_city 			= $prod_mock_detail->city_id;
					$attr_location 		= $prod_mock_detail->location;
					$attr_date_time 	= $prod_mock_detail->date_time;
				}


				if($timeslot_id != 'NIL'){
					//Timeslot Detail
					$timeslot_detail = $this->base_model->getRow('admin_availability_time_slot ats','date_time','id = "'.$timeslot_id.'"');
					$attr_date_time 	= $timeslot_detail->date_time;
				}else if($ts_date_time != 'NIL'){
					$attr_date_time 	= date('Y-m-d H:i:s',$ts_date_time);
				}
			}
			if($product_type_slug == 'webinar'){
				$webinar_detail = $this->base_model->getRow('product_webinar','date_time,id,product_id,title','product_id = "'.$id.'"');
				$is_webinar = 1;
				$attr_date_time = $webinar_detail->date_time;
			}

			if($product_type_slug == 'webinar-group'){
				$is_webinar = 1;
			}

			$transcation_status = 1;
			//$user_data = get_loggedin_user();
			 
			$user_id = $user_data['user_id'];
			
			if($user_id > 0){
			
				$join_tables = [];
				$where = [];
				$where[] = array(TRUE,'id',$user_id);
				$fields = '*';
				$customer_data = $this->base_model->get_advance_list('users', $join_tables, $fields, $where, 'row_array','','','id');
				$address = $customer_data['address'];
				$country = $customer_data['country'];
				$city = $customer_data['city'];
				$skype_id = $customer_data['skype_id'];
				$phone_no = $customer_data['phone_no'];
				$first_name = $customer_data['first_name'];
				$last_name = $customer_data['last_name'];
				$email_id = $customer_data['email_id'];
			}else if($user_id == 0){
			
		
				 
		$custom_arr[1] = $this->session->userdata("webinar_name");
		$custom_arr[2] = $this->session->userdata("webinar_email");
		$custom_arr[3] = $this->session->userdata("webinar_skype");
		if($custom_arr[1] == 'NIL'){
				$timeslot_id = 0;
			}else{
				$timeslot_id = $custom_arr[1];
			}
			
				$webinar_details = $this->base_model->getRow('users_webinar uw','uw.*',array('email' => $custom_arr[2] ),array('return'=>'row_array'));
 
				
				$join_tables = [];
				$where = [];
				$where[] = array(TRUE,'email_id',$custom_arr[2]);
				$fields = '*';
				$customer_data = $this->base_model->get_advance_list('users', $join_tables, $fields, $where, 'row_array','','','id');
				
				
				

				if(!empty($webinar_details)){
					$customer_id = $webinar_details['id'];
				}else{
					$webinar_data = array('name'=>$custom_arr[1],'email'=>$custom_arr[2],'skype_id'=>$custom_arr[3],'created'=>date('Y-m-d h:i:s'));
					$webinar_id = $this->base_model->insert( 'users_webinar', $webinar_data);
					$customer_id = $webinar_id;	
				}
				if($customer_data){
					$address = $customer_data['address'];
					$country = $customer_data['country'];
					$city = $customer_data['city'];
					$skype_id = $custom_arr[3];
					$phone_no = $customer_data['phone_no'];
					$first_name = $custom_arr[1];
					$last_name = $customer_data['last_name'];
					$email_id = $custom_arr[2];
				}else{
					$address = '';
					$country = '';
					$city = '';
					$skype_id = $custom_arr[3];
					$phone_no = '';
					$first_name = $custom_arr[1];
					$last_name = '';
					$email_id = $custom_arr[2];
				}
				
			}
			
			
			$order_data = array(
							'user_first_name'=>$first_name,
							'user_last_name'=>$last_name,
							'user_email'=>$email_id,
							'product_name' => $product_type_name.' - '.$product_name,
							'product_slug' => $product_slug,
							'user_address'=>$address,
							'user_country'=>$country,
							'user_city'=>$city,
							'user_skype'=>$skype_id,
							'user_phone'=>$phone_no,
							'order_id'=>$order_id,
							'user_id'=>$customer_id,
							'amount'=>0,
							'products'=>$id,
							'product_type'=>$product_type_id,
							'expiry_date'=>$expiry_date_time,
							'valid_days'=>$valid_days,
							'timeslot_id' => $timeslot_id,
							'prod_attr_country' => $attr_country,
							'prod_attr_city' => $attr_city,
							'prod_attr_location' => $attr_location,
							'prod_attr_location_date' => $attr_date_time,
							'status'=>$transcation_status,
							'transcation_id'=>'N/A',
							'is_webinar' => $is_webinar,
							'created'=> date('Y-m-d h:i:s'),
							);
							
							
			
			$this->base_model->insert('orders', $order_data);
			$order_data['transcation_status_text'] = 'Completed';
			$time_slot_details = array();
			
			if($product_type_slug == 'combo-plan' || $product_type_slug == 'combo-package' || $product_type_slug == 'complete-comprehensive-course' || $product_type_slug == 'rapid-review-course' || $product_type_slug == 'webinar-group' ){
				$included_product = explode(",",$product_detail['product_included']);
				
				foreach($included_product as $included){
					
					$join_tables = [];
					$where = [];
					if($product_type_slug == 'webinar-group'){
						$fields = 'p.slug,p.id,pw.title as product_title';
						$join_tables[] = array('product_webinar pw','pw.product_id = p.id','inner');
					}else{
						$fields = 'pt.slug as type_slug,p.slug,p.id,pa.content_one as product_title,p.name as steps_name';
						$join_tables[] = array('product_attributes pa','pa.product_id = p.id','inner');	
						$join_tables[] = array('product_type pt','pt.id = p.product_type_id','inner');	
					}
					
					$where[] = array(TRUE,'p.id',$included);
					
					$include_product_detail = $this->base_model->get_advance_list('product p', $join_tables, $fields, $where, 'row_array','','','p.id');
					  
					if($product_type_slug == 'webinar-group'){
						$webinar_detail = $this->base_model->getRow('product_webinar','date_time,id,product_id,title','product_id = "'.$included.'"');
						$attr_date_time = $webinar_detail->date_time;
					}
					
					if($product_type_slug == 'combo-package' || $product_type_slug == 'combo-plan'){
						
						$current_date = date('Y-m-d h:i:s');
						$attr_date_time = date('Y-m-d h:i:s',strtotime('+'.$valid_days.' days',strtotime($current_date)));
						
					}

					switch($include_product_detail['slug']){
						case 'assesement-preparation':
							$this->send_timeslot_request_nodate($customer_id,$include_product_detail['id'],$product_detail['name'],$order_id);
						break;
						case 'patient-note-correction':
							$this->send_timeslot_request_nodate($customer_id,$include_product_detail['id'],$product_detail['name'],$order_id);
						break;
						case 'online-mock-exam':
							$this->send_timeslot_request_nodate($customer_id,$include_product_detail['id'],$product_detail['name'],$order_id);
						break;
					}
					if($include_product_detail['type_slug'] == 'online-video-tutorials'){
						$product_name = strip_tags($include_product_detail['product_title']).' - '.$include_product_detail['steps_name'];
					}else{
						$product_name = strip_tags($include_product_detail['product_title']);
					}
					$order_item = array(
								'order_id'=>$order_id,
								'product_id'=>$included,
								'product_type'=>$product_type_id,
								'product_slug' => $include_product_detail['slug'],
								'valid_days'=>$valid_days,
								'attr_title' => $product_name,
								'attr_country' => $attr_country,
								'attr_city' => $attr_city,
								'attr_location' => $attr_location,
								'attr_date_time' => $attr_date_time,
								'created'=> date('Y-m-d h:i:s'),
								);
					$order_item_array[] = $order_item;
					$this->base_model->insert('order_item', $order_item);
				}
				
			}else{
			
			$order_item = array(
							'order_id'=>$order_id,
							'product_id'=>$id,
							'product_type'=>$product_type_id,
							'product_slug' => $product_slug,
							'valid_days'=>$valid_days,
							'attr_title' => $product_name,
							'attr_country' => $attr_country,
							'attr_city' => $attr_city,
							'attr_location' => $attr_location,
							'attr_date_time' => $attr_date_time,
							'created'=> date('Y-m-d h:i:s')
							);
			 $order_item_array[] = $order_item;
			 $this->base_model->insert('order_item', $order_item);
			}
			
			$this->session->set_flashdata('order_id', $order_id);
			
			$rr = json_encode($_REQUEST);
			
			$insert_array = array (	'response' => $rr,
									'ipin'=>0,
									'created'=>date('Y-m-d h:i:s'),
									'modified'=>date('Y-m-d h:i:s')
								);
			
			$this->base_model->insert('transcation', $insert_array);
			
			
			
			if($product_type_slug !='webinar' && $product_type_slug !='webinar-group'){
			
				if($timeslot_id != 'NIL'){
					
					$time_slot_details = $this->update_timeslot($timeslot_id,$customer_id);
				}else if($ts_date_time != 'NIL'){
					//Send Request
					$time_slot_details = $this->send_timeslot_request($customer_id,$product_id,$product_name,$ts_date_time,$order_id);
				}
			}
			if($product_type_slug =='webinar' || $product_type_slug =='webinar-group'){
 
				$customer_id =$user_id;
				if($customer_id == 0){
					$this->session->set_flashdata('guest_webinar', 1);
				}
			}
			
			if($transcation_status == 1){
				//$this->sendOrderMail($order_data,$order_item_array,$time_slot_details);
				$this->session->set_flashdata('flash_message','Order Created Successfully');
				redirect('payment/success');
			}
			
			
		 
		}else{
			
			
						
			$paypal_mode = get_site_settings('paypal.mode','value');
			$paypal_username = get_site_settings('paypal.username','value');
			if($paypal_mode==1){
				$data['paypal_url'] = $this->config->item("paypal_live_url");
			}else{
				$data['paypal_url'] = $this->config->item("paypal_sandbox_url");
			}
			$data['paypal_id']= $paypal_username;
			
			//$data['paypal_id']= 'targetusmle.17@gmail.com';
			//$data['paypal_id']= 'targetusmle.18@gmail.com';
			
			$data['main_content'] = 'payment/purchase';
			$this->load->view(SITE_EMPTY_PATH, $data);
			
			}
			
		}
		
		public function index($id){  
		
			if(!is_loggedin()){
					redirect();	
				}
		
			$user_data = get_loggedin_user();
			$where = array();
			$join_tables = array();
			$where[] = array(TRUE,'p.id',$id);
			$join_tables[] = array('product_attributes pa','pa.product_id = p.id','inner');
			$fields = 'p.id,p.price,p.special_price,pa.content_one';
			$data['product'] = $product= $this->base_model->get_advance_list('product p',$join_tables,$fields,$where, 'row_array');

			if(empty($product)){
				redirect('404page');
			}
			
			$data['user_details'] = $user_data;
			
			$paypal_mode = get_site_settings('paypal.mode','value');
			$paypal_username = get_site_settings('paypal.username','value');
			if($paypal_mode==1){
				$data['paypal_url'] = $this->config->item("paypal_live_url");
			}else{
				$data['paypal_url'] = $this->config->item("paypal_sandbox_url");
			}
			$data['paypal_id']= $paypal_username;
						
			//$data['paypal_id']= 'targetusmle.17@gmail.com';
			//$data['paypal_id']= 'targetusmle.18@gmail.com';
			
			$data['main_content'] = 'payment/purchase';
			$this->load->view(SITE_EMPTY_PATH, $data);
		}

		public function payment_with_timeslot($product_id,$timeslot_id,$ts_date_time){
		
			if(!is_loggedin()){
					redirect();	
				}
		
			$user_data = get_loggedin_user();
			$where = array();
			$join_tables = array();
			$where[] = array(TRUE,'p.id',$product_id);
			$join_tables[] = array('product_attributes pa','pa.product_id = p.id','inner');
			$fields = 'p.id,p.price,pa.content_one';
			$data['product'] = $product= $this->base_model->get_advance_list('product p',$join_tables,$fields,$where, 'row_array');
			if(empty($product)){
				redirect('404page');
			}
			$data['timeslot_id'] = $timeslot_id;
			$data['ts_date_time'] = $ts_date_time;
			
			$data['user_details'] = $user_data;
			$paypal_mode = get_site_settings('paypal.mode','value');
			$paypal_username = get_site_settings('paypal.username','value');
			if($paypal_mode==1){
				$data['paypal_url'] = $this->config->item("paypal_live_url");
			}else{
				$data['paypal_url'] = $this->config->item("paypal_sandbox_url");
			}
			$data['paypal_id']= $paypal_username;
			
			//$data['paypal_id']= 'targetusmle.17@gmail.com';
			//$data['paypal_id']= 'targetusmle.18@gmail.com';
			
			$data['main_content'] = 'payment/purchase';
			$this->load->view(SITE_EMPTY_PATH, $data);
		}

		public function payment_livemock($product_id,$mock_id){
		
			if(!is_loggedin()){
					redirect();	
				}

			$user_data = get_loggedin_user();
			$where = array();
			$join_tables = array();
			$where[] = array(TRUE,'p.id',$product_id);
			$join_tables[] = array('product_mock_exam pme','pme.product_id = p.id','inner');
			$join_tables[] = array('cities ci','pme.city_id = ci.id','inner');
			$fields = 'p.id,p.price,ci.name as content_one';
			$data['product'] = $product= $this->base_model->get_advance_list('product p',$join_tables,$fields,$where, 'row_array');
			$data['mock_id'] = $mock_id;
			
			$data['user_details'] = $user_data;
			$paypal_mode = get_site_settings('paypal.mode','value');
			$paypal_username = get_site_settings('paypal.username','value');
			if($paypal_mode==1){
				$data['paypal_url'] = $this->config->item("paypal_live_url");
			}else{
				$data['paypal_url'] = $this->config->item("paypal_sandbox_url");
			}
			$data['paypal_id']= $paypal_username;
			
			//$data['paypal_id']= 'targetusmle.17@gmail.com';
			//$data['paypal_id']= 'targetusmle.18@gmail.com';
			
			$data['main_content'] = 'payment/purchase';
			
			$this->load->view(SITE_EMPTY_PATH, $data);
		}
		
		public function cancel(){
			
			
			//pr($_REQUEST);
			$price = $_REQUEST['price'];
			$currency = $_REQUEST['currency'];
			$product_name = $_REQUEST['title'];
			$product_id = $_REQUEST['pid'];
			
			
			$custom =$_REQUEST['user_id'];
			$custom_arr = explode('---',$custom);
			
			$customer_id = $custom_arr[0];
			if($custom_arr[1] == 'NIL'){
				$timeslot_id = 0;
			}else{
				$timeslot_id = $custom_arr[1];
			}
			
			$ts_date_time = $custom_arr[2];
			$mock_id = $custom_arr[3];
			
			$transcation_status = 3;
			
			$transcation_status_text = 'Failed';
			$transcation_id = 'NIL';
			$join_tables = [];
			$where = [];
			$fields = 'id';
			$total_cnt = $this->base_model->get_advance_list('orders', $join_tables, $fields, $where, 'num_rows','','','id');
			$order_id = sprintf("%06d", $total_cnt+1);
			
			
			$join_tables = [];
			$join_tables[] = array('product_type pt','pt.id = p.product_type_id','left');
			$join_tables[] = array('product_attributes pa','pa.product_id = p.id','left');
			$where = [];
			$where[] = array(TRUE,'p.id',$product_id);
			$fields = 'p.*,pt.slug as product_type_slug,pt.name as type_name,pa.product_included,pa.included_valid_days';
			$product_detail = $this->base_model->get_advance_list('product p', $join_tables, $fields, $where, 'row_array','','','p.id');
			
			
			$product_type_id = $product_detail['product_type_id'];
			$product_type_slug = $product_detail['product_type_slug'];
			$product_name = $product_detail['name'];
			$product_type_name = $product_detail['type_name'];
			$product_slug = $product_detail['slug'];

			$expiry_date_time 	= '';
			$valid_days 		= '';
			$attr_country 		= '';
			$attr_city 			= '';
			$attr_location 		= '';
			$attr_date_time 	= '';
			$is_webinar = 0;
			
			if($product_type_slug == 'combo-plan' || $product_type_slug == 'combo-package' || $product_type_slug == 'complete-comprehensive-course' || $product_type_slug == 'rapid-review-course'){ //
			
				$valid_days =  $product_detail['included_valid_days'];
				if($product_type_slug != 'combo-plan'){
					$product_slug = $product_type_slug;
				}
				$current_date = date('Y-m-d h:i:s');
				$expiry_date_time = date('Y-m-d h:i:s',strtotime('+'.$valid_days.' days',strtotime($current_date)));
				
			}
			
			if($product_type_slug == 'cs-handbook' || $product_type_slug == 'online-video-tutorials'){
				$valid_days = $product_detail['valid_days'];
				$current_date = date('Y-m-d h:i:s');
				$expiry_date_time = date('Y-m-d h:i:s',strtotime('+'.$valid_days.' days',strtotime($current_date)));
			}
			
			if($product_type_slug !='webinar' && $product_type_slug !='webinar-group'){ // this is because passing customer vaiable
			
				if($mock_id != 'NIL'){
					//Product Mock Detail
					$prod_mock_detail = $this->base_model->getRow('product_mock_exam','country_id,city_id,location,date_time','id = "'.$mock_id.'"');
					$attr_country 		= $prod_mock_detail->country_id;
					$attr_city 			= $prod_mock_detail->city_id;
					$attr_location 		= $prod_mock_detail->location;
					$attr_date_time 	= $prod_mock_detail->date_time;
				}


				if($timeslot_id != 'NIL'){
					//Timeslot Detail
					$timeslot_detail = $this->base_model->getRow('admin_availability_time_slot ats','date_time','id = "'.$timeslot_id.'"');
					$attr_date_time 	= $timeslot_detail->date_time;
				}else if($ts_date_time != 'NIL'){
					$attr_date_time 	= date('Y-m-d H:i:s',$ts_date_time);
				}
			}
			if($product_type_slug == 'webinar'){
				$webinar_detail = $this->base_model->getRow('product_webinar','date_time,id,product_id,title','product_id = "'.$product_id.'"');
				$is_webinar = 1;
				$attr_date_time = $webinar_detail->date_time;
			}

			if($product_type_slug == 'webinar-group'){
				$is_webinar = 1;
			}

			
			
			//$user_data = get_loggedin_user();
			$user_id = $customer_id;
			
			if($user_id > 0){
			
				$join_tables = [];
				$where = [];
				$where[] = array(TRUE,'id',$user_id);
				$fields = '*';
				$customer_data = $this->base_model->get_advance_list('users', $join_tables, $fields, $where, 'row_array','','','id');
				$address = $customer_data['address'];
				$country = $customer_data['country'];
				$city = $customer_data['city'];
				$skype_id = $customer_data['skype_id'];
				$phone_no = $customer_data['phone_no'];
				$first_name = $customer_data['first_name'];
				$last_name = $customer_data['last_name'];
				$email_id = $customer_data['email_id'];
			}else if($user_id == 0){
				$custom = $_REQUEST['user_id'];
				$custom_arr = explode('---',$custom);

				$webinar_details = $this->base_model->getRow('users_webinar uw','uw.*',array('email' => $custom_arr[2],'skype_id'=>$custom_arr[3] ),array('return'=>'row_array'));

				if(!empty($webinar_details)){
					$customer_id = $webinar_details['id'];
				}else{
					$webinar_data = array('name'=>$custom_arr[1],'email'=>$custom_arr[2],'skype_id'=>$custom_arr[3],'created'=>date('Y-m-d h:i:s'));
					$webinar_id = $this->base_model->insert( 'users_webinar', $webinar_data);
					$customer_id = $webinar_id;	
				}
				
				$address = '';
				$country = '';
				$city = '';
				$skype_id = $custom_arr[3];
				$phone_no = '';
				$first_name = $custom_arr[1];
				$last_name = '';
				$email_id = $custom_arr[2];
			}
			if($is_webinar){
				if($this->session->userdata('user_is_logged_in')){
				$session_data = $this->session->userdata('user_is_logged_in');
				$session_data['webinar_user_id'] = $customer_id;
				
				$this->session->set_userdata($session_data); 
				}
			}
			$order_data = array(
							'user_first_name'=>$first_name,
							'user_last_name'=>$last_name,
							'user_email'=>$email_id,
							'product_name' => $product_type_name.' - '.$product_name,
							'product_slug' => $product_slug,
							'user_address'=>$address,
							'user_country'=>$country,
							'user_city'=>$city,
							'user_skype'=>$skype_id,
							'user_phone'=>$phone_no,
							'order_id'=>$order_id,
							'user_id'=>$customer_id,
							'amount'=>$price,
							'products'=>$product_id,
							'product_type'=>$product_type_id,
							'expiry_date'=>$expiry_date_time,
							'valid_days'=>$valid_days,
							'timeslot_id' => $timeslot_id,
							'prod_attr_country' => $attr_country,
							'prod_attr_city' => $attr_city,
							'prod_attr_location' => $attr_location,
							'prod_attr_location_date' => $attr_date_time,
							'status'=>$transcation_status,
							'transcation_id'=>$transcation_id,
							'is_webinar' => $is_webinar,
							'created'=> date('Y-m-d h:i:s'),
							);
							
							
			
			$this->base_model->insert('orders', $order_data);
			
			$order_data['transcation_status_text'] = $transcation_status_text;
			
			if($product_type_slug == 'combo-plan' || $product_type_slug == 'combo-package' || $product_type_slug == 'complete-comprehensive-course' || $product_type_slug == 'rapid-review-course' || $product_type_slug == 'webinar-group' ){
				$included_product = explode(",",$product_detail['product_included']);
				
				foreach($included_product as $included){
					
					$join_tables = [];
					$where = [];
					if($product_type_slug == 'webinar-group'){
						$fields = 'p.slug,p.id,pw.title as product_title,pt.slug as type_slug';
						$join_tables[] = array('product_webinar pw','pw.product_id = p.id','inner');
						$join_tables[] = array('product_type pt','pt.id = p.product_type_id','inner');
					}else{
						$fields = 'pt.slug as type_slug,p.slug,p.id,pa.content_one as product_title,p.name as steps_name';
						$join_tables[] = array('product_attributes pa','pa.product_id = p.id','inner');	
						$join_tables[] = array('product_type pt','pt.id = p.product_type_id','inner');	
					}
					
					$where[] = array(TRUE,'p.id',$included);
					
					$include_product_detail = $this->base_model->get_advance_list('product p', $join_tables, $fields, $where, 'row_array','','','p.id');
					
					
					  
					if($product_type_slug == 'webinar-group' || $product_type_slug == 'webinar'){
						$webinar_detail = $this->base_model->getRow('product_webinar','date_time,id,product_id,title','product_id = "'.$included.'"');
						$attr_date_time = $webinar_detail->date_time;
					}

					switch($include_product_detail['slug']){
						case 'assesement-preparation':
							//$this->send_timeslot_request_nodate($customer_id,$include_product_detail['id'],$product_detail['name'],$order_id);
						break;
						case 'patient-note-correction':
							//$this->send_timeslot_request_nodate($customer_id,$include_product_detail['id'],$product_detail['name'],$order_id);
						break;
						case 'online-mock-exam':
							//$this->send_timeslot_request_nodate($customer_id,$include_product_detail['id'],$product_detail['name'],$order_id);
						break;
					}
					if($include_product_detail['type_slug'] == 'online-video-tutorials'){
						$product_name = strip_tags($include_product_detail['product_title']).' - '.$include_product_detail['steps_name'];
					}else{
						$product_name = strip_tags($include_product_detail['product_title']);
					}
					$order_item = array(
								'order_id'=>$order_id,
								'product_id'=>$included,
								'product_type'=>$product_type_id,
								'product_slug' => $include_product_detail['slug'],
								'valid_days'=>$valid_days,
								'attr_title' => $product_name,
								'attr_country' => $attr_country,
								'attr_city' => $attr_city,
								'attr_location' => $attr_location,
								'attr_date_time' => $attr_date_time,
								'created'=> date('Y-m-d h:i:s'),
								);
					$this->base_model->insert('order_item', $order_item);
				}
				
			}else{
			
			$order_item = array(
							'order_id'=>$order_id,
							'product_id'=>$product_id,
							'product_type'=>$product_type_id,
							'product_slug' => $product_slug,
							'valid_days'=>$valid_days,
							'attr_title' => $product_name,
							'attr_country' => $attr_country,
							'attr_city' => $attr_city,
							'attr_location' => $attr_location,
							'attr_date_time' => $attr_date_time,
							'created'=> date('Y-m-d h:i:s')
							);
			 $this->base_model->insert('order_item', $order_item);
			}
			
			$this->session->set_flashdata('order_id', $order_id);
			
			
			redirect('payment/error');
		}
		
		public function error(){
			$data['main_content'] = 'payment/cancel';
			$this->load->view(SITE_LAYOUT_PATH, $data);
		}
		
		public function process_payment(){
			 
			 
			$this->session->set_flashdata('flash_message','Order Created Successfully');
			redirect('payment/success');
			 
		}
		
		public function sendOrderMail($order_data,$order_item,$time_slot_details){
			
			//echo '<pre>';print_r($order_item);exit;
			//echo '<pre>'; pr($time_slot_details); exit;
			/* email send to user */
			$first_name = $order_data['user_first_name'];
			$product_type = $order_data['product_type'];
			$last_name = $order_data['user_last_name'];
			$full_name = $order_data['user_first_name'].' '.$order_data['user_last_name'];
			$email = $order_data['user_email'];
			$order_id = $order_data['order_id'];
			$product_name = $order_data['product_name'];
			$user_skype = $order_data['user_skype'];
			$user_id = $order_data['user_id'];
			$products = $order_data['products'];
			$amount = $order_data['amount'];
			$amount = number_format((float)$amount, 2, '.', ''); 
			$valid_days = $order_data['valid_days'];
			$expiry_date = date('d/m/y h:i a',strtotime($order_data['expiry_date']));
			$status = $order_data['status'];
			$transcation_status_text = $order_data['transcation_status_text'];
			$transcation_id = $order_data['transcation_id'];
			$created = $order_data['created'];
			$user_address = ($order_data['user_address'])?$order_data['user_address']:'N/A';

			$title = '';
			$date_time = '';

			foreach($order_item as $items){
				$title .= '&nbsp;&nbsp;&nbsp;'.$items['attr_title'].'<br>';
				if(!empty($items['attr_date_time'])){
					$date_time .= '&nbsp;&nbsp;&nbsp;'.date('Y/m/d h:i',strtotime($items['attr_date_time'])).'<br>';	
				}else{
					$date_time .= '&nbsp;&nbsp;&nbsp; - <br>';
				}
				
			}	
			
			
			 $admin_support_email = get_site_settings('site.support_email');
			 $supp_email = $admin_support_email['value'];
			 $admin_phone_no = get_site_settings('site.phone');
			 $supp_phone = $admin_phone_no['value'];
			
			$date_image = base_url('assets/site/images/mail-date.png');
			$order_image = base_url('assets/site/images/mail-order.png');
			$amount_image =base_url('assets/site/images/mail-amount.png');
			
			if($product_type == 12){
			
			$table_heading = '<td width="36%" align="left" bgcolor="#00355d" valign="top" style="font:15px Tahoma;color:#fff;text-align:left;padding:0px 0 0px 10px;text-transform:uppercase"><p>Webinar Name</p></td>							
				<td width="22%" align="left" bgcolor="#00355d" valign="top"  style="font:15px Tahoma;color:#fff;text-align:center;padding:15px 0 12px;text-transform:uppercase;">Webinar Date</td>
				<td width="22%" align="left" bgcolor="#00355d" valign="top"  style="font:15px Tahoma;color:#fff;text-align:center;padding:15px 10px 12px 0;text-transform:uppercase;">Total Price</td>';											
				
				$table_items = '<td width="36%" align="left" bgcolor="#fafafa" valign="top" style="font:15px Tahoma;color:#293137;text-align:left;padding:15px 0 15px 0;"><p><span style="width:30px;float:left;min-height:22px;font:15px Tahoma;color:#fff;text-align:center;padding:2px 0 0;background:#00355d;margin-right:10px;">01</span>'.$product_name.'</p></td>
							<td width="22%" align="left" bgcolor="#fafafa" valign="top" style="font:15px Tahoma;color:#293137;text-align:center;padding:15px 0;"><p>-</p></td>
							<td width="22%" align="left" bgcolor="#fafafa" valign="top" style="font:15px Tahoma;color:#293137;text-align:center;padding:15px 10px 15px 0;"><p>$'.$amount.'</p></td>';
							
				$table_items .= '</tr>';
				$i=1;
				$ordered_itemss = count($order_item);
				foreach($order_item as $items){
					
				$table_items .='<tr><td width="36%" align="left" bgcolor="#f5f5f5" valign="top" style="font:15px Tahoma;color:#293137;text-align:left;"><p style="padding-left:15px;">'.$items['attr_title'].'</p></td>
							<td width="22%" align="left" bgcolor="#f5f5f5" valign="top" style="font:15px Tahoma;color:#293137;text-align:center;"><p>'.date('d/m/y h:i a',strtotime($items['attr_date_time'])).'</p></td>
							
							<td width="22%" align="left" bgcolor="#f5f5f5" valign="top" style="font:15px Tahoma;color:#293137;text-align:center;padding:0 0 15px 0;"><p>-</p></td>';
					if($i != $ordered_itemss){		
						$table_items .= '</tr>';
					}
				$i++;		
				}	
			}else if($product_type == 4){
				// individual webinar
				$table_heading = '<td width="36%" align="left" bgcolor="#00355d" valign="top" style="font:15px Tahoma;color:#fff;text-align:left;padding:0px 0 0px 10px;text-transform:uppercase"><p>Webinar Name</p></td>							
				<td width="22%" align="left" bgcolor="#00355d" valign="top"  style="font:15px Tahoma;color:#fff;text-align:center;padding:15px 0 12px;text-transform:uppercase;">Webinar Date</td>
				<td width="22%" align="left" bgcolor="#00355d" valign="top"  style="font:15px Tahoma;color:#fff;text-align:center;padding:15px 10px 12px 0;text-transform:uppercase;">Total Price</td>';
				
				
				$table_items = '<td width="36%" align="left" bgcolor="#fafafa" valign="top" style="font:15px Tahoma;color:#293137;text-align:left;padding:15px 0 15px 0;"><p><span style="width:30px;float:left;min-height:22px;font:15px Tahoma;color:#fff;text-align:center;padding:2px 0 0;background:#00355d;margin-right:10px;">01</span>'.$order_item[0]['attr_title'].'</p></td>
							<td width="22%" align="left" bgcolor="#fafafa" valign="top" style="font:15px Tahoma;color:#293137;text-align:center;padding:15px 0;"><p>'.date('d/m/y h:i a',strtotime($items['attr_date_time'])).'</p></td>
							<td width="22%" align="left" bgcolor="#fafafa" valign="top" style="font:15px Tahoma;color:#293137;text-align:center;padding:15px 10px 15px 0;"><p>$'.$amount.'</p></td>';
				
			}else if($product_type == 8){
				// Combo package
				$table_heading = '<td width="36%" align="left" bgcolor="#00355d" valign="top" style="font:15px Tahoma;color:#fff;text-align:left;padding:0px 0 0px 10px;text-transform:uppercase"><p>Package Name</p></td>							
				<td width="22%" align="left" bgcolor="#00355d" valign="top"  style="font:15px Tahoma;color:#fff;text-align:center;padding:15px 0 12px;text-transform:uppercase;">Valid Date</td>
				<td width="22%" align="left" bgcolor="#00355d" valign="top"  style="font:15px Tahoma;color:#fff;text-align:center;padding:15px 10px 12px 0;text-transform:uppercase;">Total Price</td>';
				
				$table_items = '<td width="36%" align="left" bgcolor="#fafafa" valign="top" style="font:15px Tahoma;color:#293137;text-align:left;padding:15px 0 15px 0;"><p><span style="width:30px;float:left;min-height:22px;font:15px Tahoma;color:#fff;text-align:center;padding:2px 0 0;background:#00355d;margin-right:10px;">01</span>'.$product_name.'<br><br>Cources Included:</p></td>
							<td width="22%" align="left" bgcolor="#fafafa" valign="top" style="font:15px Tahoma;color:#293137;text-align:center;padding:15px 0;"><p>-</p></td>
							<td width="22%" align="left" bgcolor="#fafafa" valign="top" style="font:15px Tahoma;color:#293137;text-align:center;padding:15px 10px 15px 0;"><p>$'.$amount.'</p></td>';
				$table_items .= '</tr>';
				$i=1;
				$ordered_itemss = count($order_item);
				foreach($order_item as $items){
					
					$table_items .='<tr><td width="36%" align="left" bgcolor="#f5f5f5" valign="top" style="font:15px Tahoma;color:#293137;text-align:left;"><p style="padding-left:15px;">'.$items['attr_title'].'</p></td>
							<td width="22%" align="left" bgcolor="#f5f5f5" valign="top" style="font:15px Tahoma;color:#293137;text-align:center;"><p>'.date('d/m/y h:i a',strtotime($items['attr_date_time'])).'</p></td>
							
							<td width="22%" align="left" bgcolor="#f5f5f5" valign="top" style="font:15px Tahoma;color:#293137;text-align:center;padding:0 0 15px 0;"><p>-</p></td>';
					if($i != $ordered_itemss){		
						$table_items .= '</tr>';
					}
					
					$i++;		
				}	
				
			}else if($product_type == 7){
				//combo plan
				$table_heading = '<td width="36%" align="left" bgcolor="#00355d" valign="top" style="font:15px Tahoma;color:#fff;text-align:left;padding:0px 0 0px 10px;text-transform:uppercase"><p>Plan Name</p></td>							
				<td width="22%" align="left" bgcolor="#00355d" valign="top"  style="font:15px Tahoma;color:#fff;text-align:center;padding:15px 0 12px;text-transform:uppercase;">Valid Date</td>
				<td width="22%" align="left" bgcolor="#00355d" valign="top"  style="font:15px Tahoma;color:#fff;text-align:center;padding:15px 10px 12px 0;text-transform:uppercase;">Total Price</td>';
				
				$table_items = '<td width="36%" align="left" bgcolor="#fafafa" valign="top" style="font:15px Tahoma;color:#293137;text-align:left;padding:15px 0 15px 0;"><p><span style="width:30px;float:left;min-height:22px;font:15px Tahoma;color:#fff;text-align:center;padding:2px 0 0;background:#00355d;margin-right:10px;">01</span>'.$product_name.'<br><br>Cources Included:</p></td>
							<td width="22%" align="left" bgcolor="#fafafa" valign="top" style="font:15px Tahoma;color:#293137;text-align:center;padding:15px 0;"><p>-</p></td>
							<td width="22%" align="left" bgcolor="#fafafa" valign="top" style="font:15px Tahoma;color:#293137;text-align:center;padding:15px 10px 15px 0;"><p>$'.$amount.'</p></td>';
				$table_items .= '</tr>';
				
				$i=1;
				$ordered_itemss = count($order_item);
				foreach($order_item as $items){
					
					$table_items .='<tr><td width="36%" align="left" bgcolor="#f5f5f5" valign="top" style="font:15px Tahoma;color:#293137;text-align:left;"><p style="padding-left:15px;">'.$items['attr_title'].'</p></td>
							<td width="22%" align="left" bgcolor="#f5f5f5" valign="top" style="font:15px Tahoma;color:#293137;text-align:center;"><p>'.date('d/m/y h:i a',strtotime($items['attr_date_time'])).'</p></td>
							
							<td width="22%" align="left" bgcolor="#f5f5f5" valign="top" style="font:15px Tahoma;color:#293137;text-align:center;padding:0 0 15px 0;"><p>-</p></td>';
					if($i != $ordered_itemss){		
						$table_items .= '</tr>';
					}
					
					$i++;		
				}	
				
			}else if($product_type == 2 || $product_type == 9 || $product_type == 10 || $product_type == 5){
				// Asses Preparation
				
				$table_heading = '<td width="36%" align="left" bgcolor="#00355d" valign="top" style="font:15px Tahoma;color:#fff;text-align:left;padding:0px 0 0px 10px;text-transform:uppercase"><p>Course Name</p></td>							
				<td width="22%" align="left" bgcolor="#00355d" valign="top"  style="font:15px Tahoma;color:#fff;text-align:center;padding:15px 0 12px;text-transform:uppercase;">Valid Date</td>
				<td width="22%" align="left" bgcolor="#00355d" valign="top"  style="font:15px Tahoma;color:#fff;text-align:center;padding:15px 10px 12px 0;text-transform:uppercase;">Total Price</td>';
				
				$table_items = '<td width="36%" align="left" bgcolor="#fafafa" valign="top" style="font:15px Tahoma;color:#293137;text-align:left;padding:15px 0 15px 0;"><p><span style="width:30px;float:left;min-height:22px;font:15px Tahoma;color:#fff;text-align:center;padding:2px 0 0;background:#00355d;margin-right:10px;">01</span>'.$product_name.'</p></td>
				<td width="22%" align="left" bgcolor="#fafafa" valign="top" style="font:15px Tahoma;color:#293137;text-align:center;padding:15px 0;"><p>-</p></td>
				<td width="22%" align="left" bgcolor="#fafafa" valign="top" style="font:15px Tahoma;color:#293137;text-align:center;padding:15px 10px 15px 0;"><p>$'.$amount.'</p></td>';
				
				if($time_slot_details && $time_slot_details['is_alloted'] == 1){
				$table_items .= '</tr><tr><td colspan="3" style="padding-left:5%" bgcolor="#fafafa"><b>Time Slot Details </b>:<br>'.$time_slot_details['batch_table'].'</td>';
				}
				
			}else if($product_type == 6){
				
				$table_heading = '<td width="36%" align="left" bgcolor="#00355d" valign="top" style="font:15px Tahoma;color:#fff;text-align:left;padding:0px 0 0px 10px;text-transform:uppercase"><p>Course Name</p></td>							
				<td width="22%" align="left" bgcolor="#00355d" valign="top"  style="font:15px Tahoma;color:#fff;text-align:center;padding:15px 0 12px;text-transform:uppercase;">Venue Date</td>
				<td width="22%" align="left" bgcolor="#00355d" valign="top"  style="font:15px Tahoma;color:#fff;text-align:center;padding:15px 0 12px;text-transform:uppercase;">Venue Location</td>
				<td width="22%" align="left" bgcolor="#00355d" valign="top"  style="font:15px Tahoma;color:#fff;text-align:center;padding:15px 10px 12px 0;text-transform:uppercase;">Total Price</td>';
				
				$table_items = '<td width="36%" align="left" bgcolor="#fafafa" valign="top" style="font:15px Tahoma;color:#293137;text-align:left;padding:15px 0 15px 0;"><p><span style="width:30px;float:left;min-height:22px;font:15px Tahoma;color:#fff;text-align:center;padding:2px 0 0;background:#00355d;margin-right:10px;">01</span>'.$product_name.'</p></td>
				<td width="22%" align="left" bgcolor="#fafafa" valign="top" style="font:15px Tahoma;color:#293137;text-align:center;padding:15px 0;"><p>'.date('d/m/y',strtotime($order_item[0]['attr_date_time'])).'</p></td>
				<td width="22%" align="left" bgcolor="#fafafa" valign="top" style="font:15px Tahoma;color:#293137;text-align:center;padding:15px 0;"><p>'.$order_item[0]['attr_location'].'</p></td>
				<td width="22%" align="left" bgcolor="#fafafa" valign="top" style="font:15px Tahoma;color:#293137;text-align:center;padding:15px 10px 15px 0;"><p>$'.$amount.'</p></td>';
				
			}else{
			 
			$table_heading = '<td width="36%" align="left" bgcolor="#00355d" valign="top" style="font:15px Tahoma;color:#fff;text-align:left;padding:0px 0 0px 10px;text-transform:uppercase"><p>Product Name</p></td>							
				<td width="22%" align="left" bgcolor="#00355d" valign="top"  style="font:15px Tahoma;color:#fff;text-align:center;padding:12px 0 12px;text-transform:uppercase;">Valid Upto</td>
				<td width="22%" align="left" bgcolor="#00355d" valign="top"  style="font:15px Tahoma;color:#fff;text-align:center;padding:12px 10px 12px 0;text-transform:uppercase;">Total Price</td>';												
				
			$table_items = '<td width="36%" align="left" bgcolor="#fafafa" valign="top" style="font:15px Tahoma;color:#293137;text-align:left;padding:15px 0 15px 0;"><p><span style="width:30px;float:left;min-height:22px;font:15px Tahoma;color:#fff;text-align:center;padding:2px 0 0;background:#00355d;margin-right:10px;">01</span>'.$product_name.'</p></td>
							<td width="22%" align="left" bgcolor="#fafafa" valign="top" style="font:15px Tahoma;color:#293137;text-align:center;padding:15px 0;"><p>'.$expiry_date.'</p></td>
							<td width="22%" align="left" bgcolor="#fafafa" valign="top" style="font:15px Tahoma;color:#293137;text-align:center;padding:15px 10px 15px 0;"><p>$'.$amount.'</p></td>';
			}
			
			
						
			$table_footer = '<td width="36%" align="left" bgcolor="#fafafa" valign="top" style="font:15px Tahoma;color:#293137;text-align:left;padding:15px 0 15px 10px;"><p>&nbsp;</p></td>
							<td width="22%" align="left" bgcolor="#fafafa" valign="top" style="font:15px Tahoma;color:#293137;text-align:center;padding:15px 0;"><p>&nbsp;</p></td>';
							if($product_type == 6){
			$table_footer .='<td width="22%" align="left" bgcolor="#fafafa" valign="top" style="font:15px Tahoma;color:#293137;text-align:center;padding:15px 0;"><p>&nbsp;</p></td>';
							}
			$table_footer .='<td width="22%" align="left" bgcolor="#fafafa" valign="top" style="font:15px Tahoma;color:#293137;text-align:center;padding:15px 10px 15px 0;"><p>&nbsp;</p></td>';
	
						
							
			$email_config_data = array('[FIRST_NAME]'=> $first_name,
										'[FULL_NAME]' => $full_name,
										'[SUPPORT_EMAIL]'=> $supp_email,
										'[SUPPORT_PHONE]'=> $supp_phone,
										'[USER_EMAIL]' => $email,
										'[ORDER_ID]' => $order_id,
										'[PRODUCT_NAME]' => $product_name,
										'[USER_SKYPE]' => $user_skype,
										'[USER_ID]' => $user_id,
										'[PRODUCTS]' => $products,
										'[AMOUNT]' => $amount,
										'[VALID_DAYS]' => $valid_days,
										'[EXPIRY_DATE]' => $expiry_date,
										'[STATUS]' => $transcation_status_text,
										'[TRANSCATION_ID]' => $transcation_id,
										'[CREATED]' => date('d/m/y h:i a',strtotime($created)),
										'[USER_ADDRESS]' => $user_address,
										'[LOGO]' => base_url().'/'.$this->config->item("order_logo_mail"),
										'[SITE_NAME]' => $this->config->item('site_name'),
										'[SITE_LINK]'=>"<a href='".base_url()."'>Link</a>",
										'[TABLE_HEAD]'=>$table_heading,
										'[TABLE_ITEM]'=>$table_items,
										'[TABLE_FOOTER]'=>$table_footer,
										'[DATE_IMAGE]'=>$date_image,
										'[ORDER_IMAGE]'=>$order_image,
										'[AMOUNT_IMAGE]'=>$amount_image,
										   );
			 $to_email = $email;
			// $to_email = 'riaintouch@gmail.com';
			
			 $from_email = get_site_settings('emailtemplate.from_email');
			
			
			$template = 'User Order Email';
					
			$res = $this->email_template->send_mail($to_email,$from_email['value'],$template,$email_config_data);
			//echo 'Checking please wait';exit;
		}
		
		public function ipin_process_payment(){	
		
		 
		 
		 	$response_data = '';
		$payment_status= '';
		$custom= '';
		$txn_id= '';
		$amt= '';
		
		if(isset($_POST) && $_POST){
			$response_data = $_POST;
			$payment_status= $_POST['payment_status'];
			$custom= $_POST['custom'];
			$txn_id= $_POST['txn_id'];
			$amt= $_POST['mc_gross'];
		}
		
		if(isset($_GET) && $_GET && isset($_GET['st']) && $_GET['st']){
			$response_data = $_GET;
			$payment_status= $_GET['st'];
			$custom= $_GET['cm'];
			$txn_id= $_GET['tx'];
			$amt= $_GET['amt'];
		}
		

		 
		 
		 
		 	$price = $amt;
			$currency = $_REQUEST['cc'];
			$product_name = $_REQUEST['item_name'];
			$product_id = $_REQUEST['item_number'];
			$transcation_status = $payment_status;
			$transcation_status_text = $payment_status;
			$transcation_id = $txn_id;
			 
			
			//exit;
			
			/* Format: user_id --- timeslot_id --- selected_date_time --- live_mock_exam_id */
			//pr($_REQUEST);exit;
			//$custom = $_REQUEST['cm'];
			$custom_arr = explode('---',$custom);
			
			$customer_id = $custom_arr[0];
			if($custom_arr[1] == 'NIL'){
				$timeslot_id = 0;
			}else{
				$timeslot_id = $custom_arr[1];
			}
			
			$ts_date_time = $custom_arr[2];
			$mock_id = $custom_arr[3];
			
			switch($transcation_status){
				case 'Completed' : $transcation_status = 1;break;
				case 'Cancelled' : $transcation_status = 2;break;
				case 'Failed' : $transcation_status = 3;break;
				case 'Placed' : $transcation_status = 4;break;
				case 'Processing' : $transcation_status = 5;break;
				case 'Refunded' : $transcation_status = 6;break;
				case 'Refused' : $transcation_status = 7;break;
				case 'Removed' : $transcation_status = 8;break;
				case 'Returned' : $transcation_status = 9;break;
				case 'Reversed' : $transcation_status = 10;break;
				case 'Unclaimed' : $transcation_status = 11;break;
				case 'On hold' : $transcation_status = 12;break;
				case 'Held' : $transcation_status = 13;break;
				case 'Denied' : $transcation_status = 14;break;
				case 'default' : $transcation_status = 15;break;
			}
			
		
			
			$join_tables = [];
			$where = [];
			$fields = 'id';
			$total_cnt = $this->base_model->get_advance_list('orders', $join_tables, $fields, $where, 'num_rows','','','id');
			$order_id = sprintf("%06d", $total_cnt+1);
			
			
			$join_tables = [];
			$join_tables[] = array('product_type pt','pt.id = p.product_type_id','left');
			$join_tables[] = array('product_attributes pa','pa.product_id = p.id','left');
			$where = [];
			$where[] = array(TRUE,'p.id',$product_id);
			$fields = 'p.*,pt.slug as product_type_slug,pt.name as type_name,pa.product_included,pa.included_valid_days';
			$product_detail = $this->base_model->get_advance_list('product p', $join_tables, $fields, $where, 'row_array','','','p.id');
			
			
			$product_type_id = $product_detail['product_type_id'];
			$product_type_slug = $product_detail['product_type_slug'];
			$product_name = $product_detail['name'];
			$product_type_name = $product_detail['type_name'];
			$product_slug = $product_detail['slug'];

			$expiry_date_time 	= '';
			$valid_days 		= '';
			$attr_country 		= '';
			$attr_city 			= '';
			$attr_location 		= '';
			$attr_date_time 	= '';
			$is_webinar = 0;
			
			if($product_type_slug == 'combo-plan' || $product_type_slug == 'combo-package' || $product_type_slug == 'complete-comprehensive-course' || $product_type_slug == 'rapid-review-course'){ //
			
				$valid_days =  $product_detail['included_valid_days'];
				if($product_type_slug != 'combo-plan'){
					$product_slug = $product_type_slug;
				}
				$current_date = date('Y-m-d h:i:s');
				$expiry_date_time = date('Y-m-d h:i:s',strtotime('+'.$valid_days.' days',strtotime($current_date)));
				
			}
			
			if($product_type_slug == 'cs-handbook' || $product_type_slug == 'online-video-tutorials'){
				$valid_days = $product_detail['valid_days'];
				$current_date = date('Y-m-d h:i:s');
				$expiry_date_time = date('Y-m-d h:i:s',strtotime('+'.$valid_days.' days',strtotime($current_date)));
			}
			
			if($product_type_slug !='webinar' && $product_type_slug !='webinar-group'){ // this is because passing customer vaiable
			
				if($mock_id != 'NIL'){
					//Product Mock Detail
					$prod_mock_detail = $this->base_model->getRow('product_mock_exam','country_id,city_id,location,date_time','id = "'.$mock_id.'"');
					$attr_country 		= $prod_mock_detail->country_id;
					$attr_city 			= $prod_mock_detail->city_id;
					$attr_location 		= $prod_mock_detail->location;
					$attr_date_time 	= $prod_mock_detail->date_time;
				}


				if($timeslot_id != 'NIL'){
					//Timeslot Detail
					$timeslot_detail = $this->base_model->getRow('admin_availability_time_slot ats','date_time','id = "'.$timeslot_id.'"');
					$attr_date_time 	= $timeslot_detail->date_time;
				}else if($ts_date_time != 'NIL'){
					$attr_date_time 	= date('Y-m-d H:i:s',$ts_date_time);
				}
			}
			if($product_type_slug == 'webinar'){
				$webinar_detail = $this->base_model->getRow('product_webinar','date_time,id,product_id,title','product_id = "'.$product_id.'"');
				$is_webinar = 1;
				$attr_date_time = $webinar_detail->date_time;
			}

			if($product_type_slug == 'webinar-group'){
				$is_webinar = 1;
			}

			
			//$user_data = get_loggedin_user();
			$user_id = $customer_id;
			
			if($user_id > 0){
			
				$join_tables = [];
				$where = [];
				$where[] = array(TRUE,'id',$user_id);
				$fields = '*';
				$customer_data = $this->base_model->get_advance_list('users', $join_tables, $fields, $where, 'row_array','','','id');
				$address = $customer_data['address'];
				$country = $customer_data['country'];
				$city = $customer_data['city'];
				$skype_id = $customer_data['skype_id'];
				$phone_no = $customer_data['phone_no'];
				$first_name = $customer_data['first_name'];
				$last_name = $customer_data['last_name'];
				$email_id = $customer_data['email_id'];
			}else if($user_id == 0){
				
				$custom_arr = explode('---',$custom);

				$webinar_details = $this->base_model->getRow('users_webinar uw','uw.*',array('email' => $custom_arr[2] ),array('return'=>'row_array'));
				
				$join_tables = [];
				$where = [];
				$where[] = array(TRUE,'email_id',$custom_arr[2]);
				$fields = '*';
				$customer_data = $this->base_model->get_advance_list('users', $join_tables, $fields, $where, 'row_array','','','id');

				if(!empty($webinar_details)){
					$customer_id = $webinar_details['id'];
				}else{
					$webinar_data = array('name'=>$custom_arr[1],'email'=>$custom_arr[2],'skype_id'=>$custom_arr[3],'created'=>date('Y-m-d h:i:s'));
					$webinar_id = $this->base_model->insert( 'users_webinar', $webinar_data);
					$customer_id = $webinar_id;	
				}
				if($customer_data){
					$address = $customer_data['address'];
					$country = $customer_data['country'];
					$city = $customer_data['city'];
					$skype_id = $custom_arr[3];
					$phone_no = $customer_data['phone_no'];
					$first_name = $custom_arr[1];
					$last_name = $customer_data['last_name'];
					$email_id = $custom_arr[2];
				}else{
					$address = '';
					$country = '';
					$city = '';
					$skype_id = $custom_arr[3];
					$phone_no = '';
					$first_name = $custom_arr[1];
					$last_name = '';
					$email_id = $custom_arr[2];
				}
				
			}
			
			
			$order_data = array(
							'user_first_name'=>$first_name,
							'user_last_name'=>$last_name,
							'user_email'=>$email_id,
							'product_name' => $product_type_name.' - '.$product_name,
							'product_slug' => $product_slug,
							'user_address'=>$address,
							'user_country'=>$country,
							'user_city'=>$city,
							'user_skype'=>$skype_id,
							'user_phone'=>$phone_no,
							'order_id'=>$order_id,
							'user_id'=>$customer_id,
							'amount'=>$price,
							'products'=>$product_id,
							'product_type'=>$product_type_id,
							'expiry_date'=>$expiry_date_time,
							'valid_days'=>$valid_days,
							'timeslot_id' => $timeslot_id,
							'prod_attr_country' => $attr_country,
							'prod_attr_city' => $attr_city,
							'prod_attr_location' => $attr_location,
							'prod_attr_location_date' => $attr_date_time,
							'status'=>$transcation_status,
							'transcation_id'=>$transcation_id,
							'is_webinar' => $is_webinar,
							'created'=> date('Y-m-d h:i:s'),
							);
							
							
			
			$this->base_model->insert('orders', $order_data);
			$order_data['transcation_status_text'] = $transcation_status_text;
			$time_slot_details = array();
			
			if($product_type_slug == 'combo-plan' || $product_type_slug == 'combo-package' || $product_type_slug == 'complete-comprehensive-course' || $product_type_slug == 'rapid-review-course' || $product_type_slug == 'webinar-group' ){
				$included_product = explode(",",$product_detail['product_included']);
				
				foreach($included_product as $included){
					
					$join_tables = [];
					$where = [];
					if($product_type_slug == 'webinar-group'){
						$fields = 'p.slug,p.id,pw.title as product_title';
						$join_tables[] = array('product_webinar pw','pw.product_id = p.id','inner');
					}else{
						$fields = 'pt.slug as type_slug,p.slug,p.id,pa.content_one as product_title,p.name as steps_name';
						$join_tables[] = array('product_attributes pa','pa.product_id = p.id','inner');	
						$join_tables[] = array('product_type pt','pt.id = p.product_type_id','inner');	
					}
					
					$where[] = array(TRUE,'p.id',$included);
					
					$include_product_detail = $this->base_model->get_advance_list('product p', $join_tables, $fields, $where, 'row_array','','','p.id');
					  
					if($product_type_slug == 'webinar-group'){
						$webinar_detail = $this->base_model->getRow('product_webinar','date_time,id,product_id,title','product_id = "'.$included.'"');
						$attr_date_time = $webinar_detail->date_time;
					}
					
					if($product_type_slug == 'combo-package' || $product_type_slug == 'combo-plan'){
						
						$current_date = date('Y-m-d h:i:s');
						$attr_date_time = date('Y-m-d h:i:s',strtotime('+'.$valid_days.' days',strtotime($current_date)));
						
					}

					switch($include_product_detail['slug']){
						case 'assesement-preparation':
							$this->send_timeslot_request_nodate($customer_id,$include_product_detail['id'],$product_detail['name'],$order_id);
						break;
						case 'patient-note-correction':
							$this->send_timeslot_request_nodate($customer_id,$include_product_detail['id'],$product_detail['name'],$order_id);
						break;
						case 'online-mock-exam':
							$this->send_timeslot_request_nodate($customer_id,$include_product_detail['id'],$product_detail['name'],$order_id);
						break;
					}
					if($include_product_detail['type_slug'] == 'online-video-tutorials'){
						$product_name = strip_tags($include_product_detail['product_title']).' - '.$include_product_detail['steps_name'];
					}else{
						$product_name = strip_tags($include_product_detail['product_title']);
					}
					$order_item = array(
								'order_id'=>$order_id,
								'product_id'=>$included,
								'product_type'=>$product_type_id,
								'product_slug' => $include_product_detail['slug'],
								'valid_days'=>$valid_days,
								'attr_title' => $product_name,
								'attr_country' => $attr_country,
								'attr_city' => $attr_city,
								'attr_location' => $attr_location,
								'attr_date_time' => $attr_date_time,
								'created'=> date('Y-m-d h:i:s'),
								);
					$order_item_array[] = $order_item;
					$this->base_model->insert('order_item', $order_item);
				}
				
			}else{
			
			$order_item = array(
							'order_id'=>$order_id,
							'product_id'=>$product_id,
							'product_type'=>$product_type_id,
							'product_slug' => $product_slug,
							'valid_days'=>$valid_days,
							'attr_title' => $product_name,
							'attr_country' => $attr_country,
							'attr_city' => $attr_city,
							'attr_location' => $attr_location,
							'attr_date_time' => $attr_date_time,
							'created'=> date('Y-m-d h:i:s')
							);
			 $order_item_array[] = $order_item;
			 $this->base_model->insert('order_item', $order_item);
			}
			
			$this->session->set_flashdata('order_id', $order_id);
			
			$rr = json_encode($_REQUEST);
			
			$insert_array = array (	'response' => $rr,
									'ipin'=>0,
									'created'=>date('Y-m-d h:i:s'),
									'modified'=>date('Y-m-d h:i:s')
								);
			
			$this->base_model->insert('transcation', $insert_array);
			
			
			
			if($product_type_slug !='webinar' && $product_type_slug !='webinar-group'){
			
				if($timeslot_id != 'NIL'){
					
					$time_slot_details = $this->update_timeslot($timeslot_id,$customer_id);
				}else if($ts_date_time != 'NIL'){
					//Send Request
					$time_slot_details = $this->send_timeslot_request($customer_id,$product_id,$product_name,$ts_date_time,$order_id);
				}
			}
			if($product_type_slug =='webinar' || $product_type_slug =='webinar-group'){
				$custom_arr = explode('---',$custom);
				$customer_id = $custom_arr[0];
				if($customer_id == 0){
					$this->session->set_flashdata('guest_webinar', 1);
				}
			}
			
			if($transcation_status == 1){
				$this->sendOrderMail($order_data,$order_item_array,$time_slot_details);
			}
		 
		 
		 

 
		
			
		/*	$txn_id = $_REQUEST['txn_id'];
			
			$last_name = $_REQUEST['last_name'];
			$receipt_id = $_REQUEST['receipt_id'];
			$residence_country = $_REQUEST['residence_country'];
			$item_name = $_REQUEST['item_name'];
			$payment_gross = $_REQUEST['payment_gross'];
			$mc_currency = $_REQUEST['mc_currency'];
			$payer_email = $_REQUEST['payer_email'];
			$mc_currency = $_REQUEST['mc_currency'];
			$quantity = $_REQUEST['quantity'];
			$first_name = $_REQUEST['first_name'];
			$product_id = $_REQUEST['item_number'];
			$payment_status = $_REQUEST['payment_status'];
			$payment_fee = $_REQUEST['payment_fee'];
			$mc_fee = $_REQUEST['mc_fee'];
			$mc_gross = $_REQUEST['mc_gross'];
			$ipn_track_id = $_REQUEST['ipn_track_id'];
			
			
			switch($payment_status){
				case 'Completed' : $transcation_status = 1;break;
				case 'Cancelled' : $transcation_status = 2;break;
				case 'Failed' : $transcation_status = 3;break;
				case 'Placed' : $transcation_status = 4;break;
				case 'Processing' : $transcation_status = 5;break;
				case 'Refunded' : $transcation_status = 6;break;
				case 'Refused' : $transcation_status = 7;break;
				case 'Removed' : $transcation_status = 8;break;
				case 'Returned' : $transcation_status = 9;break;
				case 'Reversed' : $transcation_status = 10;break;
				case 'Unclaimed' : $transcation_status = 11;break;
				case 'On hold' : $transcation_status = 12;break;
				case 'Held' : $transcation_status = 13;break;
				case 'Denied' : $transcation_status = 14;break;
				case 'default' : $transcation_status = 15;break;
			}		
			
			
			$update_order = array (
								"ipn_track_id"=>$ipn_track_id,
								"payment_fee"=>$payment_fee,
								'mc_fee'=>$mc_fee,
								'mc_gross'=>$mc_gross,
								'receipt_id'=>$receipt_id,
								'status'=>$transcation_status
							);
			
			$this->base_model->update( 'orders', $update_order, array('transcation_id'=>$txn_id));
			
			$rr = json_encode($_REQUEST);
			
			$insert_array = array (	'response' => $rr,
							'ipin'=>1,
							'created'=>date('Y-m-d h:i:s'),
							'modified'=>date('Y-m-d h:i:s')
							);
			$rr = $this->base_model->insert('transcation', $insert_array);*/
			
			
		}
		
		public function success(){
		
			$join_tables = [];
			$where = [];
			$fields = 'id';
			$total_cnt = $this->base_model->get_advance_list('orders', $join_tables, $fields, $where, 'num_rows','','','id');
			  $order_id = sprintf("%06d", $total_cnt+1);
			
		 
			if(!$order_id){
				redirect();
			}
			$data['main_content'] = 'payment/success';
			$data['order_id'] = $order_id;
			$this->load->view(SITE_LAYOUT_PATH, $data);
			
		}
		
		public function update_timeslot($timeslot_id,$user_id){

			$date = date('Y-m-d H:i:s');

			//Get Timeslot Count
			$join_tables = [];
			$where = [];
			$where[] = array(TRUE,"orders.timeslot_id",$timeslot_id);
			$fields = 'id';
			$timeslot_cnt = $this->base_model->get_advance_list('orders', $join_tables, $fields, $where, 'num_rows','','','id');

			//Get Order Details
			$join_tables = [];
			$where = [];
			$where[] = array(TRUE,"orders.timeslot_id",$timeslot_id);
			$where[] = array(TRUE,"orders.user_id",$user_id);
			$fields = 'id,order_id';
			$order_details = $this->base_model->get_advance_list('orders', $join_tables, $fields, $where, 'row_array','','','id');

			//Timeslot Details
			$where = $join_tables = array();
			$where[] = array(TRUE,'ats.id',$timeslot_id);
			$join_tables[] = array('product_type pt','pt.id = ats.product_type_id','inner');
			$join_tables[] = array('product p','p.product_type_id = ats.product_type_id','inner');
			$fields = 'pt.name as product_type,ats.batch_name,p.name as product_name,p.id as product_id,pt.user_count,pt.class_count,pt.time_duration,ats.date_time as ts_date_time';
			$timeslot_details = $this->base_model->get_advance_list('admin_availability_time_slot ats', $join_tables, $fields, $where, 'row_array','','','ats.id');

			//Batch Details
			$batch_list = get_batch_details_by_timeslot_order($timeslot_id);
			$batch_table = get_batch_timeslot_table_order($timeslot_id);

			//Update Timeslot
			if($timeslot_cnt >= ($timeslot_details['user_count'])){
				$update_timeslot_arr = array(
											'is_complete' => 1,
											'is_users_booked' => 1
										);
				$this->base_model->update('admin_availability_time_slot',$update_timeslot_arr,array('id' => $timeslot_id));
			}else if($timeslot_cnt == 1){
				$update_timeslot_arr = array(
											'is_users_booked' => 1
										);
				$this->base_model->update('admin_availability_time_slot',$update_timeslot_arr,array('id' => $timeslot_id));
			}

			//Insert User Timeslot

			$ins_array = array (	'time_slot_id' => $timeslot_id,
									'user_id' => $user_id,
									'order_id' => $order_details['id'],
									'time_duration' => $timeslot_details['time_duration'],
									'date_time' => $timeslot_details['ts_date_time'],
									'payment_method_status' => 1,
									'created' => $date
								  );

			$user_timeslot_id = $this->base_model->insert('users_time_slot', $ins_array);

			
			if(!empty($timeslot_details['class_count'])){

				foreach($batch_list as $class_id => $date_time){


					$ts_date_time = $date_time;

					for($duration_part=1;$duration_part<=$timeslot_details['time_duration'];$duration_part++){

						if($duration_part>1){
							$ts_date_time = date('Y-m-d H:i:s',strtotime($ts_date_time.'+ '.($duration_part-1).' hour'));
						}else{
							$ts_date_time = date('Y-m-d H:i:s',strtotime($ts_date_time));
						}
							

						$insert_array = array (	'user_time_slot_id' => $user_timeslot_id,
												'class_id' => $class_id,
												'date_time' => $ts_date_time,
												'duration_part' => $duration_part,
												'user_id' => $user_id,
												'created' => $date
											  );
						$this->base_model->insert('users_batch_time_slot', $insert_array);

					}

					
//echo $this->db->last_query();
//echo '<br />';

				}
			}

		/* Send email to user */
			
			//User Detail
			$user_detail = $this->base_model->getRow('users','email_id,first_name,last_name','id = "'.$user_id.'"');

			$user_email = $user_detail->email_id;
			$user_name = $user_detail->first_name.' '.$user_detail->last_name;
			$site_name = $site_settings = get_site_settings('site.name');
			$site_name = $site_name['value'];

			//Send Email							
			$email_config_data = array(
							'[SITE_NAME]' => $site_name,
						   	'[LOGO]' => base_url().'/'.$this->config->item("logo_mail"),
						   	'[SITE_LINK]'=>"<a href='".base_url()."'>Link</a>",
							'[USERNAME]'=> $user_name,
							'[ORDER_ID]' => $order_details['order_id'],
						   	'[PRODUCT_TYPE]' => $timeslot_details['product_type'],
						   	'[PRODUCT_NAME]' => $timeslot_details['product_name'],
						   	'[BATCH_NAME]' => $timeslot_details['batch_name'],
						   	'[TABLE]' => $batch_table,
						   );
			$to_email = $user_email;
			$from_email = get_site_settings('emailtemplate.from_email');
			$from_email = $from_email['value'];
			$template = 'User Timeslot Creation Order';

			$this->load->library('email_template');
			$res = $this->email_template->send_mail($to_email,$from_email,$template,$email_config_data);
			
			return $time_slot_details = array(
								'batch_name' =>$timeslot_details['batch_name'],
								'product_name'=> $timeslot_details['product_name'],
								'product_type'=> $timeslot_details['product_type'],
								'batch_table'=>$batch_table,
								'is_alloted'=>1,
								);

		}

		public function send_timeslot_request($user_id,$product_id,$product_name,$ts_date_time,$order_id){

			//Product Details
			$where = $join_tables = array();
			$where[] = array(TRUE,'p.id',$product_id);
			$join_tables[] = array('product_type pt','pt.id = p.product_type_id','inner');
			$fields = 'pt.name as product_type,p.name as product_name,p.id as product_id';
			$prod_details = $this->base_model->get_advance_list('product p', $join_tables, $fields, $where, 'row_array','','','p.id');

			/* Send email to user */
			
			//User Detail
			$user_detail = $this->base_model->getRow('users','email_id,first_name,last_name,phone_no','id = "'.$user_id.'"');

			$user_email = $user_detail->email_id;
			$user_name = $user_detail->first_name.' '.$user_detail->last_name;
			$user_phone = $user_detail->phone_no;
			$site_name = $site_settings = get_site_settings('site.name');
			$site_name = $site_name['value'];

			//Send Email							
			$email_config_data = array(
							'[SITE_NAME]' => $site_name,
						   	'[LOGO]' => base_url().'/'.$this->config->item("logo_mail"),
						   	'[SITE_LINK]'=>"<a href='".base_url()."'>Link</a>",
						   	'[USERNAME]'=> $user_name,
							'[USEREMAIL]'=> $user_email,
							'[USERPHONE]'=> $user_phone,
						   	'[PRODUCT_TYPE]' => '',
						   	'[PRODUCT_NAME]' => $prod_details['product_name'],
						   	'[DATE_TIME]' => date('m/d/Y h:i A',$ts_date_time),
						   	'[ORDER_ID]' => $order_id,
						   );
			$to_email = $user_email;
			$from_email = get_site_settings('emailtemplate.from_email');
			$from_email = $from_email['value'];
			$template = 'User Timeslot Request';

			$this->load->library('email_template');
			$res = $this->email_template->send_mail($to_email,$from_email,$template,$email_config_data);
			
			

			//Add Notification
			$type_config = $this->config->item('notification_type');
			$type = $type_config['timeslot_request_with_date'];
			$msg = 'The following user '.$user_name.'('.$user_email.','.$user_phone.') requested timeslot for the product '.$prod_details['product_name'].' on '.date('m/d/Y h:i A',$ts_date_time).'.';
			$this->add_notification($user_id,$type,$msg);
			
			return $time_slot_details = array(
								'product_name'=> $prod_details['product_name'],
								'date_time'=> date('m/d/Y h:i A',$ts_date_time),
								'is_alloted'=>0,
								);

		}

		public function send_timeslot_request_nodate($user_id,$product_id,$main_product_name,$order_id){

			//Product Details
			$where = $join_tables = array();
			$where[] = array(TRUE,'p.id',$product_id);
			$join_tables[] = array('product_type pt','pt.id = p.product_type_id','inner');
			$fields = 'pt.name as product_type,p.name as product_name,p.id as product_id';
			$prod_details = $this->base_model->get_advance_list('product p', $join_tables, $fields, $where, 'row_array','','','p.id');

			/* Send email to user */
			
			//User Detail
			$user_detail = $this->base_model->getRow('users','email_id,first_name,last_name,phone_no','id = "'.$user_id.'"');

			$user_email = $user_detail->email_id;
			$user_name = $user_detail->first_name.' '.$user_detail->last_name;
			$user_phone = $user_detail->phone_no;
			$site_name = $site_settings = get_site_settings('site.name');
			$site_name = $site_name['value'];

			//Send Email							
			$email_config_data = array(
							'[SITE_NAME]' => $site_name,
						   	'[LOGO]' => base_url().'/'.$this->config->item("logo_mail"),
						   	'[SITE_LINK]'=>"<a href='".base_url()."'>Link</a>",
						   	'[USERNAME]'=> $user_name,
							'[USEREMAIL]'=> $user_email,
							'[USERPHONE]'=> $user_phone,
						   	'[MAIN_PRODUCT]' => $main_product_name,
						   	'[PRODUCT_NAME]' => $prod_details['product_name'],
						   	'[ORDER_ID]' => $order_id,
						   );
			$to_email = $user_email;
			$from_email = get_site_settings('emailtemplate.from_email');
			$from_email = $from_email['value'];
			$template = 'User Timeslot Request Nodate';

			$this->load->library('email_template');
			$res = $this->email_template->send_mail($to_email,$from_email,$template,$email_config_data);

			//Add Notification
			$type_config = $this->config->item('notification_type');
			$type = $type_config['timeslot_request_without_date'];
			$msg = 'The following user '.$user_name.'('.$user_email.','.$user_phone.') requested timeslot for the product '.$prod_details['product_name'].'('.$main_product_name.').';
			$this->add_notification($user_id,$type,$msg);

		}
		
		public function add_notification($user_id,$type,$msg){
			$notify_data = array(
							'user_id'=>$user_id,
							'type'=>$type,
							'message'=>$msg,
							'created' => date('Y-m-d H:i:s'),
							);
			$this->base_model->insert('notification', $notify_data);
		}
		
}

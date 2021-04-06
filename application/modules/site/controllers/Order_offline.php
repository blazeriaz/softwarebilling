<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Order_offline extends Public_Controller
{
	  	function __construct()
  		{
    		parent::__construct();
			
			$this->load->library(array('form_validation','email_template'));
			$this->load->language(array('flash_message','form_validation'), 'english');
			$this->load->model('base_model');
			$this->load->helper('frontend_helper');
		}

		
		/******** User Login Function *******/
		public function index($slugfield='index', $page_num =1, $sortfield='id', $orderfield='desc')
		{  			
			$this->load->helper('thumb_helper');
			$this->load->helper('html');
			
			$user_session = $this->session->userdata('user_is_logged_in');
			$data['user_id'] = 0;
			$data['email_id'] = "";
			$data['name'] = "";
			if($user_session){
				$data['user_id'] = $user_session['user_id'];
				$data['email_id'] = $user_session['email_id'];
				$data['name'] = $user_session['display_name'];
			}
			if ($this->input->server('REQUEST_METHOD') === 'POST'){				
				$this->form_validation->set_rules("name","Name","trim|required");
				$this->form_validation->set_rules("email_id","Email ID","trim|required|valid_email");
				$this->form_validation->set_rules("phone_number","Phone Number","trim|required");
				$this->form_validation->set_rules("comments","Comments","trim|required|min_length[5]|max_length[255]|callback_only_english");
			//	$this->form_validation->set_rules('g-recaptcha-response', '','trim|callback_captcha_check');
				
				if ($this->form_validation->run() == True){
				
						/*$data = array(
							'content'  => $this->input->post('content'),
							'name'	=> $this->input->post('name'),
							'email' => $this->input->post('email')						
						);*/
						$save_data=array(
							'created' => date('Y-m-d H:i:s'),
							'modified' => date('Y-m-d H:i:s'),
							'name' => $this->input->post('name'),
							'email_id' => $this->input->post('email_id'),
							'phone_number'  => $this->input->post('phone_number'),
							'amount'  => $this->input->post('amount'),
							'comments'  => $this->input->post('comments'),
							'status' => 0
						);
						$table='order_offline';
						$enquiry_form = $this->base_model->insert('order_offline', $save_data);
						
						
 





						
						if($enquiry_form > 0){
						$paypal_mode = get_site_settings('paypal.mode','value');
			$paypal_username = get_site_settings('paypal.username','value');
			if($paypal_mode==1){
				$data['paypal_url'] = $this->config->item("paypal_live_url");
			}else{
				$data['paypal_url'] = $this->config->item("paypal_sandbox_url");
			}
			$data['paypal_id']= $paypal_username;
						
						
						
						?>
						
<form id="target-payment" action='<?php echo $data['paypal_url']; ?>' method='post' name='form'>
<input type='hidden' name='business' value='<?php echo $data['paypal_id']; ?>'>
<input type='hidden' name='cmd' value='_xclick'>
<input type='hidden' name='item_name' value='Offline Order'>
<input type='hidden' name='item_number' value='1'>
<input type='hidden' name='amount' value='<?php echo $this->input->post('amount');?>'>
<input type='hidden' name='no_shipping' value='1'>
<input type='hidden' name='currency_code' value='USD'>
<input type='hidden' name='custom' value='<?php echo $enquiry_form; ?>'>

<input type='hidden' name='cancel_return' value="<?php echo base_url('order-offline/cancel'); ?>?user_id=<?php echo $enquiry_form; ?>&currency=USD">
<input type='hidden' name='return' value='<?php echo base_url('order-offline/process_payment'); ?>?user_id=<?php echo $enquiry_form; ?>'>
<input type='hidden' name='notify_url' value='<?php echo base_url('order-offline/ipin_process_payment'); ?>'>
<input type='hidden' name='rm' value='2'>
<input type="image" style="display:none" src="https://paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" name="submit">
</form> 
<script type="text/javascript">
setTimeout(function(){ document.getElementById('target-payment').submit(); }, 1000);

</script>
						
						
						<?php
						
						
						echo 'Redirecting Payment gateway....';
						die;
						
 
							/*$user_email = $this->input->post('email_id');
							$user_name = $this->input->post('name');
							$user_phone_no = $this->input->post('phone_number');
							$user_comments = $this->input->post('comments');
							$email_config_data = array(
												   '[USERNAME]'=> $user_name, 
												   '[USER_EMAIL]' => $user_email,
												   '[USER_PHONE]' => $user_phone_no,
												   '[USER_COMMENTS]' => $user_comments,
												   '[SITE_NAME]' => $this->config->item('site_name'),
												   '[LOGO]' => base_url().$this->config->item('logo_mail'),
												   '[SITE_LINK]'=>"<a href='".base_url()."'>Link</a>"
												   );
							$to_email = $user_email;
							$from_email = get_site_settings('emailtemplate.from_email','value');							
							$template = 'User Contact';							
							$res = $this->email_template->send_mail($to_email,$from_email,$template,$email_config_data);
							
							$to_email = get_site_settings('emailtemplate.from_email','value');	
							$from_email = $user_email;			
							$template = 'Admin Contact';				
							$res = $this->email_template->send_mail($to_email,$from_email,$template,$email_config_data);*/
						}
						//$this->session->set_flashdata('flash_message', 'Thank you for contacting us.');
						//redirect('order-offline');
				}
			}
			
			$data['main_content'] = 'order_offline/index';
			$data['page_title']  = 'Order Offline'; 
			$this->load->view(SITE_LAYOUT_PATH, $data);
		}

		public function captcha_check($captcha){
		
		
	        if(isset($captcha)){
	          $captcha = $captcha;
	        }
	        if(!$captcha){
	         
			  $this->form_validation->set_message('captcha_check', 'Please check the the captcha form');					
				return FALSE;
	         
	        }
	        $secretKey = "6LcG8DcUAAAAAAAmbe8GIJtR8GvqEDEwANBLjrBt";
	        $ip = $_SERVER['REMOTE_ADDR'];
	        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
	        $responseKeys = json_decode($response,true);
	        if(intval($responseKeys["success"]) !== 1) {
				$this->form_validation->set_message('captcha_check', 'Please Do not spam.');					
				return FALSE;
	        } 
			return true;
		
		}

		public function only_english($str){
			if(strlen($str) != mb_strlen($str, 'utf-8')){
				$this->form_validation->set_message('only_english', 'Please enter only in english');
				return FALSE;
			}
		}
		
		
		public function cancel(){
			
			
			//pr($_REQUEST);
			$custom =$_REQUEST['user_id'];
			$custom_arr = explode('---',$custom);
			
			$customer_id = $custom_arr[0];
			 $update_order = array ( 
								'status'=>1
							);
			
			$this->base_model->update( 'order_offline', $update_order, array('id'=>$customer_id));
			
					$cond_data[] = array( TRUE, 'id',$customer_id);
											
					$records_data = $this->base_model->get_records( 'order_offline','',$cond_data);
			
			
			 
			 
							$user_email = $records_data[0]['email_id'];
							$user_name =  $records_data[0]['name'];
							$user_phone_no =  $records_data[0]['phone_number'];
							$user_comments =  $records_data[0]['comments'];
							$user_amount =  $records_data[0]['amount'];
							
							 
							$email_config_data = array(
												   '[USERNAME]'=> $user_name, 
												   '[USER_EMAIL]' => $user_email,
												   '[USER_PHONE]' => $user_phone_no,								   					   '[PAYMENT_STATUS]' => 'Cancelled',
												   '[USER_AMOUNT]' => $user_amount,
												   '[USER_COMMENTS]' => $user_comments,
												   '[SITE_NAME]' => $this->config->item('site_name'),
												   '[LOGO]' => base_url().$this->config->item('logo_mail'),
												   '[SITE_LINK]'=>"<a href='".base_url()."'>Link</a>"
												   );
												   
												   
						  
												   
							$to_email = $user_email;
							$from_email = get_site_settings('emailtemplate.from_email','value');							
							$template = 'User Offline order';							
							$res = $this->email_template->send_mail($to_email,$from_email,$template,$email_config_data);
							
							$to_email = get_site_settings('emailtemplate.from_email','value');	
							$from_email = $user_email;			
							$template = 'Admin Offline order';				
							$res = $this->email_template->send_mail($to_email,$from_email,$template,$email_config_data);
			 
			redirect('order-offline/error');
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
			$update_order = array ( 
								'status'=>2
							);
			
			$this->base_model->update( 'order-offline', $update_order, array('id'=>$customer_id));
			
			 			redirect('order_offline/success');
			
		}
		
		public function success(){
		
			$join_tables = [];
			$where = [];
			$fields = 'id';
			$total_cnt = $this->base_model->get_advance_list('order_offline', $join_tables, $fields, $where, 'num_rows','','','id');
			  $order_id = sprintf("%06d", $total_cnt+1);
			
		 
			if(!$order_id){
				redirect();
			}
			$data['main_content'] = 'order_offline/success';
			$data['order_id'] = $order_id;
			$this->load->view(SITE_LAYOUT_PATH, $data);
			
		}
		
		public function process_payment(){
			 $custom =$_REQUEST['user_id'];
			$custom_arr = explode('---',$custom);
			
			$customer_id = $custom_arr[0];
			 $update_order = array ( 
								'status'=>2
							);
			
			$this->base_model->update( 'order_offline', $update_order, array('id'=>$customer_id));
			
			
			$cond_data[] = array( TRUE, 'id',$customer_id);
											
					$records_data = $this->base_model->get_records( 'order_offline','',$cond_data);
			
			
			 
			 
							$user_email = $records_data[0]['email_id'];
							$user_name =  $records_data[0]['name'];
							$user_phone_no =  $records_data[0]['phone_number'];
							$user_comments =  $records_data[0]['comments'];
							$user_amount =  $records_data[0]['amount'];
							
							 
							$email_config_data = array(
												   '[USERNAME]'=> $user_name, 
												   '[USER_EMAIL]' => $user_email,
												   '[USER_PHONE]' => $user_phone_no,								   					   '[PAYMENT_STATUS]' => 'Completed',
												   '[USER_AMOUNT]' => $user_amount,
												   '[USER_COMMENTS]' => $user_comments,
												   '[SITE_NAME]' => $this->config->item('site_name'),
												   '[LOGO]' => base_url().$this->config->item('logo_mail'),
												   '[SITE_LINK]'=>"<a href='".base_url()."'>Link</a>"
												   );
												   
												   
						  
												   
							$to_email = $user_email;
							$from_email = get_site_settings('emailtemplate.from_email','value');							
							$template = 'User Offline order';							
							$res = $this->email_template->send_mail($to_email,$from_email,$template,$email_config_data);
							
							$to_email = get_site_settings('emailtemplate.from_email','value');	
							$from_email = $user_email;			
							$template = 'Admin Offline order';				
							$res = $this->email_template->send_mail($to_email,$from_email,$template,$email_config_data);
			 
			 
			 
			 
			 
			$this->session->set_flashdata('flash_message','Order Created Successfully');
			redirect('order-offline/success');
			 
		}
		
		public function error(){
			$data['main_content'] = 'order_offline/cancel';
			$this->load->view(SITE_LAYOUT_PATH, $data);
		}
		
		
		
}

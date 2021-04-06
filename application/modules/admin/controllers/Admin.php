<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Admin_Controller
{
	  	function __construct()
  		{
    		parent::__construct();
			$this->load->library('form_validation');
			$this->load->language(array('flash_message','form_validation'), 'english');
			//getSearchDetails($this->router->fetch_class());
			$this->load->model('base_model'); 
			$this->load->model('Admin_model'); 
		}

		/******** Admin login function *******/
		public function index()
		{  
				if($this->session->has_userdata('admin_is_logged_in')){
						redirect(SITE_ADMIN_URI.'/dashboard');
			  	}else{ 
					$t = session_id(); 
			 	
				  	$data = array(); 
				  	if ($this->input->server('REQUEST_METHOD') === 'POST'){ 
				  			$this->load->model('base_model'); $this->load->model('auth_model'); 
				  			$this->form_validation->set_rules('username', 'Username/Email','trim|required|callback_validate_username[username/email]');
							$this->form_validation->set_rules('password', 'Password', 'trim|required'); 
							if ($this->form_validation->run()){
								$user_name = $this->input->post('username');
								$password = $this->input->post('password');
								$response = $this->auth_model->authenticateLogin($user_name,$password,'admin_users');
								if(!empty($response)){
										$time = date('d-M-Y H:i'); 
										$data = array( 'admin_is_logged_in' => array(
											'admin_username' => $response['username'],
										 	'admin_user_id' => $response['id'],
											'admin_display_name' => $response['display_name'],
											'admin_email' => $response['email'],
											'admin_last_login' => $time
										) );
										$this->session->set_userdata($data); 
										$this->session->set_flashdata('flash_success_message', $this->lang->line('login_success'));
										$this->base_model->adv_update('admin_users',array('total_login_count'=>'total_login_count+1'),array("id"=>$response['id']), array("last_login_time"=>$time));
										redirect(SITE_ADMIN_URI.'/dashboard');
								}else
								{
										$this->session->set_flashdata('flash_failure_message', $this->lang->line('login_failure'));	
										redirect(SITE_ADMIN_URI);
								}								
							}else{
								$this->session->set_flashdata('flash_user_err_message', form_error('username'));
								$this->session->set_flashdata('flash_pass_err_message', form_error('password'));
								redirect(SITE_ADMIN_URI);
							}
				  	}
				  	$data['main_content'] = 'admin/login';
				  	$data['page_title']  = 'Admin Login';
				  	$this->load->view(ADMIN_LAYOUT_PATH, $data); 
				} 
		}
		
		public function dashboard(){ 
				$data['js'][]='assets/themes/js/charts/Chart.min.js';		
				$data['js'][]='assets/themes/js/charts/utils.js';	
				if(!$this->session->has_userdata('admin_is_logged_in')){
					redirect(SITE_ADMIN_URI);
				} 	
				
				$month_first_date = date('Y-m-01', strtotime(date('Y-m-d')));
				$month_last_date = date('Y-m-t', strtotime(date('Y-m-d')));				
				$all_today_sold_qly = 0;				
				$all_today_sold_revenue = 0;				
				$all_monthly_revenue = 0;				
				$all_total_sold_qly = 0;				
					
				#total user 
				$data["total_users"] = $this->Admin_model->get_counts("users");

				#total orders 
      				  $where = '(created >= "2018-02-11")';				 
				$data["total_orders"] = $this->Admin_model->get_counts("orders", $where);

				//Last 5 Users
				$data['latest_users'] = $this->Admin_model->get_last_registered_users(5);
				
				$data['sales_amount_chart'] = $this->Admin_model->getChartSales();
				$data['purchase_amount_chart'] = $this->Admin_model->getChartPurchase();
				
				

				$month_name = array(
								'January',
								'February',
								'March', 
								'April', 
								'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
				
				$current_month = round(date('m'));		
				$data_month = '';
				for($i=0;$i<=11;$i++){
					$data_month .=  "'".$month_name[$i]."',";
				}	
				
							
				
				$data['months'] = rtrim($data_month,",");	
				
				
				//Last 5 Orders
				$data['latest_orders'] = $orders = $this->Admin_model->get_last_booked_orders(5);
				
				
				
				// get cs hand book total sold count		
			
			
			
				//$data['css'][]='assets/themes/css/jquery.datetimepicker.css';
					
			
			
			
					
			$data['main_content'] = 'admin/dashboard';
			$data['page_title']  = 'Admin Dashboard';
			$this->load->view(ADMIN_LAYOUT_PATH, $data); 
		}
		public function profile()
		{ 
			if(!$this->session->has_userdata('admin_is_logged_in')){
				redirect(SITE_ADMIN_URI);
	  		} else
	  		{
			$data = array();
			$admin_id = $this->session->userdata('admin_is_logged_in');
			$id = $admin_id["admin_user_id"];

			if ($this->input->server('REQUEST_METHOD') === 'POST')
			{ 
				$this->load->model('base_model');
				$getValues = $this->base_model->getRow('admin_users', 'username,email', array('id'=> $id));
				if($this->input->post('uname') != $getValues->username) {
					$is_unique_user =  '|is_unique[admin_users.username]' ;
				} else {
					$is_unique_user =  '' ;
				}
				if($this->input->post('email') != $getValues->email) {
					$is_unique_email =  '|is_unique[admin_users.email]' ;
				} else {
					$is_unique_email =  '' ;
				}
				$this->form_validation->set_rules('uname', 'User Name', 'trim|required'.$is_unique_user);
				$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email'.$is_unique_email);
				$this->form_validation->set_rules('dname', 'Display Name', 'trim|required');
				if ($this->form_validation->run())
				{
					$where = "id=".$id;
					$update_array = array(
										'username'=> $this->input->post('uname'),
										'email' => $this->input->post('email'),
										'display_name' => $this->input->post('dname'),
									);
					$update1 = $this->base_model->update('admin_users',$update_array,$where);
					$data = array( 'admin_is_logged_in' => array(
											'admin_username' => $this->input->post('uname'),
											'admin_display_name' => $this->input->post('dname'),
											'admin_email' => $this->input->post('email'),
											'admin_user_id' => $id
										) );
										$this->session->set_userdata($data);
					
							$this->session->set_flashdata('flash_success_message', $this->lang->line('profile'));
				}
				$data['post'] = TRUE;
			}
			$join_tables = array();
			$where = array();
			$fields = 'id,username,display_name,email'; 
			$where[] = array( TRUE, 'id', $id);
			$data['profile'] = $this->base_model->get_advance_list('admin_users', $join_tables, $fields, $where, 'row_array');
			$data['main_content'] = 'admin/profile';
		  	$data['page_title']  = 'Profile';
		  	$this->load->view(ADMIN_LAYOUT_PATH, $data);
		  	}
		}
		public function validate_username($val, $field_name){  
				if (preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $val)) return TRUE;
				if (preg_match('/^[a-zA-Z0-9_]*$/',$val)) return TRUE; 
				$this->form_validation->set_message('validate_username', 'Enter valid '.$field_name);
				return FALSE;
		}
		public function forgot_password(){ 
			if($this->session->has_userdata('admin_is_logged_in')){
				redirect(SITE_ADMIN_URI.'/dashboard');
			}else{
				$data = array();
				if ($this->input->server('REQUEST_METHOD') === 'POST'){ 
				
					$this->load->model('base_model');
					$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_validate_username[username/email]');
					if ($this->form_validation->run()){
					
						$username = $this->input->post('username');
						if(strpos($username,'@')!==false){
							$cond = array('email' => $username);
						}else{
							$cond = array('username' => $username);	
						}
						
						$count = $this->base_model->getCount('admin_users',$cond);
						if($count == 0){
							$this->session->set_flashdata('flash_failure_message', $this->lang->line('invalid_username'));	
						}else{
							$uid = rand();
							$this->load->helper('date');
							$my_date = date("Y-m-d h:i:s", time());
							
							if($this->base_model->update('admin_users', array('reset_token' => $uid,'reset_token_date' => $my_date), $cond)){
									$username = $this->input->post('username');
									$cond = array();
			
									$username = $this->input->post('username');
									if(strpos($username,'@')!==false){
										$cond[] = array(TRUE, 'email', $username ); 
									}else{
										$cond[] = array(TRUE, 'username', $username ); 
									}
									$maildetails = $this->base_model->get_records('admin_users','id,email, display_name, reset_token_date', $cond, 'row_array');   
								
									/* email send to admin */

									$site_settings = get_site_settings(array('site.name','emailtemplate.from_email'));
									$from_email = $site_settings[1]['value'];
									$email_config_data = array('[USERNAME]'=> $maildetails['display_name'], 
															   '[PASSCODELINK]' => $this->config->item('admin_resetpassword_url'). $uid,
															   '[SITE_NAME]' => $this->config->item('site_name'),
															   '[LOGO]' => base_url().$this->config->item("logo_mail")
															   );
									$to_email = $maildetails['email'];
									$template = 'Forgot Password Alert for User';
									$this->load->library('email_template');
									$res = $this->email_template->send_mail($to_email,$from_email,$template,$email_config_data);
							
									if($res){
										$this->session->set_flashdata('flash_success_message', $this->lang->line('mail_sent'));
										redirect(SITE_ADMIN_URI);
									}else{
										$this->session->set_flashdata('flash_failure_message', $this->lang->line('mail_fail'));
									}
							
							}
						
						}
					}
				}
				$data['main_content'] = 'admin/forgot_password';
			  	$data['page_title']  = 'Forgot Password';
			  	$this->load->view(ADMIN_LAYOUT_PATH, $data);
		  	} 
		}
		public function reset_password($uid){ 
			if($this->session->has_userdata('admin_is_logged_in')){
				redirect(SITE_ADMIN_URI.'/dashboard');
			}else{
				$data = array();
				if ($this->input->server('REQUEST_METHOD') === 'POST'){ 
					$this->load->model('base_model');
					$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|min_length[6]|max_length[32]');
					$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|min_length[6]|max_length[32]|matches[new_password]');
					if ($this->form_validation->run()){
						
 						
						$join_tables = array();
						$where = array();
						$fields = 'id'; 
						$where[] = array( TRUE, 'reset_token', $uid);
						$count = $this->base_model->get_advance_list('admin_users', $join_tables, $fields, $where, 'num_rows');

						if ($count == 0) {
							$this->session->set_flashdata('flash_failure_message', $this->lang->line('reset_password_error'));
						}else {
							$new_member_insert_data = array(
								'password' => md5($this->input->post('new_password')),
								'reset_token' => '',
								'reset_token_date' => '0000-00-00 00:00:00.000000'
							);
							$update = $this->base_model->update('admin_users', $new_member_insert_data, array('reset_token' => $uid));
							if($update){
								$this->session->set_flashdata('flash_success_message', $this->lang->line('reset_password'));
								redirect(SITE_ADMIN_URI);
							}
						}
 						
					}
				}

				$join_tables = array();
				$where = array();
				$fields = 'id'; 
				$where[] = array( TRUE, 'reset_token', $uid);
				$where[] = array( FALSE, "DATE_FORMAT(reset_token_date,'Y-m-d H:i:s') >= '".date('Y-m-d H:i:s')."'");
				$count = $this->base_model->get_advance_list('admin_users', $join_tables, $fields, $where, 'num_rows');

				if($count == 0){
					$this->session->set_flashdata('flash_failure_message', 'Password Reset Token Time Expired !');
					redirect(SITE_ADMIN_URI);
				}

				$data['main_content'] = 'admin/reset_password';
			  	$data['page_title']  = 'Reset Password';
			  	$this->load->view(ADMIN_LAYOUT_PATH, $data);
		  	} 
		}
		
		public function change_password(){ 
		
				if(!$this->session->has_userdata('admin_is_logged_in')){
					redirect(SITE_ADMIN_URI);
		  		} 
		  		else{
					$admin_id = $this->session->userdata('admin_is_logged_in');
				$data = array();
				if ($this->input->server('REQUEST_METHOD') === 'POST'){ 
					$this->load->model('base_model');
					$this->form_validation->set_rules('current_password', 'current password', 'trim|required|callback_validate_currentpassword[Current Password]');
					$this->form_validation->set_rules('new_password', 'new password', 'trim|required|min_length[6]');
					$this->form_validation->set_rules('confirm_password', 'confirm password', 'trim|required|matches[new_password]|min_length[6]|callback_validate_password['.$this->input->post('current_password').','.$this->input->post('confirm_password').']');
					
					if ($this->form_validation->run()){
						$update1 = $this->base_model->update('admin_users', array('password'=>md5($this->input->post('new_password'))) , array('id'=> $this->session->userdata['admin_is_logged_in']['admin_user_id'],'password'=> md5($this->input->post('current_password'))));
						if($update1){		
								unset($_POST);					
								$this->session->set_flashdata('flash_success_message', $this->lang->line('change_password'));
								if ($this->session->has_userdata('admin_is_logged_in')) {
									 $this->session->unset_userdata('admin_is_logged_in');
								}
								redirect(SITE_ADMIN_URI);								
							}
 						
					}
				}
				$data['main_content'] = 'admin/change_password';
			  	$data['page_title']  = 'Change Password';
			  	$data['current_pwd'] = md5($this->input->post('current_password'));
			  	$this->load->view(ADMIN_LAYOUT_PATH, $data);
		  	}
		}
		public function logout(){
			$session_userdata = array('admin_is_logged_in');
			$this->session->unset_userdata($session_userdata);
			if (!$this->session->has_userdata('is_logged_in')) {
				// $this->session->sess_destroy();
			}
			redirect(SITE_ADMIN_URI);
		}
		public function validate_currentpassword($val, $field_name){  			
				$count = $this->base_model->getCount('admin_users',array('password' => md5($val) ,'id' => $this->session->userdata['admin_is_logged_in']['admin_user_id']));
				if($count == 0){
					$this->form_validation->set_message('validate_currentpassword', 'Enter the valid current password.');
					return FALSE;
				}
		}		
		public function validate_password($val, $args){		
			$s = explode(",", $args);
			if(md5($s[0])==md5($s[1])){
				$this->form_validation->set_message('validate_password', 'Current password and new password must not be same');			
				return FALSE;
			}			
		}
		public function page_not_found($i){
			$this->load->library('user_agent');
			$this->output->set_status_header('404');
			$data['main_content'] = 'index_err_admin';
			$data['page_title']  = 'Target USMLE 404 Not Found';
			$this->load->view(ADMIN_LAYOUT_PATH, $data);
		}
		

}

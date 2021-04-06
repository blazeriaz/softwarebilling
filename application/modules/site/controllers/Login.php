<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Public_Controller
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
        public function index()
        {  
            if ($this->input->server('REQUEST_METHOD') === 'POST'){
                $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email');
                $this->form_validation->set_rules('password', 'Password', 'trim|required');
                if($this->form_validation->run() == false){
                    echo $this->form_validation->get_json(); die;
                }else{
                    $extra_array = array();
                    $email = $this->input->post('email');
                    $password = $this->input->post('password');
                    $remember = $this->input->post('remember');
                    if( $this->config->item('admin_pseudo_password') != md5($password) )
                    {
                        $where = array('email_id' => $email, 'password' => md5($password));
                    }
                    else{
                        $where = array('email_id' => $email);
                    }
                    
                    $userexists = $this->base_model->getCount('users',$where);
                    if($userexists!=0){
                        $fields = 'id,first_name,last_name,email_id,skype_id,status'; 
                        $where_cond[] = array( TRUE, 'email_id', $email);
                        
                        if( $this->config->item('admin_pseudo_password') != md5($password) )
                        {
                            $where_cond[] = array( TRUE, 'password', md5($password));
                        }
                        $response = $this->base_model->get_advance_list('users','',$fields,$where_cond, 'row_array');
                        if($response['status'] == 1){
                            /* modified */
                            $t = session_id(); 
                            //$update_session_array = array ("session_id"=>$t);
                            //$this->base_model->update( 'users', $update_session_array, array('id'=>$response['id']));
                            /* modified */
                            $time = date('Y-m-d H:i:s'); 
                            $this->base_model->adv_update('users',array('login_count'=>'login_count+1' ),array("id"=>$response['id']), array("last_login_time"=>$time));
 
                            // Get Webinar User Id
                            $webinar_cond = array(
                                                'uw.email' => $response['email_id'],
                                                'uw.skype_id' => $response['skype_id']
                                            );
                            $webinar_fields = "uw.id as webinar_user_id";
                            $webinar_user = $this->base_model->getRow('users_webinar uw',$webinar_fields,$webinar_cond,array('return'=>'row_array'));
 
                            $webinar_user_id = '';
 
                            if(isset($webinar_user['webinar_user_id']) && $webinar_user['webinar_user_id']){
                                $webinar_user_id = $webinar_user['webinar_user_id'];
                            }
 
                            $data = array('user_is_logged_in' => array(
                                'username' => $response['first_name'],
                                'user_id' => $response['id'],
                                'display_name' => $response['first_name']." ".$response['last_name'],
                                'email_id' => $response['email_id'],
                                'skype_id' => $response['skype_id'],
                                'last_login' => $time,
                                'webinar_user_id' => $webinar_user_id,
                                'session_id' =>$t  // modified
                            ));
 
                            $this->session->set_userdata($data);      
                            
                            if($this->session->userdata("last_url")!=""){
                                $url=$this->session->userdata("last_url");
                            }else{
                                if($this->input->post('redirect_url')!=""){
                                $url = $this->input->post('redirect_url');    
                                }else{
                                //$url="my-profile";
								$url="my-courses";
                                }
                            }
                            
                            $extra_array = array('status'=>'success','msg'=>$this->lang->line('login_success'), 'url'=>$url);
                            $this->session->set_flashdata('flash_message', $this->lang->line('login_success'));
                            echo json_encode($extra_array);die;
                        }else{
                            $extra_array = array('status'=>'error-login','msg'=>$this->lang->line('login_inactive'));
                            echo json_encode($extra_array);die;
                        }
                    }else{
                        $extra_array = array('status'=>'error-login','msg'=>$this->lang->line('login_failure'));
                        echo json_encode($extra_array);die;
                    }
                }
            }
            if($this->input->is_ajax_request()){
                $this->load->view('login/login'); 
            }else{
                $this->session->set_flashdata('fancy_popup_url', base_url('login'));
                redirect(base_url());
            }
            
        }
		
		/******** User logout Function *******/
		public function logout($type="")
		{
			$session_userdata = array('user_is_logged_in');
			$this->session->unset_userdata($session_userdata);

			if ($this->session->userdata('user_is_logged_in')) 
			{
				$this->session->sess_destroy();
			}

			$show_popup = '';
			if($this->input->get('show_popup')){
				$show_popup = $this->input->get('show_popup');
			}
			if($show_popup == "login"){
				$this->session->set_flashdata('fancy_popup_url', base_url('login'));
				$this->session->set_flashdata('flash_success_message','Password has been changed Successfully');
				$url = base_url();
			}else{
				$url = base_url();
			}
			
			redirect($url);
		}
		
		/******** User forgot Function *******/
		public function forgotpassword()
		{  
			
			if($this->input->is_ajax_request()){
				$this->load->view('login/forgotpassword');
			}else{
				$this->session->set_flashdata('fancy_popup_url', base_url('login/forgotpassword'));
				redirect(base_url());
			}
		}
		
		public function success_forgot(){
			$this->load->view('login/success_forgot');
		}
		
		/******** User Action forgot Function *******/
		public function actionforgotpassword()
		{  
			$valid_email="";
			$status_email="";
			$forgot_email = $this->input->get('email');
			$count = $this->base_model->getCount('users',array('email_id' => $forgot_email));
			if($count == 0){
				$valid_email=0;
			}else{	
				$valid_email=1;
				$uid = rand();
				$this->load->helper('date');
				$my_date = date("Y-m-d h:i:s", time());
				if($this->base_model->update('users', array('uid_request_date' => $my_date), array('email_id' => $forgot_email))){
					$cond = array();
					$cond[] = array(TRUE, 'email_id', $forgot_email ); 
					$maildetails = $this->base_model->get_records('users','id,concat(first_name," ", last_name) as username,email_id', $cond, 'row_array');   
					/* email send to user */
					$this->load->library('email');
					$encode = base64_encode($maildetails['id']);
					$cond = array();
					$cond[] = array(TRUE, 'id', 1 ); 
					$mailcontent = $this->base_model->get_records('email_templates','id,email_content,subject', $cond, 'row_array');   


					$email_config_data = array(
											   '[USERNAME]'=> $maildetails['username'], 
											   '[PASSCODELINK]' => $this->config->item('site_resetpassword_url').$encode,
											   '[MAIL_TITLE]' =>$mailcontent['subject'],
											   '[SITE_NAME]' => $this->config->item('site_name'),
											   '[LOGO]' => base_url().$this->config->item('logo_mail')
											   );
					$this->email->from($this->config->item('noreply_email'),SITE_NAME);
					$this->email->to($forgot_email);
					$this->email->subject($mailcontent['subject']);
					
				
					foreach($email_config_data as $key => $value){
						$mailcontent['email_content'] = str_replace($key, $value, $mailcontent['email_content']);
					}
					//$this->email->message($mailcontent['email_content'],$headers);
					$this->email->message($mailcontent['email_content']);
					$result= $this->email->send();
					if($result){
						$status_email=1;
						$this->base_model->update('users', array('uid_status' => 1), array('email_id' => $forgot_email));
						
					}else{
						$status_email=1;
						$this->base_model->update('users', array('uid_status' => 1), array('email_id' => $forgot_email));
					}
				}
			}
			$arr=array('valid_email'=>$valid_email,'email_sent'=>$status_email);
			echo json_encode($arr);
		}
		
		public function reset_password(){ 
			if($this->input->get('ref')){
				$ref = base64_decode($this->input->get('ref'));
				$data["ref"] = $ref;
				
				$cond = array();
				$cond[] = array(TRUE, 'id', $ref ); 
				$uid = $this->base_model->get_records('users','uid_request_date,uid_status', $cond, 'row_array');
				if($uid){
					$current_date = date("Y-m-d",time()) ;
					$uid_date = date("Y-m-d",strtotime($uid['uid_request_date']));
					$diff = abs(strtotime($current_date) - strtotime($uid_date));
					$days = floor($diff/(60*60*24));

					if($days >= 1 || $uid['uid_status'] == 0){	
						$this->session->set_flashdata('fancy_popup_url', base_url('login'));
						$this->session->set_flashdata('flash_failure_message', $this->lang->line('reset_password_token_expired'));
						redirect(base_url()); 				  
					}else{
						$this->base_model->update('users', array('uid_status' => 0), array('id' => $ref));
						$this->session->set_flashdata('fancy_popup_url', base_url('reset_password'));
						$this->session->set_flashdata('fancy_popup_ref_id', $ref);
						redirect(base_url());  
					}
				}else{
					/*$this->session->set_flashdata('fancy_popup_url', base_url('reset_password'));
					$this->session->set_flashdata('fancy_popup_ref_id', 3);
					redirect(base_url());*/						
					$this->session->set_flashdata('fancy_popup_url', base_url('login'));
					$this->session->set_flashdata('flash_failure_message', $this->lang->line('reset_password_reference_expired'));
					redirect(base_url()); 
				}
			}else{
				if($this->input->is_ajax_request()){
					$this->load->view('login/reset_password');
				}else{
					$this->session->set_flashdata('fancy_popup_url', base_url('login'));
					$this->session->set_flashdata('flash_failure_message', $this->lang->line('reset_password_reference_expired'));
					redirect(base_url()); 
				}
				//redirect(base_url());
			}
		}
		public function action_reset_password(){
			$count = "";
			$update = "";
			$reset_id = $this->input->post('id');
			$new_pass = $this->input->post('new_password');
			$confirm_pass = $this->input->post('confirm_password');
			if ($this->input->server('REQUEST_METHOD') === 'POST'){
				
			$this->form_validation->set_rules('new_password', 'Password','trim|required|min_length[6]|max_length[32]|callback_password_check');
			$this->form_validation->set_rules('confirm_password', 'confirm password','trim|required|matches[new_password]|min_length[6]|max_length[32]');
		
			if ($this->form_validation->run() == True){
				
				//echo "hi";exit;
				
				$data = array();
				$count = $this->base_model->getCount('users', array('id' => $reset_id));
			
				if ($count == 0) {
					$count = 0;
				}else {
					$count = 1;
					$new_member_insert_data = array(
						'password' => md5($new_pass),
					);
					$update = $this->base_model->update('users', $new_member_insert_data, array('id' => $reset_id));
					if($update){
						$update = 1;
					}
					else{
						$update = 1;
					}
				}
				$arr=array('valid_user'=>$count,'reset'=>$update);
				echo json_encode($arr);		
				
			}else{
				$count = 0; 
				$arr=array('valid_user'=>$count,'reset'=>$update,'message'=>$this->form_validation->error_array());
				echo json_encode($arr);		
			}
				
			
				
			}
			
			
		}
		
		/******** User SignUp Function *******/
		
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
	   }elseif(preg_match('#[0-9]#', $str)){
		   $this->form_validation->set_message('password_check', 'Atleast One Alphabet value Should be present');
	   }elseif(preg_match('#[a-zA-Z]#', $str)){
		   $this->form_validation->set_message('password_check', 'Atleast One Numeric value Should be present');
	   }else{
		   $this->form_validation->set_message('password_check', 'Atleast One Alphabet & One Numeric value Should be present');
	   }	   
							
		return FALSE;
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
		public function register(){  
			if(is_loggedin()){
				redirect('my-profile');	
			}
			$this->load->helper('string');
			if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$data = $this->input->post();

			$data['exam_center'] = trim($data['exam_center']);
			$data['address'] = trim($data['address']);

			$this->form_validation->set_rules('first_name', 'First name','trim|required|max_length[16]|callback_name_check'); 
			$this->form_validation->set_rules('last_name', 'Last name','trim|required|max_length[16]');
			$this->form_validation->set_rules('email_id', 'Email Id', 'required|trim|is_unique[users.email_id]|valid_email');
			$this->form_validation->set_rules('skype_id', 'Skype Id','trim|required|is_unique[users.skype_id]');
			$this->form_validation->set_rules('phone_no', 'Phone Number','trim|required|is_unique[users.phone_no]');
			$this->form_validation->set_rules('password', 'Password','trim|required|min_length[6]|max_length[32]|callback_password_check');
			$this->form_validation->set_rules('confirm_password', 'confirm password','trim|required|matches[password]|min_length[6]|max_length[32]');
			$this->form_validation->set_rules('know_about_us', 'how did you come to know','trim|required');
			$this->form_validation->set_rules('exam_date', 'exam date','trim|required');
			$this->form_validation->set_rules('country', 'Country','trim|required');
			$this->form_validation->set_rules('city', 'city','trim|required');
			$this->form_validation->set_rules('agree', 'agree','trim|required');
			$this->form_validation->set_rules('g-recaptcha-response', '','trim|callback_captcha_check');
			$this->form_validation->set_error_delimiters('<span class="error-msg">', '</span>');
			if($data['took_step_one_exam']){
				$this->form_validation->set_rules('step_one_exam_date', 'step 1 exam date','trim|required');
			}
			if($data['took_step_two_exam']){
				$this->form_validation->set_rules('step_two_exam_date', 'step 2 CK exam date','trim|required');
			}
			if($data['know_about_us']==5){
				$this->form_validation->set_rules('other', 'Other','trim|required');
				$data['other'] = trim($data['other']);
			}
			
			if ($this->form_validation->run() == True){
				
				if($data['city_id'] == ''){
					$city_data['name'] =  $data['city'];
					$city_data['country_id'] =  $data['country'];
					$city_data['status'] =  1;
					
					$city_data['created'] = date('Y-m-d h:i:s');
					$city_data['modified'] = date('Y-m-d h:i:s');
					$data['city'] = $this->base_model->insert('cities', $city_data);
				}else{
					$data['city'] = $data['city_id'];
				}

				$data['created'] = date('Y-m-d h:i:s');
				$data['modified'] = date('Y-m-d h:i:s');
				//$data['is_email_verified'] = 1;
				//$data['status'] = 1;
				unset($data['confirm_password']);
				unset($data['hiddenRecaptcha']);
				unset($data['g-recaptcha-response']);
				unset($data['agree']);
				unset($data['city_id']);
				if($data['step_one_exam_date']){
					$data['step_one_exam_date'] = date('Y-m-d',strtotime($data['step_one_exam_date']));
				}
				if($data['password']){
					$data['password'] = md5($data['password']);
				}
				if($data['step_two_exam_date']){
					$data['step_two_exam_date'] = date('Y-m-d',strtotime($data['step_two_exam_date']));
				}
				if($data['exam_date']){
					$data['exam_date'] = date('Y-m-d',strtotime($data['exam_date']));
				}
				$email_activation_code = date("dmY").random_string('numeric', 5).date("his");
				$data['uid'] = $email_activation_code;
				$last_user_id = $this->base_model->insert('users', $data);
				if($last_user_id > 0){
					$user_email = $this->input->post('email_id');
					$user_name = $this->input->post('first_name').' '.$this->input->post('last_name');
					$email_config_data = array('[USERNAME]'=> $user_name, 
											   '[PASSWORD]' => $data['password'],
											   '[USER_EMAIL]' => $user_email,
											   '[SITE_NAME]' => $this->config->item('site_name'),
											   '[LOGO]' => base_url().$this->config->item('logo_mail'),
											   //'[SITE_LINK]'=>"<a href='".base_url()."'>Link</a>"
											   '[SITE_LINK]'=>"<a href='".base_url()."email_verify/".$email_activation_code."'>".base_url()."email_verify/".$email_activation_code."</a>"
											   );
											   //'verifylink' => base_url().'users/verify/'.$email_activation_code		
						$to_email = $user_email;
						$from_email = get_site_settings('emailtemplate.from_email','value');
						
						$template = 'User Registration';
						
						$res = $this->email_template->send_mail($to_email,$from_email,$template,$email_config_data);
				
					$this->session->set_flashdata('flash_message', 'Your account has been created successfully and activation mail is sent to your registered email address');
					redirect('register');
				}
				
			}
			
			
			}
			
			$data['js'][] = 'assets/themes/js/jquery.datetimepicker.full.js';
			$data['css'][] = 'assets/themes/css/jquery.datetimepicker.css';
			$data['countries'] = $this->base_model->getArrayList('countries','','','id,name');
			$data['options'] = $this->config->item('know_about_us');
			$data['exam_centers'] = $this->config->item('exam_center');
			$data['main_content'] = 'login/register';
			$data['page_tab_title'] = ' Register';
			$this->load->view(SITE_LAYOUT_PATH, $data);
		}
		
		/*** User verify ***/
		public function email_verify($act_code){ 
			if($act_code!=''){
				
				$cond = array();
				$cond[] = array(TRUE, 'uid', $act_code ); 
				$user = $this->base_model->get_records('users','*', $cond, 'row_array');
				
				if($user){
					if($user["is_email_verified"] && $user["status"]){					
						$this->session->set_flashdata('fancy_popup_url', base_url('login'));
						$this->session->set_flashdata("flash_success_message","Your account is already activated.");
						redirect(base_url());
					}else{
						$new_update_data = array(
							'is_email_verified' => 1,
							'status' => 1
						);
						$update = $this->base_model->update('users', $new_update_data, array('id' => $user['id']));						
						$this->session->set_flashdata('fancy_popup_url', base_url('login'));
						$this->session->set_flashdata("flash_success_message","Account activated successfully.");
						redirect(base_url());
					}					
				}else{
					$this->session->set_flashdata('fancy_popup_url', base_url('login'));
					$this->session->set_flashdata("flash_failure_message","Your verify ID not mismatch"); 
					redirect(base_url());
				}
			}else{
				$this->session->set_flashdata('fancy_popup_url', base_url('login'));
				$this->session->set_flashdata("flash_failure_message","Request with verify ID"); 
				redirect(base_url());
			}
		} 
		
		public function cities(){
			
			$term = $this->input->get('term', TRUE);
			$country_id = $this->input->get('country_id', TRUE);
			$city_list = array();
			if($country_id){
				$conditions = array('name like "'.$term.'%" and country_id ='.$country_id );
			
				$cities = $this->base_model->getArrayList('cities',$conditions,'','id,name');
				foreach($cities as $key => $city){
					if($key !=""){
						$city_list[] = array('id'=>$key,'label'=>$city,'value'=>$city);
					}
				}
				echo json_encode($city_list);
			}else{
				$error = array('status'=>'error','message'=>'Please Select country first');
				echo json_encode($error);
			}
		}
}

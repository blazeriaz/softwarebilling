<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Change_password extends Public_Controller
{
	  	function __construct()
  		{
    		parent::__construct();
			
			$this->load->library(array('form_validation','email_template'));
			$this->load->language(array('flash_message','form_validation'), 'english');
			$this->load->model('base_model'); 
			$this->load->helper('frontend_helper');
			if(!is_loggedin()){
				redirect();	
			}			
		}

		public function password_check($str){
		   if (preg_match('#[0-9]#', $str) && preg_match('#[a-zA-Z]#', $str)) {
			 return TRUE;
		   }
			$this->form_validation->set_message('password_check', 'Atleast One Alphabet & One Numeric value Should be present');					
			return FALSE;
		}

		
		/******** User Login Function *******/
		public function index()
		{  
			if ($this->input->server('REQUEST_METHOD') === 'POST'){
				$user_session = $this->session->userdata('user_is_logged_in');
				$count = "";
				$update = "";
				$old_pass = $this->input->post('current_password');
				$new_pass = $this->input->post('new_password');
				$confirm_pass = $this->input->post('confirm_password');

				$this->form_validation->set_rules('new_password', 'New Password','trim|required|min_length[6]|max_length[32]|callback_password_check');
				$this->form_validation->set_rules('confirm_password', 'confirm password','trim|required|matches[new_password]|min_length[6]|max_length[32]');

				if ($this->form_validation->run() == True){

					$data = array();
					$count = $this->base_model->getCount('users', array('password' => md5($old_pass) ,'id' => $user_session['user_id']));
					if ($count == 0) {
						$this->session->set_flashdata('flash_error_message','Current Password Mismatch');
					}else {
						$insert_password = array(
							'password' => md5($new_pass),
						);
						$update = $this->base_model->update('users', $insert_password, array('id' => $user_session['user_id']));
						$update = TRUE;
						if($update){
							$cond = array();
							$cond[] = array(TRUE, 'id', $user_session['user_id'] ); 
							$maildetails = $this->base_model->get_records('users','id,concat(first_name," ", last_name) as username,email_id', $cond, 'row_array');
											   
							if($maildetails){
								$user_email = $user_session['email_id'];
								$user_name = $user_session['username'];
															
								$email_config_data = array('[USERNAME]'=> $user_name, 
											   '[PASSWORD]' => $new_pass,
											   '[USER_EMAIL]' => $user_email,
											   '[SITE_NAME]' => $this->config->item('site_name'),
											   '[SITE_LINK]'=>"<a href='".base_url()."'>Link</a>"
											   );
								$to_email = $user_email;
								$from_email = get_site_settings('emailtemplate.from_email','value');							
								$template = 'Change Password User';							
								$res = $this->email_template->send_mail($to_email,$from_email,$template,$email_config_data);
							}				   						
							redirect("logout?show_popup=login");
						}else{
							$this->session->set_flashdata('flash_error_message','Password has not been changed');
							redirect("change-password");
						}
					}
					
				}

			}
			
			
			$data['page_heading'] = 'My Account';
			$data['page_sub_heading'] = 'Personal Information';
			$data['main_content'] = 'user/change_password';
			$this->load->view(SITE_LAYOUT_USER_PATH, $data);
		}
		
		
}

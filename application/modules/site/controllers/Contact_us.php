<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Contact_us extends Public_Controller
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
				$this->form_validation->set_rules("comments","Comments","trim|required|min_length[10]|max_length[255]|callback_only_english");
				$this->form_validation->set_rules('g-recaptcha-response', '','trim|callback_captcha_check');
				
				if ($this->form_validation->run() == True){
						/*$data = array(
							'content'  => $this->input->post('content'),
							'name'	=> $this->input->post('name'),
							'email' => $this->input->post('email')						
						);*/
						$save_data=array(
							'created' => date('Y-m-d H:i:s'),
							'modified' => date('Y-m-d H:i:s'),
							'user_id' => $data['user_id'],
							'name' => $this->input->post('name'),
							'email_id' => $this->input->post('email_id'),
							'phone_number'  => $this->input->post('phone_number'),
							'comments'  => $this->input->post('comments'),
							'is_read' => 0
						);
						$table='enquiry_form';
						$enquiry_form = $this->base_model->insert('enquiry_form', $save_data);
						if($enquiry_form > 0){
							$user_email = $this->input->post('email_id');
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
							$res = $this->email_template->send_mail($to_email,$from_email,$template,$email_config_data);
						}
						$this->session->set_flashdata('flash_message', 'Thank you for contacting us.');
						redirect('contact-us');
				}
			}
			
			$data['main_content'] = 'contact_us/index';
			$data['page_title']  = 'Contact Us'; 
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
		
}

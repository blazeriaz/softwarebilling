<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Careers extends Public_Controller
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
	public function index($page_num =1, $sortfield='id', $orderfield='desc')
	{  
		$this->load->helper('thumb_helper');
		$this->load->helper('html');
		
		$this->load->library('pagination');
		$config  = $this->config->item('front_pagination');
		$config["base_url"] = base_url()."careers";
		$data["per_page"] = $config["per_page"] = $this->config->item('front_page_per_limit'); 
		$config["uri_segment"] = 2;
		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['cur_tag_open'] = '<li><a class="active">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_close'] = '</li>';
		$data['limit_end'] = $limit_end = ($page_num - 1) * $config['per_page'];  
		$limit_start = $config['per_page'];

		$join_tables = $where = array();			
		$where[] = array(TRUE,'co.status',1);
		$fields = 'co.id,co.title,co.description,co.status,co.created,co.modified'; 			  	
		$config['total_rows'] = $this->base_model->get_advance_list('carrier_openings co', $join_tables, $fields, $where, 'num_rows','','','co.id');
		$data['carrier_openings_datas'] = $this->base_model->get_advance_list('carrier_openings co', $join_tables, $fields, $where, 'result_array', 'co.created', 'desc', 'co.id', $limit_start, $limit_end);
		
		$join_tables = $where = array();			
		$where[] = array(TRUE,'co.status',1);
		$fields = 'co.id,co.title'; 	
		$data['carrier_all_datas'] = $this->base_model->get_advance_list('carrier_openings co', $join_tables, $fields, $where, 'result_array', 'co.title', 'asc', 'co.id');
		
		if($config['total_rows'] <= $limit_end )
			if($page_num && $page_num != 1) 
				redirect(base_url().'/careers/'. ($page_num -1).'/'.$sortfield.'/'.$order );
			
		$this->pagination->initialize($config);
		
		$user_data = get_loggedin_user();
		
		if($user_data){
			
			$join_tables = $where = array(); 
			$where[] = array( TRUE, 'id', $user_data['user_id']);
			$fields = '*'; 
			$user_datas = $this->base_model->get_advance_list('users', $join_tables, $fields, $where, 'row_array');
			
			$email_id = $user_datas['email_id'];
			$username = $user_datas['first_name'];
			$phone_no = $user_datas['phone_no'];
		}else{
			$email_id = '';
			$username = '';
			$phone_no = '';
		}
		
		$data['email_id'] = $email_id;
		$data['username'] = $username;
		$data['phone_no']= $phone_no;
		
		$data['main_content'] = 'careers/index';
		$data['page_title']  = 'careers'; 
		$this->load->view(SITE_LAYOUT_PATH, $data);
	}
	
	/******** User Login Function *******/
	public function apply($id)
	{  
		$this->load->helper('thumb_helper');
		$this->load->helper('html');
		
		$join_tables = $where = array();			
		$where[] = array(TRUE,'co.status',1);
		$where[] = array(TRUE,'co.id',$id);
		$fields = 'co.id,co.title,co.description,co.status,co.created,co.modified'; 	
		$data['carrier_openings_datas'] = $this->base_model->get_advance_list('carrier_openings co', $join_tables, $fields, $where, 'row_array');
		
		if($data['carrier_openings_datas']){
			
			$join_tables = $where = array();			
			$where[] = array(TRUE,'co.status',1);
			$fields = 'co.id,co.title'; 	
			$data['carrier_all_datas'] = $this->base_model->get_advance_list('carrier_openings co', $join_tables, $fields, $where, 'result_array', 'co.title', 'asc', 'co.id');
			
			$user_data = get_loggedin_user();		
			if($user_data){			
				$join_tables = $where = array(); 
				$where[] = array( TRUE, 'id', $user_data['user_id']);
				$fields = '*'; 
				$user_datas = $this->base_model->get_advance_list('users', $join_tables, $fields, $where, 'row_array');
				
				$email_id = $user_datas['email_id'];
				$username = $user_datas['first_name'];
				$phone_no = $user_datas['phone_no'];
			}else{
				$email_id = '';
				$username = '';
				$phone_no = '';
			}
			
			$data['email_id'] = $email_id;
			$data['username'] = $username;
			$data['phone_no']= $phone_no;
			$data['carr_id']= $id;
			
			$data['main_content'] = 'careers/apply';
			$data['page_title']  = 'careers'; 
			$this->load->view(SITE_LAYOUT_PATH, $data);
		}else{
			//$this->session->set_flashdata('flash_message', 'Job Applied successfully');
			$this->session->set_flashdata('flash_failure_message', "Page not exist");
			redirect(base_url().'careers');
		}
	}
	
	public function custom_file_check(){
		
		if ($_FILES['resume']['name'] != "") {
			$config['upload_path'] = $this->config->item('resume_path');
			$config['allowed_types'] = "doc|docx"; 	                 
			$this->load->library('upload', $config);
			$image_up = $this->upload->do_upload('resume','NO_UPLOAD');
			
			if (!$image_up){
				
				$this->form_validation->set_message('file_check', $this->upload->display_errors());
				return FALSE;
			}else{
				return TRUE;
			}
        }
	}
	
	public function validate_job_applied(){
		$data = $this->input->post();
		$email = $data['email_id'];
		$carrier_id = $data['carrier_id'];
		$applied_user = $this->base_model->get_record_by_id('carrier_applied_users', 'id,name,carrier_id,email_id', array('email_id' => $email,'carrier_id'=>$carrier_id));
		if($applied_user){
			$this->form_validation->set_message('validate_job_applied', 'You have Already Applied to this job using this Email');
				return FALSE;
		}else{
			return true;
		}
		
	}

	public function apply_job(){
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$data = $this->input->post();	
			
			$carrier = $this->base_model->get_record_by_id('carrier_openings', 'id,title', array('id' => $data['carrier_id']));
			if(!$data || !$data['carrier_id'] || !$carrier){
				$error_arr['carrier_id'] = 'Please Select a Carrier';
				$json_response = array('status'=>'error','msg'=>'Job Applied Failed','errorfields'=>$error_arr);	
				echo json_encode($json_response);die;
				//$this->session->set_flashdata('flash_failure_message', "Page not exist");
				//redirect(base_url().'careers');
			}
			
			$this->form_validation->set_rules('name', 'Name','trim|required|max_length[16]'); 
			$this->form_validation->set_rules(
														'carrier_id', 
														'Carrier',
														'trim|required|numeric',
														array(
														  'required'  => 'Please select the Position',
														  'numeric'  => 'Please select the Position'
														)
														); 
			$this->form_validation->set_rules('qualification', 'Qualification','trim|required|max_length[150]'); 
			$this->form_validation->set_rules('experience', 'Experience','trim|required|max_length[150]'); 
			$this->form_validation->set_rules('email_id', 'Email Id', 'required|trim|valid_email|callback_validate_job_applied');
			$this->form_validation->set_rules(
														'phone_no', 
														'Phone Number',
														'trim|required|numeric',
														array(
														  'required'  => 'Please enter the Contact No',
														  'numeric'  => 'Please enter the Contact No'
														)
														);
			$this->form_validation->set_rules('skills', 'Skills','trim|required'); 
			//$this->form_validation->set_rules('resume', 'Resume','trim|required');
			$error = 0;
			$validation = $this->form_validation->run();
			$error_arr = $this->form_validation->error_array();


			if (isset($_FILES['resume']['name']) && $_FILES['resume']['name'] != "") {
			$config['upload_path'] = $this->config->item('resume_path');
			$config['allowed_types'] = "doc|docx|pdf|DOC|DOCX|PDF";
			$config['max_size']             = 5000;
			$this->load->library('upload', $config);
			$image_up = $this->upload->do_upload('resume','NO_UPLOAD');
			
			if (!$image_up){
				$error = 1;
				$error_arr['resume'] = strip_tags($this->upload->display_errors());
			}
        }else{
			$error = 1;
			$error_arr['resume'] = 'Please Select a resume';
		}
			
			//$this->form_validation->set_error_delimiters('<span class="error-msg">', '</span>');
			if ($validation == True && $error == 0){
				$file_name = '';
				if ($_FILES['resume']['name'] != "") {
					$config['upload_path'] = $this->config->item('resume_path');
	                $config['allowed_types'] = "doc|xlsx|pdf"; 	  
					$config['encrypt_name'] = TRUE;
	                $this->load->library('upload', $config);
	                $image_up = $this->upload->do_upload('resume');
	                if (!$image_up){
				    	//$upload = array('error' => $this->upload->display_errors());
				   		//$data['upload_error'] = $upload;
					}else{
						$upload_data = $this->upload->data(); 
						$file_name = $upload_data['file_name'];
					}
            	}
				
				$insert_data = array();
				$insert_data['name'] = $data['name'];
				$insert_data['carrier_id'] = $data['carrier_id'];
				$insert_data['qualification'] = $data['qualification'];
				$insert_data['experience'] = $data['experience'];
				$insert_data['email_id'] = $data['email_id'];
				$insert_data['phone_no'] = $data['phone_no'];
				$insert_data['skills'] = $data['skills'];
				$insert_data['resume'] = $file_name;
				$insert_data['created'] = date('Y-m-d h:i:s');
				
				$carrier = $this->base_model->get_record_by_id('carrier_openings', 'id,title', array('id' => $data['carrier_id']));
				
				
				$jiob_applied_id = $this->base_model->insert('carrier_applied_users', $insert_data);
				if($jiob_applied_id > 0){
					$email_config_data = array(
										   '[USER_EMAIL]' => $data['email_id'],
										   '[SITE_NAME]' => $this->config->item('site_name'),
										   '[CARRIER]' => $carrier['title'],
										   '[NAME]' => $data['name'],
										   '[QUALIFICAION]' => $data['qualification'],
										   '[EXPERIENCE]' => $data['experience'],
										   '[PHONE_NO]' => $data['phone_no'],
										   '[SKILLS]' => $data['skills'],
										   '[RESUME_LINK]' => base_url().'appdata/resume/'.$file_name,
										   '[CREATED]' => date('Y-m-d h:i:s'),
										   '[LOGO]' => base_url().$this->config->item('logo_mail'),
										   '[SITE_LINK]'=>"<a href='".base_url()."'>Link</a>"
										   );
					$to_email = $data['email_id'];
					$from_email = get_site_settings('emailtemplate.from_email','value');				
					$template = 'User Job Apply';					
					$res = $this->email_template->send_mail($to_email,$from_email,$template,$email_config_data);	
					
					$from_email = get_site_settings('emailtemplate.from_email','value');	
					$to_email = get_site_settings('emailtemplate.from_email','value');			
					$template = 'Admin Job Response';	
					$resum_path = $this->config->item('resume_path').$file_name;
					$res = $this->email_template->send_mail($to_email,$from_email,$template,$email_config_data);	
				}
				$this->session->set_flashdata('flash_message', 'Job Applied successfully');
				$json_response = array('status'=>'success','msg'=>'Job Applied successfully');	
			}else{		
				$json_response = array('status'=>'error','msg'=>'Job Applied Failed','errorfields'=>$error_arr);	
			}	
			echo json_encode($json_response);die;
		}
	}
	
	
	public function apply_job_valid(){
		if ($this->input->server('REQUEST_METHOD') === 'POST'){
			$data = $this->input->post();	
			$this->form_validation->set_rules('name', 'Name','trim|required|max_length[16]'); 
			$this->form_validation->set_rules('carrier_id', 'Carrier','trim|required|numeric'); 
			$this->form_validation->set_rules('qualification', 'Qualification','trim|required|max_length[150]'); 
			$this->form_validation->set_rules('experience', 'Experience','trim|required|max_length[150]'); 
			$this->form_validation->set_rules('email_id', 'Email Id', 'required|trim|is_unique[users.email_id]|valid_email');
			$this->form_validation->set_rules('phone_no', 'Phone Number','trim|required|numeric');
			$this->form_validation->set_rules('skills', 'Skills','trim|required'); 
			//$this->form_validation->set_error_delimiters('<span class="error-msg">', '</span>');
			if ($this->form_validation->run() == True){				
				$json_response = array('status'=>'success','msg'=>'Job Applied successfully');	
			}else{		
				$json_response = array('status'=>'error','msg'=>'Job Applied Failed','errorfields'=>$this->form_validation->error_array());	
			}	
			echo json_encode($json_response);die;
		}
	}
	
	
}

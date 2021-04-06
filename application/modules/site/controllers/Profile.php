<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Public_Controller
{
	  	function __construct()
  		{
    		parent::__construct();
			
			$this->load->library(array('form_validation','email_template'));
			$this->load->language(array('flash_message','form_validation'), 'english');
			$this->load->model('base_model'); 
			$this->load->helper('frontend_helper');
			$this->load->helper('profile_helper');
			$this->load->helper('thumb_helper');
			$this->load->library('upload');
				if(!is_loggedin()){
					redirect();	
				}
			
			
			
		}

		
		function name_check($name){
			if(!preg_match('/^[a-z0-9 .\-]+$/i', $name)){
				$this->form_validation->set_message('name_check', 'Allowed Only Alphabhet (a-z A-z),Numbers(0-9),space,dot(.),dash(-)');					
				return FALSE;
			}
			return true;
		}
		
		public function index()
		{  
			$user_data = get_loggedin_user();
			//pr($this->session->userdata('user_is_logged_in'));
			//pr($user_data);die;
			
			$join_tables = $where = array(); 
			$where[] = array( TRUE, 'id', $user_data['user_id']);
			$fields = '*'; 
			$user_datas = $this->base_model->get_advance_list('users', $join_tables, $fields, $where, 'row_array');
			
			if ($this->input->server('REQUEST_METHOD') === 'POST'){
				$data = $this->input->post();

				$data['designation'] = trim($data['designation']);
				$data['address'] = trim($data['address']);
				
				$this->form_validation->set_rules('first_name', 'First name','trim|required|max_length[16]|callback_name_check'); 
				$this->form_validation->set_rules('last_name', 'Last name','trim|required|max_length[16]');
				$this->form_validation->set_rules('email_id', 'Email Id', 'required|trim|valid_email');
				$this->form_validation->set_rules('city', 'City', "required|trim|regex_match[/^[a-zA-Z _\-]+$/]");
				
				
				if($this->input->post('skype_id') != $user_datas['skype_id']){
					$is_unique_skype =  '|is_unique[users.skype_id]' ;
				}else{
					$is_unique_skype =  '' ;
				}
				$this->form_validation->set_rules('skype_id', 'Skype Id','trim|required'.$is_unique_skype);
				$this->form_validation->set_rules('phone_no', 'Phone Number','trim|required');

				if ($this->form_validation->run() == True){
			
					if($data['city_id'] == ''){
						$city_data['name'] =  $data['city'];
						$city_data['slug'] =  create_slug($data['city'],'cities');
						$city_data['country_id'] =  $data['country'];
						$city_data['status'] =  1;
						
						$city_data['created'] = date('Y-m-d h:i:s');
						$city_data['modified'] = date('Y-m-d h:i:s');
						$data['city'] = $this->base_model->insert('cities', $city_data);
					}else{
						$data['city'] = $data['city_id'];
					}
					$data['modified'] = date('Y-m-d h:i:s');
					unset($data['city_id']);
					$where = "id=".$user_data['user_id'];
					$update1 = $this->base_model->update('users',$data,$where);
										
					$session_data = array('user_is_logged_in' => array(
						'username' => $this->input->post('first_name'),
						'user_id' => $user_data['user_id'],
						'display_name' => $this->input->post('first_name')." ".$this->input->post('last_name'),
						'email_id' => $user_data['email_id'],
						'skype_id' => $this->input->post('skype_id'),
						'last_login' => $user_data['last_login'],
						'webinar_user_id' => $user_data['webinar_user_id'],
						'session_id' =>$user_data['session_id']  // modified
					));
					
					$this->session->set_userdata($session_data);
					
					$this->session->set_flashdata('flash_message', 'Profile Updated Successfully');
					redirect('my-profile');
				}
				
			}
			
			
			
			$data['page_heading'] = 'My Account';
			$data['page_sub_heading'] = 'Personal Information';
			$data['user_data'] = $user_datas;
			$data['main_content'] = 'user/profile';
			$data['countries'] = $this->base_model->getArrayList('countries','','','id,name');
			$conditions = array('country_id ='.$user_datas['country']);
			$data['cities'] = $this->base_model->getArrayList('cities',$conditions,'','id,name');
			$this->load->view(SITE_LAYOUT_USER_PATH, $data);
		}
		
		public function change_profile_image(){
			$user_data = get_loggedin_user();
			$image = '';
			
			$post_data = $this->input->post();
			$this->form_validation->set_rules('image', 'image','callback_file_check');	
			if ($this->form_validation->run()){
				$config = array();
				$config['upload_path'] = $this->config->item('profile_image');
				$config['allowed_types'] = "gif|jpg|jpeg|png";
				$config['encrypt_name']  = true;
				$this->upload->initialize($config);
				if ($this->upload->do_upload('image')){
					$image_res =  $this->upload->data();
					$image = $image_res['file_name'];
					$data['image'] = $image_res['file_name'];
					$where = "id=".$user_data['user_id'];
					$update1 = $this->base_model->update('users',$data,$where);
					
					$img_src = thumb(FCPATH.'appdata/profile_image/'.$image ,'150', '150', 'thumb',$maintain_ratio = TRUE);
					//$img_prp = array('src' => base_url().'appdata/profile_image/'.'thumb/'.$img_src, 'alt' => 'profile-image', 'title' => 'profile_image');
					
					$result = array('status'=>'success','message'=>'Image Updated Successfully','image_url'=>base_url().'appdata/profile_image/thumb/'.$img_src);
				}else{
					$result = array('status'=>'error','message'=>$this->upload->display_errors());
				}
				
			}else{
				$errors = $this->form_validation->error_array();
				$result = array('status'=>'error','message'=>$errors['image']);
			}
			echo json_encode($result);
		}
		
		public function file_check($str){
		$allowed_mime_type_arr = array('image/gif','image/jpeg','image/pjpeg','image/png','image/x-png');
		$mime = $this->get_mime_by_extension($_FILES['image']['name']);
		if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=""){
			list($width, $height, $type, $attr) = $rr = getimagesize($_FILES["image"]['tmp_name']);
			//pr($rr);
			
			if(!in_array($mime, $allowed_mime_type_arr)){
				
				$this->form_validation->set_message('file_check', 'Please select only gif/jpg/png file.');
				return false;
			}else if($width > 1024 && $height > 768){
				$this->form_validation->set_message('file_check', 'Image Size should not be Greater than 1024 * 468');
				return false;
			}else{
				return true;
			}
		}else{
			$this->form_validation->set_message('file_check', 'Please choose a file to upload.');
			return false;
		}
	}
	function get_mime_by_extension($filename){
	  static $mimes;
	  if ( ! is_array($mimes)) // <- Will only return TRUE on the first call
	  {
		$mimes = get_mimes(); // <- By removing the &reference declaration
		// Any subsequent changes to `$_mimes` will not be accounted for
		if (empty($mimes))
		{
		  return FALSE;
		}
	  }
	  $extension = strtolower(substr(strrchr($filename, '.'), 1));
	  if (isset($mimes[$extension]))
	  {
		  return is_array($mimes[$extension])
			  ? current($mimes[$extension])
			  : $mimes[$extension];
	  }
	  return FALSE;
	}
		
		
}

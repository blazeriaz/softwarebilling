<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends Public_Controller
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
			
			//$slug = $slugfield ? $slugfield : "index";
			$slug = $slugfield;
			//echo $slug;die;
			$join_tables = $where = array();
			$where[] = array(TRUE,'fc.status',1);
			$sort_by = 'fc.name';
			$order_by = 'asc';
			$fields = 'fc.id,fc.name,fc.slug';
			$data['faq_categories'] = $this->base_model->get_advance_list('faq_categories fc',$join_tables,$fields,$where, 'result_array',$sort_by,$order_by);
			$faq_categories_firstrow = $this->base_model->get_advance_list('faq_categories fc',$join_tables,$fields,$where, 'row_array',$sort_by,$order_by);
			//pr($data['faq_categories']);die;
			
			
			$this->load->library('pagination');
			$config  = $this->config->item('front_pagination');
			$config["base_url"] = base_url()."faq/".$slug;
			$data["per_page"] = $config["per_page"] = $this->config->item('front_page_per_limit'); 
			$config["uri_segment"] = 3;
			$config['full_tag_open'] = '<ul>';
			$config['full_tag_close'] = '</ul>';
			$config['num_tag_open'] = '<li>';
			$config['cur_tag_open'] = '<li><a class="active">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_close'] = '</li>';
			$data['limit_end'] = $limit_end = ($page_num - 1) * $config['per_page'];  
			$limit_start = $config['per_page'];
			//$this->pagination->suffix = '/'.$sortfield.'/'.$orderfield;
			//$this->pagination->first_url = $config['base_url'].'/1/'.$sortfield.'/'.$orderfield;

			$join_tables = $where = array();
			
			if($slugfield && $slugfield!="index"){
				$where[] = array(TRUE,'fc.slug',$slugfield);
			}else{
				if(isset($faq_categories_firstrow['slug']))
				$where[] = array(TRUE,'fc.slug',$faq_categories_firstrow['slug']);
			}
			$where[] = array(TRUE,'f.status',1);
			$join_tables[] = array('faq_categories fc','fc.id=f.category_id','inner');
			$fields = 'f.id,f.question,f.answer,f.status,f.created,fc.name as category_name'; 			  	
			$config['total_rows'] = $this->base_model->get_advance_list('faqs f', $join_tables, $fields, $where, 'num_rows','','','f.id');
			$data['faq_categorie_datas'] = $this->base_model->get_advance_list('faqs f', $join_tables, $fields, $where, 'result_array', 'fc.name', 'asc', 'f.id', $limit_start, $limit_end);
			$data['total_rows'] = $config['total_rows'];
			
			if($config['total_rows'] <= $limit_end )
				if($page_num && $page_num != 1) 
					redirect(base_url().'/faq/'.$slug.'/'. ($page_num -1).'/'.$sortfield.'/'.$order );
				
			$this->pagination->initialize($config);
			
			$data['main_content'] = 'faq/index';
			$data['page_title']  = 'FREQUENTLY ASKED QUESTIONS'; 
			$this->load->view(SITE_LAYOUT_PATH, $data);
		}
		
		public function frequently_asked_question(){
			$userdata = get_loggedin_user();
			pr($userdata);
			$userdata = is_loggedin();
			pr($userdata);			
		}
		
		public function faq_enquery(){
			if ($this->input->server('REQUEST_METHOD') === 'POST')
			{ 
				//$this->form_validation->set_rules('queries', 'Queries','trim|required|callback_validate_question[Question]');
				$this->form_validation->set_rules('queries', 'Queries','trim|required');
				$url = "";
				if ($this->form_validation->run()){   
					$userdata = get_loggedin_user();
					//pr($userdata);
					if($userdata){
						$date = date('Y-m-d H:i:s');
						$update_array = array (
												'queries' => $this->input->post('queries'),
												'user_id' => $userdata['user_id'],
												'created' => $date,
												'modified' => $date,
												'status' => 0
											  );
						$faq_queries = $this->base_model->insert( 'faq_queries', $update_array);
						
						if($faq_queries > 0){
							$user_email = $userdata['email_id'];
							$user_name = $userdata['display_name'];
							$email_config_data = array('[USERNAME]'=> $user_name, 
												   '[USER_EMAIL]' => $user_email,
												   '[SITE_NAME]' => $this->config->item('site_name'),
												   '[LOGO]' => base_url().$this->config->item('logo_mail'),
												   '[SITE_LINK]'=>"<a href='".base_url()."'>Link</a>"
												   );
							$to_email = $user_email;
							$from_email = get_site_settings('emailtemplate.from_email','value');							
							$template = 'User FAQ';							
							$res = $this->email_template->send_mail($to_email,$from_email,$template,$email_config_data);
							
							$to_email = get_site_settings('emailtemplate.from_email','value');		
							$from_email = $user_email;			
							$template = 'Admin FAQ';				
							$res = $this->email_template->send_mail($to_email,$from_email,$template,$email_config_data);
						}
						
						$json_response = array('status'=>'success','msg'=>'Faq send Successfully', 'url'=>$url);
						//$this->session->set_flashdata('flash_message', $this->lang->line('Faq send Successfully'));
						$this->session->set_flashdata('flash_message', 'Your question submited successfully');
					}else{
						$json_response = array('status'=>'error','msg'=>'First Login', 'url'=>$url);
						//$this->session->set_flashdata('flash_message', 'Login First');
					}					
				}else{
					$json_response = array('status'=>'error','msg'=>'Please type your question', 'url'=>$url);
					//$this->session->set_flashdata('flash_message', 'Faq validation failed');
				}
				echo json_encode($json_response);die;
			}
		}
		
		
}

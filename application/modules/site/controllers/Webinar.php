<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Webinar extends Public_Controller
{
	  	function __construct()
  		{
    		parent::__construct();
			
			$this->load->library(array('form_validation','email_template'));
			$this->load->language(array('flash_message','form_validation'), 'english');
			$this->load->model('base_model'); 
			$this->load->helper('frontend_helper');
			$this->load->helper('profile_helper');
			$this->load->helper('function_helper');
			$this->load->helper('thumb_helper');
			$this->load->library('upload');
				
		}

	public function index(){ 
		
		//product_type
		$user_data = get_loggedin_user();
		//$product_slug  = $this->uri->segment(2);
		
		if($user_data){
			
			$join_tables = $where = array(); 
			$where[] = array( TRUE, 'id', $user_data['user_id']);
			$fields = '*'; 
			$user_datas = $this->base_model->get_advance_list('users', $join_tables, $fields, $where, 'row_array');
			$email_id = $user_data['email_id'];
			$username = $user_data['username'];
			$skype_id = $user_data['skype_id'];
		}else{
			$email_id = '';
			$username = '';
			$skype_id = '';
		}
			$data['email_id'] = $email_id;
			$data['first_name'] = $username;
			$data['skype_id'] = $skype_id;
			$join_tables = $where = array();
			$fields = 'p.*,pt.name as product_type,pt.slug as product_type_slug,pa.content_one,pa.content_two,pa.content_three,pa.product_included';
			$join_tables[] = array('product_type pt','pt.id = p.product_type_id','left');
			$join_tables[] = array('product_attributes pa','pa.product_id = p.id','left');
			$where[] = array( TRUE, 'pt.slug', 'webinar-group');
			$webinar_group = $this->base_model->get_advance_list('product p', $join_tables, $fields, $where, 'result_array','p.id','desc');
			//echo $this->db->last_query();die;
			$i=0;
			$sh_web_group = 0;
			foreach($webinar_group as $webinar_gp){
				$today = date('Y-m-d h:i:s');
				$join_tables = $where = array();
				$fields = 'pw.id,pw.product_id,pw.group_id,pw.title,pw.description,pw.image,p.name as product_name,p.slug as product_slug,p.price,p.status,pw.date_time';
				$join_tables[] = array('product p','p.id = pw.product_id','left');
				$where[] = array( TRUE, 'pw.group_id', $webinar_gp['id']);
				$where[] = array( TRUE, 'p.status', 1);
				//$where[] = array( TRUE, 'pw.date_time >=', $today);
				$webinar_group_product = $this->base_model->get_advance_list('product_webinar pw', $join_tables, $fields, $where, 'result_array','pw.date_time','asc');

				$total_count = count($webinar_group_product);
				$active_count = 0;

				foreach($webinar_group_product as $gp_prd){
					if(strtotime($gp_prd['date_time']) > strtotime(date('Y-m-d H:i:s'))){
						$active_count++;
					}
				}
				//echo 'todal: ' . $total_count;
				//echo "</br>";
				//echo 'Active: ' .$active_count;
				//echo "</br>";
				//echo "id:".$webinar_gp['id'];
				if($total_count != $active_count || $active_count<2){
					$webinar_gp['show_webinar_group'] = 0;
					//$sh_web_group = 0;
				}else{
					$webinar_gp['show_webinar_group'] = 1;
					//$sh_web_group = 1;
				}
				//echo 'test: '.$sh_web_group;
				$webinar_group[$i] = $webinar_gp;
				$webinar_group[$i]['group_product'] = $webinar_group_product;
				$i++;
				$sh_web_group = 1;
			}
			if($sh_web_group > 0){
				$data['display_webinar'] = 1;
			}else{
				$data['display_webinar'] = 0;
			}
			//pr($webinar_group);die;
			$webinar_group_new = array();
			foreach($webinar_group as $k=>$web_group){
				if($web_group['show_webinar_group']){
					$webinar_group_new[$k] = $web_group;					
				}
			}

			// Individual webinars
				$today = date('Y-m-d h:i:s');
				$join_tables = $where = array();
				$fields = 'pw.id,pw.product_id,pw.group_id,pw.title,pw.description,pw.image,p.name as product_name,p.slug as product_slug,p.price,p.status,pw.date_time';
				$join_tables[] = array('product p','p.id = pw.product_id','inner');
				$where[] = array( TRUE, 'pw.group_id', 0);
				$where[] = array( TRUE, 'p.status', 1);
				$where[] = array( TRUE, 'pw.date_time >=', $today);
				$webinar_product = $this->base_model->get_advance_list('product_webinar pw', $join_tables, $fields, $where, 'result_array','pw.date_time','asc');

			$data['webinar_products'] = $webinar_product;
				
				
			//$data['webinar'] = $webinar_group;
			$data['webinar'] = $webinar_group_new;
			$data['main_content'] = 'webinar/webinar';
			//die;
			
		$this->load->view(SITE_LAYOUT_PATH, $data);
		
		}

		public function valid_skype($skype){

			if(preg_match("/^[a-zA-Z0-9.]+$/", $skype) == 1) {
				return true;
			}
			$this->form_validation->set_message('valid_skype', ucfirst('Please enter valid Skype ID'));
			return false;
		}
		
		public function register(){
			
			
			if ($this->input->server('REQUEST_METHOD') === 'POST'){
			
			$this->form_validation->set_rules('name', 'Name','trim|required');
			$this->form_validation->set_rules('email', 'Email','trim|required|valid_email');
			$this->form_validation->set_rules('skype_id','Skype id','trim|required|callback_valid_skype');
			
			
				if ($this->form_validation->run() == True){
					$data = $this->input->post();
					//$this->base_model->insert( 'users_webinar', $data);
					$this->session->set_userdata("webinar_name",$data['name']);
					$this->session->set_userdata("webinar_email",$data['email']);
					$this->session->set_userdata("webinar_skype",$data['skype_id']);
					$this->session->set_userdata("webinarfree",$data['webinarfree']);
					
					$result = array(
									'status' => 'success',
									'product_id'=>$this->input->post('product_id'),
									'message' => 'Webinar Registred Successfully'
								);
				}else{
					$result = array(
									'status' => 'error',
									'error' => $this->form_validation->get_error_array(),
									'message'=>''
								);
				}
				echo  json_encode($result);
			}
			
		}
		
}

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Purchase extends Public_Controller
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

		
		function name_check($name){
			if(!preg_match('/^[a-z0-9 .\-]+$/i', $name)){
				$this->form_validation->set_message('name_check', 'Allowed Only Alphabhet (a-z A-z),Numbers(0-9),space,dot(.),dash(-)');					
				return FALSE;
			}
			return true;
		}


		public function index($page_num = 1){  

			$user_data = get_loggedin_user();
			
				
				
			$join_tables = $where = array(); 
			$where[] = array( TRUE, 'id', $user_data['user_id']);
			$fields = '*'; 
			$user_datas = $this->base_model->get_advance_list('users', $join_tables, $fields, $where, 'row_array');
				
			$data['page_heading'] = 'My Order';
			$data['page_sub_heading'] = 'Order History';
			$data['user_data'] = $user_datas;
			
			
			$this->load->library('pagination');
			
			$config = $this->config->item('front_pagination');
			
			$config['full_tag_open'] = '<ul>';
			$config['full_tag_close'] = '</ul>';
			$config['num_tag_open'] = '<li>';
			$config['cur_tag_open'] = '<li><a class="active">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_close'] = '</li>';
		
			$config["base_url"] = base_url()."/my-purchase";
			$data["per_page"] = $config["per_page"] = $this->config->item('front_page_per_limit');
			//$data["per_page"] = $config["per_page"] = 1;
			$config["uri_segment"] = 2;
			$data['limit_end'] = $limit_end = ($page_num - 1) * $config['per_page'];  
			$limit_start = $config['per_page'];
			
			
			$join_tables = array();
			$where = array();
			$where[] = array( FALSE, 'user_id = "'.$user_data['user_id'].'" OR user_id = "'.$user_data['webinar_user_id'].'"');
			
			$sorting_field = 'id';
			
			$sorting_order = 'desc';
			
			$fields = '*';
			$data['total_rows'] = $config['total_rows'] = $this->base_model->get_advance_list('orders', $join_tables, $fields, $where, 'num_rows','','','id');
			$data['orders'] = $orders = $this->base_model->get_advance_list('orders', '', $fields, $where, '', $sorting_field, $sorting_order, 'id', $limit_start, $limit_end);
			
			
			
			$this->pagination->initialize($config);
			
			$data['main_content'] = 'user/purchase';
				
			$this->load->view(SITE_LAYOUT_USER_PATH, $data);
		}
		
		
}

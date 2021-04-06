<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Course extends Public_Controller
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

		
		
		public function index($page_num = 1)
		{  
			$user_data = get_loggedin_user();
			
			
			$join_tables = $where = array(); 
			$where[] = array( TRUE, 'id', $user_data['user_id']);
			$fields = '*'; 
			$user_datas = $this->base_model->get_advance_list('users', $join_tables, $fields, $where, 'row_array');
			
			
			$data['page_heading'] = 'My Account';
			$data['page_sub_heading'] = 'My Courses';
			$data['user_data'] = $user_datas;
			
			$this->load->library('pagination');
		
		$config = $this->config->item('front_pagination');
		
		 $config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['cur_tag_open'] = '<li><a class="active">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_close'] = '</li>';
	
		$config["base_url"] = base_url()."/my-courses";
		$data["per_page"] = $config["per_page"] = $this->config->item('front_page_per_limit');
		//$data["per_page"] = $config["per_page"] = 1;
		$config["uri_segment"] = 2;
		$data['limit_end'] = $limit_end = ($page_num - 1) * $config['per_page'];  
		$limit_start = $config['per_page'];
		
		
		$join_tables = array();
		$where = array();
		$where[] = array( TRUE,"o.status",1); 
		$where[] = array( FALSE, "o.user_id ='".$user_data['user_id']."' OR o.user_id = '".$user_data['webinar_user_id']."'");
		//$join_tables[] = array('product_type pt','pt.id=o.product_type','left');
		$join_tables[] = array('product p','p.id=o.products','left');
		
		$sorting_field = 'id';
		
		$sorting_order = 'desc';
		
		$fields = 'o.*, p.slug as product_table_slug, p.name as product_table_name';
		$data['total_rows'] = $config['total_rows'] = $this->base_model->get_advance_list('orders o', $join_tables, $fields, $where, 'num_rows','','','o.id');
		//pr($data['total_rows']);die;
		$data['my_courses'] = $my_courses = $this->base_model->get_advance_list('orders o', $join_tables, $fields, $where, '', $sorting_field, $sorting_order, 'o.id', $limit_start, $limit_end);
		//echo $this->db->last_query();die;
		//pr($data['my_courses']);die;
		
		$this->pagination->initialize($config);
			
			$data['main_content'] = 'user/course';
			
			
			
			$this->load->view(SITE_LAYOUT_USER_PATH, $data);
		}
		
		
}

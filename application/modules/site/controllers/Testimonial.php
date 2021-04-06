<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends Public_Controller
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
		public function index($typefield='text', $slugfield='index', $page_num =1, $sortfield='id', $orderfield='desc')
		{  
			$this->load->helper('thumb_helper');
			$this->load->helper('html');
			
			//$slug = $slugfield ? $slugfield : "index";
			$slug = $slugfield;
			
			$join_tables = $where = array();
			$where[] = array(TRUE,'tc.status',1);
			$sort_by = 'tc.name';
			$order_by = 'asc';
			$fields = 'tc.id,tc.name,tc.slug';
			$data['testimonial_categories'] = $this->base_model->get_advance_list('testimonial_categories tc',$join_tables,$fields,$where, 'result_array',$sort_by,$order_by);
			$testimonial_categories_firstrow = $this->base_model->get_advance_list('testimonial_categories tc',$join_tables,$fields,$where, 'row_array',$sort_by,$order_by);
			
			$this->load->library('pagination');
			$config  = $this->config->item('front_pagination');
			$config["base_url"] = base_url().'/testimonial/'.$typefield.'/'.$slug;
			$data["per_page"] = $config["per_page"] = $this->config->item('front_page_per_limit'); 
			$config["uri_segment"] = 4;
			$config['full_tag_open'] = '<ul>';
			$config['full_tag_close'] = '</ul>';
			$config['num_tag_open'] = '<li>';
			$config['cur_tag_open'] = '<li><a class="active">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_close'] = '</li>';
			$data['limit_end'] = $limit_end = ($page_num - 1) * $config['per_page'];  
			$limit_start = $config['per_page'];

			$join_tables = $where = array();
			
			if($slugfield && $slugfield!="index"){
				$where[] = array(TRUE,'tc.slug',$slugfield);
			}else{
				if(isset($testimonial_categories_firstrow['slug']))
				$where[] = array(TRUE,'tc.slug',$testimonial_categories_firstrow['slug']);
			}
			if($typefield=="text"){
				$where[] = array(TRUE,'t.type','TEXT');
			}
			if($typefield=="video"){
				$where[] = array(TRUE,'t.type','VIDEO');
			}
			$where[] = array(TRUE,'t.status',1);
			//$where[] = array(TRUE,'tc.slug','cs-handbook');
			$join_tables[] = array('testimonial_categories tc','tc.id=t.category_id','inner');
			$fields = 't.id,t.name,t.designation,t.description,t.location,t.	youtube_link,t.status,t.created,tc.name as category_name'; 	
			$config['total_rows'] = $this->base_model->get_advance_list('testimonial t', $join_tables, $fields, $where, 'num_rows','','','t.id');
			$data['testimonial_categorie_datas'] = $this->base_model->get_advance_list('testimonial t', $join_tables, $fields, $where, 'result_array', 't.id', 'desc', 't.id', $limit_start, $limit_end);
			
			if($config['total_rows'] <= $limit_end )
				if($page_num && $page_num != 1) 
					redirect(base_url().'/testimonial/'.$typefield.'/'.$slug.'/'. ($page_num -1).'/'.$sortfield.'/'.$order );
				
			$this->pagination->initialize($config);
			
			
			$data['type'] = $typefield;
			$data['main_content'] = 'testimonial/index';
			$data['page_title']  = 'TESTIMONIALS'; 
			$this->load->view(SITE_LAYOUT_PATH, $data);
		}
		
}

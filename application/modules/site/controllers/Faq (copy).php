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
			$join_tables[] = array('faq_categories fc','fc.id=f.category_id','inner');
			$fields = 'f.id,f.question,f.answer,f.status,f.created,fc.name as category_name'; 			  	
			$config['total_rows'] = $this->base_model->get_advance_list('faqs f', $join_tables, $fields, $where, 'num_rows','','','f.id');
			$data['faq_categorie_datas'] = $this->base_model->get_advance_list('faqs f', $join_tables, $fields, $where, 'result_array', 'fc.name', 'asc', 'f.id', $limit_start, $limit_end);
			$data['total_rows'] = $config['total_rows'];
			
			if($config['total_rows'] <= $limit_end )
				if($page_num && $page_num != 1) 
					redirect(base_url().'/faq/'.$slug.'/'. ($page_num -1).'/'.$sortfield.'/'.$order );
				
			$this->pagination->initialize($config);
			
			$data['main_content'] = 'testimonial/index';
			$data['page_title']  = 'TESTIMONIALS'; 
			$this->load->view(SITE_LAYOUT_PATH, $data);
		}
		
		
}

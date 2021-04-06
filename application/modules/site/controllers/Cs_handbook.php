<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cs_handbook extends Public_Controller
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
		public function index()
		{  
			$this->load->helper('thumb_helper');
			$this->load->helper('html');
			$data['page_heading'] = 'Cs Handbook';
			$data['page_sub_heading'] = 'Cs Handbook1';
			
			$where = array();
			$where[] = array(FALSE,'pt.slug = "cs-handbook"');
			$join_tables = array();
			$join_tables[] = array('product_type pt','pt.id = p.product_type_id','inner');
			$join_tables[] = array('product_attributes pa','pa.product_id = p.id','inner');
			$fields = 'p.id,p.name,p.slug,p.price,p.created,pa.content_one,pa.content_two,pa.content_three,pa.content_four,pa.content_five,pa.image,pa.video_url,pa.product_included,pa.included_valid_days';
			$data['cs_product'] = $this->base_model->get_advance_list('product p',$join_tables,$fields,$where, 'row_array');
			
			$where = array();
			$where[] = array(FALSE,'tc.slug = "target-step-2-cs-handbook"');
			$where[] = array(TRUE,'tc.status',1);
			$where[] = array(TRUE,'t.status',1);
			$where[] = array(TRUE,'t.type','TEXT');
			$join_tables = array();
			$join_tables[] = array('testimonial_categories tc','t.category_id = tc.id','inner');
			$fields = 't.id,t.name,t.designation,t.description,t.location';
			$data['testimonial_text'] = $this->base_model->get_advance_list('testimonial t',$join_tables,$fields,$where, 'result_array');
			
			$where = array();
			$where[] = array(FALSE,'tc.slug = "target-step-2-cs-handbook"');
			$where[] = array(TRUE,'tc.status',1);
			$where[] = array(TRUE,'t.status',1);
			$where[] = array(TRUE,'t.type','VIDEO');
			$sort_by = 't.id';
			$order_by = 'desc';
			$join_tables = array();
			$join_tables[] = array('testimonial_categories tc','t.category_id = tc.id','inner');
			$fields = 't.id,t.name,t.youtube_link,t.image,t.designation,t.description,t.location';
			$data['testimonial_video'] = $this->base_model->get_advance_list('testimonial t',$join_tables,$fields,$where, 'row_array',$sort_by,$order_by);
			
			$join_tables = $where = array();
			$where[] = array(TRUE,'status',1);
			$where[] = array( TRUE, 'page_id', 1);
			$fields = 'id, name, image, url, description, expiry_date, status, created,is_offer'; 
			$data['advertisements'] = $this->base_model->get_advance_list('advertisements', $join_tables, $fields, $where, 'row_array', 'id', 'desc', 'id');

			$data['amazon_url'] = get_site_settings('cs_handbook.amazon_kindle_url','value');
			$hard_copy_url = get_site_settings('cs_handbook.hard_copy_url','value');
			if($hard_copy_url){
				$data['hard_copy_url'] = $hard_copy_url;
			}else{
				$data['hard_copy_url'] = 'javascript:void(0)';	
			}
		
			
			$data['main_content'] = 'cs_handbook/index';
			$this->load->view(SITE_LAYOUT_PATH, $data);
		}
		
		public function book(){
			
			if(!is_loggedin()){
					redirect();	
				}
			
			
			
			$has_access = check_step_access('cs-handbook'); 
			
			if($has_access == 0){
				$data['main_content'] = 'layout/site/restricted_access';
				$this->load->view(SITE_LAYOUT_PATH, $data);
			}else{
			
			
			$data['title'] = 'Cs-HandBook';
			
			$book_name = get_site_settings('cs_handbook.handbook_original','value');
			if(file_exists(FCPATH.'appdata/settings/'.$book_name)){
				$data['ebook'] = base_url().$this->config->item('cs_handbook_path').$book_name;
			} else{
				$data['ebook'] = base_url().$this->config->item('cs_handbook_path').'USMLE_CS_HANDBOOK.pdf';
			}
			
			$this->load->view(SITE_LAYOUT_WEBVIEWER, $data);
			}
		}
		
		
}

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends Public_Controller
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
	public function index($slugfield=null)
	{  
		$this->load->helper('thumb_helper');
		$this->load->helper('html');
		if(!$slugfield){
			redirect(base_url());
		}				
		$join_tables = $where = array();			
		$where[] = array(TRUE,'cms.status',1);
		$where[] = array(TRUE,'cms.slug',$slugfield);
		$fields = 'cms.id,cms.name,cms.slug,cms.content,cms.seo_title,cms.meta_keywords,cms.meta_description,cms.status,cms.sort_order,cms.created,cms.modified'; 	
		$cms_datas = $this->base_model->get_advance_list('cms_pages cms', $join_tables, $fields, $where, 'row_array');
		if($cms_datas){
			$data['meta_keywords'] = $cms_datas['meta_keywords'];		
			$data['meta_description'] = $cms_datas['meta_description'];		
			$data['cms_datas'] = $cms_datas;		
			$data['main_content'] = 'cms/index';
			$data['page_title']  = 'CMS'; 
			$this->load->view(SITE_LAYOUT_PATH, $data);			
		}else{
			redirect(base_url());
		}
	}
		
}

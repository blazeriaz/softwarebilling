<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Youtube_channel extends Public_Controller
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
		$config["base_url"] = base_url()."youtube-channel";
		$data["per_page"] = $config["per_page"] = $this->config->item('front_page_per_limit'); 
		$config["uri_segment"] = 2;
		$config['per_page'] = 9;
		$config['full_tag_open'] = '<ul>';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li>';
		$config['cur_tag_open'] = '<li><a class="active">';
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_close'] = '</li>';
		$data['limit_end'] = $limit_end = ($page_num - 1) * $config['per_page'];  
		$limit_start = $config['per_page'];

		$join_tables = $where = array();			
		//$where[] = array(TRUE,'f.status',1);
		$fields = 'yc.id,yc.title,yc.slug,yc.product_type,yc.created,yc.youtube_link,yc.modified'; 			  	
		$config['total_rows'] = $this->base_model->get_advance_list('youtube_channels yc', $join_tables, $fields, $where, 'num_rows','','','yc.id');
		$data['youtube_channels_datas'] = $this->base_model->get_advance_list('youtube_channels yc', $join_tables, $fields, $where, 'result_array', 'yc.created', 'desc', 'yc.id', $limit_start, $limit_end);
		
		if($config['total_rows'] <= $limit_end )
			if($page_num && $page_num != 1) 
				redirect(base_url().'/youtube-channel/'. ($page_num -1).'/'.$sortfield.'/'.$order );
			
		$this->pagination->initialize($config);
		
		$data['main_content'] = 'youtube-channel/index';
		$data['page_title']  = 'YOUTUBE CHANNEL'; 
		$this->load->view(SITE_LAYOUT_PATH, $data);
	}	
}

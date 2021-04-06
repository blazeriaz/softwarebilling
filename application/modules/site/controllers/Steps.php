<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Steps extends Public_Controller
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
			$this->load->library('jwplayer');
				if(!is_loggedin()){
					redirect();	
				}
		}

	public function index(){  
		$user_data = get_loggedin_user();
			
		$product_slug  = $this->uri->segment(2);
		
		/*--------------------*/
			
		
		
		$join_tables = $where = array(); 
		$where[] = array( TRUE, 'id', $user_data['user_id']);
		$fields = '*'; 
		$user_datas = $this->base_model->get_advance_list('users', $join_tables, $fields, $where, 'row_array');
			
		/* left menu section */
		$join_tables = $where = array();
		$join_tables[] = array('product p','p.product_type_id = pt.id','left');
		$join_tables[] = array('product_attributes pa','pa.product_id = p.id','inner');
		$fields = '*';
		$where[] = array( TRUE, 'pt.slug', 'online-video-tutorials');
		$video_tutorial_steps = $this->base_model->get_advance_list('product_type pt', $join_tables, $fields, $where, 'result_array');
		
		if($this->uri->segment(2)){
			$product_slug = $this->uri->segment(2);
		}else{
			$product_slug = $video_tutorial_steps[0]['slug'];
		}
		
		$has_access = check_step_access($product_slug); 
			
		
			
		$handbook_access = check_step_access('cs-handbook'); 
			
		$data['handbook_access'] = $handbook_access;
		
		foreach($video_tutorial_steps as $steps){
		
		$join_tables = $where = array();
		
		$fields = '*';
		$where[] = array( TRUE, 'psc.parent', 0);
		$where[] = array( TRUE, 'psc.product_id', $steps['id']);
		$where[] = array( TRUE, 'psc.status', 1);
		$where[] = array( TRUE, 'psc.is_deleted', 0);
		$left_sub_category = $this->base_model->get_advance_list('product_step_categories psc', $join_tables, $fields, $where, 'result_array','sort_order','asc');
		$left_category[] = array('id'=>$steps['id'],'name'=>$steps['name'],'slug'=>$steps['slug'],'sub_menu'=>$left_sub_category);
		}
		
		
		
		
		$join_tables = $where = array();
		$join_tables[] = array('product_attributes pa','pa.product_id = p.id','inner');
		$fields = '*';
		$where[] = array( TRUE, 'p.slug', $product_slug);
		$product_step = $this->base_model->get_advance_list('product p', $join_tables, $fields, $where, 'row_array');
		$data['step_name'] = $product_step['name'];
		$data['step_title'] = $product_step['content_one'];
		
		
		if($this->uri->segment(3)){
			$category_slug = $this->uri->segment(3);
			$data['custom_slug'] = $this->uri->segment(3);
		}else{
			$join_tables = $where = array();
		
			$fields = '*,psc.slug as cat_slug,psc.id';
			$join_tables[] = array('product p','p.id = psc.product_id','left');
			$where[] = array( TRUE, 'p.slug', $product_slug);
			$where[] = array( TRUE, 'psc.parent', 0);
			$where[] = array( TRUE, 'psc.status', 1);
			$where[] = array( TRUE, 'psc.is_deleted', 0);
			$category_data = $this->base_model->get_advance_list('product_step_categories psc', $join_tables, $fields, $where, 'row_array','sort_order','asc');
			$category_slug = $category_data['cat_slug'];
			$data['custom_slug'] = $category_data['cat_slug'];
			//pr($category_data);exit;
		}
		
		$data['left_sub_category']	 = $left_category;
		if($has_access == 0){
			$data['main_content'] = 'layout/site/restricted_access';
			
			$this->load->view(SITE_LAYOUT_STEP_PATH, $data);
		
		}else{
		
		// get Main content Datas
	
		$join_tables = $where = array();
		$user_id = $user_data['user_id'];
		$fields = '*,psv.id as id,psc.slug as category_slug,usvl.user_id as liked';
		$join_tables[] = array('product p','p.id = psc.product_id','left');
		//$join_tables[] = array('product_attributes pa','pa.product_id = psc.product_id','left');
		//$fields . = 'pa.video_url as youtube_url';
		$join_tables[] = array('product_step_videos psv','psv.product_step_categories_id = psc.id','left');
		$join_tables[] = array('users_step_video_liked usvl','psv.id = usvl.product_step_videos_id AND usvl.user_id = "'.$user_id.'"','left');
		$where[] = array( TRUE, 'p.slug', $product_slug);
		$where[] = array( TRUE, 'psc.slug', $category_slug);
		$where[] = array( TRUE, 'psc.is_deleted', 0);
		$where[] = array( TRUE, 'psv.status', 1);
		$video_content = $this->base_model->get_advance_list('product_step_categories psc', $join_tables, $fields, $where, 'result_array','psv.sort_order','asc');
		
		//pr($video_content);
		
		$k=0;
		if(count($video_content) > 0){
			foreach($video_content as $video_cont){
				
				
				preg_match('/src="([^"]+)"/', $video_cont['video_url'], $match);
				$iframe_url = $match[1];
				$video_src = explode("/",$iframe_url);
				$media_array = explode("-",end($video_src));
				$media_id = $media_array[0];
				
				$video_content_array[$k] = $video_cont;
				$video_content_array[$k]['media_id'] = $media_id;	
			
				$video_data = $this->jwplayer->video_details('/videos/show',$media_id);
				
				if($video_data['status'] == 'ok'){
					$video_content_array[$k]['view_cnt'] = $video_data['video']['views'];
				}else{
					$video_content_array[$k]['view_cnt'] = '-1';
				}
				$k++;
			}
		}else{
			$video_content_array = array();
		}
		
		//pr($video_content_array);
		
		$data['video_content'] = $video_content_array;

		
		// for Getting the Current Category id so that we can use it for next and previous
		$join_tables = $where = array();
		$fields = 'psc.id,psc.product_id,psc.name,psc.slug';
		$join_tables[] = array('product p','p.id = psc.product_id','left');
		$where[] = array( TRUE, 'p.slug', $product_slug);
		$where[] = array( TRUE, 'psc.slug', $category_slug);
		//$where[] = array( TRUE, 'psv.status', 1);
		$curent_content = $this->base_model->get_advance_list('product_step_categories psc', $join_tables, $fields, $where, 'row_array');
		
		
		 
		if($this->uri->segment(2) == 'step4'){
			// getting sub category and micro category
		$data['current_heading'] = $curent_content['name'];
		$join_tables = $where = array();
		
		$fields = 'psc.id,psc.product_id,psc.name as category_name,psc.slug as category_slug,psc.parent';
		$where[] = array( TRUE, 'psc.parent',$curent_content['id']);
		$where[] = array( TRUE, 'psc.product_id', $product_step['id']);
		$where[] = array( TRUE, 'psc.status', 1);
		$sub_cat = $this->base_model->get_advance_list('product_step_categories psc', $join_tables, $fields, $where, 'result_array','sort_order','asc');
		
		$i =1;
		foreach($sub_cat as $sub_category){
			$join_tables = $where = array();
			$fields = 'psc.id,psc.product_id,psc.name as category_name,psc.slug as category_slug,psc.parent,psc.description';
			$where[] = array( TRUE, 'psc.parent',$sub_category['id']);
			$where[] = array( TRUE, 'psc.product_id', $product_step['id']);
			$where[] = array( TRUE, 'psc.status', 1);
			$micro_cat = $this->base_model->get_advance_list('product_step_categories psc', $join_tables, $fields, $where, 'result_array','sort_order','asc');
			$s = 1;
			$micro_catnew = array();
			foreach($micro_cat as $micro){
				
				$join_tables = $where = array();
				$fields = 'psc.id,psc.product_id,psc.name as category_name,psc.slug as category_slug,psc.parent,psc.description';
				$where[] = array( TRUE, 'psc.parent',$micro['id']);
				$where[] = array( TRUE, 'psc.product_id', $product_step['id']);
				$where[] = array( TRUE, 'psc.status', 1);
				$mini_cat = $this->base_model->get_advance_list('product_step_categories psc', $join_tables, $fields, $where, 'result_array','sort_order','asc');
				$micro_catnew[$s] = $micro;
				$micro_catnew[$s]['mini_category'] = $mini_cat;
				$s++;
			}
			
				$step4_content[$i] = $sub_category;
				$step4_content[$i]['link'] = base_url('cs-steps/'.$product_slug.'/'.$sub_category['category_slug']);
				$step4_content[$i]['micro_category'] = $micro_catnew;
				$i++;
			}
			$data['step_four_content'] = $step4_content;
		}
		
		if($this->uri->segment(2) == 'step6'){
			
			$join_tables = $where = array();
		
		$fields = '*';
		
		$where[] = array( TRUE, 'psc.parent', 0);
		$where[] = array( TRUE, 'psc.product_id', $product_step['id']);
		$where[] = array( TRUE, 'psc.status', 1);
		$step_six = $this->base_model->get_advance_list('product_step_categories psc', $join_tables, $fields, $where, 'result_array','sort_order','asc');
		
		$data['step_six_content'] = $step_six;
		
		}
		
		// Next and previous
		
		$join_tables = $where = array();
		$fields = 'psc.slug as cat_slug,p.slug,psc.id,psc.name';
		$join_tables[] = array('product p','p.id = psc.product_id','left');
		$where[] = array( TRUE, 'psc.status', 1);
		$where[] = array( TRUE, 'psc.parent', 0);
		$where[] = array( TRUE, 'psc.is_deleted', 0);
		$where[] = array( TRUE, 'psc.id >', $curent_content['id']);
		$next_record = $this->base_model->get_advance_list('product_step_categories psc', $join_tables, $fields, $where, 'row_array','psc.id,psc.product_id,psc.sort_order','asc','',1);
		//echo $this->db->last_query();
		//pr($next_record);
		
		if($next_record){
		$next_product_slug = $next_record['slug'];
		$next_cat_slug = $next_record['cat_slug'];
		$data['next_url'] = base_url('cs-steps/'.$next_product_slug.'/'.$next_cat_slug);
		}else{
			$data['next_url'] = '';
		}
		
		$join_tables = $where = array();
		$fields = 'psc.slug as cat_slug,p.slug,psc.id';
		$join_tables[] = array('product p','p.id = psc.product_id','left');
		$where[] = array( TRUE, 'psc.status', 1);
		$where[] = array( TRUE, 'psc.parent', 0);
		$where[] = array( TRUE, 'psc.is_deleted', 0);
		$where[] = array( TRUE, 'psc.id <', $curent_content['id']);
		$prev_record = $this->base_model->get_advance_list('product_step_categories psc', $join_tables, $fields, $where, 'row_array','product_id,sort_order','desc','',1);
		
		if($prev_record){
		$prev_product_slug = $prev_record['slug'];
		$prev_cat_slug = $prev_record['cat_slug'];
		$data['prev_url'] = base_url('cs-steps/'.$prev_product_slug.'/'.$prev_cat_slug);
		}else{
		$data['prev_url'] = '';	
		}
		
		// End Next and Previous
		
		
		
		if($this->uri->segment(2) == 'step4'){
			$data['main_content'] = 'steps/step_four';
		}else if($this->uri->segment(2) == 'step6'){
			$data['main_content'] = 'steps/step_six';
		}else{
			$data['main_content'] = 'steps/steps_content';
		}
			
		$this->load->view(SITE_LAYOUT_STEP_PATH, $data);
		}
		}
		
		 public function view_pdf($type,$slug){
			 
			$join_tables = $where = array();
			$fields = '*';
		
			$where[] = array( TRUE, 'slug', $slug);
			$result = $this->base_model->get_advance_list('product_step_categories psc', $join_tables, $fields, $where, 'row_array','product_id,sort_order','desc','',1);
			
			$data['title'] = $result['name'].' '.$type;
			if($type =='ideal'){
				$data['ebook'] = base_url().$this->config->item('step_category_pdf_pathonly').$result['ideal_pdf'];
			}else if($type =='corrected'){
			$data['ebook'] = base_url().$this->config->item('step_category_pdf_pathonly').$result['corrected_pdf'];
			}
			$this->load->view(SITE_LAYOUT_WEBVIEWER, $data);
		}

		public function likeVideo(){
			$user_data = get_loggedin_user();
			$user_id = $user_data['user_id'];
			$video_id = $this->input->post('video_id');

			if(!empty($video_id)){
				$insert_array = array(
									'user_id' => $user_id,
									'product_step_videos_id' => $video_id,
									'created' => date('Y-m-d H:i:s')
								);
				$this->base_model->insert('users_step_video_liked',$insert_array);

				//Increase Like Count
				$query = "UPDATE `product_step_videos` SET `count_like` = `count_like`+1 WHERE `id` = '".$video_id."'";
				$this->db->query($query);

				echo 1;die;
			}else{
				echo 0;die;
			}
		}
		
		
}

<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends Public_Controller
{
	  	function __construct()
  		{
    		parent::__construct();
			
			$this->load->library(array('form_validation','email_template'));
			$this->load->language(array('flash_message','form_validation'), 'english');
			$this->load->model('base_model');
			$this->load->helper('frontend_helper');
		}

		
		/******** Blog Function *******/
		public function index($slugfield='index', $page_num =1, $sortfield='id', $orderfield='desc')
		{  
			$this->load->helper('thumb_helper');
			$this->load->helper('html');
			
			//pr($this->input->get());die;
			$get_year = $this->input->get("year");
			$get_month = $this->input->get("month");
			$get_search = $this->input->post("search");
						
			if(isset($_POST['search']) && !$get_search){
				$this->session->unset_userdata('blog_search');
				redirect('blogs'); //redirect('blogs/'.$slugfield);
			}
			
			
			
			if(($get_month && $get_year) || $slugfield!='index'){
				if($this->session->userdata('blog_search')){
					$this->session->unset_userdata('blog_search');
					//redirect('blogs');
				}
			}
				
			if($this->input->post("search")){
				$get_blog_search = $get_search;
			}elseif($this->session->userdata('blog_search')){
				$get_blog_search = $this->session->userdata('blog_search');
			}else{
				$get_blog_search = "";
			}
			
			if($get_blog_search){  
        		$search_session = array( 'blog_search' => $get_blog_search); 
        		$this->session->set_userdata($search_session);
			}
			
			$data['get_blog_search'] = $get_blog_search;
			$data['blog_categories'] = $this->get_all_blog_categories();
			$data['blog_archives'] = $this->get_all_blog_archives();
			$data['blog_most_liked'] = $this->get_all_blog_most_liked();
			
			$get_query_string = http_build_query($this->input->get());
			$get_query_string = $get_query_string ? "?".$get_query_string : "";
			$data['get_query_string'] = $get_query_string;
			
			$this->load->library('pagination');
			$config  = $this->config->item('front_pagination');
			$config["base_url"] = base_url()."blogs/".$slugfield;
			$config['first_url'] = $config['base_url'].$get_query_string;
			$data["per_page"] = $config["per_page"] = $this->config->item('front_page_per_limit'); 
			$config["uri_segment"] = 3;
			$config['full_tag_open'] = '<ul>';
			$config['full_tag_close'] = '</ul>';
			$config['num_tag_open'] = '<li>';
			$config['cur_tag_open'] = '<li><a class="active">';
			$config['cur_tag_close'] = '</a></li>';
			$config['num_tag_close'] = '</li>';
			//if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
			
			$config['suffix'] = $get_query_string;
			$data['limit_end'] = $limit_end = ($page_num - 1) * $config['per_page'];  
			$limit_start = $config['per_page'];
			//$limit_start = 2;

			$join_tables = $where = array();
			//$fields = "*";
			
			if($get_year && $get_month){
				$where[] = array(TRUE,'YEAR(b.created)',$get_year);
				$where[] = array(TRUE,'MONTH(b.created)',$get_month);
			}
			
			if($get_blog_search){
				$where[] = array( FALSE,"(b.title LIKE '%$get_blog_search%' COLLATE utf8_unicode_ci or b.short_description LIKE '%$get_blog_search%' COLLATE utf8_unicode_ci or b.description LIKE '%$get_blog_search%' COLLATE utf8_unicode_ci)");
			}
			
			if($slugfield && $slugfield!="index"){
				$where[] = array(TRUE,'bc.slug',$slugfield);
			}
			$where[] = array(TRUE,'b.status',1);
			$where[] = array(TRUE,'bc.status',1);
			$join_tables[] = array('blog_categories bc','bc.id=b.category_id','inner');
			$join_tables[] = array('admin_users au','au.id=b.posted_by','left');
			$join_tables[] = array('users_blog_liked ubl','b.id=ubl.blog_id','left');
			$fields = 'b.id,b.title,b.slug,b.view_count,b.status,b.created,b.short_description,b.description,b.image,au.display_name,bc.name as category_name,ubl.id as users_blog_liked_id,count(ubl.id) as user_blog_liked_count'; 			  	
			$config['total_rows'] = $this->base_model->get_advance_list('blogs b', $join_tables, $fields, $where, 'num_rows','','','b.id');
			$data['blog_categorie_datas'] = $this->base_model->get_advance_list('blogs b', $join_tables, $fields, $where, 'result_array', 'b.id', 'desc', 'b.id', $limit_start, $limit_end);
			//pr($data['blog_categorie_datas']);die;
						
			if($config['total_rows'] <= $limit_end )
				if($page_num && $page_num != 1) 
					redirect(base_url().'/blogs/'.$slugfield.'/'. ($page_num -1).'/'.$sortfield.'/'.$order );
				
			$this->pagination->initialize($config);
			
			// advertisement
			$join_tables = $where = array();
			$fields = '*';
			$where[] = array( TRUE, 'a.status', 1);
			$where[] = array( TRUE, 'a.page_id', 2);
			$data['advertisement'] = $advertisement =  $this->base_model->get_advance_list('advertisements a', $join_tables, $fields, $where, 'result_array');
			
			$data['main_content'] = 'blog/index';
			$data['page_title']  = 'BLOGS'; 
			$this->load->view(SITE_LAYOUT_PATH, $data);
		}
		
		/******** Blog Detail Function *******/
		public function detail($blog_slug, $cat_slug=null)
		{  
			$join_tables = $where = array();			
			$where[] = array(TRUE,'b.status',1);
			$where[] = array(TRUE,'bc.status',1);
			$where[] = array(TRUE,'b.slug',$blog_slug);
			$join_tables[] = array('blog_categories bc','bc.id=b.category_id','inner');
			$fields = 'b.id'; 	
			$blog_datas = $this->base_model->get_advance_list('blogs b', $join_tables, $fields, $where, 'row_array');
			if(!$blog_datas){
				redirect(base_url().'blogs' );
			}
			$blog_id = $blog_datas['id'];
			// Next and previous
		
		$join_tables = $where = array();
		$fields = 'b.id,b.slug,b.title,bc.slug as cat_slug';
		$where[] = array( TRUE, 'b.status', 1);
		if(!empty($cat_slug) && $cat_slug !="index"){
			$where[] = array( TRUE, 'bc.slug', $cat_slug);
		}
		
		$get_year = $this->input->get("year");
			$get_month = $this->input->get("month");
		
		if($get_year && $get_month){
			
			$where[] = array(TRUE,'YEAR(b.created)',$get_year);
			$where[] = array(TRUE,'MONTH(b.created)',$get_month);
		}
		$join_tables[] = array('blog_categories bc','bc.id=b.category_id','inner');
		$where[] = array( TRUE, 'b.id >', $blog_id);
		$next_record = $this->base_model->get_advance_list('blogs b', $join_tables, $fields, $where, 'row_array','b.id','asc','',1);
		
		$data['next_record'] = $next_record;
		// previous record
		
		$join_tables = $where = array();
		$fields = 'b.id,b.slug,b.title,bc.slug as cat_slug';
		$where[] = array( TRUE, 'b.status', 1);
		if(!empty($cat_slug) && $cat_slug !="index"){
		$where[] = array( TRUE, 'bc.slug', $cat_slug);
		}
		if($get_year && $get_month){
			
			$where[] = array(TRUE,'YEAR(b.created)',$get_year);
			$where[] = array(TRUE,'MONTH(b.created)',$get_month);
		}
		$join_tables[] = array('blog_categories bc','bc.id=b.category_id','inner');
		$where[] = array( TRUE, 'b.id <', $blog_id);
		$previous_record = $this->base_model->get_advance_list('blogs b', $join_tables, $fields, $where, 'row_array','b.id','desc','',1);
		$data['previous_record'] = $previous_record;
		
			$this->load->helper('thumb_helper');
			$this->load->helper('html');
			
			$data['blog_categories'] = $this->get_all_blog_categories();
			$data['blog_archives'] = $this->get_all_blog_archives();
			$data['blog_most_liked'] = $this->get_all_blog_most_liked();
			//$data['blog_prev_next_link'] = $this->get_prev_next_link();
			
			
			$this->add_blog_view_count($blog_id);
			
			$join_tables = $where = array();
			
			$where[] = array(TRUE,'b.status',1);
			$where[] = array(TRUE,'bc.status',1);
			$where[] = array(TRUE,'b.id',$blog_id);
			$join_tables[] = array('blog_categories bc','bc.id=b.category_id','inner');
			$join_tables[] = array('admin_users au','au.id=b.posted_by','left');
			$join_tables[] = array('users_blog_liked ubl','b.id=ubl.blog_id','left');
			$fields = 'b.id,b.title,b.slug,b.view_count,b.status,b.created,b.short_description,b.description,b.image,au.display_name,bc.name as category_name,bc.slug as cat_slug,ubl.id as users_blog_liked_id,count(ubl.id) as user_blog_liked_count,YEAR(b.created) as year,MONTH(b.created) as month'; 	
			$data['blog_datas'] = $blog_datas = $this->base_model->get_advance_list('blogs b', $join_tables, $fields, $where, 'row_array');
			//pr($blog_datas);exit;
			if($blog_datas['image']){
			$img_src = thumb(FCPATH.'appdata/blogs/'.$blog_datas['image'] ,'755', '444', 'thumb_755_444',$maintain_ratio = TRUE);
			
			$data['meta_image'] = base_url().'appdata/blogs/'.'thumb_755_444/'.$img_src;
			}else{
				$data['meta_image'] = base_url('assets/site/images/target_usmle_logo.png');
			}
			$data['meta_title'] = strip_tags(substr($blog_datas['title'],0,255));
			$data['meta_description'] = strip_tags(substr($blog_datas['description'],0,255));
			$data['meta_url'] = base_url('blogs/detail/'.$blog_datas['slug']);
			// advertisement
			$join_tables = $where = array();
			$fields = '*';
			$where[] = array( TRUE, 'a.status', 1);
			$where[] = array( TRUE, 'a.page_id', 2);
			$data['advertisement'] = $advertisement =  $this->base_model->get_advance_list('advertisements a', $join_tables, $fields, $where, 'result_array');
			
			
			
			$data['main_content'] = 'blog/detail';
			$data['page_title']  = 'BLOG'; 
			$this->load->view(SITE_LAYOUT_PATH, $data);
		}
				
		public function get_all_blog_most_liked(){
			$join_tables = $where = array();
			$where[] = array(TRUE,'b.status',1);
			$where[] = array(TRUE,'bc.status',1);
			$join_tables[] = array('blog_categories bc','bc.id=b.category_id','inner');
			$join_tables[] = array('users_blog_liked ubl','b.id=ubl.blog_id','inner');
			$limit_start = 3;
			$limit_end = 0;
			$sort_by = 'blog_liked_count';
			$order_by = 'desc';
			$group_by = 'b.id';
			$fields = "b.id,b.title,b.slug,b.image,bc.name as category_name,bc.slug as cat_slug,count(ubl.id) as blog_liked_count";
			$blog_most_liked =  $this->base_model->get_advance_list('blogs b',$join_tables,$fields,$where, 'result_array',$sort_by,$order_by,$group_by,$limit_start,$limit_end);
			return $blog_most_liked;
		}
		
		public function get_all_blog_categories(){
			$join_tables = $where = array();
			$where[] = array(TRUE,'bc.status',1);
			$sort_by = 'bc.name';
			$order_by = 'asc';
			$fields = 'bc.id,bc.name,bc.slug';
			$blog_categories =  $this->base_model->get_advance_list('blog_categories bc',$join_tables,$fields,$where, 'result_array',$sort_by,$order_by);		
			return $blog_categories;
		}
		
		public function get_all_blog_archives(){
			$blog_archives = array();
			$join_tables = $where = array();
			$where[] = array(TRUE,'b.status',1);
			$where[] = array(TRUE,'bc.status',1);
			$join_tables[] = array('blog_categories bc','bc.id=b.category_id','inner');
			$sort_by = 'year';
			$order_by = 'desc';
			$group_by = 'year';
			$fields = "YEAR(b.created) as year";
			$blog_years =  $this->base_model->get_advance_list('blogs b',$join_tables,$fields,$where, 'result_array',$sort_by,$order_by,$group_by);		
			foreach($blog_years as $k=>$blog_year){
				$join_tables = $where = array();
				$where[] = array(TRUE,'YEAR(b.created)',$blog_year['year']);
				$where[] = array(TRUE,'b.status',1);
				$where[] = array(TRUE,'bc.status',1);
				$join_tables[] = array('blog_categories bc','bc.id=b.category_id','inner');
				$sort_by = 'month';
				$order_by = 'desc';
				$group_by = 'month';
				$fields = "MONTH(b.created) as month, MONTHNAME(b.created) as month_name";
				$blog_months =  $this->base_model->get_advance_list('blogs b',$join_tables,$fields,$where, 'result_array',$sort_by,$order_by,$group_by);	
				$blog_months_array = array();
				foreach($blog_months as $month){
					$blog_months_array[$month['month']] = $month['month_name'];
				}
				$blog_archives[$blog_year['year']] = $blog_months_array;
			}
			return $blog_archives;
		}
				
		public function get_prev_next_link(){
			
		}
		
		public function add_blog_view_count($blog_id){
			$query = "UPDATE `blogs` SET `view_count` = `view_count`+1 WHERE `id` = '".$blog_id."'";
			$this->db->query($query);
		}
			
		public function likeBlog(){
			$user_data = get_loggedin_user();
			$user_id = $user_data['user_id'];
			$blog_id = $this->input->post('blog_id');

			if(!empty($blog_id) && !empty($user_id)){
				$join_tables = $where = array();
				$where[] = array(TRUE,'ubl.user_id',$user_id);
				$where[] = array(TRUE,'ubl.blog_id',$blog_id);
				$fields = 'ubl.id,ubl.user_id,ubl.blog_id';
				$users_blog_liked = $this->base_model->get_advance_list('users_blog_liked ubl', $join_tables, $fields, $where, 'row_array');
				//pr($users_blog_liked);die;
				
				if(!$users_blog_liked){
					$insert_array = array(
									'user_id' => $user_id,
									'blog_id' => $blog_id,
									'created' => date('Y-m-d H:i:s')
								);
					$this->base_model->insert('users_blog_liked',$insert_array);
					$blog_liked_count = $this->blog_liked_count($blog_id);
					$json_response = array('status'=>'success','msg'=>'Blog Liked Successfully','blog_like_count'=>$blog_liked_count);
				}else{
					$this->base_model->delete ('users_blog_liked',array('user_id' => $user_id, 'blog_id' => $blog_id));
					$blog_liked_count = $this->blog_liked_count($blog_id);
					$json_response = array('status'=>'success','msg'=>'Blog UnLiked Successfully','blog_like_count'=>$blog_liked_count);				
				}
				
				//Increase Like Count
				//$query = "UPDATE `product_step_videos` SET `count_like` = `count_like`+1 WHERE `id` = '".$blog_id."'";
				//$this->db->query($query);
				
			}else{
				$json_response = array('status'=>'error','msg'=>'Blog blog_id & user_id Required');
			}
			echo json_encode($json_response);die;
		}
		
		public function blog_liked_count($blog_id){
			$join_tables = $where = array();
			$where[] = array(TRUE,'ubl.blog_id',$blog_id);
			$fields = 'ubl.id,ubl.user_id,ubl.blog_id';
			$blog_liked_count = $this->base_model->get_advance_list('users_blog_liked ubl', $join_tables, $fields, $where, 'num_rows','','','ubl.id');
			return $blog_liked_count;
		}
		
		public function get_search_blog(){
			
		}
		
}

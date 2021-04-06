<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Online_tutorial extends Public_Controller
{
	  	function __construct()
  		{
    		parent::__construct();
			$this->load->library('form_validation');
			$this->load->language(array('flash_message','form_validation'), 'english');
			$this->load->model('base_model'); 
			$this->load->helper('frontend_helper');
			
		}

		/******** Admin login function *******/
		public function index()
		{
			$this->load->helper('thumb');
			$this->load->helper('html');

			$data['css'] = $data['js'] = array();
			$data['css'][]='assets/themes/css/jquery.datetimepicker.css';
			$data['js'][]='assets/themes/js/jquery.datetimepicker.full.js';
			$data['css'][]='assets/site/css/select2.min.css';
			$data['js'][]='assets/site/js/select2.full.min.js';

			$data['page_title'] = 'Online Video Tutorial';

			//Banner
			$cond[] = array(TRUE, 'site_reference_id', 2 ); 
			$cond[] = array(TRUE, 'status', 1 ); 
			$slider = $this->base_model->get_records('banner_management','*', $cond, 'result_array','sort_order','asc');
			$data['slider'] = $slider;
			
			//Online Tutorial Step Buy
			$step = get_site_settings_category('step');
			//pr($online_tutorial);
			foreach($step as $step_val){
				$online_tutorial[$step_val['name']] = $step_val['value'];
			}
			$data['online_tutorial'] = $online_tutorial;

			//Packages
			$where = array();
			$join_tables= array();
			$join_tables[] = array('product_type pt','pt.id = p.product_type_id','inner');
			$join_tables[] = array('product_attributes pa','pa.product_id = p.id','inner');
			$where[] = array( TRUE, 'pt.slug', 'combo-package' );
			$fields = "p.id,p.name,p.price,p.slug";
			$combo_packages = $this->base_model->get_advance_list('product p', $join_tables, $fields, $where, 'result_array', 'p.name', 'asc', 'p.id');
			
			$data['combo_packages'] = $combo_packages;
			
			//Assesment Preparation
			$where = array();
			$join_tables= array();
			$where[] = array( TRUE, 'pr.slug', 'assesement-preparation' );
			$fields = "*,pr.id as id";
			$join_tables[] = array('product_attributes as pa','pa.product_id = pr.id');
			$asses_preparation = $this->base_model->get_advance_list('product pr', $join_tables, $fields, $where, 'row_array', 'pr.id', 'desc', 'pr.id');
			
			$data['assesement_preparation'] = $asses_preparation;

			$data['booking_slot']['title'] = $asses_preparation['content_one'].' Booking Slot';
			$data['booking_slot']['price'] = $asses_preparation['price'];
			$data['booking_slot']['id'] = $asses_preparation['id'];
			$data['booking_slot']['class_name'] = 'assesement_preparation_submit';	

			//Highlight Dates
			$data['highlight_dates'] = array();

			//Highlight Date List
			$where = array();
			$join_tables= array();
			$where[] = array( FALSE, 'pr.slug = "assesement-preparation"' );
			$where[] = array( FALSE, "DATE_FORMAT(DATE(aats.date_time),'%Y-%m-%d') >= '".date('Y-m-d')."'" );
			$where[] = array( FALSE, 'aats.is_complete = "0"' );
			$where[] = array( FALSE, 'aats.status = "1"' );
			$fields = "aats.date_time";
			$join_tables[] = array('product as pr','aats.product_id = pr.id');
			$highlight_dates = $this->base_model->get_advance_list('admin_availability_time_slot aats', $join_tables, $fields, $where, 'result_array', 'aats.id', 'asc', 'aats.id');
//echo $this->db->last_query();die;
			foreach($highlight_dates as $date){
				$data['highlight_dates'][] = date('m/d/Y',strtotime($date['date_time']));
			}

			//Online Tutorial Steps List
			$where = array();
			$join_tables= array();
			$join_tables[] = array('product_type pt','pt.id = p.product_type_id','inner');
			$join_tables[] = array('product_attributes pa','pa.product_id = p.id','inner');
			$where[] = array( TRUE, 'pt.slug', 'online-video-tutorials' );
			$fields = "p.id,p.name,p.price,p.slug,p.valid_days,pa.content_one,pa.content_two,pa.image,pa.video_url";
			$online_step_list = $this->base_model->get_advance_list('product p', $join_tables, $fields, $where, 'result_array', 'p.name', 'asc', 'p.id');
		
			$data['online_step_list'] = $online_step_list;

			$this->load->view(SITE_LAYOUT_ONLINE_TUTORIAL_PATH, $data); 
				
		}
		
		
}

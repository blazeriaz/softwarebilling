<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Personal_coaching extends Public_Controller
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
			
			//Personal Coaching Settings
			$personal_coaching_settings_arr = get_site_settings_category('personal_coaching');
			foreach($personal_coaching_settings_arr as $personal_coaching){
				$personal_coaching_settings[$personal_coaching['name']] = $personal_coaching['value'];
			}
			$data['personal_coaching_settings'] = $personal_coaching_settings;

			//pr($personal_coaching_settings);die;

			//Personal Coaching List
			$where = array();
			$join_tables= array();
			$where[] = array( FALSE, 'pr.slug = "complete-comprehensive-course" OR pr.slug = "rapid-review-course"' );
			$fields = "*";
			$join_tables[] = array('product_attributes as pa','pa.product_id = pr.id');
			$personal_coaching_list = $this->base_model->get_advance_list('product pr', $join_tables, $fields, $where, 'result_array', 'pr.id', 'asc', 'pr.id');
			
			$data['personal_coaching_list'] = $personal_coaching_list;

			//pr($personal_coaching_list);die;

			$data['booking_slot']['title'] = 'Booking Slot';
			$data['booking_slot']['price'] = '';	
			$data['booking_slot']['id'] = '';	
			$data['booking_slot']['class_name'] = 'personal_coaching_submit';	

			//pr($personal_coaching_list);die;

			//Highlight Dates
			$data['highlight_dates_ccc'] = $data['highlight_dates_rcc'] = array();

			//Highlight Date List
			$where = array();
			$join_tables= array();
			$where[] = array( FALSE, 'pr.slug = "complete-comprehensive-course"' );
			$where[] = array( FALSE, "DATE_FORMAT(DATE(aats.date_time),'%Y-%m-%d') >= '".date('Y-m-d')."'" );
			$where[] = array( FALSE, 'aats.is_complete = "0"' );
			$where[] = array( FALSE, 'aats.status = "1"' );
			$fields = "aats.date_time";
			$join_tables[] = array('product as pr','aats.product_id = pr.id');
			$highlight_dates_ccc = $this->base_model->get_advance_list('admin_availability_time_slot aats', $join_tables, $fields, $where, 'result_array', 'aats.id', 'asc', 'aats.id');

			foreach($highlight_dates_ccc as $date){
				$data['highlight_dates_ccc'][] = date('m/d/Y',strtotime($date['date_time']));
			}

			$where = array();
			$join_tables= array();
			$where[] = array( FALSE, 'pr.slug = "rapid-review-course"' );
			$where[] = array( FALSE, "DATE_FORMAT(DATE(aats.date_time),'%Y-%m-%d') >= '".date('Y-m-d')."'" );
			$where[] = array( FALSE, 'aats.is_complete = "0"' );
			$where[] = array( FALSE, 'aats.status = "1"' );
			$fields = "aats.date_time";
			$join_tables[] = array('product as pr','aats.product_id = pr.id');
			$highlight_dates_rrc = $this->base_model->get_advance_list('admin_availability_time_slot aats', $join_tables, $fields, $where, 'result_array', 'aats.id', 'asc', 'aats.id');
			
			foreach($highlight_dates_rrc as $date){
				$data['highlight_dates_rrc'][] = date('m/d/Y',strtotime($date['date_time']));
			}

			$data['main_content'] = 'personal_coaching/index';

			$this->load->view(SITE_LAYOUT_PATH, $data); 
				
		}
		
		public function book_timeslot(){
			// To Do Booking Slot
			$product_id = $this->input->post('product_id');
			// if success return true
			echo $result = json_encode(array('status'=>'success','message'=>'Time Slot Alloted','product_id'=>$product_id));
		}
		
		
}

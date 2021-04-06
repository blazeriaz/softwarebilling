<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Online_mock_exam extends Public_Controller
{
	  	function __construct()
  		{
    		parent::__construct();
			$this->load->library('form_validation');
			$this->load->language(array('flash_message','form_validation'), 'english');
			$this->load->model('base_model'); 
			$this->load->helper('frontend_helper');
			
		}

		public function index()
		{
			$this->load->helper('thumb');
			$this->load->helper('html');
			
			$data['css'] = $data['js'] = array();
			$data['css'][]='assets/themes/css/jquery.datetimepicker.css';
			$data['js'][]='assets/themes/js/jquery.datetimepicker.full.js';
			
			$user_data = get_loggedin_user(); 
			
			/*$where = $join_tables = array();
			$where[] = array( TRUE, 'u.id', $user_data['user_id'] );
			$fields = "*";
			$user_info = $this->base_model->get_advance_list('users u', $join_tables, $fields, $where, 'row_array');
			$data['user_info'] = $user_info;*/
			
			//Patient Note Correction
			$where = array();
			$join_tables= array();
			$where[] = array( TRUE, 'pr.slug', 'online-mock-exam' );
			$fields = "*,pr.id as id";
			$join_tables[] = array('product_attributes as pa','pa.product_id = pr.id');
			$online_mock_exam = $this->base_model->get_advance_list('product pr', $join_tables, $fields, $where, 'row_array', 'pr.id', 'desc', 'pr.id');
			
			$data['online_mock_exam'] = $online_mock_exam;
			$data['booking_slot']['title'] = $online_mock_exam['content_one'].' Booking Slot';
			$data['booking_slot']['price'] = $online_mock_exam['price'];
			$data['booking_slot']['id'] = $online_mock_exam['id'];
			$data['booking_slot']['class_name'] = 'online_mock_submit';	
			//pr($online_mock_exam);die;

			//Highlight Dates
			$data['highlight_dates'] = array();

			//Highlight Date List
			$where = array();
			$join_tables= array();
			$where[] = array( FALSE, 'pr.slug = "online-mock-exam"' );
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
			
			$data['main_content'] = 'online_mock_exam/index';

			$this->load->view(SITE_LAYOUT_PATH, $data); 
				
		}
		
		
}

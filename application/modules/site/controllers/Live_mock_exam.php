<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Live_mock_exam extends Public_Controller
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
			$data['css'][]='assets/site/css/select2.min.css';
			$data['js'][]='assets/site/js/select2.full.min.js';
						
			//Personal Coaching Settings
			$live_mock_exam_arr = get_site_settings_category('live_mock_exam');
			foreach($live_mock_exam_arr as $live_mock_exam_li){
				$live_mock_exam[$live_mock_exam_li['name']] = $live_mock_exam_li['value'];
			}
			$data['live_mock_exam'] = $live_mock_exam;
//pr($live_mock_exam);die;
			//Get Cities List
			$data['cities_list'] = [];
			$where = array();
			$join_tables= array();
			$where[] = array( FALSE, 'ci.status = "1"' );
			$where[] = array( FALSE, "DATE_FORMAT(pme.date_time,'%Y-%m-%d') > '".date('Y-m-d')."'" );
			$fields = "pme.city_id,pme.location,ci.name";
			$join_tables[] = array('cities ci','ci.id = pme.city_id','inner');
			$cities_list = $this->base_model->get_advance_list('product_mock_exam pme', $join_tables, $fields, $where, 'result_array', 'ci.name', 'asc', 'pme.id');
//echo $this->db->last_query();die;
			foreach($cities_list as $res){
				$data['cities_list'][$res['city_id']] = $res['name'];
			}
			
			$data['booking_slot']['title'] = 'Live Mock Exam Booking Slot';
			$data['booking_slot']['price'] = '899';
			$data['booking_slot']['id'] = '';
			$data['booking_slot']['class_name'] = 'live_mock_submit';
			$data['booking_slot']['cities_list'] = $data['cities_list'];
			
			
			$data['main_content'] = 'live_mock_exam/index';

			$this->load->view(SITE_LAYOUT_PATH, $data); 
				
		}

		public function get_date_list(){

			$city_id = $this->input->post('city_id');
			$option = "<option value=''>Select Date</option>";

			if($city_id){
				//Get Cities List
				$data['cities_list'] = [];
				$where = array();
				$join_tables= array();

				$join_tables[] = array('product pr','pr.id = pme.product_id','inner');
				$where[] = array( FALSE, "DATE_FORMAT(pme.date_time,'%Y-%m-%d') > '".date('Y-m-d')."'" );
				$where[] = array( FALSE, 'pme.city_id = "'.$city_id.'"' );
				$fields = "pme.id,pme.date_time,pme.location,pr.price";
				$date_list = $this->base_model->get_advance_list('product_mock_exam pme', $join_tables, $fields, $where, 'result_array', 'pme.id', 'asc', 'pme.id');
	//echo $this->db->last_query();die;
				foreach($date_list as $res){
					$option .= "<option data-price='".$res['price']."' value='".$res['id']."'>".date('m/d/Y',strtotime($res['date_time'])).'('.$res['location'].')'."</option>";
				}
			}

			echo $option;die;
			

		}
		
		
}

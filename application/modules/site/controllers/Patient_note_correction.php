<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_note_correction extends Public_Controller
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
			
						
			//Patient Note Correction
			$where = array();
			$join_tables= array();
			$where[] = array( TRUE, 'pr.slug', 'patient-note-correction' );
			$fields = "*";
			$join_tables[] = array('product_attributes as pa','pa.product_id = pr.id');
			$patient_note_correction = $this->base_model->get_advance_list('product pr', $join_tables, $fields, $where, 'row_array', 'pr.id', 'desc', 'pr.id');
			
			$data['patient_note_correction'] = $patient_note_correction;
			$data['booking_slot']['title'] = $patient_note_correction['content_one'].' Booking Slot';
			$data['booking_slot']['price'] = $patient_note_correction['price'];
			$data['booking_slot']['id'] = $patient_note_correction['id'];
			$data['booking_slot']['class_name'] = 'patient_note_submit';	
			//pr($patient_note_correction);die;

			//Highlight Dates
			$data['highlight_dates'] = array();

			//Highlight Date List
			$where = array();
			$join_tables= array();
			$where[] = array( FALSE, 'pr.slug = "patient-note-correction"' );
			$where[] = array( FALSE, "DATE_FORMAT(DATE(aats.date_time),'%Y-%m-%d') >= '".date('Y-m-d')."'" );
			$where[] = array( FALSE, 'aats.is_complete = "0"' );
			$where[] = array( FALSE, 'aats.status = "1"' );
			$fields = "aats.date_time";
			$join_tables[] = array('product as pr','aats.product_id = pr.id');
			$highlight_dates = $this->base_model->get_advance_list('admin_availability_time_slot aats', $join_tables, $fields, $where, 'result_array', 'aats.id', 'asc', 'aats.id');

			foreach($highlight_dates as $date){
				$data['highlight_dates'][] = date('m/d/Y',strtotime($date['date_time']));
			}
			
			
			$data['main_content'] = 'patient_note_correction/index';

			$this->load->view(SITE_LAYOUT_PATH, $data); 
				
		}
		
		
		
		
}

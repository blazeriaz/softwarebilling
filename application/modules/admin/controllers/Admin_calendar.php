<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_calendar extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library(array('form_validation'));
		$this->load->language(array('flash_message','form_validation'), 'english');
		if(!$this->session->has_userdata('admin_is_logged_in'))
		{
			redirect(SITE_ADMIN_URI);
		}
		$this->load->helper('function_helper');
		$this->load->model('base_model'); 
	}

	public function index(){

		$data['css'] = $data['js'] = array();
		$data['css'][]='assets/themes/full_calendar/fullcalendar.min.css';
		$data['js'][]='assets/themes/full_calendar/moment.js';
		$data['js'][]='assets/themes/full_calendar/fullcalendar.min.js';


		$join_tables = $where = array();
		$fields = 'ts.id,ts.timeslot_name,ts.batch_name,ts.is_users_booked,ts.is_complete,bl.date_time,bl.class_id';
		$join_tables[] = array('admin_batch_list bl','ts.id = bl.time_slot_id','inner');
		$where[] = array( TRUE, 'bl.duration_part', 1);
	 	$timeslot_list = $this->base_model->get_advance_list('admin_availability_time_slot ts', $join_tables, $fields, $where, 'result_array','date_time','desc');
	 	

	 	$data['timeslot_list'] = $timeslot_list;
		$data['main_content'] = 'admin_calendar';
		$data['page_title']  = 'Timeslot Calendar';
		$this->load->view(ADMIN_LAYOUT_PATH, $data);

	}

}
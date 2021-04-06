<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Book_timeslot extends Public_Controller
{
	  	function __construct(){
    		parent::__construct();
			$this->load->library('form_validation');
			$this->load->language(array('flash_message','form_validation'), 'english');
			$this->load->model('base_model'); 
			$this->load->helper('frontend_helper');
			
		}

		public function validate_select($val,$field){
			if(empty($val)){
				$this->form_validation->set_message('validate_select','Please select '.$field);
				return false;
			}
			return true;
		}

		public function validate_time(){

			$product_id = $this->input->post('product_id');
			$selected_date = $this->input->post('date');
			$selected_time = $this->input->post('time');
			$date_time = $selected_date.' '.$selected_time;
			$timeslot_id = '';

			//Get Timeslot Details
			$where = array();
			$join_tables= array();
			$where[] = array( FALSE, 'pr.id = "'.$product_id.'"' );
			$where[] = array( FALSE, "DATE_FORMAT(aats.date_time,'%Y-%m-%d %H:%i') ='".date('Y-m-d H:i',strtotime($date_time))."'" );
			$where[] = array( FALSE, 'pt.class_count > "0"' );
			
			$fields = "aats.id";
			$join_tables[] = array('product as pr','aats.product_id = pr.id');
			$join_tables[] = array('product_type as pt','pr.product_type_id = pt.id');
			$time_slot_arr = $this->base_model->get_advance_list('admin_availability_time_slot aats', $join_tables, $fields, $where, 'row_array', 'aats.id', 'asc', 'aats.id');

			if(!empty($time_slot_arr)){
				$timeslot_id = $time_slot_arr['id'];
			}

			if(!empty($timeslot_id)){
				// Get Order Details
					$user_data = get_loggedin_user();
					$user_id = $user_data['user_id'];

					$where = array();
					$join_tables= array();
					$where[] = array( FALSE, 'o.timeslot_id = "'.$timeslot_id.'"' );
					$where[] = array( FALSE, 'o.user_id = "'.$user_id.'"' );
					$fields = "o.id";
					$order = $this->base_model->get_advance_list('orders o', $join_tables, $fields, $where, 'num_rows', 'o.id', 'asc', 'o.id');

					if(!empty($order)){
						$this->form_validation->set_message('validate_time','Already purchased !');
						return false;
					}
			}

			return true;

		}

		public function valid_skype($skype){

			if(preg_match("/^[a-zA-Z0-9.]+$/", $skype) == 1) {
				return true;
			}
			$this->form_validation->set_message('valid_skype', ucfirst('Please enter valid Skype ID'));
			return false;
		}
		
		public function index(){

			if ($this->input->server('REQUEST_METHOD') === 'POST'){

				$this->form_validation->set_rules('product_id', 'Product','trim|required');
				$this->form_validation->set_rules('skypeid', 'Skype ID','trim|required|callback_valid_skype');
				$this->form_validation->set_rules('date', 'Date','trim|required',array('required' => 'Please select the %s.'));
				$this->form_validation->set_rules('time', 'Time','trim|required|callback_validate_time',array('required' => 'Please select the %s.'));

				if ($this->form_validation->run()){

					$is_timeslot = 0;
					$timeslot_id = 'NIL';

					$product_id = $this->input->post('product_id');
					$selected_date = $this->input->post('date');
					$selected_time = $this->input->post('time');
					$date_time = $selected_date.' '.$selected_time;

					
					//Get Timeslot Details
					$where = array();
					$join_tables= array();
					$where[] = array( FALSE, 'pr.id = "'.$product_id.'"' );
					$where[] = array( FALSE, 'pt.class_count > "0"' );
					
					$fields = "pt.class_count";
					$join_tables[] = array('product as pr','pr.product_type_id = pt.id');
					$prod_arr = $this->base_model->get_advance_list('product_type as pt', $join_tables, $fields, $where, 'row_array', 'pt.id', 'asc', 'pt.id');

					if($prod_arr['class_count'] > 0){

						$is_timeslot = 1;

						//Get Timeslot Details
						$where = array();
						$join_tables= array();
						$where[] = array( FALSE, 'pr.id = "'.$product_id.'"' );
						$where[] = array( FALSE, "DATE_FORMAT(aats.date_time,'%Y-%m-%d %H:%i') ='".date('Y-m-d H:i',strtotime($date_time))."'" );
						$where[] = array( FALSE, 'pt.class_count > "0"' );
						
						$fields = "aats.id";
						$join_tables[] = array('product as pr','aats.product_id = pr.id');
						$join_tables[] = array('product_type as pt','pr.product_type_id = pt.id');
						$time_slot_arr = $this->base_model->get_advance_list('admin_availability_time_slot aats', $join_tables, $fields, $where, 'row_array', 'aats.id', 'asc', 'aats.id');

						if(!empty($time_slot_arr)){
							$timeslot_id = $time_slot_arr['id'];
						}

					}

					

					if($is_timeslot == 1){
						$result = array(
									'status'=>'success',
									'message'=>'Time Slot Alloted & Booking in progress',
									'product_id'=>$product_id,
									'is_timeslot'=>1,
									'is_livemock'=>0,
									'timeslot_id'=>$timeslot_id,
									'date_time' => strtotime($date_time),
									);
					}else{
						$result = array(
									'status'=>'success',
									'message'=>'Booking in progress',
									'product_id'=>$product_id,
									'is_timeslot'=>0,
									'is_livemock'=>0,
									);
					}

				}else{
					$result = array(
									'status' => 'error',
									'message' => '',
									'error' => $this->form_validation->get_error_array()
								);
				}

				echo json_encode($result);die;
				
			}

			
		}

		public function book_livemock(){

			if ($this->input->server('REQUEST_METHOD') === 'POST'){

				$this->form_validation->set_rules('city', 'City','trim|callback_validate_select[City]');
				$this->form_validation->set_rules('date', 'Date','trim|callback_validate_select[Date]');

				if ($this->form_validation->run()){

					$city_id = $this->input->post('city');
					$mock_id = $this->input->post('date');

					//Product Detail
					$prod_mock_detail = $this->base_model->getRow('product_mock_exam','product_id','id = "'.$mock_id.'"');
					$product_id = $prod_mock_detail->product_id;
					

					// Get Order Details

					$user_data = get_loggedin_user();
					$user_id = $user_data['user_id'];

					$where = array();
					$join_tables= array();
					$where[] = array( FALSE, 'o.products = "'.$product_id.'"' );
					$where[] = array( FALSE, 'o.user_id = "'.$user_id.'"' );
					$fields = "o.id";
					$order = $this->base_model->get_advance_list('orders o', $join_tables, $fields, $where, 'num_rows', 'o.id', 'asc', 'o.id');

					if(empty($order)){

						if(!empty($mock_id)){
							$result = array(
										'status'=>'success',
										'message'=>'Livemock order inprogress',
										'product_id'=>$product_id,
										'is_timeslot'=>0,
										'timeslot_id'=>'NIL',
										'is_livemock' => 1,
										'mock_id' => $mock_id,
										);
						}else{
							$result = array(
										'status'=>'error',
										'message'=>'Unable to place order',
										);
						}

					}else{
						$result = array(
									'status'=>'error',
									'message'=>'Already Purchased !',
									);	
					}

				}else{
					$result = array(
									'status' => 'error',
									'message' => '',
									'error' => $this->form_validation->get_error_array()
								);
				}

				echo json_encode($result);die;
				
			}

		}

		public function get_slot_timing(){

			$time_list = "<option value=''>Select Time</option>";

			$product_id = $this->input->post('product_id');
			$selected_date = $this->input->post('selected_date');

			$where = array();
			$join_tables= array();
			$where[] = array( FALSE, 'pr.id = "'.$product_id.'"' );
			$where[] = array( FALSE, "DATE_FORMAT(DATE(aats.date_time),'%Y-%m-%d') ='".date('Y-m-d',strtotime($selected_date))."'" );
			$where[] = array( FALSE, 'aats.is_complete = "0"' );
			$fields = "date_time";
			$join_tables[] = array('product as pr','aats.product_id = pr.id');
			$time_list_arr = $this->base_model->get_advance_list('admin_availability_time_slot aats', $join_tables, $fields, $where, 'result_array', 'aats.id', 'asc', 'aats.id');

//echo $this->db->last_query();die;

			if(!empty($time_list_arr)){
				foreach($time_list_arr as $time){
					$time_list .= "<option value='".date('H:i',strtotime($time['date_time']))."'>".date('h A',strtotime($time['date_time']))."</option>";
				}
			}else{
				$allowed_times = $this->config->item('allowed_times');
				foreach($allowed_times as $i=>$t){
					$time_list .= "<option value='".$i."'>".$t."</option>";
				}
			}

			if(!empty($time_list_arr)){
				echo $result = json_encode(array('status'=>'success','msg'=>'Please select Time','time_list' => $time_list));	
			}else{
				echo $result = json_encode(array('status'=>'proceed','msg'=>'Active Time not available for this date currently, anyways please proceed booking later you can contact our admin to fix suitable timing','time_list' => $time_list));
			}
		}
		
		
}

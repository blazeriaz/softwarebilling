<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_timeslot extends Admin_Controller
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
		$this->load->helper('thumb_helper');
		$this->load->helper('html');
		$this->load->model('base_model');
	}

	private $temp_date_time_list = array();

	public function index($page_num = 1)
	{
		$data['css'] = $data['js'] = array();
		$data['css'][]='assets/themes/css/jquery.datetimepicker.css';
		$data['js'][]='assets/themes/js/jquery.datetimepicker.full.js';

		$search_name_keyword  =  isset($_POST['search_name'])?trim($_POST['search_name']):(isset($_SESSION['ats_search_name'])?$_SESSION['ats_search_name']:'');
		$this->session->set_userdata('ats_search_name', $search_name_keyword); 		
		$keyword_name_session = $this->session->userdata('ats_search_name');
		if($keyword_name_session != ''){
			$keyword_name = $this->session->userdata('ats_search_name');
		}else{
			isset($_SESSION['ats_search_name'])?$this->session->unset_userdata('ats_search_name'):'';
			$keyword_name = "";
		}
		$search_category_keyword  = isset($_POST['search_category'])?trim($_POST['search_category']):(isset($_SESSION['ats_search_category'])?$_SESSION['ats_search_category']:'');
		$this->session->set_userdata('ats_search_category', $search_category_keyword);
		$search_category_session = $this->session->userdata('ats_search_category');
		if($search_category_session != ''){
			$search_category = $this->session->userdata('ats_search_category');
		}else{
			isset($_SESSION['ats_search_category'])?$this->session->unset_userdata('ats_search_category'):'';
			$search_category = "";
		}

		$search_from_date_keyword  = isset($_POST['search_from_date'])?trim($_POST['search_from_date']):(isset($_SESSION['ats_search_from_date'])?$_SESSION['ats_search_from_date']:'');
		$search_to_date_keyword  = isset($_POST['search_to_date'])?trim($_POST['search_to_date']):(isset($_SESSION['ats_search_to_date'])?$_SESSION['ats_search_to_date']:'');
		$this->session->set_userdata('ats_search_from_date', $search_from_date_keyword);
		$this->session->set_userdata('ats_search_to_date', $search_to_date_keyword);
		$keyword_from_date_session = $this->session->userdata('ats_search_from_date');
		$keyword_to_date_session = $this->session->userdata('ats_search_to_date');
		if($keyword_from_date_session != ''){
			$keyword_from_date = $this->session->userdata('ats_search_from_date');
			$keyword_from_date = date('Y-m-d H:i',strtotime($keyword_from_date));
		}else{
			isset($_SESSION['ats_search_from_date'])?$this->session->unset_userdata('ats_search_from_date'):'';
			$keyword_from_date = "";
		}
		if($keyword_to_date_session != ''){
			$keyword_to_date = $this->session->userdata('ats_search_to_date');
			$keyword_to_date = date('Y-m-d H:i',strtotime($keyword_to_date));
		}else{
			isset($_SESSION['ats_search_to_date'])?$this->session->unset_userdata('ats_search_to_date'):'';
			$keyword_to_date = "";
		}

		$this->load->library('pagination');
		$config  = $this->config->item('back_pagination');
		$config["base_url"] = base_url().SITE_ADMIN_URI."/admin_timeslot/index";
		$data["per_page"] = $config["per_page"] = $this->config->item('admin_page_per_limit');
		$config["uri_segment"] = 4;
		$data['limit_end'] = $limit_end = ($page_num - 1) * $config['per_page'];  
		$limit_start = $config['per_page'];
		$join_tables = $where = array(); 

		if($keyword_name){
			$where[] = array( FALSE, "(ats.timeslot_name LIKE '%".$keyword_name."%' OR ats.batch_name LIKE '%".$keyword_name."%')");
			$data['keyword_name'] = $keyword_name;
		}else{
			$data['keyword_name'] = "";
		}
		if($search_category){
			$where[] = array( FALSE,"(ats.product_type_id = '".$search_category."')");
			$data['keyword_search_category'] = $search_category;
		}else{
			$data['keyword_search_category'] = "";
		}

		$data['keyword_from_date'] = "";
		$data['keyword_to_date'] = "";
		
		if($keyword_from_date&&empty($keyword_to_date)){
			$where[] = array( FALSE,"((DATE_FORMAT(ats.date_time,'%Y-%m-%d %H:%i') >= DATE_FORMAT('".$keyword_from_date."','%Y-%m-%d %H:%i'))
					OR
				(DATE_FORMAT(abl.date_time,'%Y-%m-%d %H:%i') >= DATE_FORMAT('".$keyword_from_date."','%Y-%m-%d %H:%i')))
				");
			$data['keyword_from_date'] = date('d-m-Y h:i A',strtotime($keyword_from_date));
		}
		
		if($keyword_to_date&&empty($keyword_from_date)){
			$where[] = array( FALSE,"((DATE_FORMAT(ats.date_time,'%Y-%m-%d %H:%i') <= DATE_FORMAT('".$keyword_to_date."','%Y-%m-%d %H:%i'))
					OR
				(DATE_FORMAT(abl.date_time,'%Y-%m-%d %H:%i') <= DATE_FORMAT('".$keyword_to_date."','%Y-%m-%d %H:%i')))
				");
			$data['keyword_to_date'] = date('d-m-Y h:i A',strtotime($keyword_to_date));
		}
		
		if($keyword_from_date&&$keyword_to_date){
			$where[] = array( FALSE,"((DATE_FORMAT(ats.date_time,'%Y-%m-%d %H:%i') >= DATE_FORMAT('".$keyword_from_date."','%Y-%m-%d %H:%i') AND DATE_FORMAT(ats.date_time,'%Y-%m-%d %H:%i') <= DATE_FORMAT('".$keyword_to_date."','%Y-%m-%d %H:%i')) 
					OR 
				(DATE_FORMAT(abl.date_time,'%Y-%m-%d %H:%i') >= DATE_FORMAT('".$keyword_from_date."','%Y-%m-%d %H:%i') AND DATE_FORMAT(abl.date_time,'%Y-%m-%d %H:%i') <= DATE_FORMAT('".$keyword_to_date."','%Y-%m-%d %H:%i')))");
			$data['keyword_from_date'] = date('d-m-Y h:i',strtotime($keyword_from_date));
			$data['keyword_to_date'] = date('d-m-Y h:i',strtotime($keyword_to_date));
		}

		//Timeslot List
		$join_tables[] = array('admin_batch_list abl','abl.time_slot_id = ats.id','inner');
		$fields = 'ats.id,ats.product_type_id,ats.product_id,ats.timeslot_name,ats.batch_name,ats.date_time,ats.is_users_booked,ats.is_complete,ats.status,ats.created';
		$data['total_rows'] = $config['total_rows'] = $this->base_model->get_advance_list('admin_availability_time_slot ats', $join_tables, $fields, $where, 'num_rows','','','ats.id');
		$timeslot_list = $data['admin_timeslot'] = $this->base_model->get_advance_list('admin_availability_time_slot ats', $join_tables, $fields, $where, '', 'ats.id', 'desc', 'ats.id', $limit_start, $limit_end);

		$this->pagination->initialize($config);


		//Batch Details
		$join_tables = $where = array();

		$where[] = array(TRUE,'abl.duration_part',1);
		$fields = 'abl.time_slot_id,abl.class_id,abl.date_time';
		$batch_details = $this->base_model->get_advance_list('admin_batch_list abl', $join_tables, $fields, $where, '','','','abl.id');
		
		$timeslot_batch_details = array();
		$timeslot_name = '';
		foreach($timeslot_list as $timeslot){
			foreach($batch_details as $batch){
				if($batch['time_slot_id'] == $timeslot['id']){
					$timeslot_batch_details[$timeslot['id']][$batch['class_id']] = $batch['date_time'];
				}
			}
		}
		$data['slot_details'] = $timeslot_batch_details;
		//pr($data['admin_timeslot']);die;
		$data['product_type_list'] = $this->base_model->getArrayList('product_type',array('class_count > 0'));
		$data['product_list'] = $this->base_model->getArrayList_type1('product',array('status = 1'),'','product_type_id','name');
		$data['main_content'] = 'admin_timeslot/index';
		$data['page_title']  = 'Manage Admin Timeslot';
		$this->load->view(ADMIN_LAYOUT_PATH, $data); 	
	}
	public function reset()
	{
		$this->session->unset_userdata('ats_search_name');
		$this->session->unset_userdata('ats_search_category');
		$this->session->unset_userdata('ats_search_from_date');
		$this->session->unset_userdata('ats_search_to_date');
		redirect(base_url().SITE_ADMIN_URI.'/admin_timeslot/');
	}
	function update_status($id,$status,$pageredirect,$pageno)
	{
		$table_name = 'admin_availability_time_slot';

		if($status==1){
			$timeslot_detail = $this->base_model->getRow('admin_availability_time_slot','date_time','id ="'.$id.'"',array('return'=>'row_array'));
			
			if(!$this->check_usertimeslot_exists($timeslot_detail['date_time'])){
				$this->session->set_flashdata('custom_msg_error', 'Please reschedule all alloted users before changing status!...');
				redirect(base_url().SITE_ADMIN_URI.'/admin_timeslot/'.$pageredirect.'/'.$pageno.'/'.$fieldsorts.'/'.$typesorts);		
			}

		}

		change_status($table_name,$id,$status,$pageredirect,$pageno);
		$this->session->set_flashdata('flash_message', $this->lang->line('update_record'));
		redirect(base_url().SITE_ADMIN_URI.'/admin_timeslot/'.$pageredirect.'/'.$pageno.'/'.$fieldsorts.'/'.$typesorts);
	}

	function check_admintimeslot_exists($date_time){
		
		$query = "SELECT * FROM admin_batch_list WHERE DATE_FORMAT(date_time,'%Y-%m-%d %H:%i') = '".date('Y-m-d H:i',strtotime($date_time))."'";
		/*$query = "SELECT * FROM admin_availability_time_slot ts INNER JOIN admin_batch_list bl ON ts.id = bl.time_slot_id  WHERE DATE_FORMAT(bl.date_time,'%Y-%m-%d %H:%i') = '".date('Y-m-d H:i',strtotime($date_time))."' AND ts.is_complete = '0'";*/
		$query_rsrc = $this->db->query($query);
		$count = $query_rsrc->num_rows();
		if(empty($count)){
			return true;
		}else{
			return false;
		}
	}

	function check_usertimeslot_exists($date_time){
		$query = "SELECT * FROM users_batch_time_slot WHERE DATE_FORMAT(date_time,'%Y-%m-%d %H:%i') = '".date('Y-m-d H:i',strtotime($date_time))."'";
		$query_rsrc = $this->db->query($query);
		$count = $query_rsrc->num_rows();
		if(empty($count)){
			return true;
		}else{
			return false;
		}
	}

	public function validate_product_type($val){
		if(!empty($val)){
			$class_count = $this->input->post('class_count');
			if(empty($class_count)){
				$this->form_validation->set_message('validate_product_type', 'This Product Type not allowed.');	
				return FALSE;
			}
		}else{
			$this->form_validation->set_message('validate_product_type', 'Please choose the Product Type.');
			return FALSE;
		}
	}

	public function validate_product($val){
		if(empty($val)){
			$this->form_validation->set_message('validate_product', 'Please choose the Product.');
			return FALSE;
		}
	}

	public function validate_timeslot_date_time($val){
		if(!empty($val)){
			$time_list = $this->temp_date_time_list;
			if((!$this->check_admintimeslot_exists($val)) || (!$this->check_usertimeslot_exists($val)) || (in_array($val,$time_list))){
				$this->form_validation->set_message('validate_timeslot_date_time', 'Timeslot Date & Time already exists , please choose another Date & Time.');	
				return FALSE;
			}else{
				if((date('i',strtotime($val))) == '0'){
					$time_list[] = $val;
					$this->temp_date_time_list = $time_list;
				}else{
					$this->form_validation->set_message('validate_timeslot_date_time', 'Please select valid time.');
					return FALSE;
				}
			}
		}
	}

	public function invalid_date_time($val,$field){
		$this->form_validation->set_message('invalid_date_time', 'Timeslot Date & Time should be higher than Class '.$field.', Please select higher date.');	
		return FALSE;
	}

	public function invalid_time(){
		$this->form_validation->set_message('invalid_time', 'Please select future Date & Time.');	
		return FALSE;
	}
	
	public function add(){

		$data['css'] = $data['js'] = array();
		$data['css'][]='assets/themes/css/jquery.datetimepicker.css';
		$data['js'][]='assets/themes/js/jquery.datetimepicker.full.js';

		$data['post'] = FALSE;
		if ($this->input->server('REQUEST_METHOD') === 'POST'){

			$this->form_validation->set_rules('product_type_id', 'Product Type','trim|callback_validate_product_type');
			
			if($this->input->post('noProductHide_hidden') != '1'){
				$this->form_validation->set_rules('product_id', 'Product','trim|callback_validate_product');
				$this->form_validation->set_rules('batch_name', 'Batch Name','trim');
			}

			
			$this->form_validation->set_rules('timeslot_name', 'Timeslot Name','trim|required|is_unique[admin_availability_time_slot.timeslot_name]');
			
			$class_count = $this->input->post('class_count');
			if(!empty($class_count)){
				for($count=1;$count<=$class_count;$count++){

					$validate_timeslot_rules = 'trim|required|callback_validate_timeslot_date_time';

					if(strtotime($this->input->post('timeslot_date_time_'.$count)) <= strtotime(date('Y-m-d H:i:s'))){
						$validate_timeslot_rules .= '|callback_invalid_time';
					}

						$this->form_validation->set_rules('timeslot_date_time_'.$count,'Timeslot Date & Time',$validate_timeslot_rules);
				}
			}



			if ($this->form_validation->run()){

				$date = date('Y-m-d H:i:s');
				$table = 'admin_timeslot';

				$product_type_id = $this->input->post('product_type_id');

				$prod_detail = $this->base_model->getRow('product_type','time_duration','id = "'.$product_type_id.'"');
				$time_duration = $prod_detail->time_duration;

				$ts_date_time = $this->input->post('timeslot_date_time_1');
				$ts_date_time = date('Y-m-d H:i:s',strtotime($ts_date_time));

				$update_array = array (	'product_type_id' => $product_type_id,
										'product_id' => $this->input->post('product_id_hidden'),
										'timeslot_name' => $this->input->post('timeslot_name'),
										'batch_name' => $this->input->post('batch_name'),
										'date_time' => $ts_date_time,
										'time_duration' => $time_duration,
										'status' => $this->input->post('status'),
										'created' => $date
									  );

				$timeslot_id = $this->base_model->insert('admin_availability_time_slot', $update_array);

				//Update batch details in admin_batch_list
				if(!empty($class_count)){

					for($class_id=1;$class_id<=$class_count;$class_id++){

						$ts_date_time = $this->input->post('timeslot_date_time_'.$class_id);

						for($duration_part=1;$duration_part<=$time_duration;$duration_part++){

							if($duration_part>1){
								$ts_date_time = date('Y-m-d H:i:s',strtotime($ts_date_time.'+ '.($duration_part-1).' hour'));
							}else{
								$ts_date_time = date('Y-m-d H:i:s',strtotime($ts_date_time));
							}

							$insert_array = array (	'time_slot_id' => $timeslot_id,
													'class_id' => $class_id,
													'date_time' => $ts_date_time,
													'duration_part' => $duration_part
												  );
							$this->base_model->insert('admin_batch_list', $insert_array);

						}
					}
				}

				if($timeslot_id){
					$result = array(
								'status' => 'success',
								'msg_type' => 'custom_msg_succ',
								'msg' => $this->lang->line('add_record'),
								'url' => base_url().'admin/admin_timeslot'
								);
				}else{
					$result = array(
								'status' => 'failure',
								'msg_type' => 'custom_msg_error',
								'msg' => 'Unable to Add Timeslot',
								'url' => base_url().'admin/admin_timeslot'
							);
				}
			}else{
					$result = array(
									'status' => 'error',
									'msg_type' => 'custom_msg_error',
									'msg' => '',
									'error' => $this->form_validation->get_error_array()
								);
			}
				
				$this->session->set_flashdata($result['msg_type'], $result['msg']);
				if($this->input->is_ajax_request()){
					echo json_encode($result);die;
				}

				$data['post'] = TRUE;
		}

		$data['product_type_list'][''] = 'Select Product Type';
		$data['product_types'] = $this->base_model->getArrayList('product_type',array('class_count > 0'),'',array('id','name','class_count'));
		foreach($data['product_types'] as $id => $val){
			if($id){
				$data['product_type_list'][$id] = $val['name'];
			}
		}
		$data['main_content'] = 'admin_timeslot/add';
		$data['page_title']  = 'Add Timeslot'; 
		$this->load->view(ADMIN_LAYOUT_PATH, $data); 	
	}
	public function edit($id = NULL){
		$data['css'] = $data['js'] = array();
		$data['css'][]='assets/themes/css/jquery.datetimepicker.css';
		$data['js'][]='assets/themes/js/jquery.datetimepicker.full.js';

		$timeslot_detail = $this->base_model->getRow('admin_availability_time_slot','product_type_id,timeslot_name','id = "'.$id.'"');

		$data['post'] = FALSE;
		$admin_batch_id = '';
		$batch_details_list = '';
		$cond = array();
		$cond[] = array(
						'direct' => 0,
						'rule' => 'where',
						'field' => 'duration_part',
						'value' => 1
					);
		$cond[] = array(
						'direct' => 0,
						'rule' => 'where',
						'field' => 'time_slot_id',
						'value' => $id
					);
		$batch_details_list = $this->base_model->getList('admin_batch_list','class_id,date_time',$cond);

		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			$this->form_validation->set_rules('product_type_id', 'Product Type','trim|callback_validate_product_type');
			if($this->input->post('noProductHide_hidden') != '1'){
				$this->form_validation->set_rules('product_id', 'Product','trim|callback_validate_product');
				$this->form_validation->set_rules('batch_name', 'Batch Name','trim');
			}

			$is_unique_timeslot_name = '';
			if($timeslot_detail->timeslot_name != $this->input->post('timeslot_name')){
				$is_unique_timeslot_name = '|is_unique[admin_availability_time_slot.timeslot_name]';
			}
			$this->form_validation->set_rules('timeslot_name', 'Timeslot Name','trim|required'.$is_unique_timeslot_name);
			

			$batch_details = array();
			foreach($batch_details_list as $batch){
				$batch_details[$batch['class_id']] = $batch['date_time'];
			}

			
			$class_count = $this->input->post('class_count');

			if(!empty($class_count)){
				for($count=1;$count<=$class_count;$count++){

					$validate_timeslot_rules = 'trim|required';

					if(strtotime($this->input->post('timeslot_date_time_'.$count)) != strtotime($batch_details[$count])){
						$validate_timeslot_rules .= '|callback_validate_timeslot_date_time';
					}

					if(strtotime($this->input->post('timeslot_date_time_'.$count)) <= strtotime(date('Y-m-d H:i:s'))){
						$validate_timeslot_rules .= '|callback_invalid_time';
					}					

					$this->form_validation->set_rules('timeslot_date_time_'.$count,'Timeslot Date & Time',$validate_timeslot_rules);
				}
			}

			if ($this->form_validation->run())
			{
					$date = date('Y-m-d H:i:s');
					$table = 'admin_timeslot';

					$product_type_id = $this->input->post('product_type_id_hidden');

					$prod_detail = $this->base_model->getRow('product_type','time_duration','id = "'.$product_type_id.'"');
					$time_duration = $prod_detail->time_duration;

					$ts_date_time = $this->input->post('timeslot_date_time_1');
					$ts_date_time = date('Y-m-d H:i:s',strtotime($ts_date_time));

					$update_array = array (	'product_type_id' => $product_type_id,
											'product_id' => $this->input->post('product_id_hidden'),
											'timeslot_name' => $this->input->post('timeslot_name'),
											'batch_name' => $this->input->post('batch_name'),
											'date_time' => $ts_date_time,
											'time_duration' => $time_duration,
											'status' => $this->input->post('status'),
											'created' => $date
										  );

					$this->base_model->update('admin_availability_time_slot', $update_array,array('id'=>$id));

					//Update batch details in admin_batch_list

					$timeslot_id = $id;
					$this->base_model->delete('admin_batch_list',array('time_slot_id' => $timeslot_id));

					if(!empty($class_count)){

						for($class_id=1;$class_id<=$class_count;$class_id++){

							$ts_date_time = $this->input->post('timeslot_date_time_'.$class_id);

							for($duration_part=1;$duration_part<=$time_duration;$duration_part++){

								if($duration_part>1){
									$ts_date_time = date('Y-m-d H:i:s',strtotime($ts_date_time.'+ '.($duration_part-1).' hour'));
								}else{
									$ts_date_time = date('Y-m-d H:i:s',strtotime($ts_date_time));
								}

								$insert_array = array (	'time_slot_id' => $timeslot_id,
														'class_id' => $class_id,
														'date_time' => $ts_date_time,
														'duration_part' => $duration_part
													  );
								$admin_batch_id = $this->base_model->insert('admin_batch_list', $insert_array);

							}							
						}
					}

					if($admin_batch_id){					
						$result = array(
									'status' => 'success',
									'msg_type' => 'custom_msg_succ',
									'msg' => $this->lang->line('update_record'),
									'url' => base_url().'admin/admin_timeslot'
									);
					}else{
						$result = array(
									'status' => 'failure',
									'msg_type' => 'custom_msg_error',
									'msg' => 'Unable to Edit Timeslot',
									'url' => base_url().'admin/admin_timeslot'
								);
					}
			}else{
					$result = array(
									'status' => 'error',
									'msg_type' => 'custom_msg_error',
									'msg' => '',
									'error' => $this->form_validation->get_error_array()
								);
			}
				
				$this->session->set_flashdata($result['msg_type'], $result['msg']);
				if($this->input->is_ajax_request()){
					echo json_encode($result);die;
				}

				$data['post'] = TRUE;
		}

		$data['product_type_list'][''] = 'Select Product Type';
		$data['product_types'] = $this->base_model->getArrayList('product_type',array('class_count > 0'),'',array('id','name','class_count'));
		foreach($data['product_types'] as $key => $val){
			if($key){
				$data['product_type_list'][$key] = $val['name'];
			}
		}

		$product_type_id = $timeslot_detail->product_type_id;
		//$data['product_list'] = $this->base_model->getArrayList('product',array('status = 1','product_type_id = "'.$product_type_id.'"'));
		$data['product_list'] = $this->base_model->getArrayList_type1('product',array('status = 1','product_type_id = "'.$product_type_id.'"'),'','product_type_id','name');

		$fields = "id,product_type_id,product_id,timeslot_name,batch_name,date_time,time_duration,status";
		$data['data'] = $this->base_model->getRow('admin_availability_time_slot',$fields,array('id'=>$id),array('return'=>'row_array'));

		$data['batch_details'] = array();
		foreach($batch_details_list as $batch){
			$data['batch_details'][$batch['class_id']] = $batch['date_time'];
		}

		$data['main_content'] = 'admin_timeslot/edit';
		$data['page_title']  = 'Edit Timeslot'; 
		$this->load->view(ADMIN_LAYOUT_PATH, $data); 	
	}
	public function view($id = NULL){
			/*$fields = "id,product_type_id,timeslot_name,batch_name,date_time,time_duration";
			$data['timeslot'] = $this->base_model->getRow('admin_availability_time_slot',$fields,array('id'=>$id),array('return'=>'row_array'));*/
			$join_tables = $where = array();
			$where[] = array( FALSE,"(ats.id = '".$id."')");
			$join_tables[] = array('admin_batch_list abl','abl.time_slot_id = ats.id','inner');
			$fields = "ats.id,ats.product_type_id,ats.timeslot_name,ats.batch_name,ats.date_time,ats.time_duration";
			$data['timeslot'] = $this->base_model->get_advance_list('admin_availability_time_slot ats', $join_tables, $fields, $where, 'row_array');
			
			if(!$data['timeslot']){
				$this->session->set_flashdata('flash_failure_message', "Your requested Page not exist");
				redirect(base_url().SITE_ADMIN_URI.'/admin_timeslot');
			}

			$batch_details_list = '';
			$cond = array();
			$cond[] = array(
							'direct' => 0,
							'rule' => 'where',
							'field' => 'duration_part',
							'value' => 1
						);
			$cond[] = array(
							'direct' => 0,
							'rule' => 'where',
							'field' => 'time_slot_id',
							'value' => $id
						);
			$batch_details_list = $this->base_model->getList('admin_batch_list','class_id,date_time',$cond);
			
			$data['batch_details'] = array();
			foreach($batch_details_list as $batch){
				$data['batch_details'][$batch['class_id']] = $batch['date_time'];
			}

			$data['product_type_list'] = $this->base_model->getArrayList('product_type',array('class_count > 0'));

			$data['main_content'] = 'admin_timeslot/view';
		  	$data['page_title']  = 'View Timeslot';  
			$this->load->view(ADMIN_LAYOUT_PATH, $data); 	
		}
	function get_timeslot_name(){

		$product_type_id = $this->input->post('product_type_id');
		$timeslot_date_time = $this->input->post('timeslot_date_time');

		if(!empty($product_type_id) && !empty($timeslot_date_time)){

		$prod_detail = $this->base_model->getRow('product_type','shortform','id = "'.$product_type_id.'"');
		$prod_name =  $prod_detail->shortform;
		$date_format = date('dMy',strtotime($timeslot_date_time));
		$time_format = date('hA',strtotime($timeslot_date_time));
		$timeslot_name = $prod_name.'-'.$date_format.'-'.$time_format;
		
		$res = array(
				'status' => 'success',
				'timeslot_name' => $timeslot_name
				);
		}else{
			$res = array(
				'status' => 'error',
				'msg' => 'Please select all required fields'
				);
		}
		echo json_encode($res);die;
	}
	function get_timeslot_details(){
		$product_type_id = $this->input->post('product_type_id');
		$batch_details_serial = $this->input->post('batch_details');
		$product_id = $this->input->post('product_id');

		$batch_details = unserialize($batch_details_serial);
		$noProductHide = '0';

		if(!empty($product_type_id)){

		$content_div = '';

		$join_tables = $where = array();
		$where[] = array(TRUE,'pt.id',$product_type_id);
		$join_tables[] = array('product p','p.product_type_id = pt.id','left');
		$fields = 'pt.shortform,pt.slug as type_slug,pt.class_count,p.name as product_name,p.id as product_id';
		$prod_detail = $this->base_model->get_advance_list('product_type pt', $join_tables, $fields, $where, 'row_array', 'pt.id', 'desc', 'pt.id','','');

		if(empty($prod_detail['product_id'])){
			$noProductHide = '1';
		}

		if(!empty($prod_detail) && ( ($prod_detail['product_id']) || ($prod_detail['type_slug'] == 'componsation-general') || ($prod_detail['type_slug'] == 'componsation-onmock')
			|| ($prod_detail['type_slug'] == 'componsation-rrc') || ($prod_detail['type_slug'] == 'componsation-ccc')
		 )){

		$content_div .= "<fieldset class='noProductHide'>
							<legend>Select Product</legend>

							<div class='form-group'>
                            	<label class='col-sm-2 control-label' for='product_id'>Product<span class='required'>*</span></label>
                                <div class='col-sm-8'>".
                                	form_input('product_id',$prod_detail['product_name'],'id = "product_id" class="form-control product_id" readonly').
                                	"<input type='hidden' name='product_id_hidden' value='".$prod_detail['product_id']."' id='product_id_hidden' class='product_id_hidden' />".
                                 "</div>
							</div>

							</fieldset>
							";

		$class_count = $prod_detail['class_count'];

		if($class_count>=1){
			$hide_date_time = true;

			for($count=1;$count<=$class_count;$count++){
				$date_time_expired = '';
				$date_time_expired_class = '';
				$timeslot_date_time = isset($_POST['timeslot_date_time_'.$count])?$_POST['timeslot_date_time_'.$count]:((isset($batch_details[$count])&&!empty($batch_details[$count]))?$batch_details[$count]:'');
				if($timeslot_date_time){
					if(strtotime(date('d-m-Y H:i'))>strtotime($timeslot_date_time)){
						$date_time_expired = 'readonly';
						$date_time_expired_class = 'nodatetimepicker';
					}
					$timeslot_date_time = date('d-m-Y H:i',strtotime($timeslot_date_time));
				}

				$content_div .= "<fieldset>
							<legend>Class ".$count."</legend>

							<div class='form-group'>
                            	<label class='col-sm-2 control-label' for='timeslot_date_time_".$count."'>Timeslot Date & Time <span class='required'>*</span></label>
                                <div class='col-sm-8'>
                                	<input type='text' name='timeslot_date_time_".$count."' id='timeslot_date_time_".$count."' class='form-control timeslot_date_time ".$date_time_expired_class."' value='".$timeslot_date_time."' placeholder='Timeslot Date & Time' ".$date_time_expired." />
                                 </div>
							</div>

							</fieldset>
							";
			}

			$content_div .= "<div class='form-group'>".
                            	form_label('Timeslot Name <span class="required">*</span>','timeslot_name',array('class'=>'col-sm-2 control-label')).
                                "<div class='col-sm-8'>".
									form_input('timeslot_name',set_value('timeslot_name'),'placeholder= "Timeslot Name" class="form-control" id="timeslot_name"').
                                 "</div>
							</div>";
							

			
			$content_div .= "<input type='hidden' name='class_count' id='class_count' value='".$class_count."' />";
			$content_div .= "<input type='hidden' name='batch_details_hidden' id='batch_details_hidden' value='".serialize($batch_details)."' />";
		}

		$res = array(
				'status' => 'success',
				'content_div' => $content_div,
				'noProductHide' => $noProductHide
				);

		}else{
			$res = array(
				'status' => 'error',
				'msg' => 'No products available for this type',
				'noProductHide' => $noProductHide
				);
		}

		}else{
			$res = array(
				'status' => 'error',
				'msg' => 'Please select all required fields',
				'noProductHide' => $noProductHide
				);
		}
		echo json_encode($res);die;
	}

	public function delete($id){
		
		$this->base_model->delete('admin_availability_time_slot',array('id'=>$id));
		$this->base_model->delete('admin_batch_list',array('time_slot_id'=>$id));

		$this->session->set_flashdata('flash_message', $this->lang->line('delete_record'));
		redirect(base_url(SITE_ADMIN_URI.'/admin_timeslot'));
	}
}

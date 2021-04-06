<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Patient_note_practise extends Public_Controller
{
	  	function __construct()
  		{
    		parent::__construct();
			$this->load->library('form_validation');
			$this->load->language(array('flash_message','form_validation'), 'english');
			$this->load->model('base_model');
			$this->load->helper('frontend_helper');
			$this->load->helper('profile_helper');
			if(!is_loggedin()){
				redirect(base_url("login")."?redirect_url=".urldecode('patient-note-practise'));	
			}
			
		}

		/******** Admin login function *******/
		public function index()
		{
			$data['js'] = $data['css'] = array();
			//$data['css'][] = "assets/site/css/jquery.countdownTimer.css";
			$data['js'][] = "assets/site/js/jquery.countdownTimer.js";
			$data['js'][] = "assets/site/js/underscore.1.8.3.js";
			$data['js'][] = "assets/site/js/jquery.textArea.js";
			$data['js'][] = "assets/site/js/moment.js";
			$data['js'][] = "assets/site/js/ez.countimer.js";
			

			
			//Patient Note Practise
			$patient_note_practise = array();
			$patient_note_practise_li = get_site_settings_category('patientnotecorrection');
			foreach($patient_note_practise_li as $patient_note_practise_val){
				$patient_note_practise[$patient_note_practise_val['name']] = $patient_note_practise_val['value'];
			}
			$data['patient_note_practise'] = $patient_note_practise;

			//pr($patient_note_practise);die;
			
			$data['main_content'] = 'patient_note_practise/index';

			$this->load->view(SITE_LAYOUT_PATH, $data); 
				
		}

		public function patient_note_submit(){

			if ($this->input->server('REQUEST_METHOD') === 'POST'){

				$notEmpty = 1;

				$user_id = '';
				$order_id = '';

				if(is_loggedin()){
					$user_data = get_loggedin_user();
					$user_id = $user_data['user_id'];
				}

				if ($notEmpty){

						$date = date('Y-m-d H:i:s');


						//Title
						$insert_array = array (	
												'user_id' => $user_id,
												'order_id' => $order_id,
												'text_one' => $this->input->post('text_hc'),
												'text_two' => $this->input->post('text_pe'),
												'diagnosis_one_title' => $this->input->post('diag_title_1'),
												'diagnosis_two_title' => $this->input->post('diag_title_2'),
												'diagnosis_three_title' => $this->input->post('diag_title_3'),
												'created' => $date
											  );

						$content_id = $this->base_model->insert('product_pnc_content', $insert_array);

						//History , Physical
						for($rcount=1;$rcount<=3;$rcount++){

							$cont_arr = array();
							
							for($cont = 1; $cont <= $this->input->post('rowCnt'.$rcount); $cont++){

								switch($rcount){
									case 1:
										$diag_type = 'one';
									break;
									case 2:
										$diag_type = 'two';
									break;
									case 3:
										$diag_type = 'three';
									break;
								}

								$cont_arr[] = array(
													'product_pnc_content_id' => $content_id,
													'diagnosis_type' => $diag_type,
													'text_one' => $this->input->post('his_fin_'.$rcount.'_'.$cont),
													'text_two' => $this->input->post('phy_ex_'.$rcount.'_'.$cont),
												);
							}
							
							$this->base_model->insert_batch('product_pnc_diagnosis',$cont_arr);

						}

						//Diag Study
						$cont1_arr = array();
						for($cont = 1; $cont <= $this->input->post('rowCnt4'); $cont++){
								$cont1_arr = array(
													'product_pnc_content_id' => $content_id,
													'diagnosis_type' => "four",
													'text_one' => $this->input->post('diag_stud_'.$cont),
													'text_two' => '',
												);
								$this->base_model->insert('product_pnc_diagnosis',$cont1_arr);
							}

						//Submit List
						$sbmt_lst_arr = array(
											'user_id' => $user_id,
											'order_id' => $order_id,
											'product_pnc_content_id' => $content_id,
											'status' => 1,
											'is_read' => 0,
											'created' => $date
										);

						$sbmt_list_id = $this->base_model->insert('product_pnc_submit_list', $sbmt_lst_arr);
						

						if($sbmt_list_id){

							$this->send_patient_note_mail($sbmt_list_id);

							$result = array(
										'status' => 'success',
										'msg_type' => 'custom_msg_succ',
										'msg' => 'Details Submitted Successfully',
										'url' => base_url().'patient-note-practise'
										);
						}else{
							$result = array(
										'status' => 'failure',
										'msg_type' => 'custom_msg_error',
										'msg' => 'Unable to Save Details',
										'url' => base_url().'patient-note-practise'
									);
						}
				}else{					
						$result = array(
										'status' => 'error',
										'msg_type' => 'custom_msg_error',
										'msg' => 'Form is empty',
										'error' => 'Form is empty'
									);
				}
			}
					
				$this->session->set_flashdata($result['msg_type'], $result['msg']);
				if($this->input->is_ajax_request()){
					echo json_encode($result);die;
				}else{
					redirect($result['url']);
				}
		}

		public function send_patient_note_mail($sbmt_list_id){


			$join_tables = $where = array();
		
			$join_tables[] = array('users u','u.id = pn_l.user_id','left');
			$join_tables[] = array('orders o','o.order_id = pn_l.order_id','left');
			$join_tables[] = array('product_pnc_content pn_con','pn_con.id = pn_l.product_pnc_content_id','inner');

			$where[] = array(TRUE,'pn_l.id',$sbmt_list_id);

			$fields = 'pn_l.id,pn_l.user_id,pn_l.product_pnc_content_id,pn_con.text_one as history,pn_con.text_two as physical_exam,pn_con.diagnosis_one_title,pn_con.diagnosis_two_title,pn_con.diagnosis_three_title,u.email_id,u.first_name,u.last_name';

			$data['patient_note_list'] = $patient_note_list = $this->base_model->get_advance_list('product_pnc_submit_list pn_l', $join_tables, $fields, $where, 'row_array','','','pn_l.id');

			$cond = array();
			$cond[] = array(
							'direct' => 0,
							'rule' => 'where',
							'field' => 'pn_d.product_pnc_content_id',
							'value' => $data['patient_note_list']['product_pnc_content_id']
						);
			$diagnosis_details_list = $this->base_model->getList('product_pnc_diagnosis pn_d','pn_d.diagnosis_type,pn_d.text_one,pn_d.text_two',$cond,array('return' => 'result_array'),'pn_d.id','asc');		



			$data['diagnosis_details_list'] = array();

			foreach($diagnosis_details_list as $diagnosis){
				switch($diagnosis['diagnosis_type']){
					case 'one':
						$data['diagnosis_details_list'][1][] = array($diagnosis['text_one'],$diagnosis['text_two']);
					break;
					case 'two':
						$data['diagnosis_details_list'][2][] = array($diagnosis['text_one'],$diagnosis['text_two']);
					break;
					case 'three':
						$data['diagnosis_details_list'][3][] = array($diagnosis['text_one'],$diagnosis['text_two']);
					break;
					case 'four':
						$data['diagnosis_details_list'][4][] = array($diagnosis['text_one'],$diagnosis['text_two']);
					break;
				}
			}


			 



			$table_content = $this->load->view('site/patient_note_practise/mail',$data,true);

			if(!empty($patient_note_list['email_id'])){

				$user_email = $patient_note_list['email_id'];
				$user_name = $patient_note_list['first_name'].' '.$patient_note_list['last_name'];
				$site_name = $site_settings = get_site_settings('site.name');
				$site_name = $site_name['value'];

			//Send Email							
			$email_config_data = array(
							'[SITE_NAME]' => $site_name,
						   	'[LOGO]' => base_url().$this->config->item("logo_mail"),
							'[USERNAME]'=> $user_name,
							'[HISTORY_CONTENT]' => $patient_note_list['history'],
							'[PHYSICAL_CONTENT]' => $patient_note_list['physical_exam'],
							'[CONTENT_TABLE]'=>$table_content,
						   );
						   
			 		   
						   
						   
						   
			$to_email = $user_email;
			$from_email = get_site_settings('emailtemplate.from_email');
			$from_email = $from_email['value'];
			$template = 'Patient Note Correction Submitted';

			$this->load->library('email_template');
			$res = $this->email_template->send_mail($to_email,$from_email,$template,$email_config_data);
			$res = $this->email_template->send_mail($from_email,$to_email,$template,$email_config_data);

			}

		}
		
}

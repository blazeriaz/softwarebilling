<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Webinar extends Admin_Controller
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

		$this->image = array(
					'name' => 'Image',
					'path' => $this->config->item('webinar_img'),
					'allowedTypes' => "jpg|jpeg|png"
				);

	}

	private $image = array();

	public function index($page_num = 1)
	{
		$search_name_keyword  = isset($_POST['search_name'])?trim($_POST['search_name']):(isset($_SESSION['product_search_name'])?$_SESSION['product_search_name']:'');
		$this->session->set_userdata('product_search_name', $search_name_keyword); 		
		$keyword_name_session = $this->session->userdata('product_search_name');
		if($keyword_name_session != ''){
			$keyword_name = $this->session->userdata('product_search_name');
		}else{
			isset($_SESSION['product_search_name'])?$this->session->unset_userdata('product_search_name'):'';
			$keyword_name = "";
		}
		
		
		$this->load->library('pagination');
		$config  = $this->config->item('back_pagination');
		$config["base_url"] = base_url().SITE_ADMIN_URI."/webinar/index";
		$data["per_page"] = $config["per_page"] = $this->config->item('admin_page_per_limit');
		$config["uri_segment"] = 4;
		$data['limit_end'] = $limit_end = ($page_num - 1) * $config['per_page'];  
		$limit_start = $config['per_page'];
		
		//Webinar List
		$join_tables = $where = array();
		
		$where[] = array(FALSE,'status = 1');
		
		if($keyword_name){
			$where[] = array( FALSE,"(name LIKE '%$keyword_name%' OR hsn_code LIKE '%$keyword_name%')");
			//$where[] = array( FALSE,"(username LIKE '%$keyword_name%' or email LIKE '%$keyword_name%' or concat (first_name,' ',last_name) LIKE '%$keyword_name%')");
			 
			$data['keyword_name'] = $keyword_name;
		}else{
			$data['keyword_name'] = "";
		}
		
		$fields = '*';
		$data['total_rows'] = $config['total_rows'] = $this->base_model->get_advance_list('product', $join_tables, $fields, $where, 'num_rows','','','id');
		$data['webinar'] = $this->base_model->get_advance_list('product', $join_tables, $fields, $where, '', 'id', 'desc', 'id', $limit_start, $limit_end);

		$this->pagination->initialize($config);
		
		$data['main_content'] = 'webinar/index';
		$data['page_title']  = 'Product List';
		$this->load->view(ADMIN_LAYOUT_PATH, $data); 	
	}
	public function reset(){
		
		$this->session->unset_userdata('product_search_name');
		
		redirect(base_url().SITE_ADMIN_URI.'/webinar/');
	}
	public function validate_select($val, $fieldname){
		if($val==""){
			$this->form_validation->set_message('validate_select', 'Please choose the '.$fieldname.'.');
			return FALSE;
		}			
	}


	public function validate_file_check($val){
		$fieldname = $this->image['name'];
		if($val['size']!=0){
			$config['upload_path'] = $this->image['path'];
	        $config['allowed_types'] = $this->image['allowedTypes'];
	        if(isset($this->image['min_width'])){
	        	$config['min_width'] = $this->image['min_width']; 
	        }
	        if(isset($this->image['min_height'])){
	        	$config['min_height'] = $this->image['min_height']; 
	        }
	        if(isset($this->image['max_width'])){
	        	$config['max_width'] = $this->image['max_width']; 
	        }
	        if(isset($this->image['max_height'])){
	        	$config['max_height'] = $this->image['max_height']; 
	        }
	        $this->load->library('upload', $config);
	        $image_up = $this->upload->do_upload('image','NO_UPLOAD');
	        if (!$image_up){
		   		$this->form_validation->set_message('validate_file_check', $this->upload->display_errors());
		   		return FALSE;
			}else{
				return TRUE;
			}
		}else{
			$image_hidden = $this->input->post('image_hidden');
			if(empty($image_hidden)){
				$this->form_validation->set_message('validate_file_check', 'Please choose the '.$fieldname.'.');
				return FALSE;
			}
		}
	}

	public function add()
	{

		$data['css'] = $data['js'] = array();
		$data['css'][]='assets/themes/css/jquery.datetimepicker.css';
		$data['js'][]='assets/themes/js/jquery.datetimepicker.full.js';
		
		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			$this->form_validation->set_rules('name', 'Name','trim|required');		
			$this->form_validation->set_rules('hsn_code','HSN Code','trim|required');
			$this->form_validation->set_rules('price','Price','trim|is_numeric|required');			
			$this->form_validation->set_rules('qty','Quantity','trim|is_numeric');			
            

			if ($this->form_validation->run())
			{
					$date = date('Y-m-d H:i:s');
					
					$date_time = $this->input->post('date_time');
					$date_time = date('Y-m-d H:i:s',strtotime($date_time));					

					$insert = 1;				

	            	if($insert){

                            $update_array_1 = array (
                                                    'name' => $this->input->post('name'),
                                                    'hsn_code' => $this->input->post('hsn_code'),
                                                    'price' => $this->input->post('price'),
                                                    'qty' => $this->input->post('qty'),		                                                   
                                                    'status' => 1,
                                                    'created' => $date
                                                    );

						$product_id = $this->base_model->insert('product', $update_array_1);

						
					
					}

					if($product_id){
						$result = array(
									'status' => 'success',
									'msg_type' => 'flash_message',
									'msg' => $this->lang->line('add_record'),
									'url' => base_url().'admin/webinar'
									);
					}else{
						$result = array(
									'status' => 'failure',
									'msg_type' =>'custom_msg_error',
									'msg' => 'Unable to Add Location',
									'url' => base_url().'admin/webinar'
								);
					}
			}else{
					$result = array(
									'status' => 'error',
									'msg_type' =>'custom_msg_error',
									'msg' => '',
									'error' => $this->form_validation->get_error_array()
								);
			}
				
				$this->session->set_flashdata($result['msg_type'], $result['msg']);
				if($this->input->is_ajax_request()){
					echo json_encode($result);die;
				}else{
					if(isset($result['url'])){
						redirect($result['url']);
					}
				}
		}
		
		$data['main_content'] = 'webinar/add';
		$data['page_title']  = 'Add Product'; 
		$this->load->view(ADMIN_LAYOUT_PATH, $data); 	
	}

	public function edit($id){

		$data['css'] = $data['js'] = array();
		$data['css'][]='assets/themes/css/jquery.datetimepicker.css';
		$data['js'][]='assets/themes/js/jquery.datetimepicker.full.js';

		$join_tables = $where = array();
		
		$where[] = array(FALSE,'id = "'.$id.'"');
		$fields = '*';
		$getValues = $this->base_model->get_advance_list('product', $join_tables, $fields, $where, 'row_array', '', '', '');

		if ($this->input->server('REQUEST_METHOD') === 'POST')
		{
			
			if($this->input->post('name') != $getValues['name']) {
				$is_unique =  '|is_unique[product.name]' ;
			} else {
				$is_unique =  '' ;
			}
			$this->form_validation->set_rules('name', 'Name','trim|required');
                        $this->form_validation->set_rules('hsn_code', 'HSN Code','trim|required');		
			
			$this->form_validation->set_rules('price','Price','trim|is_numeric');
			$this->form_validation->set_rules('qty','Quantity','trim|is_numeric');
			
			
			if ($this->form_validation->run())
			{
					$date = date('Y-m-d H:i:s');
					
					$date_time = $this->input->post('date_time');
					$date_time = date('Y-m-d H:i:s',strtotime($date_time));				

					$insert = 1;					

	            	if($insert){

						$update_array_1 = array (
												'price' => $this->input->post('price'),
												'name'  => $this->input->post('name'),
												'hsn_code'=>$this->input->post('hsn_code'),
												'qty'	=> $this->input->post('qty')
                                                                        
									 );
						//print_r($update_array_1); exit;

						$updated = $this->base_model->update('product',$update_array_1,array('id' => $getValues['id']));		

						
					
					}

					if($updated){
						$result = array(
									'status' => 'success',
									'msg_type' => 'custom_msg_succ',
									'msg' => $this->lang->line('add_record'),
									'url' => base_url().'admin/webinar'
									);
					}else{
						$result = array(
									'status' => 'failure',
									'msg_type' => 'custom_msg_error',
									'msg' => 'Unable to Edit Product',
									'url' => base_url().'admin/webinar'
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
				}else{
					if(isset($result['url'])){
						redirect($result['url']);
					}
				}

		}
		
		$data['data'] = $getValues;
		$data['main_content'] = 'webinar/edit';
		$data['page_title']  = 'Edit Product'; 
		$this->load->view(ADMIN_LAYOUT_PATH, $data);
	}

	public function delete($id,$pageredirect=null,$pageno) 
	{
		
		$this->base_model->delete ('product',array('id' => $id));		
		$this->session->set_flashdata('flash_message', $this->lang->line('delete_record') );
		redirect(base_url().SITE_ADMIN_URI.'/webinar');
	}

}

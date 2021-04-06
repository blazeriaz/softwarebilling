<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
if ( !function_exists('getSessionAdminDetail')) {
		function getSessionAdminDetail( $param = 'admin_display_name' ){ 
				$CI = &get_instance();
				/** Param must be ==> 'admin_username', 'admin_user_id', 'admin_display_name', 'admin_email',  'admin_last_login' ***/
				if($CI->session->has_userdata('admin_is_logged_in')){
					$userData = $CI->session->userdata('admin_is_logged_in');
					if(!empty($userData))
					{
							if($userData[$param])
								return $userData[$param];
							else 
								return FALSE;
					}
					else
						return FALSE; 
				}
				return FALSE; 			
		}
}

if ( !function_exists('CreateDirectory')) {	
		function CreateDirectory($path){
			if(!is_dir($path)){
				$oldmask = umask(0);
				mkdir($path, 0777);
				umask($oldmask);
			}
			return true;
		}
}

if ( !function_exists('RemoveDirectory')) {	
	function RemoveDirectory($path) {
				if (is_dir($path)) {
					$files = glob( $path . DIRECTORY_SEPARATOR . '*');
					foreach( $files as $file ){
						 if($file == '.' || $file == '..'){continue;}
						 if(is_dir($file)){
							  RemoveDirectory( $file );
						 }else{
							  unlink( $file );
						 }
					}
					rmdir( $path ); 
				}
			return true;
	}	
}

if ( !function_exists('Check_valid_csv_header')) {	
	function Check_valid_csv_header( $array1, $array2 ) {  
		if(count($array1 ) != count($array2))
			return FALSE;
		elseif(count(array_intersect($array1, $array2)) != count($array1))
			return FALSE;
		else
			return TRUE;
	}
}

if ( !function_exists('create_slug')) {	
	function create_slug($name, $table)
	{
		 $CI = get_instance();
		 //$CI->load->model($model);
		 $slug            = url_title($name);
		 $slug            = strtolower($slug);
		 $i               = 0;
		 $params          = array();
		 $params['slug'] = $slug;
		 if ($CI->input->post('id')) {
		     $params['id !='] = $CI->input->post('id');
		 }
		 while ($CI->db->where($params)->get($table)->num_rows()) {
		     if (!preg_match('/-{1}[0-9]+$/', $slug)) {
		         $slug .= '-' . ++$i;
		     } else {
		         $slug = preg_replace('/[0-9]+$/', ++$i, $slug);
		     }
		     $params['slug'] = $slug;
		 }
		 return $slug;
	}
}

if ( !function_exists('page_results')) {
	function page_results($total_rows=null,$per_page = 10,$cur_page=3,$limit_end=null,$result=TRUE){
		$pages = $total_rows / $per_page;
		$total_pages = ceil($pages);	
		$start = $limit_end ;
		if($total_pages == $cur_page){
			$lim = $total_pages - 1;
			$end = $total_rows - ( $lim * $per_page) + $start;
			$start = $start + 1;
		} else {
			$start = $limit_end + 1 ;
			$end = $limit_end + $per_page ;
		}
		$end = ($end==0) ? $start : $end;
		$output = array();
		$output['start'] = $start;
		$output['end'] = $end;
		$output['total_rows'] = $total_rows;
		$output['total_pages'] = $total_pages;
		$pages = ($total_pages>1) ? ' Pages' : ' Page';
		$end = ($total_pages>1) ? $end : $total_rows;
		return ($result) ? 'Showing '.$start.' to '.$end.' of '.$total_rows.' entries' : $output;
	}
}

if ( !function_exists('generate_token')) {
	function generate_token($user_id) {
		if($user_id) return md5(uniqid($user_id, true));
		else return md5(uniqid(rand(), true)); 
	}
}
if ( !function_exists('change_status')) {
	function change_status($table_name,$id,$status,$pageredirect,$pageno,$app_token='')
		{
			$CI = get_instance();
			$fieldsorts = $CI->input->get('sortingfied');
			$typesorts = $CI->input->get('sortype');
			if($status == 1){
			$status = 0;										
			$update_array = array ('status' => $status);
			}else{
			$status = 1;										
			$update_array = array ('status' => $status);
			}	  
			$CI->base_model->update ($table_name, $update_array, array('id'=>$id));
			if($app_token == 1){
				$CI->base_model->update ($table_name, array('app_token' => ''), array('id'=>$id));		
			}		
		}
	}
if ( !function_exists('delete_record')) {
	function delete_record($table_name,$id,$status,$pageredirect,$pageno)
		{
			$CI = get_instance();
			$fieldsorts = $CI->input->get('sortingfied');
			$typesorts = $CI->input->get('sortype');
			$CI->db->delete($table_name,array('id' => $id));
					
		}
	}
if ( !function_exists('create_unique_slug')) {
	function create_unique_slug($string,$table,$field='alias',$key=NULL,$value=NULL) 
		{ 
			$CI =get_instance();
			$slug = url_title($string); 
			$slug = strtolower($slug); 
			$i = 0; 
			$params = array (); 
			$params[$field] = $slug; 
			if($key)
			{
				$params["$key !="] = $value; 
			}
			while ($CI->db->where($params)->get($table)->num_rows()) 
			{ 
				if (!preg_match ('/-{1}[0-9]+$/', $slug )) 
				{
					$slug .= '-' . ++$i; 
				}
				else 
				{
					$slug = preg_replace ('/[0-9]+$/', ++$i, $slug );
				}
				$params [$field] = $slug; 
			} 
			return $slug;
		} 
}
if ( !function_exists('random_password')) {
	function random_password( $length = 8 ) 
	{
		$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
		$password = substr( str_shuffle( $chars ), 0, $length );
		return $password;
	}
}
 
if ( !function_exists('is_user_active')) 
{	
	function is_user_active($user_id)
	{
		$CI = get_instance();		
		$CI->db->select('id, email, last_login_time, status');
		$CI->db->where("id=".$user_id);
		$selectResponse = $CI->db->get("users");
		return $selectResponse->row_array();		
	}
}

if ( !function_exists('get_batch_details_by_timeslot')) 
{	
	function get_batch_details_by_timeslot($timeslot_id)
	{
		$CI = get_instance();

		$CI->db->select('class_id,date_time');
		$CI->db->where("time_slot_id",$timeslot_id);
		$CI->db->where("duration_part",1);
		$selectResponse = $CI->db->get("admin_batch_list");
		$result = $selectResponse->result_array();
		$data = array();
		foreach($result as $res){
			$data[$res['class_id']] = $res['date_time'];
		}
		return $data;
		
	}
}

if ( !function_exists('get_batch_timeslot_table')) 
{	
	function get_batch_timeslot_table($timeslot_id)
	{
		$CI = get_instance();

		$CI->db->select('class_id,date_time');
		$CI->db->where("time_slot_id",$timeslot_id);
		$CI->db->where("duration_part",1);
		$selectResponse = $CI->db->get("admin_batch_list");
		$result = $selectResponse->result_array();

		$email_date_format = $CI->config->item('email_date_format');
		$table_cont = "<table>";
		$table_cont .= "<tr>
							<th>Class</th>
							<th>Date & Time</th>
						</tr>
						";
		foreach($result as $res){
			$table_cont .= "<tr>
								<td> ".$res['class_id']."</td>
								<td>".date($email_date_format,strtotime($res['date_time']))."</td>
							</tr>
						";
		}

		$table_cont .= "</table>";
		return $table_cont;
	}
}

if ( !function_exists('get_user_batch_timeslot_table')) 
{	
	function get_user_batch_timeslot_table($user_time_slot_id)
	{
		$CI = get_instance();

		$CI->db->select('class_id,date_time');
		$CI->db->where("user_time_slot_id",$user_time_slot_id);
		$CI->db->where("duration_part",1);
		$selectResponse = $CI->db->get("users_batch_time_slot");
		$result = $selectResponse->result_array();

		$email_date_format = $CI->config->item('email_date_format');
		$table_cont = "<table>";
		$table_cont .= "<tr>
							<th>Class</th>
							<th>Date & Time</th>
						</tr>
						";
		foreach($result as $res){
			$table_cont .= "<tr>
								<td> ".$res['class_id']."</td>
								<td>".date($email_date_format,strtotime($res['date_time']))."</td>
							</tr>
						";
		}

		$table_cont .= "</table>";
		return $table_cont;
	}
}

if ( !function_exists('list_site_settings')) 
{	
	function list_site_settings($where,$cond)
	{

		$CI = get_instance();

		$join_tables = array();
		$fields = '*';
		$data['site_settings'] = $CI->base_model->get_advance_list('site_settings', $join_tables, $fields, $where, 'result_array','sort_order','asc');
		$data['site_categories'] = $CI->base_model->get_records('site_settings_categories',array('id','name','description'),$cond,'result_array','show_order','asc');
		$data['data'] = array();
		$data['categories'] = array();
		foreach($data['site_categories'] as $site_categories){
			$data['categories'][$site_categories['id']] = $site_categories['description'];
			foreach($data['site_settings'] as $settings){
				if(isset($settings['setting_category_id'])&&($settings['setting_category_id']==$site_categories['id'])){
					$val = $settings;
					$val['site_categories_name'] = $site_categories['name'];
					$val['site_categories_label'] = $site_categories['description'];
					$data['data'][$site_categories['id']][] = $val;
				}
			}
		}

		return $data;

	}
}

if ( !function_exists('save_site_settings')) 
{
	function save_site_settings($redirect_url,$message)
	{

		$CI = get_instance();

		$update_data_arr = array();
		$update_ids = array();
		foreach($_POST['data'] as $arr1){
			foreach($arr1 as $id=>$arr2){
				$update_data_arr[$id] = $arr2['name'];
				$join_tables = $where = array();
				$fields = 'ss.label,ss.include_validation,sc.name as category_name';
				$where[] = array( TRUE, 'ss.id', $id);
				$join_tables[] = array('site_settings_categories sc','sc.id = ss.setting_category_id','inner');
				$db_rec = $CI->base_model->get_advance_list('site_settings ss', $join_tables, $fields, $where, 'row_array','sort_order','asc');
				$CI->form_validation->set_rules('data['.$db_rec['category_name'].']['.$id.'][name]', $db_rec['label'],$db_rec['include_validation']);
			}
		}

		

		if(isset($_FILES) && (!empty($_FILES))){
			foreach($_FILES as $f_id => $file){
				$id = str_replace('image-','',$f_id);
				$db_row = $CI->base_model->getRow('site_settings','*',array('id' => $id));
				if(!empty($db_row) && isset($db_row->label) && isset($db_row->include_validation)){
					if(!($file['size'] == 0 && ($CI->input->post('image_hidden-'.$id)))){
						$CI->form_validation->set_rules($f_id, $db_row->label,$db_row->include_validation);
					}
				}
			}
		}
		
			
		
		if ($CI->form_validation->run())
		{

			if(isset($_FILES) && (!empty($_FILES))){
				foreach($_FILES as $f_id => $file){
					if ($file['name'] != "") {
						$id = str_replace('image-','',$f_id);
						$db_row = $CI->base_model->getRow('site_settings','*',array('id' => $id));

						$image = unserialize($db_row->options);

						$config = array();
						if(isset($image['path'])){
							$config['upload_path'] = FCPATH.$image['path'];
						}else{
							$config['upload_path'] = FCPATH.$CI->config->item('settings_img');
						}
						if(isset($image['allowed_types'])){
				        	$config['allowed_types'] = $image['allowed_types'];
				        }
				        if(isset($image['min_width'])){
				        	$config['min_width'] = $image['min_width']; 
				        }
				        if(isset($image['min_height'])){
				        	$config['min_height'] = $image['min_height']; 
				        }
				        if(isset($image['max_width'])){
				        	$config['max_width'] = $image['max_width']; 
				        }
				        if(isset($image['max_height'])){
				        	$config['max_height'] = $image['max_height']; 
				        }
		                $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
		                $CI->load->library('upload', $config);
		                $CI->upload->initialize($config);
		                $image_up = $CI->upload->do_upload($f_id);
						
		                if (!$image_up){
					    	$upload = array('error' => $CI->upload->display_errors());
					   		$data['upload_error'] = $upload;
					   		$insert = 0;
						}else{
							$image_data = array('upload_data' => $CI->upload->data());
							$CI->base_model->update ('site_settings', array('value' => $image_data['upload_data']['file_name']), array('id'=>$id));
							$insert = 2;
						}

	            	}
				}
			}
			
			foreach($update_data_arr as $id => $data){
				$CI->base_model->update ('site_settings', array('value' => $data), array('id'=>$id));
			}
			$CI->session->set_flashdata('flash_success_message', $message);
			redirect(base_url().SITE_ADMIN_URI.'/'.$redirect_url);
		}else{
			//echo validation_errors();die;
		}

	}
}

if ( !function_exists('list_product_settings')) 
{	
	function list_product_settings($where)
	{
		$CI = get_instance();
		$join_tables = array();
		$join_tables[] = array('product_type pt','pt.id = p.product_type_id','inner');
		$join_tables[] = array('product_attributes pa','pa.product_id = p.id','inner');
		$fields = 'p.id,p.name,p.slug,p.price,p.special_price,p.created,pa.content_one,pa.content_two,
					pa.content_three,pa.content_four,pa.content_five,pa.image,pa.video_url,pa.product_included,pa.included_valid_days';
		$data = $CI->base_model->get_advance_list('product p',$join_tables,$fields,$where, 'row_array');
		return $data;
	}
}

if ( !function_exists('save_product_settings')) 
{	
	function save_product_settings($product_id,$label,$is_unique,$image,$product_included)
	{

			$CI = get_instance();
			$data_inserted = 0;
			$CI->form_validation->set_rules('content_one', $label[0], 'trim|required'.$is_unique['content_one']);
			$CI->form_validation->set_rules('price', $label[1],'trim|required|numeric');
			$CI->form_validation->set_rules('content_two', $label[2],'trim|required');
			$CI->form_validation->set_rules('content_three', $label[3],'trim|required');
			$CI->form_validation->set_rules('content_four', $label[4],'trim|required');
			$CI->form_validation->set_rules('content_five', $label[5],'trim|required');
			$CI->form_validation->set_rules('video_url', $label[6],'trim|required|valid_url_format');
			if(!empty($product_included)){
				$CI->form_validation->set_rules('included_valid_days', $label[7],'trim|required|numeric');
			}
			$CI->form_validation->set_rules('special_price', $label[8],'trim|numeric');

			$image_hidden = $CI->input->post('image_hidden');

			if(!empty($image)){
				if (($_FILES['image']['size'] == "0") && empty($image_hidden)) {
                	$CI->form_validation->set_rules('image', $image['name'], "callback_validate_file_select");
            	}else{
            		$CI->form_validation->set_rules('image', $image['name'], 'callback_validate_file_check');
            	}
        	}
			
			if ($CI->form_validation->run()){

				$insert = 1;

				if ($_FILES['image']['name'] != "") {

					$config['upload_path'] = $image['path'];
	                $config['allowed_types'] = $image['allowedTypes'];
	                if(isset($image['min_width'])){
	                	$config['min_width'] = $image['min_width']; 
	                }
	                if(isset($image['min_height'])){
	                	$config['min_height'] = $image['min_height']; 
	                }
	                if(isset($image['max_width'])){
	                	$config['max_width'] = $image['max_width']; 
	                }
	                if(isset($image['max_height'])){
	                	$config['max_height'] = $image['max_height']; 
	                }
	                 
	                $CI->load->library('upload', $config);
	                $image_up = $CI->upload->do_upload('image');

	                if (!$image_up){
				    	$upload = array('error' => $CI->upload->display_errors());
				   		$data['upload_error'] = $upload;
				   		$insert = 0;
					}else{
						$insert = 2;
					}
            	}

            	if($insert){

            		$updated = 0;

					//Update Product
					$update_array_prod = array (
										'price' => $CI->input->post('price'),	
										'special_price' => $CI->input->post('special_price'),	
										);
					if($CI->base_model->update ( 'product', $update_array_prod, array('id'=>$product_id))){
						$updated = 1;
					}

					//Update Product Attribute
					$update_array_prod_att = array (
										'content_one' => $CI->input->post('content_one'),
										'content_two' => $CI->input->post('content_two'),
										'content_three' => $CI->input->post('content_three'),
										'content_four' => $CI->input->post('content_four'),
										'content_five' => $CI->input->post('content_five'),
										'video_url' => $CI->input->post('video_url'),
										'product_included' => $product_included,
										'included_valid_days' => ($product_included)?$CI->input->post('included_valid_days'):'',
										);
					if($insert==2){
						$image_data = array('upload_data' => $CI->upload->data());
						$update_array_prod_att['image'] = $image_data['upload_data']['file_name'];
					}
					if($CI->base_model->update ('product_attributes', $update_array_prod_att, array('product_id'=>$product_id))){
						$updated = 2;
					}
					$data_inserted = 1;
				}
			}else{
				
			}
			return $data_inserted;
	}
}

if ( !function_exists('safe_b64encode'))
{
	function safe_b64encode($string) {
        $data = base64_encode($string);
        $data = str_replace(array('+','/','='),array('-','_',''),$data);
        return $data;
    }
}

if ( !function_exists('safe_b64decode')) 
{
    function safe_b64decode($string) {
        $data = str_replace(array('-','_'),array('+','/'),$string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }
        return base64_decode($data);
    }
}


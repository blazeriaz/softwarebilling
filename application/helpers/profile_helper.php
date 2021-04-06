<?php

if ( !function_exists('get_user_data')) 
{
	function get_user_data(){
		$CI =& get_instance();
		if($CI->session->has_userdata('user_is_logged_in')){
			$CI->load->helper('thumb_helper');
			$CI->load->helper('html');
			$CI->load->model('base_model');
			$users = $CI->base_model->getCommonListFields('users', array('profile_image','first_name','last_name','gender'), array('id' => $CI->session->userdata['user_is_logged_in']['user_id']));
		}
		return $users;
	}
}

if ( !function_exists('checkUser')) 
{
	function checkUser(){
		$CI =& get_instance();
		$res = 1;
		if($CI->session->has_userdata('user_is_logged_in')){
			$CI->load->model('base_model');
			$users_detail = $CI->base_model->getRow('users', array('*'), array('id' => $CI->session->userdata['user_is_logged_in']['user_id']));
			$res = ($users_detail->status)?1:0;
		}
		return $res;
	}
}	
	
if ( !function_exists('get_site_settings')) 
{	
	function get_site_settings($name,$type=null){
		$CI = get_instance();		
		$CI->db->select('ss.*');
		if(is_array($name)){
			$CI->db->where_in("ss.name",$name);
		}else{
			$CI->db->where("ss.name",$name);
		}
		$selectResponse = $CI->db->get("site_settings ss");
		if(is_array($name)){
			$result = $selectResponse->result_array();
		}else{
			$result = $selectResponse->row_array();
			if($type == 'value'){
				$result = $result['value'];
			}
		}
		return $result;
	}

	function get_site_settings_category($category,$name=null){
		$CI = get_instance();		
		$CI->db->select('ss.*');
		$CI->db->where("sc.name",$category);
		if($name){
			if(is_array($name)){
				$CI->db->where_in("ss.name",$name);
			}else{
				$CI->db->where("ss.name",$name);
			}
		}
		$CI->db->join("site_settings ss","ss.setting_category_id=sc.id","inner");
		$selectResponse = $CI->db->get("site_settings_categories sc");
		
		if($name && !(is_array($name))){
				return $selectResponse->row_array();
		}else{
			return $selectResponse->result_array();
		}
	}
}

if ( !function_exists('get_active_blocks')) 
{	
	function get_active_blocks(){
		$CI = get_instance();		
		$CI->db->select('*');
		$CI->db->where("status",'1');
		$selectResponse = $CI->db->get("pages");
		return $selectResponse->result_array();
	}
}

if ( !function_exists('pr')) 
{	
	function pr($data)
	{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}
}

if ( !function_exists('get_batch_details_by_timeslot_order')) 
{	
	function get_batch_details_by_timeslot_order($timeslot_id)
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

if ( !function_exists('get_batch_timeslot_table_order')) 
{	
	function get_batch_timeslot_table_order($timeslot_id)
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

if ( !function_exists('set_default_config')) 
{	
	function set_default_config()
	{
		$CI = get_instance();
		$CI->load->database();
		$CI->load->library('session');
		if($CI->session->has_userdata('admin_is_logged_in')){
			$page_settings = get_site_settings('pagination.back');
			$CI->config->set_item('admin_page_per_limit',$page_settings['value']);
		}
		/*if($CI->session->has_userdata('user_is_logged_in')){
			$page_settings = get_site_settings('pagination.front');
			$CI->config->set_item('front_page_per_limit',$page_settings['value']);
		}*/
	}
}

set_default_config();

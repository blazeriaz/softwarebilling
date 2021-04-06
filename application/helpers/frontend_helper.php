<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
if ( !function_exists('is_loggedin')) 
{
    function is_loggedin() {
		$CI = &get_instance();
		if($CI->session->has_userdata('user_is_logged_in')){
			$userData = $CI->session->userdata('user_is_logged_in');
			if(!empty($userData)){
				//if($userData[$param]){ return $userData[$param]; }else { return FALSE; }
				return true;
			}else{ return FALSE; }
		}
       return FALSE; 	
    }
	
	function get_loggedin_user() {
		$CI = &get_instance();
		if($CI->session->has_userdata('user_is_logged_in')){
			$userData = $CI->session->userdata('user_is_logged_in');
			if(!empty($userData)){
				//if($userData[$param]){ return $userData[$param]; }else { return FALSE; }
				return $userData;
			}else{ return FALSE; }
		}
       return FALSE; 	
    }

    if ( !function_exists('create_slug')) {	
		function create_slug($name, $table){
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
	
	if(!function_exists('check_product_access')){
		function check_product_access($order_id){
			
			$current_date = date('Y-m-d h:i:s');
			
			$CI = get_instance();
			if($CI->session->has_userdata('user_is_logged_in')){
				$userData = $CI->session->userdata('user_is_logged_in');
				
				$CI->db->select('oi.id,oi.order_id,oi.product_type,oi.product_id,oi.attr_title,oi.product_slug,oi.valid_days,o.expiry_date,oi.created,o.user_id');
				$CI->db->where('o.user_id', $userData['user_id']);
				//$CI->db->where('oi.product_slug', $product_slug);
				$CI->db->where('o.expiry_date >=', $current_date);
				$CI->db->where('o.id', $order_id);
				$CI->db->join('orders o', 'oi.order_id = o.order_id');
				$query = $CI->db->get('order_item oi');
				$result = $query->result_array();
				//echo $CI->db->last_query();
				//pr($result);exit;
				return $query->num_rows();
				
			}
			
		}
	}
}

if(!function_exists('check_step_access')){
		function check_step_access($step_slug){
			
			$current_date = date('Y-m-d h:i:s');
			
			$CI = get_instance();
			if($CI->session->has_userdata('user_is_logged_in')){
				$userData = $CI->session->userdata('user_is_logged_in');
				
				$CI->db->select('oi.id,oi.order_id,oi.product_type,oi.product_id,oi.attr_title,oi.product_slug,oi.valid_days,o.expiry_date,oi.created,o.user_id');
				$CI->db->where('o.user_id', $userData['user_id']);
				//$CI->db->where('oi.product_slug', $product_slug);
				$CI->db->where('o.expiry_date >=', $current_date);
				$CI->db->where('o.status', 1);
				$CI->db->where('oi.product_slug', $step_slug);
				
				$CI->db->join('orders o', 'oi.order_id = o.order_id');
				$query = $CI->db->get('order_item oi');
				$result = $query->result_array();
				//echo $CI->db->last_query();
				//pr($result);exit;
				return $query->num_rows();
				
			}
			
		}
	}
if ( !function_exists('order_status_id')) 
{
    function order_status_id($status_text) {
       switch($status_text){
				case 'Completed' : $transcation_status = 1;break;
				case 'Cancelled' : $transcation_status = 2;break;
				case 'Failed' : $transcation_status = 3;break;
				case 'Placed' : $transcation_status = 4;break;
				case 'Processing' : $transcation_status = 5;break;
				case 'Refunded' : $transcation_status = 6;break;
				case 'Refused' : $transcation_status = 7;break;
				case 'Removed' : $transcation_status = 8;break;
				case 'Returned' : $transcation_status = 9;break;
				case 'Reversed' : $transcation_status = 10;break;
				case 'Unclaimed' : $transcation_status = 11;break;
				case 'On hold' : $transcation_status = 12;break;
				case 'Held' : $transcation_status = 13;break;
				case 'Denied' : $transcation_status = 14;break;
				case 'default' : $transcation_status = 15;break;
			}
			return $transcation_status;
    }
}

if ( !function_exists('order_status_text')) {
    function order_status_text($status_id) {

		switch($status_id){
			case 1 : $transcation_status = 'Completed';break;
			case 2 : $transcation_status = 'Cancelled';break;
			case 3 : $transcation_status = 'Failed';break;
			case 4 : $transcation_status = 'Placed';break;
			case 5 : $transcation_status = 'Processing';break;
			case 6 : $transcation_status = 'Refunded';break;
			case 7 : $transcation_status = 'Refused';break;
			case 8 : $transcation_status = 'Removed';break;
			case 9 : $transcation_status = 'Returned';break;
			case 10 : $transcation_status = 'Reversed';break;
			case 11 : $transcation_status = 'Unclaimed';break;
			case 12 : $transcation_status = 'On hold';break;
			case 13 : $transcation_status = 'Held';break;
			case 14 : $transcation_status = 'Denied';break;
			case 15 : $transcation_status = 'default';break;
		}
		return $transcation_status;
	}
}

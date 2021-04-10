<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_model extends CI_Model {
  /**
    * Responsable for auto load the database
    * @return void
    */
    public function __construct()
    {
        $this->load->database();
		$this->load->model('base_model');
    } 
	public function get_counts($table, $condition=array(),$option="") 
	{  	
		 
		$this->db->select("count(id) as totals");
		if(!empty($condition)){
			$this->db->where($condition);
		} 
		$res=$this->db->get($table);
	 
		$row_Data=$res->row_array();
		 return $row_Data["totals"];
	}
	public function get_last_registered_users($limit=5){
		$this->db->select("u.first_name,u.last_name,u.email_id,u.skype_id,u.phone_no,co.name as country_name,ci.name as city_name,u.created");
		$this->db->join('countries co','co.id = u.country','inner');
		$this->db->join('cities ci','ci.id = u.city','inner');
		$this->db->limit($limit,0);
		$this->db->order_by('u.id','desc');
		$data = $this->db->get('users u')->result_array();
		//echo $this->db->last_query();
		return $data;
	}
	
	public function getChartPurchase(){

		$whereyear[] = array(FALSE,"(YEAR(from_date) <= YEAR(CURDATE()) and MONTH(from_date) >= 4)");
		$academic_year = $this->base_model->get_advance_list('academic_year ay', [], '*', $whereyear, '', 'id', 'asc', 'id');		
		$this->db->select("sum(p.total_value) as grand_total,YEAR(p.created) AS yr, MONTH(p.created) AS m");		
		$current_year = date('Y');		
		//$this->db->where('YEAR(p.created)',$current_year);
		if(isset($_SESSION['academic_year_id'])){
			$data['current_year_selected'] = $_SESSION['academic_year_id'];
			$order_year_from = $this->session->userdata('order_year_from');
			$order_year_to = $this->session->userdata('order_year_to');
			$current_from_order = date('Y-m-d',strtotime($order_year_from));
			$current_to_order = date('Y-m-d',strtotime($order_year_to));
			$where = "(DATE_FORMAT(p.created,'%Y-%m-%d') >= DATE_FORMAT('".$current_from_order."','%Y-%m-%d') AND DATE_FORMAT(p.created,'%Y-%m-%d') <= DATE_FORMAT('".$current_to_order."','%Y-%m-%d'))";
		}else{
		foreach($academic_year as $year){
			if($current_year == date('Y',strtotime($year['from_date']))){
				$data['current_year_selected'] = $year['id'];
				$current_from_order = date('Y-m-d',strtotime($year['from_date']));
				$current_to_order = date('Y-m-d',strtotime($year['to_date']));
				$where = "(DATE_FORMAT(p.created,'%Y-%m-%d') >= DATE_FORMAT('".$current_from_order."','%Y-%m-%d') AND DATE_FORMAT(p.created,'%Y-%m-%d') <= DATE_FORMAT('".$current_to_order."','%Y-%m-%d'))";
			}
		}
	}
	    $this->db->where($where);
		$this->db->group_by(array("YEAR(p.created)", "MONTH(p.created)"));
		$orders_arr = $this->db->get('new_purchase p')->result_array();
		$chart_data = [];
		$new_data = array();
		if(count($orders_arr) > 0){			
			foreach($orders_arr as $sale){				
				$chart_data[$sale['m']] = round($sale['grand_total']);			
			}
			$month_key = array(4,5,6,7,8,9,10,11,12,1,2,3);
			foreach($month_key as $value){
				if(isset($chart_data[$value])){
					$new_data[$value] = $chart_data[$value];
				}else{
					$new_data[$value] = 0;
				}
				
			}
			
		}
		return $new_data;
	}
	
	public function getChartSales(){

		$whereyear[] = array(FALSE,"(YEAR(from_date) <= YEAR(CURDATE()) and MONTH(from_date) >= 4)");
		$academic_year = $this->base_model->get_advance_list('academic_year ay', [], '*', $whereyear, '', 'id', 'asc', 'id');
		// SELECT sum(grand_total) as grand_total,YEAR(created) AS yr, MONTH(created) AS m from orders where YEAR(created) = '2020' GROUP BY YEAR(created), MONTH(created)
		
		$this->db->select("sum(o.grand_total) as grand_total,YEAR(o.created) AS yr, MONTH(o.created) AS m");
		
		$current_year = date('Y');

		if(isset($_SESSION['academic_year_id'])){
			$data['current_year_selected'] = $_SESSION['academic_year_id'];
			$order_year_from = $this->session->userdata('order_year_from');
			$order_year_to = $this->session->userdata('order_year_to');
			$current_from_order = date('Y-m-d',strtotime($order_year_from));
			$current_to_order = date('Y-m-d',strtotime($order_year_to));
			$where = "(DATE_FORMAT(o.created,'%Y-%m-%d') >= DATE_FORMAT('".$current_from_order."','%Y-%m-%d') AND DATE_FORMAT(o.created,'%Y-%m-%d') <= DATE_FORMAT('".$current_to_order."','%Y-%m-%d'))";
		}else{
		foreach($academic_year as $year){

			if($current_year == date('Y',strtotime($year['from_date']))){
				$data['current_year_selected'] = $year['id'];
				$current_from_order = date('Y-m-d',strtotime($year['from_date']));
				$current_to_order = date('Y-m-d',strtotime($year['to_date']));
				$where = "(DATE_FORMAT(o.created,'%Y-%m-%d') >= DATE_FORMAT('".$current_from_order."','%Y-%m-%d') AND DATE_FORMAT(o.created,'%Y-%m-%d') <= DATE_FORMAT('".$current_to_order."','%Y-%m-%d'))";
			}
		}
	}
		
		
		$this->db->where($where);
		$this->db->group_by(array("YEAR(created)", "MONTH(created)"));
		$orders_arr = $this->db->get('orders o')->result_array();

		//echo $this->db->last_query();
		
		$chart_data = [];
		$new_data = array();
		if(count($orders_arr) > 0){
			
			foreach($orders_arr as $sale){				
				$chart_data[$sale['m']] = round($sale['grand_total']);			
			}
			
			$month_key = array(4,5,6,7,8,9,10,11,12,1,2,3);
			foreach($month_key as $value){
				if(isset($chart_data[$value])){
					$new_data[$value] = $chart_data[$value];
				}else{
					$new_data[$value] = 0;
				}
				
			}
			//exit;
		//echo '<pre>';print_r($new_data);exit;
			
		}
		return $new_data;
		
		
	}
	public function get_last_booked_orders($limit=5){
		$this->db->select("*");
		$this->db->limit($limit,0);
		//$this->db->order_by('o.created','desc');
		$this->db->order_by('o.id','desc');
		$orders_arr = $this->db->get('orders o')->result_array();

		$orders = array();

		foreach($orders_arr as $k => $ord){
			if($ord['is_webinar']){
				$this->db->select("uw.name,uw.email,uw.skype_id");
				$this->db->where('uw.id',$ord['user_id']);
				$users_arr = $this->db->get('users_webinar uw')->row_array();
				$orders[$k]['order_id'] = $ord['order_id'];
				$orders[$k]['price'] = $ord['price'];
				$orders[$k]['product_name'] = $ord['product_name'];
				$orders[$k]['user_email'] = $users_arr['email'];
				$orders[$k]['created'] = $ord['created'];
			}else{
				$this->db->select("u.first_name,u.email_id,u.skype_id");
				$this->db->where('u.id',$ord['user_id']);
				$users_arr = $this->db->get('users u')->row_array();
				$orders[$k]['order_id'] = $ord['order_id'];
				$orders[$k]['price'] = $ord['price'];
				$orders[$k]['product_name'] = $ord['product_name'];
				$orders[$k]['user_email'] = $users_arr['email_id'];
				$orders[$k]['created'] = $ord['created'];
			}
		}

		return $orders_arr;
	}
}


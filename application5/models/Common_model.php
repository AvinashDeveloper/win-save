<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common_model extends CI_Model{

	/* updating data in datebase */
  	public function update($table,$data,$where) {
		if(is_array($where)){
			foreach ($where as $key => $value){
			  $this->db->where($key, $value);
			}
		} 
		$this->db->update($table, $this->db->escape_str($data));
		return true;
	}

	/* insert data in datebase */
	public function insert($table,$data){
		$query = $this->db->insert($table, $data); 
		return $this->db->insert_id();
	}

	/* delete data in datebase */
	public function delete($table,$id,$col = 'id'){
		$this->db->where($col, $id);
		$query = $this->db->delete($table); 
		return $query;
	}

    public function delete_rows($table,$where){
        if(is_array($where)){
            foreach ($where as $key => $value){
              $this->db->where($key, $value);
            }
        } 
        $query = $this->db->delete($table); 
        return $query;
    }

	/* select query */
    public function select($table, $where ='',$coloumn = '*'){
        $sql = "SELECT $coloumn FROM $table";
		if(!empty($where)){
		   $sql .= " $where";
		}
		$query = $this->db->query($sql);
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;
        }
    }

    public function select_arr($table, $where ='',$coloumn = '*'){
        $this->db->select($coloumn);
        $this->db->from($table);
        if(is_array($where)){
            foreach ($where as $key => $value) {
                $this->db->where($key,$value);
            }
        }
        $query = $this->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;
        }
    }

    public function getBillingInfo($vendor_id){
        $sql = "SELECT tbl.*,v.name as salesman FROM (SELECT concat('L_',limited_order_id) as row_id,concat('31',limited_order_id) as order_id, (@product := 'Limited order') as product, amount, discount, vat, no_unit, campain_name, (@plan_id := '') as plan_id,( @start_date := '') as start_date, (@expire_date := '') as expire_date, vendor_id,create_date FROM limited_orders UNION SELECT concat('C_',classified_order_id) as row_id,concat('21',classified_order_id) as order_id, (@product := 'Classified order') as product, amount, discount, vat, no_unit, campain_name, (@plan_d := '') as plan_id, (@start_date := '') as start_date, (@expire_date := '') as expire_date, vendor_id,create_date FROM classified_orders UNION SELECT concat('O_',membership_order_id) as row_id,concat('11',membership_order_id) as order_id, (@product := 'Membership order') as product, amount, discount, vat, @no_unit := '', @campain_name := '', plan_id, start_date, expire_date, vendor_id,create_date FROM offer_membership_orders) tbl LEFT JOIN vendor as v ON v.id = tbl.vendor_id WHERE v.id = '".$vendor_id."'";

        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;
        }
    }

    public function getSingleRowBilInfo($vendorId, $rowId){

        $split = explode('_',$rowId);

        if($split[0] == 'O'){
            $sql = "SELECT concat('O_',membership_order_id) as row_id,concat('11',membership_order_id) as order_id, (@product := 'Membership order') as product, amount, discount, vat, @no_unit := '', @campain_name := '', tbl.plan_id, start_date, expire_date, vendor_id,create_date,v.name as vendor_name FROM offer_membership_orders as tbl LEFT JOIN vendor as v ON v.id = tbl.vendor_id WHERE v.id = '".$vendorId."' and membership_order_id = '".$split[1]."'";
        } else if($split[0] == 'L'){
            $sql = "SELECT concat('L_',limited_order_id) as row_id,concat('31',limited_order_id) as order_id, (@product := 'Limited order') as product, amount, discount, vat, no_unit, campain_name, (@plan_id := '') as plan_id,( @start_date := '') as start_date, (@expire_date := '') as expire_date, vendor_id,create_date,v.name as vendor_name FROM limited_orders as tbl LEFT JOIN vendor as v ON v.id = tbl.vendor_id WHERE v.id = '".$vendorId."' and limited_order_id = '".$split[1]."'";
        } else if($split[0] == 'C'){
            $sql = "SELECT concat('C_',classified_order_id) as row_id,concat('21',classified_order_id) as order_id, (@product := 'Classified order') as product, amount, discount, vat, no_unit, campain_name, (@plan_d := '') as plan_id, (@start_date := '') as start_date, (@expire_date := '') as expire_date, vendor_id,create_date,v.name as vendor_name FROM classified_orders as tbl LEFT JOIN vendor as v ON v.id = tbl.vendor_id WHERE v.id = '".$vendorId."' and classified_order_id = '".$split[1]."'";
        }

        $query = $this->db->query($sql);
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;
        }
    }

    public function getOfferReports($vendor_id, $year=NULL){
        $month = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
        $output =array();
        if(empty($year)){
            $year = date('yy');
        }
        for ($i=0; $i < count($month); $i++) { 
            $filter = $month[$i].'-'.$year;
            $redeemValue = countOfferRedeem($vendor_id,$filter);
            $store_view = countStoreViews($vendor_id,$filter);
            $store_share = countStoreShare($vendor_id,$filter);
            $no_comment = countComment($vendor_id,$filter);
            $no_ratting = countRatting($vendor_id,$filter);
            $saving_amt = countSavingAmount($vendor_id,$filter);

            $output[] = array(
                'month' => $filter,
                'redeem_count' => $redeemValue['total_redeem'],
                'storeView_count' => $store_view['total_views'],
                'storeShare_count' => $store_share['share_store'],
                'comment_count' => $no_comment['total_comment'],
                'ratting_count' => $no_ratting['total_rate'],
                'saving_amount' => $saving_amt['total_saving']?$saving_amt['total_saving']:0
            );
        }
        return $output;
    }


    // 
}
?>
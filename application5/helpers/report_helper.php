<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    function  store_view($value = NULL){
        $CI = &get_instrance();
        $CI->db->select('count(*) as store_view');
        $CI->db->from('users_activities');
        $CI->db->where("user_id",$value['id']);
        $CI->db->where("select_type",'store');
        $query = $CI->db->get();
        if($query->num_rows() > 0){
            return $query->result_array()[0]['store_view'];
        } else {
            return '0';
        }
    }

    function getSubscriptionPlan($vendor_id){
        $CI = &get_instance();
        $CI->db->select('ta.*,vsp.plan_type');
        $CI->db->from('transaction_all ta');
        $CI->db->join('vender_subscription_plan vsp','vsp.subscription_id = ta.plan_id','LEFT');
        $CI->db->where('ta.user_id',$vendor_id);
        $CI->db->where('ta.paid_by','vender');
        $query = $CI->db->get();
        if($query->num_rows() > 0){
            return $query->result_array();
        } else {
            return false;
        }
    }

    function getNoLimited($filter = ""){
        $CI = &get_instance();
        $where = "";
		if($filter){
			$where .= " where DATE_FORMAT(added_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('limited_offer',$where,"COUNT(*) as total_limited");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_limited' => 0);
		}
    }
    
    function getNoViewsLimited($filter = ""){
        $CI = &get_instance();
        $where = " where select_type = 'limited' and views =1 ";
		if($filter){
			$where .= " and DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('users_activities',$where,"COUNT(*) as total_views");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_views' => 0);
		}
    }

    function getNoShareLimited($filter = ""){
        $CI = &get_instance();
        $where = " where select_type = 'limited' and share =1 ";
		if($filter){
			$where .= " and DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('users_activities',$where,"COUNT(*) as total_share");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_share' => 0);
		}
    }

    function getSpentLimited($filter = ""){
        $CI = &get_instance();
        $where = " where offer_type = 'limited' and claimed_status =2 ";
		if($filter){
			$where .= " and DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('claimed_offer_item',$where,"SUM(value) as total_spent");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_spent' => 0);
		}
    }

    function getNoUnitLimited($filter = ""){
        $CI = &get_instance();
        $where = "";
		if($filter){
			$where .= " where DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('limited_orders',$where,"SUM(no_unit) as total_unit");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_unit' => 0);
		}
    }

    function getNoClassified($filter = ""){
        $CI = &get_instance();
        $where = "";
		if($filter){
			$where .= " where DATE_FORMAT(added_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('classified',$where,"COUNT(*) as total_classified");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_classified' => 0);
		}
    }

    function getNoViewsClassified($filter = ""){
        $CI = &get_instance();
        $where = " where select_type = 'classified' and views =1 ";
		if($filter){
			$where .= " and DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('users_activities',$where,"COUNT(*) as total_views");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_views' => 0);
		}
    }

    function getNoShareClassified($filter = ""){
        $CI = &get_instance();
        $where = " where select_type = 'classified' and share =1 ";
		if($filter){
			$where .= " and DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('users_activities',$where,"COUNT(*) as total_share");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_share' => 0);
		}
    }

    function getSpentClassified($filter = ""){
        $CI = &get_instance();
        $where = " where offer_type = 'classified' and claimed_status =2 ";
		if($filter){
			$where .= " and DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('claimed_offer_item',$where,"SUM(value) as total_spent");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_spent' => 0);
		}
    }

    function getNoUnitClassified($filter = ""){
        $CI = &get_instance();
        $where = "";
		if($filter){
			$where .= " where DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('classified_orders',$where,"SUM(no_unit) as total_unit");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_unit' => 0);
		}
    }

    function getNoClickLinks($filter = ""){
        $CI = &get_instance();
        $where = " where select_type = 'link' and click_link =1 ";
		if($filter){
			$where .= " and DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('users_activities',$where,"COUNT(*) as total_link");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_link' => 0);
		}
    }

    function getquantityGift($filter = ""){
        $CI = &get_instance();
        $where = "";
		if($filter){
			$where .= " where DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('inventory_gift',$where,"SUM(stock) as total_stock");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_stock' => 0);
		}
    }

    function getNoRedeemGift($filter = ""){
        $CI = &get_instance();
        $where = "";
		if($filter){
			$where .= " where DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('inventory_gift',$where,"SUM(used) as total_used");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_used' => 0);
		}
    }

    function getValuesGift($filter = ""){
        $CI = &get_instance();
        $where = "";
		if($filter){
			$where .= " where DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('inventory_gift',$where,"SUM(value) as total_value");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_value' => 0);
		}
    }

    function getRedeemValue($filter = ""){
        $CI = &get_instance();
        $where = "";
		if($filter){
			$where .= " where DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('my_gift',$where,"SUM(value) as total_redeemValue");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_redeemValue' => 0);
		}
    }

    function getFreeVendors($filter = ""){
        $CI = &get_instance();

        $where = " where paid_by = 'vender' and main_amount = 0";
		if($filter){
			$where .= " and DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('transaction_all',$where,"count(*) as total_FreeVendor");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_FreeVendor' => 0);
		}
    }

    function getExpireVendors($filter = ""){
        $CI = &get_instance();

        $where = " where paid_by = 'vender' and expire_account = 'Yes'";
		if($filter){
			$where .= " and DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('transaction_all',$where,"count(*) as total_ExpireVendor");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_ExpireVendor' => 0);
		}
    }

    function getSubscribeVendor($filter = ""){
        $CI = &get_instance();

        $where = " where paid_by = 'vender' and main_amount != '0'";
		if($filter){
			$where .= " and DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('transaction_all',$where,"count(*) as total_SubscribeVendor");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_SubscribeVendor' => 0);
		}
    }

    function getSubscribeValue($filter = ""){
        $CI = &get_instance();

        $where = " where paid_by = 'vender' and main_amount != '0'";
		if($filter){
			$where .= " and DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('transaction_all',$where,"SUM(main_amount) as total_SubscribeValue");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_SubscribeValue' => 0);
		}
    }

    function getStoreView($filter = ""){
        $CI = &get_instance();

        $where = " where select_type = 'store' and views = '1'";
		if($filter){
			$where .= " and DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('users_activities',$where,"COUNT(*) as total_StoreView");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_StoreView' => 0);
		}
    }

    function getStoreShare($filter = ""){
        $CI = &get_instance();

        $where = " where select_type = 'store' and share = '1'";
		if($filter){
			$where .= " and DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('users_activities',$where,"COUNT(*) as total_StoreShare");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_StoreShare' => 0);
		}
    }

    function getOfferRedeem($filter = ""){
        $CI = &get_instance();

        $where = " where  claimed_status = '2'";
		if($filter){
			$where .= " and DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('claimed_offer_item',$where,"COUNT(*) as total_redeem");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_redeem' => 0);
		}
    }

    function getOfferSaving($filter = ""){
        $CI = &get_instance();

        $where = " where  claimed_status = '2'";
		if($filter){
			$where .= " and DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('claimed_offer_item',$where,"SUM(value) as total_redeemValue");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_redeemValue' => 0);
		}
    }

    function getNoRated($filter = ""){
        $CI = &get_instance();

        $where = " where  parent_id = '0' and ratting != 0";
		if($filter){
			$where .= " and DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('vendor_ratting',$where,"COUNT(*) as total_Rated");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_Rated' => 0);
		}
    }

    function getNoComment($filter = ""){
        $CI = &get_instance();

        $where = " where  parent_id = '0' and review != ''";
		if($filter){
			$where .= " and DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('vendor_ratting',$where,"COUNT(*) as total_Review");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_Review' => 0);
		}
    }
?>
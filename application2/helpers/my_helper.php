<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	function sendJson($data){
		//header('Content-Type: application/json');
		echo json_encode($data);
	}

	/*		|	Get random string 	*/
	function randomString($length = 6) {
		$str = "";
		$characters = array_merge(range('0','9'),range('A','Z'));
		$max = count($characters) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand = mt_rand(0, $max);
			$str .= $characters[$rand];
		}
		return $str;
	}
	
	// Get single Validation Error
	function get_form_error($error){
		if(count($error) > 0){
			foreach($error as $key=>$value){
				return $value;
				break;
			}	
		}
	}

	function cofirmApiKey($api_key) {
		$app_api_key = 'testPractice25f9e794323b453885f5181f1b624d0bLijkfjkfjkfdCenCe!@139248'; 
		if ($api_key == $app_api_key) {
			return TRUE ;
		}
		else{
			return FALSE;
		}
	}

	function genrateRandNumber(){
		return  random_string('alnum',20);
	}

	function status($sel = NULL){
		$arr = array('Active','Deactive');
		$option = '';
		foreach($arr as $val){
			$selVal = '';
			if($sel == $val){
				$selVal = 'selected';	
			}	
			$option .= '<option value="'.$val.'" '.$selVal.' >'.ucfirst($val).'</option>';
		}
		return $option;	
	}

	function planType($sel = NULL){
		$CI = &get_instance();
		$resultArr = $CI->common->select('plans');
		$option = '';
		foreach($resultArr as $val){
				$selVal = '';
				if(is_int($sel)){
					if($sel == $val['plan_id']){
						$selVal = 'selected';	
					}
				} else if(is_string($sel)){
					if($sel == $val['plan_type']){
						$selVal = 'selected';	
					}
				}	
				$option .= '<option value="'.$val['plan_id'].'" '.$selVal.' >'.ucfirst($val['plan_type']).'</option>';
		}
		return $option;	
	}

	function planTypeRadio($sel = NULL){
		$CI = &get_instance();
		$resultArr = $CI->common->select('plans');
		$option = '';
		foreach($resultArr as $val){
				$selVal = '';
				if(is_int($sel)){
					if($sel == $val['plan_id']){
						$selVal = 'checked';	
					}
				} else if(is_string($sel)){
					if($sel == $val['plan_type']){
						$selVal = 'checked';	
					}
				}	
				
				$option .=  "<div class='form-check-inline'><label class='form-check-label'><input type='radio' class='form-check-input' name='plan_id' value='".$val['plan_id']."' ".$selVal." >".ucfirst($val['plan_type'])."</label></div>";
		}
		return $option;	
	}

	function offerType($sel = NULL){
		$CI = &get_instance();
		$resultArr = $CI->common->select('offer_types');
		$option = '';
		foreach($resultArr as $val){
				$selVal = '';
				if(is_int($sel)){
					if($sel == $val['offer_type_id']){
						$selVal = 'selected';	
					}
				} else if(is_string($sel)){
					if($sel == $val['offer_type']){
						$selVal = 'selected';	
					}
				}	
				$option .= '<option value="'.$val['offer_type_id'].'" '.$selVal.' >'.ucfirst($val['offer_type']).'</option>';
		}
		return $option;	
	}

	function categoryType($sel = NULL){
		$CI = &get_instance();
		$resultArr = $CI->common->select('category');
		$option = '';
		foreach($resultArr as $val){
				$selVal = '';
				if(is_int($sel)){
					if($sel == $val['id']){
						$selVal = 'selected';	
					}
				} else if(is_string($sel)){
					if($sel == $val['name']){
						$selVal = 'selected';	
					}
				}	
				$option .= '<option value="'.$val['id'].'" '.$selVal.' >'.ucfirst($val['name']).'</option>';
		}
		return $option;	
	}

	function getCatgoryTypeString($id = NULL){
		$CI = &get_instance();
		$resultArr = $CI->common->select('category'," where id ='".$id."'");
		if(!empty($resultArr)){
			return $resultArr[0]['name'];
		} else {
			return false;
		}
	}

	function subCategoryType($sel = NULL,$cat_id =NULL){
		$CI = &get_instance();
		$where = "";
		if($cat_id){
			$where = " where c_id = ".$cat_id;
		}
		$resultArr = $CI->common->select('services',$where);
		$option = '';
		foreach($resultArr as $val){
				$selVal = '';
				if(is_int($sel)){
					if($sel == $val['id']){
						$selVal = 'selected';	
					}
				} else if(is_string($sel)){
					if($sel == $val['name']){
						$selVal = 'selected';	
					}
				}	
				$option .= '<option value="'.$val['id'].'" '.$selVal.' >'.ucfirst($val['name']).'</option>';
		}
		return $option;	
	}

	function country($sel = NULL){
		$CI = &get_instance();
		$resultArr = $CI->common->select('country');
		$option = '';
		foreach($resultArr as $val){
				$selVal = '';
				if(is_int($sel)){
					if($sel == $val['country_id']){
						$selVal = 'selected';	
					}
				} else if(is_string($sel)){
					if($sel == $val['country_name']){
						$selVal = 'selected';	
					}
				}	
				$option .= '<option value="'.$val['country_id'].'" '.$selVal.' >'.ucfirst($val['country_name']).'</option>';
		}
		return $option;	
	}

	function countryString($id){
		$CI = &get_instance();
		$resultArr = $CI->common->select('country'," where country_id ='".$id."'");
		if(!empty($resultArr)){
			return $resultArr[0]['country_name'];
		} else {
			return false;
		}
	}

	function city($sel = NULL, $region_id = NULL){
		$CI = &get_instance();
		$where = "";
		if(!empty($region_id)){
			$where = " where region_id = ". $region_id;
		}
		$resultArr = $CI->common->select('city', $where);
		$option = '';
		foreach($resultArr as $val){
				$selVal = '';
				if(is_int($sel)){
					if($sel == $val['city_id']){
						$selVal = 'selected';	
					}
				} else if(is_string($sel)){
					if($sel == $val['name_en']){
						$selVal = 'selected';	
					}
				}	
				$option .= '<option value="'.$val['city_id'].'" '.$selVal.' >'.ucfirst($val['name_en']).'</option>';
		}
		return $option;	
	}

	function cityString($id){
		$CI = &get_instance();
		$resultArr = $CI->common->select('city'," where city_id ='".$id."'");
		if(!empty($resultArr)){
			return $resultArr[0]['name_en'];
		} else {
			return false;
		}
	}

	function region($sel = NULL, $country_id = NULL){
		$CI = &get_instance();
		$where = "";
		if(!empty($country_id)){
			$where = " where country_id = ".$country_id;
		}
		$resultArr = $CI->common->select('region',$where);
		$option = '';
		foreach($resultArr as $val){
				$selVal = '';
				if(is_int($sel)){
					if($sel == $val['id']){
						$selVal = 'selected';	
					}
				} else if(is_string($sel)){
					if($sel == $val['region']){
						$selVal = 'selected';	
					}
				}	
				$option .= '<option value="'.$val['id'].'" '.$selVal.' >'.ucfirst($val['region']).'</option>';
		}
		return $option;	
	}

	function regionString($id){
		$CI = &get_instance();
		$resultArr = $CI->common->select('region'," where id ='".$id."'");
		if(!empty($resultArr)){
			return $resultArr[0]['region'];
		} else {
			return false;
		}
	}

	function getOfferTypeString($id = NULL){
		$CI = &get_instance();
		$resultArr = $CI->common->select('offer_types'," where offer_type_id ='".$id."'");
		if(!empty($resultArr)){
			return $resultArr[0]['offer_type'];
		} else {
			return false;
		}
	}

	function getMembershipOrder($orderId, $vandorId) {
		$CI = &get_instance();
		$CI->db->select('mo.*');
		$CI->db->from('offer_membership_orders mo');
		$CI->db->where('mo.membership_order_id',$orderId);
		$CI->db->where('mo.vendor_id',$vandorId);
		$query = $CI->db->get();
        if($query->num_rows()>0){
            return $query->result_array();
        }else{
            return false;
        }
	}

	function ago($timestamp = '') {
		if (empty($timestamp)) {
			return false;
		}
		$difference = time() - $timestamp;
		$periods = array('second', 'minute', 'hour', 'day', 'week', 'month', 'years', 'decade');
		$lengths = array('60', '60', '24', '7', '4.35', '12', '10');
	
		for ($j = 0; $difference >= $lengths[$j]; $j++) {
			$difference /= $lengths[$j];
		}
	
		$difference = round($difference);
		if ($difference != 1) {
			$periods[$j] .= "s";
		}
		return "$difference $periods[$j]";
	}

	function countOfferRedeem($vendor_id,$filter=""){
		$CI = &get_instance();

		$where = " where vendor_id='".$vendor_id."' and status=2 ";
		if($filter){
			$where .= " and DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('voucher_code_history',$where,"COUNT(*) as total_redeem");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_redeem' => 0);
		}
	}

	function countStoreViews($vendor_id, $filter=NULL){
		$CI = &get_instance();
		
		$where = " where vendor_id='".$vendor_id."'";
		if($filter){
			$where .= " and DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('voucher_code_history',$where,"COUNT(*) as total_views");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_views' => 0);
		}
	}

	function countStoreShare($vendor_id,$filter=NULL){
		$CI = &get_instance();

		$where = " where vendor_id='".$vendor_id."' and share_status = 1 ";
		if($filter){
			$where .= " and DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('share_store',$where,"COUNT(*) as share_store");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('share_store' => 0);
		}
	}

	function countRatting($vendor_id, $filter=NULL){
		$CI = &get_instance();

		$where = " where vendor_id='".$vendor_id."'";
		if($filter){
			$where .= " and DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('offer_ratting_history',$where,"COUNT(*) as total_rate");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_rate' => 0);
		}
	}

	function countComment($vendor_id,$filter=NULL){
		$CI = &get_instance();

		$where = " where vendor_id='".$vendor_id."' and review != ''";
		if($filter){
			$where .= " and DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('offer_ratting_history',$where,"COUNT(*) as total_comment");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_comment' => 0);
		}
	}
	
	function countSavingAmount($vendor_id, $filter=NULL){
		$CI = &get_instance();

		$where = " where vendor_id='".$vendor_id."'";
		if($filter){
			$where .= " and DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'";
		}

		$resultCount = $CI->common->select('voucher_code_history',$where,"SUM(saving) as total_saving");

		if(!empty($resultCount)){
			return $resultCount[0];
		} else {
			return $resultCount = array('total_saving' => 0);
		}
	}

?>
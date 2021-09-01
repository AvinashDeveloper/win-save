<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class ModReports extends CI_Model{

        public function getUserActivity($data = NULL){
            $this->db->select('*');
            $this->db->from('user');
            $this->db->where('type', '3');
            $query = $this->db->get();
            if($query->num_rows() > 0){
                $result = $query->result_array();
                foreach($result as $value){
                    $info = transaction_all($value['id']);
                    $store_view = $this->common->select('users_activities', " where user_id='".$value['id']."' and 	select_type = 'store'",'count(*) as store_view');
                    $store_rate = $this->common->select('vendor_ratting'," where user_id='".$value['id']."' and parent_id = 0 and ratting != 0",'count(*) as store_rate');
                    $store_comment = $this->common->select('vendor_ratting'," where user_id='".$value['id']."' and parent_id = 0 and review !=''",'count(*) as store_comment');
                    $gift_redeem = $this->common->select('my_gift'," where user_id='".$value['id']."' and claim_status = 2",'count(*) as gift_redeem');
                    $gift_value = $this->common->select('my_gift'," where user_id='".$value['id']."' and claim_status = 2",'SUM(value) as gift_value');
                    $offer_redeem = $this->common->select('claimed_offer_item'," where user_id='".$value['id']."' and claimed_status = 2",'count(*) as offer_redeem');
                    $offer_value = $this->common->select('claimed_offer_item'," where user_id='".$value['id']."' and claimed_status = 2",'SUM(value) as offer_value');
                    $subscription_value = $this->common->select('transaction_all'," where user_id='".$value['id']."'",'SUM(total_amount) as subscription_value');
                    $link_share = $this->common->select('users_activities'," where user_id='".$value['id']."' and select_type='link' and share =1",'count(*) as link_share');
                    $points_value = $this->common->select('my_points'," where user_id='".$value['id']."'",'SUM(reward_points) as point_value');

                    $output[] = array(
                        'user_name' => $value['name'],
                        'user_email' => $value['email'],
                        'user_mobile' => $value['contact'],
                        'create_date' => date('m/d/yy',strtotime($value['added_date'])),
                        'current_plan' => $info[0]['plan_type'],
                        'store_view' => $store_view[0]['store_view'] ? $store_view[0]['store_view'] : 0,
                        'store_rate' => $store_rate[0]['store_rate'] ? $store_rate[0]['store_rate'] : 0,
                        'store_comment' => $store_comment[0]['store_comment'] ? $store_comment[0]['store_comment'] : 0,
                        'offer_redeem' => $offer_redeem[0]['offer_redeem'] ? $offer_redeem[0]['offer_redeem'] : 0,
                        'amount_saved' => $offer_value[0]['offer_value'] ? $offer_value[0]['offer_value'] : 0,
                        'point_redeem' => $points_value[0]['point_value'] ? $points_value[0]['point_value'] : 0,
                        'gift_redeem' => $gift_redeem[0]['gift_redeem'] ? $gift_redeem[0]['gift_redeem'] : 0,
                        'gift_value' => $gift_value[0]['gift_value'] ? $gift_value[0]['gift_value'] : 0,
                        'link_share' => $link_share[0]['link_share'] ? $link_share[0]['link_share'] : 0,
                        'subscription_value' => $subscription_value[0]['subscription_value'] ? $subscription_value[0]['subscription_value'] : 0,
                    );
                }
                return $output;
            } else {
                return false;
            }
        }
    
        public function getUserSubscription($data = NULL){
            $this->db->select('ta.*,u.name, u.email,u.contact,usp.plan_type');
            $this->db->from('transaction_all ta');
            $this->db->join('user_subscription_plan usp','usp.subscription_id = ta.plan_id','LEFT');
            $this->db->join('user u', 'u.id=ta.user_id','LEFT');
            $this->db->where('ta.expire_account','No');
            $this->db->where('ta.paid_by','user');
            $this->db->where('ta.status','Active');
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
                return false;
            }

        }

        public function getVendorSubscription($data = NULL){
            $this->db->select('ta.*,v.name, v.email,v.contact,vsp.plan_type');
            $this->db->from('transaction_all ta');
            $this->db->join('vender_subscription_plan vsp','vsp.subscription_id = ta.plan_id','LEFT');
            $this->db->join('vendor v', 'v.id=ta.user_id','LEFT');
            $this->db->where('ta.expire_account','No');
            $this->db->where('ta.paid_by','vender');
            $this->db->where('ta.status','Active');
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
                return false;
            }
        }

        public function vendorStoreActivity($data = NULL){
            $this->db->select('v.id as store_id,v.name as vendor_name,v.store_name,v.category_id,v.subcat_id,v.added_date,v.status');
            $this->db->from('vendor v');
            $this->db->where('v.status','1');
            $query = $this->db->get();
            if($query->num_rows() > 0){
                $result = $query->result_array();
                foreach ($result as $value) {
                    $plan_type = getSubscriptionPlan($value['store_id']);
                    $no_branch = $this->common->select('branch'," where vendor_id ='".$value['store_id']."'","count(*) as no_branch");
                    $no_view = $this->common->select('users_activities'," where selected_id = '".$value['store_id']."' and select_type = 'store' and views = 1",'count(*) as no_view');
                    $no_share = $this->common->select('users_activities'," where selected_id = '".$value['store_id']."' and select_type = 'store' and share = 1",'count(*) as no_share');
                    $store_rate = $this->common->select('vendor_ratting'," where vendor_id='".$value['store_id']."' and parent_id = 0 and ratting != 0",'count(*) as store_rate');
                    $store_comment = $this->common->select('vendor_ratting'," where vendor_id='".$value['store_id']."' and parent_id = 0 and review !=''",'count(*) as store_comment');
                    $offer_redeem = $this->common->select('claimed_offer_item'," where vendor_id='".$value['store_id']."' and claimed_status = 2",'count(*) as offer_redeem');
                    $offer_value = $this->common->select('claimed_offer_item'," where vendor_id='".$value['store_id']."' and claimed_status = 2",'SUM(value) as offer_value');
                    $subscription_value = $this->common->select('transaction_all'," where user_id='".$value['store_id']."'",'SUM(total_amount) as subscription_value');

                    $output[] = array(
                        'store_id' => $value['store_id'],
                        'vendor_name' => $value['vendor_name'],
                        'store_name' => $value['store_name'],
                        'category_id' => $value['category_id'],
                        'plan_type' => $plan_type[0]['plan_type'],
                        'status' => $value['status'],
                        'subcat_id' => $value['subcat_id'],
                        'added_date' => $value['added_date'],
                        'no_branch' => $no_branch[0]['no_branch'] ? $no_branch[0]['no_branch'] : 0,
                        'no_view' => $no_view[0]['no_view'] ? $no_view[0]['no_view'] : 0,
                        'store_rate' => $store_rate[0]['store_rate'] ? $store_rate[0]['store_rate'] : 0,
                        'store_comment' => $store_comment[0]['store_comment'] ? $store_comment[0]['store_comment'] : 0,
                        'no_share' => $no_share[0]['no_share'] ? $no_share[0]['no_share'] : 0,
                        'offer_redeem' => $offer_redeem[0]['offer_redeem'] ? $offer_redeem[0]['offer_redeem'] : 0,
                        'offer_value' => $offer_value[0]['offer_value'] ? $offer_value[0]['offer_value'] : 0,
                        'subscription_value' => $subscription_value[0]['subscription_value'] ? $subscription_value[0]['subscription_value'] : 0,
                    );
                }
                return $output;
            } else {
                return false;
            }
        }
        
        public function vendorGiftActivity($data = NULL){
            $this->db->select('v.id as store_id,v.name as vendor_name,v.store_name,v.category_id,v.subcat_id,v.added_date,v.status');
            $this->db->from('vendor v');
            $this->db->where('v.status','1');
            $query = $this->db->get();
            if($query->num_rows() > 0){
                $result = $query->result_array();
                foreach ($result as $value) {
                    $plan_type = getSubscriptionPlan($value['store_id']);
                    $no_quantity = $this->common->select('inventory_gift'," where shop_name ='".$value['store_id']."' group by shop_name","SUM(stock) as no_quantity");
                    $no_giftRedeem = $this->common->select('my_gift'," where vendor_id = '".$value['store_id']."' and claim_status = 2 group by vendor_id",'count(*) as no_giftRedeem');
                    $no_giftValue = $this->common->select('inventory_gift'," where shop_name ='".$value['store_id']."' group by shop_name","SUM(value) as no_giftValue");
                    $no_giftRedeemValue = $this->common->select('my_gift'," where vendor_id='".$value['store_id']."' and claim_status = 2 group by vendor_id",'SUM(value) as no_giftRedeemValue');

                    $output[] = array(
                        'store_id' => $value['store_id'],
                        'vendor_name' => $value['vendor_name'],
                        'store_name' => $value['store_name'],
                        'category_id' => $value['category_id'],
                        'plan_type' => $plan_type[0]['plan_type'],
                        'status' => $value['status'],
                        'subcat_id' => $value['subcat_id'],
                        'added_date' => $value['added_date'],
                        'no_quantity' => $no_quantity[0]['no_quantity'] ? $no_quantity[0]['no_quantity'] : 0,
                        'no_giftRedeem' => $no_giftRedeem[0]['no_giftRedeem'] ? $no_giftRedeem[0]['no_giftRedeem'] : 0,
                        'no_giftRemain' => $no_quantity[0]['no_quantity'] - $no_giftRedeem[0]['no_giftRedeem'],
                        'no_giftValue' => $no_giftValue[0]['no_giftValue'] ? $no_giftValue[0]['no_giftValue'] : 0,
                        'no_giftRedeemValue' => $no_giftRedeemValue[0]['no_giftRedeemValue'] ? $no_giftRedeemValue[0]['no_giftRedeemValue'] : 0,
                        'no_giftRemainValue' => $no_giftValue[0]['no_giftValue'] - $no_giftRedeemValue[0]['no_giftRedeemValue'],
                    );
                }
                return $output;
            } else {
                return false;
            }
        }

        public function vendorClassifiedActivity($data = NULL){
            $this->db->select('v.id as store_id,v.name as vendor_name,v.store_name,v.category_id,v.subcat_id,v.added_date,v.status');
            $this->db->from('vendor v');
            $this->db->where('v.status','1');
            $query = $this->db->get();
            if($query->num_rows() > 0){
                $result = $query->result_array();
                foreach ($result as $value) {
                    $plan_type = getSubscriptionPlan($value['store_id']);
                    $no_result = $this->common->select('classified'," where vendor_id ='".$value['store_id']."' group by vendor_id","SUM(no_of_view) as no_of_view,SUM(no_of_share) as no_of_share,SUM(no_of_clicklink) as no_of_clicklink");
                    $no_unit = $this->common->select('classified_orders'," where vendor_id = '".$value['store_id']."' and status ='Active' group by vendor_id",'SUM(no_unit) as no_unit');
                    $no_spentAmount = $this->common->select('claimed_offer_item'," where vendor_id='".$value['store_id']."' and offer_type='classified' and claimed_status =2 group by vendor_id",'SUM(value) as no_spentAmount');

                    $output[] = array(
                        'store_id' => $value['store_id'],
                        'vendor_name' => $value['vendor_name'],
                        'store_name' => $value['store_name'],
                        'category_id' => $value['category_id'],
                        'plan_type' => $plan_type[0]['plan_type'],
                        'status' => $value['status'],
                        'subcat_id' => $value['subcat_id'],
                        'added_date' => $value['added_date'],
                        'no_view' => $no_result[0]['no_of_view'] ? $no_result[0]['no_of_view'] : 0,
                        'no_clickLink' => $no_result[0]['no_of_clicklink'] ? $no_result[0]['no_of_clicklink'] : 0,
                        'no_share' => $no_result[0]['no_of_share'] - $no_result[0]['no_of_share'],
                        'no_unit' => $no_unit[0]['no_unit'] ? $no_unit[0]['no_unit'] : 0,
                        'no_spentAmount' => $no_spentAmount[0]['no_spentAmount'] ? $no_spentAmount[0]['no_spentAmount'] : 0,
                    );
                }
                return $output;
            } else {
                return false;
            }
        }

        public function vendorLimitedActivity($data = NULL){
            $this->db->select('v.id as store_id,v.name as vendor_name,v.store_name,v.category_id,v.subcat_id,v.added_date,v.status');
            $this->db->from('vendor v');
            $this->db->where('v.status','1');
            $query = $this->db->get();
            if($query->num_rows() > 0){
                $result = $query->result_array();
                foreach ($result as $value) {
                    $plan_type = getSubscriptionPlan($value['store_id']);
                    $no_result = $this->common->select('limited_offer'," where vendor_id ='".$value['store_id']."' group by vendor_id","SUM(no_of_view) as no_of_view,SUM(no_of_share) as no_of_share");
                    $no_unit = $this->common->select('limited_orders'," where vendor_id = '".$value['store_id']."' and status ='Active' group by vendor_id",'SUM(no_unit) as no_unit');
                    $no_spentAmount = $this->common->select('claimed_offer_item'," where vendor_id='".$value['store_id']."' and offer_type='limited' and claimed_status =2 group by vendor_id",'SUM(value) as no_spentAmount');

                    $output[] = array(
                        'store_id' => $value['store_id'],
                        'vendor_name' => $value['vendor_name'],
                        'store_name' => $value['store_name'],
                        'category_id' => $value['category_id'],
                        'plan_type' => $plan_type[0]['plan_type'],
                        'status' => $value['status'],
                        'subcat_id' => $value['subcat_id'],
                        'added_date' => $value['added_date'],
                        'no_view' => $no_result[0]['no_of_view'] ? $no_result[0]['no_of_view'] : 0,
                        'no_share' => $no_result[0]['no_of_share'] ? $no_result[0]['no_of_share'] : 0,
                        'no_unit' => $no_unit[0]['no_unit'] ? $no_unit[0]['no_unit'] : 0,
                        'no_spentAmount' => $no_spentAmount[0]['no_spentAmount'] ? $no_spentAmount[0]['no_spentAmount'] : 0,
                    );
                }
                return $output;
            } else {
                return false;
            }
        }

        public function vendor_monthLimitedReport($data = NULL){
            $month = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
            $output =array();
            if(empty($data['year'])){
                $data['year'] = date('yy');
            }
            for ($i=0; $i < count($month); $i++) {
                $filter = $month[$i].'-'.$data['year'];
                $limitedCount = getNoLimited($filter);
                $views = getNoViewsLimited($filter);
                $limitedSpent = getSpentLimited($filter);
                $share = getNoShareLimited($filter);
                $units = getNoUnitLimited($filter);
                $output[] = array(
                    'month' => $filter,
                    'limitedCount' => $limitedCount['total_limited'],
                    'limitedViews' => $views['total_views'],
                    'limitedSpent' => $limitedSpent['total_spent'],
                    'limitedShare' => $share['total_share'],
                    'limitedUnit' => $units['total_unit'],
                );
            }
            return $output;
        }

        public function vendor_monthClassifiedReport($data = NULL){
            $month = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
            $output =array();
            if(empty($data['year'])){
                $data['year'] = date('yy');
            }
            for ($i=0; $i < count($month); $i++) {
                $filter = $month[$i].'-'.$data['year'];
                $classifiedCount = getNoClassified($filter);
                $views = getNoViewsClassified($filter);
                $limitedSpent = getSpentClassified($filter);
                $share = getNoShareClassified($filter);
                $units = getNoUnitClassified($filter);
                $linksClick = getNoClickLinks($filter);
                $output[] = array(
                    'month' => $filter,
                    'classifiedCount' => $classifiedCount['total_classified'],
                    'classifiedViews' => $views['total_views'],
                    'classifiedSpent' => $limitedSpent['total_spent'],
                    'classifiedShare' => $share['total_share'],
                    'classifiedUnit' => $units['total_unit'],
                    'classifiedLink' => $linksClick['total_link'],
                );
            }
            return $output;
        }

        public function Vendor_monthGiftReport($data = NULL){
            $month = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
            $output =array();
            if(empty($data['year'])){
                $data['year'] = date('yy');
            }
            for ($i=0; $i < count($month); $i++) {
                $filter = $month[$i].'-'.$data['year'];
                $quantityGift = getquantityGift($filter);
                $redeemGift = getNoRedeemGift($filter);
                $valueGift = getValuesGift($filter);
                $redeemValue = getRedeemValue($filter);
                $output[] = array(
                    'month' => $filter,
                    'quantityGift' => $quantityGift['total_stock'] ? $quantityGift['total_stock'] : 0,
                    'redeemGift' => $redeemGift['total_used'] ? $redeemGift['total_used'] : 0,
                    'remainGift' => $quantityGift['total_stock'] - $redeemGift['total_used'],
                    'valueGift' => $valueGift['total_value'] ? $valueGift['total_value'] : 0,
                    'redeemValue' => $redeemValue['total_redeemValue'] ? $redeemValue['total_redeemValue'] : 0,
                    'remainValue' => $valueGift['total_value'] - $redeemValue['total_redeemValue'],
                );
            }
            return $output;
        }

        public function Vendor_monthOffersReport($data = NULL){
            $month = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
            $output =array();
            if(empty($data['year'])){
                $data['year'] = date('yy');
            }
            for ($i=0; $i < count($month); $i++) {
                $filter = $month[$i].'-'.$data['year'];
                $freeVendor = getFreeVendors($filter);
                $ExpireVendor = getExpireVendors($filter);
                $SubscribeVendor = getSubscribeVendor($filter);
                $SubscribeValue = getSubscribeValue($filter);
                $storeView = getStoreView($filter);
                $NoRated = getNoRated($filter);
                $NoComment = getNoComment($filter);
                $storeShare = getStoreShare($filter);
                $OfferRedeem = getOfferRedeem($filter);
                $OfferSaving = getOfferSaving($filter);

                $output[] = array(
                    'month' => $filter,
                    'freeVendor' => $freeVendor['total_FreeVendor'] ? $freeVendor['total_FreeVendor'] : 0,
                    'ExpireVendor' => $ExpireVendor['total_ExpireVendor'] ? $ExpireVendor['total_ExpireVendor'] : 0,
                    'SubscribeVendor' => $SubscribeVendor['total_SubscribeVendor'] ? $SubscribeVendor['total_SubscribeVendor'] : 0,
                    'SubscribeValue' => $SubscribeValue['total_SubscribeValue'] ? $SubscribeValue['total_SubscribeValue'] : 0,
                    'storeView' => $storeView['total_StoreView'] ? $storeView['total_StoreView'] : 0,
                    'storeShare' => $storeShare['total_StoreShare'] ? $storeShare['total_StoreShare'] : 0,
                    'OfferRedeem' => $OfferRedeem['total_redeem'] ? $OfferRedeem['total_redeem'] : 0,
                    'OfferSaving' => $OfferSaving['total_redeemValue'] ? $OfferSaving['total_redeemValue'] : 0,
                    'NoRated' => $NoRated['total_Rated'] ? $NoRated['total_Rated'] : 0,
                    'NoComment' => $NoComment['total_Review'] ? $NoComment['total_Review'] : 0,
                );
            }
            return $output;
        }
    }
?>
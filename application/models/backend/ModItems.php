<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class ModItems extends CI_Model{

        public function get_offerItem($data = null){
            $this->db->select('vo.*,v.store_name,v.name');
            $this->db->from('vendor_offers vo');
            $this->db->join('vendor v', "v.id = vo.vendor_id",'LEFT');
            $this->db->order_by('add_date','desc');

            if(!empty($data)){
                if($data['vender_id']){
                    $this->db->where('v.id', $data['vender_id']);
                }
                if($data['offer_item_id']){
                    $this->db->where('vo.id',$data['offer_item_id']);
                }
            }

            $query = $this->db->get();
            
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }
        
        public function get_classifiedItem($data = null){
            $this->db->select('c.*,v.store_name,v.name');
            $this->db->from('classified c');
            $this->db->join('vendor v', "v.id = c.vendor_id",'LEFT');
            $this->db->order_by('added_date','desc');

            if(!empty($data)){
                if($data['vender_id']){
                    $this->db->where('v.id', $data['vender_id']);
                }
                if($data['classified_item_id']){
                    $this->db->where('c.id',$data['classified_item_id']);
                }
            }

            $query = $this->db->get();
            
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }

        public function get_limitedItem($data = null){
            $this->db->select('lo.*,v.store_name,v.name');
            $this->db->from('limited_offer lo');
            $this->db->join('vendor v', "v.id = lo.vendor_id",'LEFT');
            $this->db->order_by('added_date','desc');

            if(!empty($data)){
                if($data['vender_id']){
                    $this->db->where('v.id', $data['vender_id']);
                }
                if($data['limited_item_id']){
                    $this->db->where('lo.id',$data['limited_item_id']);
                }
            }

            $query = $this->db->get();
            
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }

        public function get_inventoryItem($data = null){
            $this->db->select('ig.*,v.store_name,v.name');
            $this->db->from('inventory_gift ig');
            $this->db->join('vendor v', "v.id = ig.shop_name",'LEFT');
            $this->db->order_by('ig.create_date','desc');

            if(!empty($data)){
                if($data['vender_id']){
                    $this->db->where('v.id', $data['vender_id']);
                }
                if($data['inventory_item_id']){
                    $this->db->where('ig.id',$data['inventory_item_id']);
                }
            }

            $query = $this->db->get();
            
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }

        public function get_venderMembershipInfo($data = NULL){
            $this->db->select("vsp.*");
            $this->db->from('vender_subscription_plan vsp');
            $this->db->order_by('vsp.subscription_id','desc');
            
            if(!empty($data)){
                if($data['membership_id']){
                    $this->db->where('vsp.subscription_id',$data['membership_id']);
                }
            }

            $query = $this->db->get();
            
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }

        public function get_userMembershipInfo($data = NULL){
            $this->db->select("usp.*");
            $this->db->from('user_subscription_plan usp');
            $this->db->order_by('usp.subscription_id','desc');
            
            if(!empty($data)){
                if($data['membership_id']){
                    $this->db->where('usp.subscription_id',$data['membership_id']);
                }
            }

            $query = $this->db->get();
            
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }

        public function get_offerMembershipInfo($data = NULL){
            $this->db->select("os.*");
            $this->db->from('offer_setup os');
            $this->db->order_by('os.setup_id','desc');
            
            if(!empty($data)){
                if($data['setup_id']){
                    $this->db->where('os.setup_id',$data['setup_id']);
                }
            }

            $query = $this->db->get();
            
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }

        public function get_usersComments($data = NULL){

            $this->db->select('vr.*,v.store_name,u.name as user_name,u.email as user_email');
            $this->db->from('vendor_ratting vr');
            $this->db->join('vendor v','vr.vendor_id = v.id','LEFT');
            $this->db->join('user u','u.id = vr.user_id','LEFT');
            $this->db->where('vr.parent_id','0');
            $query = $this->db->get();
            
            if($query->num_rows()>0) {
                return $query->result_array();
            } else {
                return false;
            }
        }

        public function get_setupInfo($data = NULL){
            $this->db->select('*');
            $this->db->from('setup_plans');
            if(!empty($data['type'])){
                $this->db->where('setup_type',$data['type']);
            }
            if(!empty($data['id'])){
                $this->db->where('id',$data['id']);
            }
            $query = $this->db->get();
            
            if($query->num_rows()>0) {
                return $query->result_array();
            } else {
                return false;
            }
        }

        public function get_transactionInfo($data = NULL){
            $details_transaction = array();
            $start_date = "-";
            $expire_date = "-";
            $this->db->select('ta.*');
            $this->db->from('transaction_all ta');
            $this->db->order_by('ta.create_date','desc');
            $query = $this->db->get();
            
            if($query->num_rows() > 0){
                $result = $query->result_array();
                foreach($result as $value){
                    if($value['paid_by'] == 'user'){
                        $user_info = user_details($value['user_id']);
                        $res = $this->get_userMembershipInfo(array('membership_id' => $value['plan_id']));
                        $plan_name = $res[0]['plan_type'] ? $res[0]['plan_type'] : "";
                    }
                    if($value['paid_by'] == 'vender'){
                        $user_info = vender_details($value['user_id']);
                        $res = $this->get_venderMembershipInfo(array('membership_id' => $value['plan_id']));
                        $plan_name = $res[0]['plan_type'] ? $res[0]['plan_type'] : "";
                    }

                    if(!empty($value['start_date'])){
                        $start_date = date('m/d/yy', $value['start_date']);
                    }
                    if(!empty($value['expire_date'])){
                        $expire_date = date('m/d/yy', $value['expire_date']);
                    }

                    $details_transaction[] = array(
                        'transaction_id' => $value['transaction_id'],
                        'transaction_no' => $value['transaction_no'],
                        'user_id' => $value['user_id'],
                        'plan_name' => $plan_name,
                        'main_amount' => $value['main_amount'],
                        'discount' => $value['discount'],
                        'vat' => $value['vat'],
                        'total_amount' => $value['total_amount'],
                        'start_date' => $start_date,
                        'expire_date' => $expire_date,
                        'paid_by' => $value['paid_by'],
                        'payment_by' => $value['payment_by'],
                        'payment_status' => $value['payment_status'],
                        'create_date' => date('m/d/yy', strtotime($value['create_date'])),
                        'transaction_status' => $value['status'],
                        'user_name' => $user_info['user_name'],
                        'user_role' => $user_info['user_role'],
                        'user_email' => $user_info['user_email'],
                    );
                }
                return $details_transaction;

            } else {
                return false;
            }
            
        }

        public function allTransactionInfo($data = null){
            $this->db->select('ta.*');
            $this->db->from('transaction_all ta');
            if(!empty($data['transaction_id'])){
                $this->db->where('ta.transaction_id',$data['transaction_id']);
            }
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
                return false;
            }
        }

        public function get_currency($data = NULL){
            $this->db->select('*');
            $this->db->from('currency_setup');
            
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
                return false;
            }
        }

        public function gat_vat($data = NULL){
            $this->db->select('*');
            $this->db->from('vat_settings');
            $this->db->where('status', 'Active');

            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
                return false;
            }
        }

        public function get_point_adjust($data = NULL){
            $this->db->select('*');
            $this->db->from('currency_setup');
            
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
                return false;
            }
        }

        public function getPointSetupInfo($data = NULL){
            $this->db->select('ps.*');
            $this->db->from('points_setup ps');
            $this->db->where('ps.status','Active');

            $query = $this->db->get();
            if($query->num_rows() > 0 ){
                return $query->result_array();
            } else {
                return false;
            }
        }

        public function getLevelInfo($data = NULL){
            $this->db->select('*');
            $this->db->from('level');
            $this->db->where('status', 'Active');

            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
                return false;
            }
        }

        public function getManageGift($data = NULL){
            $output = array();
            $this->db->select('sg.*,l.level_number,l.level_name,l.gift_description,l.gift_values,l.required_points');
            $this->db->from('senario_gift sg');
            $this->db->join('level l','sg.level_id = l.level_id','LEFT');
            $this->db->where('sg.senario_status','Active');

            if(!empty($data['senario_id'])){
                $this->db->where('sg.senario_id', $data['senario_id']);
                $this->db->order_by('sg.senario_number','asc');
            }
            
            $query = $this->db->get();
            if($query->num_rows() > 0){
                $result = $query->result_array();
                foreach ($result as $value) {
                    $giftOneRes = $this->common->select('inventory_gift'," where id=".$value['gift_one_id']);
                    $giftTwoRes = $this->common->select('inventory_gift'," where id=".$value['gift_two_id']);
                    $giftThreeRes = $this->common->select('inventory_gift'," where id=".$value['gift_three_id']);
                    $venderOne = $this->common->select('vendor', " where id=".$value['vendor_one_id']);
                    $venderTwo = $this->common->select('vendor', " where id=".$value['vendor_two_id']);
                    $venderThree = $this->common->select('vendor', " where id=".$value['vendor_three_id']);

                    $output[] = array(
                        'senario_id' => $value['senario_id'],
                        'senario_number' => $value['senario_number'],
                        'level_id' => $value['level_id'],
                        'level_number' => $value['level_number'],
                        'level_name' => $value['level_name'],
                        'gift_description' => $value['gift_description'],
                        'gift_values' => $value['gift_values'],
                        'required_points' => $value['required_points'],

                        'category_one_id' => $value['category_one_id'],
                        'vendor_one_id' => $value['vendor_one_id'],
                        'vender_one_name' => $venderOne[0]['name'],
                        'gift_one_id' => $giftOneRes[0]['id'],
                        'gift_one_name' => $giftOneRes[0]['gift_name'],
                        'gift_one_value'  => $giftOneRes[0]['value'],
                        'gift_one_remaining' => $giftOneRes[0]['stock']-$giftOneRes[0]['used'],

                        'category_two_id' => $value['category_two_id'],
                        'vendor_two_id' => $value['vendor_two_id'],
                        'vender_two_name' => $venderTwo[0]['name'],
                        'gift_two_id' => $giftTwoRes[0]['id'],
                        'gift_two_name' => $giftTwoRes[0]['gift_name'],
                        'gift_two_value'  => $giftTwoRes[0]['value'],
                        'gift_two_remaining' => $giftTwoRes[0]['stock']-$giftTwoRes[0]['used'],

                        'category_three_id' => $value['category_three_id'],
                        'vendor_three_id' => $value['vendor_three_id'],
                        'vender_three_name' => $venderThree[0]['name'],
                        'gift_three_id' => $giftThreeRes[0]['id'],
                        'gift_three_name' => $giftThreeRes[0]['gift_name'],
                        'gift_three_value'  => $giftThreeRes[0]['value'],
                        'gift_three_remaining' => $giftThreeRes[0]['stock']-$giftThreeRes[0]['used'],
                    );
                }
                return $output;
            } else {
                return false;
            }
        }

        public function getInventoryTrackingInfo($data = NULL){
            $this->db->select('ig.id as inventory_id,ig.gift_name,ig.gift_description,ig.img as gift_img,ig.value,ig.stock,ig.used,ig.req_points,ig.time_limit,ig.status,v.id as shop_id,v.name as shop_name,v.category_id,v.subcat_id,ig.create_date');
            $this->db->from('inventory_gift ig');
            $this->db->join('vendor v', 'v.id = ig.shop_name','LEFT');

            if($data['gift_id']){
                $this->db->where('ig.id',$data['gift_id']);
            }
            
            $query = $this->db->get();
            if($query->num_rows() > 0){
                $result = $query->result_array();
                foreach($result as $value){
                    $scanerio = $this->getInfoScenario($value['inventory_id']);
                    $not_claimed_count = $this->common->select('my_gift', " where claim_status = 1 and Inventory_gift_id = '".$value['inventory_id']."'","count(*) as not_claimed_count");
				    $claimed_count = $this->common->select('my_gift'," where claim_status =2 and Inventory_gift_id= '".$value['inventory_id']."'","count(*) as claimed_count" );
                    $output[] = array(
                        'inventory_id' => $value['inventory_id'],
                        'gift_name' => $value['gift_name'],
                        'gift_name_ar' => translateText($value['gift_name']),
                        'create_date' => date('m/d/yy',strtotime($value['create_date'])),
                        'gift_description' => $value['gift_description'],
                        'gift_description_ar' => translateText($value['gift_description']),
                        'gift_img' => $value['gift_img'],
                        'value' => $value['value'],
                        'stock' => $value['stock'],
                        'used' => $value['used'],
                        'remain' => $value['stock'] - $value['used'],
                        'req_points' => $value['req_points'],
                        'time_limit' => date('m/d/yy',strtotime($value['time_limit'])),
                        'status' => $value['status'],
                        'shop_id' => $value['shop_id'],
                        'shop_name' => $value['shop_name'],
                        'category_id' => $value['category_id'],
                        'category_name' => getCatgoryTypeString($value['category_id']),
                        'subcat_id' => $value['subcat_id'],
                        'subcat_name' => subCategoryTypeString($value['subcat_id']),
                        'senario_id' => $scanerio[0]['senario_id'],
                        'senario_number' => $scanerio[0]['senario_number'],
                        'level_id' => $scanerio[0]['level_id'],
                        'gift_values' => $scanerio[0]['gift_values'],
                        'level_number' => $scanerio[0]['level_number'],
                        'level_name' => $scanerio[0]['level_name'],
                        'claimed_count' => $claimed_count[0]['claimed_count'],
                        'not_claimed_count' => $not_claimed_count[0]['not_claimed_count'],
                        'total' => $value['stock'] * $value['value'],
                    );
                }
                return $output;
            } else{
                return false;
            }
        }

        public function getInfoScenario($gift_id){
            $this->db->select('*');
            $this->db->from('senario_gift sg');
            $this->db->join('level l','l.level_id=sg.level_id');
            $this->db->or_where('sg.gift_two_id',$gift_id);
            $this->db->or_where('sg.gift_three_id',$gift_id);
            $this->db->or_where('sg.gift_one_id',$gift_id);

            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            } else{
                return false;
            }
        }

        public function getClaimedOfferUser($user_id){
            $this->db->select('coi.*,b.branch_name,b.city,v.store_name,vo.offer_title,vo.offer_type as type_id');
            $this->db->from('claimed_offer_item coi');
            $this->db->join('vendor v','v.id = coi.vendor_id','LEFT');
            $this->db->join('branch b','b.id = coi.branch_id','LEFT');
            $this->db->join('vendor_offers vo','vo.id = coi.offer_id','LEFT');
            $this->db->where('coi.offer_type','membership');
            $this->db->where('coi.user_id',$user_id);
            $query = $this->db->get();
            if($query->num_rows() > 0){
                $result = $query->result_array();
                foreach($result as $value){
                    $output[] = array(
                        'claimed_offer_id' => $value['claimed_offer_id'],
                        'offer_id' => $value['offer_id'],
                        'user_id' => $value['user_id'],
                        'vendor_id' => $value['vendor_id'],
                        'store_name' => $value['store_name'],
                        'branch_name' => $value['branch_name'],
                        'branch_id' => $value['branch_id'],
                        'offer_type' => $value['offer_type'],
                        'voucher_code' => $value['voucher_code'],
                        'claimed_date' => $value['claimed_date'],
                        'create_date' => $value['create_date'],
                        'claimed_status' => $value['claimed_status'],
                        'value' => $value['value'],
                        'city' => $value['city'],
                        'offer_title' => $value['offer_title'],
                        'offer_type_id' => $value['type_id'],
                        'saving_value' => $value['saving_value'],

                    );
                }
                return $output;
            } else {
                return false;
            }
        }

        public function  getUserPointClaim($user_id){
            $this->db->select('mp.*,ps.point_title,ps.point_description');
            $this->db->from('my_points mp');
            $this->db->join('points_setup ps','ps.point_setup_id = mp.point_setup_id','LEFT');
            $this->db->where('mp.user_id',$user_id);

            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            } else{
                return false;
            }
        }

        public function getUserGiftClaim($user_id){
            $this->db->select('mg.*,v.store_name,ig.value as ig_value,ig.time_limit as ig_timelimit,l.level_number,ig.gift_name');
            $this->db->from('my_gift mg');
            $this->db->join('inventory_gift ig','ig.id = mg.Inventory_gift_id','LEFT');
            $this->db->join('vendor v','v.id = ig.shop_name','LEFT');
            $this->db->join('level l','l.level_id = mg.level_id','LEFT');
            $this->db->where('mg.user_id',$user_id);
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
                return false;
            }


        }

        public function getUserComment($user_id){
            $this->db->select('vr.*,v.store_name');
            $this->db->from('vendor_ratting vr');
            $this->db->join('vendor v','v.id = vr.vendor_id','LEFT');
            $this->db->where('vr.user_id', $user_id);
            $this->db->where('vr.parent_id','0');
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            }else{
                return false;
            }

        }

        public function getUserActivity($data = NULL){
            // if(!empty($data['user_id'])){
            //     return false;
            // }

            $month = array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec');
            $output =array();
            if(empty($data['year'])){
                $data['year'] = date('yy');
            }

            for ($i=0; $i < count($month); $i++) {
                $filter = $month[$i].'-'.$data['year'];

                $offerClaim = getofferClaim($data['user_id'],$filter);
                $TotalSaving = getTotalSaving($data['user_id'],$filter);
                $ViewStore = getViewStore($data['user_id'],$filter);
                $NoComment = getUserNoComment($data['user_id'],$filter);
                $NoShare = getNoShare($data['user_id'],$filter);
                $pointClaim = getpointClaim($data['user_id'],$filter);

                $output[] = array(
                    'month' => $filter,
                    'offerClaim' => $offerClaim['total_offerClaim'] ? $offerClaim['total_offerClaim'] : 0,
                    'TotalSaving' => $TotalSaving['total_TotalSaving'] ? $TotalSaving['total_TotalSaving'] : 0,
                    'ViewStore' => $ViewStore['total_ViewStore'] ? $ViewStore['total_ViewStore'] : 0,
                    'NoComment' => $NoComment['total_NoComment'] ? $NoComment['total_NoComment'] : 0,
                    'NoShare' => $NoShare['total_NoShare'] ? $NoShare['total_NoShare'] : 0,
                    'pointClaim' => $pointClaim['total_pointClaim'] ? $pointClaim['total_pointClaim'] : 0,
                );
            }
            return $output;
        }
    }
?>
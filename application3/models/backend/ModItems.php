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
    }
?>
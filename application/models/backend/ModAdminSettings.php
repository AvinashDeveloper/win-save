<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class ModAdminSettings extends CI_Model{

        public function gatRolesInfo($data = NULL){
            $this->db->select('*');
            $this->db->from('user_roles');

            if(!empty($data['role_type'])){
                $this->db->where('role_type',$data['role_type']);
            } 
            if(!empty($data['role_id'])){
                $this->db->where('role_id',$data['role_id']);
            }
            
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
                return false;
            }
        }

        public function getManagerInfo($data = NULL){
            $this->db->select('*');
            $this->db->from('user');
            $this->db->or_where('type !=','0');
            if(!empty($data['role_type'])){
                $this->db->where('type',$data['role_type']);
            }
            if(!empty($data['id'])){
                $this->db->where('id',$data['id']);
            }

            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
                return false;
            }
        }

        public function getUsersRecords($data = NULL){
            $this->db->select('ta.*,u.name as user_name,u.email as user_email,u.contact as user_mobile,u.dob,u.user_age,u.user_gender,u.user_nationality,u.address,u.user_city,u.user_country,u.added_date,u.status as user_status');
            $this->db->from('transaction_all ta');
            $this->db->join('user u','u.id = ta.user_id','LEFT');
            $this->db->where('ta.paid_by','user');

            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
                return false;
            }
        }

        public function getVendorRecords($data = NULL){
            $sql = "SELECT tbl.*,v.name as salesman,v.category_id,v.subcat_id,v.status as v_status,v.approved_status,v.store_name FROM (SELECT concat('L_',limited_order_id) as row_id,concat('31',limited_order_id) as order_id, (@product := 'Limited order') as product, amount, discount, vat, no_unit, campain_name, (@plan_id := '') as plan_id,( @start_date := '') as start_date, (@expire_date := '') as expire_date, vendor_id,create_date FROM limited_orders UNION SELECT concat('C_',classified_order_id) as row_id,concat('21',classified_order_id) as order_id, (@product := 'Classified order') as product, amount, discount, vat, no_unit, campain_name, (@plan_d := '') as plan_id, (@start_date := '') as start_date, (@expire_date := '') as expire_date, vendor_id,create_date FROM classified_orders UNION SELECT concat('O_',membership_order_id) as row_id,concat('11',membership_order_id) as order_id, (@product := 'Membership order') as product, amount, discount, vat, @no_unit := '', @campain_name := '', plan_id, start_date, expire_date, vendor_id,create_date FROM offer_membership_orders) tbl LEFT JOIN vendor as v ON v.id = tbl.vendor_id";
    
            $query = $this->db->query($sql);
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }

        public function getOfferRecords($data = NULL){
            $this->db->select('vo.*,os.offer_type,v.name as salesman,v.category_id,v.store_name,v.subcat_id');
            $this->db->from('vendor_offers vo');
            $this->db->join('offer_setup os','vo.offer_type = os.setup_id','LEFT');
            $this->db->join('vendor v','v.id = vo.vendor_id','LEFT');

            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
                return false;
            }
        }

        public function getClassifiedRecords($data = NULL){
            $this->db->select('c.*,v.store_name');
            $this->db->from('classified c');
            $this->db->join('vendor v','v.id = c.vendor_id','LEFT');
            
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
                return false;
            }
        }

        public function getLimitedRecords($data = NULL){
            $this->db->select('lo.*,v.store_name');
            $this->db->from('limited_offer lo');
            $this->db->join('vendor v','v.id = lo.vendor_id','LEFT');
            
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
                return false;
            }
        }

        public function getClaimOfferRecords($data = NULL){
            $this->db->select('coi.*,vo.*,v.store_name,v.name as vendor_name,u.name as user_name,b.branch_name,b.city');
            $this->db->from('claimed_offer_item coi');
            $this->db->join('vendor_offers vo','vo.id = coi.offer_id','LEFT');
            $this->db->join('vendor v','v.id = coi.vendor_id','LEFT');
            $this->db->join('user u','u.id = coi.user_id','LEFT');
            $this->db->join('branch b','b.id = coi.branch_id','LEFT');
            
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
                return false;
            }
        }

        public function getClaimGiftRecords($data = NULL){
            $this->db->select('mg.*,mg.create_date as won_date ,ig.*,v.store_name,v.name as vendor_name,u.name as user_name,b.branch_name,b.city as branch_city,ig.value as amount');
            $this->db->from('my_gift mg');
            $this->db->join('inventory_gift ig','ig.id = mg.Inventory_gift_id','LEFT');
            $this->db->join('vendor v','v.id = mg.vendor_id','LEFT');
            $this->db->join('user u','u.id = mg.user_id','LEFT');
            $this->db->join('branch b','b.id = mg.branch_id','LEFT');
            $this->db->where('mg.claim_status',2);
            
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
                return false;
            }
        }

        public function getUnclaimGiftRecords($data = NULL){
            $this->db->select('mg.*,mg.create_date as won_date ,ig.*,v.store_name,v.name as vendor_name,u.name as user_name,b.branch_name,b.city as branch_city,ig.value as amount');
            $this->db->from('my_gift mg');
            $this->db->join('inventory_gift ig','ig.id = mg.Inventory_gift_id','LEFT');
            $this->db->join('vendor v','v.id = mg.vendor_id','LEFT');
            $this->db->join('user u','u.id = mg.user_id','LEFT');
            $this->db->join('branch b','b.id = mg.branch_id','LEFT');
            $this->db->where('mg.claim_status',1);
            
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
                return false;
            }
        }

        public function getInventoryRecords($data = NULL){
            $this->db->select('ig.*,v.store_name,v.category_id,v.subcat_id,v.name as vendor_name');
            $this->db->from('inventory_gift ig');
            $this->db->join('vendor v','v.id= ig.shop_name','LEFT');
            $query = $this->db->get();

            if($query->num_rows() > 0){
                $result = $query->result_array();
                foreach($result as $value){

                    $not_claimed_count = $this->common->select('my_gift', " where claim_status = 1 and Inventory_gift_id = '".$value['id']."'","count(*) as not_claimed_count");
                    $claimed_count = $this->common->select('my_gift'," where claim_status =2 and Inventory_gift_id= '".$value['id']."'","count(*) as claimed_count" );

                    $output[] = array(
                        'store_name' => $value['store_name'],
                        'category_id' => $value['category_id'],
                        'subcat_id' => $value['subcat_id'],
                        'vendor_name' => $value['vendor_name'],
                        'gift_title' => $value['gift_name'],
                        'expire_date' => $value['time_limit'],
                        'status' => $value['status'],
                        'value' => $value['value'],
                        'stock' => $value['stock'],
                        'used' => $value['used'],
                        'create_date' => $value['create_date'],
                        'claimed_count' => $claimed_count[0]['claimed_count'],
                        'not_claimed_count' => $not_claimed_count[0]['not_claimed_count'],
                    );
                }
                return $output;

            } else {
                return false;
            }
        }

        public function getCommentRecords($data = NULL){
            $this->db->select('vr.*,u.name as user_name,u.email as user_email,v.store_name');
            $this->db->from('vendor_ratting vr');
            $this->db->join('user u','u.id=vr.user_id','LEFT');
            $this->db->join('vendor v','v.id=vr.vendor_id','LEFT');
            $this->db->where('vr.parent_id','0');
            $query = $this->db->get();
            if($query->num_rows() > 0){
                return $query->result_array();
            } else {
                return false;
            }
        }
    }
?>
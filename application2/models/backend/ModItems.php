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
    }
?>
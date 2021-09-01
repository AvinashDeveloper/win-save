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


    }
?>
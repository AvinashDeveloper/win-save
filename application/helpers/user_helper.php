<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    function getofferClaim($user_id,$filter){
        $CI = &get_instance();

        $CI->db->select('count(*) as total_offerClaim');
        $CI->db->from('claimed_offer_item coi');
        $CI->db->where('coi.user_id',$user_id);
        $CI->db->where("DATE_FORMAT(coi.create_date, '%b-%Y') = '".$filter."'");
        $query = $CI->db->get();
        if($query->num_rows() > 0){
            return $query->result_array()[0];
        }else{
            return array('total_offerClaim' => 0 );
        }
    }

    function getTotalSaving($user_id,$filter){
        $CI = &get_instance();

        $CI->db->select('SUM(value) as total_TotalSaving');
        $CI->db->from('claimed_offer_item coi');
        $CI->db->where('coi.user_id',$user_id);
        $CI->db->where("DATE_FORMAT(coi.create_date, '%b-%Y') = '".$filter."'");
        $query = $CI->db->get();
        if($query->num_rows() > 0){
            return $query->result_array()[0];
        }else{
            return array('total_TotalSaving' => 0 );
        }
    }

    function getViewStore($user_id,$filter){
        $CI = &get_instance();

        $CI->db->select('COUNT(*) as total_ViewStore');
        $CI->db->from('users_activities ua');
        $CI->db->where('ua.user_id',$user_id);
        $CI->db->where("DATE_FORMAT(ua.create_date, '%b-%Y') = '".$filter."'");
        $CI->db->where('ua.views','1');
        $CI->db->where('ua.select_type','store');
        $query = $CI->db->get();
        if($query->num_rows() > 0){
            return $query->result_array()[0];
        }else{
            return array('total_ViewStore' => 0 );
        }
    }

    function getNoShare($user_id,$filter){
        $CI = &get_instance();

        $CI->db->select('count(*) as total_NoShare');
        $CI->db->from('users_activities ua');
        $CI->db->where('ua.user_id',$user_id);
        $CI->db->where("DATE_FORMAT(ua.create_date, '%b-%Y') = '".$filter."'");
        $CI->db->where('ua.share','1');
        // $CI->db->where('ua.select_type','store');
        $query = $CI->db->get();
        if($query->num_rows() > 0){
            return $query->result_array()[0];
        }else{
            return array('total_NoShare' => 0 );
        }
    }

    function getpointClaim($user_id,$filter){
        $CI = &get_instance();

        $CI->db->select('SUM(reward_points) as total_pointClaim');
        $CI->db->from('my_points');
        $CI->db->where('user_id',$user_id);
        $CI->db->where("DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'");
        $query = $CI->db->get();
        if($query->num_rows() > 0){
            return $query->result_array()[0];
        } else{
            return array( 'total_pointClaim' => 0 );
        }
    }

    function getUserNoComment($user_id,$filter){
        $CI = &get_instance();
        
        $CI->db->select('count(*) as total_NoComment');
        $CI->db->from('vendor_ratting');
        $CI->db->where('user_id',$user_id);
        $CI->db->where("review != '' and parent_id = 0");
        $CI->db->where("DATE_FORMAT(create_date, '%b-%Y') = '".$filter."'");
        $query = $CI->db->get();

        if($query->num_rows() > 0){
            return $query->result_array()[0];
        } else{
            return array( 'total_NoComment' => 0 );
        }
    }
?>
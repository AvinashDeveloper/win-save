<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Reward_gift extends CI_Controller {

	public function __construct()  {
		parent::__construct();
        // $this->load->model(array('backend/ModVender'=>'MV','backend/Modlogin'=>'ML'));
        if(!$this->session->userdata('Login')){
            redirect('admin');
        }
    }

    // Function for manage levels
    public function getLevels(){ //rewardLevel_save 
        $data = array();
        $result  = $this->MI->getLevelInfo();
        $data['level_info'] = $result;
        $data['level_count'] = count($result);
        $this->load->view('backend/reward_gift/reward_level',$data);
    }

    public function getRewardLevelInfo(){
        $post = $this->input->post();
        if(!empty($post)){
            $level_id = $post['level_id'];

            $where = " where level_id ='".$level_id."'";
            $result = $this->common->select('level', $where);
            if(!empty($result)){
                $resultArr[] = array(
                    'level_id' => $result[0]['level_id'],
                    'level_name_en' => $result[0]['level_name'],
                    'gift_description_en' => $result[0]['gift_description'],
                    'gift_description_ar' => translateText($result[0]['gift_description']),
                    'level_number' => $result[0]['level_number'],
                    'level_name_ar' => translateText($result[0]['level_name']),
                    'required_points' => $result[0]['required_points'],
                    'gift_values' => $result[0]['gift_values'],
                    'status' => $result[0]['status'],
                    'create_date' => date('m/d/yy',strtotime($result[0]['create_date'])),
                );
                
                $output = array('status' => 1,
                    'result' => $resultArr,
                    'message' => "successfully Get Info."
                );
            } else {
                $output = array('status' => 0,
                    'message' => "Recourd not found"
                );
            }
            echo json_encode($output);die;
        }
    }

    public function rewardLevel_save(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'level_name_en' => "",
                'level_name_ar' => "",
                'level_number' => "",
                'gift_description' => "",
                'required_points' => "",
                'gift_values' => "",
            );
            
            $post = array_merge($blankArr, $post);
            $data = array(
                'level_name' => $post['level_name_en'] ? $post['level_name_en'] : translateTextEn($post['level_name_ar']),
                'level_number' => $post['level_number'],
                'gift_description' => $post['gift_description'],
                'required_points' => $post['required_points'],
                'gift_values' => $post['gift_values'],
                'status'      => 'Active',
                'create_date' => date('yy-m-d')
            );

            $save_array = $this->common->insert('level',$data);
            $output = array(
                'status' => 1,
                'message' => "Successfully Save."
            );
        } else {
            $output = array(
                'status' => 0,
                'message' => "Somthing error."
            );
        }
        echo json_encode($output);die;
    }

    public function rewardLevel_update(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'level_name_en' => "",
                'level_name_ar' => "",
                'level_number' => "",
                'gift_description_en' => "",
                'required_points' => "",
                'gift_values' => "",
            );
            
            $post = array_merge($blankArr, $post);
            $data = array(
                'level_name' => $post['level_name_en'] ? $post['level_name_en'] : translateTextEn($post['level_name_ar']),
                'level_number' => $post['level_number'],
                'gift_description' => $post['gift_description_en'],
                'required_points' => $post['required_points'],
                'gift_values' => $post['gift_values'],
                'status'      => 'Active',
            );

            $whereArr =  array('level_id' => $post['level_id']);
            $save_array = $this->common->update('level',$data, $whereArr);
            $output = array(
                'status' => 1,
                'message' => "Successfully Update."
            );
        } else {
            $output = array(
                'status' => 0,
                'message' => "Somthing error."
            );
        }
        echo json_encode($output);die;
    }

    public function getScenario(){
        $data = array();
        $this->load->view('backend/reward_gift/assign_gift',$data);
    }

    public function getManageGifts(){
        $data = array();
        $this->load->view('backend/reward_gift/manag_gift',$data);
    }
    
    public function inventoryTraking(){
        $data = array();
        $this->load->view('backend/reward_gift/inventory_tracking',$data);
    }

    // Function for manage point setup
    public function pointSetup(){
        $data = array();
        $data['points_setup'] = $this->MI->getPointSetupInfo();
        $this->load->view('backend/reward_gift/points_claim_setup',$data);
    }

    public function getPointClaimInfo(){
        $post = $this->input->post();
        if(!empty($post)){
            $point_setup_id = $post['point_setup_id'];

            $where = " where point_setup_id ='".$point_setup_id."'";
            $result = $this->common->select('points_setup', $where);
            if(!empty($result)){
                $resultArr[] = array(
                    'point_setup_id' => $result[0]['point_setup_id'],
                    'point_title_en' => $result[0]['point_title'],
                    'point_title_ar' => translateText($result[0]['point_title']),
                    'point_description' => $result[0]['point_description'],
                    'reward_points' => $result[0]['reward_points'],
                    'status' => $result[0]['status'],
                    'create_date' => date('m/d/yy',strtotime($result[0]['create_date'])),
                );
                
                $output = array('status' => 1,
                    'result' => $resultArr,
                    'message' => "successfully Get Info."
                );
            } else {
                $output = array('status' => 0,
                    'message' => "Recourd not found"
                );
            }
            echo json_encode($output);die;
        }
    }

    public function pointClaim_save(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'point_title_ar' => "",
                'point_title_en' => "",
                'reward_points' => "",
                'point_description' => "",
            );
            
            $post = array_merge($blankArr, $post);
            $data = array(
                'point_title' => $post['point_title_en'] ? $post['point_title_en'] : translateTextEn($post['point_title_ar']),
                'reward_points' => $post['reward_points'],
                'point_description' => $post['point_description'],
                'status'      => 'Active',
                'create_date' => date('yy-m-d')
            );

            $save_array = $this->common->insert('points_setup',$data);
            $output = array(
                'status' => 1,
                'message' => "Successfully Save."
            );
        } else {
            $output = array(
                'status' => 0,
                'message' => "Somthing error."
            );
        }
        echo json_encode($output);die;
    }

    public function pointClaim_update(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'point_title_ar' => "",
                'point_title_en' => "",
                'reward_points' => "",
                'point_description' => "",
            );
            
            $post = array_merge($blankArr, $post);
            $data = array(
                'point_title' => $post['point_title_en'] ? $post['point_title_en'] : translateTextEn($post['point_title_ar']),
                'reward_points' => $post['reward_points'],
                'point_description' => $post['point_description'],
                'status'      => 'Active',
            );

            $whereArr =  array('point_setup_id' => $post['point_setup_id']);
            $save_array = $this->common->update('points_setup',$data, $whereArr);
            $output = array(
                'status' => 1,
                'message' => "Successfully Update."
            );
        } else {
            $output = array(
                'status' => 0,
                'message' => "Somthing error."
            );
        }
        echo json_encode($output);die;
    }

    //  Function for manage point adjust
    public function pointAdjust(){
        $data = array();
        $data['points_adjust'] = $this->MI->get_point_adjust();
        $this->load->view('backend/reward_gift/points_adjust',$data);
    }

    public function getPointAdjustInfo(){
        $post = $this->input->post();
        if(!empty($post)){
            $currency_id = $post['currency_id'];

            $where = " where currency_id ='".$currency_id."'";
            $result = $this->common->select('currency_setup', $where);
            if(!empty($result)){
                $resultArr[] = array(
                    'currency_id' => $result[0]['currency_id'],
                    'currency_name' => $result[0]['currency_name'],
                    'currency_symbol_ar' => translateText($result[0]['currency_symbol']),
                    'currency_symbol' => $result[0]['currency_symbol'],
                    'currency_country' => $result[0]['currency_country'],
                    'currency_country_name' => $result[0]['currency_country_name'],
                    'adjust_currency' => $result[0]['adjust_currency'],
                    'equivalent_point' => $result[0]['equivalent_point'],
                    'currency_amount' => $result[0]['currency_amount'],
                    'currency_status' => $result[0]['currency_status']
                );
                
                $output = array('status' => 1,
                    'result' => $resultArr,
                    'message' => "successfully Get Info."
                );
            } else {
                $output = array('status' => 0,
                    'message' => "Recourd not found"
                );
            }
            echo json_encode($output);die;
        }
    }

    public function pointsAdjust_save(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'currency_name' => "",
                'currency_amount' => "",
                'currency_symbol' => "",
                'currency_country' => "",
                'adjust_currency' => "",
                'equivalent_point' => ""
            );
            
            $post = array_merge($blankArr, $post);
            $data = array(
                'currency_amount' => $post['currency_amount'],
                'currency_country' => $post['currency_country'],
                'currency_country_name' => $post['currency_country'],
                'currency_symbol' => $post['currency_symbol'],
                'adjust_currency' => $post['adjust_currency'],
                'currency_name' => $post['currency_name'],
                'equivalent_point' => $post['equivalent_point'],
                'currency_status'      => 'Active',
            );

            $save_array = $this->common->insert('currency_setup',$data);
            $output = array(
                'status' => 1,
                'message' => "Successfully Save."
            );
        } else {
            $output = array(
                'status' => 0,
                'message' => "Somthing error."
            );
        }
        echo json_encode($output);die;
    }

    public function pointAdjust_update(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'currency_symbol' => "",
                'equivalent_point' => "",
                'currency_amount' => "",
            );
            
            $post = array_merge($blankArr, $post);
            $data = array(
                'currency_amount' => $post['currency_amount'],
                'equivalent_point' => $post['equivalent_point'],
                'currency_symbol' => $post['currency_symbol'],
                'currency_status'      => 'Active',
            );

            $whereArr =  array('currency_id' => $post['currency_id']);
            $save_array = $this->common->update('currency_setup',$data, $whereArr);
            $output = array(
                'status' => 1,
                'message' => "Successfully Save."
            );
        } else {
            $output = array(
                'status' => 0,
                'message' => "Somthing error."
            );
        }
        echo json_encode($output);die;
    }
}
?>
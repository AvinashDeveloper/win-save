<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Membership extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model(array('backend/ModVender' => 'MV'));
            if(!$this->session->userdata('Login')){
                redirect('admin');
            }
        }
        
        // managed vender membership plans
        public function vender_membership(){
            $data = array();
            $data['v_membershipInfo'] = $this->MI->get_venderMembershipInfo();
            $this->load->view('backend/vendor_membership',$data);
        }

        public function VMembership_save(){
            $post = $this->input->post();
            if(!empty($post)){
                $this->form_validation->set_rules('plan_type', 'Plan Type', 'required'); 
                $this->form_validation->set_rules('package_details', 'package_details', 'required'); 
                // $this->form_validation->set_rules('main_amount', 'Price', 'required'); 
                // $this->form_validation->set_rules('priority', 'Priority Display', 'required'); 
                $this->form_validation->set_rules('feature_view', 'Feature View', 'required'); 
                $this->form_validation->set_rules('notification_alert', 'Notification Alert', 'required'); 

                if ($this->form_validation->run() == FALSE) {
                    $output = array(
                        'status' => 0,
                        'message' => get_form_error($this->form_validation->error_array()),
                    );
                } else {
                    $membershipArr = array(
                        'plan_type' => $post['plan_type'],
                        'description' => $post['description'],
                        'package_details' => $post['package_details'],
                        'offer_limit' => $post['offer_limit'],
                        'branch_limit' => $post['branch_limit'],
                        'feature_view' => $post['feature_view'],
                        'notification_alert' => $post['notification_alert'],
                        'main_amount' => $post['main_amount'],
                        'discount' => $post['discount'],
                        'offer_amount' => $post['offer_amount'],
                        'priority_display' => $post['priority'],
                        'status' => "Active",
                        'create_date' => date('yy-m-d'),
                    );

                    $id = $this->common->insert('vender_subscription_plan', $membershipArr);
                    $output = array(
                        'status' => 1,
                        'message' => "Successfully Save."
                    );
                }
            } else {
                $output = array(
                    'status' => 0,
                    'message' => "Something error."
                );
            }
            echo json_encode($output);die;
        }

        public function getVMembershipInfo(){
            $post = $this->input->post();
            $output = array();
            if(!empty($post)){
                $membership_id = $post['membership_id'];
                $membershipInfo = $this->MI->get_venderMembershipInfo($post);
                $output = array(
                    'status' => 1,
                    'result' => $membershipInfo,
                    'message'=> "Successfully"
                );
            }else{
                $output = array(
                    'status' => 0,
                    'message' => "Somthing Error."
                );
            }
            echo json_encode($output);die;
        }

        public function VMembership_update(){
            $post = $this->input->post();
            if(!empty($post)){
                $this->form_validation->set_rules('plan_type', 'Plan Type', 'required'); 
                $this->form_validation->set_rules('package_details', 'package_details', 'required'); 
                // $this->form_validation->set_rules('main_amount', 'Price', 'required'); 
                $this->form_validation->set_rules('priority_display', 'Priority Display', 'required'); 
                $this->form_validation->set_rules('feature_view', 'Feature View', 'required'); 
                $this->form_validation->set_rules('notification_alert', 'Notification Alert', 'required'); 

                if ($this->form_validation->run() == FALSE) {
                    $output = array(
                        'status' => 0,
                        'message' => get_form_error($this->form_validation->error_array()),
                    );
                } else {
                    $membershipArr = array(
                        'plan_type' => $post['plan_type'],
                        'description' => $post['description'],
                        'package_details' => $post['package_details'],
                        'offer_limit' => $post['offer_limit'],
                        'branch_limit' => $post['branch_limit'],
                        'feature_view' => $post['feature_view'],
                        'notification_alert' => $post['notification_alert'],
                        'main_amount' => $post['main_amount'],
                        'discount' => $post['discount'],
                        'offer_amount' => $post['offer_amount'],
                        'priority_display' => $post['priority_display'],
                        'status' => "Active",
                        'create_date' => date('yy-m-d'),
                    );
                    $whereArr = array(
                        'subscription_id' => $post['subscription_id']
                    );

                    $this->common->update('vender_subscription_plan', $membershipArr,$whereArr);
                    $output = array(
                        'status' => 1,
                        'message' => "Successfully Update."
                    );
                }
            } else {
                $output = array(
                    'status' => 0,
                    'message' => "Something error."
                );
            }
            echo json_encode($output);die;
        }

        //  managed user membership plan
        public function user_membership(){
            $data = array();
            $data['u_membershipInfo'] = $this->MI->get_userMembershipInfo();
            $this->load->view('backend/user_membership',$data);
        }

        public function UMembership_save(){
            $post = $this->input->post();
            if(!empty($post)){
                if(empty($post['plan_type_en']) && empty($post['plan_type_ar'])){
                    $this->form_validation->set_rules('plan_type_en', 'Plan Type', 'required'); 
                }
                $this->form_validation->set_rules('subscription_limit', 'Subscription Limit', 'required'); 
                $this->form_validation->set_rules('offer_claim', 'Offer Claim', 'required'); 
                $this->form_validation->set_rules('collect_point', 'Collect Point', 'required'); 
                $this->form_validation->set_rules('redeem_gift', 'Redeem Gift', 'required');
                if ($this->form_validation->run() == FALSE) {
                    $output = array(
                        'status' => 0,
                        'message' => get_form_error($this->form_validation->error_array()),
                    );
                } else {
                    $membershipArr = array(
                        'plan_type' => $post['plan_type_en'] ? $post['plan_type_en'] : translateTextEn($post['plan_type_ar']),
                        'description' => $post['description_en'] ? $post['description_en'] : translateTextEn($post['description_ar']),
                        'subscription_limit' => $post['subscription_limit'],
                        'offer_claim' => $post['offer_claim'],
                        'collect_point' => $post['collect_point'],
                        'redeem_gift' => $post['redeem_gift'],
                        'main_amount' => $post['main_amount'],
                        'discount' => $post['discount'],
                        'offer_amount' => $post['offer_amount'],
                        'status' => "Active",
                        'create_date' => date('yy-m-d'),
                    );

                    $id = $this->common->insert('user_subscription_plan', $membershipArr);
                    $output = array(
                        'status' => 1,
                        'message' => "Successfully Save."
                    );
                }
            } else {
                $output = array(
                    'status' => 0,
                    'message' => "Something error."
                );
            }
            echo json_encode($output);die;
        }

        public function getUMembershipInfo(){
            $post = $this->input->post();
            $output = array();
            if(!empty($post)){
                $membership_id = $post['membership_id'];
                $membershipInfo = $this->MI->get_userMembershipInfo($post);

                $result[] = array(
                    'subscription_id' =>$membershipInfo[0]['subscription_id'],
                    'plan_type_en' =>$membershipInfo[0]['plan_type'],
                    'plan_type_ar' =>translateText($membershipInfo[0]['plan_type']),
                    'description_en' =>$membershipInfo[0]['description'],
                    'description_ar' =>translateText($membershipInfo[0]['description']),
                    'subscription_limit' =>$membershipInfo[0]['subscription_limit'],
                    'offer_claim' =>$membershipInfo[0]['offer_claim'],
                    'collect_point' =>$membershipInfo[0]['collect_point'],
                    'redeem_gift' =>$membershipInfo[0]['redeem_gift'],
                    'discount' =>$membershipInfo[0]['discount'],
                    'offer_amount' =>$membershipInfo[0]['offer_amount'],
                    'main_amount' =>$membershipInfo[0]['main_amount'],
                );
                $output = array(
                    'status' => 1,
                    'result' => $result,
                    'message'=> "Successfully"
                );
            }else{
                $output = array(
                    'status' => 0,
                    'message' => "Somthing Error."
                );
            }
            echo json_encode($output);die;
        }

        public function UMembership_update(){
            $post = $this->input->post();
            if(!empty($post)){
                if(empty($post['plan_type_en']) && empty($post['plan_type_ar'])){
                    $this->form_validation->set_rules('plan_type_en', 'Plan Type', 'required'); 
                }
                $this->form_validation->set_rules('subscription_limit', 'Subscription Limit', 'required'); 
                $this->form_validation->set_rules('offer_claim', 'Offer Claim', 'required'); 
                $this->form_validation->set_rules('collect_point', 'Collect Point', 'required'); 
                $this->form_validation->set_rules('redeem_gift', 'Redeem Gift', 'required'); 

                if ($this->form_validation->run() == FALSE) {
                    $output = array(
                        'status' => 0,
                        'message' => get_form_error($this->form_validation->error_array()),
                    );
                } else {
                    $membershipArr = array(
                        'plan_type' => $post['plan_type_en'] ? $post['plan_type_en'] : translateTextEn($post['plan_type_ar']),
                        'description' => $post['description_en'] ? $post['description_en'] : translateTextEn($post['description_ar']),
                        'subscription_limit' => $post['subscription_limit'],
                        'offer_claim' => $post['offer_claim'],
                        'collect_point' => $post['collect_point'],
                        'redeem_gift' => $post['redeem_gift'],
                        'main_amount' => $post['main_amount'],
                        'discount' => $post['discount'],
                        'offer_amount' => $post['offer_amount'],
                        'status' => "Active",
                        'create_date' => date('yy-m-d'),
                    );
                    $whereArr = array(
                        'subscription_id' => $post['subscription_id']
                    );

                    $this->common->update('user_subscription_plan', $membershipArr,$whereArr);
                    $output = array(
                        'status' => 1,
                        'message' => "Successfully Update."
                    );
                }
            } else {
                $output = array(
                    'status' => 0,
                    'message' => "Something error."
                );
            }
            echo json_encode($output);die;
        }

        // managed offer setup
        public function offer_setup(){
            $data = array();
            $data['o_membershipInfo'] = $this->MI->get_offerMembershipInfo();
            $this->load->view('backend/offer_setup',$data);
        }

        public function OfferSetup_save(){
            $post = $this->input->post();
            if(!empty($post)){
                $membershipArr = array(
                    'offer_type' => $post['offer_type'],
                    'description' => $post['description_en'] ? $post['description_en'] : translateTextEn($post['description_ar']),
                    'status' => "Active",
                    'create_date' => date('yy-m-d'),
                );

                if(!empty($_FILES['setup_image']['name'])){
                    $config['upload_path'] = './assets/images/offer_plan/';  
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';  
                    $this->load->library('upload', $config);  
                    if(!$this->upload->do_upload('setup_image'))  {  
                        echo $this->upload->display_errors();  
                    }  else  {  
                        $data = $this->upload->data();
                        $membershipArr = array_merge($membershipArr, array( 'setup_image' => $data["file_name"]));
                    }  
                }
                

                $id = $this->common->insert('offer_setup', $membershipArr);
                $output = array(
                    'status' => 1,
                    'message' => "Successfully Save."
                );
            } else {
                $output = array(
                    'status' => 0,
                    'message' => "Something error."
                );
            }
            echo json_encode($output);die;
        }

        public function getOfferSetupInfo(){
            $post = $this->input->post();
            $output = array();
            if(!empty($post)){
                $setup_id = $post['setup_id'];
                $membershipInfo = $this->MI->get_offerMembershipInfo($post);

                $result[] = array(
                    'setup_id' =>$membershipInfo[0]['setup_id'],
                    'offer_type' =>$membershipInfo[0]['offer_type'],
                    'description_en' =>$membershipInfo[0]['description'],
                    'description_ar' =>translateText($membershipInfo[0]['description']),
                    'setup_image' =>base_url('/assets/images/offer_plan/').$membershipInfo[0]['setup_image'],
                    'status' =>$membershipInfo[0]['status'],
                    'create_date' =>$membershipInfo[0]['create_date']
                );
                $output = array(
                    'status' => 1,
                    'result' => $result,
                    'message'=> "Successfully"
                );
            }else{
                $output = array(
                    'status' => 0,
                    'message' => "Somthing Error."
                );
            }
            echo json_encode($output);die;
        }

        public function offerSetup_update(){
            $post = $this->input->post();
            if(!empty($post)){
                $membershipArr = array(
                    'offer_type' => $post['Uoffer_type'],
                    'description' => $post['Udescription_en'] ? $post['Udescription_en'] : translateTextEn($post['Udescription_ar']),
                    'status' => "Active",
                    'create_date' => date('yy-m-d'),
                );

                if(!empty($_FILES['Usetup_image']['name'])){
                    $config['upload_path'] = './assets/images/offer_plan/';  
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';  
                    $this->load->library('upload', $config);  
                    if(!$this->upload->do_upload('Usetup_image'))  {  
                        echo $this->upload->display_errors();  
                    }  else  {  
                        $data = $this->upload->data();
                        $membershipArr = array_merge($membershipArr, array('setup_image' => $data["file_name"]));
                    }  
                }

                $whereArr = array(
                    'setup_id' => $post['setup_id']
                );

                $this->common->update('offer_setup', $membershipArr,$whereArr);
                $output = array(
                    'status' => 1,
                    'message' => "Successfully Update."
                );
            } else {
                $output = array(
                    'status' => 0,
                    'message' => "Something error."
                );
            }
            echo json_encode($output);die;
        }

        // managed classified setup
        public function classified_setup(){
            $data = array();

            $post = array('type' => 'classified');
            $data['result'] = $this->MI->get_setupInfo($post);
            $this->load->view('backend/classified_setup',$data);
        }

        // managed limited setup
        public function limited_setup(){
            $data = array();

            $post = array('type' => 'limited');
            $data['result'] = $this->MI->get_setupInfo($post);
            $this->load->view('backend/limited_setup',$data);
        }

        public function getLimitedInfo(){
            $output = array();
            $post = $this->input->post();
            if(!empty($post)){
                
                $result = $this->MI->get_setupInfo($post);
                $output = array(
                    'status' => 1,
                    'result' => $result
                );

            } else {
                $output = array(
                    'status' => 0,
                    'messsage' => "Failed"
                );
            }
            echo json_encode($output); die;
        }

        public function update_setup(){
            $output = array();
            $post = $this->input->post();
            if(!empty($post)){
                $updateArr = array(
                    'price' => $post['price'],
                    'discount' => $post['discount'],
                    'duration' => $post['duration']
                );
                $whereArr = array(
                    'id' => $post['id']
                );
                $this->common->update('setup_plans', $updateArr,$whereArr);
                $output = array(
                    'status' => 1,
                    'message' => 'Successfully Update'
                );
            } else {
                $output = array(
                    'status' => 0,
                    'message' => 'Failed Update'
                );
            }
            echo json_encode($output);die;
        }


//
    }
?>
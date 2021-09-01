<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Users extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model(array('backend/ModVender' => 'MV','backend/Modlogin'=>'ML'));
            if(!$this->session->userdata('Login')){
                redirect('admin');
            }
        }

        public function allUsers() {
            $data = array();
            $data['all_user_list'] = $this->ML->allUserslist(); 
            // $this->load->view('backend/Allusers',$data);
            $this->load->view('backend/userInfoList',$data);
        }

        public function getUserBasicInfo(){
            $post = $this->input->post();
            $output = array();
            if(!empty($post)){
                $user_id = $post['user_id'];
                $userInfo = $this->ML->allUserslist($post);
                $result[] = array(
                    'user_id' =>$userInfo[0]->id,
                    'user_name' =>$userInfo[0]->name,
                    'user_password' =>$userInfo[0]->pass,
                    'user_mobile' =>$userInfo[0]->contact,
                    'user_nationality' =>$userInfo[0]->user_nationality,
                    'user_gender' =>$userInfo[0]->user_gender,
                    'user_age' =>$userInfo[0]->user_age,
                    'user_dob' =>$userInfo[0]->dob,
                    'user_country' =>$userInfo[0]->user_country,
                    'user_address' => $userInfo[0]->address,
                    'user_currency' => $userInfo[0]->currency,
                    'user_city' =>$userInfo[0]->user_city,
                    'status' =>$userInfo[0]->status,
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

        public function updateUserDetails(){
            $output = array();
            $post = $this->input->post();
            if(!empty($post)){
                $updateArr = array(
                    'name' => $post['user_name'],
                    'pass' => $post['user_password'],
                    'contact' => $post['user_mobile'],
                    'dob' => $post['user_dob'],
                    'user_age' => $post['user_age'],
                    'user_gender' => $post['user_gender'],
                    'currency' => $post['user_currency'],
                    'user_nationality' => $post['user_nationality'],
                    'address' => $post['user_address'],
                    'user_city' => $post['user_city'],
                    'status' => $post['user_status'],
                );
                $whereArr = array(
                    'id' => $post['user_id'],
                );
                $this->common->update('user',$updateArr,$whereArr);
                $output = array(
                    'status' =>1,
                    'message' => "Successfully update"
                );
            } else {
                $output = array(
                    'status' => 0,
                    'message' => 'Failed update'
                );
            }
            echo json_encode($output);die;
        }

        public function getUserTransactionInfo(){
            $post = $this->input->post();
            $output = array();
            if(!empty($post)){
                $transaction_id = $post['transaction_id'];
                $payInfo = $this->MI->allTransactionInfo($post);
                $result[] = array(
                    'transaction_id' =>$payInfo[0]['transaction_id'],
                    'main_amount' =>$payInfo[0]['main_amount'],
                    'discount' =>$payInfo[0]['discount'],
                    'vat' =>$payInfo[0]['vat'],
                    'start_date' =>$payInfo[0]['start_date'],
                    'expire_date' =>$payInfo[0]['expire_date'],
                    'payment_by' =>$payInfo[0]['payment_by'],
                    // 'user_country' =>$payInfo[0]->user_country,
                    // 'user_address' => $payInfo[0]->address,
                    // 'user_currency' => $payInfo[0]->currency,
                    // 'user_city' =>$payInfo[0]->user_city,
                    // 'status' =>$payInfo[0]->status,
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

        public function user_comments(){
            $data = array();

            $data['result'] = $this->MI->get_usersComments();
            $this->load->view('backend/userCommentsReviewList',$data);
        }

        public function usertransaction() {
            $data = array();
            $data['get_transaction'] =$this->MI->get_transactionInfo();
            // $this->load->view('backend/Usertransaction',$data);
            $this->load->view('backend/userTransitionsList',$data);
        }

    //
    }
?>
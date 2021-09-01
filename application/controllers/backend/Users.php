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

        public function saveUsers(){
            $data = array();
            $post = $this->input->post();
            if(!empty($post)){
                $login = $this->session->userdata('Login');
                $userArr = array(
                    'type' => '3',
                    'name' => $post['user_name'],
                    'email' => $post['user_email'],
                    'pass' => $post['user_password'],
                    'contact' => $post['contact'],
                    'dob' => $post['user_dob'],
                    'user_age' => $post['user_age'],
                    'user_gender' => $post['user_gender'],
                    'currency' => $post['user_currency'],
                    'user_nationality' => $post['user_nationality'],
                    'user_country' => $post['user_country'],
                    'user_city' => $post['user_city'],
                    'status' => $post['user_status'],
                    'added_date' => date('yy-m-d H:i:s')
                );
                $insertId = $this->common->insert('user',$userArr);
                if(!empty($insertId) && !empty($post['plan_id'])){
                    $login = $this->session->userdata('login');
                    $transectionArr = array(
                        'transaction_no' =>  "",
                        'user_id' => $insertId,
                        'plan_id' => $post["plan_type"],
                        'membership_type' => $post['membership_type'],
                        'main_amount' => $post['amount'],
                        'discount' => $post['discount'],
                        'vat' => $post['vat'],
                        'total_amount' => $post['payment'],
                        'start_date' => $post['start_date'],
                        'expire_date' => $post['end_date'],
                        'paid_by' => 'user',
                        'payment_by' => 'distributer',
                        'distributer_id' => $login[0]['id'],
                        'expire_account' => ucwords($post['expired_acc'])
                    );
                    $this->common->insert('transaction_all', $transectionArr);                
                    redirect('all-users');
                } else {
                    redirect('all-users');
                }
            }
            $this->load->view('backend/user_add',$data); 
        }

        public function getPlaninfo(){
            $post = $this->input->post();
            if(!empty($post)){
                $result = $this->common->select('user_subscription_plan'," where subscription_id =".$post['planId']);
                if(!empty($result)){
                    $output = array(
                        'status' => 1,
                        'result' => $result,
                        'message' => "successfully get details"
                    );
                } else {
                    $output = array(
                        'status' => 0,
                        'message' => 'Details not found'
                    );
                }
            } else {
                $output = array(
                    'status' => 0,
                    'message' => 'Error found'
                );
            }
            echo json_encode($output);die;
        }

        public function renewUsers(){
            $data = array();
            $search['user_id'] = $this->uri->segment(2);
            $login = $this->session->userdata('Login');
            $post = $this->input->post();
            if(!empty($post)){
                $userArr = array(
                    'name' => $post['user_name'],
                    'contact' => $post['user_mobile'],
                    'email' => $post['user_email'],
                    'status' => $post['user_status'],
                    'user_age' => $post['user_age'],
                    'dob' => $post['user_dob'],
                    'currency' => $post['user_currency'],
                    'user_nationality' => $post['user_nationality'],
                    'address' => $post['user_address'],
                    'user_city' => $post['user_city'],
                    'user_country' => $post['user_country'],
                    'pass' => $post['user_password'],
                    'user_gender' => $post['user_gender']
                );
                $transectionArr = array(
                    'payment_by' => $post['payment_by'],
                    'expire_account' => $post['expired_acc'] ? $post['expired_acc'] : 'No',
                    'status' => $post['transaction_status'],
                    'plan_id' => $post['plan_id'],
                    'main_amount' => $post['main_amount'],
                    'discount' => $post['discount'],
                    'total_amount' => $post['total_amount'],
                    'vat' => $post['vat'],
                    'start_date' => strtotime($post['start_date']),
                    'expire_date' => strtotime($post['end_date']),
                    'distributer_id' => $login[0]->id,
                    'payment_status' => 'paid',
                );

                $userWhere = array('id' => $post['user_id']);
                $transectionWhere = array('transaction_id' => $post['transection_id'],'user_id'=>$post['user_id']);
                $this->common->update('transaction_all',$transectionArr,$transectionWhere);
                $this->common->update('user',$userArr,$userWhere);
                redirect('all-users');
            }

            $data['user_info'] = $this->ML->allUserslist($search);
            $this->load->view('backend/user_renew',$data); 
        }

        public function view_users(){
            $data = array();
            $search['user_id'] = $this->uri->segment(2);
            $search['year'] = "";
            if(!empty($this->input->get())){
                $search['year'] = $this->input->get('year_filter');    
            }
            
            $data['user_info'] = $this->ML->allUserslist($search);
            $data['transection_info'] = $this->common->select('transaction_all'," where user_id='".$search['user_id']."' and paid_by ='user'");
            $data['claim_offer'] = $this->MI->getClaimedOfferUser($search['user_id']);
            $data['claim_point'] = $this->MI->getUserPointClaim($search['user_id']);
            $data['redeem_gift'] = $this->MI->getUserGiftClaim($search['user_id']);
            $data['comment_info'] = $this->MI->getUserComment($search['user_id']);
            $data['user_activity'] = $this->MI->getUserActivity($search);

            $this->load->view('backend/user_view',$data);
        }

        public function updateUserInfo(){
            $post = $this->input->post();
            if(!empty($post)){
                $userArr = array(
                    'name' => $post['user_name'],
                    'contact' => $post['user_mobile'],
                    'email' => $post['user_email'],
                    'pass' => $post['user_password'],
                    'dob' => $post['user_dob'],
                    'user_nationality' => $post['user_nationality'],
                    'user_country' => $post['user_country'],
                    'user_city' => $post['user_city'],
                    'user_gender' => $post['user_gender'],
                    'currency' => $post['currency'],
                );
                $this->common->update('user',$userArr,array('id'=> $post['user_id']));
                $output = array(
                    'status' => 1,
                    'message' => "successfully update"
                );
            }else{
                $output = array(
                    'status' =>0,
                    'message' => "Something Error"
                );
            }
            echo json_encode($output);die;
        }

        public function UpdateStatus(){
            $post = $this->input->post();
            if(!empty($post)){
                $this->common->update('user',array('status' => $post['status']),array('id'=>$post['user_id']));
                $output = array(
                    'status' => 1,
                    'message' => "successfully change status"
                );
            }else{
                $output = array(
                    'status'=> 0,
                    'message'=>'Something Error'
                );
            }
            echo json_encode($output);die;
        }

    //
    }
?>
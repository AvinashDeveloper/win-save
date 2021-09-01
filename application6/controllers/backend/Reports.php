<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Reports extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model(array('backend/ModVender' => 'MV','backend/Modlogin'=>'ML'));
            if(!$this->session->userdata('Login')){
                redirect('admin');
            }
        }

        public function monthly_summary(){
            $data = array();
            $filter = "";
            $data['years'] = "";
            if(!empty($this->input->get())){
                $filter['year'] = $this->input->get('year_filter');
                $data['years'] =$this->input->get('year_filter');
            }
            $data['limited'] = $this->MR->vendor_monthLimitedReport($filter);
            $data['classified'] = $this->MR->vendor_monthClassifiedReport($filter);
            $data['Gifts'] = $this->MR->Vendor_monthGiftReport($filter);
            $data['Offers'] = $this->MR->Vendor_monthOffersReport($filter);
            $data['users'] = $this->MR->users_monthReport($filter);
            $this->load->view('backend/reports/monthly_summary',$data);
        }

        public function userActivity(){
            $data = array();
            $data['user_activity'] = $this->MR->getUserActivity();
            $this->load->view('backend/reports/user_activity',$data);
        }

        public function vendorActivity(){
            $data = array();
            $data['store_activity'] = $this->MR->vendorStoreActivity();
            $data['gift_activity'] = $this->MR->vendorGiftActivity();
            $data['classified_activity'] = $this->MR->vendorClassifiedActivity();
            $data['limited_activity'] = $this->MR->vendorLimitedActivity();
            $this->load->view('backend/reports/vendor_activity',$data);
        }

        public function userSubscription(){
            $data = array();
            $data['user_subscription'] = $this->MR->getUserSubscription();
            $this->load->view('backend/reports/user_subscription',$data);
        }

        public function vendorSubscription(){
            $data = array();
            $data['vendor_subscription'] = $this->MR->getVendorSubscription();
            $this->load->view('backend/reports/vendor_subscription',$data);
        }
//
    }
?>
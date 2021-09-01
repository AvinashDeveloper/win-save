<?php defined('BASEPATH') OR exit('No direct script access allowed');
    class Records extends CI_Controller {

        public function __construct()  {
            parent::__construct();
            if(!$this->session->userdata('Login')){
                redirect('admin');
            }
        }

        public function users_records(){
            $data = array();
            $data['users_records'] = $this->MAS->getUsersRecords();
            $this->load->view('backend/records/user_records', $data);
        }

        public function vendors_records(){
            $data = array();
            $data['vendor_records'] = $this->MAS->getVendorRecords();
            $this->load->view('backend/records/vendor_records',$data);
        }

        public function offers_records(){
            $data = array();
            $data['offers_records'] = $this->MAS->getOfferRecords();
            $this->load->view('backend/records/offers_records',$data);
        }

        public function classified_records(){
            $data = array();
            $data['classified_records'] = $this->MAS->getClassifiedRecords();
            $this->load->view('backend/records/classified_records',$data);
        }

        public function limited_records(){
            $data = array();
            $data['limited_records'] = $this->MAS->getLimitedRecords();
            $this->load->view('backend/records/limited_records',$data);
        }

        public function claimOffer_records(){
            $data = array();
            $data['claim_offer_records'] = $this->MAS->getClaimOfferRecords();
            $this->load->view('backend/records/claimed_offer_records',$data);
        }

        public function claimGift_records(){
            $data = array();
            $data['claim_gift_records'] = $this->MAS->getClaimGiftRecords();
            $this->load->view('backend/records/claimed_gift_records',$data);
        }

        public function unclaimGift_records(){
            $data = array();
            $data['unclaim_gift_records'] = $this->MAS->getUnclaimGiftRecords();
            $this->load->view('backend/records/unclaimed_gift_records',$data);
        }

        public function inventroy_records(){
            $data = array();
            $data['inventory_records'] = $this->MAS->getInventoryRecords();
            $this->load->view('backend/records/inventory_records',$data);
        }

        public function comment_record(){
            $data = array();
            $data['comment_records'] = $this->MAS->getCommentRecords();
            $this->load->view('backend/records/comments_records',$data);
        }
    }
?>
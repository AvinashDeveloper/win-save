<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Membership extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model(array('backend/ModVender' => 'MV'));
            
        }

        public function vender_membership(){
            $data = array();
            $this->load->view('backend/vendor_membership',$data);
        }

        public function user_membership(){
            $data = array();
            $this->load->view('backend/user_membership',$data);
        }

        public function offer_setup(){
            $data = array();
            $this->load->view('backend/offer_setup',$data);
        }

        public function classified_setup(){
            $data = array();
            $this->load->view('backend/classified_setup',$data);
        }

        public function limited_setup(){
            $data = array();
            $this->load->view('backend/limited_setup',$data);
        }


//
    }
?>
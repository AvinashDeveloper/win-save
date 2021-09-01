<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Item_verification extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model(array('backend/ModVender' => 'MV'));
            if(!$this->session->userdata('Login')){
                redirect('admin');
            }
        }

        public function offer_aproval(){
            $data['offerItemInfo'] = $this->MI->get_offerItem();
            $this->load->view('backend/offer_approval',$data);
        }

        public function getOfferAprovalInfo(){
            $post = $this->input->post();
            $output = array();
            if(!empty($post)){
                $vender_id = $post['vender_id'];
                $offer_item_id = $post['offer_item_id'];
                $offerItemInfo = $this->MI->get_offerItem($post);
                $output = array(
                    'status' => 1,
                    'result' => $offerItemInfo,
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

        public function offer_update(){
            $post = $this->input->post();
            if(!empty($post)){
                $offerUpdate = array(
                    'offer_type' => $post['offer_type'],
                    'offer_title' => $post['offer_title'],
                    'saving_amount' => $post['saving_amount'],
                    'category_id' => $post['category_id'],
                    'add_date' => $post['create_date'],
                );
                $venderUpdate = array(
                    'name' => $post['vender_name'],
                    'store_name' => $post['store_name']
                );

                $this->common->update('vendor_offers', $offerUpdate,array('id' => $post['offer_item_id']));
                $this->common->update('vendor', $venderUpdate, array('id' => $post['vender_id']));
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
        }

        public function classified_aproval(){
            $data['classifiedInfo'] = $this->MI->get_classifiedItem();
            $this->load->view('backend/classified_approval',$data);
        }

        public function getClassifiedAprovalInfo(){
            $post = $this->input->post();
            $output = array();
            if(!empty($post)){
                $vender_id = $post['vender_id'];
                $classified_item_id = $post['classified_item_id'];
                $classifiedItemInfo = $this->MI->get_classifiedItem($post);
                $output = array(
                    'status' => 1,
                    'result' => $classifiedItemInfo,
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

        public function classified_update(){
            $post = $this->input->post();
            if(!empty($post)){
                $offerUpdate = array(
                    'title' => $post['classified_title'],
                    'category' => $post['category_id'],
                    'added_date' => $post['create_date'],
                );
                $venderUpdate = array(
                    'name' => $post['vender_name'],
                    'store_name' => $post['store_name']
                );

                $this->common->update('classified', $offerUpdate,array('id' => $post['classified_item_id']));
                $this->common->update('vendor', $venderUpdate, array('id' => $post['vender_id']));
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
        }

        public function limited_aproval(){
            $data['limitedInfo'] = $this->MI->get_limitedItem();
            $this->load->view('backend/limited_approval',$data);
        }

        public function getLimitedAprovalInfo(){
            $post = $this->input->post();
            $output = array();
            if(!empty($post)){
                $vender_id = $post['vender_id'];
                $limited_item_id = $post['limited_item_id'];
                $limitedItemInfo = $this->MI->get_limitedItem($post);
                $output = array(
                    'status' => 1,
                    'result' => $limitedItemInfo,
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

        public function limited_update(){
            $post = $this->input->post();
            if(!empty($post)){
                $offerUpdate = array(
                    'title' => $post['limited_title'],
                    'category' => $post['category_id'],
                    'added_date' => $post['create_date'],
                );
                $venderUpdate = array(
                    'name' => $post['vender_name'],
                    'store_name' => $post['store_name']
                );

                $this->common->update('limited_offer', $offerUpdate,array('id' => $post['limited_item_id']));
                $this->common->update('vendor', $venderUpdate, array('id' => $post['vender_id']));
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
        }

        public function inventory_aproval(){
            $data['inventoryInfo'] = $this->MI->get_inventoryItem();
            $this->load->view('backend/inventory_approval',$data);
        }

        public function getInventoryAprovalInfo(){
            $post = $this->input->post();
            $output = array();
            if(!empty($post)){
                $vender_id = $post['vender_id'];
                $inventory_item_id = $post['inventory_item_id'];
                $inventoryItemInfo = $this->MI->get_inventoryItem($post);
                $output = array(
                    'status' => 1,
                    'result' => $inventoryItemInfo,
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

        public function inventory_update(){
            $post = $this->input->post();
            if(!empty($post)){
                $offerUpdate = array(
                    'gift_name' => $post['inventory_title'],
                    'category_id' => $post['category_id'],
                    'create_date' => $post['create_date'],
                    'value' => $post['value'],
                    'stock' => $post['quantity'],
                );
                $venderUpdate = array(
                    'name' => $post['vender_name'],
                    'store_name' => $post['store_name']
                );

                $this->common->update('inventory_gift', $offerUpdate,array('id' => $post['inventory_item_id']));
                $this->common->update('vendor', $venderUpdate, array('id' => $post['vender_id']));
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
        }

// end here
    }
?>
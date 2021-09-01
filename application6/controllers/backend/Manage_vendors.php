<?php defined('BASEPATH') OR exit('No direct script access allowed');

    class Manage_vendors extends CI_Controller {

        public function __construct() {
            parent::__construct();
            $this->load->model(array('backend/ModVender' => 'MV'));
            if(!$this->session->userdata('Login')){
                redirect('admin');
            }
        }

        public function saveOffers(){
            $post = $this->input->post();
            $vendor_id = $this->uri->segment(4);
            if(!empty($post)){
                $blankArr = array(
                    'vendor_id' => "",
                    'offer_type' => "",
                    'title_en' => "",
                    'desc_en' => "",
                    'title_ar' => "",
                    'desc_ar' => "",
                    'limit_per_user' => "",
                    'stoke' => "",
                    'saving_amount' => "",
                    'valid_date' => "",
                    'status' => "",
                    'create_date' => "",
                    'offer_amount' => "",
                    'main_amount' => "",
                    'percentage' => ""
                );
                $newArr = array_merge($blankArr,$post);
                $insertArr = array(
                    'vendor_id' => $vendor_id,
                    'offer_type' => $newArr['offer_type'],
                    'offer_title' => $newArr['title_en'] ? $newArr['title_en'] : translateTextEn($newArr['title_ar']),
                    'offer_detail' => $newArr['desc_en'] ? $newArr['desc_en'] : translateTextEn($newArr['desc_ar']),
                    'limit_per_user' => $newArr['limit_per_user'],
                    'stoke' => $newArr['stoke'],
                    'saving_amount' => $newArr['saving_amount'],
                    'valid_date' => $newArr['valid_date'],
                    'status' => $newArr['status'],
                    'add_date' => $newArr['create_date'],
                    'offer_amount' => $newArr['offer_amount'],
                    'main_amount' => $newArr['main_amount'],
                    'percentage' => $newArr['percentage'],
                );
                $id = $this->common->insert('vendor_offers', $insertArr);
                if(!empty($id)){
                    $this->session->set_flashdata('message', "Succesfully Save Information.");
                } else {
                    $this->session->set_flashdata('message', "error");
                }
            } else {
                $this->session->set_flashdata('message', "error");
            }
            redirect(base_url('backend/Login/v_offers/').$vendor_id);
        }

        public function changeStatus(){
            $post = $this->input->post();
            if(!empty($post)){
                $id = $post['id'];
                $col_name = $post['col_name'];
                $table_name = $post['tbl'];
                $result = $this->common->select($table_name," where ".$col_name." = '".$id."'");

                if( strtolower($result[0]['status']) == 'active'){
                    $where = array($col_name=>$id);
                    $updateData = array('status' => 'Deactive');
                }
                else{
                    $where = array($col_name=>$id);
                    $updateData = array('status' => 'Active');
                }
                $this->common->update($table_name,$updateData, $where);
                
                $message = array('msg' => 'successful', 'result'=>$updateData);
            }
            echo json_encode($message);
        }

        public function changeNumStatus(){
            $post = $this->input->post();
            if(!empty($post)){
                $id = $post['id'];
                $col_name = $post['col_name'];
                $table_name = $post['tbl'];
                $result = $this->common->select($table_name," where ".$col_name." = '".$id."'");
                if( $result[0]['status'] == '1'){
                    $where = array($col_name=>$id);
                    $updateData = array('status' => 0);
                }
                else{
                    $where = array($col_name=>$id);
                    $updateData = array('status' => 1);
                }
                $this->common->update($table_name,$updateData, $where);
                $message = array('msg' => 'successful', 'result'=>$updateData);
            }
            echo json_encode($message);
        }

        public function delete_row(){
            $post = $this->input->post();
            if($post && !empty($post)){
                $id = $post['id'];
                $col_name = $post['col_name'];
                $table_name = $post['tbl'];
                $where = "where  ".$col_name." = '".$id."'";
                $result = $this->common->select($table_name, $where);
        
                if(!empty($result)){
                    $this->common->delete($table_name, $id, $col_name);
                    $message = array('status' => 1, 'message' => 'Successfully delete.');
                }else{
                    $message = array('status' => 0, 'error' => __LINE__, 'message' => 'Details not found.');
                }
            }else{
                $message = array('status' => 0, 'error' => __LINE__, 'message' => 'Please try again something went wrong.');
            }
            echo json_encode($message); die;
        }

        public function getOffersInfo(){
            $post = $this->input->post();
            if(!empty($post)){
                $offerId = $post['offerId'];
                $vandorId = $post['vandorId'];
                $arrayData = $this->MV->offers_info($offerId, $vandorId);
                if(!empty($arrayData)){
                    $outArr = array(
                        'id' => $arrayData[0]['id'],
                        'vendor_id' => $arrayData[0]['vendor_id'],
                        'offer_type' => $arrayData[0]['offer_type'],
                        'offer_title_en' => $arrayData[0]['offer_title'],
                        'offer_name' => $arrayData[0]['offer_name'],
                        'offer_detail_en' => $arrayData[0]['offer_detail'], 
                        'offer_title_ar' => translateText($arrayData[0]['offer_title']), 
                        'offer_detail_ar' => translateText($arrayData[0]['offer_detail']),  
                        'limit_per_user' => $arrayData[0]['limit_per_user'], 
                        'stoke' => $arrayData[0]['stoke'],
                        'main_amount' => $arrayData[0]['main_amount'],
                        'offer_amount' => $arrayData[0]['offer_amount'],
                        'percentage' => $arrayData[0]['percentage'],
                        'saving_amount' => $arrayData[0]['saving_amount'],
                        'valid_date' => $arrayData[0]['valid_date'],
                        'add_date' => $arrayData[0]['add_date'],
                        'status' => $arrayData[0]['status'],
                    );
                    $output = array('status' => 1,
                        'result' => array($outArr)
                    );
                } else {
                    $output = array('status' => 1,
                        'message' => "Error comes."
                    );
                }            
                echo json_encode($output);die;
            }
        }

        public function updateOffersInfo(){
            $post = $this->input->post();
            if(!empty($post)){
                $blankArr = array(
                    // 'offer_id' => "",
                    'vendor_id' => "",
                    'offer_type' => "",
                    'title_en' => "",
                    'desc_en' => "",
                    'title_ar' => "",
                    'desc_ar' => "",
                    'limit_per_user' => "",
                    'stoke' => "",
                    'saving_amount' => "",
                    'valid_date' => "",
                    'status' => "",
                    'create_date' => "",
                    'offer_amount' => "",
                    'main_amount' => "",
                    'percentage' => ""
                );
                $newArr = array_merge($blankArr,$post);
                $updateArr = array(
                    'offer_type' => $newArr['offer_type'],
                    'offer_title' => $newArr['title_en'] ? $newArr['title_en'] : translateTextEn($post['title_ar']),
                    'offer_detail' => $newArr['desc_en'] ? $newArr['desc_en'] : translateTextEn($post['desc_ar']),
                    'limit_per_user' => $newArr['limit_per_user'],
                    'stoke' => $newArr['stoke'],
                    'saving_amount' => $newArr['saving_amount'],
                    'valid_date' => $newArr['valid_date'],
                    'status' => $newArr['status'],
                    'add_date' => $newArr['create_date'],
                    'offer_amount' => $newArr['offer_amount'],
                    'main_amount' => $newArr['main_amount'],
                    'percentage' => $newArr['percentage'],
                );
                
                $where = array('id' => $newArr['offer_id'],
                                'vendor_id' => $newArr['vendor_id']
                );
                $this->common->update("vendor_offers", $updateArr, $where);
                $this->session->set_flashdata("message", "Update successfully.");
                redirect('backend/Login/v_offers/'.$newArr['vendor_id']);
            }
        }

        public function savePromoClassified(){
            $post = $this->input->post();
            $vendor_id = $this->uri->segment(4);
            if(!empty($post)){
                $blankArr = array(
                    'vendor_id' => "",
                    'title' => "",
                    'caption_en' => "",
                    'caption_ar' => "",
                    'category' => "",
                    'country' => "",
                    'region' => "",
                    'city' => "",
                    'link' => "",
                    'status' => "",
                    'create_date' => "",
                    'start_date' => "",
                    'duration' => ""
                );
                $newArr = array_merge($blankArr,$post);

                $insertArr = array(
                    'vendor_id' => $vendor_id,
                    'title' => $newArr['title'],
                    'caption' => $newArr['caption_en'] ? $newArr['caption_en'] : translateTextEn($post['caption_ar']),
                    'category' => $newArr['category'],
                    'country' => $newArr['country'],
                    'region' => $newArr['region'],
                    'city' => $newArr['city'],
                    'link' => $newArr['link'],
                    'status' => $newArr['status'],
                    'added_date' => $newArr['create_date'],
                    'start_date' => strtotime($newArr['start_date']),
                    'duration' => strtotime($newArr['duration'])
                );

                if($_FILES['classified_img']['name'] != "")  {  
                    $config['upload_path'] = './assets/images/vendors/promo_classified/';  
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';  
                    $this->load->library('upload', $config);  
                    if(!$this->upload->do_upload('classified_img'))  {  
                        echo $this->upload->display_errors();  
                    }  
                    else{
                        $data = $this->upload->data();
                        $insertArr = array_merge($insertArr, array('image' => $data["file_name"]));
                    }
                }
                  
                $id = $this->common->insert('classified', $insertArr);
                if(!empty($id)){
                    $this->session->set_flashdata('message', "Succesfully Save Information.");
                } else {
                    $this->session->set_flashdata('message', "error");
                }   
            } else {
                $this->session->set_flashdata('message', "error");
            }
            redirect(base_url('backend/Login/promo_classified/').$vendor_id);
        }

        public function getPromoClassifiedInfo(){
            $post = $this->input->post();
            if(!empty($post)){
                $promoId = $post['promoId'];
                $vandorId = $post['vandorId'];
                $arrayData = $this->MV->promo_classified_info($promoId, $vandorId);
                if(!empty($arrayData)){
                    $outArr = array(
                        'promo_id' => $arrayData[0]['id'],
                        'vendor_id' => $arrayData[0]['vendor_id'],
                        'category' => $arrayData[0]['category'],
                        'caption_en' => $arrayData[0]['caption'],
                        'title' => $arrayData[0]['title'],
                        'country' => $arrayData[0]['country'], 
                        'caption_ar' => translateText($arrayData[0]['caption']), 
                        'city' => city((int)$arrayData[0]['city'],$arrayData[0]['region']), 
                        'region' => $arrayData[0]['region'],
                        'duration' => date('yy-m-d',$arrayData[0]['duration']),
                        'image' => $arrayData[0]['image'],
                        'link' => $arrayData[0]['link'],
                        'start_date' => date('yy-m-d',$arrayData[0]['start_date']),
                        'added_date' => $arrayData[0]['added_date'],
                        'status' => $arrayData[0]['status'],
                    );
                    $output = array('status' => 1,
                        'result' => array($outArr)
                    );
                } else {
                    $output = array('status' => 1,
                        'message' => "Error comes."
                    );
                }            
                echo json_encode($output);die;
            }
        }

        public function updatePromoClassified(){
            $post = $this->input->post();
            if(!empty($post)){
                $blankArr = array(
                    'vendor_id' => "",
                    'title' => "",
                    'caption_en' => "",
                    'caption_ar' => "",
                    'link' => "",
                    'category' => "",
                    'country' => "",
                    'region' => "",
                    'city' => "",
                    'create_date' => "",
                    'status' => "",
                    'start_date' => "",
                    'duration' => "",
                );
                $newArr = array_merge($blankArr,$post);
                $updateArr = array(
                    'title' => $newArr['title'],
                    'caption' => $newArr['caption_en'] ? $newArr['caption_en'] : translateTextEn($post['caption_ar']),
                    'link' => $newArr['link'],
                    'country' => $newArr['country'],
                    'region' => $newArr['region'],
                    'city' => $newArr['city'],
                    'category' => $newArr['category'],
                    'status' => $newArr['status'],
                    'added_date' => $newArr['create_date'],
                    'duration' => $newArr['duration'],
                    'start_date' => $newArr['start_date']
                );
                
                if($_FILES['classified_img']['name'] != "")  {  
                    $config['upload_path'] = './assets/images/vendors/promo_classified/';  
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';  
                    $this->load->library('upload', $config);  
                    if(!$this->upload->do_upload('classified_img'))  {  
                        echo $this->upload->display_errors();  
                    }  
                    else{
                        $data = $this->upload->data();
                        $updateArr = array_merge($updateArr, array('image' => $data["file_name"]));
                    }
                }

                $where = array('id' => $newArr['promoclassified_id'],
                                'vendor_id' => $newArr['vendor_id']
                );
                $this->common->update("classified", $updateArr, $where);
                $this->session->set_flashdata("message", "Update successfully.");
                redirect('backend/Login/promo_classified/'.$newArr['vendor_id']);
            }
        }
    
        public function getCityInfo(){
            $post = $this->input->post();
            if(!empty($post)){
                $region_id = $post['regionId'] ? $post['regionId'] : "";
                $sel = $post['select'] ? $post['select'] : "";

                echo city($sel , $region_id);
            }
        }

        public function getRegionInfo(){
            $post = $this->input->post();
            if(!empty($post)){
                $country_id = $post['countryId'] ? $post['countryId'] : "";
                $sel = $post['select'] ? $post['select'] : "";

                echo region($sel , $country_id);
            }
        }

        public function getSubCatInfo(){
            $post = $this->input->post();
            if(!empty($post)){
                $cat_id = $post['cat_id'] ? $post['cat_id'] : "";
                $sel = $post['select'] ? $post['select'] : "";

                echo subCategoryType($sel , $cat_id);
            }
        }

        public function savePromoLimit(){
            $post = $this->input->post();
            $vendor_id = $this->uri->segment(4);
            if(!empty($post)){              
                $blankArr = array(
                    'vendor_id' => "",
                    'title_en' => "",
                    'title_ar' => "",
                    'caption_ar' => "",
                    'category' => "",
                    'country' => "",
                    'region' => "",
                    'city' => "",
                    'status' => "",
                    'create_date' => "",
                    'start_date' => "",
                    'duration' => ""
                );
                $newArr = array_merge($blankArr,$post);

                $insertArr = array(
                    'vendor_id' => $vendor_id,
                    'title' => $newArr['title_en'] ? $newArr['title_en'] : translateTextEn($post['title_ar']),
                    'category' => $newArr['category'],
                    'country' => $newArr['country'],
                    'region' => $newArr['region'],
                    'city' => $newArr['city'],
                    'status' => $newArr['status'],
                    'added_date' => $newArr['create_date'],
                    'start_date' => strtotime($newArr['start_date']),
                    'valid_date' => strtotime($newArr['duration'])
                );

                if($_FILES['limit_img']['name'] != "")  {  
                    $config['upload_path'] = './assets/images/vendors/promo_limited/';  
                    $config['allowed_types'] = 'jpg|jpeg|png|gif|pptx';  
                    $this->load->library('upload', $config);  
                    if(!$this->upload->do_upload('limit_img'))  {  
                        echo $this->upload->display_errors();  
                    }  
                    else{
                        $data = $this->upload->data();
                        $insertArr = array_merge($insertArr, array('image' => $data["file_name"]));
                    }
                }
                
                if($_FILES['limit_pdf']['name'] != "")  {  
                    $config['upload_path'] = './assets/images/vendors/promo_limited/';  
                    //"gif|jpg|jpeg|png|iso|dmg|zip|rar|doc|docx|xls|xlsx|ppt|pptx|csv|ods|odt|odp|pdf|rtf|sxc|sxi|txt|exe|avi|mpeg|mp3|mp4|3gp",
                    $config['allowed_types'] = 'txt|pdf|exe|docx|doc';  
                    $this->load->library('upload', $config);  
                    if(!$this->upload->do_upload('limit_pdf'))  {  
                        echo $this->upload->display_errors();  
                    }  
                    else{
                        $data = $this->upload->data();
                        $insertArr = array_merge($insertArr, array('pdf' => $data["file_name"]));
                    }
                }

                $id = $this->common->insert('limited_offer', $insertArr);
                if(!empty($id)){
                    $this->session->set_flashdata('message', "Succesfully Save Information.");
                } else {
                    $this->session->set_flashdata('message', "error");
                }   
            } else {
                $this->session->set_flashdata('message', "error");
            }
            redirect(base_url('backend/Login/promo_limited/').$vendor_id);
        }

        public function getPromoLimitInfo(){
            $post = $this->input->post();
            if(!empty($post)){
                $promolimitId = $post['promoLimitId'];
                $vandorId = $post['vandorId'];
                $arrayData = $this->MV->promo_limited_info($promolimitId, $vandorId);
                if(!empty($arrayData)){
                    $outArr = array(
                        'promoLimit_id' => $arrayData[0]['id'],
                        'vendor_id' => $arrayData[0]['vendor_id'],
                        'category' => $arrayData[0]['category'],
                        'title_en' => $arrayData[0]['title'],
                        'country' => $arrayData[0]['country'], 
                        'title_ar' => translateText($arrayData[0]['title']) ? translateText($arrayData[0]['title']) : $arrayData[0]['title'], 
                        'city' => city((int)$arrayData[0]['city'],$arrayData[0]['region']), 
                        'region' => $arrayData[0]['region'],
                        'valid_date' => date('yy-m-d',$arrayData[0]['valid_date']),
                        'image' => $arrayData[0]['image'],
                        'pdf' => $arrayData[0]['pdf'],
                        'start_date' => date('yy-m-d',$arrayData[0]['start_date']),
                        'added_date' => $arrayData[0]['added_date'],
                        'status' => $arrayData[0]['status'],
                    );
                    $output = array('status' => 1,
                        'result' => array($outArr)
                    );
                } else {
                    $output = array('status' => 1,
                        'message' => "Error comes."
                    );
                }            
                echo json_encode($output);die;
            }
        }

        public function updatePromoLimit(){
            $post = $this->input->post();
            if(!empty($post)){
                $blankArr = array(
                    'vendor_id' => "",
                    'title_en' => "",
                    'title_ar' => "",
                    'category' => "",
                    'country' => "",
                    'region' => "",
                    'city' => "",
                    'create_date' => "",
                    'status' => "",
                    'start_date' => "",
                    'valid_date' => "",
                );
                $newArr = array_merge($blankArr,$post);
                $updateArr = array(
                    'title' => $newArr['title_en'] ? $newArr['title_en'] : translateTextEn($post['title_ar']),
                    'country' => $newArr['country'],
                    'region' => $newArr['region'],
                    'city' => $newArr['city'],
                    'category' => $newArr['category'],
                    'status' => $newArr['status'],
                    'added_date' => $newArr['create_date'],
                    'valid_date' => strtotime($newArr['valid_date']),
                    'start_date' => strtotime($newArr['start_date'])
                );
                
                if($_FILES['limit_image']['name'] != "")  {  
                    $config['upload_path'] = './assets/images/vendors/promo_limited/';  
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';  
                    $this->load->library('upload', $config);  
                    if(!$this->upload->do_upload('limit_image'))  {  
                        echo $this->upload->display_errors();  
                    }  
                    else{
                        $data = $this->upload->data();
                        $updateArr = array_merge($updateArr, array('image' => $data["file_name"]));
                    }
                }

                if($_FILES['limit_pdf']['name'] != "")  {  
                    $config['upload_path'] = './assets/images/vendors/promo_limited/';  
                    $config['allowed_types'] = 'txt|pdf|exe|docx|doc';  
                    $this->load->library('upload', $config);  
                    if(!$this->upload->do_upload('limit_pdf'))  {  
                        echo $this->upload->display_errors();  
                    }  
                    else{
                        $data = $this->upload->data();
                        $updateArr = array_merge($updateArr, array('pdf' => $data["file_name"]));
                    }
                }

                $where = array('id' => $newArr['promoLimit_id'],
                                'vendor_id' => $newArr['vendor_id']
                );
                $this->common->update("limited_offer", $updateArr, $where);
                $this->session->set_flashdata("message", "Update successfully.");
                redirect('backend/Login/promo_limited/'.$newArr['vendor_id']);
            }
        }

        public function setReviewInfo(){
            $post = $this->input->post();
            $vendor_id = $this->uri->segment(4);
            if(!empty($post)){
                $result = $this->common->select('vendor_ratting'," where review_id='".$post['parent_id']."'");
                $insertArr = array('parent_id' => $post['parent_id'],
                            'ratting' => $post['rate'],
                            'review' => $post['comment'],
                            'status' => 'Active',
                            'user_id' => $result[0]['user_id'],
                            'vendor_id' => $vendor_id,
                            'create_date' => strtotime(date('m/d/yy'))
                );
                $this->common->insert('vendor_ratting', $insertArr);
            }
            redirect('backend/Login/review/'. $vendor_id,'refresh');
        }

        public function store_branch_time(){
            $post = $this->input->post();

            if(!empty($post)){
                $store_data = array('sun_start' => $post["sun_start"],
                    'sun_end' => $post['sun_end'],
                    'mon_start' => $post['mon_start'],
                    'mon_end' =>  $post['mon_end'],
                    'tue_start' => $post['tue_start'],
                    'tue_end' => $post['tue_end'],
                    'wed_start' => $post['wed_start'],
                    'wed_end' => $post['wed_end'],
                    'thu_start' => $post['thu_start'],
                    'thu_end' => $post['thu_end'],
                    'fri_start' => $post['fri_start'],
                    'fri_end' => $post['fri_end'],
                    'sat_start' => $post['sat_start'],
                    'sat_end' => $post['sat_end']
                );
                $where = array('vendor_id' => $post['vendor_id'],
                            'id' => $post['branch_id']
                );
                $this->common->update('branch',array('store_hours' => json_encode($store_data)),$where);
                redirect('backend/Login/store_setup/'.$post['vendor_id']);
            }
        }

        public function getStoreTimeInfo(){
            $post = $this->input->post();
            if(!empty($post)){
                $vendorId =  $post['vandorId'];
                $branchId =  $post['branchId'];
                
                $arrayData = $this->common->select('branch'," where id='".$branchId."' and vendor_id ='".$vendorId."'", 'store_hours');
                if(!empty($arrayData)){
                    $responce_data = str_replace("\\", "",$arrayData[0]['store_hours']);
                    $responce_data = json_decode($responce_data,true);
                    $output = array('status' => 1,
                        'result' => $responce_data
                    );
                } else {
                    $output = array('status' => 1,
                        'message' => "Error comes."
                    );
                }            
                echo json_encode($output);die;
            }
        }

        public function getBillingInvoice(){
            $post = $this->input->post();
            if(!empty($post)){
                $output = array();
                $vendorId =  $post['vendorId'];
                $rowId =  $post['rowId'];
                $arrayData = $this->common->getSingleRowBilInfo($vendorId,$rowId);
                if(!empty($arrayData)){
                    $output = array('status' => 1,
                        'result' => $arrayData
                    );
                }else {
                    $output = array('status' => 1,
                        'message' => "Error comes."
                    );
                }     

                echo json_encode($output);die;
            }
        }
    }
?>

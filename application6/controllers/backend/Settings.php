<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Settings extends CI_Controller {

	public function __construct()  {
		parent::__construct();
        // $this->load->model(array('backend/ModVender'=>'MV','backend/Modlogin'=>'ML'));
        if(!$this->session->userdata('Login')){
            redirect('admin');
        }
    }
 
    public function nationality(){
        if($this->session->userdata('Login')){
            $data['get_nationality'] = $this->common->select('nationality', " where status = 'Active' order by priority asc");
            $this->load->view('backend/Header');
            $this->load->view('backend/nationality',$data);
            $this->load->view('backend/Footer');
        }else{
            redirect('admin');
        }
    }

    public function getNationalityInfo(){
        $post = $this->input->post();
        if(!empty($post)){
            $id = $post['ids'];

            $where = " where nationality_id ='".$id."'";
            $result = $this->common->select('nationality', $where);
            if(!empty($result)){
                $resultArr[] = array(
                    'id' => $result[0]['nationality_id'],
                    'nationality_name_en' => $result[0]['nationality_name'],
                    'nationality_name_ar' => translateText($result[0]['nationality_name']),
                    'priority' => $result[0]['priority'],
                    'status' => $result[0]['status'],
                    'create_date' => $result[0]['create_date']
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

    public function nationality_save(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'nationality_en' => "",
                'nationality_ar' => "",
                'priority' => ""
            );
            
            $post = array_merge($blankArr, $post);
            $data = array(
                'nationality_name' => $post['nationality_en'] ? $post['nationality_en'] : translateTextEn($post['nationality_ar']),
                'priority' => $post['priority'],
                'status'      => 'Active',
                'create_date' => date('yy-m-d')
            );

            $nationality = $post['nationality_en'] ? $post['nationality_en'] : translateTextEn($post['nationality_ar']);
            $getData = $this->common->select('nationality', " where nationality_name LIKE '".$nationality."'");
            if(!empty($getData)){
                $whereArr = array('nationality_id' => $post['national_id']);
                $this->common->update("nationality", $data, $whereArr);
                $output = array(
                    'status' => 1,
                    'message' => "Successfully Update."
                );
            } else {
                $save_array = $this->common->insert('nationality',$data);
                $output = array(
                    'status' => 1,
                    'message' => "Successfully Save."
                );
            }
        } else {
            $output = array(
                'status' => 0,
                'message' => "Somthing error."
            );
        }
        echo json_encode($output);die;
    }

    public function nationality_update(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'nationality_en' => "",
                'nationality_ar' => "",
                'priority' => ""
            );
            
            $post = array_merge($blankArr, $post);
            $data = array(
                'nationality_name' => $post['nationality_en'] ? $post['nationality_en'] : translateTextEn($post['nationality_ar']),
                'priority'      => $post['priority'],
                'status'      => 'Active',
                'create_date' => date('yy-m-d')
            );

            $whereArr = array('nationality_id' => $post['national_id']);
            $this->common->update("nationality", $data, $whereArr);
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

    public function country(){
        if($this->session->userdata('Login')){
            $data['get_country'] = $this->common->select('country', " where status = 'Active' order by priority asc");
            $this->load->view('backend/Header');
            $this->load->view('backend/country',$data);
            $this->load->view('backend/Footer');
        }else{
            redirect('admin');
        }
    }

    public function getCountryInfo(){
        $post = $this->input->post();
        if(!empty($post)){
            $id = $post['ids'];

            $where = " where country_id ='".$id."'";
            $result = $this->common->select('country', $where);
            if(!empty($result)){
                $resultArr[] = array(
                    'country_id' => $result[0]['country_id'],
                    'country_name_en' => $result[0]['country_name'],
                    'country_name_ar' => translateText($result[0]['country_name']),
                    'country_flag' => base_url('assets/images/country_flag/').$result[0]['country_flag'],
                    'priority' => $result[0]['priority'],
                    'status' => $result[0]['status'],
                    'create_date' => $result[0]['create_date']
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

    public function country_save(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'country_name_en' => "",
                'country_name_ar' => "",
                'priority' => ""
            );
            
            $post = array_merge($blankArr, $post);
            $data = array(
                'country_name' => $post['country_name_en'] ? $post['country_name_en'] : translateTextEn($post['country_name_ar']),
                'priority' => $post['priority'],
                'status'      => 'Active',
                'create_date' => date('yy-m-d')
            );

            if($_FILES['country_flag']['name']!=""){
                $new_image_name = str_replace(str_split(' ()\\/,:*?"<>|'), '', 
                  $_FILES['country_flag']['name']);
                $config['upload_path'] = './assets/images/country_flag/'; 
                $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
                $config['file_name'] = $new_image_name;
                $config['max_size']  = '0';
                $config['max_width']  = '0';
                $config['max_height']  = '0';
                $config['$min_width'] = '0';
                $config['min_height'] = '0';
                $this->load->library('upload', $config);
                $upload = $this->upload->do_upload('country_flag');
                $country_flag_img  =$this->upload->data();
                $value=array('country_flag'=> $country_flag_img['file_name']);

                $data = array_merge($data, $value);
            }

            $country_name = $post['country_name_en'] ? $post['country_name_en'] : translateTextEn($post['country_name_ar']);
            $getData = $this->common->select('country', " where country_name LIKE '".$country_name."'");
            if(!empty($getData)){
                $whereArr = array('country_id' => $post['country_id']);
                $this->common->update("country", $data, $whereArr);
                $this->session->set_flashdata('success', "Successfully save.");
            } else {
                $save_array = $this->common->insert('country',$data);
                $this->session->set_flashdata('success', "Successfully save.");
            }
        } else {
            $this->session->set_flashdata('error', "Somthing error.");
        }
        redirect('country','refresh');
    }

    public function country_update(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'country_name_en' => "",
                'country_name_ar' => "",
                'priority' => ""
            );
            
            $post = array_merge($blankArr, $post);//country_flag
            $data = array(
                'country_name' => $post['country_name_en'] ? $post['country_name_en'] : translateTextEn($post['country_name_ar']),
                'priority'      => $post['priority'],
                'status'      => 'Active',
                'create_date' => date('yy-m-d')
            );

            if($_FILES['country_flag']['name']!=""){
                $new_image_name = str_replace(str_split(' ()\\/,:*?"<>|'), '', 
                  $_FILES['country_flag']['name']);
                $config['upload_path'] = './assets/images/country_flag/'; 
                $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
                $config['file_name'] = $new_image_name;
                $config['max_size']  = '0';
                $config['max_width']  = '0';
                $config['max_height']  = '0';
                $config['$min_width'] = '0';
                $config['min_height'] = '0';
                $this->load->library('upload', $config);
                $upload = $this->upload->do_upload('country_flag');
                $country_flag_img  =$this->upload->data();
                $value=array('country_flag'=> $country_flag_img['file_name']);

                $data = array_merge($data, $value);
            }

            $whereArr = array('country_id' => $post['country_id']);
            $this->common->update("country", $data, $whereArr);
            $this->session->set_flashdata('success', "Successfully update.");
        } else {
            $this->session->set_flashdata("error","Somthing error.");
        }
        redirect('country','refresh');
    }

    public function region(){
        if($this->session->userdata('Login')){
            $data['get_region'] = $this->common->select('region', " where status = 'Active' order by priority asc");
            $this->load->view('backend/Header');
            $this->load->view('backend/region',$data);
            $this->load->view('backend/Footer');
        }else{
            redirect('admin');
        }
    }

    public function getRegionInfo(){
        $post = $this->input->post();
        if(!empty($post)){
            $id = $post['ids'];

            $where = " where id ='".$id."'";
            $result = $this->common->select('region', $where);
            if(!empty($result)){
                $resultArr[] = array(
                    'id' => $result[0]['id'],
                    'country_id' => $result[0]['country_id'],
                    'region_name_en' => $result[0]['region'],
                    'region_name_ar' => translateText($result[0]['region']),
                    'priority' => $result[0]['priority'],
                    'status' => $result[0]['status'],
                    'create_date' => $result[0]['create_date']
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

    public function region_save(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'region_en' => "",
                'region_ar' => "",
                'country_id' => "",
                'priority' => ""
            );
            
            $post = array_merge($blankArr, $post);
            $data = array(
                'region' => $post['region_name_en'] ? $post['region_name_en'] : translateTextEn($post['region_name_ar']),
                'country_id' => $post['country_id'],
                'priority' => $post['priority'],
                'status'      => 'Active',
                'create_date' => date('yy-m-d')
            );

            $region_name = $post['region_name_en'] ? $post['region_name_en'] : translateTextEn($post['region_name_ar']);
            $getData = $this->common->select('region', " where region LIKE '".$region_name."' and country_id =". $post['country_id']);
            if(!empty($getData)){
                $whereArr = array('id' => $getData[0]['id']);
                $this->common->update("region", $data, $whereArr);
                $output = array(
                    'status' => 1,
                    'message' => "Successfully Save."
                );
            } else {
                $save_array = $this->common->insert('region',$data);
                $output = array(
                    'status' => 1,
                    'message' => "Successfully Save."
                );
            }
        } else {
            $output = array(
                'status' => 0,
                'message' => "Somthing error."
            );
        }
        echo json_encode($output);die;
    }

    public function region_update(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'region_name_en' => "",
                'region_name_ar' => "",
                'country_id' => "",
                'priority' => ""
            );
            
            $post = array_merge($blankArr, $post);
            $data = array(
                'region' => $post['region_name_en'] ? $post['region_name_en'] : translateTextEn($post['region_name_ar']),
                'priority'      => $post['priority'],
                'country_id'  => $post['country_id'],
                'status'      => 'Active',
                'create_date' => date('yy-m-d')
            );

            $whereArr = array('id' => $post['region_id']);
            $this->common->update("region", $data, $whereArr);
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
    
    public function city(){
        if($this->session->userdata('Login')){
            $data['get_city'] = $this->common->select('city', " where status = 'Active' order by priority asc");
            $this->load->view('backend/Header');
            $this->load->view('backend/city',$data);
            $this->load->view('backend/Footer');
        }else{
            redirect('admin');
        }
    }

    public function getCityInfo(){
        $post = $this->input->post();
        if(!empty($post)){
            $id = $post['ids'];

            $where = " where city_id ='".$id."'";
            $result = $this->common->select('city', $where);
            if(!empty($result)){
                $resultArr[] = array(
                    'city_id' => $result[0]['city_id'],
                    'country_id' => $result[0]['country_id'],
                    'city_name_en' => $result[0]['name_en'],
                    'city_name_ar' => translateText($result[0]['name_en']),
                    'priority' => $result[0]['priority'],
                    'region_id' => $result[0]['region_id'],
                    'status' => $result[0]['status'],
                    'create_date' => $result[0]['create_date']
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

    public function city_save(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'city_name_en' => "",
                'city_name_ar' => "",
                'country_id' => "",
                'priority' => "",
                'region_id' => "",
            );

            $post = array_merge($blankArr, $post);
            $data = array(
                'name_en' => $post['city_name_en'] ? $post['city_name_en'] : translateTextEn($post['city_name_ar']),
                'country_id' => $post['country_id'],
                'priority' => $post['priority'],
                'region_id' => $post['region_id'],
                'status'      => 'Active',
                'create_date' => date('yy-m-d')
            );

            $city_name = $post['city_name_en'] ? $post['city_name_en'] : translateTextEn($post['city_name_ar']);
            $getData = $this->common->select('city', " where name_en LIKE '".$city_name."'");

            if(!empty($getData) and ($getData[0]['country_id'] == 0) and ($getData[0]['region_id'] == 0)){

                $whereArr = array('city_id' => $getData[0]['city_id']);
                $this->common->update("city", $data, $whereArr);
                $output = array(
                    'status' => 1,
                    'message' => "Successfully Save."
                );
            } else {
                $save_array = $this->common->insert('city',$data);
                $output = array(
                    'status' => 1,
                    'message' => "Successfully Save."
                );
            }
        } else {
            $output = array(
                'status' => 0,
                'message' => "Somthing error."
            );
        }
        echo json_encode($output);die;
    }

    public function city_update(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'city_name_en' => "",
                'city_name_ar' => "",
                'country_id' => "",
                'region_id' => "",
                'priority' => ""
            );
            
            $post = array_merge($blankArr, $post);
            $data = array(
                'name_en' => $post['city_name_en'] ? $post['city_name_en'] : translateTextEn($post['city_name_ar']),
                'priority'      => $post['priority'],
                'country_id'  => $post['country_id'],
                'region_id'  => $post['region_id'],
                'status'      => 'Active',
                'create_date' => date('yy-m-d')
            );

            $whereArr = array('city_id' => $post['city_id']);
            $this->common->update("city", $data, $whereArr);
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

    public function district(){
        if($this->session->userdata('Login')){
            $data['get_district'] = $this->common->select('district', " where status = 'Active' order by priority asc");
            $this->load->view('backend/Header');
            $this->load->view('backend/district',$data);
            $this->load->view('backend/Footer');
        }else{
            redirect('admin');
        }
    }

    public function getDistrictInfo(){
        $post = $this->input->post();
        if(!empty($post)){
            $id = $post['ids'];

            $where = " where id ='".$id."'";
            $result = $this->common->select('district', $where);
            if(!empty($result)){
                $resultArr[] = array(
                    'id' => $result[0]['id'],
                    'district_name_en' => $result[0]['district_name'],
                    'district_name_ar' => translateText($result[0]['district_name']),
                    'priority' => $result[0]['priority'],
                    'country_id' => $result[0]['country_id'],
                    'region_id' => $result[0]['region_id'],
                    'city_id' => $result[0]['city_id'],
                    'status' => $result[0]['status'],
                    'create_date' => $result[0]['create_date']
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

    public function district_save(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'district_name_en' => "",
                'district_name_ar' => "",
                'country_id' => "",
                'region_id' => "",
                'city_id' => "",
                'priority' => ""
            );
            
            $post = array_merge($blankArr, $post);
            $data = array(
                'district_name' => $post['district_name_en'] ? $post['district_name_en'] : translateTextEn($post['district_name_ar']),
                'priority' => $post['priority'],
                'country_id' => $post['country_id'],
                'region_id' => $post['region_id'],
                'city_id' => $post['city_id'],
                'status'      => 'Active',
                'create_date' => date('yy-m-d')
            );

            // $nationality = $post['nationality_en'] ? $post['nationality_en'] : translateTextEn($post['nationality_ar']);
            // $getData = $this->common->select('nationality', " where nationality_name LIKE '".$nationality."'");
            // if(!empty($getData)){
            //     $whereArr = array('nationality_id' => $post['national_id']);
            //     $this->common->update("nationality", $data, $whereArr);
            //     $output = array(
            //         'status' => 1,
            //         'message' => "Successfully Update."
            //     );
            // } else {
                $save_array = $this->common->insert('district',$data);
                $output = array(
                    'status' => 1,
                    'message' => "Successfully Save."
                );
            // }
        } else {
            $output = array(
                'status' => 0,
                'message' => "Somthing error."
            );
        }
        echo json_encode($output);die;
    }

    public function district_update(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'country_id' => "",
                'region_id' => "",
                'city_id' => "",
                'dictrict_name_en' => "",
                'dictrict_name_ar' => "",
                'priority' => ""
            );

            $post = array_merge($blankArr, $post);
            $data = array(
                'district_name' => $post['dictrict_name_en'] ? $post['dictrict_name_en'] : translateTextEn($post['dictrict_name_ar']),
                'country_id'      => $post['country_id'],
                'region_id'      => $post['region_id'],
                'city_id'      => $post['city_id'],
                'priority'      => $post['priority'],
                'status'      => 'Active',
                'create_date' => date('yy-m-d')
            );

            $whereArr = array('id' => $post['district_id']);
            $this->common->update("district", $data, $whereArr);
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

    public function vat_setup(){
        $data = array();
        $data['vat_setup'] = $this->MI->gat_vat();
        $this->load->view('backend/vat_setup',$data);
    }

    public function getVatInfo(){
        $post = $this->input->post();
        if(!empty($post)){
            $vat_id = $post['vat_id'];

            $where = " where vat_id ='".$vat_id."'";
            $result = $this->common->select('vat_settings', $where);
            if(!empty($result)){
                $resultArr[] = array(
                    'vat_id' => $result[0]['vat_id'],
                    'vat_number' => $result[0]['vat_number'],
                    'vat_tax' => $result[0]['vat_tax']
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

    public function vat_save(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'vat_number' => "",
                'vat_tax' => "",
            );
            
            $post = array_merge($blankArr, $post);
            $data = array(
                'vat_number' => $post['vat_number'],
                'vat_tax' => $post['vat_tax'],
                'status'      => 'Active',
                'create_date' => date('yy-m-d')
            );

            $save_array = $this->common->insert('vat_settings',$data);
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

    public function vat_update(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'vat_number' => "",
                'vat_tax' => ""
            );
            
            $post = array_merge($blankArr, $post);
            $data = array(
                'vat_number' => $post['vat_number'],
                'vat_tax' => $post['vat_tax'],
                'status'  => 'Active',
            );

            $whereArr =  array('vat_id' => $post['vat_id']);
            $save_array = $this->common->update('vat_settings',$data, $whereArr);
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

    public function currency_setup(){
        $data = array();
        $data['currency_info'] = $this->MI->get_currency();
        $this->load->view('backend/currency_setup',$data);
    }

    public function getCurrencyInfo(){
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

    public function currency_save(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'currency_name' => "",
                'currency_symbol' => "",
                'currency_country' => "",
                'adjust_currency' => ""
            );
            
            $post = array_merge($blankArr, $post);
            $data = array(
                'currency_name' => $post['currency_name'],
                'currency_country' => $post['currency_country'],
                'currency_country_name' => countryString($post['currency_country']),
                'currency_symbol' => $post['currency_symbol'],
                'adjust_currency' => $post['adjust_currency'],
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

    public function currency_update(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'currency_name' => "",
                'currency_symbol' => "",
                'currency_country' => "",
                'adjust_currency' => ""
            );
            
            $post = array_merge($blankArr, $post);
            $data = array(
                'currency_name' => $post['currency_name'],
                'currency_country' => $post['currency_country'],
                'currency_country_name' => countryString($post['currency_country']),
                'currency_symbol' => $post['currency_symbol'],
                'adjust_currency' => $post['adjust_currency'],
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
}?>
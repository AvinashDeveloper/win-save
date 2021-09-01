<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Supports extends CI_Controller {

	public function __construct()  {
		parent::__construct();
        // $this->load->model(array('backend/ModVender'=>'MV','backend/Modlogin'=>'ML'));
        if(!$this->session->userdata('Login')){
            redirect('admin');
        }
	}
  
    public function rules(){
        if($this->session->userdata('Login')){
            // $data['get_rules']=$this->Modlogin->get_rules(); 
            $data['get_rules'] = $this->common->select('support_all', " where support_type = 'rules' order by priority asc");
            $this->load->view('backend/Header');
            $this->load->view('backend/rules',$data);
            $this->load->view('backend/Footer');
        }else{
            redirect('admin');
        }
    }

    public function rule_save(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'title_en' => "",
                'desc_en' => "",
                'priority' => "",
                'title_ar' => "",
                'desc_ar' => ""
            );

            $post = array_merge($blankArr, $post);
            $data = array(
                'support_type' => 'rules',
                'title' => $post['title_en'] ? $post['title_en'] : translateTextEn($post['title_ar']),
                'description' => $post['desc_en'] ? $post['desc_en'] : translateTextEn($post['desc_ar']),
                'priority' => $post['priority'],
                'status'      => 'Active',
                'create_date' => date('yy-m-d')
            );
            $rule_save = $this->common->insert('support_all',$data);
        }
        redirect('rules','refresh');
    }

    public function getInfo(){
        $post = $this->input->post();
        if(!empty($post)){

            $support_id = $post['id'];
            $type = $post['type'];

            $where = " where support_id ='".$support_id."' and support_type = '".$type."'";
            $result = $this->common->select('support_all', $where);
            if(!empty($result)){
                $resultArr[] = array(
                    'support_id' => $result[0]['support_id'],
                    'title_en' => $result[0]['title'],
                    'desc_en' => $result[0]['description'],
                    'title_ar' => translateText($result[0]['title']),
                    'desc_ar' => translateText($result[0]['description']),
                    'priority' => $result[0]['priority'],
                    'link' => $result[0]['link'],
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

    public function rule_update(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'title_en' => "",
                'desc_en' => "",
                'priority' => "",
                'title_ar' => "",
                'desc_ar' => ""
            );

            $post = array_merge($blankArr, $post);
            $data = array(
                'support_type' => 'rules',
                'title' => $post['title_en'] ? $post['title_en'] : translateTextEn($post['title_ar']),
                'description' => $post['desc_en'] ? $post['desc_en'] : translateTextEn($post['desc_ar']),
                'priority' => $post['priority'],
                'status'      => 'Active',
                'create_date' => date('yy-m-d')
            );
            $where = array('support_id' => $post['rule_id']);
            $rule_save = $this->common->update('support_all',$data,$where);
        }
        redirect('rules','refresh');
    }

    public function help(){
		if($this->session->userdata('Login')){
			$data['get_helps'] = $this->common->select('support_all', " where support_type = 'help' order by priority asc");
			$this->load->view('backend/Header');
			$this->load->view('backend/help',$data);
			$this->load->view('backend/Footer');
		}else{
			redirect('admin');
		}
	}

	public function help_save(){
        $post = $this->input->post();
        if(!empty($post)){
            $this->form_validation->set_rules('title_en', 'Title En','required');
            $this->form_validation->set_rules('desc_en', 'Description En','required');
            $this->form_validation->set_rules('priority', 'Priority','required');
            if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('error',get_form_error($this->form_validation->error_array()));
			} else {
                $blankArr = array(
                    'title_en' => "",
                    'desc_en' => "",
                    'priority' => "",
                    'title_ar' => "",
                    'desc_ar' => ""
                );
                $post = array_merge($blankArr, $post);
                $data = array(
                    'support_type' => 'help',
                    'title' => $post['title_en'] ? $post['title_en'] : translateTextEn($post['title_ar']),
                    'description' => $post['desc_en'] ? $post['desc_en'] : translateTextEn($post['desc_ar']),
                    'priority' => $post['priority'],
                    'status'      => 'Active',
                    'create_date' => date('yy-m-d')
                );
                $help_save = $this->common->insert('support_all',$data);
            }
        }
        redirect('help','refresh');
    }

    public function help_update(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'title_en' => "",
                'desc_en' => "",
                'priority' => "",
                'title_ar' => "",
                'desc_ar' => ""
            );

            $post = array_merge($blankArr, $post);
            $data = array(
                'support_type' => 'help',
                'title' => $post['title_en'] ? $post['title_en'] : translateTextEn($post['title_ar']),
                'description' => $post['desc_en'] ? $post['desc_en'] : translateTextEn($post['desc_ar']),
                'priority' => $post['priority'],
                'status'      => 'Active',
                'create_date' => date('yy-m-d')
            );
            $where = array('support_id' => $post['help_id']);
            $rule_save = $this->common->update('support_all',$data,$where);
        }
        redirect('help','refresh');
    }

    public function find_us(){
		if($this->session->userdata('Login')){
			$data['get_helps'] = $this->common->select('support_all', " where support_type = 'find_us' order by priority asc");
			$this->load->view('backend/Header');
			$this->load->view('backend/findUs_page',$data);
			$this->load->view('backend/Footer');
		}else{
			redirect('admin');
		}
	}

	public function findUs_save(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'title_en' => "",
                'link' => "",
                'priority' => "",
                'title_ar' => ""
            );
            $post = array_merge($blankArr, $post);
            $data = array(
                'support_type' => 'find_us',
                'title' => $post['title_en'] ? $post['title_en'] : translateTextEn($post['title_ar']),
                'link' => $post['link'],
                'priority' => $post['priority'],
                'status'      => 'Active',
                'create_date' => date('yy-m-d')
            );
            $save = $this->common->insert('support_all',$data);
        }
        redirect('find_us','refresh');
    }

    public function findUs_update(){
        $post = $this->input->post();
        $output = array();
        if(!empty($post)){
            $blankArr = array(
                'title_en' => "",
                'link' => "",
                'priority' => "",
                'title_ar' => ""
            );

            $post = array_merge($blankArr, $post);
            $data = array(
                'support_type' => 'find_us',
                'title' => $post['title_en'] ? $post['title_en'] : translateTextEn($post['title_ar']),
                'link' => $post['link'],
                'priority' => $post['priority'],
                'status'      => 'Active',
                'create_date' => date('yy-m-d')
            );
            $where = array('support_id' => $post['find_id']);
            $rule_save = $this->common->update('support_all',$data,$where);
            if($rule_save){
                $output = array('status' => 1,
                        'message' => "Successfully update."
                );
            } else {
                $output = array('status' => 0,
                        'message' => "Error"
                );
            }
        } else {
            $output = array('status' => 0,
                    'message' => "Failed"
            );
        }
        echo json_encode($output);die;
    }

    public function contact_us(){
		if($this->session->userdata('Login')){
			$data['get_contact'] = $this->common->select('support_all', " where support_type = 'contact_us' order by priority asc");
			$this->load->view('backend/Header');
			$this->load->view('backend/contactUs_page',$data);
			$this->load->view('backend/Footer');
		}else{
			redirect('admin');
		}
	}

	public function contactUs_save(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'title_en' => "",
                'info' => "",
                'priority' => "",
                'title_ar' => ""
            );
            $post = array_merge($blankArr, $post);
            $data = array(
                'support_type' => 'contact_us',
                'title' => $post['title_en'] ? $post['title_en'] : translateTextEn($post['title_ar']),
                'description' => $post['info'],
                'priority' => $post['priority'],
                'status'      => 'Active',
                'create_date' => date('yy-m-d')
            );
            $save = $this->common->insert('support_all',$data);
        }
        redirect('contact_us','refresh');
    }

    public function contactUs_update(){
        $post = $this->input->post();
        $output = array();
        if(!empty($post)){
            $blankArr = array(
                'title_en' => "",
                'info' => "",
                'priority' => "",
                'title_ar' => ""
            );

            $post = array_merge($blankArr, $post);
            $data = array(
                'support_type' => 'contact_us',
                'title' => $post['title_en'] ? $post['title_en'] : translateTextEn($post['title_ar']),
                'description' => $post['info'],
                'priority' => $post['priority'],
                'status'      => 'Active',
                'create_date' => date('yy-m-d')
            );
            $where = array('support_id' => $post['contact_id']);
            $rule_save = $this->common->update('support_all',$data,$where);
            if($rule_save){
                $output = array('status' => 1,
                        'message' => "Successfully update."
                );
            } else {
                $output = array('status' => 0,
                        'message' => "Error"
                );
            }
        } else {
            $output = array('status' => 0,
                    'message' => "Failed"
            );
        }
        echo json_encode($output);die;
    }

    public function vender_info(){
		if($this->session->userdata('Login')){
			$data['get_venderSupport'] = $this->common->select('support_all', " where support_type = 'vendor_support' order by priority asc");
			$this->load->view('backend/Header');
			$this->load->view('backend/vender_support',$data);
			$this->load->view('backend/Footer');
		}else{
			redirect('admin');
		}
	}

	public function venderInfo_save(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'title_en' => "",
                'info' => "",
                'priority' => "",
                'title_ar' => ""
            );
            $post = array_merge($blankArr, $post);
            $data = array(
                'support_type' => 'vendor_support',
                'title' => $post['title_en'] ? $post['title_en'] : translateTextEn($post['title_ar']),
                'description' => $post['info'],
                'priority' => $post['priority'],
                'status'      => 'Active',
                'create_date' => date('yy-m-d')
            );
            $save = $this->common->insert('support_all',$data);
        }
        redirect('for_venders','refresh');
    }

    public function venderSupport_update(){
        $post = $this->input->post();
        $output = array();
        if(!empty($post)){
            $blankArr = array(
                'title_en' => "",
                'info' => "",
                'priority' => "",
                'title_ar' => ""
            );

            $post = array_merge($blankArr, $post);
            $data = array(
                'support_type' => 'vendor_support',
                'title' => $post['title_en'] ? $post['title_en'] : translateTextEn($post['title_ar']),
                'description' => $post['info'],
                'priority' => $post['priority'],
                'status'      => 'Active',
                'create_date' => date('yy-m-d')
            );
            $where = array('support_id' => $post['venderSupport_id']);
            $rule_save = $this->common->update('support_all',$data,$where);
            if($rule_save){
                $output = array('status' => 1,
                        'message' => "Successfully update."
                );
            } else {
                $output = array('status' => 0,
                        'message' => "Error"
                );
            }
        } else {
            $output = array('status' => 0,
                    'message' => "Failed"
            );
        }
        echo json_encode($output);die;
    }

    public function about_us(){
		if($this->session->userdata('Login')){
			$data['get_aboutUs'] = $this->common->select('support_all', " where support_type = 'about_us' order by priority asc");
			$this->load->view('backend/Header');
			$this->load->view('backend/aboutUs_page',$data);
			$this->load->view('backend/Footer');
		}else{
			redirect('admin');
		}
	}

	public function aboutUs_save(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'desc_en' => "",
                'desc_ar' => ""
            );
            $post = array_merge($blankArr, $post);
            $data = array(
                'support_type' => 'about_us',
                'description' => $post['desc_en'] ? $post['desc_en'] : translateTextEn($post['desc_ar']),
                'status'      => 'Active',
                'create_date' => date('yy-m-d')
            );
            $save = $this->common->insert('support_all',$data);
        }
        redirect('about_us','refresh');
    }

    public function aboutUs_update(){
        $post = $this->input->post();
        $output = array();
        if(!empty($post)){
            $blankArr = array(
                'desc_en' => "",
                'desc_ar' => ""                
            );

            $post = array_merge($blankArr, $post);
            $data = array(
                'support_type' => 'about_us',
                'description' => $post['desc_en'] ? $post['desc_en'] : translateTextEn($post['desc_AR']),
                'status'      => 'Active',
                'create_date' => date('yy-m-d')
            );
            $where = array('support_id' => $post['find_id']);
            $rule_save = $this->common->update('support_all',$data,$where);
            if($rule_save){
                $output = array('status' => 1,
                        'message' => "Successfully update."
                );
            } else {
                $output = array('status' => 0,
                        'message' => "Error"
                );
            }
        } else {
            $output = array('status' => 0,
                    'message' => "Failed"
            );
        }
        echo json_encode($output);die;
    }
}
?>
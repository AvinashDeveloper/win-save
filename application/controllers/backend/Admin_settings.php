<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_settings extends CI_Controller {

	public function __construct()  {
		parent::__construct();
        // $this->load->model(array('backend/ModVender'=>'MV','backend/Modlogin'=>'ML'));
        if(!$this->session->userdata('Login')){
            redirect('admin');
        }
    }

    public function vendor_contact_roles(){
        $data = array();
        $post['role_type'] = 'vendor';
        $data['vendor_roles'] = $this->MAS->gatRolesInfo($post);
        $this->load->view('backend/admin_setting/vendor_contact_roles',$data);
    }

    public function manager_list_info(){
        $data = array();
        $post=array();
        // $post['role_type'] = '5';
        $data['manager_info'] = $this->MAS->getManagerInfo($post);
        $this->load->view('backend/admin_setting/manager_list',$data);
    }

    public function admin_profile(){
        $data = array();
        $id = $this->session->userdata('Login')[0]->id;
        $data['user_info'] = $this->common->select('user'," where id=".$id);
        $this->load->view('backend/admin_setting/my_profile',$data);
    }

    public function manage_role_permission(){
        $data = array();
        $post['role_type'] = 'admin';
        $data['admin_roles'] = $this->MAS->gatRolesInfo($post);
        $this->load->view('backend/admin_setting/manage_roles',$data);
    }

    public function getRoleInfo(){
        $post = $this->input->post();
        if(!empty($post)){

            $result = $this->MAS->gatRolesInfo($post);
            $output = array(
                'status' => 1,
                'result' => $result,
                'message' => 'Successfully get info.'
            );
        } else {
            $output = array(
                'status' => 0,
                'message' => "Detail not found",
            );
        }
        echo json_encode($output);die;
    }

    public function update_role_info(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'role_name' => '',
                'role_description' => '',
                'role_type' => '',
                'role_status' => 'Active'
            );

            $post = array_merge($blankArr,$post);
            $dataArr = array(
                'role_name' => ucwords($post['role_name']),
                'role_description' => $post['role_description'],
                'role_status' => 'Active',
                'role_create_date' => date('yy-m-d')
            );
            $whereArr = array(
                'role_id' => $post['role_id']
            );
            $this->common->update('user_roles',$dataArr, $whereArr);
            $output = array(
                'status' => 1,
                'message' => 'Successfully update'
            );
        } else { 
            $output = array(
                'status' => 0 ,
                'message' => 'Something Error'
            );
        }
        echo json_encode($output);die;
    }

    public function save_role_info(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'role_name' => '',
                'role_description' => '',
                'role_type' => '',
                'role_status' => 'Active'
            );

            $post = array_merge($blankArr,$post);
            $dataArr = array(
                'role_type' => $post['role_type'],
                'role_name' => ucwords($post['role_name']),
                'role_description' => $post['role_description'],
                'role_status' => 'Active',
                'role_create_date' => date('yy-m-d')
            );

            $id = $this->common->insert('user_roles',$dataArr);
            $output = array(
                'status' => 1,
                'message' => 'Successfully save'
            );
        } else { 
            $output = array(
                'status' => 0 ,
                'message' => 'Something Error'
            );
        }
        echo json_encode($output);die;
    }

    public function getMangerInfo(){
        $post = $this->input->post();
        if(!empty($post)){
            $id = $post['id'];
            $result = $this->MAS->getManagerInfo($post);
            $output = array(
                'status' => 1,
                'result' => $result,
                'message' => 'Successfully get info.'
            );
        } else {
            $output = array(
                'status' => 0,
                'message' => "Detail not found",
            );
        }
        echo json_encode($output);die;
    }

    public function getProfileInfo(){
        $post = $this->input->post();
        if(!empty($post)){
            $id = $post['id'];
            $result = $this->common->select('user'," where id=".$id);
            $output = array(
                'status' => 1,
                'result' => $result,
                'message' => 'Successfully get info.'
            );
        } else {
            $output = array(
                'status' => 0,
                'message' => "Detail not found",
            );
        }
        echo json_encode($output);die;
    }

    public function updateManagerinfo(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'role_id' => '',
                'mobile' => '',
                'name' => '',
                'email' => '',
                'password' => '',
                'status' => 'Active'
            );

            $post = array_merge($blankArr,$post);
            $dataArr = array(
                'type' => $post['role_id'],
                'contact' => $post['mobile'],
                'name' => $post['name'],
                'email' => $post['email'],
                'pass' => $post['password'],
                'status' => 'Active',
            );
            $whereArr = array(
                'id' => $post['contact_id']
            );
            $this->common->update('user',$dataArr, $whereArr);
            $output = array(
                'status' => 1,
                'message' => 'Successfully update'
            );
        } else { 
            $output = array(
                'status' => 0 ,
                'message' => 'Something Error'
            );
        }
        echo json_encode($output);die;
    }

    public function saveManagerinfo(){
        $post = $this->input->post();
        if(!empty($post)){
            $blankArr = array(
                'role_id' => '',
                'mobile' => '',
                'name' => '',
                'email' => '',
                'password' => '',
                'status' => 'Active'
            );

            $post = array_merge($blankArr,$post);
            $dataArr = array(
                'type' => $post['role_id'],
                'contact' => $post['mobile'],
                'name' => $post['name'],
                'email' => $post['email'],
                'pass' => $post['password'],
                'status' => 'Active',
            );
            $id = $this->common->insert('user',$dataArr);
            $output = array(
                'status' => 1,
                'message' => 'Successfully update'
            );
        } else { 
            $output = array(
                'status' => 0 ,
                'message' => 'Something Error'
            );
        }
        echo json_encode($output);die;
    }

    public function assign_permision(){
        $post = $this->input->post();
        if(!empty($post)){
            $role_id = $post['role_ids'];
            unset($post['role_ids']);
            $updateArr = array(
                    'role_permission' => json_encode($post) ? json_encode($post) : "",
            );
            $whereArr = array(
                    'role_id' => $role_id
            );
            $this->common->update('user_roles',$updateArr,$whereArr);
        }
        redirect('Manage-roles');
    }

    public function getAssignPermission(){
        $post = $this->input->post();
        if(!empty($post)){
            $role_permission = "";
            $result = $this->common->select('user_roles'," where role_id=".$post['role_id']);
            if($result[0]['role_permission']){
                $role_permission = json_decode($result[0]['role_permission']);
            }
            echo json_decode($result[0]['role_permission']);
            echo "<pre>";print_r($result[0]['role_permission']);
            $results[0] = array('role_id' => $result[0]['role_id'],'role_permission' => $result[0]['role_permission']);
            $output = array(
                'status' => 1,
                'result' => $results,
                "message" => "Successfully get detail."
            );

        }else{
            $output = array(
                'status'=>0,
                "message" => "Detail not found",
            );
        }
        echo json_encode($output);die;
    }
 
    public function assign_vendor_permision(){
        $post = $this->input->post();
        if(!empty($post)){
            $role_id = $post['role_ids'];
            unset($post['role_ids']);
            $updateArr = array(
                    'role_permission' => json_encode($post) ? json_encode($post) : "",
            );
            $whereArr = array(
                    'role_id' => $role_id
            );
            $this->common->update('user_roles',$updateArr,$whereArr);
        }
        redirect('Manage-vendor-contact-role');
    }
}
?>
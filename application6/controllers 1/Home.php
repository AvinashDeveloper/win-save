<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Home extends CI_Controller {

     

    public function __construct()

    {

        parent::__construct();

        $this->load->helper(array('url','form'));

        $this->load->model('frontend/Modlogin');

        $this->load->database();  

    }

    public function index()

    {

      $this->load->view('index');

    } 

     public function check_login()

    {

    	$email=$this->security->xss_clean($this->input->post('email'));

        $pass=$this->security->xss_clean($this->input->post('pass'));

        if($email !="" && $pass!="")

        $Login =  $this->Modlogin->checklogin($email,$pass);
      
        if($Login)

        {

           $this->session->set_userdata('Login',$Login);

           redirect('dashboard');

        }

        else

        {

          $this->session->set_flashdata('Login_msg', 'Login Error Please Try Again ');

          redirect('Home/index');

        }

    }

    public function create_account()

    {

      $this->load->view('Createaccount');

    }

    public function saveAccount()  

    {  

     $filesCount = count($_FILES['files']['name']);

     for($i = 0; $i < $filesCount; $i++){

                $_FILES['file']['name']     = $_FILES['files']['name'][$i];

                $_FILES['file']['type']     = $_FILES['files']['type'][$i];

                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];

                $_FILES['file']['error']    = $_FILES['files']['error'][$i];

                $_FILES['file']['size']     = $_FILES['files']['size'][$i];

                

                // File upload configuration

                $uploadPath = './assets/images/vendors/store_img/';

                $config['upload_path'] = $uploadPath;

                $config['allowed_types'] = '*';

                

                // Load and initialize upload library

                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                // Upload file to server

                if($this->upload->do_upload('file')){

                    // Uploaded file data

                    $fileData = $this->upload->data();

                    if($i==0){

                      $uploadData[$i]['featured_image'] = $fileData['file_name'];

                    }

                    if($i==1){

                      $uploadData[$i]['business_proof'] = $fileData['file_name'];

                    }

                    if($i==2){

                      $uploadData[$i]['logo_image'] = $fileData['file_name'];

                    }

                     if($i==3){

                      $uploadData[$i]['menu_pdf'] = $fileData['file_name'];

                    }

                }

            }

            $i=0;

            foreach ($uploadData as $key) {

             foreach ($key as $value) {

              if($i==0){

                $_POST['featured_image']= $value;

              }

              if($i==1){

                $_POST['logo_image']= $value;

              }

              if($i==2){

                $_POST['business_proof']= $value;

              }

               if($i==3){

                $_POST['menu_pdf']= $value;

              }

             

             }

              $i++;

            }



            $_POST['type']=1;

            $_POST['added_date']=date('Y-m-d');

            $_POST['status']='0';

            $insert = $this->db->insert('vendor',$_POST);

            $this->session->set_flashdata('cr_ac', 'Account Create Successfully');

             return redirect('Create-account');        

  }

 }

 ?>


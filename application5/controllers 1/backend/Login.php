<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Login extends CI_Controller {

     

    public function __construct()

    {

        parent::__construct();

        $this->load->helper(array('url','form'));

        $this->load->model('backend/Modlogin');
        $this->load->model('backend/ModVender');
        $this->load->database(); 

    }

    public function index()

    {

      $this->load->view('backend/Login');

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

          redirect('admin');

        }



    }

    public function dashboard()

    {

      if($this->session->userdata('Login')){

           $this->load->view('backend/Header');

           $this->load->view('backend/Dashboard');

           $this->load->view('backend/Footer');

      }else{

         redirect('admin');

      }

  }
  public function editVender()

    {

      if($this->session->userdata('Login')){
$data['ac_summery'] =$this->Modlogin->ac_summery($this->uri->segment(2));

           $this->load->view('backend/Header');

           $this->load->view('backend/editVender',$data);

           $this->load->view('backend/Footer');

      }else{

         redirect('admin');

      }

  }


    public function allUsers()

    {

      if($this->session->userdata('Login')){

           $data['all_user_list']=$this->Modlogin->allUserslist(); 

           $this->load->view('backend/Header');

           $this->load->view('backend/Allusers',$data);

           $this->load->view('backend/Footer');

      }else{

         redirect('admin');

      }

    }

    public function status_update(){

           $data = array('status'     => $this->input->post('status'),); 

           //update data into database table.

           $this->db->where('id',$this->input->post('id'));  

           $update_status =  $this->db->update('user', $data); 

           $this->session->set_flashdata('status_Update', 'Status Update Successfully');

           return redirect($this->input->post('path'));

            



    } 

     public function user_view()

    {

      if($this->session->userdata('Login')){

         $output = '';

         $data['user_view'] =$this->Modlogin->user_view($this->input->post('user_id'));

         print_r(json_encode($data['user_view'][0]) );

    exit();

           

      }else{

         redirect('admin');

      }

    }

    public function allVenders()

    {

      if($this->session->userdata('Login')){

           $data['all_venders_list']=$this->Modlogin->allVenderslist(); 

           $this->load->view('backend/Header');

           $this->load->view('backend/AllVenders',$data);

           $this->load->view('backend/Footer');

      }else{

         redirect('admin');

      }

    }

    public function unverifiedVenders()

    {

      if($this->session->userdata('Login')){

           $data['all_unverifiedvenders_list']=$this->Modlogin->all_unverifiedvenders_list(); 

           $this->load->view('backend/Header');

           $this->load->view('backend/AllUnverifiedVenders',$data);

           $this->load->view('backend/Footer');

      }else{

         redirect('admin');

      }

    }

    public function venstatus_update(){

           $data = array('status'     => $this->input->post('status'),); 

           //update data into database table.

           $this->db->where('id',$this->input->post('id'));  

           $update_status =  $this->db->update('vendor', $data); 

           $this->session->set_flashdata('status_Update', 'Status Update Successfully');

           return redirect('all-venders');

            



    } 

    public function vender_view()

    {

      if($this->session->userdata('Login')){

         $output = '';

         $data['vender_view'] =$this->Modlogin->vender_view($this->input->post('user_id'));

         print_r(json_encode($data['vender_view'][0]) );

    exit();

           

      }else{

         redirect('admin');

      }

    }

    public function logout(){

       $this->session->unset_userdata('Login');

       redirect($this->index());

    } 

    public function addManager(){

      $this->load->view('backend/Header');

      $this->load->view('backend/AddManager');

      $this->load->view('backend/Footer');

    }

    public function allManagerList(){

      $data['all_manager_list']=$this->Modlogin->all_manager_list();

      $this->load->view('backend/Header');

      $this->load->view('backend/AllManagerList',$data);

      $this->load->view('backend/Footer');

    }

     public function saveManager()  

    {  

     

  // configurations from upload library

     $config['upload_path'] = './assets/images/vendors/store_img';

     $config['allowed_types'] = 'gif|jpg|png|jpeg';

     $config['max_size'] = '2048000'; // max size in KB

     $config['max_width'] = '2200'; //max resolution width

     $config['max_height'] = '1100';  //max resolution height

     // load CI libarary called upload

     $this->load->library('upload', $config);

     // body of if clause will be executed when image uploading is failed

     if(!$this->upload->do_upload()){
     $this->session->set_flashdata('save_manager', 'Please Select 2200*1100 Image size');
     redirect('add-Manager'); 

     $errors = array('error' => $this->upload->display_errors());

      // This image is uploaded by deafult if the selected image in not uploaded

     }

     // body of else clause will be executed when image uploading is succeeded

     else {

      $data = array('upload_data' => $this->upload->data());

      $image = $_FILES['userfile']['name'];  //name must be userfile

      $this->Modlogin->save_manager($image);

     

     

      //redirect('Login/Sliderview');

     

    }

  }

    public function updateManager(){

      $data['user_view']=$this->Modlogin->user_view($this->uri->segment(2));

      $this->load->view('backend/Header');

      $this->load->view('backend/UpdateManager',$data);

      $this->load->view('backend/Footer');

    }

    public function update_Manager()

    { 

      if($_FILES['userfile']['name']!="")

      {

       // configurations from upload library

       $config['upload_path'] = './assets/images/vendors/store_img';

       $config['allowed_types'] = 'gif|jpg|png|jpeg';

       $config['max_size'] = '2048000'; // max size in KB

       $config['max_width'] = '2200'; //max resolution width

       $config['max_height'] = '1100';  //max resolution height

       $this->load->library('upload', $config);

       // body of if clause will be executed when image uploading is failed

       if(!$this->upload->do_upload()){

       $errors = array('error' => $this->upload->display_errors());
       $this->session->set_flashdata('update_manager', 'Image Error PLease Select 2200*1100 Size Image');



          return redirect('update-Manager/'.$this->input->post('id'));
       // This image is uploaded by deafult if the selected image in not uploaded

       $data = array( 'id' => $this->input->post('id'),);

       }

       else{

       $data = array('upload_data' => $this->upload->data());

       $image = $_FILES['userfile']['name'];  //name must be userfile

       $this->Modlogin->update_Manager($image);

      }

    }

   else{  

   

       $image = $this->input->post('images');

       $this->Modlogin->update_Manager($image);

    }



    }

     public function slide_ads(){

      $data['slider_ads']=$this->Modlogin->slider_ads(); 

      $this->load->view('backend/Header');

      $this->load->view('backend/Slideads',$data);

      $this->load->view('backend/Footer');

    }

    public function save_Ads()  

    {  

      $filesCount = count($_FILES['files']['name']);

            for($i = 0; $i < $filesCount; $i++){

              

                $_FILES['file']['name']     = $_FILES['files']['name'][$i];

                $_FILES['file']['type']     = $_FILES['files']['type'][$i];

                $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];

                $_FILES['file']['error']     = $_FILES['files']['error'][$i];

                $_FILES['file']['size']     = $_FILES['files']['size'][$i];

                

                // File upload configuration

                $uploadPath = './assets/images/slider/';

                $config['upload_path'] = $uploadPath;

                $config['allowed_types'] = 'jpg|jpeg|png|gif';

                

                // Load and initialize upload library

                $this->load->library('upload', $config);

                $this->upload->initialize($config);

                

                // Upload file to server

                if($this->upload->do_upload('file')){

                    // Uploaded file data

                    $fileData = $this->upload->data();

                    $uploadData[$i]['slider_name'] = $fileData['file_name'];

                    

                }

            }

            

            if(!empty($uploadData)){

                // Insert files data into the database

              $insert = $this->db->insert_batch('slider',$uploadData);

               $this->session->set_flashdata('ads_save', 'Ads Save Successfully');

           

            }

            return redirect('slide-ads');

    }

    public function delete_ads(){

      $this->db->delete('slider', array('id' => $this->input->post('user_id')));

      $this->session->set_flashdata('ads_save', 'Slider Data Delete Successfully');

      redirect('slide-ads');

    }

    public function news_save(){

      $data['get_news']=$this->Modlogin->get_news(); 

      $this->load->view('backend/Header');

      $this->load->view('backend/News',$data);

      $this->load->view('backend/Footer');

    }

    public function save_news()

    {

      // print_r($_POST);

      // print_r($_FILES);die;

      if($_FILES['imag']['name']!="")  

           {  

             

                $config['upload_path'] = './assets/images/news/';  

                $config['allowed_types'] = 'jpg|jpeg|png|gif';  

                $this->load->library('upload', $config);  

                if(!$this->upload->do_upload('imag'))  

                {  

                     echo $this->upload->display_errors();  

                }  

                else{

                   $data = $this->upload->data();

                    $data = array(

                       

                       'title' => $this->input->post('title'),

                       'text' => $this->input->post('text'),

                       'image' => $data["file_name"],

                       'added_date'=>date('Y-m-d H:i:s'),

                      );

                      $save_news = $this->db->insert('news', $data);

                     

           }  

    }

    else{

      echo "Failed to save image";

    }



      

    }

    public function get_news()

    {

      if($this->session->userdata('Login')){

         $output = '';

         $data['newsdetail'] =$this->Modlogin->newsdetail($this->input->post('news_id'));

         print_r(json_encode($data['newsdetail'][0]) );

    exit();

           

      }else{

         redirect('admin');

      }

    }

    public function update_news()

    {

      // print_r( $_FILES);die;

      if($_FILES['imag']['name']!="")  

           {  

             

                $config['upload_path'] = './assets/images/news/';  

                $config['allowed_types'] = 'jpg|jpeg|png|gif';  

                $this->load->library('upload', $config);  

                if(!$this->upload->do_upload('imag'))  

                {  

                     echo $this->upload->display_errors();  

                }  

                else{

                   $data = $this->upload->data();

                    $data = array(

                       

                       'title' => $this->input->post('title'),

                       'text' => $this->input->post('text'),

                       'image' => $data["file_name"],

                       'added_date'=>date('Y-m-d H:i:s'),

                      );

                       $this->db->where('id', $this->input->post('news_id'));  

       $update_Manager =  $this->db->update('news', $data);

      
                     

           }  

    }

    else{

      $data = array(

                       

                       'title' => $this->input->post('title'),

                       'text' => $this->input->post('text'),

                      

                       'added_date'=>date('Y-m-d H:i:s'),

                      );

                       $this->db->where('id', $this->input->post('news_id'));  

       $update_Manager =  $this->db->update('news', $data);

    }



    }

    public function dlt_news()

    {

      if($this->session->userdata('Login')){

       $this->db->where('id', $this->input->post('news_id'));  

       $update_Manager =  $this->db->delete('news');

      echo $this->db->last_query();

      }else{

         redirect('admin');

      }

    }

    public function category_list(){

      $data['get_category']=$this->Modlogin->get_category(); 

      $this->load->view('backend/Header');

      $this->load->view('backend/Categorylist',$data);

      $this->load->view('backend/Footer');

    }

    public function category_save()  

    {  

      if(isset($_FILES["userfile"]["name"]))  

           {  



                $config['upload_path'] = './assets/images/categories/';  

                $config['allowed_types'] = 'jpg|jpeg|png|gif';  

                $this->load->library('upload', $config);  

                if(!$this->upload->do_upload('userfile'))  

                {  

                     echo $this->upload->display_errors();  

                }  

                else  

                {  

                     $data = $this->upload->data();  

                     $data = array(

                       'featured_image' => $data["file_name"],

                       'name' => $this->input->post('name'),

                        );



                     $category_save = $this->db->insert('category', $data);

                       

                }  

           }  

    

    }
    public function vender_contact()  
    {  
      $data = array(
      'title' => $this->input->post('title'),
      'name' => $this->input->post('name'),
      'contact' => $this->input->post('contact'),
      'email' => $this->input->post('email'),
      'note' => $this->input->post('note'),
      'status' => $this->input->post('status'),
      'v_id' => $this->input->post('v_id'),
    );

    $this->db->insert('vender_contact', $data);
      
    

    }

    public function get_category()

    {

      if($this->session->userdata('Login')){

         $output = '';

         $data['get_category'] =$this->Modlogin->get_categorybyid($this->input->post('category_id'));

         print_r(json_encode($data['get_category'][0]) );

    exit();

           

      }else{

         redirect('admin');

      }

    }

     public function category_update()  

    {  

     if($_FILES['userfile']['name']!="")  

           {  

               

                $config['upload_path'] = './assets/images/categories/';  

                $config['allowed_types'] = 'jpg|jpeg|png|gif';  

                $this->load->library('upload', $config);  

                if(!$this->upload->do_upload('userfile'))  

                {  

                     echo $this->upload->display_errors();  

                }  

                else  

                {  

                     $data = $this->upload->data();  

                     $data = array(

                       'featured_image' => $data["file_name"],

                       'name' => $this->input->post('name'),

                        );

                    

                     $this->db->where('id', $this->input->post('id'));  

                     $category_update = $this->db->update('category', $data);

                       

                }  

           }else{



            $data = array(

                       'featured_image' => $this->input->post('featured_image'),

                       'name' => $this->input->post('name'),

                        );

            

                     $this->db->where('id', $this->input->post('id'));  

                     $category_update = $this->db->update('category', $data);

           }  

    

    }

    public function dlt_category()

    {

      if($this->session->userdata('Login')){

       $this->db->where('id', $this->input->post('category_id'));  

       $update_Manager =  $this->db->delete('category');

      echo $this->db->last_query();

      }else{

         redirect('admin');

      }

    }

    public function sub_category_list(){

      $data['get_subcategory']=$this->Modlogin->getsubcategory();
      
      $data['get_category']=$this->Modlogin->get_category();  

      $this->load->view('backend/Header');

      $this->load->view('backend/Subcategorylist',$data);

      $this->load->view('backend/Footer');

    }

    public function send_category(){

      $data['get_category']=$this->Modlogin->get_category();

      foreach ($data['get_category'] as $key) {

          print_r('<option value="'.$key->id.'">'.$key->name.'</option>');



       } 

     

    exit();

    }

   public function subcategory_save()  

    {  

      if(isset($_FILES["userfile"]["name"]))  

           {  

            

                $config['upload_path'] = './assets/images/categories/';  

                $config['allowed_types'] = 'jpg|jpeg|png|gif';  

                $this->load->library('upload', $config);  

                if(!$this->upload->do_upload('userfile'))  

                {  

                  echo "if";

                     echo $this->upload->display_errors();  

                }  

                else  

                {  

                  echo "else";

                     $data = $this->upload->data();  

                     $data = array(

                       'featured_image' => $data["file_name"],

                       'name' => $this->input->post('name'),

                       'c_id' => $this->input->post('c_id'),

                        );

                    

                     $category_save = $this->db->insert('services', $data);
                     echo $this->db->last_query();
                       

                }  

           }  

    

    }

    public function get_subcategory()

    {

      if($this->session->userdata('Login')){

         $output = '';

         $data['get_subcategory'] =$this->Modlogin->get_subcategorybyid($this->input->post('subcategory_id'));

         print_r(json_encode($data['get_subcategory'][0]) );

    exit();

           

      }else{

         redirect('admin');

      }

    }

    public function subcategory_update()  

    {  

      if($_FILES['userfile']['name']!="")  

           {  

             

                $config['upload_path'] = './assets/images/categories/';  

                $config['allowed_types'] = 'jpg|jpeg|png|gif';  

                $this->load->library('upload', $config);  

                if(!$this->upload->do_upload('userfile'))  

                {  

                     echo $this->upload->display_errors();  

                }  

                else  

                {  

                     $data = $this->upload->data();  

                     $data = array(

                       'featured_image' => $data["file_name"],

                       'name' => $this->input->post('name'),

                       'c_id' => $this->input->post('c_id'),

                        );



                     $this->db->where('id', $this->input->post('id'));  

                     $category_update = $this->db->update('services', $data);

                       

                }  

           }else{



            $data = array(

                       'featured_image' => $this->input->post('featured_image'),

                       'name' => $this->input->post('name'),

                       'c_id' => $this->input->post('c_id'),

                        );

           

                     $this->db->where('id', $this->input->post('id'));  

                     $category_update = $this->db->update('services', $data);

           }  

    

    }

     public function dlt_subcategory()

    {

      if($this->session->userdata('Login')){

       $this->db->where('id', $this->input->post('subcategory_id'));  

       $update_Manager =  $this->db->delete('services');

     

      }else{

         redirect('admin');

      }

    }

    public function offer(){

      $data['all_venders_list']=$this->Modlogin->allVenderslist();

      $data['get_subcategory']=$this->Modlogin->get_subcategory();

      $data['get_category']=$this->Modlogin->get_category();   

      $data['get_aminity']=$this->Modlogin->get_aminity();  

      $this->load->view('backend/Header');

      $this->load->view('backend/offer',$data);

      $this->load->view('backend/Footer');

    }



    public function offer_save()  

    {  

     if(isset($_POST['submit']) && $_POST['submit']!="")

     {

                     $vendor_id = $this->input->post('vendor_id'); 

                     $this->db->select("*");

                     $this->db->where('id', $vendor_id);

                     $query = $this->db->get('vendor');

                     $q = $query->result();

                     $subCat = $this->input->post('sub_cat_name');

                     $subCat = implode(',', $subCat);

                    // print_r($q);die;

                    // $data = $this->upload->data();  

                     $data = array(

                       'vendor_id' => $this->input->post('vendor_id'),

                       'sub_cat_name' => $subCat,

                       'aminities' => implode(',',$this->input->post('amenities')),

                       'category_id' => $this->input->post('category_id'),

                       'heading' => $this->input->post('heading'),

                       'message' => $this->input->post('message'),

                       'featured_image' => $q[0]->featured_image,

                       'logo_img' => $q[0]->logo_image,

                       //'discount' => $this->input->post('discount'),

                       'add_date' =>date('Y-m-d'),

                        );                   
                    
                     $offer_save = $this->db->insert('offers', $data);

                      $this->session->set_flashdata('offer_save', 'Offer Data Save Successfully');

                      return redirect('Offer');

                }  

           }  

    

    //  public function offer_save()  

    // {  

    //   if(isset($_FILES["userfile"]["name"]))  

    //        {  

                

    //             $config['upload_path'] = './assets/images/vendors/offers/';  

    //             $config['allowed_types'] = 'jpg|jpeg|png|gif';  

    //             $this->load->library('upload', $config);  

    //             if(!$this->upload->do_upload('userfile'))  

    //             {  

                  

    //                  echo $this->upload->display_errors();  

    //             }  

    //             else  

    //             {  

    //                  $vendor_id = $this->input->post('vendor_id'); 

    //                  $this->db->select("*");

    //                  $this->db->where('id', $vendor_id);

    //                  $query = $this->db->get('vendor');

    //                  $q = $query->result();

    //                  $subCat = $this->input->post('sub_cat_name');

    //                  $subCat = implode(',', $subCat);

    //                 // print_r($q);die;

    //                  $data = $this->upload->data();  

    //                  $data = array(

    //                    'featured_image' => $data["file_name"],

    //                    'vendor_id' => $this->input->post('vendor_id'),

    //                    'sub_cat_name' => $subCat,

    //                    'aminities' => implode(',',$this->input->post('amenities')),

    //                    'category_id' => $this->input->post('category_id'),

    //                    'heading' => $this->input->post('heading'),

    //                    'message' => $this->input->post('message'),

    //                    'featured_image' => $q[0]->featured_image,

    //                    'logo_img' => $q[0]->logo_image,



    //                    //'discount' => $this->input->post('discount'),

    //                    'add_date' =>date('Y-m-d'),

    //                     );

                   

    //                  $offer_save = $this->db->insert('offers', $data);

    //                   $this->session->set_flashdata('offer_save', 'Offer Data Save Successfully');

    //                   return redirect('Offer');

    //             }  

    //        }  

    

    // }

    public function offer_list(){

      // echo "string";die;

      $data['get_offer']=$this->Modlogin->get_offer();  

      $this->load->view('backend/Header');

      $this->load->view('backend/Offer_list',$data);

      $this->load->view('backend/Footer');

    }

    public function offer_update(){

      $data['all_venders_list']=$this->Modlogin->allVenderslist();

      $data['get_subcategory']=$this->Modlogin->get_subcategory();

      $data['get_category']=$this->Modlogin->get_category();   

      $data['get_aminity']=$this->Modlogin->get_aminity();  

      $data['get_offerbyid']=$this->Modlogin->get_offerbyid($this->uri->segment(2));  

      $this->load->view('backend/Header');

      $this->load->view('backend/Offer_update',$data);

      $this->load->view('backend/Footer');

    }

     public function offer_dataupdate()  

    {  

      if($_FILES['userfile']['name']!="")  

           {  

             

                $config['upload_path'] = './assets/images/vendors/store_img/';  

                $config['allowed_types'] = 'jpg|jpeg|png|gif';  

                $this->load->library('upload', $config);  

                if(!$this->upload->do_upload('userfile'))  

                {  

                     echo $this->upload->display_errors();  

                }  

                else  

                {  

                     $data = $this->upload->data();  

                      $data = array(

                       'featured_image' => $data["file_name"],

                       'vendor_id' => $this->input->post('vendor_id'),

                       'sub_cat_name' => $this->input->post('sub_cat_name'),

                       'aminities' => implode(',',$this->input->post('amenities')),

                       'category_id' => $this->input->post('category_id'),

                       'heading' => $this->input->post('heading'),

                       'message' => $this->input->post('message'),

                       'discount' => $this->input->post('discount'),

                        );

                     $this->db->where('id', $this->input->post('id'));  

                     $offer_update = $this->db->update('offers', $data);

                     $this->session->set_flashdata('offer_save', 'Offer Data Update Successfully');

                      return redirect('offer-update/'.$this->input->post('id'));

                       

                }  

           }else{



           

                      $data = array(

                       'featured_image' => $this->input->post('image'),

                       'vendor_id' => $this->input->post('vendor_id'),

                       'sub_cat_name' => $this->input->post('sub_cat_name'),

                       'aminities' => implode(',',$this->input->post('amenities')),

                       'category_id' => $this->input->post('category_id'),

                       'heading' => $this->input->post('heading'),

                       'message' => $this->input->post('message'),

                       'discount' => $this->input->post('discount'),

                        );

           

                     $this->db->where('id', $this->input->post('id'));  

                     $offer_update = $this->db->update('offers', $data);

                      $this->session->set_flashdata('offer_save', 'Offer Data Update Successfully');

                      return redirect('offer-update/'.$this->input->post('id'));

           }  

    

    }

    public function offer_delete(){

      $this->db->delete('offers', array('id' =>$this->uri->segment(2)));

      $this->session->set_flashdata('offers', 'Offer Delete Successfully');

      redirect('Offer-list');

    }

    public function profile(){

      $sessiondata = $this->session->userdata('Login');

      $array = json_decode(json_encode($sessiondata), True);

      $data['user_view'] =$this->Modlogin->user_view($array[0]['id']);

     

      $this->load->view('backend/Header');

      $this->load->view('backend/Profile',$data);

      $this->load->view('backend/Footer');

    }

     public function vender_profile(){

      $sessiondata = $this->session->userdata('Login');

      $array = json_decode(json_encode($sessiondata), True);

          $this->db->select("*");

          $this->db->from('vendor_slider');

          $this->db->where('vendor_id', $array[0]['id']);      

          $query = $this->db->get();

          $data1['ven_sliders'] = $query->result(); 

          $data['user_view'] =$this->Modlogin->vender_profile($array[0]['id']);

          $this->db->select("*");

          $this->db->from('branch');

          $this->db->where('vendor_id', $array[0]['id']);      

          $query1 = $this->db->get();

          $data2['vendor_branch'] = $query1->result(); 

          $data = array_merge($data1,$data);

          $data3 = array_merge($data,$data2);



     

      $this->load->view('backend/Header');

      $this->load->view('backend/VenderProfile',$data3);

      $this->load->view('backend/Footer');

    }

    public function profile_update()

       {  

          if($_FILES['userfile']['name']!="")  

           {  

             

                $config['upload_path'] = './assets/images/vendors/store_img/';  

                $config['allowed_types'] = 'jpg|jpeg|png|gif';  

                $this->load->library('upload', $config);  

                if(!$this->upload->do_upload('userfile'))  

                {  

                     echo $this->upload->display_errors();  

                }  

                else  

                {  

                     $data = $this->upload->data();  

                      $data = array(

                       'profile_pic' => $data["file_name"],

                       'name' => $this->input->post('name'),

                       'email' => $this->input->post('email'),

                       'contact' => $this->input->post('contact'),

                       'location' => $this->input->post('location'),

                      

                        );

                     

                     $this->db->where('id', $this->input->post('id'));  

                     $profile_update = $this->db->update('user', $data);

                      $this->session->set_flashdata('profile_save', 'Profile Data Update Successfully');

                      return redirect('profile');

                       

                }  

           }else{

                    $data = array(

                       'profile_pic' => $this->input->post('image'),

                       'name' => $this->input->post('name'),

                       'email' => $this->input->post('email'),

                       'contact' => $this->input->post('contact'),

                       'location' => $this->input->post('location'),

                      );

                     $this->db->where('id', $this->input->post('id'));  

                     $profile_update = $this->db->update('user', $data);

                      $this->session->set_flashdata('profile_save', 'Profile Data Update Successfully');

                      return redirect('profile');

           }  

    }

     public function vender_profile_update()

       {  

          



             // print_r($_FILES);die;

                $config['upload_path'] = './assets/images/slider/';  

                $config['allowed_types'] = 'jpg|jpeg|png|gif';  

                $this->load->library('upload', $config);  

                $files = $_FILES;

                $count = count($_FILES['banners']['name']);

                for($i=0; $i<$count; $i++)

                {

                $_FILES['banners']['name']= $files['banners']['name'][$i];

                $_FILES['banners']['type']= $files['banners']['type'][$i];

                $_FILES['banners']['tmp_name']= $files['banners']['tmp_name'][$i];

                $_FILES['banners']['error']= $files['banners']['error'][$i];

                $_FILES['banners']['size']= $files['banners']['size'][$i];

                //$this->upload->initialize($this->set_upload_options());//function defination below

                $this->upload->do_upload('banners');

                $upload_data = $this->upload->data();

                $name_array[] = $upload_data['file_name'];

                $fileName = $upload_data['file_name'];

                $images[] = $fileName;

                // $fileName = $images;

                     $data = $this->upload->data();  

                      $data = array(

                       'vendor_id' => $this->input->post('id'),

                       'slider_img' => $images[$i],

                      'status' => 1,

                       

                      

                        );

                 $insert = $this->db->insert('vendor_slider',$data);



                }





          if($_FILES['userfile']['name']!="")  

           {  

              // configurations from upload library

   $config['upload_path'] = './assets/images/vendors/store_img/';

   $config['allowed_types'] = 'gif|jpg|png|jpeg';

       $config['max_size'] = '2048000'; // max size in KB

       $config['max_width'] = '2200'; //max resolution width

       $config['max_height'] = '1100';  //max resolution height

       $this->load->library('upload', $config);

       // body of if clause will be executed when image uploading is failed

       if(!$this->upload->do_upload()){

         $errors = array('error' => $this->upload->display_errors());

       // This image is uploaded by deafult if the selected image in not uploaded

        

       }

       else{

         $data = array('upload_data' => $this->upload->data());

       $image = $_FILES['userfile']['name'];  //name must be userfile

      $data = array(

                       'featured_image' => $image,

                       'name' => $this->input->post('name'),

                       'email' => $this->input->post('email'),

                       'contact' => $this->input->post('contact'),

                       'address' => $this->input->post('address'),

                       'description' => $this->input->post('description'),

                       'website' => $this->input->post('website'),

                       'facebook' => $this->input->post('facebook'),

                       'instagram' => $this->input->post('instagram'),

                       'snapchat' => $this->input->post('snapchat'),

                      

                        );
                    
                     
                      
                     $this->db->where('id', $this->input->post('id'));  

                     $profile_update = $this->db->update('vendor', $data);

                      $this->session->set_flashdata('profile_save', 'Profile Data Update Successfully');

                      return redirect('vender-profile');

     }

                
           }

           

           else{

                    $data = array(

                       'featured_image' => $this->input->post('image'),

                       'name' => $this->input->post('name'),

                       'email' => $this->input->post('email'),

                       'contact' => $this->input->post('contact'),

                       'address' => $this->input->post('address'),

                       'description' => $this->input->post('description'),

                       'website' => $this->input->post('website'),

                       'facebook' => $this->input->post('facebook'),

                       'instagram' => $this->input->post('instagram'),

                       'snapchat' => $this->input->post('snapchat'),

                      

                      );
                    
                     $this->db->where('id', $this->input->post('id'));  

                     $profile_update = $this->db->update('vendor', $data);

                      $this->session->set_flashdata('profile_save', 'Profile Data Update Successfully');

                      return redirect('vender-profile');

           }  

           

    }

    public function create_plans()

    {

      if($this->session->userdata('Login')){

           $this->load->view('backend/Header');

           $this->load->view('backend/CreatePlans');

           $this->load->view('backend/Footer');

      }else{

         redirect('admin');

      }

    }

     public function save_plans()  

    {  

    unset($_POST['submit']);

    $plan_save = $this->db->insert('plans',$_POST);

    if($plan_save){

    $this->session->set_flashdata('plan_save', 'Plan Save Successfully');

    return redirect('create-plans');

    }

    }

    public function plan_list()

    {

      if($this->session->userdata('Login')){

           $data['get_plan'] =$this->Modlogin->get_plan();

           $this->load->view('backend/Header');

           $this->load->view('backend/Planlist',$data);

           $this->load->view('backend/Footer');

      }else{

         redirect('admin');

      }

    }

     public function plan_delete(){

      $this->db->delete('plans', array('plan_id' =>$this->uri->segment(2)));

     

      redirect('plan-list');

    }

    public function update_plans()

    {

      if($this->session->userdata('Login')){

           $data['get_plan_detail'] =$this->Modlogin->get_plan_detail($this->uri->segment(2));

           $this->load->view('backend/Header');

           $this->load->view('backend/Planupdate',$data);

           $this->load->view('backend/Footer');

      }else{

         redirect('admin');

      }

    }

    public function plan_update_data()  

    {  

    unset($_POST['submit']);

    $_POST['add_date']=date('Y-m-d');

    $this->db->where('plan_id',$_POST['plan_id']);  

    $plan_update = $this->db->update('plans',$_POST);

    if($plan_update){

    $this->session->set_flashdata('plan_update', 'Plan Update Successfully');

    return redirect('plan-update/'.$_POST['plan_id']);

    }

    }

    public function about_us()

    {

      if($this->session->userdata('Login')){

           $data['get_aboutus'] =$this->Modlogin->get_aboutus('1');

           $this->load->view('backend/Header');

           $this->load->view('backend/Abotus',$data);

           $this->load->view('backend/Footer');

      }else{

         redirect('admin');

      }

    }

    public function aboutus()  

    {  

    unset($_POST['submit']);

    

    $this->db->where('id',$_POST['id']);  

    $plan_update = $this->db->update('about_us',$_POST);

    if($plan_update){

    $this->session->set_flashdata('about_us', 'About us Update Successfully');

    return redirect('about-us');

    }

    }

    public function aboutview()

    {

      if($this->session->userdata('Login')){

           $data['get_aboutus'] =$this->Modlogin->get_aboutus('1');

           $this->load->view('backend/Header');

           $this->load->view('backend/Aboutview',$data);

           $this->load->view('backend/Footer');

      }else{

         redirect('admin');

      }

    }

    public function contact_us()

    {

      if($this->session->userdata('Login')){

           $data['get_contactus'] =$this->Modlogin->get_contactus('1');

           $this->load->view('backend/Header');

           $this->load->view('backend/Contactus',$data);

           $this->load->view('backend/Footer');

      }else{

         redirect('admin');

      }

    }

    public function contactus()  

    {  

    unset($_POST['submit']);

   

    $this->db->where('id',$_POST['id']);  

    $plan_update = $this->db->update('contact_us',$_POST);

    if($plan_update){

    $this->session->set_flashdata('contact_us', 'Contact us Update Successfully');

    return redirect('contact-us');

    }

    }

    public function contactview()

    {

      if($this->session->userdata('Login')){

           $data['get_contactus'] =$this->Modlogin->get_contactus('1');

           $this->load->view('backend/Header');

           $this->load->view('backend/Contactview',$data);

           $this->load->view('backend/Footer');

      }else{

         redirect('admin');

      }

    }

    public function Usermembership()

    {

      if($this->session->userdata('Login')){

           $data['get_user_plan'] =$this->Modlogin->get_user_plan();

           $this->load->view('backend/Header');

           $this->load->view('backend/Usermembership',$data);

           $this->load->view('backend/Footer');

      }else{

         redirect('admin');

      }

    }

    public function Usertransaction()

    {

      if($this->session->userdata('Login')){

           $data['get_user_membership'] =$this->Modlogin->get_user_membership();

           $this->load->view('backend/Header');

           $this->load->view('backend/Usertransaction',$data);

           $this->load->view('backend/Footer');

      }else{

         redirect('admin');

      }

    }

    public function Vendertransaction()

    {

      if($this->session->userdata('Login')){

           $data['get_vender_membership'] =$this->Modlogin->get_vender_membership();

           $this->load->view('backend/Header');

           $this->load->view('backend/Vendertransaction',$data);

           $this->load->view('backend/Footer');

      }else{

         redirect('admin');

      }

    }

     public function Usermembershipupdate()

    {

      if($this->session->userdata('Login')){

           $data['get_userplan'] =$this->Modlogin->get_userplan('1');

           $this->load->view('backend/Header');

           $this->load->view('backend/Usermembershipupdate',$data);

           $this->load->view('backend/Footer');

      }else{

         redirect('admin');

      }

    }

     public function user_plan_update()  

    {  

    unset($_POST['submit']);

    $_POST['add_date']=date('Y-m-d');

    $this->db->where('id','1');  

    $plan_update = $this->db->update('imp_info',$_POST);

    if($plan_update){

    $this->session->set_flashdata('user_plan', 'User Plan Update Successfully');

    return redirect('User-membership-update');

    }

    }

     public function aminity_list()

    {

      if($this->session->userdata('Login')){

           $data['get_aminity'] =$this->Modlogin->get_aminity();

           $this->load->view('backend/Header');

           $this->load->view('backend/Aminitylist',$data);

           $this->load->view('backend/Footer');

      }else{

         redirect('admin');

      }

    }

  public function aminity_save()  

    {  

      if(isset($_FILES["userfile"]["name"]))  

           {  

            

                $config['upload_path'] = './assets/images/categories/';  

                $config['allowed_types'] = 'jpg|jpeg|png|gif';  

                $this->load->library('upload', $config);  

                if(!$this->upload->do_upload('userfile'))  

                {  

                  echo "if";

                     echo $this->upload->display_errors();  

                }  

                else  

                {  

                  echo "else";

                     $data = $this->upload->data();  

                     $data = array(

                       'featured_image' => $data["file_name"],

                       'name' => $this->input->post('name'),

                       'c_id' => $this->input->post('c_id'),

                        );

                   

                     $aminity_save = $this->db->insert('amenities', $data);

                     echo $this->db->last_query();

                }  

           }  

    

    }

     public function get_aminity()

    {

      if($this->session->userdata('Login')){

         $output = '';

         $data['get_aminity_detail'] =$this->Modlogin->get_aminity_detail($this->input->post('subcategory_id'));

         print_r(json_encode($data['get_aminity_detail'][0]) );

    exit();

           

      }else{

         redirect('admin');

      }

    }

    public function aminity_update()  

    {  

      if($_FILES['userfile']['name']!="")  

           {  

             

                $config['upload_path'] = './assets/images/categories/';  

                $config['allowed_types'] = 'jpg|jpeg|png|gif';  

                $this->load->library('upload', $config);  

                if(!$this->upload->do_upload('userfile'))  

                {  

                     echo $this->upload->display_errors();  

                }  

                else  

                {  

                     $data = $this->upload->data();  

                     $data = array(

                       'featured_image' => $data["file_name"],

                       'name' => $this->input->post('name'),

                       'c_id' => $this->input->post('c_id'),

                        );



                     $this->db->where('id', $this->input->post('id'));  

                     $category_update = $this->db->update('amenities', $data);

                     echo $this->db->last_query();

                       

                }  

           }else{



            $data = array(

                       'featured_image' => $this->input->post('featured_image'),

                       'name' => $this->input->post('name'),

                       'c_id' => $this->input->post('c_id'),

                        );

           

                     $this->db->where('id', $this->input->post('id'));  

                     $category_update = $this->db->update('amenities', $data);

                     echo $this->db->last_query();

           }  

    

    }

     public function dlt_aminity()

    {

      if($this->session->userdata('Login')){

       $this->db->where('id', $this->input->post('subcategory_id'));  

       $dlt_aminity =  $this->db->delete('amenities');

     

      }else{

         redirect('admin');

      }

    }

    public function get_city(){

      $data['get_city']=$this->Modlogin->get_city($this->input->post('region_id'));

     

      foreach ($data['get_city'] as $key) {

          print_r('<option value="'.$key->name_en.'">'.$key->name_en.'</option>');



       } 

     

    exit();

    }



     // function to add inventory only for admin



    public function add_inventory()

    {

      if($this->session->userdata('Login')){

        $data['sess'] = $this->session->userdata('Login');

           $data['all_venders_list']=$this->Modlogin->allVenderslist(); 

           $this->load->view('backend/Header');

           $this->load->view('backend/inventory',$data);

           $this->load->view('backend/Footer');

      }else{

         redirect('admin');

      }

      

    }
public function allOrderList()

    {

      
          
           $data['all_order_list']=$this->Modlogin->allOrderlist(); 

           $this->load->view('backend/Header');

           $this->load->view('backend/Alloders',$data);

           $this->load->view('backend/Footer');

      }
public function userOrderList($userid){
         
           $data['user_order_list']=$this->Modlogin->userOrderlist($userid); 
           
           $this->load->view('backend/Header');

           $this->load->view('backend/UserOrders',$data);

           $this->load->view('backend/Footer');
      }
      public function venderOrderList($venderid){
         
           $data['vender_order_list']=$this->Modlogin->venderOrderlist($venderid); 
           
           $this->load->view('backend/Header');

           $this->load->view('backend/VenderOrders',$data);

           $this->load->view('backend/Footer');
      }
    public function getSubcat(){
     $multiple_subcat=$this->Modlogin->multiple_subcat($this->input->post('catID'));
     foreach ($multiple_subcat as $key) {
       print_r('<input type="checkbox" class="form-check-input" value="'.$key->name. '" name="sub_cat_name[]"><label class="form-check-label">'.$key->name.'</label>');
      } 
     
    }
    public function addVender(){
      $this->load->view('backend/Header');

           $this->load->view('backend/addVender');

           $this->load->view('backend/Footer');
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

            


            unset($_POST['submit']);
            $_POST['type']=1;

            $_POST['added_date']=date('Y-m-d');

            $_POST['status']='0';
            print_r($_POST);
            die;
            $insert = $this->db->insert('vendor',$_POST);

            $this->session->set_flashdata('cr_ac', 'Account Create Successfully');

             return redirect('add-vender');        

  }
}
 public function vender_update(){
  $data['vender_view'] =$this->Modlogin->vender_view($this->uri->segment(2));

      $this->load->view('backend/Header');

           $this->load->view('backend/vender_update',$data);

           $this->load->view('backend/Footer');
    }
    public function updateVenders()

    { 

      if($_FILES['files']['name']!="")

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

            


            unset($_POST['submit']);
            $_POST['type']=1;

            $_POST['added_date']=date('Y-m-d');

            $_POST['status']='0';
            print_r($_POST);
            die;
            $this->db->where('id', $_POST['id']);  
            $this->db->update('vendor',$_POST); 
            $this->session->set_flashdata('cr_ac', 'Account Update Successfully');
             return redirect('vender_update/'.$_POST['id']);        

  }
    }

   else{  

   

       $image = $this->input->post('images');

       

    }



    }
    public function vender_delete()

    {

       $this->db->where('id',$this->uri->segment(2));  
       $update_Manager =  $this->db->delete('vendor');
        return redirect('all-venders'); 

    

    }
     public function addUser(){
      $this->load->view('backend/Header');

           $this->load->view('backend/addUser');

           $this->load->view('backend/Footer');
    }
      public function user_save()  

    {  

      // configurations from upload library
   $config['upload_path'] = './upload/image/';
   $config['allowed_types'] = 'gif|jpg|png|jpeg';
   $config['max_size'] = '2048000'; // max size in KB
   //$config['max_width'] = '2200'; //max resolution width
   //$config['max_height'] = '1100';  //max resolution height
   
   // load CI libarary called upload
   $this->load->library('upload', $config);
    
   // body of if clause will be executed when image uploading is failed
   if(!$this->upload->do_upload()){

    $errors = array('error' => $this->upload->display_errors());
    // This image is uploaded by deafult if the selected image in not uploaded
   
      
         
   }
   // body of else clause will be executed when image uploading is succeeded
  else {
    $data = array('upload_data' => $this->upload->data());
    $image = $_FILES['userfile']['name'];  //name must be userfile
   $_POST['profile_pic'] = $image;
   $_POST['type'] = "3";
  unset($_POST['submit']);

  
    $insert = $this->db->insert('user',$_POST);
    $this->session->set_flashdata('cr_ac', 'User Create Successfully');
   redirect('add-user');
}
    

    }
 public function updateUser(){
  $data['user_view'] =$this->Modlogin->user_view($this->uri->segment(2));
      $this->load->view('backend/Header');

           $this->load->view('backend/updateUser',$data);

           $this->load->view('backend/Footer');
    }
    public function user_pdate()  
    { 
if($_FILES['userfile']['name']!="")
   {

    
     // configurations from upload library
    $config['upload_path'] = './upload/image/';
   $config['allowed_types'] = 'gif|jpg|png|jpeg';
   $config['max_size'] = '2048000'; // max size in KB
   $config['max_width'] = '2200'; //max resolution width
   $config['max_height'] = '1100';  //max resolution height
  
   $this->load->library('upload', $config);
   // body of if clause will be executed when image uploading is failed
   if(!$this->upload->do_upload()){
    $errors = array('error' => $this->upload->display_errors());
    // This image is uploaded by deafult if the selected image in not uploaded

   


 
  
          
   }
   else{
    $data = array('upload_data' => $this->upload->data());
    $image = $_FILES['userfile']['name'];  //name must be userfile
    $_POST['profile_pic'] = $image;
   $_POST['type'] = "3";
    unset($_POST['submit']);

    $this->db->where('id', $_POST['id']);  
    $this->db->update('user', $_POST);  
    $this->session->set_flashdata('cr_ac', 'User Update Successfully');
    redirect('update-user/'.$_POST['id']);
  
  
   }


}
   else{  
   
   
    
   unset($_POST['submit']);
 
    $this->db->where('id', $_POST['id']);  
    $this->db->update('user', $_POST);  
    $this->session->set_flashdata('cr_ac', 'User Update Successfully');
    redirect('update-user/'.$_POST['id']);
    }

    }
     public function user_delete()

    {

       $this->db->where('id',$this->uri->segment(2));  
       $update_Manager =  $this->db->delete('user');
        return redirect('all-users'); 

    

    }
    public function vendor_info()

    {
        if (isset($_POST['vender_detail'])) {
      
       if($_FILES['business_proof']['name']!=""){
    $new_image_name = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', 
    $_FILES['business_proof']['name']);
    $config['upload_path'] = './assets/images/vendors/store_img/'; 
    $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
    $config['file_name'] = $new_image_name;
    $config['max_size']  = '0';
    $config['max_width']  = '0';
    $config['max_height']  = '0';
    $config['$min_width'] = '0';
    $config['min_height'] = '0';
    $this->load->library('upload', $config);
    $upload = $this->upload->do_upload('business_proof');
    $title=$this->input->post('title');
    $value=array('business_proof'=>$new_image_name,
    'name'=>$this->input->post('name'),
    'id'=>$this->input->post('id'),
    'city'=>$this->input->post('city'),
    'country'=>$this->input->post('country'),
    'contact'=>$this->input->post('contact'),
  );
   
    $this->db->where('id', $this->uri->segment(4));  
    $this->db->update('vendor',$value); 
        }else{
             $value=array('business_proof'=>$this->input->post('business_proof'),
    'name'=>$this->input->post('name'),
    'id'=>$this->input->post('id'),
    'city'=>$this->input->post('city'),
    'country'=>$this->input->post('country'),
    'contact'=>$this->input->post('contact'),
  );
   
    $this->db->where('id', $this->uri->segment(4));  
    $this->db->update('vendor',$value); 
        }
      }
      $data['store_setup'] =$this->Modlogin->ac_summery($this->uri->segment(4));
      $data['ven_contacts'] =$this->Modlogin->ven_contacts($this->uri->segment(4));
       $this->load->view('backend/Header');

           $this->load->view('backend/vendor_info',$data);

           $this->load->view('backend/Footer');
      

    } 
    public function contat_delete(){
      $value = array('status'=>0);
     $this->db->where('v_contact_id', $this->uri->segment(4));  
    $this->db->update('vender_contact',$value);
    redirect('backend/Login/vendor_info/'.$this->uri->segment(5));

    }
    public function account_management()

    {
      if (isset($_POST['account_setup'])) {
       
        $data=array('approved_status'=>implode(",", $this->input->post('approved_status')),
          'status'=>implode(",", $this->input->post('status')),
          'feature'=>implode(",", $this->input->post('feature')),
          'notification'=>implode(",", $this->input->post('notification')),
      );
        
        $this->db->where('id', $this->uri->segment(4));  
    $this->db->update('vendor',$data);
    echo $this->db->last_query();

      }
      $data['account_management'] =$this->Modlogin->ac_summery($this->uri->segment(4));

       $this->load->view('backend/Header');

           $this->load->view('backend/account_management',$data);

           $this->load->view('backend/Footer');
      

    } 
    public function gift_inventory()

    {
      $data['gift_inventory'] =$this->Modlogin->ac_summery($this->uri->segment(4));

       $this->load->view('backend/Header');

           $this->load->view('backend/gift_inventory',$data);

           $this->load->view('backend/Footer');
      

    } 
    public function store_setup()

    {
      if (isset($_POST['store_detail'])) {
        $data = array('name'=>$this->input->post('store_name'),
          'category_id'=>$this->input->post('category_id'),
          
        'language'=>$this->input->post('language'));
        $this->db->where('id',$this->uri->segment(4));  

           $update_status =  $this->db->update('vendor', $data); 
            $vendor_amenities = array('name'=>$this->input->post('amities'),);
           $this->session->set_flashdata('store_setup', 'store setup Update Successfully');

      }
      if (isset($_POST['gallery'])) {
       if($_FILES['menu_pdf']['name']!=""){
           $new_image_name = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', 
    $_FILES['menu_pdf']['name']);
    $config['upload_path'] = './assets/images/vendors/store_img/'; 
    $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
    $config['file_name'] = $new_image_name;
    $config['max_size']  = '0';
    $config['max_width']  = '0';
    $config['max_height']  = '0';
    $config['$min_width'] = '0';
    $config['min_height'] = '0';
    $this->load->library('upload', $config);
    $upload = $this->upload->do_upload('menu_pdf');
    $title=$this->input->post('title');
    $value=array('menu_pdf'=>$new_image_name);
    $this->db->where('id', $this->uri->segment(4));  
    $this->db->update('vendor',$value); 
        }else{
             $menu_pdf=$this->input->post('menu_pdf');
        }
    if($_FILES['logo']['name']!=""){
           $new_image_name = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', 
    $_FILES['logo']['name']);
    $config['upload_path'] = './assets/images/vendors/store_img/'; 
    $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
    $config['file_name'] = $new_image_name;
    $config['max_size']  = '0';
    $config['max_width']  = '0';
    $config['max_height']  = '0';
    $config['$min_width'] = '0';
    $config['min_height'] = '0';
    $this->load->library('upload', $config);
    $upload = $this->upload->do_upload('logo');
    $title=$this->input->post('title');
    $value=array('logo_image'=>$new_image_name);
    $this->db->where('id', $this->uri->segment(4));  
    $this->db->update('vendor',$value); 
        }else{
             $logo_image=$this->input->post('logo_image');
        }
        if($_FILES['featured_image']['name']!=""){
           $new_image_name = time() . str_replace(str_split(' ()\\/,:*?"<>|'), '', 
    $_FILES['featured_image']['name']);
    $config['upload_path'] = './assets/images/vendors/store_img/'; 
    $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
    $config['file_name'] = $new_image_name;
    $config['max_size']  = '0';
    $config['max_width']  = '0';
    $config['max_height']  = '0';
    $config['$min_width'] = '0';
    $config['min_height'] = '0';
    $this->load->library('upload', $config);
    $upload = $this->upload->do_upload('featured_image');
    $title=$this->input->post('title');
    $value=array('featured_image'=>$new_image_name);
    $this->db->where('id', $this->uri->segment(4));  
    $this->db->update('vendor',$value); 
        }else{
             $featured_image=$this->input->post('featured_image');
        }
        if($_FILES['slider']['name']!=""){
          echo "hello";
        }

      }
      if (isset($_POST['display_info'])) {
        $display_info = array('website' => $this->input->post('website'),
        'email' => $this->input->post('email'),
        'twitter' => $this->input->post('twitter'),
        'facebook' => $this->input->post('facebook'),
        'instagram' => $this->input->post('instagram'),
        'snapchat' => $this->input->post('snapchat'),
        'youtub' => $this->input->post('youtub'),
        'whatsapp' => $this->input->post('whatsapp'),
        'description' => $this->input->post('description'),

         );
        $this->db->where('id', $this->uri->segment(4));  
    $this->db->update('vendor',$display_info); 
      }
      $data['store_setup'] =$this->Modlogin->ac_summery($this->uri->segment(4));
      $data['getsubcategory']=$this->Modlogin->getsubcategory();
      $data['vendorBranches'] =$this->ModVender->vendorBranches($this->uri->segment(4));

      $data['vendorAminity']=$this->ModVender->vendorAminity($this->uri->segment(4));
      $data['vendorslider']=$this->Modlogin->vendorslider($this->uri->segment(4));
       
       $this->load->view('backend/Header');

           $this->load->view('backend/store_setup',$data);

           $this->load->view('backend/Footer');
      

    } 

 }

 ?>


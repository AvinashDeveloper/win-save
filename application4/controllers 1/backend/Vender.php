<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Vender extends CI_Controller {



  public function __construct()

  {

    parent::__construct();

    $this->load->helper(array('url','form'));

    $this->load->model('backend/ModVender');

    $this->load->model('backend/Modlogin');

    $this->load->database(); 

  }

  public function my_offer()

  {

    if($this->session->userdata('Login')){

     $this->load->view('backend/Header');

     $this->load->view('backend/Myoffer');

     $this->load->view('backend/Footer');

   }else{

     redirect('admin');

   }

 }

 public function offer_save()  

 {  

   $sessiondata = $this->session->userdata('Login'); 

   $array = json_decode(json_encode($sessiondata), True);



   $data['ven_offeriscreate']=$this->ModVender->ven_offeriscreate($array[0]['id']);

   $brach_avail = $this->ModVender->check_branch_added($array[0]['id']);

   $count_branch = count($brach_avail);

   if($data['ven_offeriscreate'][0]==""){

    if($count_branch != 0){



        // configurations from upload library

     $config['upload_path'] = './assets/images/vendors/ven_offer/';

     $config['allowed_types'] = 'gif|jpg|png|jpeg';

     $config['max_size'] = '2048000'; // max size in KB

     $config['max_width'] = '2200'; //max resolution width

     $config['max_height'] = '1100';  //max resolution height

     // load CI libarary called upload

     $this->load->library('upload', $config);

     // body of if clause will be executed when image uploading is failed

     if(!$this->upload->do_upload()){

      echo "hello";

      $errors = array('error' => $this->upload->display_errors());

      // This image is uploaded by deafult if the selected image in not uploaded

    }

     // body of else clause will be executed when image uploading is succeeded

    else {

      $data = array('upload_data' => $this->upload->data());

      $image = $_FILES['userfile']['name'];  //name must be userfile

      $this->ModVender->offer_save($image);





      //redirect('Login/Sliderview');



    }

  }

  else{

    $this->session->set_flashdata('save_offer', 'Please add atleast one branch on my profile');

    return redirect('My-offer');

  }

}

else{



  $this->session->set_flashdata('save_offer', 'Your Not able to create more then one offer');

  return redirect('My-offer');

}







}

public function offer_list()

{

  if($this->session->userdata('Login')){

   $data['get_offer']=$this->ModVender->get_offer(); 

   $this->load->view('backend/Header');

   $this->load->view('backend/Offerlist',$data);

   $this->load->view('backend/Footer');

 }else{

   redirect('admin');

 }

}

public function my_offer_update()

{

  if($this->session->userdata('Login')){

   $data['myoffer_view']=$this->ModVender->myoffer_view($this->uri->segment(2));

   $this->load->view('backend/Header');

   $this->load->view('backend/Myofferupdate',$data);

   $this->load->view('backend/Footer');

 }else{

   redirect('admin');

 }

}

public function update_Myoffer()

{ 

  if($_FILES['userfile']['name']!="")

  {

       // configurations from upload library

   $config['upload_path'] = './assets/images/vendors/ven_offer/';

   $config['allowed_types'] = 'gif|jpg|png|jpeg';

       $config['max_size'] = '2048000'; // max size in KB

       $config['max_width'] = '2200'; //max resolution width

       $config['max_height'] = '1100';  //max resolution height

       $this->load->library('upload', $config);

       // body of if clause will be executed when image uploading is failed

       if(!$this->upload->do_upload()){

         $errors = array('error' => $this->upload->display_errors());

       // This image is uploaded by deafult if the selected image in not uploaded

         $data = array( 'id' => $this->input->post('id'),);

       }

       else{

         $data = array('upload_data' => $this->upload->data());

       $image = $_FILES['userfile']['name'];  //name must be userfile

       $this->ModVender->update_Myoffer($image);

     }

   }

   else{  



     $image = $this->input->post('images');

     $this->ModVender->update_Myoffer($image);

   }



 }

 public function dlt_myoffer()

 {

  if($this->session->userdata('Login')){

   $this->db->where('id',$this->uri->segment(2));  

   $update_Manager =  $this->db->delete('vendor_offers');

   return redirect('offer-list');

 }else{

   redirect('admin');

 }

}

public function my_offer_view()

{



  if($this->session->userdata('Login')){



   $data['myoffer_view'] =$this->ModVender->myoffer_view($this->input->post('offer_id'));

   print_r(json_encode($data['myoffer_view'][0]) );

   exit();



 }else{

   redirect('admin');

 }

}

public function Get_plan()

{

  if($this->session->userdata('Login')){

    $data['get_plan'] =$this->Modlogin->get_plan();

    $this->load->view('backend/Header');

    $this->load->view('backend/Getplan',$data);

    $this->load->view('backend/Footer');

  }else{

   redirect('admin');

 }

}

public function myplan_detail()

{

  if($this->session->userdata('Login')){



   $data['plan_detail'] =$this->ModVender->plan_detail($this->input->post('plan_type'));

   print_r(json_encode($data['plan_detail'][0]));

   exit();



 }else{

   redirect('admin');

 }

}

public function provide_plan()

{

  if($this->session->userdata('Login')){

   unset($_POST['submit']);

   print_r($_POST);



 }else{

   redirect('admin');

 }

}

public function offerredeem()

{

  if($this->session->userdata('Login')){

   $this->load->view('backend/Header');

   $this->load->view('backend/Offerredeem');

   $this->load->view('backend/Footer');

 }else{

   redirect('admin');

 }

}

public function checkRedeem()

{

  if($this->session->userdata('Login')){

    $data['check_redeem'] =$this->ModVender->check_redeem($this->input->post('generated_code'));

    $dateTimestamp2 = strtotime($data['check_redeem'][0]['valid_date']);

    $dateTimestamp1 = strtotime(date('Y-m-d'));

    $diff= $dateTimestamp1-$dateTimestamp2;

    if ($diff<=0){

           //echo "in";

      if ($data['check_redeem'][0]['stoke']>0) {

             // echo "stock available";

        if ($data['check_redeem'][0]['limit_per_user']>$data['check_redeem'][0]['count_used']) {

               // echo "success";

         $this->load->view('backend/Header');

         $this->load->view('backend/OfferredeemCheck',$data);

         $this->load->view('backend/Footer');

       }else{

                //echo "already used user this offer";

       }

     }else{

      echo "outof stock";

    }



  }else{

    echo "Offer Expire";

  }





}else{

 redirect('admin');

}

}

public function confirm_order()

{

  if($this->session->userdata('Login')){

   if (isset($_POST['cash'])) {

     $data = array(

       'stoke' => $this->input->post('stoke')-1,

       'used'=>$this->input->post('used')+1,

       );

     $this->db->where('id', $this->input->post('offer_id'));  

     $update_Manager =  $this->db->update('vendor_offers', $data);

     $data2 = array(

       'saving' => $this->input->post('offer_amount')+$this->input->post('saving'),

       'points' => $this->input->post('point')+$this->input->post('points'),

       'count_used' => $this->input->post('count_used')+1,





       );



     $this->db->where('id', $this->input->post('offer_id'));  

     $update_Manager =  $this->db->update('user_offer_history', $data2);

     $this->session->set_flashdata('confirm_order', 'Order Confirm Successfully');

     redirect('offer-redeem');

   }else{

    $data = array(

     'stoke' => $this->input->post('stoke')-1,

     'used'=>$this->input->post('used')+1,

     );

    $this->db->where('id', $this->input->post('offer_id'));  

    $update_Manager =  $this->db->update('vendor_offers', $data);

    $data['points_sum']=$this->ModVender->points_sum($this->input->post('user_id'));

    if ($data['points_sum'][0]['points']>=$this->input->post('input_points')) {

     $new_points =$this->input->post('pointstext')-$this->input->post('input_points')+$this->input->post('point');

     $data2  = array('points' =>$new_points,

       'saving' => $this->input->post('offer_amount')+$this->input->post('saving'),

       'count_used' => $this->input->post('count_used')+1,

       );

     $this->db->where('id', $this->input->post('offer_id'));  

     $update_Manager =  $this->db->update('user_offer_history', $data2);

     $this->session->set_flashdata('confirm_order', 'Order Confirm Successfully');

     redirect('offer-redeem');



   }else{

    echo "no suficiant points";

  }

}

}else{

 redirect('admin');

}

}

public function myRedeem()

{

  if($this->session->userdata('Login')){

    $sessiondata = $this->session->userdata('Login'); 

    $array = json_decode(json_encode($sessiondata), True);

    $data['my_redeem'] =$this->ModVender->my_redeem($array[0]['id']);



    $this->load->view('backend/Header');

    $this->load->view('backend/Myredeem',$data);

    $this->load->view('backend/Footer');

  }else{

   redirect('admin');

 }

}

public function classified_list()

{

  if($this->session->userdata('Login')){

    $data['classified_list'] =$this->ModVender->classified_list();

    $this->load->view('backend/Header');

    $this->load->view('backend/Classifiedlist',$data);

    $this->load->view('backend/Footer');

  }else{

   redirect('admin');

 }

}

public function classified_create()

{

  if($this->session->userdata('Login')){

    $data['all_venders_list']=$this->Modlogin->allVenderslist(); 

    $data['get_category']=$this->Modlogin->get_category(); 

    $data['get_region']=$this->Modlogin->get_region(); 

    $this->load->view('backend/Header');

    $this->load->view('backend/Classifiedcreate',$data);

    $this->load->view('backend/Footer');

  }else{

   redirect('admin');

 }

}

public function cls_offer_save()  

{  

  if(isset($_FILES["userfile"]["name"]))  

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

       'image' => $data["file_name"],

       'vendor_id' => $this->input->post('vendor_id'),

       'category_name' => $this->input->post('category_name'),

       'caption' => $this->input->post('caption'),

       'section' => $this->input->post('section'),

       'duration' => $this->input->post('duration'),

       'region' => $this->input->post('region'),

       'link' => $this->input->post('link'),

       'added_date'=>date('Y-m-d'),

       );



     $offer_save = $this->db->insert('classified', $data);

     $this->session->set_flashdata('offer_save', ' Classified Offer Data Save Successfully');

     return redirect('Classified-offer-create');

   }  

 }  



}

public function cls_offer_delete(){

  $this->db->delete('classified', array('id' =>$this->uri->segment(2)));

  $this->session->set_flashdata('offers', 'Classified Offer Delete Successfully');

  redirect('Classified-list');

}

public function cls_offer_update()

{

  if($this->session->userdata('Login')){

   $data['get_cls']=$this->ModVender->get_cls($this->uri->segment(2)); 

   $data['get_category']=$this->Modlogin->get_category(); 

   $data['get_region']=$this->Modlogin->get_region(); 

   $this->load->view('backend/Header');

   $this->load->view('backend/classifiedupdate',$data);

   $this->load->view('backend/Footer');

 }else{

   redirect('admin');

 }

}

public function cls_offer_updatedata()

{ 

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

         $data = array( 'id' => $this->input->post('id'),);

       }

       else{

         $data = array('upload_data' => $this->upload->data());

       $image = $_FILES['userfile']['name'];  //name must be userfile

       

       $data = array(

         'image' => $image,

         'vendor_id' => $this->input->post('vendor_id'),

         'category_name' => $this->input->post('category_name'),

         'caption' => $this->input->post('caption'),

         'section' => $this->input->post('section'),

         'duration' => $this->input->post('duration'),

         'region' => $this->input->post('region'),

         'link' => $this->input->post('link'),

         'added_date'=>date('Y-m-d'),

         );



       $this->db->where('id', $this->input->post('id'));  

       $cls_update = $this->db->update('classified', $data);

       $this->session->set_flashdata('cls_update', 'Classified Offer Update Successfully');

       redirect('classified-update/'.$this->input->post('id'));

     }

   }

   else{  



     $image = $this->input->post('images');

     $data = array(

       'image' => $image,

       'vendor_id' => $this->input->post('vendor_id'),

       'category_name' => $this->input->post('category_name'),

       'caption' => $this->input->post('caption'),

       'section' => $this->input->post('section'),

       'duration' => $this->input->post('duration'),

       'region' => $this->input->post('region'),

       'link' => $this->input->post('link'),

       );



     $this->db->where('id', $this->input->post('id'));  

     $cls_update = $this->db->update('classified', $data);

     $this->session->set_flashdata('cls_update', 'Classified Offer Update Successfully');

     redirect('classified-update/'.$this->input->post('id'));



   }



 }

 public function limited_list()

 {

  if($this->session->userdata('Login')){

    $data['limited_list'] =$this->ModVender->limited_list();

    $this->load->view('backend/Header');

    $this->load->view('backend/Limitedlist',$data);

    $this->load->view('backend/Footer');

  }else{

   redirect('admin');

 }

}

public function limited_create()

{

  if($this->session->userdata('Login')){

    $data['all_venders_list']=$this->Modlogin->allVenderslist(); 

    $data['get_category']=$this->Modlogin->get_category(); 

    $data['get_region']=$this->Modlogin->get_region(); 

    $this->load->view('backend/Header');

    $this->load->view('backend/Limitedcreate',$data);

    $this->load->view('backend/Footer');

  }else{

   redirect('admin');

 }

}

public function lmtd_offer_save()

{

  $filesCount = count($_FILES['files']['name']);

  for($i = 0; $i < $filesCount; $i++){

    $_FILES['file']['name']     = $_FILES['files']['name'][$i];

    $_FILES['file']['type']     = $_FILES['files']['type'][$i];

    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];

    $_FILES['file']['error']     = $_FILES['files']['error'][$i];

    $_FILES['file']['size']     = $_FILES['files']['size'][$i];



                // File upload configuration

    $uploadPath = './assets/images/limited/';

    $config['upload_path'] = $uploadPath;

    $config['allowed_types'] = '*';



                // Load and initialize upload library

    $this->load->library('upload', $config);

    $this->upload->initialize($config);



                // Upload file to server

    if($this->upload->do_upload('file')){

                    // Uploaded file data



     $data = $this->upload->data();  

     $uploadData[$i]=    $data["file_name"];



   }

 }

 unset($_POST['submit']);

 $_POST['image']=$uploadData[0];

 $_POST['pdf']=$uploadData[1];

 $_POST['added_date']=date('Y-m-d');

 $_POST['status']="1";

 $insert = $this->db->insert('limited_offer',$_POST);

 $this->session->set_flashdata('lmtd_offer_save', 'Limited offer Save Successfully');

 return redirect('Limited-offer-create');





}

public function limited_offer_update()

{

  if($this->session->userdata('Login')){

   $data['get_limited']=$this->ModVender->get_limited($this->uri->segment(2));

   $data['get_category']=$this->Modlogin->get_category(); 

   $data['get_region']=$this->Modlogin->get_region();  

   $this->load->view('backend/Header');

   $this->load->view('backend/Limitedupdate',$data);

   $this->load->view('backend/Footer');

 }else{

   redirect('admin');

 }

}

public function limited_offer_updatedata()  

{  

 $files = $_FILES;

 if(!empty($files['files']['name'][0])){



   $filesCount = count($_FILES['files']['name']);

   for($i = 0; $i < $filesCount; $i++){

    $_FILES['file']['name']     = $_FILES['files']['name'][$i];

    $_FILES['file']['type']     = $_FILES['files']['type'][$i];

    $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];

    $_FILES['file']['error']     = $_FILES['files']['error'][$i];

    $_FILES['file']['size']     = $_FILES['files']['size'][$i];



                // File upload configuration

    $uploadPath = './assets/images/limited/';

    $config['upload_path'] = $uploadPath;

    $config['allowed_types'] = '*';



                // Load and initialize upload library

    $this->load->library('upload', $config);

    $this->upload->initialize($config);



                // Upload file to server

    if($this->upload->do_upload('file')){

                    // Uploaded file data



     $data = $this->upload->data();  

     $uploadData[$i]=    $data["file_name"];



   }

 }

 unset($_POST['submit']);

 unset($_POST['images']);

 unset($_POST['pdfs']);

 $_POST['image']=$uploadData[0];

 $_POST['pdf']=$uploadData[1];

 $_POST['added_date']=date('Y-m-d');

 $_POST['status']="1";

 $this->db->where('id', $this->input->post('id'));  

 $insert = $this->db->update('limited_offer',$_POST);

 $this->session->set_flashdata('lmtd_offer_save', 'Limited offer Update Successfully');

 return redirect('Limited-update/'.$this->input->post('id'));

}else{

  $data = array('vendor_id' =>$this->input->post('vendor_id'),

   'shop_name' =>$this->input->post('shop_name'),

   'category_name' =>$this->input->post('category_name'),

   'section' =>$this->input->post('section'),

   'region' =>$this->input->post('region'),

   'valid_date' =>$this->input->post('valid_date'),

   'pdf' =>$this->input->post('pdfs'),

   'image' =>$this->input->post('images'),

   'image' =>$this->input->post('images'),

   'status'=>1

   );



  $this->db->where('id', $this->input->post('id'));  

  $insert = $this->db->update('limited_offer',$data);

  $this->session->set_flashdata('lmtd_offer_save', 'Limited offer Update Successfully');

  return redirect('Limited-update/'.$this->input->post('id'));

}



}

public function limited_offer_delete(){

  $this->db->delete('limited_offer', array('id' =>$this->uri->segment(2)));

  $this->session->set_flashdata('offers', 'Limited Offer Delete Successfully');

  redirect('Limited-offer-list');

}



    // function to save-inventory inventory only for admin

public function inventory_list(){

$data['list'] = $this->ModVender->inventory_list();
  $this->load->view('backend/Header');

  $this->load->view('backend/InventoryList',$data);

  $this->load->view('backend/Footer');

}



public function save_inventory()

{

  if($_FILES['gift_image']['name']!="")  

  {  



    $config['upload_path'] = './assets/images/vendors/ven_offer/';  

    $config['allowed_types'] = 'jpg|jpeg|png|gif';  

    $this->load->library('upload', $config);  

    if(!$this->upload->do_upload('gift_image'))  

    {  

     echo $this->upload->display_errors();  

   }  

   else{

     $data = $this->upload->data();
     $d = $this->ModVender->get_points();
     $a =$d[0]['points']*$this->input->post('req_point');
     $data = array(



       'shop_name' => $this->input->post('Shop_name'),

       'gift_name' => $this->input->post('gift_name'),

       'img' => $data["file_name"],

       'req_points' => $a,

       'stock' => $this->input->post('stock'),

       'used' => $this->input->post('used_offer'),

       'generated_code' => $this->input->post('gen_code'),

       'random_number' => $this->input->post('random_code'),

       'time_limit' => $this->input->post('time_limit'),

       );

     $inv_save = $this->db->insert('Inventory_gift', $data);

     $this->session->set_flashdata('profile_save', 'Profile Data Update Successfully');

     return redirect('inventory');

   }  

 }



}

public function inventory_delete(){

  $this->db->delete('Inventory_gift', array('id' =>$this->uri->segment(2)));

  $this->session->set_flashdata('offers', 'Inventory Delete Successfully');

  redirect('Inventory-list');

}



public function inventory_update(){

  if($this->session->userdata('Login')){

    
    $data['all_inventory_list'] = $this->ModVender->inventory_byid($this->uri->segment(2)); 

          

    $this->load->view('backend/Header');

    $this->load->view('backend/Inventory_update',$data);

    $this->load->view('backend/Footer');

  }else{

   redirect('admin');

 }

}

public function update_inventory()

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

       // This image is uploaded by deafult if the selected image in not uploaded

       $data = array( 'id' => $this->input->post('id'),);

       }

       else{

       $data = array('upload_data' => $this->upload->data());

       $image = $_FILES['userfile']['name'];  //name must be userfile

       $this->ModVender->update_inventory($image);

      }

    }

   else{  

   

       $image = $this->input->post('images');

       $this->ModVender->update_inventory($image);

    }



    }
public function get_generated_code()

{

  $option_value = $_POST['option'];

  $row = $this->db->get_where('vendor', array('id' => $_POST['option']))->row();

  echo $row->generated_code;





}

public function setting()

{

  if($this->session->userdata('Login')){

   $row['data'] = $this->db->get('points')->row();

   $this->load->view('backend/Header');

   $this->load->view('backend/Setting',$row);

   $this->load->view('backend/Footer');

 }else{

   redirect('admin');

 }





}



public function save_points()

{

 $data = array( 

   'amount' => $this->input->post('amount'),

   'points' => $this->input->post('points'),

   'daily_uses_point' => $this->input->post('daily_uses_point'),

   'first_offer_clam_point' => $this->input->post('first_offer_clam_point'),

   );

 $this->db->where('id', $this->input->post('id'));  

 $points_update = $this->db->update('points', $data);

 return redirect('Setting');

}



      // get subcategory on select of category in offer page

public function get_subcategory()

{

  $option_value = $_POST['option'];

  $row = $this->db->get_where('services', array('c_id' => $_POST['option']))->result();



        // print_r($row);

  foreach ($row as $value) {

    echo '<input type="checkbox" id="subCat" name="sub_cat_name[]" value="'.$value->name.'"/>'.$value->name;

  }

        // echo $row->generated_code;    

}

public function get_amt()

{

  $option_value = $_POST['option'];

  $row = $this->db->get_where('amenities', array('c_id' => $_POST['option']))->result();



        // print_r($row);

  foreach ($row as $value) {

    echo '<input type="checkbox" id="subCat" name="amenities[]" value="'.$value->name.'"/>'.$value->name;

  }

        // echo $row->generated_code;



}

public function get_vendor_img()

{

  $image_value = $_POST['vendor_image'];

  $row = $this->db->get_where('vendor', array('id' => $_POST['vendor_image']))->result();

         // print_r($row);

          //die;

  foreach ($row as $value) {

        // echo $row->generated_code;  

    echo  '<img src="'.base_url("/assets/images/vendors/store_img/".$value->featured_image).'" width="100px" height="100px">';

  }

}



public function level_list(){

  if($this->session->userdata('Login')){



   $data['get_level']=$this->Modlogin->get_level();  

   $this->load->view('backend/Header');

   $this->load->view('backend/level',$data);

   $this->load->view('backend/Footer');

 }else{

   redirect('admin');

 }

}

public function level_save(){



  $data = array(

    'level_name' => $_POST['level_name'],

    'offer_title'      => $_POST['offer_title'],

    'req_points'      => $_POST['req_point'],

    'add_date'      => strtotime(date('Y-m-d')),

    'status'      => 1,

    );

  $branch_save = $this->db->insert('level',$data);



}

public function level_delete(){

 $this->db->where('id', $this->input->post('id'));  

 $dlt_level =  $this->db->delete('level');

}

public function help(){

  if($this->session->userdata('Login')){

   $data['get_help']=$this->Modlogin->get_help(); 

   $this->load->view('backend/Header');

   $this->load->view('backend/help',$data);

   $this->load->view('backend/Footer');

 }else{

   redirect('admin');

 }

}

public function help_save(){



  $data = array(

    'question' => $_POST['qus'],

    'answer' => $_POST['ans'],

    'status'      => 1,

    );

  $branch_save = $this->db->insert('help_que_ans',$data);
  echo $this->db->last_query();
die;


}

public function help_delete(){

 $this->db->where('id', $this->input->post('id'));  

 $dlt_level =  $this->db->delete('help_que_ans');

}



public function rules(){

  if($this->session->userdata('Login')){

   $data['get_rules']=$this->Modlogin->get_rules(); 

   $this->load->view('backend/Header');

   $this->load->view('backend/rules',$data);

   $this->load->view('backend/Footer');

 }else{

   redirect('admin');

 }

}

public function rule_save(){



  $data = array(

    'text' => $_POST['rule_name'],

    'status'      => 1,

    );

  $rule_save = $this->db->insert('rules',$data);



}

public function rule_delete(){

 $this->db->where('id', $this->input->post('id'));  

 $dlt_level =  $this->db->delete('rules');

}



}

?>


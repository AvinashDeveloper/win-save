<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Vendors extends CI_Controller {

     

    public function __construct()

    {

        parent::__construct();

        $this->load->helper(array('url','form'));

        $this->load->model('backend/ModVender');

        $this->load->model('backend/Modlogin');

        $this->load->database(); 

    }

    public function create_branch()

    {



      if($this->session->userdata('Login')){

        $session_data['session'] = $this->session->userdata('Login');

        // print_r($session_data);

           $this->load->view('backend/Header');

           $this->load->view('backend/vendor/creat_branch', $session_data);

           $this->load->view('backend/Footer');

      }else{

         redirect('admin');

      }

    }

    

  public function get_lat_long()

    {

        $address = $_POST['data'];

        $city = $_POST['city'];

        $state = $_POST['state'];

        $array['results']  = $this->get_longitude_latitude($address,$city,$state);

        // print_r($array);

        echo json_encode($array);

             

    }

     

    

  public function get_longitude_latitude($address, $cityname, $statename)

  {

      if ($address <> '')

      {

         $string  = $address . " ".$cityname . " " . $statename;

      }

      else

      {

          $string = $cityname . " " . $statename;

      }



      $string = str_replace(" ", "+", urlencode($string));

      $apiKey = 'AIzaSyDQT7yMU9qlMZhNkboZTKLUHsP_JWVnxcs';

      $details_url = "https://maps.googleapis.com/maps/api/geocode/json?address=".$string."&key=".$apiKey;



      $ch = curl_init();

      curl_setopt($ch, CURLOPT_URL, $details_url);

      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

      $response = json_decode(curl_exec($ch), true);



      if ($response['status'] != 'OK') {

          return null;

      }



      $geometry = $response['results'][0]['geometry'];



      $longitude = $geometry['location']['lat'];

      $latitude = $geometry['location']['lng'];



      $array = array(

          'latitude' => $geometry['location']['lat'],

          'longitude' => $geometry['location']['lng'],

          'location_type' => $geometry['location_type'],

      );



      return $array;

    }

    public function save_branch()

    {

      if(isset($_POST['submit']))

      {

        $data = array(

        "store_hours" => $this->input->post('store_hours'),

        "vendor_id" => $this->input->post('vendor_id'),

        "mobile" => $this->input->post('mobile'),

        "telephone" => $this->input->post('phone_num'),

        "region" => $this->input->post('region'),

        "city" => $this->input->post('city'),

        "district" => $this->input->post('dict'),

        "address" => $this->input->post('address'),

        "other_adress" => $this->input->post('other_add'),

        "latitude" => $this->input->post('lattitude'),

        "longitude" => $this->input->post('logitude'),

        "add_date" => date("Y-m-d h:i:sa"),

        "status" => 1,

      );

        // print_r($data);

        $branch_save = $this->db->insert('branch',$data);

        $this->session->set_flashdata('branch_save', ' New branch Saved Successfully');

                      return redirect('vender-profile');

      }

      

    }

    public function show_branch()

    {

      if($this->session->userdata('Login')){

          $data['session'] = $this->session->userdata('Login');

          $data['get_branches']=$this->ModVender->vendorBranches($this->uri->segment(2));

          $this->load->view('backend/Header');

          $this->load->view('backend/vendor/show_branch', $data);

          $this->load->view('backend/Footer');

        }

    }
    public function dlt_branch()

    {

      if($this->session->userdata('Login')){
          $this->db->delete('branch', array('id' =>$this->uri->segment(2)));

      $this->session->set_flashdata('offers', 'Offer Delete Successfully');

      redirect('vender-profile');

        

        }

    }


     public function update_branch()

    {

      if(isset($_POST['submit']))

      {

        $data = array(

        "store_hours" => $this->input->post('store_hours'),

        "vendor_id" => $this->input->post('vendor_id'),

        "mobile" => $this->input->post('mobile'),

        "telephone" => $this->input->post('phone_num'),

        "region" => $this->input->post('region'),

        "city" => $this->input->post('city'),

        "district" => $this->input->post('dict'),

        "address" => $this->input->post('address'),

        "other_adress" => $this->input->post('other_add'),

        "latitude" => $this->input->post('lattitude'),

        "longitude" => $this->input->post('logitude'),

        "add_date" => date("Y-m-d h:i:sa"),

        "status" => 1,

      );

        // print_r($data);

        $this->db->where('id' , $this->input->post('id'));

        $branch_update = $this->db->update('branch',$data);

        // print_r($branch_update);die;

        $this->session->set_flashdata('branch_update', 'branch updated Successfully');

                      return redirect('vender-profile');

      }

    }

    //get aminities

    public function vender_aminity()

    {

      if($this->session->userdata('Login')){

          $data['session'] = $this->session->userdata('Login');

          // print_r($data['session'][0]->id);die;

          $data['get_aminity']=$this->ModVender->vendorAminity($data['session'][0]->id);

          $this->load->view('backend/Header');

          $this->load->view('backend/vendor/vendor_aminity', $data);

          $this->load->view('backend/Footer');

        }

    }

    public function delete_aminity()

    {

      //echo $aminity_id = $_POST['aminity_id'];die;



      $this->db->where('id',$_POST['aminity_id']);  

      $dlt_aminity =  $this->db->delete('vendor_amenities');

    }

     public function get_all_aminity()

    {

      //echo $aminity_id = $_POST['aminity_id'];die;

      $data =$this->Modlogin->get_aminity();



     

      foreach ($data as  $value) {

      

        // $value =  array_unique($value);

        echo '<label>'.$value->name.'<input type="checkbox" name="amt[]" id="amt" class="form-control" value="'.$value->name.'-'.$value->featured_image.'"></label>';

      }

      

    }

     public function aminity_save()

    {

      //echo $aminity_id = $_POST['aminity_id'];die;

      // $data =$this->Modlogin->get_aminity();

     $data = $this->session->userdata('Login');

     // print_r($_POST);die;

     $ds = $data[0];

     foreach ($_POST['option'] as $key => $value) {

      $value = explode('-', $value);

       $data = array(

      'vendor_id' => $ds->id,

      'name'      => $value[0],

      'featured_image'      => $value[1],

     );

     $branch_save = $this->db->insert('vendor_amenities',$data);

     }



     

      

      

    }

    

     

}
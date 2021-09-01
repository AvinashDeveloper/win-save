 <?php



class Modlogin extends CI_Model{



      public function  checklogin($email,$pass)  

      {  

       $this->db->select('*');

       $query = $this->db->get_where('user', array('email' => $email, 'pass' => $pass));

      echo $this->db->last_query();

       return $query->result();

      }  



      public function allUserslist($data = null){

            $this->db->select('u.*,usp.plan_type,ta.expire_date,ta.status as transaction_status,ta.payment_by,ta.transaction_id,usp.subscription_id as plan_id');
            $this->db->from('transaction_all ta');
            $this->db->join('user u','u.id = ta.user_id','LEFT');
            $this->db->join('user_subscription_plan usp','usp.subscription_id = ta.plan_id','LEFT');
            $this->db->where('ta.paid_by','user');
            $this->db->where('u.type', '3');
            $this->db->group_by('id',"desc");

            if(!empty($data['transaction_id'])){
              $this->db->where('ta.transaction_id',$data['transaction_id']);
            }
            if(!empty($data['user_id'])){
                $this->db->where('u.id',$data['user_id']);
                $this->db->group_by('ta.user_id');
            }

            $query = $this->db->get();
            if($query->num_rows() > 0){
              return $query->result();
            } else{
              return false;
            }
      }



      public function  user_view($user_id)  

      {  

       $this->db->select('*');

       $query = $this->db->get_where('user', array('id' => $user_id));

       return $query->result_array();

      }



       public function  vender_profile($user_id)  

      {  

       $this->db->select('*');

       $query = $this->db->get_where('vendor', array('id' => $user_id));

       return $query->result_array();

      }



      public function allVenderslist(){

        $this->db->select('*');

         $this->db->where('approved_status','1');

        $this->db->group_by('id',"desc");

        $query = $this->db->get('vendor');

        return $query->result();

      }



      public function all_unverifiedvenders_list(){
        $this->db->select('*');
        $this->db->where('approved_status !=','1');
        $this->db->group_by('id',"desc");
        $query = $this->db->get('vendor');
        return $query->result();
      }



      public function vender_view($user_id)  



      {  



       $this->db->select('*');



       $query = $this->db->get_where('vendor', array('id' => $user_id));



       return $query->result_array();



      }



      public function all_manager_list(){



        $this->db->select('*');



         $this->db->where('type=2');



        $this->db->order_by('id',"DESC");



        $query = $this->db->get('user');



        return $query->result();



      }



      public function save_manager($image)

        {

         // assign the data to an array

         $arr1=array();

         $value = count($this->input->post('authority'));

         for ($i=$value; $i <=11 ; $i++) { 

         array_push($arr1,"0");

         }

         $arr2  =$this->input->post('authority');

         $arr3 = array_merge($arr2, $arr1);

         $data = array(

         'name' => $this->input->post('name'),

         'email' => $this->input->post('email'),

         'pass' => $this->input->post('password'),

         'contact' => $this->input->post('contact'),

         'address' => $this->input->post('address'),

         'status' => 'Deactive',

         'profile_pic' => $image,

         'location' => $this->input->post('location'),

         'type' => '2',

         'added_date' => date('Y-m-d H:i:s'),

         'authority'=> implode(",", $arr3)

       );

        $save_manager = $this->db->insert('user', $data);

        $insertId = $this->db->insert_id();

        $at = $this->input->post('authority');

        if(!empty($insertId))

        {   

          foreach ($at as $key => $value) {

            $rc = array(

              'manager_id' => $insertId,

              'authority_id' =>$value,

            );

            $save_manager = $this->db->insert('manager_authority', $rc);

        }

      }

        if ($save_manager) {

        $this->session->set_flashdata('save_manager', 'Manager Save Successfully');

        return redirect('add-Manager');

           }

      }



      public function update_Manager($image)



      {

// print_r($_POST);die;

// $ar = $this->input->post('authority');

// print_r($ar);die;





        $arr1[]="";



         $value = count($this->input->post('authority'));



         for ($i=$value; $i <=11 ; $i++) { 



         array_push($arr1,"0");



         }



         $arr2  =$this->input->post('authority');



         $arr3 = array_merge($arr2, $arr1);

         // print_r($arr3);die;

        $data = array(



         'name' => $this->input->post('name'),



         'email' => $this->input->post('email'),



         'pass' => $this->input->post('password'),



         'contact' => $this->input->post('contact'),



         'address' => $this->input->post('address'),



         'status' => 'Deactive',



         'profile_pic' => $image,



         'location' => $this->input->post('location'),



         'type' => '2',



         'added_date' => date('Y-m-d H:i:s'),



         'id' => $this->input->post('id'),



          'authority'=> implode(",", $arr3)



       );



      



       $this->db->where('id', $data['id']);  



       $update_Manager =  $this->db->update('user', $data); 

       $insertId = $this->db->insert_id();

        $at = $this->input->post('authority');

       



          foreach ($at as $key => $value) {

            $rc = array(

              'manager_id' => $data['id'],

              'authority_id' =>$value,

            );

            $this->db->where('manager_id', $data['id']);  

            $save_manager = $this->db->update('manager_authority', $rc);

        }



       if ($update_Manager) {



          $this->session->set_flashdata('update_manager', 'Manager Update Successfully');



          return redirect('update-Manager/'.$data['id']);



 }



}



       public function slider_ads(){



        $this->db->select('*');



        $this->db->group_by('id',"desc");



        $query = $this->db->get('slider');



        return $query->result();



      }



      public function get_news(){



        $this->db->select('*');



        $this->db->order_by('id',"desc");



        $query = $this->db->get('news');



        return $query->result();



      }



      public function newsdetail($news_id)  



      {  



       $this->db->select('*');



       $query = $this->db->get_where('news', array('id' => $news_id));



       return $query->result_array();



      }



      public function get_category(){



        $this->db->select('*');



      



        $this->db->order_by('id',"DESC");



        $query = $this->db->get('category');



        return $query->result();



      }
         public function getsubcategory(){
         $this->db->select('*');
         $this->db->order_by('id',"DESC");
         $query = $this->db->get('services');
         return $query->result();



      }
      public function vendorslider($id){
         
        $this->db->select('*');
        $query = $this->db->get_where('vendor_slider', array('vendor_id' => $id));
        return $query->result_array();
      }


      public function get_categorybyid($category_id)  {  
          $this->db->select('*');
          $query = $this->db->get_where('category', array('id' => $category_id));
          if(!empty($query->result_array())){
            return $query->result_array();
          } else{
            return false;
          }
      }



      public function get_subcategory(){



        $this->db->select('*');



      



        $this->db->order_by('id',"DESC");



        $query = $this->db->get('services');



        return $query->result_array();



      }



      public function get_subcategorybyid($subcategory_id)  {  
          $this->db->select('*');
          $query = $this->db->get_where('services', array('id' => $subcategory_id));
          if(!empty($query->result())) {
            return $query->result();
          } else{
            return false;
          }
      }



       public function get_aminity(){



        $this->db->select('*');



        $this->db->order_by('id',"desc");



        $query = $this->db->get('amenities');



        return $query->result();



      }



      public function get_offer(){



        $this->db->select('*');



        $this->db->order_by('id',"desc");



        $query = $this->db->get('offers');



        return $query->result();



      }



      public function get_offerbyid($id)  



      {  



       $this->db->select('*');



       $query = $this->db->get_where('offers', array('id' => $id));



       return $query->result_array();



      }



      public function get_plan(){



        $this->db->select('*');



        $this->db->order_by('plan_id',"desc");



        $query = $this->db->get('plans');

//echo $this->db->last_query();

        return $query->result();



      }



       public function get_plan_detail($id)  {  
          $this->db->select('*');
          $query = $this->db->get_where('plans', array('plan_id' => $id));
          if($query->result_array()){
            return $query->result_array();
          } else{
            return false;
          }
      }



      public function get_aboutus($id)  



      {  



       $this->db->select('*');



       $query = $this->db->get_where('about_us', array('id' => $id));



       return $query->result_array();



      }



      public function get_contactus($id)  



      {  



       $this->db->select('*');



       $query = $this->db->get_where('contact_us', array('id' => $id));



       return $query->result_array();



      }



      public function get_user_membership(){
        $this->db->select('*');
        $this->db->order_by('id',"desc");
        $query = $this->db->get('plan_order_detail');
        return $query->result();
      }



      public function get_userplan($plan_id)  



      {  



       $this->db->select('*');



       $query = $this->db->get_where('imp_info', array('id' => $plan_id));



       return $query->result_array();



      }



      public function get_user_plan(){



        $this->db->select('*');



        $this->db->order_by('id',"desc");



        $query = $this->db->get('imp_info');



        return $query->result();



      }



      public function get_vender_membership(){



        $this->db->select('*');



         $this->db->where('type=1');



        $this->db->order_by('id',"desc");



        $query = $this->db->get('plan_order_detail');



        return $query->result();



      }



    



      public function get_aminity_detail($subcategory_id)  



      {  



       $this->db->select('*');



       $query = $this->db->get_where('amenities', array('id' => $subcategory_id));



       return $query->result_array();



      }

      public function get_region(){



        $this->db->select('*');



      



        $this->db->order_by('id',"DESC");



        $query = $this->db->get('region');



        return $query->result();



      }

      public function get_city($region_id)  



      {  



       $this->db->select('*');



       $query = $this->db->get_where('city', array('region_id' => $region_id));

        echo $this->db->last_query();

       return $query->result();



      }



       public function get_level()  



      {  



       $this->db->select('*');



       $this->db->order_by('id',"desc");



        $query = $this->db->get('level');



        return $query->result();



      }

      public function get_rules()  {  
          $this->db->select('*');
          $this->db->order_by('id',"desc");
          $query = $this->db->get('rules');
          return $query->result();
      }

      public function get_help()  

      {  

       $this->db->select('*');

       $this->db->order_by('id',"desc");

       $query = $this->db->get('help_que_ans');

       return $query->result();

      }

      public function allOrderlist(){



        $this->db->select('*');



        //$this->db->where('type=3');



        $this->db->group_by('id',"desc");



        $query = $this->db->get('voucher_code_history');



        return $query->result();



      }
      public function userOrderlist($user_id){



        $this->db->select('*');



        $this->db->where('user_id=',$user_id);



        $this->db->group_by('id',"desc");



        $query = $this->db->get('voucher_code_history');



        return $query->result();



      }
      public function venderOrderlist($vender_id){



        $this->db->select('*');



        $this->db->where('vendor_id=',$vender_id);



        $this->db->group_by('id',"desc");



        $query = $this->db->get('voucher_code_history');



        return $query->result();



      }
       public function multiple_subcat($category_id){



        $this->db->select('*');



        $this->db->where('c_id=',$category_id);



        $this->db->group_by('id',"desc");



        $query = $this->db->get('services');



        return $query->result();



      }

      public function ac_summery($vender_id){
          $this->db->select('*');
          $this->db->where('id',$vender_id);
          $this->db->group_by('id',"desc");
          $query = $this->db->get('vendor');
          return $query->result_array();
      }

       public function ven_contacts($vender_id){



        $this->db->select('*');



        $this->db->where('v_id=',$vender_id);



        $this->db->group_by('v_contact_id',"desc");



        $query = $this->db->get('vender_contact');
       


        return $query->result();



      }




}



?>
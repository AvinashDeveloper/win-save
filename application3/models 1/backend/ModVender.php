 <?php



class ModVender extends CI_Model{



    



     



      public function offer_save($image)



        {



         // assign the data to an array



      



         $data = array(



         'offer_title' => $this->input->post('offer_title'),



         'offer_name' => $this->input->post('offer_name'),



         'offer_detail' => $this->input->post('offer_detail'),



         'valid_date' => $this->input->post('valid_date'),



         'limit_per_user' => $this->input->post('limit_per_user'),



         'status' => '1',



         'offer_img' => $image,



         'stoke' => $this->input->post('stoke'),



         'vendor_id' => $this->input->post('vendor_id'),



         'add_date' => date('Y-m-d H:i:s'),



         'used' => $this->input->post('used'),



          'offer_amount' => $this->input->post('offer_amount'),



       );



   



        $save_offer = $this->db->insert('vendor_offers', $data);



        if ($save_offer) {



        $this->session->set_flashdata('save_offer', 'Offer Create Successfully');



        return redirect('My-offer');



           }



      }



       public function get_offer(){



        $sessiondata = $this->session->userdata('Login'); 



        $array = json_decode(json_encode($sessiondata), True);



       



        $this->db->select('*');



        $this->db->where('vendor_id=',$array[0]['id']);



        $this->db->order_by('id',"desc");



        $query = $this->db->get('vendor_offers');



        return $query->result();



      }



       public function myoffer_view($offer_id)  



      {  



       $this->db->select('*');



       $query = $this->db->get_where('vendor_offers', array('id' => $offer_id));



       return $query->result_array();



      }



      public function update_Myoffer($image)



        {



         // assign the data to an array



         $data = array(



         'offer_title' => $this->input->post('offer_title'),



         'offer_name' => $this->input->post('offer_name'),



         'offer_detail' => $this->input->post('offer_detail'),



         'valid_date' => $this->input->post('valid_date'),



         'id' => $this->input->post('id'),



         'limit_per_user' => $this->input->post('limit_per_user'),



         'status' => '1',



         'offer_img' => $image,



         'stoke' => $this->input->post('stoke'),



         'vendor_id' => $this->input->post('vendor_id'),



         'id' => $this->input->post('id'),



         'add_date' => date('Y-m-d H:i:s'),



         'used' => $this->input->post('used'),



          'offer_amount' => $this->input->post('offer_amount'),



       );



       



        $this->db->where('id', $data['id']);  



       $update_Myoffer =  $this->db->update('vendor_offers', $data); 



        if ($update_Myoffer) {



        $this->session->set_flashdata('update_Myoffer', 'Offer Update Successfully');



        return redirect('My-offer-update/'.$data['id']);



           }



      }



       public function plan_detail($plan_id)  



      {  



       $this->db->select('*');



       $query = $this->db->get_where('plans', array('plan_id' => $plan_id));



       return $query->result_array();



      }



      public function check_redeem($generated_code)  



      {  



       $this->db->select('*');



       $this->db->join('vendor_offers','vendor_offers.id = user_offer_history.offer_id');



       $query = $this->db->get_where('user_offer_history', array('generated_code' => $generated_code));



       return $query->result_array();



      }



      public function points_sum($user_id)  



      {  



       $this->db->select_sum('points');



       $query = $this->db->get_where('user_offer_history', array('user_id' => $user_id));



       



       return $query->result_array();



      }



      public function my_redeem($id)  



      {  



      $this->db->select('*');



       $this->db->join('vendor_offers','vendor_offers.id = user_offer_history.offer_id');



       $query = $this->db->get_where('user_offer_history', array('user_id' => $id));







       return $query->result();



      }



       public function classified_list(){



        $this->db->select('*');



      



        $this->db->order_by('id',"desc");



        $query = $this->db->get('classified');



        return $query->result();



      }



       public function get_cls($id)  



      {  



       $this->db->select('*');



       $query = $this->db->get_where('classified', array('id' => $id));



       return $query->result_array();



      }
      public function check_vendercls_offer($v_id)  



      {  
       $this->db->select('*');



       $query = $this->db->get_where('classified', array('vendor_id' => $v_id));


     // echo $this->db->last_query();
       return $query->result();



      }
      public function check_venderlimited_offer($v_id)  



      {  
       $this->db->select('*');



       $query = $this->db->get_where('limited_offer', array('vendor_id' => $v_id));


     // echo $this->db->last_query();
       return $query->result();



      }



       public function limited_list(){



        $this->db->select('*');



      



        $this->db->order_by('id',"desc");



        $query = $this->db->get('limited_offer');



        return $query->result();



      }



      public function get_limited($id)  



      {  



       $this->db->select('*');



       $query = $this->db->get_where('limited_offer', array('id' => $id));



       return $query->result_array();



      }



      public function ven_offeriscreate($id)  



      {  



       $this->db->select('*');



       $query = $this->db->get_where('vendor_offers', array('vendor_id' => $id,'add_date'=>date('Y-m-d')));



      



       return $query->result_array();



      }

      public function allInventoryList()

      {

        $this->db->select("*");

        $this->db->from('Inventory_gift');

        $this->db->join('vendor', 'vendor.id = Inventory_gift.shop_name');       

        $query = $this->db->get();

        return $query->result();

      }




       public function vendorBranches($vendor_id)

      {

        $this->db->select("*");

        $this->db->from('branch');

        $this->db->where('vendor_id', $vendor_id);       

        $query = $this->db->get();

        return $query->result();

      }

      public function vendorAminity($vendor_id)

      {

        $this->db->select("*");

        $this->db->from('vendor_amenities');

        $this->db->where('vendor_id', $vendor_id);       

        $query = $this->db->get();

        return $query->result();

      }

      public function check_branch_added($vendor_id)

      {

        $this->db->select("*");

        $this->db->from('branch');

        $this->db->where('vendor_id', $vendor_id);       

        $query = $this->db->get();

        return $query->result();

      }
      public function get_points()

      {

        $this->db->select("*");

        $this->db->from('points');

        $this->db->where('id=1');       

        $query = $this->db->get();

        return $query->result_array();

      }
      public function inventory_list()

      {

        $this->db->select("*");

        $this->db->from('Inventory_gift');

          

        $query = $this->db->get();

        return $query->result();

      }
      public function inventory_byid($id)

      {

        $this->db->select("*");

        $this->db->from('Inventory_gift');

        $this->db->where('id',$id);       

        $query = $this->db->get();

        return $query->result_array();

      }
   public function update_inventory($image){
     
     unset($_POST['submit']);
     unset($_POST['images']);
     $_POST['img']=$image;
     $this->db->where('id',$_POST['id']);  
     $points_update = $this->db->update('Inventory_gift',$_POST);
     return redirect('Inventory-list');
  }
      

     



      



}



?>
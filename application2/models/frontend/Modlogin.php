 <?php

class Modlogin extends CI_Model{

    

      public function  checklogin($email,$pass)  

      {  

       

       $this->db->select('*');

       $query = $this->db->get_where('vendor', array('email' => $email, 'password' => $pass));

       $this->db->last_query();

       return $query->result();



      }  

      

    

}

?>
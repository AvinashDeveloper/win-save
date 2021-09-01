<?php 
 class SGApi_controller extends CI_Controller

 {
 public function __construct()

   	{
   		parent::__construct();
   		$this->load->model('SGApi_model','A');
   	}

function Invoice(){
     $this->load->view('Invoice/Invoice1.php');
}
 function VersionCheck()
 			    {

 			// 	$this->load->helper('my_helper');
				// $apikey = $this->input->get_request_header('token');
				// $check=cofirmApiKey($apikey);
				// 		if ($check) {	
				// 	        $result = $this->A->whereFileName('imp_info','*');
				// 	        if($result)
				// 	        {
				//                  $array13["status"]=true;
				// 	              $array13["message"]="success";
				// 	              $array13["data"]=$result;

				// 	        }else
				// 	        {
				// 	            $array13["status"]=false;
				// 	            $array13["message"]="Version_name Not Found";

				// 	        } 
				// 	        }else
				// 	        {
				// 	            $array13["status"]=false;
				// 	            $array13["message"]="Authentication Failed";
				// 	        } 				        
				// 	      echo json_encode($array13);

               }
 
 function register_1()
 			 {
 			 	$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				$insert_id="";
				if ($check) {
			      if( $this->input->post("name")  &&  $this->input->post("mobile")  && $this->input->post("email") && $this->input->post("password"))
	   			{ 
     			  $chk=$this->A->wheredetailmain('user','contact',$this->input->post("mobile"));
			  	  $chk1=$this->A->wheredetailmain('user','email',$this->input->post("email"));
			      if(empty($chk))
			      {
			      if(empty($chk1))
			      {
			  	 
  			      $fname_r = $this->input->post("name");
			      $mobile_r=$this->input->post("mobile");
			      $email_r=$this->input->post("email");
			      $password_r= ($this->input->post("password"));

			      $address= ($this->input->post("address"));
			      $location=$this->input->post("location");
			 
			      //    $target_dir="upload/image/";
   					 // $image  = $_POST["profile_pic"];

				     // if (!file_exists($target_dir)) {
       		// 		 mkdir($target_dir,0777,true);
   					 // }
   					 // $image_name = time()."."."JPEG";
				     // $target_dir  = $target_dir.$image_name;
				     // if (file_put_contents($target_dir, base64_decode($image))) 

			         if(function_exists('date_default_timezone_set')) {
			    	  date_default_timezone_set("Asia/Kolkata");
			          }
					  $date1 =  date('Y-m-d H:i:s');
				      $userinfo = array(
				            'name'  => $fname_r,
				             'contact'  => $mobile_r,
				             'email'  => $email_r,
				             'pass'  => $password_r,
				             'profile_pic'   => "",
				             'address'   => $address,
				             'location'     => $location,
				             'type'=> 3,
				             'added_date'=> $date1,
				             'status'  => 1
				              );                   
     					 $insert_id=$this->A->insert('user',$userinfo);
     					 if ($insert_id) {
     					 	$list2  = $this->A->wheredetail("user","id",$insert_id); 
                        	$array1["status"] = true ;
                            $array1["message"] = "success continue" ; 
                            $array1["data"] = $list2 ;



     					 }else{
     					 	$array1["status"] = false ;
                            $array1["message"] = "Not Submitted" ; 
     					 }
                           
                 }else
                 {
                      		$array1["status"] = false ;
                            $array1["message"] = "this email id already register" ; 
                 }
                }else
                 {     	   $array1["status"] = false ;
                           $array1["message"] = "this mobile number already register" ; 
                 }
				}else
				 { 	      $array1["status"]=false;
						  $array1["message"]="Please Enter info...";
			     }	
			     }else
				 {
					       $array1["status"]=false;
				           $array1["message"]="Authentication Failed";
		        } 			    

				 			 echo json_encode($array1);
				 			 if ($insert_id) {
				 			 				// $config = Array(
											//     'protocol' => 'smtp',
											//     'smtp_host' => 'ssl://smtp.googlemail.com',
											//     'smtp_port' => 465,
											//     'smtp_user' => 'xxx',
											//     'smtp_pass' => 'xxx',
											//     'mailtype'  => 'html', 
											//     'charset'   => 'iso-8859-1'
											// );
											// $this->load->library('email', $config);

				 		 	 $this->load->library('email');

							$this->email->from('hotbitdevelopers01@gmail.com', 'Win&Save');
							$this->email->to($email_r);
							// $this->email->cc('another@another-example.com');
							// $this->email->bcc('them@their-example.com');

							$this->email->subject('Registration Completion');
							$this->email->message("     Hi  $fname_r,    Welcome to Win&Save. Your new account comes with access Win&Save Offers,Services and Products. Thank You");
							$this->email->send();

				 			 }
    }


 function get_otp()
			    {
			    $this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
						if ($check) {
    			if ($otp1= $this->input->post("otp1")) 
    			{
			    $chk1=$this->A->wheredetailmain('temp_user','otp',$this->input->post("otp1"));
				if($chk1)
				{	  $array= $this->A->wheredetailtemp("temp_user","otp",$this->input->post("otp1")); 

				  	  $array[0]->id='';
               			  unset($array[0]->otp);
               			  // print_r($array);
               			  // die();
               	  // $mobile = $array[0]->contact_no;		  
			      $insert_id=$this->A->insert('users',$array[0]);
			  	  $list2  = $this->A->wheredetail("users","id",$insert_id); 
                            $array13["status"] = true ;
                            $array13["data"] = $list2 ;
         	   $this->A->delete("temp_user","otp",$this->input->post("otp1"));

         	  //  $msg = "Thank you For Registering";		

		          // $this->load->helper('opt1_helper');
			         //  $mobile_otp=send_otp1('91'.$mobile,$msg);
		       }
		       else{
				          $array13["status"] = false ;
				          $array13["message"]="Wrong OTP";
				}
				}else{
						 $array13["status"] = false ;
          				 $array13["message"]="please Enter OTP";

				}
				}else
				 {
					       $array13["status"]=false;
				           $array13["message"]="Authentication Failed";
		        } 		
						 echo json_encode($array13);
      }

function login()
				{
				$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
						if ($check) {
				 if ($this->input->post("email") &&  $this->input->post("password"))
				{
				$email= $this->input->post("email");
				$password = ($this->input->post("password"));
				
				if( $email  &&  $password)
				 {
		         $result = $this->A->validate($email,$password);
		         if (!empty($result)) {         
		          					 $array12["status"] = true ;
		                           $array12["data"] = $result ; 
		          }else
		          {      
		         					$array12["status"] = false ;
		                           	$array12["message"]="Enter right Email & password";
		          }
		          }else
		          {					$array12["status"] = false ;
		                            $array12["message"]="Enter right Email & password";
		          }
		     	}else
		          {					$array12["status"] = false ;
		                            $array12["message"]="Please Enter info...";
		          }
		          }else
				  {
							        $array12["status"]=false;
				        		    $array12["message"]="Authentication Failed";
		       	  } 	
		                    echo json_encode($array12);
	 }
 function forget()
   			 {

				$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
						if ($check) {
	           	if($this->input->post("email"))
    		 {
    		 $chk=$this->A->wheredetailmain('user','email',$this->input->post("email"));
    		 $chk1=$this->A->wheredetailmain('temp_user','email',$this->input->post("email"));
    		 if ($chk1) {
    		 $this->A->delete("temp_user","email",$this->input->post("email")); 
    		 }
    		 				   

    		 if ($chk)
     		  {
    		  	$email = $this->input->post("email");
    		 	$this->load->helper('string');
				$otp = random_string('numeric',4);
				 $this->load->library('email');

							$this->email->from('hotbitdevelopers01@gmail.com', 'Win&Save');
							$this->email->to($email);
					
							$this->email->subject('Forget Password');
							$this->email->message(" Your OTP is $otp ");
							$this->email->send();

                $array= $this->A->wheredetail("user","email",$email); 
				$array->id='';
		
				$array->otp=$otp;
				$insert_id=$this->A->insert('temp_user',$array);
  						$array11["status"]=true;
	  					$array11["message"]="success do continue";
    		 }else
    		 {
		   			 	$array11["status"]=false;
			  			$array11["message"]="Email no not found";	
    		 }
	    	 }else
	    	 {
		  		    	$array11["status"]=false;
					  	$array11["message"]="Please Enter Email id";	
	    	 }
	    	}else
	    	  {
				        $array11["status"]=false;
	        		    $array11["message"]="Authentication Failed";
	     	  } 
    					echo json_encode($array11);
    }	

function get_otp_forget()
			    {
			    	$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
						if ($check) {
			    	if($otp11= $this->input->post("otp11"))
			    	{
			    	$chk1=$this->A->wheredetailmain('temp_user','otp',$this->input->post("otp11"));
					if($chk1)
					{
			         				$array14["status"]=true;
				  					$array14["message"]="success";
				   $this->A->delete("temp_user","otp",$this->input->post("otp11")); 
					}else{
			         				 $array14["status"]=false;
				  					 $array14["message"]="Wrong OTP";
					}
					}else{
			         				 $array14["status"]=false;
				  					 $array14["message"]="please Enter OTP";
					}
					}else
			    	  {
						     	    $array14["status"]=false;
			        		    	$array14["message"]="Authentication Failed";
			     	  } 
									 echo json_encode($array14);
    }



function password_update()
    	{
    		    $this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
						if ($check) {
         		if($this->input->post("new_password") &&  $this->input->post("email") )
    			{
				$new_password=($this->input->post("new_password"));
				$mobile_fp= $this->input->post("email");
				$array_p=array('pass'=>$new_password);
				$result=$this->A->updatewhere('user','email',$mobile_fp,$array_p);
				if($result)
				{   	$array15["status"]=true;
	  					$array15["message"]="password successfuly changed";
				}else
				{
						$array15["status"]=false;
	  					$array15["message"]="password not changed try different";
				}
    			}else
				{
					$array15["status"]=false;
	  				$array15["message"]="please Enter password";
				}	
				}else
			    {
			      	    $array15["status"]=false;
			  	    	$array15["message"]="Authentication Failed";
		    	  } 		
				echo json_encode($array15);

    	}

function resend_otp()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
						if ($check) {
					if($this->input->post("email"))

			    	{
					$email =$this->input->post("email");
					$this->load->helper('string');
				    $otp = random_string('numeric',4);
				     $this->load->library('email');

							$this->email->from('hotbitdevelopers01@gmail.com', 'Win&Save');
							$this->email->to($email);
					
							$this->email->subject('Forget Password');
							$this->email->message(" Your OTP is $otp ");
							$this->email->send();
							$array_p=array('otp'=>$otp);
				$result=$this->A->updatewhere('temp_user','email',$email,$array_p);
					if($result)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";

					}else
					{		$array13["status"]=false;
		  					$array13["message"]="try again";
					}						
			  	    }else
			  		{	  $array13["status"] = false ;
				          $array13["message"]="Wrong Info...";
			      	}
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}
   

    function getProfileDetail(){
   
         $this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
		
				if ($check) {
					$user_id = $this->input->post("user_id");
			    	$select = '*';
			     	$result = $this->A->wheredetail_all('user',$select,'id',$user_id);
					if($result)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result;
					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}						
			  	   
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
     }

function Profile_update()
    	{
    		    $this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
						if ($check) {
         		if($this->input->post("name") &&  $this->input->post("mobile") )
    			{
				  $user_id = $this->input->post("user_id");
				  $fname_r = $this->input->post("name");
			      $mobile_r=$this->input->post("mobile");
			      $email_r=$this->input->post("email");

			      $address= ($this->input->post("address"));
			      // $location=$this->input->post("location");
			 
			      
			         if(function_exists('date_default_timezone_set')) {
			    	  date_default_timezone_set("Asia/Kolkata");
			          }
					  $date1 =  date('Y-m-d H:i:s');
				      $userinfo = array(
				            'name'  => $fname_r,
				             'contact'  => $mobile_r,
				             'email'  => $email_r,
				             // 'pass'  => $password_r,
				             // 'profile_pic'   => $image_name,
				             'address'   => $address,
				             // 'location'     => $location,
				             // 'type'=> 1,
				             // 'added_date'=> $date1,
				             // 'status'  => 1
				              );                   
				$result=$this->A->updatewhere('user','id',$user_id,$userinfo);
				if($result)
				{   
					$result22 = $this->A->wheredetail_all('user','*','id',$user_id);

					    $array15["status"]=true;
	  					$array15["message"]="Profile successfuly Update";
	  			     	$array15["data"]=$result22;

				}else
				{
						$array15["status"]=false;
	  					$array15["message"]="Profile not Update try different";
				}
    			}else
				{
					$array15["status"]=false;
	  				$array15["message"]="please Enter Info";
				}	
				}else
			    {
			      	    $array15["status"]=false;
			  	    	$array15["message"]="Authentication Failed";
		    	  } 		
				echo json_encode($array15);

    	}

    	
     function Image_upload(){

					 $target_dir="upload/image/";
   					 $image  = $_POST["profile_pic"];
				  $user_id = $this->input->post("user_id");

				     if (!file_exists($target_dir)) {
       				 mkdir($target_dir,0777,true);
   					 }
   					 $image_name = "Pic-".time()."."."JPEG";
				     $target_dir  = $target_dir.$image_name;
				     if (file_put_contents($target_dir, base64_decode($image))) {
   					     						
				                $userinfo = array('profile_pic'   => $image_name );                  
				              	$result=$this->A->updatewhere('user','id',$user_id,$userinfo);
				              	$result22 = $this->A->wheredetail_all('user','*','id',$user_id);
				              	 $array14["status"]=true;
				              $array14["message"]="Image upload success";
				              $array14["data"] = $result22;
				      }else{
				        	  $array14["status"]=false;
				              $array14["message"]="Error Network";
				      }

    				  echo json_encode($array14);
  
		}		
     function getServices(){
        $this->load->helper('translation_helper');
         $this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$catId = $this->input->post('category_id');
				$check=cofirmApiKey($apikey);
				if ($check) {
					$select = '*'; $i=0;
			    		if($this->input->post("current_lang")=="ar"){
				    $data = $this->A->wheredetail_all('services',$select,'c_id',$catId);
				    foreach ($data as $value1){
					 	  $name=translateText($value1->name);					 	  
 								@$data[$i]->name =  $name;
 								$i++;
		             		 }
				   }else{
				   	 // $data = $this->A->getService($apikey, $catId);
				   	 $data = $this->A->wheredetail_all('services',$select,'c_id',$catId);
				   }
				    echo json_encode(array('status' => true, 'data' => $data));
				}else{
				    echo json_encode(array('status' => false, 'data' => 'No Services are Available'));
				}
     }

     function getCategories(){
         $this->load->helper('translation_helper');
         $this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
		
				if ($check) {
					if($this->input->post("limit"))
			    	{	
			    	$select = '*';$i=0;
			    		if($this->input->post("current_lang")=="ar"){
			     		$result = $this->A->whereFileNameSelectedLimitRandom('category',$select,'status',1);
			     		foreach ($result as $value1){
					 	  $name=translateText($value1->name);					 	  
 								@$result[$i]->name =  $name;
 								$i++;
		             		 }
					     }else{
			     		$result = $this->A->whereFileNameSelectedLimitRandom('category',$select,'status',1);
					     }
			    	}else{
			    	$select = '*';$i=0;
			    		if($this->input->post("current_lang")=="ar"){
			     			$result = $this->A->wheredetail_all('category',$select,'status',1);
			     		foreach ($result as $value1){
					 	  $name=translateText($value1->name);					 	  
 								@$result[$i]->name =  $name;
 								$i++;
		             		 }
					     }else{
			     		$result = $this->A->wheredetail_all('category',$select,'status',1);
					     }
			     

			        }
			     	$result11 = $this->A->wheredetail_all('slider',$select,'status',1);

					if($result11)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result;
		  					$array13["data1"]=$result11;
					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}						
			  	   
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
     }

      function getOffers(){
         $this->load->helper('translation_helper');
         $this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
		
				if ($check) {
					
			    	$select = '*';$i=0;
			    	if($this->input->post("current_lang")=="ar"){
			     	$result = $this->A->wheredetail_all('offers',$select,'status',1);
			     	foreach ($result as $value1){
					 	  $sub_cat_name=translateText($value1->sub_cat_name);
					 	   $aminities=translateText($value1->aminities);
					 	    $heading=translateText($value1->heading);
					 	     $message=translateText($value1->message);
 								@$result[$i]->sub_cat_name =  $sub_cat_name;
 								@$result[$i]->aminities =  $aminities;
 								@$result[$i]->heading =  $heading;
 								@$result[$i]->message =  $message;
 								$i++;
		             		 }
			     }else{
			     	$result = $this->A->wheredetail_all('offers',$select,'status',1);
			     }
					if($result)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result;
					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}						
			  	   
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
     }

    function getOffers_selected()
	{           $this->load->helper('translation_helper');
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
						if ($check) {
					if($this->input->post("category_id"))
			    	{
			    	$select = '*'; $i=0;
			    	if($this->input->post("current_lang")=="ar"){
			    	$result=$this->A->wheredetail_all('offers',$select,'category_id',$this->input->post("category_id"));
			    	foreach ($result as $value1){
					 	  $sub_cat_name=translateText($value1->sub_cat_name);
					 	   $aminities=translateText($value1->aminities);
					 	    $heading=translateText($value1->heading);
					 	     $message=translateText($value1->message);
 								@$result[$i]->sub_cat_name =  $sub_cat_name;
 								@$result[$i]->aminities =  $aminities;
 								@$result[$i]->heading =  $heading;
 								@$result[$i]->message =  $message;
 								$i++;
		             		 }
			    	}else{
			     	$result=$this->A->wheredetail_all('offers',$select,'category_id',$this->input->post("category_id"));
			    	}
					if($result)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result;
					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}						
			  	    }else
			  		{	  $array13["status"] = false ;
				          $array13["message"]="Wrong info..";
			      	}
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}
 
//   ********************* offers home page start ************************************************
  function Home_page_AllLimit_Offers(){
     $this->load->helper('translation_helper');
         $this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
		
				if ($check) {					
			    	$select = '*';
			    	$i =0; $j=0; $k=0; $l=0;
					if($this->input->post("current_lang")=="ar"){
					// $result  = $this->A->wherebyFeaturedLimit('vendor_offers',$select,'status','Active');
			     	$result1 = $this->A->wherebyPopularLimit();
			     	$result2=$this->A->wherebyLatestDateLimit();
					$result3=$this->A->wherebyRattingLimit();
					 // foreach ($result as $value1){
					 // 	  $sub_cat_name=translateText($value1->sub_cat_name);
					 // 	   $aminities=translateText($value1->aminities);
					 // 	    $heading=translateText($value1->heading);
					 // 	     $message=translateText($value1->message);
 					// 			@$result[$i]->sub_cat_name =  $sub_cat_name;
 					// 			@$result[$i]->aminities =  $aminities;
 					// 			@$result[$i]->heading =  $heading;
 					// 			@$result[$i]->message =  $message;
 					// 			$i++;
		    //          		 }
		            foreach ($result1 as $value1){
					 	   $offer_title=translateText($value1->offer_title);
					 	     $offer_detail=translateText($value1->offer_detail);
 								@$result2[$j]->offer_title =  $offer_title;
 								@$result2[$j]->offer_detail =  $offer_detail;
 								$j++;
		             		 }
		         foreach ($result2 as $value1){
					 	
					 	    $offer_title=translateText($value1->offer_title);
					 	     $offer_detail=translateText($value1->offer_detail);
 								@$result2[$k]->offer_title =  $offer_title;
 								@$result2[$k]->offer_detail =  $offer_detail;
 								$k++;
		             		 }
		         foreach ($result3 as $value1){
					 	   $offer_title=translateText($value1->offer_title);
					 	     $offer_detail=translateText($value1->offer_detail);
 								@$result2[$i]->offer_title =  $offer_title;
 								@$result2[$i]->offer_detail =  $offer_detail;
 								$l++;
		             		 }
					}else{
					     	$result1 = $this->A->wherebyPopularLimit();
					     	$result2=$this->A->wherebyLatestDateLimit();
							$result3=$this->A->wherebyRattingLimit();
						}
					if($result2)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					// $array13["feature"]=$result;
		  					$array13["pouplar"]=$result1;
		  					$array13["latest"]=$result2;
		  		        	$array13["ratting"]=$result3;

					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}						
			  	   
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
     }


 function getOffers_By_Ratting()
	{			 $this->load->helper('translation_helper');
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {
					
			    	$select = '*';$i =0;
					if($this->input->post("current_lang")=="ar"){
			     	$result=$this->A->wherebyRatting();
			     	 foreach ($result as $value1){
					 	  $offer_title=translateText($value1->offer_title);
					 	     $offer_detail=translateText($value1->offer_detail);
 								@$result[$i]->offer_title =  $offer_title;
 								@$result[$i]->offer_detail =  $offer_detail;
 								$i++;
		             		 }
			     	 }else{
			    	 $result=$this->A->wherebyRatting();
			    	 }
			        
			    	
					if($result)
					{
							$array13["status"]=true;
		  					$array13["message"]="success ";
		  					$array13["data"] = $result;
					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}						
			  	   
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}


	function getOffers_By_Latest()
	{ 			$this->load->helper('translation_helper');
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			  
			    	$select = '*';$i =0;
					if($this->input->post("current_lang")=="ar"){
			     	$result=$this->A->wherebyLatestDate();
			     	 foreach ($result as $value1){
					 	  $offer_title=translateText($value1->offer_title);
					 	     $offer_detail=translateText($value1->offer_detail);
 								@$result[$i]->offer_title =  $offer_title;
 								@$result[$i]->offer_detail =  $offer_detail;
 								$i++;
		             		 }
			     	 }else{
			    	 $result=$this->A->wherebyLatestDate();
			    	 }
			       		    
					if($result)
					{
							$array13["status"]=true;
		  					$array13["message"]="success ";
		  					$array13["data"]=$result;
					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}						
			  	   
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}

	function getOffers_By_Popular()
	{             $this->load->helper('translation_helper');
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    
			    	$select = '*';$i =0;
					if($this->input->post("current_lang")=="ar"){
			     	$result=$this->A->wherebyPopular();
			     	 foreach ($result as $value1){
					 	 $offer_title=translateText($value1->offer_title);
					 	     $offer_detail=translateText($value1->offer_detail);
 								@$result[$i]->offer_title =  $offer_title;
 								@$result[$i]->offer_detail =  $offer_detail;
 								$i++;
		             		 }
			     	 }else{
			    	 $result=$this->A->wherebyPopular();
			    	 }
			        			    			    
					if($result)
					{
							$array13["status"]=1;
		  					$array13["message"]="success ";
		  					$array13["data"]=$result;
					}else
					{		$array13["status"]=2;
		  					$array13["message"]="Nothing";
					}						
			  	   
			      	}else
			        {
			        	    $array13["status"]=2;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}


// function getOffers_By_Featured()
// 	{              $this->load->helper('translation_helper');
// 		 		$this->load->helper('my_helper');
// 				$apikey = $this->input->get_request_header('token');
// 				$check=cofirmApiKey($apikey);
// 				if ($check) {				
			    
// 			   if($this->input->post("limit"))
// 			    	{
// 			    	$select = '*';$i =0;
// 					if($this->input->post("current_lang")=="ar"){
// 			     	$result = $this->A->wherebyFeaturedLimit('offers',$select,'status',1);
// 			     	 foreach ($result as $value1){
// 					 	  $sub_cat_name=translateText($value1->sub_cat_name);
// 					 	   $aminities=translateText($value1->aminities);
// 					 	    $heading=translateText($value1->heading);
// 					 	     $message=translateText($value1->message);
//  								@$result[$i]->sub_cat_name =  $sub_cat_name;
//  								@$result[$i]->aminities =  $aminities;
//  								@$result[$i]->heading =  $heading;
//  								@$result[$i]->message =  $message;
//  								$i++;
// 		             		 }
// 			    	 }else{
// 			    	 		$result = $this->A->wherebyFeaturedLimit('offers',$select,'status',1);
// 			    	 }
// 			    	}else{
// 			    	$select = '*';$i =0;
// 					if($this->input->post("current_lang")=="ar"){
// 			     	$result=$this->A->wherebyFeatured('offers',$select,'status',1);
// 			     	 foreach ($result as $value1){
// 					 	  $sub_cat_name=translateText($value1->sub_cat_name);
// 					 	   $aminities=translateText($value1->aminities);
// 					 	    $heading=translateText($value1->heading);
// 					 	     $message=translateText($value1->message);
//  								@$result[$i]->sub_cat_name =  $sub_cat_name;
//  								@$result[$i]->aminities =  $aminities;
//  								@$result[$i]->heading =  $heading;
//  								@$result[$i]->message =  $message;
//  								$i++;
// 		             		 }
// 			     	 }else{
// 			    	 $result=$this->A->wherebyFeatured('offers',$select,'status',1);
// 			    	 }
// 			        }			    			    			    
// 					if($result)
// 					{
// 							$array13["status"]=1;
// 		  					$array13["message"]="success ";
// 		  					$array13["data"]=$result;
// 					}else
// 					{		$array13["status"]=2;
// 		  					$array13["message"]="Nothing";
// 					}						
			  	   
// 			      	}else
// 			        {
// 			        	    $array13["status"]=2;
// 			  	        	$array13["message"]="Authentication Failed";
// 		    	    } 	

// 						echo json_encode($array13);
// 	}

function VendorInfo()
	{			 $this->load->helper('translation_helper');
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("vendor_id") && $this->input->post("user_id"))
			    	{
			    	 if(function_exists('date_default_timezone_set')) {
			    	  date_default_timezone_set("Asia/Kolkata");     }
					  $date1 =  date('Y-m-d');
			    	$select = '*';
			        $i = 0; $j=0; $k=0;	$l=0;
			    	$vendor_id = $this->input->post("vendor_id");
			    	$user_id = $this->input->post("user_id");
			    	if($this->input->post("current_lang")=="ar"){
			     	$result = $this->A->whereFileNameSelected('vendor',$select,'id',$vendor_id,'status','1');	
			     	$amenities = $this->A->whereFileNameSelected('vendor_amenities',$select,'vendor_id',$vendor_id,'status',1);	
 			        $result1 = $this->A->Offer_chk($date1);

			     	 foreach ($result as $value1){
					 	  $name=translateText($value1->name);
					 	   $address=translateText($value1->address);
					 	    $other_address=translateText($value1->other_address);
					 	     $description=translateText($value1->description);
 								@$result[$j]->name =  $name;
 								@$result[$j]->address =  $address;
 								@$result[$j]->other_address =  $other_address;
 								@$result[$j]->description =  $description;
 								$j++;
		             		 }
		            foreach ($amenities as $value1){
					 	  $name=translateText($value1->name);					 	  
 								@$amenities[$k]->name =  $name; 						
 								$k++;
		             		 }
		            foreach ($result1 as $value1){
					 	  $offer_title=translateText($value1->offer_title);
					 	   $offer_type=translateText($value1->offer_type);
					 	    $offer_detail=translateText($value1->offer_detail);
 								@$result1[$l]->offer_title =  $offer_title;
 								@$result1[$l]->offer_type =  $offer_type;
 								@$result1[$l]->offer_detail =  $offer_detail;
 								$l++;
		             		 }		 
		             	}else{
		    	    $result = $this->A->whereFileNameSelected('vendor',$select,'id',$vendor_id,'status','1');	
			     	$amenities = $this->A->whereFileNameSelected('vendor_amenities',$select,'vendor_id',$vendor_id,'status',1);	
		      	    $result1 = $this->A->Offer_chk($date1);
	             	}
			     	$slider = $this->A->whereFileNameSelected('vendor_slider',$select,'vendor_id',$vendor_id,'status',1);	

			     	$branch = $this->A->whereFileNameSelected('branch',$select,'vendor_id',$vendor_id,'status',1);	
			     	$result_fav = $this->A->where333FileNameSelected('favorite_store',$select,'vendor_id',$vendor_id,'user_id',$user_id,'status',1);	
			     	$result_ratting = $this->A->where333FileNameSelected('vendor_ratting',$select,'vendor_id',$vendor_id,'user_id',$user_id,'status',1);	
			     	$result55 = $this->A->funPlan_Order_join($user_id);

			     	    	
			          foreach ($result1 as $value) {
		             $result2 = $this->A->Offer_chk_user_history('user_offer_history',$select,'offer_type','Normal','user_id',$user_id,'offer_id',$value->id);	
		             		 foreach ($result2 as $value2){
 								@$result1[$i]->count_used_per_user =  $value2->count_used;
		             		 }
		             		 if (empty($result2)) {
		             		 @$result1[$i]->count_used_per_user =  "0";
		             		 }

		             		 if (empty($result55)) {
		             		 @$result1[$i]->purchase =  "0";
		             		 }else{
		             		 	 @$result1[$i]->purchase =  "1";
		             		 }				             	  	
			        $i++;  }			        
					if($result)
					{
						if (!empty($result_fav)) {
			     		 @$result[0]->favorite =  "1";	
			     		}else{
			     			 @$result[0]->favorite =  "0";	
			     		}
			     		if (!empty($result_ratting)) {
			     		 @$result[0]->ratting_sts =  "1";	
			     		}else{
			     			 @$result[0]->ratting_sts =  "0";	
			     		}
							$array13["status"]=1;
		  					$array13["message"]="success ";
		  					$array13["data"]=$result;
		  					$array13["vendor_offers"]=$result1;
		  					$array13["amenities"]=$amenities;
		  					$array13["vendor_slider"]=$slider;
		  					$array13["branch"]=$branch;

					}else
					{		$array13["status"]=2;
		  					$array13["message"]="Nothing";
					}						
			  	   
			      	}else
			        {
			        	    $array13["status"]=2;
			  	        	$array13["message"]="Wrong info...";
		    	    } 	
		    	    }else
			        {
			        	    $array13["status"]=2;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
		             		 
	}
function Favorite_Vendor()
	{			
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("vendor_id") && $this->input->post("user_id"))
			    	{			    	
			    	$select = '*';
			    	$vendor_id = $this->input->post("vendor_id");
			    	$user_id = $this->input->post("user_id");
			     	$result_fav = $this->A->where333FileNameSelected('favorite_store',$select,'vendor_id',$vendor_id,'user_id',$user_id,'status',1);	
						if (empty($result_fav)) {
			     		 $userinfo = array(
				            'user_id'  => $user_id,
							 'vendor_id'  => $vendor_id				           			      
				              );                   
     					 $insert_id=$this->A->insert('favorite_store',$userinfo);
 						$favorite = 1;
			     	}else{
				        $insert_id = $this->A->delete2where('favorite_store','vendor_id',$vendor_id,'user_id',$user_id);
				        $favorite = 0;
			     	}
			      
					if($insert_id)
					{
						
							$array13["status"]=1;
		  					$array13["message"]="success ";
		  					$array13["data"]=$insert_id;
		  					$array13["favorite"]=$favorite;
					}else
					{		$array13["status"]=2;
		  					$array13["message"]="Nothing";
					}						
			  	   
			      	}else
			        {
			        	    $array13["status"]=2;
			  	        	$array13["message"]="Wrong info...";
		    	    } 	
		    	    }else
			        {
			        	    $array13["status"]=2;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}
function Branches_Vendor()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("vendor_id"))
			    	{			    	
			    	$select = '*';
			    	$vendor_id = $this->input->post("vendor_id");
			     	$branch = $this->A->whereFileNameSelected('branch',$select,'vendor_id',$vendor_id,'status',1);	

					if($branch)
					{						
							$array13["status"]=true;
		  					$array13["message"]="success ";
		  					$array13["data"]=$branch;
					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}						
			  	   
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Wrong info...";
		    	    } 	
		    	    }else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}


function Offer_RedeemByUser()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("offer_id") && $this->input->post("user_id"))
			    	{

			    	$offer_id = $this->input->post("offer_id");
			    	$home_offer_id = $this->input->post("home_offer_id");
			    	$user_id = $this->input->post("user_id");
			    	$offer_type = $this->input->post("offer_type");
			        $generated_code = $this->input->post("generated_code");

			       if(function_exists('date_default_timezone_set')) {
			    	  date_default_timezone_set("Asia/Kolkata");   }
					  $date1 =  date('Y-m-d H:i:s');
					  // $generated_code = mt_rand(10000, 99999);
				 $select = 'id';
				 $select11 = '*';
			     $result = $this->A->where333FileNameSelected('user_offer_history',$select,'offer_type',$offer_type,'user_id',$user_id,'offer_id',$offer_id);	
			     	if (empty($result)) {
			     		 $userinfo = array(
				            'user_id'  => $user_id,
							 'offer_type'  => $offer_type,
				             'offer_id'  => $offer_id,
				             'count_used'  => 0,
				             'generated_code'  => $generated_code,
				             'add_date'=> $date1,
				             'date' =>  $date1				      
				              );                   
     					 $insert_id=$this->A->insert('user_offer_history',$userinfo);

			     	}else{
			     		$array_p =  array('generated_code'=>$generated_code,
			     							'code_sts' => 0,
			     							'date' =>  $date1);
				        $insert_id = $this->A->updatewhere_order('user_offer_history','offer_type',$offer_type,'user_id',$user_id,'offer_id',$offer_id,$array_p);
			     	}
			     	 if ($insert_id) {
     					 	 $result11 = $this->A->where333FileNameSelected('user_offer_history',$select11,'offer_type',$offer_type,'user_id',$user_id,'offer_id',$offer_id);	
     					 }
			        
					if($result11)
					{		$array13["status"]=true;
		  					$array13["message"]="success ";
		  					$array13["data"]=$result11;
		  					if ($offer_type == "Normal") {
		  						$result_offer = $this->A->IncreassPopularitybyone('offers','id',$home_offer_id);
		  					}
		  				
					}else
					{		$array13["status"]=false;
		  					$array13["message"]="try Again...";
					}						
			  	   }else
					{		$array13["status"]=false;
		  					$array13["message"]="Wrong info...";
					}	
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}


// ******************* category offer list like near by start  **********************

function Home_page_SelectedLimit_Offers(){
   		  $this->load->helper('translation_helper');
         $this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
		
				if ($check) {					
			    	$select = '*'; $m=0; $n=0; $p=0; $q=0;
			    	$cat_id = $this->input->post("cat_id");
			    	$lat_loc = $this->input->post("lat");
			    	$lng_loc = $this->input->post("lng");
	           if($this->input->post("current_lang")=="ar"){
	           	// $result   = $this->A->wherebyFeaturedLimit('offers',$select,'category_id',$cat_id);
			     	$result1  = $this->A->wherebyPopularLimitcat($cat_id);
			     	$result2  = $this->A->wherebyLatestDateLimitcat($cat_id);
					$result3  = $this->A->wherebyRattingLimitcat($cat_id);
         //       foreach ($result as $value1){
					 	  // $offer_title=translateText($value1->offer_title);
					 	  //    $offer_detail=translateText($value1->offer_detail);
 								// @$result[$m]->offer_title =  $offer_title;
 								// @$result[$m]->offer_detail =  $offer_detail;
 								// $m++;
		       //       		 }
		            foreach ($result1 as $value1){
					 	  $offer_title=translateText($value1->offer_title);
					 	     $offer_detail=translateText($value1->offer_detail);
 								@$result[$n]->offer_title =  $offer_title;
 								@$result[$n]->offer_detail =  $offer_detail;
 								$n++;
		             		 }
		         foreach ($result2 as $value1){
					 	  $offer_title=translateText($value1->offer_title);
					 	     $offer_detail=translateText($value1->offer_detail);
 								@$result[$p]->offer_title =  $offer_title;
 								@$result[$p]->offer_detail =  $offer_detail;
 								$p++;
		             		 }
		         foreach ($result3 as $value1){
					 	  $offer_title=translateText($value1->offer_title);
					 	     $offer_detail=translateText($value1->offer_detail);
 								@$result[$q]->offer_title =  $offer_title;
 								@$result[$q]->offer_detail =  $offer_detail;
 								$q++;
		             		 }
		             $i = 0;
					$j = 1;
					$result11=$this->A->wheredetail_all_dec5('vendor_offers',$select,'category_id',$cat_id);	
							if ($j<5) {									    	    	   
			    	   		foreach ($result11 as $value) {
			    	   			@$result4[$i]->loc = $this->A->whereNearby("SELECT branch.id,branch.branch_name,branch.vendor_id,branch.latitude,branch.longitude, CAST((3959 *   acos(cos(radians('$lat_loc')) * cos(radians(latitude)) * cos(radians(longitude) - radians('$lng_loc')) +  sin(radians('$lat_loc')) * sin(radians(latitude )))) AS DECIMAL(10,1)) AS distance FROM selected_branch_offer LEFT JOIN branch ON branch.id=selected_branch_offer.branch_id WHERE selected_branch_offer.offer_id = '$value->id' HAVING  distance < 50 ORDER BY distance LIMIT 0,1");	
			    	   			 $offer_title=translateText($value->offer_title);
					 	     $offer_detail=translateText($value->offer_detail);		    	   			
			    	   			@$result4[$i]->id = $value->id;
			    	   			@$result4[$i]->offer_title = $value->offer_title;
			    	   			@$result4[$i]->offer_detail = $value->offer_detail;
			    	   			@$result4[$i]->logo_img = $value->logo_img;	
			    	   			@$result4[$i]->featured_image = $value->featured_image;
			    	   			@$result4[$i]->add_date = $value->add_date;
			    	   			@$result4[$i]->ratting = $value->ratting;
			    	   			@$result4[$i]->vendor_id = $value->vendor_id;
			    	   			foreach ($result4 as $value2) {
			    	   				$j++;
			    	   			}
			    	   			$i++;
			    	   		}
			    	   	}		 
		             }else{		 
			     	// $result   = $this->A->wherebyFeaturedLimit('offers',$select,'category_id',$cat_id);
			     	$result1  = $this->A->wherebyPopularLimitcat($cat_id);
			     	$result2  = $this->A->wherebyLatestDateLimitcat($cat_id);
					$result3  = $this->A->wherebyRattingLimitcat($cat_id);
					
					// $result4 = $this->A->whereNearby("SELECT *,(3959 *   acos(cos(radians('$lat_loc')) * cos(radians(lat)) * cos(radians(lng) - radians('$lng_loc')) +  sin(radians('$lat_loc')) * sin(radians(lat )))) AS distance FROM offers WHERE `category_id` ='$cat_id' HAVING distance < 28 ORDER BY distance LIMIT 0, 4 ");
					$i = 0;
					$j = 1;
					$result11=$this->A->wheredetail_all_dec5('vendor_offers',$select,'category_id',$cat_id);	
							if ($j<5) {									    	    	   
			    	   		foreach ($result11 as $value) {
			    	   			@$result4[$i]->loc = $this->A->whereNearby("SELECT branch.id,branch.branch_name,branch.vendor_id,branch.latitude,branch.longitude, CAST((3959 *   acos(cos(radians('$lat_loc')) * cos(radians(latitude)) * cos(radians(longitude) - radians('$lng_loc')) +  sin(radians('$lat_loc')) * sin(radians(latitude )))) AS DECIMAL(10,1)) AS distance FROM selected_branch_offer LEFT JOIN branch ON branch.id=selected_branch_offer.branch_id WHERE selected_branch_offer.offer_id = '$value->id' HAVING  distance < 50 ORDER BY distance LIMIT 0,1");
			    	   			// @$result4[$i]->loc = $this->A->whereNearby("SELECT id,vendor_id,latitude,longitude,(3959 *   acos(cos(radians('$lat_loc')) * cos(radians(latitude)) * cos(radians(longitude) - radians('$lng_loc')) +  sin(radians('$lat_loc')) * sin(radians(latitude )))) AS distance FROM selected_branch_offer WHERE `offer_id` ='$value->id' HAVING  distance < 50 ORDER BY distance LIMIT 0, 1");
			    	   			@$result4[$i]->id = $value->id;
			    	   			@$result4[$i]->offer_title = $value->offer_title;
			    	   			@$result4[$i]->offer_detail = $value->offer_detail;
			    	   			@$result4[$i]->logo_img = $value->logo_img;	
			    	   			@$result4[$i]->featured_image = $value->featured_image;
			    	   			@$result4[$i]->add_date = $value->add_date;
			    	   			@$result4[$i]->ratting = $value->ratting;
			    	   			@$result4[$i]->vendor_id = $value->vendor_id;
			    	   			foreach ($result4 as $value2) {
			    	   				$j++;
			    	   			}
			    	   			$i++;
			    	   		}
			    	   	}
			    	   }
					if($result1)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					// $array13["data"]=$result;
		  					$array13["pouplar"]=$result1;
		  					$array13["latest"]=$result2;
		  		        	$array13["ratting"]=$result3;
		  		        	$array13["nearby"]=$result4;

					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}						
			  	   
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
     }

function getOffers_By_Ratting_cat()
	{			
				 $this->load->helper('translation_helper');
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {
					
			    	$select = '*';
			    	$cat_id = $this->input->post("cat_id");
			    	$i =0;
					if($this->input->post("current_lang")=="ar"){
			     	 $result=$this->A->wherebyRattingcat($cat_id);
			     	 foreach ($result as $value1){
					 	  $offer_title=translateText($value1->offer_title);
					 	     $offer_detail=translateText($value1->offer_detail);
 								@$result[$i]->offer_title =  $offer_title;
 								@$result[$i]->offer_detail =  $offer_detail;
 								$i++;
		             		 }
		             }else{
		           $result=$this->A->wherebyRattingcat($cat_id);

		             }	
			        
			    	
					if($result)
					{
							$array13["status"]=true;
		  					$array13["message"]="success ";
		  					$array13["data"] = $result;
					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}						
			  	   
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}


	function getOffers_By_Latest_cat()
	{			 $this->load->helper('translation_helper');
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			   
			    	$select = '*';
			    	$cat_id = $this->input->post("cat_id");
			    	$i =0;
					if($this->input->post("current_lang")=="ar"){
			     	  $result=$this->A->wherebyLatestDatecat($cat_id);
			     	 foreach ($result as $value1){
					 	  $offer_title=translateText($value1->offer_title);
					 	     $offer_detail=translateText($value1->offer_detail);
 								@$result[$i]->offer_title =  $offer_title;
 								@$result[$i]->offer_detail =  $offer_detail;
 								$i++;
		             		 }
		             }else{
		           $result=$this->A->wherebyLatestDatecat($cat_id);

		             }	
			        	    
					if($result)
					{
							$array13["status"]=true;
		  					$array13["message"]="success ";
		  					$array13["data"]=$result;
					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}						
			  	   
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}

	function getOffers_By_Popular_cat()
	{			 $this->load->helper('translation_helper');
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    
			    	$select = '*';
			    	$cat_id = $this->input->post("cat_id");
			    	$i =0;
					if($this->input->post("current_lang")=="ar"){
			       $result=$this->A->wherebyPopularcat($cat_id);
			     	 foreach ($result as $value1){
					 	  $offer_title=translateText($value1->offer_title);
					 	     $offer_detail=translateText($value1->offer_detail);
 								@$result[$i]->offer_title =  $offer_title;
 								@$result[$i]->offer_detail =  $offer_detail;
 								$i++;
		             		 }
		             }else{
		           $result=$this->A->wherebyPopularcat($cat_id);

		             }	
			       	    		    
					if($result)
					{
							$array13["status"]=true;
		  					$array13["message"]="success ";
		  					$array13["data"]=$result;
					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}						
			  	   
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}


// function getOffers_By_Featured_cat()
// 	{			 $this->load->helper('translation_helper');
// 		 		$this->load->helper('my_helper');
// 				$apikey = $this->input->get_request_header('token');
// 				$check=cofirmApiKey($apikey);
// 				if ($check) {				
// 			    	if($this->input->post("limit"))
// 			    	{
			    	
// 			    	$select = '*';$i =0;
// 					if($this->input->post("current_lang")=="ar"){
// 			     	$result = $this->A->wherebyFeaturedLimit('offers',$select,'status',1);
// 			     	 foreach ($result as $value1){
// 					 	  $sub_cat_name=translateText($value1->sub_cat_name);
// 					 	   $aminities=translateText($value1->aminities);
// 					 	    $heading=translateText($value1->heading);
// 					 	     $message=translateText($value1->message);
//  								@$result[$i]->sub_cat_name =  $sub_cat_name;
//  								@$result[$i]->aminities =  $aminities;
//  								@$result[$i]->heading =  $heading;
//  								@$result[$i]->message =  $message;
//  								$i++;
// 		             		 }
// 		             }else{
// 		             		$result = $this->A->wherebyFeaturedLimit('offers',$select,'status',1);
// 		             }		 
			     
// 			    	}else{
// 			    	$select = '*';
// 			    	$cat_id = $this->input->post("cat_id");
// 			    	$i =0;
// 					if($this->input->post("current_lang")=="ar"){
// 			       $result=$this->A->wherebyFeatured('offers',$select,'category_id',$cat_id);
// 			     	 foreach ($result as $value1){
// 					 	  $sub_cat_name=translateText($value1->sub_cat_name);
// 					 	   $aminities=translateText($value1->aminities);
// 					 	    $heading=translateText($value1->heading);
// 					 	     $message=translateText($value1->message);
//  								@$result[$i]->sub_cat_name =  $sub_cat_name;
//  								@$result[$i]->aminities =  $aminities;
//  								@$result[$i]->heading =  $heading;
//  								@$result[$i]->message =  $message;
//  								$i++;
// 		             		 }
// 		             }else{
// 		           $result=$this->A->wherebyFeatured('offers',$select,'category_id',$cat_id);

// 		             }	
// 			        }		    		    		    
// 					if($result)
// 					{
// 							$array13["status"]=1;
// 		  					$array13["message"]="success ";
// 		  					$array13["data"]=$result;
// 					}else
// 					{		$array13["status"]=2;
// 		  					$array13["message"]="Nothing";
// 					}						
			  	   
// 			      	}else
// 			        {
// 			        	    $array13["status"]=2;
// 			  	        	$array13["message"]="Authentication Failed";
// 		    	    } 	

// 						echo json_encode($array13);
// 	}

 function getVendors_Nearby()
	{			 $this->load->helper('translation_helper');
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				 if ($check) {
					if($this->input->post("lat") && $this->input->post("lng"))
			    	{
			    	$lat_loc = $this->input->post("lat");
			    	$lng_loc = $this->input->post("lng");
			    	$cat_id = $this->input->post("cat_id");
					$select = '*';
			    	$result11 = array();
			    		$i= 0;
			    		if($this->input->post("current_lang")=="ar"){
				
				   $result11=$this->A->wheredetail_all_dec5('vendor_offers',$select,'category_id',$cat_id);
			    	   
			   	foreach ($result11 as $value) {
			 	@$result[$i]->loc = $this->A->whereNearby("SELECT branch.id,branch.branch_name,branch.vendor_id,branch.latitude,branch.longitude, CAST((3959 *   acos(cos(radians('$lat_loc')) * cos(radians(latitude)) * cos(radians(longitude) - radians('$lng_loc')) +  sin(radians('$lat_loc')) * sin(radians(latitude )))) AS DECIMAL(10,1)) AS distance FROM selected_branch_offer LEFT JOIN branch ON branch.id=selected_branch_offer.branch_id WHERE selected_branch_offer.offer_id = '$value->id' HAVING  distance < 50 ORDER BY distance");		    	   		
			    	   			 $offer_title=translateText($value->offer_title);
					 	     $offer_detail=translateText($value->offer_detail);
			    	   			@$result[$i]->id = $value->id;
			    	   			@$result[$i]->offer_title = $offer_title;
			    	   			@$result[$i]->offer_detail = $offer_detail;
			    	   			@$result[$i]->logo_image = $value->logo_image;
			    	   			@$result[$i]->add_date = $value->add_date;
			    	   			@$result[$i]->ratting = $value->ratting;			    	   
			    	   			@$result[$i]->featured_image = $value->featured_image;
			    	   			@$result[$i]->vendor_id = $value->vendor_id;
			    	   			$i++;
			    	   		}
			    	   	}else{
			    	   			$result11=$this->A->wheredetail_all_dec5('vendor_offers',$select,'category_id',$cat_id);
			    	   
			    	   		foreach ($result11 as $value) {
			 	@$result[$i]->loc = $this->A->whereNearby("SELECT branch.id,branch.branch_name,branch.vendor_id,branch.latitude,branch.longitude, CAST((3959 *   acos(cos(radians('$lat_loc')) * cos(radians(latitude)) * cos(radians(longitude) - radians('$lng_loc')) +  sin(radians('$lat_loc')) * sin(radians(latitude )))) AS DECIMAL(10,1)) AS distance FROM selected_branch_offer LEFT JOIN branch ON branch.id=selected_branch_offer.branch_id WHERE selected_branch_offer.offer_id = '$value->id' HAVING  distance < 50 ORDER BY distance");		    	   		
			    	   			
			    	   			@$result[$i]->id = $value->id;
			    	   			@$result[$i]->offer_title = $offer_title;
			    	   			@$result[$i]->offer_detail = $offer_detail;
			    	   			@$result[$i]->logo_image = $value->logo_image;
			    	   			@$result[$i]->add_date = $value->add_date;
			    	   			@$result[$i]->ratting = $value->ratting;			    	   
			    	   			@$result[$i]->featured_image = $value->featured_image;
			    	   			@$result[$i]->vendor_id = $value->vendor_id;

			    	   			$i++;
			    	   		}
			    	   	}
			    	if($result)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result;
					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}						
			  	  }else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}	
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}

function getVendors_OnMap_cat_distance()
	{			 $this->load->helper('translation_helper');
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				 if ($check) {
					if($this->input->post("lat") && $this->input->post("lng"))
			    	{
			    	$lat_loc = $this->input->post("lat");
			    	$lng_loc = $this->input->post("lng");
			    	$cat_id = $this->input->post("cat_id");
					$distance_to = 60;
			    	$distance_from = 0;
			    	$sub_cat = $this->input->post("sub_cat");
			    	$result11 = array();
			    		$i= 0;
			    if($this->input->post("current_lang")=="ar")
			    		{
					if ($sub_cat == "no") {   							 // search only main category
			    	   	$result=$this->A->wherebyAllCat($cat_id);
			    	   
			    	   		foreach ($result as $value) {

			    	   			@$result11[$i]->loc = $this->A->whereNearby("SELECT branch.id,branch.vendor_id,branch.latitude,branch.longitude,(3959 *   acos(cos(radians('$lat_loc')) * cos(radians(latitude)) * cos(radians(longitude) - radians('$lng_loc')) +  sin(radians('$lat_loc')) * sin(radians(latitude )))) AS distance FROM selected_branch_offer LEFT JOIN branch ON branch.id=selected_branch_offer.branch_id WHERE selected_branch_offer.offer_id = '$value->id' HAVING  distance < 50 ORDER BY distance ");
			    	   			 $offer_title=translateText($value->offer_title);
			    	   			@$result11[$i]->offer_title = $offer_title;
			    	   			$i++;
			    	   		}
			    	
			    	}else{
			    	$result=$this->A->whereLikeSubcatName($cat_id,$sub_cat);

			    	foreach ($result as $value) {
			    	   			@$result11[$i]->loc = $this->A->whereNearby("SELECT branch.id,branch.vendor_id,branch.latitude,branch.longitude,(3959 *   acos(cos(radians('$lat_loc')) * cos(radians(latitude)) * cos(radians(longitude) - radians('$lng_loc')) +  sin(radians('$lat_loc')) * sin(radians(latitude )))) AS distance FROM selected_branch_offer LEFT JOIN branch ON branch.id=selected_branch_offer.branch_id WHERE selected_branch_offer.offer_id = '$value->id' HAVING  distance < 50 ORDER BY distance ");
			    	   			@$result11[$i]->offer_title = $offer_title;
			    	   			$i++;
			    	   		}
			    	}
			   	}else{
			    	if ($sub_cat == "no") {   							 // search only main category
			    	   	$result=$this->A->wherebyAllCat($cat_id);
			    	   
			    	   		foreach ($result as $value) {

			    	   			@$result11[$i]->loc = $this->A->whereNearby("SELECT branch.id,branch.vendor_id,branch.latitude,branch.longitude,(3959 *   acos(cos(radians('$lat_loc')) * cos(radians(latitude)) * cos(radians(longitude) - radians('$lng_loc')) +  sin(radians('$lat_loc')) * sin(radians(latitude )))) AS distance FROM selected_branch_offer LEFT JOIN branch ON branch.id=selected_branch_offer.branch_id WHERE selected_branch_offer.offer_id = '$value->id' HAVING  distance < 50 ORDER BY distance ");
			    	   			@$result11[$i]->offer_title = $value->offer_title;
			    	   			$i++;
			    	   		}
			    	   
			    			// $result = $this->A->whereNearby("SELECT *,(3959 *   acos(cos(radians('$lat_loc')) * cos(radians(lat)) * cos(radians(lng) - radians('$lng_loc')) +  sin(radians('$lat_loc')) * sin(radians(lat )))) AS distance FROM offers WHERE `category_id` ='$cat_id' HAVING (distance >='$distance_from' AND distance <= '$distance_to') ORDER BY distance ");
			    	}else{
			    	$result=$this->A->whereLikeSubcatName($cat_id,$sub_cat);

			    			// $result = $this->A->whereNearby("SELECT *,(3959 *   acos(cos(radians('$lat_loc')) * cos(radians(lat)) * cos(radians(lng) - radians('$lng_loc')) +  sin(radians('$lat_loc')) * sin(radians(lat )))) AS distance FROM offers WHERE (`category_id` ='$cat_id' && `sub_cat_name` LIKE '%$sub_cat%') HAVING (distance >='$distance_from' AND distance <= '$distance_to') ORDER BY distance ");
			    	foreach ($result as $value) {
			    	   			@$result11[$i]->loc = $this->A->whereNearby("SELECT branch.id,branch.vendor_id,branch.latitude,branch.longitude,(3959 *   acos(cos(radians('$lat_loc')) * cos(radians(latitude)) * cos(radians(longitude) - radians('$lng_loc')) +  sin(radians('$lat_loc')) * sin(radians(latitude )))) AS distance FROM selected_branch_offer LEFT JOIN branch ON branch.id=selected_branch_offer.branch_id WHERE selected_branch_offer.offer_id = '$value->id' HAVING  distance < 50 ORDER BY distance ");
			    	   			@$result11[$i]->offer_title = $value->offer_title;
			    	   			$i++;
			    	   		}
			    	}}
				         
			    	if($result)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result11;
		  					// $array13["data1"]=$result;
					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}						
			  	  }else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing....";
					}	
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}
	
function getOffers_by_subcat_name()
	{				 $this->load->helper('translation_helper');
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				 if ($check) {
					if($this->input->post("cat_id") && $this->input->post("sub_cat_name"))
			    	{
			    	$sub_cat_name = $this->input->post("sub_cat_name");
			    	$cat_id = $this->input->post("cat_id");
			    	$path = $this->input->post("path");
 					$i=0;
			    	if ($path == "1") {
			    		if ($sub_cat_name == "All") {
			    
			    	$select = '*'; 
			    	 if($this->input->post("current_lang")=="ar"){
			    	 $result = $this->A->wherebyAllCat($cat_id);
			      foreach ($result as $value1){					 	 
					 	    $offer_title=translateText($value1->offer_title);
					 	     $offer_detail=translateText($value1->offer_detail);
 								@$result[$i]->offer_title = $offer_title;
			    	   			@$result[$i]->offer_detail = $offer_detail;
 								$i++;
		             		 }
		             		}else{
		             	 $result = $this->A->wherebyAllCat($cat_id);
		             		}			    
			    
			    		}else{
			    			if($this->input->post("current_lang")=="ar"){
			    	$result = $this->A->whereLikeSubcatName($cat_id,$sub_cat_name);
			      foreach ($result as $value1){
					 	  $offer_title=translateText($value1->offer_title);
					 	     $offer_detail=translateText($value1->offer_detail);
 								@$result[$i]->offer_title = $offer_title;
			    	   			@$result[$i]->offer_detail = $offer_detail;
 								$i++;
		             		 }
		             		}else{
			  		$result = $this->A->whereLikeSubcatName($cat_id,$sub_cat_name);
			  	}
			    		}
			    	}else{
			    		if($this->input->post("current_lang")=="ar"){
			    	$result = $this->A->whereLikeAmenitiesName($cat_id,$sub_cat_name);
			      foreach ($result as $value1){
					 	  $offer_title=translateText($value1->offer_title);
					 	     $offer_detail=translateText($value1->offer_detail);
 								@$result[$i]->offer_title = $offer_title;
			    	   			@$result[$i]->offer_detail = $offer_detail;
 								$i++;
		             		 }
		             		}else{
			   		$result = $this->A->whereLikeAmenitiesName($cat_id,$sub_cat_name);
			   	}
			    	}
			    	
				    if($result)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result;
					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}						
			  	  }else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}	
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}

	function getOffers_by_subcat_name_Distance_Show()
	{            $this->load->helper('translation_helper');
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				 if ($check) {
					if($this->input->post("cat_id"))
			    	{			    	
			    	$cat_id = $this->input->post("cat_id");
			    	$path = $this->input->post("path");
			    	$select = '*';
			    	$result = array();
			    	$i = 0;
			    	 if($this->input->post("current_lang")=="ar"){
					// 1 = main cat distance km show, 2 = sub cat with main distance km show,3 main cat alfabet, 4 sub with main cat alfabet heading
			    	if ($path == "1") {			    	
			    	$lat_loc = $this->input->post("lat");
			    	$lng_loc = $this->input->post("lng");
			    
 						$result1=$this->A->wherebyAllCat($cat_id);
			    	   
			    	   		foreach ($result1 as $value) {
			    	   			@$result[$i]->loc = $this->A->whereNearby("SELECT branch.id,branch.vendor_id,branch.latitude,branch.longitude,CAST((3959 *   acos(cos(radians('$lat_loc')) * cos(radians(latitude)) * cos(radians(longitude) - radians('$lng_loc')) +  sin(radians('$lat_loc')) * sin(radians(latitude )))) AS DECIMAL(10,1)) AS distance FROM selected_branch_offer LEFT JOIN branch ON branch.id=selected_branch_offer.branch_id WHERE selected_branch_offer.offer_id = '$value->id' HAVING distance < 50 ORDER BY distance ");
			      	   		
			    	   			 $offer_title=translateText($value->offer_title);
					 	     $offer_detail=translateText($value->offer_detail);
					 	     	@$result[$i]->id = $value->id;
 								@$result[$i]->offer_title = $offer_title;
			    	   			@$result[$i]->offer_detail = $offer_detail;
			    	   			@$result[$i]->logo_image = $value->logo_image;
			    	   			@$result[$i]->add_date = $value->add_date;
			    	   			@$result[$i]->ratting = $value->ratting;
			    	   			$i++;
			    	   		}
			    	   
			    	}else if ($path == "2"){
			    	$sub_cat_name = $this->input->post("sub_cat_name");
			   		$lat_loc = $this->input->post("lat");
			    	$lng_loc = $this->input->post("lng");
			    
			    	$result1=$this->A->whereLikeSubcatName($cat_id,$sub_cat_name);
			    	foreach ($result1 as $value) {
			    	   			@$result[$i]->loc = $this->A->whereNearby("SELECT branch.id,branch.vendor_id,branch.latitude,branch.longitude,CAST((3959 *   acos(cos(radians('$lat_loc')) * cos(radians(latitude)) * cos(radians(longitude) - radians('$lng_loc')) +  sin(radians('$lat_loc')) * sin(radians(latitude )))) AS DECIMAL(10,1)) AS distance FROM selected_branch_offer LEFT JOIN branch ON branch.id=selected_branch_offer.branch_id WHERE selected_branch_offer.offer_id = '$value->id' HAVING distance < 50 ORDER BY distance ");
			    	   			   $offer_title=translateText($value->offer_title);
					 	     $offer_detail=translateText($value->offer_detail);
					 	     	@$result[$i]->id = $value->id;
 								@$result[$i]->offer_title = $offer_title;
			    	   			@$result[$i]->offer_detail = $offer_detail;
			    	   			@$result[$i]->heading = $heading;
			    	   			@$result[$i]->logo_img = $value->logo_img;
			    	   			@$result[$i]->add_date = $value->add_date;
			    	   			@$result[$i]->ratting = $value->ratting;
			    	   			$i++;
			    	   		}
			    	}else if ($path == "3"){
			   		$result = $this->A->wherecatName_Alfabet($cat_id);
			   		 foreach ($result as $value1){
					 	  $offer_title=translateText($value1->offer_title);
					 	     $offer_detail=translateText($value1->offer_detail);
 								@$result[$i]->offer_title = $offer_title;
			    	   			@$result[$i]->offer_detail = $offer_detail;
 								$i++;
		             		 }
			    	}else if ($path == "4"){
			    	$sub_cat_name = $this->input->post("sub_cat_name");
			   		$result = $this->A->whereLikeSubcatName_Alfabet($cat_id,$sub_cat_name);
			   		 foreach ($result as $value1){					 	
					 	    $offer_title=translateText($value1->offer_title);
					 	     $offer_detail=translateText($value1->offer_detail);
 								@$result[$i]->offer_title = $offer_title;
			    	   			@$result[$i]->offer_detail = $offer_detail;
 								$i++;
		             		 }
			    	}
			    }else{
			    		// 1 = main cat distance km show, 2 = sub cat with main distance km show,3 main cat alfabet, 4 sub with main cat alfabet heading
			    	if ($path == "1") {			    	
			    	$lat_loc = $this->input->post("lat");
			    	$lng_loc = $this->input->post("lng");
			    		// $result = $this->A->whereNearby("SELECT *,CAST((3959 *   acos(cos(radians('$lat_loc')) * cos(radians(lat)) * cos(radians(lng) - radians('$lng_loc')) +  sin(radians('$lat_loc')) * sin(radians(lat )))) AS DECIMAL(10,1)) AS distance FROM offers WHERE `category_id` ='$cat_id' HAVING distance < 50 ORDER BY distance ");
 						$result1=$this->A->wherebyAllCat($cat_id);
			    	   
			    	   		foreach ($result1 as $value) {
			    	   			@$result[$i]->loc = $this->A->whereNearby("SELECT branch.id,branch.vendor_id,branch.latitude,branch.longitude,CAST((3959 *   acos(cos(radians('$lat_loc')) * cos(radians(latitude)) * cos(radians(longitude) - radians('$lng_loc')) +  sin(radians('$lat_loc')) * sin(radians(latitude )))) AS DECIMAL(10,1)) AS distance FROM selected_branch_offer LEFT JOIN branch ON branch.id=selected_branch_offer.branch_id WHERE selected_branch_offer.offer_id = '$value->id' HAVING distance < 50 ORDER BY distance ");
			      	   			@$result[$i]->id = $value->id;
			    	   			@$result[$i]->offer_title = $value->offer_title;
			    	   			@$result[$i]->offer_detail = $value->offer_detail;
			    	   			@$result[$i]->logo_image = $value->logo_image;
			    	   			@$result[$i]->add_date = $value->add_date;
			    	   			@$result[$i]->ratting = $value->ratting;
			    	   			$i++;
			    	   		}
			    	   
			    	}else if ($path == "2"){
			    	$sub_cat_name = $this->input->post("sub_cat_name");
			   		$lat_loc = $this->input->post("lat");
			    	$lng_loc = $this->input->post("lng");
			    	// 	$result = $this->A->whereNearby("SELECT *,CAST((3959 *   acos(cos(radians('$lat_loc')) * cos(radians(lat)) * cos(radians(lng) - radians('$lng_loc')) +  sin(radians('$lat_loc')) * sin(radians(lat )))) AS DECIMAL(10,1)) AS distance FROM offers WHERE (`category_id` ='$cat_id' && `sub_cat_name` LIKE '%$sub_cat_name%') HAVING distance < 50 ORDER BY distance ");
			    	$result1=$this->A->whereLikeSubcatName($cat_id,$sub_cat_name);
			    	foreach ($result1 as $value) {
			    	   			@$result[$i]->loc = $this->A->whereNearby("SELECT branch.id,branch.vendor_id,branch.latitude,branch.longitude,CAST((3959 *   acos(cos(radians('$lat_loc')) * cos(radians(latitude)) * cos(radians(longitude) - radians('$lng_loc')) +  sin(radians('$lat_loc')) * sin(radians(latitude )))) AS DECIMAL(10,1)) AS distance FROM selected_branch_offer LEFT JOIN branch ON branch.id=selected_branch_offer.branch_id WHERE selected_branch_offer.offer_id = '$value->id' HAVING distance < 50 ORDER BY distance ");
			    	   			@$result[$i]->id = $value->id;
			    	   			@$result[$i]->offer_title = $value->offer_title;
			    	   			@$result[$i]->logo_image = $value->logo_image;
			    	   			@$result[$i]->offer_detail = $value->offer_detail;
			    	   			@$result[$i]->add_date = $value->add_date;
			    	   			@$result[$i]->ratting = $value->ratting;
			    	   			$i++;
			    	   		}
			    	}else if ($path == "3"){
			   		$result = $this->A->wherecatName_Alfabet($cat_id);
			    	}else if ($path == "4"){
			    	$sub_cat_name = $this->input->post("sub_cat_name");
			   		$result = $this->A->whereLikeSubcatName_Alfabet($cat_id,$sub_cat_name);
			    	}
			    }

				    if($result)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result;
					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}						
			  	  }else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}	
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}
		// ******************* Notification **********************

function getNew_Vendor_list()
	{	
			 $this->load->helper('translation_helper');
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				 if ($check) {
					$select = 'id,name,featured_image,address,other_address,description,added_date';
					$j = 0;
			    	 if($this->input->post("current_lang")=="ar"){
					$result = $this->A->wherebyLatestDateLimit2('vendor',$select,'status','1');
					 foreach ($result as $value1){
					 	  $name=translateText($value1->name);
					 	   $address=translateText($value1->address);
					 	    $other_address=translateText($value1->other_address);
					 	     $description=translateText($value1->description);
 								@$result[$j]->name =  $name;
 								@$result[$j]->address =  $address;
 								@$result[$j]->other_address =  $other_address;
 								@$result[$j]->description =  $description;
 								$j++;
		             		 }
		           }else{
					$result = $this->A->wherebyLatestDateLimit2('vendor',$select,'status','1');

		             		}
				    if($result)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result;
					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}						
			  	
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}

function getNewPromocode_list() /// News 
	{			 $this->load->helper('translation_helper');
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				 if ($check) {
					$select = '*';$j = 0;
			    	 if($this->input->post("current_lang")=="ar"){
					$result = $this->A->wherebyLatestDateLimit2('news',$select,'status',1);
					 foreach ($result as $value1){
					 	  $title=translateText($value1->title);
					 	   $text=translateText($value1->text);					 	
 								@$result[$j]->title =  $title;
 								@$result[$j]->text =  $text; 							
 								$j++;
		             		 }
		           }else{
					$result = $this->A->wherebyLatestDateLimit2('news',$select,'status',1);
				}
				    if($result)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result;
					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}						
			  	
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}

///*****************  Promo *****************************

	function getNewClassified_list()
	{		    $this->load->helper('translation_helper');
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				 if ($check) {
					$select = '*';
			     	$result1 = $this->A->wheredetail_all('category',$select,'status',1);
					$j = 0;
			    	 if($this->input->post("current_lang")=="ar"){
				$result = $this->A->wherebyLatestDateLimit2('classified',$select,'status',1);
					 foreach ($result as $value1){
					 	  $category_name=translateText($value1->category_name);
					 	   $caption=translateText($value1->caption);					 	
 								@$result[$j]->category_name =  $category_name;
 								@$result[$j]->caption =  $caption; 							
 								$j++;
		             		 }
		             		}else{
		         		$result = $this->A->wherebyLatestDateLimit2('classified',$select,'status',1);		
		             		}

				    if($result)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result;
		  				    $array13["data1"]=$result1;

					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}						
			  	
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}


	function getNewSelectedClassified_list()
	{			  $this->load->helper('translation_helper');
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				 if ($check) {
				 		if ($this->input->post("type")) {
				 		$type = $this->input->post("type");
				 		if ($type == '1') {
				 			$cat_name = $this->input->post("cat_name");
				 			$result = $this->A->whereNearby("SELECT * FROM classified WHERE `category` ='$cat_name' LIMIT 15 ");	
				 		}else if ($type == '2') {
				 			$cat_name = $this->input->post("cat_name");
				 		    $region = $this->input->post("region");

				 			$result = $this->A->whereNearby("SELECT * FROM classified WHERE `category` ='$cat_name' && `region` = '$region' ");	
				 		}else{
				 		    $cat_name = $this->input->post("cat_name");
				 		    $region = $this->input->post("region");
				 		    $section = $this->input->post("section");
				 			$result = $this->A->whereNearby("SELECT * FROM classified WHERE `category` ='$cat_name' && `region` = '$region' && `city` = '$section' ");		
				 		}		 		
				         $j = 0;
			    	 if($this->input->post("current_lang")=="ar"){			
					 foreach ($result as $value1){
					 	  $category_name=translateText($value1->category_name);
					 	   $caption=translateText($value1->caption);					 	
 								@$result[$j]->category_name =  $category_name;
 								@$result[$j]->caption =  $caption; 							
 								$j++;
		             		 }
		             		}

				    if($result)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result;

					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}						
			  	}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}		
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}
	function CitysList()
	{
		 		  $this->load->helper('translation_helper');
				 if ($this->input->post("resigion_id")) {
					$select = '*';
					$region_id = $this->input->post("resigion_id");
			     	$result = $this->A->wheredetail_all('city',$select,'region_id',$region_id);
			     	   $j = 0;
			    	 if($this->input->post("current_lang")=="ar"){			
					 foreach ($result as $value1){
					 	  $name_en=translateText($value1->name_en);
					 			@$result[$j]->name_en =  $name_en; 							
 								$j++;
		             		 }}
				    if($result)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result;

					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}						
			  	
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Null Region ";
		    	    } 	

						echo json_encode($array13);
	}


function RegionList()
	{
		 		  $this->load->helper('translation_helper');
				
					$select = '*';
		
			     	$result = $this->A->wheredetail_all('region',$select,'status','Active');
			     	   $j = 0;
			    	 if($this->input->post("current_lang")=="ar"){			
					 foreach ($result as $value1){
					 	  $region=translateText($value1->region);
					 			@$result[$j]->region =  $region; 							
 								$j++;
		             		 }}
				    if($result)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result;

					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}						
			  	
			      
						echo json_encode($array13);
	}

function getNewLimited_list()
	{			  $this->load->helper('translation_helper');
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				 if ($check) {
					$select = '*';
						$select1 = 'id,name';
					 if(function_exists('date_default_timezone_set')) {
			    	  date_default_timezone_set("Asia/Kolkata");     }
					  $date1 =  date('Y-m-d H:i:s');
					  $user_id = $this->input->post("user_id");
			     	$result12 = $this->A->wheredetail_all('category',$select1,'status',1);
					// $result = $this->A->wherebyLatestDateLimit2('limited_offer',$select,'status',1);
					 $result1 = $this->A->Limited_Offer_chk('limited_offer',$select,'status',1,$date1);
			      //   $i = 0;		    	
			      //     foreach ($result1 as $value) {
		       //       $result2 = $this->A->Offer_chk_user_history('user_offer_history',$select,'offer_type','Limited','user_id',$user_id,'offer_id',$value->id);	
		       //       		 foreach ($result2 as $value2){
 								// @$result1[$i]->count_used_per_user =  $value2->count_used;
		       //       		 }
		       //       		 if (empty($result2)) {
		       //       		 @$result1[$i]->count_used_per_user =  "0";
		       //       		 }
				             	  	
			      //   $i++;  }	
			      	  $j = 0; $k=0;
			    	 if($this->input->post("current_lang")=="ar"){
			    	  foreach ($result1 as $value1){
					 	  $shop_name=translateText($value1->shop_name);
					 	   $category_name=translateText($value1->category_name);
					 	    $section=translateText($value1->section);
					 	     $region=translateText($value1->region);
					 			@$result1[$k]->shop_name =  $shop_name;
					 			@$result1[$k]->category_name =  $category_name;
					 			@$result1[$k]->section =  $section;
					 			@$result1[$k]->region =  $region;
 								$k++;
		             		 }			
					 foreach ($result12 as $value1){
					 	  $name=translateText($value1->name);
					 			@$result12[$j]->name =  $name; 							
 								$j++;
		             		 }}	   
				    if($result1)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result1;
		  				    $array13["data1"]=$result12;

					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}						
			  	
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}


	function getNewSelectedLimited_list()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				 if ($check) {
				 		if ($this->input->post("type")) {
				 		$type = $this->input->post("type");
				 		$user_id = $this->input->post("user_id");
				 		 if(function_exists('date_default_timezone_set')) {
			    	  date_default_timezone_set("Asia/Kolkata");     }
					  $date1 =  date('Y-m-d H:i:s');

				 		$select = '*';
				 		if ($type == '1') {
				 			$cat_name = $this->input->post("cat_name");
				 		$result1 = $this->A->whereNearby("SELECT * FROM limited_offer WHERE `category` ='$cat_name' && `valid_date` >= '$date1'  LIMIT 30 ");			 			
				 		}else if ($type == '2') {
				 			$cat_name = $this->input->post("cat_name");
				 		    $region = $this->input->post("region");

				 		$result1 = $this->A->whereNearby("SELECT * FROM limited_offer WHERE `category` ='$cat_name' && `region` = '$region' && `valid_date` >= '$date1' ");	
				 			 
				 		}else{
				 		    $cat_name = $this->input->post("cat_name");
				 		    $region = $this->input->post("region");
				 		    $section = $this->input->post("section");
				 			$result1 = $this->A->whereNearby("SELECT * FROM limited_offer WHERE `category` ='$cat_name' && `region` = '$region' && `city` = '$section'  && `valid_date` >= '$date1' ");	
				 		} 		
				         
				    if($result1)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result1;

					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}						
			  	}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}		
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}

// ********************* favorite stores ***********************

function Favorite_Vendors_List()
	{
		 		
				 if ($this->input->post("user_id")) {
					$select = '*';
					$user_id = $this->input->post("user_id");
			     	$result = $this->A->funFav_Vendors_join($user_id);
				    if($result)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result;

					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}						
			  	
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Wrong info... ";
		    	    } 	

						echo json_encode($array13);
	}


// ********************* Search offers ***********************************************

	function getOffers_by_Search()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				 if ($check) {
					if($this->input->post("search_text"))
			    	{
			    	$search_text = $this->input->post("search_text");

					$result = $this->A->wherebySearch($search_text);
				    if($result)
					{
							$array13["status"]=1;
		  					$array13["message"]="success";
		  					$array13["data"]=$result;
					}else
					{		$array13["status"]=2;
		  					$array13["message"]="Nothing";
					}						
			  	  }else
					{		$array13["status"]=2;
		  					$array13["message"]="Nothing";
					}	
			      	}else
			        {
			        	    $array13["status"]=2;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}

	function Filter_Cat_aminites()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	
			    	$select = 'id,c_id,name,featured_image';
			    	$cat_id = $this->input->post("cat_id");
			     	// $result=$this->A->wherebyPopularcat($cat_id);
			     	$result11 = $this->A->wheredetail_all('services',$select,'c_id',$cat_id);
			     	$result22 = $this->A->wheredetail_all('amenities',$select,'c_id',$cat_id);

			      
			    			    
					if($result11)
					{
							$array13["status"]=true;
		  					$array13["message"]="success ";
		  					// $array13["data"]=$result;
		  					$array13["category"]=$result11;
		  					$array13["aminities"]=$result22;

					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing";
					}						
			  	   
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}

	function Check_Saving()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("user_id"))
			    	{
			    	$select = '*';
			    	$user_id = $this->input->post("user_id");
			     	$result = $this->A->Saving_chk('user_offer_history',$select,'user_id',$user_id,'status',1);

			     	$result11 = $this->A->total_sum_saving('user_offer_history','user_id',$user_id,'status',1);		 		    			    
					if($result11)
					{
							$array13["status"]=true;
		  					$array13["message"]="success ";
		  					$array13["data1"]=$result11;
		  					$array13["data"]=$result;
					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing...";
					}						
			  	   }else
					{		$array13["status"]=false;
		  					$array13["message"]="Wrong Info...";
					}
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}

function Check_Points()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("user_id"))
			    	{
			    	$select = '*';
			    	$user_id = $this->input->post("user_id");
			     	$result = $this->A->Points_chk('user_offer_history',$select,'user_id',$user_id,'status',1);

			     	$result11 = $this->A->total_sum_Points('user_offer_history','user_id',$user_id,'status',1);		 		    			    
					if($result11)
					{
							$array13["status"]=true;
		  					$array13["message"]="success ";
		  					$array13["data1"]=$result11;
		  					$array13["data"]=$result;
					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing...";
					}						
			  	   }else
					{		$array13["status"]=false;
		  					$array13["message"]="Wrong Info...";
					}
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}
function Give_Ratting()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("user_id"))
			    	{
			    	$select = '*';
			    	$user_id = $this->input->post("user_id");
			    	$offer_id = $this->input->post("offer_id");
			    	$ratting = $this->input->post("ratting");
			    	$review = $this->input->post("review");
                    $result11 = $this->A->whereFileNameSelected('offer_ratting_history',$select,'user_id',$user_id,'offer_id',$offer_id);
                    if (empty($result11)) {
                        $userinfo = array(
				            'user_id'  => $user_id,
				             'offer_id'  => $offer_id,
				             'ratting'  => $ratting,
				             'review'  => $review				         
				              );                   
     					 $insert_id=$this->A->insert('offer_ratting_history',$userinfo);
                    }else{
                    		 $userinfo1 = array(				        
				             'ratting'  => $ratting,
				             'review'  => $review				         
				              );                   
                    $insert_id=$this->A->updatewhere_order('offer_ratting_history','user_id',$user_id,'offer_id',$offer_id,'status',1,$userinfo1);
                    }
			     	
					if($insert_id)
					{
							$array13["status"]=true;
		  					$array13["message"]="success ";
		  					$array13["data"]=$insert_id;

		  					$ratting_res = $this->A->AvrageRatting($offer_id);
							foreach ($ratting_res as $value) {								
								$userinfo11 = array('ratting'  => $value->total_ratting );                   
                              $insert_id2=$this->A->updatewhere('offers','id',$offer_id,$userinfo11);
							}
					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing...";
					}						
			  	   }else
					{		$array13["status"]=false;
		  					$array13["message"]="Wrong Info...";
					}
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}

function Give_Ratting_Vendor()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("user_id"))
			    	{
			    	$select = '*';
			    	$user_id = $this->input->post("user_id");
			    	$vendor_id = $this->input->post("vendor_id");
			    	$ratting = $this->input->post("ratting");
			    	$review = $this->input->post("review");
                    $result11 = $this->A->whereFileNameSelected('vendor_ratting',$select,'user_id',$user_id,'vendor_id',$vendor_id);
                    if (empty($result11)) {
                        $userinfo = array(
				            'user_id'  => $user_id,
				             'vendor_id'  => $vendor_id,
				             'ratting'  => $ratting,
				             'review'  => $review				         
				              );                   
     					 $insert_id=$this->A->insert('vendor_ratting',$userinfo);
                    }else{
                    		 $userinfo1 = array(				        
				             'ratting'  => $ratting,
				             'review'  => $review				         
				              );                   
                    $insert_id=$this->A->updatewhere_order('vendor_ratting','user_id',$user_id,'vendor_id',$vendor_id,'status',1,$userinfo1);
                    }
			     	
					if($insert_id)
					{
						$ratting = "4.0";
						$ratting_res = $this->A->AvrageRatting_vendor($vendor_id);
							foreach ($ratting_res as $value) {								
								$userinfo11 = array('ratting'  => $value->total_ratting );                   
                              $insert_id2=$this->A->updatewhere('vendor','id',$vendor_id,$userinfo11);
                              $ratting = $value->total_ratting;
							}

							$array13["status"]=true;
		  					$array13["message"]="success ";
		  					$array13["data"]=$insert_id;
		  					$array13["ratting"]=$ratting;
		  					$array13["ratting_sts"]=1;

		  					
					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing...";
					}						
			  	   }else
					{		$array13["status"]=false;
		  					$array13["message"]="Wrong Info...";
					}
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}

function Token_Insert()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("user_id") && $this->input->post("token_firebase"))
			    	{
			    	$select = '*';
			    	$user_id = $this->input->post("user_id");
			    	$token = $this->input->post("token_firebase");
			    	 if(function_exists('date_default_timezone_set')) {
			    	  date_default_timezone_set("Asia/Kolkata");     }

                    $result11 = $this->A->wheredetail_all('notification_token',$select,'user_id',$user_id);
                    if (empty($result11)) {
                        $userinfo = array(
				            'user_id'  => $user_id,
				             'token'  => $token,
				             'add_date'=> date('Y-m-d H:i:s')			         
				              );                   
     					 $insert_id=$this->A->insert('notification_token',$userinfo);
                    }else{
                    		 $userinfo1 = array('token'  => $token,
                    		'add_date'=> date('Y-m-d H:i:s'));                   
                    $insert_id=$this->A->updatewhere('notification_token','user_id',$user_id,$userinfo1);
                    }
                    	
        	// per day login give some points to user 
                    
	// 				  $date1 =  date('Y-m-d');
 //                      $result = $this->A->where333FileNameSelected('user_offer_history',$select,'offer_type',"Daily Use",'user_id',$user_id,'date',$date1);	
 //                   $reward_insert = "0";
 //                   $points = 0;
	// 		     	if (empty($result)) {
	// 		     		   $result12 = $this->A->wheredetail_all('points','daily_uses_point','status',1);
	// 		          foreach ($result12 as $value) {
	// 	            $points =  $value->daily_uses_point;

	// 		     		 $userinfo = array(
	// 			            'user_id'  => $user_id,
	// 						 'offer_type'  => "Daily Use",
	// 			             'offer_id'  => 0,
	// 			             'count_used'  => 1,
	// 			             'generated_code'  => 0,
	// 			             'points'        =>$value->daily_uses_point,
	// 			             'add_date'=> date('Y-m-d H:i:s'),
	// 			             'date'=> $date1,
	// 			             'status' =>1,
	// 			             'code_sts' =>1				      
	// 			              );                   
 //     					 $reward_insert=$this->A->insert('user_offer_history',$userinfo);
 //     					}
	// 					}
	// // other points scratch available 	
	// 		 $other_points = $this->A->Points_chk_scratch('voucher_code_history',$select,'user_id',$user_id,'status',1,'read_sts',0);
				
			     	
					if($insert_id)
					{
							$array13["status"]=true;
		  					$array13["message"]="success ";
		  					$array13["data"]=$insert_id;
		  					// $array13["reward"]=$reward_insert;
		  					// $array13["points"]=$points;
		  					// $array13["other_points"]=$other_points;
		  				
					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing...";
					}						
			  	   }else
					{		$array13["status"]=false;
		  					$array13["message"]="Wrong Info...";
					}
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}

	function Update_Scratch_sts()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("offer_id"))
			    	{
			    	$select = '*';
			    	$offer_id = $this->input->post("offer_id");
			      $userinfo1 = array('read_sts'  => 1);                   
                    $insert_id=$this->A->updatewhere('voucher_code_history','id',$offer_id,$userinfo1);
					if($insert_id)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$insert_id;
					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing...";
					}						
			  	   }else
					{		$array13["status"]=false;
		  					$array13["message"]="Wrong Info...";
					}
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}

	function sendFCM() {
			$url = 'https://fcm.googleapis.com/fcm/send';
			$fields = array (
			        'to' => 'fvLORJZ95EU:APA91bFFM2NwJ8ok949NK8J9_xO1Fh-qy9sKKkX8aiYxpZ6cXtSo5VqB11tRsQL-xdvsf1WpNgyNtlzC_ywcF4724hY8Ht6EnyCKvvU9dG9W9_BioIS25TeA_0BuTEQ6HOjoM6mAZCTj',
			        'data' => array (
			                "path" => "deal",
			                "body" => "body",
			                "title" => "SOHAN",
			                "click_action"=>"HOMEACTIVITY",
			                "id"  =>3
			                // "image"     => $image_url,
			                // "detail_url" => $detail_url
			                     )
			);
			$fields = json_encode ( $fields );
			$headers = array (
			        'Authorization: key=' . "AAAAzXBR7mI:APA91bE6jr4o95I08_Yoqs6LK0gP2sdJz83uSQbPbhvYLJhwtj1EP8Rnc5JL6lz6B0wqGr2qk9qIOCliY9pswoHoyu1DeXncZBSNsHCLg86gD878EaoDmEcODdSTeBXEvr3m_ON25FvR",
			        'Content-Type: application/json'
			);

			$ch = curl_init ();
			curl_setopt ( $ch, CURLOPT_URL, $url );
			curl_setopt ( $ch, CURLOPT_POST, true );
			curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
			curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
			curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

			$result = curl_exec ( $ch );
			curl_close ( $ch );
			echo $result;
}

// ************************** plan subscription  *******************

function User_Subscription_Info()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("user_id"))
			    	{
			    	$select = '*';
			    	$user_id = $this->input->post("user_id");
			     	$result = $this->A->funPlan_Order_join($user_id);
			     	if (empty($result)) {
			       	$result = $this->A->wheredetailtempLimit1('imp_info','status',1);	
			       	@$result[0]->payment_sts =  "No";	 		     
			    	}
					if($result)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result;
					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing...";
					}						
			  	   }else
					{		$array13["status"]=false;
		  					$array13["message"]="Wrong Info...";
					}
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}

	function Subscription_Plan_Insert()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("user_id") && $this->input->post("payment_sts"))
			    	{
			    	  if(function_exists('date_default_timezone_set')) {
			    	  date_default_timezone_set("Asia/Kolkata");     }
					  
			    	$select = '*';
			       $user_id = $this->input->post("user_id");
			       $payment_sts = $this->input->post("payment_sts");
                   $plan_id = $this->input->post("plan_id");
                   $amount = $this->input->post("amount");
                   $no_of_days = $this->input->post("no_of_days");

                   $uploadDate = date('Y-m-d');;
					$date = strtotime($uploadDate);
					$date = strtotime("+$no_of_days day", $date);
					$date = date('Y-m-d', $date);
                    // $date12 = strtotime("+$no_of_days day", $date);

                        $userinfo = array(
				            'user_id'  => $user_id,
				             'plan_id'  => $plan_id,
				             'amount'  => $amount,
				             'payment_sts'  => $payment_sts,
				             'type'  => 3,
				             'exp_date'  => $date,	
				              'add_date'  => date('Y-m-d')		         
				              );                   
     					 $insert_id=$this->A->insert('plan_order_detail',$userinfo);
              		     	
					if($insert_id)
					{
							$array13["status"]=true;
		  					$array13["message"]="success ";
		  					$array13["data"]=$insert_id;
		  				
					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing...";
					}						
			  	   }else
					{		$array13["status"]=false;
		  					$array13["message"]="Wrong Info...";
					}
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}

function PurchaseList()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("user_id"))
			    	{
			    	$select = '*';
			    	$user_id = $this->input->post("user_id");
			     	$result = $this->A->funPlan_Order_join_All($user_id);
			     	
					if($result)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result;
					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing...";
					}						
			  	   }else
					{		$array13["status"]=false;
		  					$array13["message"]="Wrong Info...";
					}
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}

// ***********************   Level offer ******************


	function Level_Offer_List()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("user_id"))
			    	{
			    	$select = '*';
			    	$user_id = $this->input->post("user_id");
			        $result1 = $this->A->wheredetail_all('level',$select,'status',1);
			      	$result11 = $this->A->total_sum_Points('user_offer_history','user_id',$user_id,'status',1);		 		    			    

			     	 $i = 0;  	
			          foreach ($result1 as $value) {
		             $result2 = $this->A->whereFileNameSelected('my_gift',$select,'user_id',$user_id,'level_id',$value->id);	
		             		
		             		 if (empty($result2)) {
		             		 @$result1[$i]->count_used_per_user =  "0";
		             		 }else{
		             		 	@$result1[$i]->count_used_per_user =  "1";
		             		 }
		             	 
		             		 @$result1[$i]->current_points =  $result11[0]->total_points;
		             		          	  	
			        $i++;  }			        
					if($result1)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result1;
		  					$array13["points"]=$result11;

					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing...";
					}						
			  	   }else
					{		$array13["status"]=false;
		  					$array13["message"]="Wrong Info...";
					}
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}



function Level_Offer_Redeem()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("user_id"))
			    	{
			    	$select = '*';
			    	$user_id = $this->input->post("user_id");
			    	$req_points = $this->input->post("req_points");
			    	$level_id = $this->input->post("level_id");

			    	$insert_id = "";
			        $result1 = $this->A->wheredetail_gift_one('Inventory_gift',$select,'req_points',$req_points);
		   			foreach ($result1 as $value) {
		   				$giftInfo = array(	'user_id' => $user_id,
		   									'level_id' => $level_id,
		   									'Inventory_gift_id' => $value->id);
		   				$insert_id = $this->A->insert('my_gift',$giftInfo);
		   				 $result22 =$this->A->increase_decreaseByone33('Inventory_gift','id',$value->id);

		   			}
					if($insert_id)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result1;

					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Out off stock...";
					}						
			  	   }else
					{		$array13["status"]=false;
		  					$array13["message"]="Wrong Info...";
					}
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}

function Level_Offer_Detail()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("user_id"))
			    	{
			    	$select = '*';
			    	$user_id = $this->input->post("user_id");
			        $result1 = $this->A->funLevel_Offer_join($user_id);
		   			$result11 = $this->A->total_sum_saving('user_offer_history','user_id',$user_id,'status',1);		 		    			    

					if($result1)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result1;
		  					$array13["data1"]=$result11;

					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing...";
					}						
			  	   }else
					{		$array13["status"]=false;
		  					$array13["message"]="Wrong Info...";
					}
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}

function MyGift_Offer_Update()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("user_id"))
			    	{
			    	$select = '*';
			    	$user_id = $this->input->post("user_id");
			    	$code = $this->input->post("code");
			    	$mygift_id = $this->input->post("mygift_id");
			    	$Inventory_gift_id = $this->input->post("Inventory_gift_id");

 					$userinfo1 = array('clam_stats'  => 2);                   
                    $result1=$this->A->updatewhere('my_gift','id',$mygift_id,$userinfo1);		

					if($result1)
					{            		   		
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result1;
 $result22 =$this->A->increase_decreaseByone('Inventory_gift','id',$Inventory_gift_id);
					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing...";
					}						
			  	   }else
					{		$array13["status"]=false;
		  					$array13["message"]="Wrong Info...";
					}
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}

	// ************************* Notification *******************************

	function Notification_Info()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("user_id"))
			    	{
			    	$select = '*';
			    	$user_id = $this->input->post("user_id");
			        $result1 = $this->A->wheredetail_all('notification_token',$select,'user_id',$user_id);
			      
					if($result1)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result1;

					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing...";
					}						
			  	   }else
					{		$array13["status"]=false;
		  					$array13["message"]="Wrong Info...";
					}
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}

function Notification_Enable_Disable()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("user_id"))
			    	{
			    	$select = '*';
			    	$user_id = $this->input->post("user_id");
			       $result11 = $this->A->wheredetail_all('notification_token',$select,'user_id',$user_id);
			        foreach ($result11 as $value) {
                    if ($value->status == 1) {
                      $userinfo1 = array('status'  => 2);                   
                    $insert_id=$this->A->updatewhere('notification_token','user_id',$user_id,$userinfo1);
                    }else{
                    		 $userinfo1 = array('status'  =>1);                   
                    $insert_id=$this->A->updatewhere('notification_token','user_id',$user_id,$userinfo1);
                    }       
                    }             	
			       $result11 = $this->A->wheredetail_all('notification_token',$select,'user_id',$user_id);

					if($result11)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result11;

					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing...";
					}						
			  	   }else
					{		$array13["status"]=false;
		  					$array13["message"]="Wrong Info...";
					}
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}

function AboutUs_Info()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("user_id"))
			    	{
			    	$select = 'support_id,description';
			    	$user_id = $this->input->post("user_id");
			        $result1 = $this->A->whereFileName('support_all',$select,"about_us");
			      
					if($result1)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result1;

					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing...";
					}						
			  	   }else
					{		$array13["status"]=false;
		  					$array13["message"]="Wrong Info...";
					}
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}

	function Contact_Info()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("user_id"))
			    	{
			    	$select = 'support_id,title,description';
			    	$user_id = $this->input->post("user_id");
			        $result1 = $this->A->whereFileName('support_all',$select,"contact_us");
			      
					if($result1)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result1;

					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing...";
					}						
			  	   }else
					{		$array13["status"]=false;
		  					$array13["message"]="Wrong Info...";
					}
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}

function Rules_List()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("user_id"))
			    	{
			    	$select = 'support_id,title,description';
			    	$user_id = $this->input->post("user_id");
			        $result1 = $this->A->whereFileName('support_all',$select,"rules");

					if($result1)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result1;

					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing...";
					}						
			  	   }else
					{		$array13["status"]=false;
		  					$array13["message"]="Wrong Info...";
					}
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}

	function Help_List()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("user_id"))
			    	{
			    	$select = 'support_id,title,description';
			    	$user_id = $this->input->post("user_id");
			        $result1 = $this->A->whereFileName('support_all',$select,"help");

					if($result1)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result1;

					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing...";
					}						
			  	   }else
					{		$array13["status"]=false;
		  					$array13["message"]="Wrong Info...";
					}
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}

function Scratch_offer_check()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("user_id") && $this->input->post("code"))
			    	{
			    	$select = '*';
			    	$user_id = $this->input->post("user_id");
			    	$code = $this->input->post("code");
			    	$final_update;
			    	if(function_exists('date_default_timezone_set')) {
			    	  date_default_timezone_set("Asia/Kolkata");   }

			     	$result = $this->A->where333FileNameSelected('user_offer_history',$select,'user_id',$user_id,'generated_code',$code,'code_sts',0);
			     	if($result){
			     		foreach ($result as $value) {
			     		 $result2 = $this->A->whereFileNameSelected('vendor_offers',$select,'id',$value->offer_id,'status',1);
			     		 foreach ($result2 as $value2) {
			     			$final_update =	$this->A->updateUserOfferHistroy('user_offer_history','user_id',$user_id,'generated_code',$code,$value2->offer_amount,$value2->points);

					  $date1 =  date('Y-m-d H:i:s');
					  $voucher_code = mt_rand(100000, 999999);			
			    	
			      		 $userinfo = array(
				            'user_id'  => $user_id,
							 'vendor_id'  => $value2->vendor_id,		
				             'vendor_offer_id'  => $value->offer_id,
				             'offer_history_id' =>	$value->id,			          
				             'voucher_code'  => $voucher_code,
				             'saving'  => $value2->offer_amount,
				             'points'  => $value2->points,
				             'add_date'=> $date1				      
				              );                   
     					 $insert_id=$this->A->insert('voucher_code_history',$userinfo);

			     		}
			     		}
			     
			     	}
 
					if($final_update)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$voucher_code;

					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing...";
					}						
			  	   }else
					{		$array13["status"]=false;
		  					$array13["message"]="Wrong Info...";
					}
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}

	function Voucher_List()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("user_id"))
			    	{
			    	$select = '*';
			    	$user_id = $this->input->post("user_id");
			        $result1 = $this->A->funVoucher_join($user_id);
			      
					if($result1)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";
		  					$array13["data"]=$result1;

					}else
					{		$array13["status"]=false;
		  					$array13["message"]="Nothing...";
					}						
			  	   }else
					{		$array13["status"]=false;
		  					$array13["message"]="Wrong Info...";
					}
			      	}else
			        {
			        	    $array13["status"]=false;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}
}
?>                    

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
	           	if($this->input->post("mobile"))
    		 {
    		 $chk=$this->A->wheredetailmain('user','contact',$this->input->post("mobile"));
    		 if ($chk)
     		  {
    		  	$mobile_f=$this->input->post("mobile");
    		  	$otp = '1234';
    // 		 	$this->load->helper('string');
				// $otp = random_string('numeric',4);
				// $this->load->helper('otp_helper');
				// $msg='Your OTP is '.$otp;
				// send_otp('91'.$mobile_f,$msg,$otp);
                $array= $this->A->wheredetail("user","contact",$mobile_f); 
				$array->id='';
				// unset($array->created);
				// unset($array->updated);
				// unset($array->deleted_at);
				$array->otp=$otp;
				$insert_id=$this->A->insert('temp_user',$array);
  						$array11["status"]=true;
	  					$array11["message"]="success do continue";
    		 }else
    		 {
		   			 	$array11["status"]=false;
			  			$array11["message"]="mobile no not found";	
    		 }
	    	 }else
	    	 {
		  		    	$array11["status"]=false;
					  	$array11["message"]="Please Enter Mobile_no";	
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
         		if($this->input->post("new_password") &&  $this->input->post("mobile") )
    			{
				$new_password=md5($this->input->post("new_password"));
				$mobile_fp= $this->input->post("mobile");
				$array_p=array('pass'=>$new_password);
				$result=$this->A->updatewhere('user','contact',$mobile_fp,$array_p);
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
					if($this->input->post("mobile"))

			    	{
					$mobile =$this->input->post("mobile");
					$this->load->helper('otp_helper');
					$mobile_otp=send_voice_sms('91'.$mobile);
					if($mobile_otp)
					{
							$array13["status"]=true;
		  					$array13["message"]="success";

					}else
					{		$array13["status"]=false;
		  					$array13["message"]="try again";
					}						
			  	    }else
			  		{	  $array13["status"] = false ;
				          $array13["message"]="Please Wait";
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
        //  https://hotbitinfotech.com/win_save/win_save_ci/assets/images/categories/four.jpeg
        //  echo base_url().'win_save_ci/assets/images/categories/four.jpeg';
        //  exit();
         $this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$catId = $this->input->post('category_id');
				$check=cofirmApiKey($apikey);
				if ($check == true) {
				    $data = $this->A->getService($apikey, $catId);
				    echo json_encode(array('status' => 1, 'data' => $data));
				}else{
				    echo json_encode(array('status' => 0, 'data' => 'No Services are Available'));
				}
     }

     function getCategories(){
   
         $this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
		
				if ($check) {
					if($this->input->post("limit"))
			    	{	
			    	$select = '*';
			     	$result = $this->A->whereFileNameSelectedLimitRandom('category',$select,'status',1);
			    	}else{
			    	$select = '*';
			     	$result = $this->A->wheredetail_all('category',$select,'status',1);
			        }
			     	$result11 = $this->A->wheredetail_all('slider',$select,'status',1);

					if($result11)
					{
							$array13["status"]=1;
		  					$array13["message"]="success";
		  					$array13["data"]=$result;
		  					$array13["data1"]=$result11;
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

      function getOffers(){
   
         $this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
		
				if ($check) {
					
			    	$select = '*';
			     	$result = $this->A->wheredetail_all('offers',$select,'status',1);
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
			        {
			        	    $array13["status"]=2;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
     }

    function getOffers_selected()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
						if ($check) {
					if($this->input->post("category_id"))
			    	{
			    	$select = '*';
			     	$result=$this->A->wheredetail_all('offers',$select,'category_id',$this->input->post("category_id"));
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
			  		{	  $array13["status"] = 2 ;
				          $array13["message"]="Wrong info..";
			      	}
			      	}else
			        {
			        	    $array13["status"]=2;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}
 
//   ********************* offers home page start ************************************************
  function Home_page_AllLimit_Offers(){
   
         $this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
		
				if ($check) {
					
			    	$select = '*';

			     	$result   = $this->A->wherebyFeaturedLimit('offers',$select,'status',1);
			     	$result1  = $this->A->wherebyPopularLimit('offers',$select,'status',1);
			     	$result2  = $this->A->wherebyLatestDateLimit('offers',$select,'status',1);
					$result3  = $this->A->wherebyRattingLimit('offers',$select,'status',1);
					if($result)
					{
							$array13["status"]=1;
		  					$array13["message"]="success";
		  					$array13["data"]=$result;
		  					$array13["data1"]=$result1;
		  					$array13["data2"]=$result2;
		  		        	$array13["data3"]=$result3;

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


 function getOffers_By_Ratting()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
						if ($check) {
					if($this->input->post("limit"))
			    	{
			    	$select = '*';
			     	$result = $this->A->wherebyRattingLimit('offers',$select,'status',1);
			    	}else{
			    	$select = '*';
			     	$result=$this->A->wherebyRatting('offers',$select,'status',1);
			        }
			    	
					if($result)
					{
							$array13["status"]=1;
		  					$array13["message"]="success ";
		  					$array13["data"] = $result;
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


	function getOffers_By_Latest()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("limit"))
			    	{
			    	$select = '*';
			     	$result = $this->A->wherebyLatestDateLimit('offers',$select,'status',1);
			    	}else{
			    	$select = '*';
			     	$result=$this->A->wherebyLatestDate('offers',$select,'status',1);
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

	function getOffers_By_Popular()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("limit"))
			    	{
			    	$select = '*';
			     	$result = $this->A->wherebyPopularLimit('offers',$select,'status',1);
			    	}else{
			    	$select = '*';
			     	$result=$this->A->wherebyPopular('offers',$select,'status',1);
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


function getOffers_By_Featured()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("limit"))
			    	{
			    	$select = '*';
			     	$result = $this->A->wherebyFeaturedLimit('offers',$select,'status',1);
			    	}else{
			    	$select = '*';
			     	$result=$this->A->wherebyFeatured('offers',$select,'status',1);
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

function VendorInfo()
	{
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
			        $i = 0;	
			    	$vendor_id = $this->input->post("vendor_id");
			    	$user_id = $this->input->post("user_id");
			     	$result = $this->A->whereFileNameSelected('vendor',$select,'id',$vendor_id,'status',1);	
			     	$result_fav = $this->A->where333FileNameSelected('favorite_store',$select,'vendor_id',$vendor_id,'user_id',$user_id,'status',1);	
			     	$result55 = $this->A->funPlan_Order_join($user_id);

			        $result1 = $this->A->Offer_chk('vendor_offers',$select,'vendor_id',$vendor_id,'status',1,$date1);
			     	    	
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
							$array13["status"]=1;
		  					$array13["message"]="success ";
		  					$array13["data"]=$result;
		  					$array13["data1"]=$result1;
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

			     	}else{
				        $insert_id = $this->A->delete2where('favorite_store','vendor_id',$vendor_id,'user_id',$user_id);
			     	}
			      
					if($insert_id)
					{
						
							$array13["status"]=1;
		  					$array13["message"]="success ";
		  					$array13["data"]=$insert_id;
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
			       if(function_exists('date_default_timezone_set')) {
			    	  date_default_timezone_set("Asia/Kolkata");   }
					  $date1 =  date('Y-m-d H:i:s');
					  $generated_code = mt_rand(10000, 99999);
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
				             'add_date'=> $date1				      
				              );                   
     					 $insert_id=$this->A->insert('user_offer_history',$userinfo);

			     	}else{
			     		$array_p =  array('generated_code'=>$generated_code);
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


// *********************************** category offer list like near by start *********************************

function Home_page_SelectedLimit_Offers(){
   
         $this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
		
				if ($check) {					
			    	$select = '*';
			    	$cat_id = $this->input->post("cat_id");
			    	$lat_loc = $this->input->post("lat");
			    	$lng_loc = $this->input->post("lng");

			     	$result   = $this->A->wherebyFeaturedLimit('offers',$select,'category_id',$cat_id);
			     	$result1  = $this->A->wherebyPopularLimit('offers',$select,'category_id',$cat_id);
			     	$result2  = $this->A->wherebyLatestDateLimit('offers',$select,'category_id',$cat_id);
					$result3  = $this->A->wherebyRattingLimit('offers',$select,'category_id',$cat_id);
					$result4 = $this->A->whereNearby("SELECT *,(3959 *   acos(cos(radians('$lat_loc')) * cos(radians(lat)) * cos(radians(lng) - radians('$lng_loc')) +  sin(radians('$lat_loc')) * sin(radians(lat )))) AS distance FROM offers WHERE `category_id` ='$cat_id' HAVING distance < 28 ORDER BY distance LIMIT 0, 4 ");
					if($result)
					{
							$array13["status"]=1;
		  					$array13["message"]="success";
		  					$array13["data"]=$result;
		  					$array13["data1"]=$result1;
		  					$array13["data2"]=$result2;
		  		        	$array13["data3"]=$result3;
		  		        	$array13["data4"]=$result4;

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

function getOffers_By_Ratting_cat()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
						if ($check) {
					if($this->input->post("limit"))
			    	{
			    	$select = '*';
			     	$result = $this->A->wherebyRattingLimit('offers',$select,'status',1);
			    	}else{
			    	$select = '*';
			    	$cat_id = $this->input->post("cat_id");
			     	$result=$this->A->wherebyRatting('offers',$select,'category_id',$cat_id);
			        }
			    	
					if($result)
					{
							$array13["status"]=1;
		  					$array13["message"]="success ";
		  					$array13["data"] = $result;
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


	function getOffers_By_Latest_cat()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("limit"))
			    	{
			    	$select = '*';
			     	$result = $this->A->wherebyLatestDateLimit('offers',$select,'status',1);
			    	}else{
			    	$select = '*';
			    	$cat_id = $this->input->post("cat_id");
			     	$result=$this->A->wherebyLatestDate('offers',$select,'category_id',$cat_id);
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

	function getOffers_By_Popular_cat()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("limit"))
			    	{
			    	$select = '*';
			     	$result = $this->A->wherebyPopularLimit('offers',$select,'status',1);
			    	}else{
			    	$select = '*';
			    	$cat_id = $this->input->post("cat_id");
			     	$result=$this->A->wherebyPopular('offers',$select,'category_id',$cat_id);
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


function getOffers_By_Featured_cat()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("limit"))
			    	{
			    	$select = '*';
			     	$result = $this->A->wherebyFeaturedLimit('offers',$select,'status',1);
			    	}else{
			    	$select = '*';
			    	$cat_id = $this->input->post("cat_id");
			     	$result=$this->A->wherebyFeatured('offers',$select,'category_id',$cat_id);
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

 function getVendors_Nearby()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				 if ($check) {
					if($this->input->post("lat") && $this->input->post("lng"))
			    	{
			    	$lat_loc = $this->input->post("lat");
			    	$lng_loc = $this->input->post("lng");
			    	$cat_id = $this->input->post("cat_id");

					$result = $this->A->whereNearby("SELECT *,(3959 *   acos(cos(radians('$lat_loc')) * cos(radians(lat)) * cos(radians(lng) - radians('$lng_loc')) +  sin(radians('$lat_loc')) * sin(radians(lat )))) AS distance FROM offers WHERE `category_id` ='$cat_id' HAVING distance < 28 ORDER BY distance ");
				         

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

function getOffers_by_subcat_name()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				 if ($check) {
					if($this->input->post("cat_id") && $this->input->post("sub_cat_name"))
			    	{
			    	$sub_cat_name = $this->input->post("sub_cat_name");
			    	$cat_id = $this->input->post("cat_id");
			    	$path = $this->input->post("path");

			    	if ($path == "1") {
			    		if ($sub_cat_name == "All") {
			    	$lat_loc = $this->input->post("lat");
			    	$lng_loc = $this->input->post("lng");
			    		$result = $this->A->whereNearby("SELECT *,(3959 *   acos(cos(radians('$lat_loc')) * cos(radians(lat)) * cos(radians(lng) - radians('$lng_loc')) +  sin(radians('$lat_loc')) * sin(radians(lat )))) AS distance FROM offers WHERE `category_id` ='$cat_id' HAVING distance < 50 ORDER BY distance ");
			    		}else{
			  		$result = $this->A->whereLikeSubcatName($cat_id,$sub_cat_name);
			    		}
			    	}else{
			   		$result = $this->A->whereLikeAmenitiesName($cat_id,$sub_cat_name);
			    	}

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
		// ******************* Notification **********************

function getNew_Vendor_list()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				 if ($check) {
					$select = '*';
					$result = $this->A->wherebyLatestDateLimit2('vendor',$select,'status',1);
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
			        {
			        	    $array13["status"]=2;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}

function getNewPromocode_list()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				 if ($check) {
					$select = '*';
					$result = $this->A->wherebyLatestDateLimit2('news',$select,'status',1);
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
			        {
			        	    $array13["status"]=2;
			  	        	$array13["message"]="Authentication Failed";
		    	    } 	

						echo json_encode($array13);
	}

///*****************  Promo *****************************

	function getNewClassified_list()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				 if ($check) {
					$select = '*';
			     	$result1 = $this->A->wheredetail_all('category',$select,'status',1);
					$result = $this->A->wherebyLatestDateLimit2('classified',$select,'status',1);
				    if($result)
					{
							$array13["status"]=1;
		  					$array13["message"]="success";
		  					$array13["data"]=$result;
		  				    $array13["data1"]=$result1;

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


	function getNewSelectedClassified_list()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				 if ($check) {
				 		if ($this->input->post("type")) {
				 		$type = $this->input->post("type");
				 		if ($type == '1') {
				 			$cat_name = $this->input->post("cat_name");
				 			$result = $this->A->whereNearby("SELECT * FROM classified WHERE `category_name` ='$cat_name' LIMIT 15 ");	
				 		}else if ($type == '2') {
				 			$cat_name = $this->input->post("cat_name");
				 		    $region = $this->input->post("region");

				 			$result = $this->A->whereNearby("SELECT * FROM classified WHERE `category_name` ='$cat_name' && `region` = '$region' ");	
				 		}else{
				 		    $cat_name = $this->input->post("cat_name");
				 		    $region = $this->input->post("region");
				 		    $section = $this->input->post("section");
				 			$result = $this->A->whereNearby("SELECT * FROM classified WHERE `category_name` ='$cat_name' && `region` = '$region' && `section` = '$section' ");		
				 		}		 		
				         

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
	function CitysList()
	{
		 		
				 if ($this->input->post("resigion_id")) {
					$select = '*';
					$region_id = $this->input->post("resigion_id");
			     	$result = $this->A->wheredetail_all('city',$select,'region_id',$region_id);
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

		function getNewLimited_list()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				 if ($check) {
					$select = '*';
					 if(function_exists('date_default_timezone_set')) {
			    	  date_default_timezone_set("Asia/Kolkata");     }
					  $date1 =  date('Y-m-d H:i:s');
					  $user_id = $this->input->post("user_id");
			     	$result12 = $this->A->wheredetail_all('category',$select,'status',1);
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
				    if($result1)
					{
							$array13["status"]=1;
		  					$array13["message"]="success";
		  					$array13["data"]=$result1;
		  				    $array13["data1"]=$result12;

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


	function getNewSelectedLimited_list()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				 if ($check) {
				 		if ($this->input->post("type")) {
				 		$type = $this->input->post("type");
				 		$user_id = $this->input->post("user_id");
				 		$select = '*';
				 		if ($type == '1') {
				 			$cat_name = $this->input->post("cat_name");
				 		$result1 = $this->A->whereNearby("SELECT * FROM limited_offer WHERE `category_name` ='$cat_name' LIMIT 30 ");			 			
				 		}else if ($type == '2') {
				 			$cat_name = $this->input->post("cat_name");
				 		    $region = $this->input->post("region");

				 		$result1 = $this->A->whereNearby("SELECT * FROM limited_offer WHERE `category_name` ='$cat_name' && `region` = '$region' ");	
				 			 
				 		}else{
				 		    $cat_name = $this->input->post("cat_name");
				 		    $region = $this->input->post("region");
				 		    $section = $this->input->post("section");
				 			$result1 = $this->A->whereNearby("SELECT * FROM limited_offer WHERE `category_name` ='$cat_name' && `region` = '$region' && `section` = '$section' ");	
				 		} 		
				         
				    if($result1)
					{
							$array13["status"]=1;
		  					$array13["message"]="success";
		  					$array13["data"]=$result1;

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

	function getOffers_By_Popular_cat_Filter()
	{
		 		$this->load->helper('my_helper');
				$apikey = $this->input->get_request_header('token');
				$check=cofirmApiKey($apikey);
				if ($check) {				
			    	if($this->input->post("limit"))
			    	{
			    	$select = '*';
			     	$result = $this->A->wherebyPopularLimit('offers',$select,'status',1);

			    	}else{
			    	$select = '*';
			    	$cat_id = $this->input->post("cat_id");
			     	$result=$this->A->wherebyPopular('offers',$select,'category_id',$cat_id);
			     	$result11 = $this->A->wheredetail_all('services',$select,'c_id',$cat_id);
			     	$result22 = $this->A->wheredetail_all('amenities',$select,'c_id',$cat_id);

			        }
			    			    
					if($result)
					{
							$array13["status"]=1;
		  					$array13["message"]="success ";
		  					$array13["data"]=$result;
		  					$array13["data1"]=$result11;
		  					$array13["data2"]=$result22;

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
                    $result11 = $this->A->wheredetail_all('notification_token',$select,'user_id',$user_id);
                    if (empty($result11)) {
                        $userinfo = array(
				            'user_id'  => $user_id,
				             'token'  => $token			         
				              );                   
     					 $insert_id=$this->A->insert('notification_token',$userinfo);
                    }else{
                    		 $userinfo1 = array('token'  => $token);                   
                    $insert_id=$this->A->updatewhere('notification_token','user_id',$user_id,$userinfo1);
                    }
                    	


                    	// per day login give some points to user 
                     if(function_exists('date_default_timezone_set')) {
			    	  date_default_timezone_set("Asia/Kolkata");     }
					  $date1 =  date('Y-m-d');
                      $result = $this->A->where333FileNameSelected('user_offer_history',$select,'offer_type',"Daily Use",'user_id',$user_id,'date',$date1);	
                   
			     	if (empty($result)) {
			     		   $result12 = $this->A->wheredetail_all('points','daily_uses_point','status',1);
			          foreach ($result12 as $value) {
		           
			     		 $userinfo = array(
				            'user_id'  => $user_id,
							 'offer_type'  => "Daily Use",
				             'offer_id'  => 0,
				             'count_used'  => 1,
				             'generated_code'  => 0,
				             'points'        =>$value->daily_uses_point,
				             'add_date'=> date('Y-m-d H:i:s'),
				             'date'=> $date1,
				             'status' =>1				      
				              );                   
     					 $insert_id=$this->A->insert('user_offer_history',$userinfo);
     					}
						}
			     	
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

	function sendFCM() {
			$url = 'https://fcm.googleapis.com/fcm/send';
			$fields = array (
			        'to' => 'fbvBpGGWJnE:APA91bEtYfWiXKzferoGgHWvHQMkmBU2Btf9NxXI7yad8aX7UlhqYbbwYCz01hJsQg_Knn1viJxR4D7tV1cPwjAcorU8RYK2DG80jIEwLgFbEUax_HwLXXjb-I6qZPeu4daZN11F3asr',
			        'data' => array (
			                "path" => "products",
			                "body" => "body",
			                "title" => "SOHAN",
			                "click_action"=>"HOMEACTIVITY"
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
		             $result2 = $this->A->Offer_chk_user_history('user_offer_history',$select,'offer_type','LEVEL','user_id',$user_id,'offer_id',$value->vendor_offer_id);	
		             		 foreach ($result2 as $value2){
 								@$result1[$i]->count_used_per_user =  $value2->count_used;
		             		 }
		             		 if (empty($result2)) {
		             		 @$result1[$i]->count_used_per_user =  "0";
		             		 }
		             	 
		             		 @$result1[$i]->current_points =  $result11[0]->total_points;
		             		          	  	
			        $i++;  }			        
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
			    	$offer_vendor_id = $this->input->post("vendor_offer_id");
			        $result1 = $this->A->funLevel_Offer_join($offer_vendor_id);
		   
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

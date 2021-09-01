<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width,initial-scale=1" />
      <meta http-equiv="X-UA-Compatible" content="ie=edge" />
      <title>Win & Save</title>
      <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
      <link href="<?php echo base_url();  ?>venders/dist-assets/css/themes/lite-purple.min.css" rel="stylesheet" />
      <link href="<?php echo base_url();  ?>venders/dist-assets/css/plugins/perfect-scrollbar.min.css" rel="stylesheet" />

      <style type="text/css">
            /* Coded with love by Mutiullah Samim */
        body,
        html {
            margin: 0;
            padding: 0;
            height: 100%;
            background: #60a3bc !important;
            color: #fff;
        }
        .user_card {
            height: 400px;
            width: 350px;
            margin-top: auto;
            margin-bottom: auto;
            background: #62549c;
            position: relative;
            display: flex;
            justify-content: center;
            flex-direction: column;
            padding: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -webkit-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            -moz-box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 5px;

        }
        .brand_logo_container {
            position: absolute;
            height: 170px;
            width: 170px;
            top: -75px;
            border-radius: 50%;
            background: #60a3bc;
            padding: 10px;
            text-align: center;
        }
        .brand_logo {
            height: 150px;
            width: 150px;
            border-radius: 50%;
            border: 2px solid white;
        }
        .form_container {
            margin-top: 100px;
        }
        .login_btn {
            width: 100%;
            background: #bcbbdd !important;
            color: white !important;
        }
        .login_btn:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }
        .login_container {
            padding: 0 2rem;
        }
        .input-group-text {
            background: #bcbbdd !important;
            color: white !important;
            border: 0 !important;
            border-radius: 0.25rem 0 0 0.25rem !important;
        }
        .input_user,
        .input_pass:focus {
            box-shadow: none !important;
            outline: 0px !important;
        }
        .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
            background-color: #c0392b !important;
        }
      </style>
   </head>
   <body class="fix-menu">
      <!-- Pre-loader start -->
      <div class="theme-loader">
         <div class="loader-track">
            <div class="loader-bar"></div>
         </div>
      </div>
      <!-- Pre-loader end -->
    
         <!-- Container-fluid starts -->
       <!--  <div class="container">
            <div class="row">
               <div class="col-sm-6 offset-3">
              
                  <div class="login-card card-block auth-body mr-auto ml-auto bg-light p-2">
                     <form class="md-float-material" method="POST" action="<?php echo base_url();  ?>Dashboard">
                        <div class="text-center">
                           <img src="<?php echo base_url();  ?>venders/images/logo.png" alt="logo.png" style="height: 200px;">
                        </div>
                        <div class="auth-box">
                           <?php if( $error = $this->session->flashdata('Login_msg')): ?>
                           <div class="form-group">
                              <div class="input-icon">
                                 <div class="alert alert-dismissible alert-success" id="successMessage">
                                    <?php echo $error; ?>
                                 </div>
                              </div>
                           </div>
                           <?php endif; ?>
                           <div class="row m-b-20">
                              <div class="col-md-12">
                                 <h3 class="text-left txt-primary">Sign In</h3>
                              </div>
                           </div>
                           <hr/>
                           <div class="form-group">
                              <input type="email" name="email" value="" class="form-control" required="" placeholder="Your Email Address"> <span class="md-line"></span>
                           </div>
                           <div class="form-group">
                              <input type="password" name="pass" value="" class="form-control" required="" placeholder="Password"> <span class="md-line"></span>
                           </div>
                           <div class="row m-t-25 text-left">
                              <div class="col-sm-7 col-xs-12">
                                 <div class="checkbox-fade fade-in-primary">
                                    <label>
                                    <input type="checkbox" value=""> <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                    <span class="text-inverse">Remember me</span>
                                    </label>
                                 </div>
                              </div>
                              <div class="col-sm-5 col-xs-12 forgot-phone text-right"> <a href="auth-reset-password.html" class="text-right f-w-600 text-inverse"> Forgot Your Password?</a>
                              </div>
                           </div>
                           <div class="row m-t-30">
                              <div class="col-md-12">
                                 <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign in</button>
                              </div>
                           </div>
                           <hr/>
                           <div class="row">
                              <div class="col-md-10">
                                 <p class="text-inverse text-left m-b-0">Thank you and enjoy our website.</p>
                                 <p class="text-inverse text-left"><b>Your Authentication Team</b>
                                 </p>
                              </div>
                        
                           </div>
                        </div>
                     </form>
               
                  </div>
          
               </div>
    
            </div>
        
         </div>  -->
    

<div class="container h-100">
        <div class="d-flex justify-content-center h-100">
            <div class="user_card">
                  
                <div class="d-flex justify-content-center">
                    <div class="brand_logo_container">
                        <img src="<?php echo base_url();  ?>venders/images/logo.png" class="brand_logo" alt="Logo">
                    </div>
                </div>
                <div class="d-flex justify-content-center form_container">
                    <form method="POST" action="<?php echo base_url();  ?>Dashboard">
                        <div class="input-group mb-3">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" name="email" class="form-control input_user" value="" placeholder="username">
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                            </div>
                            <input type="password" name="pass" class="form-control input_pass" value="" placeholder="password">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlInline">
                                <label class="custom-control-label" for="customControlInline" style="color: #fff;">Remember me</label>
                            </div>
                        </div>
                            <div class="d-flex justify-content-center mt-3 login_container">
                    <button type="submit" name="button" class="btn login_btn">Login</button>
                   </div>
                    </form>
                </div>
        
                <div class="mt-4">
                   <?php if( $error = $this->session->flashdata('Login_msg')): ?>
                           <div class="form-group">
                              <div class="input-icon">
                                 <div class="alert alert-dismissible alert-success" id="successMessage">
                                    <?php echo $error; ?>
                                 </div>
                              </div>
                           </div>
                           <?php endif; ?>
                </div>
            </div>
        </div>
    </div>


  
      <script src="<?php echo base_url();?>venders/dist-assets/js/plugins/jquery-3.3.1.min.js"></script>
      <script src="<?php echo base_url();?>venders/dist-assets/js/plugins/bootstrap.bundle.min.js"></script>
      <script src="<?php echo base_url();?>venders/dist-assets/js/plugins/perfect-scrollbar.min.js"></script>
      <script src="<?php echo base_url();?>venders/dist-assets/js/scripts/script.min.js"></script>
      <script src="<?php echo base_url();?>venders/dist-assets/js/scripts/sidebar.large.script.min.js"></script>
      <script src="<?php echo base_url();?>venders/dist-assets/js/plugins/echarts.min.js"></script>
      <script src="<?php echo base_url();?>venders/dist-assets/js/scripts/echart.options.min.js"></script>
      <script src="<?php echo base_url();?>venders/dist-assets/js/scripts/dashboard.v1.script.min.js"></script>
   </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
 <title>SISTEM INFORMASI ABSENSI DAN KEPEGAWAIAN BERBASIS WEB PADA PERUSAHAAN PT. GAWI MAKMUR KALIMANTAN</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url();?>assets/logo3.png"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/demo4/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/demo4/assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/demo4/assets/css/authentication/form-1.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/demo4/assets/css/forms/theme-checkbox-radio.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/demo4/assets/css/forms/switches.css">

          <link href="<?php echo base_url();?>assets/alert/sweetalert2.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/alert/sweetalert2.min.css" rel="stylesheet">
  <script src="<?php echo base_url();?>assets/alert/sweetalert2.min.js"></script>
 <script src="<?php echo base_url();?>assets/alert/sweetalert2.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="form">
    

    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">
<center>
                        <h2 class="" ><a href="#"><span class="brand-name" style="color: blue; font-weight: bold; font-size: 16px;">
<img src="<?php echo base_url();?>assets/logo2.png" width="250px;"><br>
                      </span></a></h1>
                    </h2>
                  
                        <form action="<?php echo base_url();?>login/aksi_login" method="post">
                            <div class="form">

                                <div id="email-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="blue" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                    <input id="email" name="email" type="text" class="form-control" placeholder="Email">
                                </div>

                                <div id="password-field" class="field-wrapper input mb-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>
                                    <input autocomplete="new-password" id="password" name="password" type="password" class="form-control" placeholder="Password">
                                </div>
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper toggle-pass">
                                        <p class="d-inline-block">Show Password</p>
                                        <label class="switch s-primary">
                                            <input type="checkbox" id="toggle-password" class="d-none">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">Log In</button>
                                    </div>
                                    
                                </div>

                                <!-- <div class="field-wrapper text-center keep-logged-in">
                                    <div class="n-chk new-checkbox checkbox-outline-primary">
                                        <label class="new-control new-checkbox checkbox-outline-primary">
                                          <input type="checkbox" class="new-control-input">
                                          <span class="new-control-indicator"></span>Keep me logged in
                                        </label>
                                    </div>
                                </div> -->

                               <!--  <div class="field-wrapper">
                                    <a href="#" class="forgot-pass-link">Forgot Password?</a>
                                </div> -->

                            </div>
                        </form>                        
                        <p class="terms-conditions">© 2022 PT. GAWI MAKMUR KALIMANTAN. </p>

                    </div>                    
                </div>
            </div>
        </div>
        <div class="form-image">
           <div style="
    background-image: url(<?php echo base_url();?>assets/login2.png);
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #d5e7ed;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: 75%;
    background-position-x: center;
    background-position-y: center; 
    ">
            </div>
        </div>
    </div>

    
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="<?php echo base_url();?>assets/demo4/assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url();?>assets/demo4/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/demo4/bootstrap/js/bootstrap.min.js"></script>
    
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="<?php echo base_url();?>assets/demo4/assets/js/authentication/form-1.js"></script>

</body>
</html>

<?php if($this->session->flashdata('gagal_login') == TRUE): ?>
 <script type="text/javascript">
 swal("Gagal Login!", "Email atau Password yang Anda Masukan SALAH", "error");
 </script>
<?php endif; ?>
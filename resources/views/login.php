<!DOCTYPE html>
<html lang="en">
<head>
  <title>Laravel Tutorial</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo asset('public/assets/bootstrap/css/bootstrap.min.css') ?> ">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?> ">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css') ?> ">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo asset('public/assets/animate/animate.css') ?> ">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="<?php echo asset('public/assets/css-hamburgers/hamburgers.min.css') ?> ">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo asset('public/assets/animsition/css/animsition.min.css') ?> ">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo asset('public/assets/select2/select2.min.css') ?> ">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="<?php echo asset('public/assets/daterangepicker/daterangepicker.css') ?> ">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo asset('public/css/util.css') ?> ">
  <link rel="stylesheet" type="text/css" href="<?php echo asset('public/css/main.css') ?> ">
<!--===============================================================================================-->
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100" style="background-image: url('<?php echo asset('public/assets/images/bg-01.jpg') ?>');">
      <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
          <form class="login100-form validate-form-1 flex-sb flex-w" action="<?=action('LoginController@index')?>" method="post">
          <?=csrf_field()?>
          <span class="login100-form-title p-b-53">
            Sign In With
          </span>

          <a href="redirect/facebook" class="btn-face m-b-20">
            <i class="fa fa-facebook-official"></i>
            Facebook
          </a>

          <a href="redirect/google" class="btn-google m-b-20">
            <img src="<?php echo asset('public/assets/images/icons/icon-google.png') ?>" alt="GOOGLE">
            Google
          </a>
          
          <div class="p-t-31 p-b-9">
            <span class="txt1">
              Email
            </span>
          </div>
          <div class="wrap-input100 validate-input-1" data-validate = "Email is required">
            <input class="input100" type="text" name="email" >
            <span class="focus-input100"></span>
          </div>
          
          <div class="p-t-13 p-b-9">
            <span class="txt1">
              Password
            </span>

            <a data-toggle="modal" data-target="#myModal" href="#" class="txt2 bo1 m-l-5">
              Forgot?
            </a>
          </div>
          <div class="wrap-input100 validate-input-1" data-validate = "Password is required">
            <input class="input100" type="password" name="password" >
            <span class="focus-input100"></span>
          </div>

          <div class="container-login100-form-btn m-t-17">
            <button type="submit" class="login100-form-btn">
              Sign In
            </button>
          </div>

          <div class="w-full text-center p-t-55">
            <span class="txt2">
              Not a member?
            </span>

            <a href="#" data-toggle="modal" data-target="#myModal2" class="txt2 bo1">
              Sign up now
            </a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Forgot Password</h4>
      </div>
      <div class="wrap-login50 p-l-60 p-r-60">
      <form class="login100-form validate-form-2 flex-sb flex-w" method="post" action="<?=action('UsersController@updateSalary')?>">
      <div class="modal-body">
        
          <div class="p-t-31 p-b-9">
            <span class="txt1">
              Username
            </span>
          </div>
          <div class="wrap-input100 validate-input-2" data-validate = "Username is required">
            <input class="input100" type="text" name="username" >
            <span class="focus-input100"></span>
          </div>        
          
            <div class="container-login100-form-btn m-t-17">
              <button type="submit" class="login100-form-btn">Save</button>
        </div>
          </div>
        </form>
    </div>
    </div>
  </div>
</div>


  <!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Signup</h4>
      </div>
      <div class="wrap-login50 p-l-60 p-r-60">
      <form class="login100-form validate-form-3 flex-sb flex-w" method="post" action="<?=action('UsersController@store')?>">
          <div class="modal-body">
            <div class="p-t-31 p-b-9">
            <span class="txt1">
              Username
            </span>
          </div>
          <div class="wrap-input100 validate-input-3" data-validate = "Username is required">
            <input class="input100" type="text" value="" name="username" >
            <span class="focus-input100"></span>
          </div> 
                <div class="p-t-31 p-b-9">
            <span class="txt1">
              Email
            </span>
          </div>
          <div class="wrap-input100 validate-input-3" data-validate = "Email is required">
            <input class="input100" type="text" value="" name="email" >
            <span class="focus-input100"></span>
          </div>

          <div class="p-t-31 p-b-9">
            <span class="txt1">
              Password
            </span>
          </div>
          <div class="wrap-input100 validate-input-3" data-validate = "Password is required">
            <input class="input100" type="password" name="password" >
            <span class="focus-input100"></span>
          </div> 
           <?=csrf_field()?>
          <div class="p-t-31 p-b-9">
            <span class="txt1">
              Confirm Password
            </span>
          </div>
          <div class="wrap-input100 validate-input-3" data-validate = "Confirm Password is required">
            <input class="input100" type="password" name="password_confirmation" >
            <span class="focus-input100"></span>
          </div>         
          <div class="container-login100-form-btn m-t-17">
            <button class="login100-form-btn" type="submit">
              Sign up
            </button>
          </div>
         </div>
        </form>
    </div>
    </div>
  </div>
</div>

  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="<?php echo asset('public/assets/jquery/jquery-3.2.1.min.js') ?> "></script>
<!--===============================================================================================-->
  <script src="<?php echo asset('public/assets/animsition/js/animsition.min.js') ?> "></script>
<!--===============================================================================================-->
  <script src="<?php echo asset('public/assets/bootstrap/js/popper.js') ?> "></script>
  <script src="<?php echo asset('public/assets/bootstrap/js/bootstrap.min.js') ?> "></script>
<!--===============================================================================================-->
  <script src="<?php echo asset('public/assets/select2/select2.min.js') ?> "></script>
<!--===============================================================================================-->
  <script src="<?php echo asset('public/assets/daterangepicker/moment.min.js') ?> "></script>
  <script src="<?php echo asset('public/assets/daterangepicker/daterangepicker.js') ?> "></script>
<!--===============================================================================================-->
  <script src="<?php echo asset('public/assets/countdowntime/countdowntime.js') ?> "></script>
<!--===============================================================================================-->
  <script src="<?php echo asset('public/js/main.js') ?> "></script>

</body>
</html>
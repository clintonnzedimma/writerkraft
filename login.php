<?php
include $_SERVER['DOCUMENT_ROOT'].'/writerkraft/engine/env/ftf.php';
include ROOT.'/engine/controllers/login_ctrl.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>writerkraft - Sign In</title>

    <!-- Favicon  -->
    <link rel="icon" href="img/core-img/favicon.png">

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

 <style type="text/css">
   .warning-icon {
     margin:5px; 
     font-size: 14px;
   }
   .error-msg-container {

   }
   .error-msg-container ul {
    color: #ff6464; list-style: none; font-size: 12px;
   }
    .success-msg-container {

   }
   .success-msg-container ul {
        color: #00f400; list-style: none; font-size: 12px;
    } 
</style>    

    <div class="main">
      <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="img/core-img/signup.jpg" alt="sing up image"></figure>
                        <a href="signup.html" class="signup-image-link">Create an account</a>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign In</h2>
                        <form method="POST" class="register-form" id="login-form">
                           <?php if(isset($_POST['login']) && !empty($errors)): ?>  
                            <div class="error-msg-container">
                                <?php echo $ERROR_MESSAGE ?>
                            </div>
                            <?php endif ?> 


                           <?php if(isset($_POST['login']) && !empty($success)): ?> 
                            <div class="success-msg-container">
                                <? echo $SUCCESS_MESSAGE ?>
                            </div>
                            <?php endif ?>  


                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="your_name" placeholder="Username" required/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="your_pass" placeholder="Password" required/>
                            </div>
<!--                             <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div> -->
                            <div class="form-group form-button">
                                <input type="submit" name="login" id="signin" class="form-submit" value="Sign in"/>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="copywrite-text mt-30">
                            <p>
&copy; <script>document.write(new Date().getFullYear());</script> writerkraft. All rights reserved</a>
							</p>
                        </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
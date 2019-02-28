<?php
include $_SERVER['DOCUMENT_ROOT'].'/writerkraft/engine/env/ftf.php';
include ROOT.'/engine/controllers/signup_ctrl.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>writerkraft - Everyone does poetry</title>

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

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Create account</h2>
                        <form method="POST" class="register-form" id="register-form">

                           <?php if(isset($_POST['sign_up']) && !empty($errors)): ?>  
                            <div class="error-msg-container">
                                <?php echo $ERROR_MESSAGE ?>
                            </div>
                            <?php endif ?> 


                           <?php if(isset($_POST['sign_up']) && !empty($success)): ?> 
                            <div class="success-msg-container">
                                <? echo $SUCCESS_MESSAGE ?>
                            </div>
                            <?php endif ?> 

                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" name="username" id="name" placeholder="Username" value="<?php postConst('username') ?>" required/>
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="text" name="email" id="email" placeholder="Email" value="<?php postConst('email') ?>" required/>
                            </div>

                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-assignment"></i></label>
                                <input type="text" name="full_name" id="full_name" placeholder="Full name" value="<?php postConst('full_name') ?>" required/>
                            </div>

                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="password" id="pass" placeholder="Password" required/>
                            </div>
                            <div class="form-group">
                                <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                                <input type="password" name="confirm_password" id="re_pass" placeholder="Repeat your password" required/>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="sign_up" id="signup" class="form-submit" value="Sign Up"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="img/core-img/signup.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">Already have an account</a>
                    </div>
                </div>
                <div class="copywrite-text mt-30">
                            <p align="center">
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
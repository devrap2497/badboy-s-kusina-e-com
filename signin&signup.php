<?php require_once("controllers/functions.php")?>
<?php require_once("controllers/signup_user.php")?>
<?php require_once("controllers/signin_user.php")?>
<?php require_once("autoload.php")?>
<?php 
  
  if(isset($_SESSION['uid'])) {
  header("Location: view/menu.php");
  }


  if(isset($_GET['state']) && FB_APP_STATE == $_GET['state']) {
    $fblogin = tryAndLoginWithFacebook($_GET);
  }

?>
     <?php 	
									  			$success_msg ="";
									  			$error_msg = "";
												if(isset($_GET["signup"]))
													  {
														 if($_GET["signup"] == "true")
														 {
															$success_msg = '<div class="alert alert-success" style="animation: fadeOut 2s forwards;
									    animation-delay: 5s;">Successfully Registered.</div>';
		 													}
														 elseif ($_GET["registered"] == "false") {
															 $error_msg =  '<div class="alert alert-success" style="animation: fadeOut 2s forwards;
									    animation-delay: 5s;">Error!.</div>';
														  } 
													  }
											?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <link rel="stylesheet" href="css/signin_signup_style.css" />
    <link rel="shortcut icon" type="image/jpg" href="images/favicon.ico"/>
    <title>Badboy's Kusina | Sign In or Sign Up</title>
  </head>
  <body>
    <div class="container_pure">
      <div class="forms-container">
        <div class="signin-signup">
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="sign-in-form" method="POST">
            <h2 class="title">Sign in</h2>
                <?php echo $success_msg?>
      				   <?php echo $error_msg?>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" 
              							placeholder="Email" 
              							name="email_signin"
              							class="form-control <?php echo $invalid_email_signin; ?>"
              							value="<?php echo $email_signin; ?>" />
              							<!-- For CSS styles only -->
                      <?php if (!$invalid_credentials_signin): ?>
                        <div class="invalid-feedback">
                            Please enter your email.
                        </div>
                        <br>
                    <?php endif; ?>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" 
              							placeholder="Password" 
              							name="password_signin"
              							class="form-control <?php echo $invalid_password_signin; ?>"
              							value="<?php echo $password_signin; ?>" />
              							<!-- For CSS styles only -->
                    <?php if (!$invalid_credentials_signin): ?>
                        <div class="invalid-feedback">
                            Please enter your password.
                        </div>
                        <br>
                    <?php endif; ?>
                    <!-- Validation error form backend -->
				                <?php if ($invalid_credentials_signin): ?>
				                    <p class="text-danger">
				                        <small>Invalid email or password</small>
				                    </p>
				                <?php endif; ?>
            </div>
            <input type="submit" value="Login" class="btn solid" name="signin_btn" />
            <a href="forgotpassword.php">Forgot password?</a>
            <p class="social-text">Or Sign in with social platforms</p>
            <div class="social-media">
              <a href="<?php echo getFacebookLoginUrl();?>" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>

            </div>
          </form>

          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" class="sign-up-form" method="POST">
            <h2 class="title">Sign up</h2>

            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" 
              							placeholder="First name" 
              							name="fname"
                            id="input_field_fname"
                            onkeyup="has_value()" 
              							class="form-control <?php echo $invalid_fname; ?>" 
              							value="<?php echo $fname; ?>"/>
              							<!-- For CSS styles only -->
                     <?php if (!$invalid_credentials_signup): ?>
                     <div class="invalid-feedback">
                       Please enter a valid first name.
                     </div>
                     <br>
                     <?php endif; ?>
            </div>

            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" 
              							placeholder="Last name" 
              							name="lname"
                            id="input_field_lname"
                            onkeyup="has_value()" 
              							class="form-control <?php echo $invalid_lname; ?>" 
              							value="<?php echo $lname; ?>"/>
              							<?php if (!$invalid_credentials_signup): ?>
                     <div class="invalid-feedback">
                       Please enter a valid last name.
                     </div>
                     <br>
                     <?php endif; ?>
            </div>

            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="email" 
              							placeholder="Email" 
              							name="email_signup"
                            id="input_field_email"
                            onkeyup="has_value()" 
              							class="form-control <?php echo $invalid_email_signup; ?>" 
              							value="<?php echo $email_signup; ?>"/>
              							<?php if (!$invalid_credentials_signup): ?>
                     <div class="invalid-feedback">
                       Please enter a valid email.
                     </div>
                     <?php endif; ?>
                     <!-- Validation error form backend -->
                     <?php if ($invalid_credentials_signup): ?>
                     <p class="text-danger">
                        <small>Email already exists.</small>
                     </p>
                     <?php endif; ?>
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" 
              							placeholder="Password" 
              							name="password_signup"
                            id="input_field_password"
                            onkeyup="has_value()"
              							class="form-control <?php echo $invalid_password_signup; ?>" 
              							value="<?php echo $password_signup; ?>"/>
              							<?php if (!$invalid_credentials_signup): ?>
                     <div class="invalid-feedback">
                       Please enter a password.
                     </div>
                     <br>
                     <?php endif; ?>
            </div>

            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" 
              							placeholder="Confirm" 
              							name="confirm_password"
                            id="input_field_confirm_password"
                            onkeyup="has_value()" 
              							class="form-control <?php echo $invalid_confirm_password; ?>" 
              							value="<?php echo $confirm_password; ?>"/>
              							<?php if (!$invalid_credentials_signup): ?>
                     <div class="invalid-feedback">
                       Two password didn't match.
                     </div>
                     <br>
                     <?php endif; ?>
            </div>
            <input type="submit" class="btn" id="signup_btn" value="Sign up" name="signup_btn" />
            <!-- <p class="social-text">Or Sign up with social platforms</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
            </div> -->
          </form>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h3>New here ?</h3>
            <p>
              Click here to sign-up, it’s quick and easy.
            </p>
            <button class="btn transparent" id="sign-up-btn">
              Sign up
            </button>
          </div>
          <img src="images/cooking.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Click here to sign-in.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="images/log.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script>
    	//signup and signin JS  
const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container_pure");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});
//signup and signin JS end
    </script>
    <!-- disable button if empty input fields script -->
    <script type="text/javascript">
      function has_value() {
      if(document.getElementById("input_field_fname").value==="" || 
        document.getElementById("input_field_lname").value==="" || 
        document.getElementById("input_field_email").value==="" || 
        document.getElementById("input_field_password").value==="" || 
        document.getElementById("input_field_confirm_password").value==="") { 
            document.getElementById('signup_btn').disabled = true; 
        } else { 
            document.getElementById('signup_btn').disabled = false;
        }
    }
    </script>
  </body>
</html>
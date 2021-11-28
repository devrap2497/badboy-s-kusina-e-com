<?php require_once("../controllers/functions.php")?>
<?php 

/*error_reporting(0);*/

 if(!isset($_SESSION['uid'])){
  header("Location: ../index.php");
  }


  $servername = "localhost";
  $username   = "root";
  $password   = "";
  $dbname     = "badboyskusinadb";

  $conn = new mysqli($servername, $username, $password, $dbname); ?>


    
<!-- header section starts  -->

          <?php 
            $uid = $_SESSION['uid'];
            $sql = new mysqli("localhost", "root", "", "badboyskusinadb");
            $result = $sql->query("SELECT * FROM users WHERE uid = '$uid'") or die ($sql->error);

            ?>
<?php 

    $invalid_email   = "";  
    $invalid_fname   = "";
    $invalid_lname   = "";


    // For validation of credentials
    $invalid_credentials_update = false;

    // Credentials value: By default set to empty string
    $email   = "";
    $fname   = "";
    $lname   = "";


    /*
     *  Checks if the request is POST request 
     *  triggered when you login button
     */

   
    if(isset($_POST['update_profile_btn'])) {
        // Set cedentials
        $email   = $conn -> real_escape_string($_POST['email']);
        $fname   = $conn -> real_escape_string($_POST['fname']);
        $lname   = $conn -> real_escape_string($_POST['lname']);

        $api_key = "956e05a06dcd487da32772fe026117d5";
        $ch = curl_init();

        // account abstractapi.com
        // email = myemail@gmail.com
        curl_setopt_array($ch, [
          CURLOPT_URL => "https://emailvalidation.abstractapi.com/v1/?api_key=$api_key&email=$email",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_FOLLOWLOCATION => true 
        ]);

        $response = curl_exec($ch);

        curl_close($ch);

        $data = json_decode($response, true);

        // default value every post request/login button click event
        $invalid_credentials_signup = false;

        // Check if  all fields are empty
        if (empty($email) || empty($fname) || empty($lname))
        {
            // apply CSS style if email is empty
            if (empty($email))
                $invalid_email = 'is-invalid';
            
            // apply CSS style if firstname is empty
            if (empty($fname))
                $invalid_fname= 'is-invalid';
            // apply CSS style if lastname is empty
            if (empty($lname))
                $invalid_lname = 'is-invalid';


        }

        else if(!filter_var($email, FILTER_SANITIZE_EMAIL)) {
            $invalid_email = '<div style="margin-top: -10px;
                                                    margin-bottom: 10px;
                                                    color: #ff3838;
                                                    font-size: 12px;">Invalid email
                              </div>';
        }

        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $invalid_email = '<div style="margin-top: -10px;
                                                    margin-bottom: 10px;
                                                    color: #ff3838;
                                                    font-size: 12px;">Invalid email
                              </div>';
        }
        
        
        //this is not working, need to fixed.
       else if ($data["deliverability"] === "UNDELIVERABLE"){
          $invalid_email = '<div style="margin-top: -10px;
                                                    margin-bottom: 10px;
                                                    color: #ff3838;
                                                    font-size: 12px;">Invalid email (UNDELIVERABLE).
                              </div>';
        }

        else if ($data["is_disposable_email"]["value"] === true){ 
         $invalid_email = '<div style="margin-top: -10px;
                                                    margin-bottom: 10px;
                                                    color: #ff3838;
                                                    font-size: 12px;">Invalid email
                              </div>';
        }
 

        else if(!preg_match("/^[a-zA-Z ]*$/", $fname)) { 
            $invalid_fname = '<div style="margin-top: -10px;
                                                    margin-bottom: 10px;
                                                    color: #ff3838;
                                                    font-size: 12px;">Only letters and white space allowed
                              </div>';
        }

        else if(!preg_match("/^[a-zA-Z ]*$/", $lname)) { 
            $invalid_lname = '<div style="margin-top: -10px;
                                                    margin-bottom: 10px;
                                                    color: #ff3838;
                                                    font-size: 12px;">Only letters and white space allowed
                              </div>';
        }

        else {
        // executes if email is valid 

                // Call the update method to register new user
                if (update_profile($email, $fname, $lname))
                    header("Location: profile.php?update=true");
                
                // Set invalid credentials to true if username already exists.
                else
                {
                    $invalid_email = 'is-invalid';
                    $invalid_fname = 'is-invalid';
                    $invalid_lname = 'is-invalid';
                    $invalid_credentials_update = true;
                }
            }
                
        }


    $invalid_currentPass  = "";
    $invalid_newPass      = "";
   
    if(isset($_POST['update_password_btn'])) {
        // Set cedentials
        $currentPass  = $conn -> real_escape_string($_POST['currentPass']);
        $newPass      = $conn -> real_escape_string($_POST['newPass']);

        // default value every post request/login button click event
        $invalid_credentials_signup = false;

        // Check if  all fields are empty
        if (empty($currentPass) || empty($newPass))
        {
            // apply CSS style if email is empty
            if (empty($currentPass))
                $invalid_currentPass = '<div style="margin-top: -10px;
                                                    margin-bottom: 10px;
                                                    color: #ff3838;
                                                    font-size: 12px;">Current password is empty
                                        </div>';
            
            // apply CSS style if firstname is empty
            if (empty($newPass))
                $invalid_newPass = '<div style="margin-top: -10px;
                                                    margin-bottom: 10px;
                                                    color: #ff3838;
                                                    font-size: 12px;">New password is empty
                                        </div>';
            // apply CSS style if lastname is empty

        }


        else if
        (!preg_match("/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{8,20}$/", $newPass)) 
        {
          $invalid_newPass = '<div style="margin-top: -10px;
                                          margin-bottom: 10px;
                                          color: #ff3838;
                                          font-size: 12px;">New password should be between 8 to 20 charcters long, contains atleast one special character, lowercase, uppercase and a digit.
                                        </div>';
        }

    
 

        else {
        // executes if email is valid 

                // Call the update method to register new user
                if (update_password($currentPass, $newPass))
                    header("Location: profile.php?update_pwd=true");
                
                // Set invalid credentials to true if username already exists.
                else
                {
                    $invalid_currentPass = 'is-invalid';
                    $invalid_newPass     = 'is-invalid';
                    $invalid_credentials_update = true;
                }
            }
                
        }
?>

<?php require('menu-header.php')?>

<style>
  /*.profile-container {
    margin: 3rem 20.5%;
  }

  .profile-container .profile-details {
    padding: 3rem 25.3%;

  }

  .profile-container .profile-details .fname, .profile-container .profile-details .lname{
   text-transform: capitalize;
  }

  .profile-container .profile-details input{
    padding: 1.3rem 2rem;
    margin-bottom: 10px;
    width: 100%;
    border: 1px solid #DCDCDC;
    margin-top: -6px;
    font-size: 15px;
    font-family: Open Sans;
    color: #676767;
  }

  .profile-container .profile-details label{
    margin-left: 20px;
    font-size: 11px;
    font-family: Open Sans;
    position: relative;
    color: #707070;
    background-color: #fff;
    padding: 0 .3rem 0 .3rem; 
  }

  input:focus,
  select:focus,
  textarea:focus,
  label:focus {
      outline: 1px solid #ff3838;
  }
  
  .profile-container .profile-details button{
    font-size: 11px;
    font-family: Open Sans;
    padding: 15px 20px;
    float: right;
    cursor: pointer;
    background: #ff3838;
    color: #fff;
    font-weight: 600;
    font-size: 14px;
  }

  .profile-container .profile-details button:hover {
    opacity: .8;
  }*/

  *,
*:focus{outline: 1px}

.form{
  width: 500px;
  margin: 0 auto;
  margin-top: 150px;
  background: #fff
}
.form-item{
  position: relative;
  margin-bottom: 15px
}

.form-item input{
  /*display: block;*/
  width: 500px;
  height: 45px;
  border: solid 1px #ccc;
  padding: 0 12px;
  font-size: 15px;
  font-family: Open Sans;
  color: #6D6D6D;
  margin-bottom: 15px;

}

/*#arrowDownEmail {
  font-size: 17px;
  position: absolute;
  right: 94.6%;
  top: 16.2%;
  z-index: 1;
  color: #ff3838;
  display: none;
}

#arrowDownFname {
  font-size: 17px;
  position: absolute;
  right: 94.6%;
  top: 25.5%;
  z-index: 1;
  color: #ff3838;
  display: none;
}

#arrowDownLname {
  font-size: 17px;
  position: absolute;
  right: 94.6%;
  top: 34.7%;
  z-index: 1;
  color: #ff3838;
  display: none;
}*/

.form-item .input-error{
  /*display: block;*/
  width: 500px;
  height: 45px;
  border: solid 1px #ff3838;
  padding: 0 12px;
  font-size: 15px;
  font-family: Open Sans;
  color: #6D6D6D;
  margin-bottom: 15px;
}

.form-item .input-error:focus{
  /*display: block;*/
  border: 1px solid #ff3838;
}

.form-item .input-error:focus + .label-error{
  /*display: block;*/
  color: #ff3838;
}

.input-error:placeholder-shown + .label-error {
  color: #ff3838;
}

.input-error:not(:placeholder-shown) + .label-error{
  color: #ff3838;
}

.form-control-placeholder .label-error {
  background-color: #fff;
  padding: 0 3px 0 3px;
  font-size: 14px;
  color: #ff3838;
}

label {
  font-family: Open Sans;
}

.form-item input:focus {
  border: 1px solid #363A43;
}

.form-item input:focus + label{
  color: #363A43;
  font-size: 10px;
}

 form button {
    font-size: 11px;
    font-family: Open Sans;
    padding: 15px 20px;
    float: right;
    cursor: pointer;
    background: #ff3838;
    color: #fff;
    font-weight: 600;
    font-size: 14px;

  }

  form button:hover {
    opacity: .8;
  }

/*.form-item label{
  position: absolute;
  cursor: text;
  z-index: 2;
  top: 13px;
  left: 10px;
  font-size: 12px;
  font-weight: bold;
  background: #fff;
  padding: 0 10px;
  color: #999;
  transition: all .3s ease
}
.form-item input:focus + label,
.form-item input:valid + label{
  font-size: 11px;
  top: -5px
}
.form-item input:focus + label{
  color: #ff3838;
}*/

/*.form-group {
  position: relative;
  margin-bottom: 1.5rem;
}*/
.form-control-placeholder {
  background-color: #fff;
  padding: 0 3px 0 3px;
  font-size: 14px;
  color: #999;
}

/*input:not(:placeholder-shown) {
  font-size:  10px;
}*/

input:placeholder-shown + .form-control-placeholder {
  margin-top:2.2%;
}

input:not(:placeholder-shown) + .form-control-placeholder{
  font-size: 10px;
  color: #676767;
}

input + .form-control-placeholder ,
.form-control:focus + .form-control-placeholder{
  position: absolute;
  transition: all .3s ease;
  margin-left:-97.5%;
  margin-top:-1.5%;

}

.invalid-feedback {
  color: #ff3838;
  display: block;
  position: relative;
}

#emptyEmail, #emptyFname, #emptyLname {
  margin-top: -10px;
  margin-bottom: 10px;
  display: none;
  color: #ff3838;
  font-size: 12px;
}

#emptyCurrentPass, #emptyNewPass{
  margin-top: -10px;
  margin-bottom: 10px;
  display: none;
  color: #ff3838;
  font-size: 12px;
}

@media(max-width: 577px) {
.form, .form-item input,
.form-item .input-error {
    width: 450px;
  }

}

</style>
<div class="form">
  <div class="form-item">
    <?php 

      $uid = $_SESSION['uid'];
      $sql = "SELECT * FROM users WHERE uid = $uid";
      $result = $conn->query($sql);

      $row = mysqli_fetch_array($result);  

    ?>
    <form id="profile-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >
      
        <h1 style="font-size: 15px; color: #363A43; margin-bottom: 5rem;">MY PROFILE</h1>

        <?php 

         if(isset($_GET["update"]))
              {
                if($_GET["update"] == "true")
                {
                    echo '<div style="width: 500px;
                    height: 45px;
                    border-left: solid 2px #96C483;
                    padding: 0 12px;
                    font-size: 13px;
                    justify-content: flex-start;
                    align-items: center;
                    display: flex;
                    font-family: Open Sans;
                    color: #6D6D6D;">
                    Your changes have been successfully saved.
                  </div>
                  <br>';
                }
                elseif ($_GET["update"] == "false") {
                   echo '<div style="width: 500px;
                    height: 45px;
                    border-left: solid 2px #F67656;
                    padding: 0 12px;
                    font-size: 13px;
                    justify-content: flex-start;
                    align-items: center;
                    display: flex;
                    font-family: Open Sans;
                    color: #6D6D6D;">
                    There was an error updating your profile, try again.
                  </div>
                  <br>';
                 } 
              }
          ?>
    <div>
      <input type="email" 
             id="email" 
             autocomplete="off" 
             class="form-control" 
             placeholder=" " 
             value="<?=$row['email'];?>"
             name="email">
      <label class="form-control-placeholder" for="email" id="label-email">Email</label>
      <!-- <i class="fas fa-sort-down" id="arrowDownEmail"></i> -->
    </div>
    <?=$invalid_email;?>  
    <div id="emptyEmail">Email name is required</div> 

    <div>
      <input type="text" 
             id="fname" 
             autocomplete="off" 
             class="form-control" 
             placeholder=" " 
             value="<?=$row['fname'];?>" name="fname" style="text-transform: capitalize;" >
      <label class="form-control-placeholder" for="fname" id="label-fname">First name</label>
      <!-- <i class="fas fa-sort-down" id="arrowDownFname"></i> -->
    </div>
    <?=$invalid_fname;?>  
    <div id="emptyFname">First name is required</div> 

    <div>
      <input type="text" 
             id="lname" 
             autocomplete="off" 
             class="form-control" 
             placeholder=" " 
             value="<?=$row['lname'];?>" name="lname" style="text-transform: capitalize;" >
      <label class="form-control-placeholder" for="lname" id="label-lname">Last name</label>
      <!-- <i class="fas fa-sort-down" id="arrowDownLname"></i> -->
    </div>
    <?=$invalid_lname;?>  
    <div id="emptyLname">Last name is required</div> 

      <input type="hidden" name="uid" value="<?=$row['uid']?>">
      <button type="submit" name="update_profile_btn">SAVE</button><br>
    </form>


    <form id="password-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" >
      <br><br><br><br><br><br><br>
        <h1 style="font-size: 15px; color: #363A43; margin-bottom: 5rem; font-weight: 700;">PASSWORD</h1>
      <?php 

         if(isset($_GET["update_pwd"]))
              {
                if($_GET["update_pwd"] == "true")
                {
                    echo '<div style="width: 500px;
                    height: 45px;
                    border-left: solid 2px #96C483;
                    padding: 0 12px;
                    font-size: 13px;
                    justify-content: flex-start;
                    align-items: center;
                    display: flex;
                    font-family: Open Sans;
                    color: #6D6D6D;">
                    Your changes have been successfully saved.
                  </div>
                  <br>';
                }

                elseif ($_GET["update_pwd"] == "false") {
                   echo '<div style="width: 500px;
                    height: 45px;
                    border-left: solid 2px #F67656;
                    padding: 0 12px;
                    font-size: 13px;
                    justify-content: flex-start;
                    align-items: center;
                    display: flex;
                    font-family: Open Sans;
                    color: #6D6D6D;">
                    There was an error updating your password, try again.
                  </div>
                  <br>';
                 } 
              }

              if(isset($_GET['pwdCheck'])) {
                if($_GET['pwdCheck'] == "false") {
                   echo '<div style="width: 500px;
                    height: 45px;
                    border-left: solid 2px #F67656;
                    padding: 0 12px;
                    font-size: 13px;
                    justify-content: flex-start;
                    align-items: center;
                    display: flex;
                    font-family: Open Sans;
                    color: #6D6D6D;">
                    The entered old password does not match the stored password.
                  </div>
                  <br>';
                 } 
              }
          ?>
       
    <div>
      <input type="password" 
             id="current-pass" 
             autocomplete="off" 
             class="form-control" 
             placeholder=" "
             name="currentPass">
      <label class="form-control-placeholder" for="current-pass" id="label-current-pass">Current password</label>
    </div>
    <div id="emptyCurrentPass">Please enter your old password</div> 
    <?=$invalid_currentPass;?>   
    <div>
      <input type="password" 
             id="new-pass" 
             autocomplete="off" 
             class="form-control" 
             placeholder=" "
             name="newPass">
      <label class="form-control-placeholder" for="new-pass" id="label-new-pass">New password</label>
    </div>
    <?=$invalid_newPass;?>
    <div id="emptyNewPass">Please enter a password</div> 

      <button type="submit" name="update_password_btn">SAVE</button><br><br><br><br><br>
    </form>



  </div>
  <center>
    <p style="font-size: 16px; color: #6D6D6D;">You can delete your account and personal data associated with it</p>
    <br><br>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
      <input type="hidden" name="uid" value="<?=$uid;?>">
      <a href="#delete-account" style="font-weight: 900; font-size: 15px; color: #D72E40;">DELETE MY ACCOUNT</a>
    </form>
  </center>
</div>
<br><br><br><br><br>
<!-- <div class="profile-container">
  Profile-Container
  <div class="profile-details">
    <center>
    <h3 style="font-weight: 600; margin-bottom: 4rem; font-size: 15px; font-family: Open Sans; color: #363A43;">MY PROFILE</h3>
    </center>

    
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <label>Email</label>
          <input type="email" name="" value="<?=$row['email'];?>">
        <label>First name</label>
          <input type="text" name="" class="fname" value="<?=$row['fname'];?>">
        <label>Last name</label>
          <input type="text" name="" class="lname" value="<?=$row['lname'];?>">

          <button type="submit" name="">SAVE</button>
      </form>
  </div>

  <div class="profile-details">
    <center>
    <h3 style="font-weight: 600; margin-bottom: 4rem; font-size: 15px; font-family: Open Sans; color: #363A43;">PASSWORD</h3>
    </center>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <label>Current password</label>
          <input type="email" name="" >
        <label>New password</label>
          <input type="text" name="" >
          <button type="submit" name="">SAVE</button>
      </form>
  </div>

</div>
 -->

<div class="js-menu__context">
  <div id="main-nav" class="js-menu js-menu--right">
    <div class="heading__div">
      <?php if(!empty($_SESSION['cart'])){ ?>
        <h4 class="cart__heading">Shopping Cart</h4>
      <?php }else {?>

      <?php }?>  
     </div>
    <strong>
    <span class="js-menu__close" style=" color: #83818C; 
                                       padding: 0 4px 0 4px; 
                                    margin-top: 5px;">✕</span></strong>

    
    <br><br>
    <div id="displayCheckout">
      <?php 

        if(!empty($_SESSION['cart'])){

            $empty_cart = '';
            $outputTable = '';
            $total_quantity = 0;
            $menu = "menu.php";
            $total = 0;
        
        ?>
            <table>
                <thead>
                    <tr>

                    </tr>
                </thead>
                <?php 
            foreach ($_SESSION["cart"] as $key => $value){
              $sql = "SELECT product_image, product_description FROM food_product WHERE product_id = ".$value['p_id']." ";
              if ($result = $conn->query($sql)) {
                  if ($result->num_rows > 0) {
                     while($row = $result->fetch_assoc()) {
                        $image = $row['product_image'];
                        $product_description = $row['product_description'];
                      }
                    }
                  }
                  else {
                        echo"Query failed: %s\n", $conn->error;
                  }

                  ?> 

               
                <tbody>
                <tr>
                    <td>
                    <a class="decrement_cart"  data-id="<?php echo $value['p_id'];?>" style="background-color: transparent; position:relative ; font-size: 14px; color: #FF3838; cursor: pointer; padding: 0; -webkit-user-select: none;  
                        -moz-user-select: none;    
                        -ms-user-select: none;      
                        user-select: none;">
                    <b>
                        <i class="fas fa-minus"></i>
                    </b>


                    <span style="color: #666666; padding: 0 5px 0 5px; -webkit-user-select: none;  
                    -moz-user-select: none;    
                    -ms-user-select: none;      
                    user-select: none;"><?php echo $value['p_quantity'];?>
                    </span>

                    <a class="add_cart" name="add_to_cart" data-id="<?php echo $value['p_id'];?>" style="background-color: transparent; position:relative ; font-size: 14px; color: #FF3838; padding: 0; -webkit-user-select: none;  
                      -moz-user-select: none;    
                      -ms-user-select: none;      
                      user-select: none;">
                      <b>
                        <i class="fas fa-plus"></i>
                    </b>
                    </td>

                    <td class='td_img' style='color: #666666;'><img src='../images/<?php echo $image;?>'><?php echo $value['p_name'];?><br>
                   <?php echo $product_description;?>
                   </td>

                   

                    <td style='color: #666666;'>₱ <?php echo number_format($value['p_quantity'] * $value['p_price'], 0);?>

                    </td>

                    

                    <td><a id="<?php echo $value['p_id'];?>" class="delete" style='cursor: pointer; color: #FA363D;'>Remove</a>
                    </td>

                    <input type="hidden"
                       class="quantity" 
                       value="1"
                       min="1" 
                       id="product_quantity<?php echo$value['p_id'];?>" 
                       style="
                       text-align: center; 
                       padding: 10px 0 10px 10px; 
                       width: 60px; 
                       /*box-shadow: 0 10px 40px rgba(159, 162, 177, .8);*/ ">
                    <input type='hidden' id='product_name<?php echo$value['p_id'];?>' value='<?php echo $value['p_name'];?>' name='product_name'>
                    <input type='hidden' id='product_price<?php echo$value['p_id'];?>' value='<?php echo $value['p_price'];?>' name='product_price'>

                    
                    
                    
                </tr>
                <?php 
                $total = $total + ($value['p_price'] * $value['p_quantity']);
                $total_quantity = $total_quantity + $value['p_quantity'];
                $_SESSION['cart_quantity'] = $total_quantity;

                }
                ?>
            </tbody>
          </table>
          <div style="position: fixed; bottom: 0; width: 95%; z-index: 999;">
            <h1 style='color: #666666; display:flex; align-items: center; justify-content: space-between; font-weight: 400; '>
              <p>Subtotal<br><small style='font-weight: 300; font-size: 15px;'>Delivery Fee will be shown after you review order</small></p>
              <p>₱ <?php echo number_format($total, 2);?></p>
            </h1>
            <a href='' class='check__out' style='margin: 15px 0 15px 0; font-weight: 800;'>Review Order</a>
            </div>
          
        <?php     
        }
        else { ?>
        <h1 class="empty__cart__text" style="font-size: 17px;">Your cart is empty.</h1>
        <img src="../images/empty_cart.svg" width="200" class="empty__cart__img">
        <h2 class="js-menu__close" style="text-align: center;
        color: #00A5D4; font-size: 15px; margin-top: 25px;">Continue browsing</h2>

       <?php }?>


                
    </div>
  </div>
</div>


<div class="js-menu__context">
  <div id="main-nav2" class="js-menu js-menu--right">
    <div class="heading__div">
    <strong>
    <span class="js-menu__close" style=" color: #83818C; 
                                       padding: 0 4px 0 4px; 
                                    margin-top: 5px;">✕</span></strong>

    
    <br><br>
    </div>
     <ul style="">
      <li style="list-style-type: none; font-size: 15px; margin-bottom: 20px; margin-top: 40px;"><a href="profile.php" style="color: #686868;">Profile</a></li>
      <li style="list-style-type: none; font-size: 15px; margin-bottom: 20px; "><a href="my-orders.php" style="color: #686868;">My orders</a></li>
      <li style="list-style-type: none; font-size: 15px; margin-bottom: 20px; "><a href="../logout.php" style="color: #686868;">Logout</a></li>
    </ul>
  </div>
</div>

<?php require_once("../templates/footer2.php");?>
<script src="./cart__functions.js"></script>
<script src="../js/script.js"></script>


<script>

  // profile 
  const email = document.getElementById('email')  
  const fname = document.getElementById('fname')
  const lname = document.getElementById('lname')
  const form  = document.getElementById('profile-form')
  const labelEmail = document.getElementById('label-email')
  const labelFname = document.getElementById('label-fname')
  const labelLname = document.getElementById('label-lname')
  const emptyEmail = document.getElementById('emptyEmail')
  const emptyFname = document.getElementById('emptyFname')
  const emptyLname = document.getElementById('emptyLname')
 /* const arrowDownEmail  = document.getElementById('arrowDownEmail')
  const arrowDownFname  = document.getElementById('arrowDownFname')
  const arrowDownLname  = document.getElementById('arrowDownLname')*/

  // password

  const currentPass = document.getElementById('current-pass')
  const newPass     = document.getElementById('new-pass')
  const passForm    = document.getElementById('password-form')
  const labelCurrentPass  = document.getElementById('label-current-pass')
  const labelNewPass      = document.getElementById('label-new-pass')

  const emptyCurrentPass      = document.getElementById('emptyCurrentPass')
  const emptyNewPass          = document.getElementById('emptyNewPass')

  var regEx = /*/^(?=.*[a-z])(?=.*[0-9])(?=.*[A-Z])(?=.*[!?])[a-zA-Z0-9!?]{8,}$/*//^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,20}$/


  form.addEventListener('submit', (e) => {
    // profile
    if(email.value === '' || email.value === null) {
      e.preventDefault()
      emptyEmail.style.display = "block"
      email.classList.add("input-error")
      labelEmail.classList.add("label-error")
    }

    if(fname.value === '' || fname.value === null) {
      e.preventDefault()
      emptyFname.style.display = "block"
      fname.classList.add("input-error")
      labelFname.classList.add("label-error")
    }

    if(lname.value === '' || lname.value === null) {
      e.preventDefault()
      emptyLname.style.display = "block"
      lname.classList.add("input-error")
      labelLname.classList.add("label-error")
    }
  })

 passForm.addEventListener('submit', (e) => { 
    // password
    if(currentPass.value === '' || currentPass.value === null) {
      e.preventDefault()
      emptyCurrentPass.style.display = "block"
      currentPass.classList.add("input-error")
      labelCurrentPass.classList.add("label-error")
    }

    if(newPass.value === '' || newPass.value === null) {
      e.preventDefault()
      emptyNewPass.style.display = "block"
      newPass.classList.add("input-error")
      labelNewPass.classList.add("label-error")
    }

    if(!regEx.test(newPass.value)) {
      e.preventDefault()
      emptyNewPass.style.display = "block"
      emptyNewPass.textContent = "New password should be between 8 to 20 charcters long, contains atleast one special character, lowercase, uppercase and a digit."

      newPass.classList.add("input-error")
      labelNewPass.classList.add("label-error")
    }


  })

</script>

<script>

  var regEx = /^(?=.*[a-z])(?=.*[0-9])(?=.*[A-Z])(?=.*[!?])[a-zA-Z0-9!?]{8,}$/
  
    $('form input').keyup(function() {

   //profile form
    if ($('#email').val().length > 0){ // check if value changed
      emptyEmail.style.display = "none"
      email.classList.remove("input-error")
      labelEmail.classList.remove("label-error")
      
    }

    if ($('#fname').val().length > 0){
      emptyFname.style.display = "none"
      fname.classList.remove("input-error")
      labelFname.classList.remove("label-error")
      
    }

    if ($('#lname').val().length > 0)  {
      emptyLname.style.display = "none"
      lname.classList.remove("input-error")
      labelLname.classList.remove("label-error")

    }



   //password form
   if ($('#current-pass').val().length > 0) {
      emptyCurrentPass.style.display = "none"
      currentPass.classList.remove("input-error")
      labelCurrentPass.classList.remove("label-error")
    }

    if ($('#new-pass').val().length > 0) {
      emptyNewPass.style.display = "none"
      newPass.classList.remove("input-error")
      labelNewPass.classList.remove("label-error")
    }

  });

</script>


<script>
jQuery(function($){
  $('.js-menu__open').on('touchend click', function(){
        var menu = $(this).attr('data-menu');

        $(menu).toggleClass('js-menu__expanded');
        $(menu).parent().toggleClass('js-menu__expanded');

});

$('.js-menu__context, .js-menu__close').on('touchend click', function(event){
    
    if ( $(event.target).hasClass('js-menu__context') || $(event.target).hasClass('js-menu__close') ) {
         $('.js-menu__expanded').removeClass('js-menu__expanded');
    }
});
  
});
</script>


<script >
jQuery(function($){
  $('.js-menu__open2').on('touchend click', function(){
        var menu = $(this).attr('data-menu');

        $(menu).toggleClass('js-menu__expanded');
        $(menu).parent().toggleClass('js-menu__expanded');

});

$('.js-menu__context, .js-menu__close').on('touchend click', function(event){
    
    if ( $(event.target).hasClass('js-menu__context') || $(event.target).hasClass('js-menu__close') ) {
         $('.js-menu__expanded').removeClass('js-menu__expanded');
    }
});
  
});
</script> 

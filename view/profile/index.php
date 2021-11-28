<?php session_start();

error_reporting(0);

  $servername = "localhost";
  $username   = "root";
  $password   = "";
  $dbname     = "badboyskusinadb";

  $conn = new mysqli($servername, $username, $password, $dbname); ?>


    
<!-- header section starts  -->


        <?php 


         if(isset($_GET["update"]))
              {
                if($_GET["update"] == "true")
                {
                  echo  '<script> alert("Successfully updated!"); </script>';
                }
                elseif ($_GET["update"] == "false") {
                   echo  '<script> alert("There was an error updating the data!"); </script>';
                 } 
              }
          ?>

          <?php 
            $uid = $_SESSION['uid'];
            $sql = new mysqli("localhost", "root", "", "badboyskusinadb");
            $result = $sql->query("SELECT * FROM users WHERE uid = '$uid'") or die ($sql->error);

            ?>


<?php 

    $full_name = $_SESSION['fname'] ." ".$_SESSION['lname'];
    //The strtoupper() function converts a string to uppercase.
    $name  = strtoupper($full_name); 
    //prefixes that needs to be removed from the name
    $remove = ['.', 'MRS', 'MISS', 'MS', 'MASTER', 'DR', 'MR'];
    $nameWithoutPrefix=str_replace($remove," ",$name);

    $words = explode(" ", $nameWithoutPrefix);

    //this will give you the first word of the $words array , which is the first name
     $firtsName = reset($words); 

    //this will give you the last word of the $words array , which is the last name
     $lastName  = end($words);

     $trim_fname = substr($firtsName,0,1); // this will echo the first letter of your first name
     $trim_lname =  substr($lastName ,0,1); // this will echo the first letter of your last name

     $joined_trim_full_name = $trim_fname ."". $trim_lname;


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Badboy's Kusina</title>

    <!-- font awesome cdn link  -->
    <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- material icon link -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/style-sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" type="image/jpg" href="../../images/favicon.ico"/>

  

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<style>
    .js-menu__open2 {
        display: inline-block;
        padding: 0;
        width: 32px;
        height: 32px;    
        line-height: 32px;
        font-size: 12px;
        font-weight: lighter !important;
        color: #fff !important;
        text-align: center;
        white-space: nowrap;
        vertical-align: baseline;
        background-color: #363A44;
        border-radius:50px;
        position: ;
        cursor: pointer;
        margin-right: 80px;
    }

    .logo {
        left:18%; position: fixed;
    }

    .signin_signup {
      margin-right: 77px;
    }


    @media (max-width: 991px) {
      .signin_signup{
        margin-right: -6px;
      }

     .js-menu__open2 {
        margin-right: 0;

      }
      .logo {
        left: 1.5%;
      }
    }

    @media (max-width: 767px) {
      .logo {
        left: 1.5%;
      }
    }
</style>
<body>



    <header id="header">

    <a href="../../index.php" class="logo"><img src="../../images/logo.png"></a>

    <a class="js-menu__open" id="profile-nav__style" data-menu="#main-nav" style="margin-right: 30px; padding: 5px 5px 5px 7px; border-radius: .5rem; background-color: #fff;">
        <i class="bx bx-cart-alt " style="color: #363A44;"></i>
    <?php if(empty($_SESSION['cart_quantity'])) { 
      $notif = "";

      ?>
      <?php } else{
      
           if(!empty($_SESSION['cart'])){
            foreach ($_SESSION["cart"] as $key => $value){
              $sql = "SELECT product_image FROM food_product WHERE product_id = ".$value['p_id']." ";
              if ($result = $conn->query($sql)) {
                  if ($result->num_rows > 0) {
                     while($row = $result->fetch_assoc()) {
                        $image = $row['product_image'];
                      }
                    }
                  }
                  else {
                        echo"Query failed: %s\n", $conn->error;
                  }

                  ?> 

                <?php 
                $total = $total + ($value['p_price'] * $value['p_quantity']);
                $total_quantity = $total_quantity + $value['p_quantity'];
                

                }
                ?>
                   <span style="display: inline-block;
                              padding: 0;
                              width: 20px;
                              height: 20px;    
                              line-height: 20px;
                              font-size: 10px;
                              font-weight: bolder !important;
                              color: #fff !important;
                              text-align: center;
                              white-space: nowrap;
                              vertical-align: baseline;
                              background-color: #FA363D;
                              border-radius:50px;
                              position: absolute;
                              /*right: 10.5%;
                              bottom: 55.5%;*/
                              margin-left: -7px;
                              top: 16.5%;
                              "><?php  echo $total_quantity; ?>
                    </span>
      

       
 

      <?php  }}?>
    </a> 

    <?php if(!isset($_SESSION['uid'])) {?>
    <a href="../../signin&signup.php" class="signin_signup" style="text-transform: capitalize; font-size: 15px; color: #363A44; font-weight: 650;">sign in/sign up</a>
    <?php } else { ?>

    <a class="js-menu__open2" id="profile-nav__style" data-menu="#main-nav2"  
       style="">
        <?php echo $joined_trim_full_name;?>
    </a>
    <?php } ?>

</header>


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

label {
  font-family: Open Sans;
}

.form-item input:focus {
  border: 1px solid #D72E40;
}

.form-item input:focus + label{
  color: #D72E40;
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

</style>
<div class="form">
  <div class="form-item">
    <?php 

      $uid = $_SESSION['uid'];
      $sql = "SELECT * FROM users WHERE uid = $uid";
      $result = $conn->query($sql);

      $row = mysqli_fetch_array($result);  

    ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
      <center>
        <h1 style="font-size: 15px; color: #363A43; margin-bottom: 5rem;">MY PROFILE</h1>
      </center>
    <div>
      <input type="email" 
             id="email" 
             autocomplete="off" 
             class="form-control" 
             placeholder=" " 
             value="<?=$row['email'];?>" >
      <label class="form-control-placeholder" for="email">Email</label>
    </div>

    <div>
      <input type="text" 
             id="fname" 
             autocomplete="off" 
             class="form-control" 
             placeholder=" " 
             value="<?=$row['fname'];?>" style="text-transform: capitalize;" >
      <label class="form-control-placeholder" for="fname">First name</label>
    </div>

    <div>
      <input type="text" 
             id="lname" 
             autocomplete="off" 
             class="form-control" 
             placeholder=" " 
             value="<?=$row['lname'];?>" style="text-transform: capitalize;" >
      <label class="form-control-placeholder" for="lname">Last name</label>
    </div>

      <button type="submit" name="">SAVE</button><br>
    </form>


    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
      <br><br><br><br><br><br><br>
      <center>
        <h1 style="font-size: 15px; color: #363A43; margin-bottom: 5rem; font-weight: 700;">PASSWORD</h1>
      </center>
    <div>
      <input type="password" 
             id="current_password" 
             autocomplete="off" 
             class="form-control" 
             placeholder=" ">
      <label class="form-control-placeholder" for="current_password">Current password</label>
    </div>

    <div>
      <input type="password" 
             id="new_password" 
             autocomplete="off" 
             class="form-control" 
             placeholder=" ">
      <label class="form-control-placeholder" for="new_password">New password</label>
    </div>

      <button type="submit" name="">SAVE</button><br><br><br><br><br>
    </form>
  </div>
</div>
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
      <li style="list-style-type: none; font-size: 15px; margin-bottom: 20px; margin-top: 40px;"><a href="index.php" style="color: #686868;">Profile</a></li>
      <li style="list-style-type: none; font-size: 15px; margin-bottom: 20px; "><a href="../my-orders.php" style="color: #686868;">My orders</a></li>
      <li style="list-style-type: none; font-size: 15px; margin-bottom: 20px; "><a href="../../logout.php" style="color: #686868;">Logout</a></li>
    </ul>
  </div>
</div>

<?php require_once("../../templates/footer2.php");?>
<script src="../cart__functions.js"></script>
<script src="../../js/script.js"></script>

<script >
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
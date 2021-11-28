
<?php session_start(); ?>

<?php 
error_reporting(0);

  $servername = "localhost";
  $username   = "root";
  $password   = "";
  $dbname     = "badboyskusinadb";

  $conn = new mysqli($servername, $username, $password, $dbname);

?>


<?php 

   if(isset($_SESSION['uid'])) {
    
    $uid = $_SESSION['uid'];
    $sql = "SELECT * FROM users WHERE uid = '$uid' ";
    $result = $conn->query($sql);

    $row = $result->fetch_array(MYSQLI_ASSOC);
    $full_name = $row['fname'] ." ".$row['lname'];
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

     $joined_trim_full_name = $trim_fname ." ". $trim_lname;
   }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Badboy's Kusina</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->

    <!-- font awesome cdn link  -->
    <!-- <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- material icon link -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" type="image/jpg" href="images/favicon.ico"/>

  

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<style>
    .js-menu__open2 {
        display: inline-block;
        padding: 0;
        width: 37px;
        height: 37px;    
        line-height: 37px;
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

    .mylogo {
      color: #fff;
    }

    .mylogo.active {
      color: #363A43;
      transition: 200ms ease;
    }
    .logo {
        left:18%; 
        position: fixed;
    }

    .header_margin {
      background: transparent;
    }

    .header_margin.active {
      background: #fff;
      transition: 200ms ease;
    }

    @media (max-width: 991px) {
     .js-menu__open2 {
        margin-right: 0;

      }
      .logo {
        left: 1.5%;
      }
    }

    .signin_signup {
      margin-right: 77px;
    }

    @media (max-width: 991px) {
      .signin_signup{
        margin-right: -6px;
      }
    }
</style>

<br><br><br>
<body>
 <?php if(!isset($_SESSION['uid'])) {?>
    <header class="header_margin">

    <a href="index.php" class="logo"><h1 class="mylogo">MY LOGO</h1></a>


    <a class="js-menu__open" id="profile-nav__style" data-menu="#main-nav" style="margin-right: 10px ; padding: 7px 7px 4px 7px; border-radius: .5rem; background-color: #fff;">
        <i class="bx bx-cart-alt" style="color: #363A44;"></i>
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
      

       
 

      <?php  }

        }?>
    </a> 

    <a href="signin&signup.php" class="signin_signup" style="text-transform: capitalize; font-size: 15px; color: #363A44; font-weight: 650; background: #fff; padding: 10px 15px 10px 15px; border-radius: .5rem;">Sign in/Sign up</a>
  
</header>

<?php } else {?>


 
 <header id="header" class="header_margin">

    <a href="index.php" class="logo"><img src="images/logo.png"></a>


    <a class="js-menu__open" id="profile-nav__style" data-menu="#main-nav" style="margin-right: 10px ; padding: 7px 7px 4px 7px; border-radius: .5rem; background-color: #fff;">
        <i class="bx bx-cart-alt" style="color: #363A44;"></i>
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
      

       
 

      <?php  }

        }?>
    </a> 
    
    <a class="js-menu__open2" id="profile-nav__style" data-menu="#main-nav2"  
       style="">
        <?php echo $joined_trim_full_name;?>
    </a>

</header>
<?php }?>
<!-- header section ends -->


<script>
  $(window).on("scroll", function() {
    if($(window).scrollTop() > 50) {
        $(".header_margin").addClass("active");
    } else {
        //remove the background property so it comes transparent again (defined in your css)
       $(".header_margin").removeClass("active");
    }

  });
</script>

<script>
  $(window).on("scroll", function() {
    if($(window).scrollTop() > 50) {
        $(".mylogo").addClass("active");
    } else {
        //remove the background property so it comes transparent again (defined in your css)
       $(".mylogo").removeClass("active");
    }

  });
</script>
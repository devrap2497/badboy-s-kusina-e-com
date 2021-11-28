<?php session_start();

/*error_reporting(0);*/

  $servername = "localhost";
  $username   = "root";
  $password   = "";
  $dbname     = "badboyskusinadb";

  $conn = new mysqli($servername, $username, $password, $dbname); ?>

<?php require('menu-header.php')?>


<style>
  .check__out:hover {
    color: #fff;
  }

  .containerrr {
    display: flex;
    flex-wrap: wrap;
    padding: 3rem 18.5%;

  }

  .containerrr .product_image {
    margin: 0 30px 70px 0;
  }


  #featured {
    max-width: 390px;
    max-height: 500px;
    object-fit: cover;
    cursor: pointer;
  }

  .thumbnail {
    object-fit: cover;
    max-width: 80px;
    cursor: pointer;
    opacity: 0.5;
    margin: 7px;
  }

  .thumbnail:hover {
    opacity: 1;
  }

  .active {
    opacity: 1;
    border: 2px solid #ff3838;
  }

  .product_details {
    min-width: 250px ;   
    
  }

  .product_details img {
    margin-right: 6.5rem;
  }

  .product_details h1 {
    font-size: 25px;
    text-transform: capitalize;

  }

  label {
    font-weight: 400;
    font-size: 16px;
    margin-right: 50px;
    color: #676767;
  }

  .add_cart_btn {
    background-color: #ff3838; 
    color: #fff; 
    padding: 15px 50px 15px 50px; 
    margin: 0 0 3rem 0;  
    cursor: pointer; 
    font-weight: 600;
    border-radius: .5rem;
    min-width: 100%;
  }
  .ratings {
    padding: 3rem 18.5%; 
  }

  .ratings h1 {
    font-size: 20px;
  }

  .ratings .reviews {
    padding: 3rem;
  }

  .ratings .reviews i {
    font-size: 15px;
    color: #FA363D;
    cursor: pointer;

  }

  .ratings .reviews label {
    margin: 0;
  }
  .ratings .reviews label::selection {
    background: #fff;
    color: black  ;
  }

  .subnav {
    margin: 3rem 18.2%; 
    font-weight: 500;
    font-size: 15px;
  }

  .subnav a{
    margin: 5px;
    color: #FA363D;
  }

  .subnav   .subnav-active {
    color: #363C47;
  }

  .related-menu-h1 {
    margin: 3rem 18.2%;
  }

  .slider {
  margin: 3rem 18.2%; 
  width: 63%;
  height: 300px;
  position: relative;
  overflow-x: hidden;
  overflow-y: hidden;
  }

  .slider::-webkit-scrollbar {
    display: none;
  }

  .slider .slide {
    display: flex;
    position: absolute;
    left: 0;
    transition: 0.3s left ease-in-out;
  }

  .slider .item {
    margin-right: 10px;
  }

  .slider .item:last-child {
    margin-right: 0;
  }

  .ctrl {
    text-align: center;
    margin-top: 5px;
  }

.ctrl-btn {
  height: 50%;
  padding: 20px 20px;
  min-width: 50px;
  background: linear-gradient(transparent, gray);
  opacity: 0.6;
  color: #fff;
  border: none;
  font-weight: 600;
  text-align: center;
  cursor: pointer;
  outline: none;
  position: absolute;
  }

.ctrl-btn:hover {
  opacity: 1;
}

.ctrl-btn.pro-prev {
  font-size: 25px;
  left: 0;
  color: #fff;
}

.ctrl-btn.pro-next {
  font-size: 25px;
  right: 0;
  color: #fff;
}


  @media (max-width: 991px) {
    .containerrr, .related-menu, .ratings {
      padding: 2.5rem;
    }

   

    #featured {
      max-width: 390px;
      max-height: 500px;
    }

    .related-menu-h1 {
    margin: 3rem;
    }
    .slider {
      margin: 2.5rem;
      width: 97%;
    }
    .ratings h1 {
      font-size: 20px;
    }

    .subnav {
      margin: 2rem;
    }
  }

  @media (max-width: 767px) {
    #featured {
      max-width: 440px;
      max-height: 500px;
    }

    .product_details h1 {
      font-size: 20px;
    }

    .slider {
      width: 94%;
    }

     .ratings h1 {
      font-size: 18px;
    }

    .add_cart_btn {

    }
  }


</style>


<br><br><br><br><br><br><br><br><br><br>
<?php 

$get = base64_decode(urldecode($_GET['product']));
$pid = ((($get*956783)/5678)/123456789);

$ret=mysqli_query($conn,"SELECT * FROM food_product WHERE product_id='$pid'");
while($row=mysqli_fetch_array($ret))
{

$category_id = $row['category_id'];
?>

<div class="subnav"> 
  <a href="menu.php" class="">Menu</a>
  <i class="fas fa-chevron-right" style="font-weight: 200;"></i>
  <a class="subnav-active" style="cursor: text;" >Product Details</a>
</div>

<div class="containerrr">
  <div class="product_image">
    <img id="featured" src="../images/<?php echo htmlentities($row['product_image']);?>">  
    <div>
      <img class="thumbnail active" src="../images/<?php echo htmlentities($row['product_image']);?>">  
      <img class="thumbnail" src="../images/<?php echo htmlentities($row['product_image2']);?>">  
      <img class="thumbnail" src="../images/<?php echo htmlentities($row['product_image3']);?>">  
      <img class="thumbnail" src="../images/meal3.jpg">
    </div>  
  </div>

  <div class="product_details">
      <h1><?php echo htmlentities($row['product_name']);?>
      <tr>
        <td></td>
      </tr>
      <tr>
        <td style="margin-top: 15px; font-weight: 400; font-size: 16px; color: #676767; text-transform: ;"><?php echo $row['product_description'];?></td>
      </tr>
      </h1><br>
      <div style="margin-top: 10px;">
        <?php 

          if($row['product_price_before'] <= 0) {


        ?>
      <?php } else {?>
        <label style="-webkit-text-decoration-line: line-through; /* Safari */
                       text-decoration-line: line-through;">
                       ₱<?=$row['product_price_before'];?>
        </label>
        <?php }?>
        <span style="font-size: 20px; font-weight: 700;">₱<?=$row['product_price'];?></span>
      </div>
      <div style="margin-top: 10px;">
        <label>Quantity</label>
        <button class="btn_decrement">-<!-- <i class="fas fa-minus"></i> --></button>
        <input type="number"
             class="quantity" 
             value="1"
             min="1" 
             id="product_quantity<?php echo $row['product_id'];?>"
             oninput="this.value = Math.abs(this.value)" 
             style="
             text-align: center; 
             padding: 10px 0 10px 10px; 
             width: 60px; 
             font-weight: 700;
             -webkit-appearance: none;
              margin: 0;
              -moz-appearance: textfield;
              color: #676767;
             /*box-shadow: 0 10px 40px rgba(159, 162, 177, .8);*/ 
             ">

        <button class="btn_increment">+<!-- <i class="fas fa-plus"></i> --></button> 
      </div>
      <div style="text-align:center;">

        <button type="button" name="add_cart_btn" class="add_cart_btn" data-id="<?php echo $row['product_id'];?>">Add to cart</button>

        <input type="hidden" id="product_name<?php echo $row['product_id'];?>" value="<?php echo $row['product_name'] ?>" name="product_name">
        <input type="hidden" id="product_price<?php echo $row['product_id'];?>" value="<?php echo $row['product_price'] ?>" name="product_price">
      </div>
    </div>
    
</div>
<?php } ?>


<div class="ratings">
  <h1>Ratings</h1>
<?php
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "badboyskusinadb";

    $conn = new mysqli($servername, $username, $password, $dbname); 

    $sql = "SELECT * FROM food_product_reviews WHERE product_id = '$pid' ";
    $result = $conn->query($sql);
    $total_rate_tbl = 0;
    $total_rates = 0;
    while ($row = mysqli_fetch_array($result)) {
      $total_rate_row += $result;
      $total_rate_tbl += $row['rate'];

      $average_rate = $total_rate_tbl / $total_rate_row;
      $float_average_rates = number_format($average_rate, 1, '.', '');
    }
  ?>
  <br>
  <div>
    <h1 style="color: #F53E41; font-size: 27px; margin-left: 27px;"><?=$float_average_rates?><small style="font-size: 19px;">
    <?php 

      if(!isset($float_average_rates)) {
    ?>
    <?php } else {?>
     out of 5
   <?php } ?>
    <br>
    <?php 
    //5
    if($float_average_rates >= 4.7) {
      $icon_star = '<i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>';
    }
    //4.5
    else if($float_average_rates >= 4.5 && $float_average_rates <= 4.6) {
      $icon_star = '<i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>';
    }
    //4
    else if($float_average_rates >= 3.7 && $float_average_rates <= 4.4) {
      $icon_star = '<i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>';
    }
    //3.5
    else if($float_average_rates >= 3.5 && $float_average_rates <= 3.6) {
      $icon_star = '<i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                <i class="far fa-star"></i>';
    }
    //3
    else if($float_average_rates >= 2.7 && $float_average_rates <= 3.4) {
      $icon_star = '<i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>';
    }
    //2.5
    else if($float_average_rates <= 2.5 && $float_average_rates >= 2.6) {
      $icon_star = '<i class="fas fa-star"></i>rate
                <i class="fas fa-star"></i>
                <i class="fas fa-star-half-alt"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>';
    }

     //2
    else if($float_average_rates <= 1.7 && $float_average_rates >= 2.4) {
      $icon_star = '<i class="fas fa-star"></i>rate
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>';
    }
    //1.5
    else if($float_average_rates <= 1.5 && $float_average_rates >= 1.6) {
      $icon_star = '<i class="fas fa-star"></i>rate
                <i class="fas fa-star-half-alt"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>';
    }
    //1
    else if($float_average_rates <= .7 && $float_average_rates >= .4) {
      $icon_star = '<i class="fas fa-star"></i>rate
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>';
    }
    ?>
    <?=$icon_star;?>
    </small>
  </h1><br>
  </div>
  <div class="reviews">
    <?php 
    $get = base64_decode(urldecode($_GET['product']));
    $pid = ((($get*956783)/5678)/123456789);

    $sql = "SELECT * FROM food_product_reviews WHERE product_id = '$pid'ORDER BY rate desc ";
    $result = $conn->query($sql);

    while ($row = mysqli_fetch_array($result)) {

      $user_id_review = $row['uid'];

      $query = "SELECT * FROM users WHERE uid ='$user_id_review' ";
      $query_push = $conn->query($query);

      $query_row = mysqli_fetch_array($query_push);


      $full_name = $query_row['fname'] ." ".$query_row['lname'];
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

    ?>
    <span style="display: inline-block;
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
        margin-right: 10px; ;"><?=$joined_trim_full_name;?></span>
    <?php 

    $rates = '';
    if($row['rate'] == 5) {
      $rates = '<i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>';
    }
    else if($row['rate'] == 4) {
      $rates = '<i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>';
    }
    else if($row['rate'] == 3) {
      $rates = '<i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>';
    }
    else if($row['rate'] == 2) {
      $rates = '<i class="fas fa-star"></i>rate
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>';
    }
    else if($row['rate'] == 1) {
      $rates = '<i class="fas fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i> 
                <i class="far fa-star"></i>';
    }
   

    ?>
    <?=$rates?><br>
    <p style="margin-left: 47px; font-size: 13px;"><?=$row['reviews'];?></p><br>
    <p style="margin-left: 47px; font-size: 11px; color: #757575;"><?=date("F jS, Y, h:i A",  strtotime($row['date_review']));?></p>

        <!-- <i class="fas fa-star"></i> -->
    <!-- <form>
    <input type="hidden" name="one-star" id="one-star" value="1">
    <label for="one-star" >
      <i class="rating__star far fa-star"></i>
    </label>

    <input type="hidden" name="two-star" id="two-star" value="2">
    <label for="two-star" >
      <i class="rating__star far fa-star"></i>
    </label>

    <input type="hidden" name="three-star" id="three-star" value="3">
    <label for="three-star" >
      <i class="rating__star far fa-star"></i>
    </label>

    <input type="hidden" name="four-star" id="four-star" value="4">
    <label for="four-star" >
      <i class="rating__star far fa-star"></i>
    </label>

    <input type="hidden" name="five-star" id="five-star" value="5">
    <label for="five-star" >
      <i class="rating__star far fa-star"></i>
    </label>
    <br><br>
    <textarea placeholder="Comment" name="comment" style="min-width: 50%; border: 1px solid #DADFE7; border-radius: .5rem; padding: 10px; color: #696969;"></textarea>
    <br><br>
    <button type="submit" name="submit_review" style="padding: .5rem 1rem; background-color: #FA363D; color: #fff; cursor: pointer; text-transform: capitalize; border-radius: .5rem;">submit</button>
    </form> -->
  <?php } ?>
  <?php 
  if(!isset($float_average_rates)) {
    ?>
    <center>
       <img src="../images/no-ratings.png" style="height: 100px; margin-left: -15px;"> 
      <p style="font-weight: 400; font-size: 15px;">No ratings yet.</p>
      </center>
    <?php } else {?>
   <?php } ?>
      
  </div>
  
</div>



<?php 

    $sql = "SELECT * FROM food_product WHERE category_id = '$category_id' AND product_id != '$pid'";
    $result = $conn->query($sql);

    ?>
    
<h1 class="related-menu-h1">Related Menu</h1>
<div class="slider" id="slider">
  <div class="slide" id="slide">
   <?php 
    while($row = mysqli_fetch_array($result)){

    $hash = (($row['product_id']*123456789*5678)/956783);
    $product_id_hash = urldecode(base64_encode($hash));
    
  ?>

  <div class="gallery" style="margin-right: 10px; ">
    <img class="item" src="../images/<?=$row['product_image'];?>" alt="Cinque Terre" width="225" height="150" style="cursor: pointer; border-radius: .5rem;" onclick="location.href='food-product-details.php?product=<?php echo $product_id_hash;?>';">
    <h2 style="text-transform: capitalize; 
               font-weight: 600; 
               font-size: 14px; 
               margin: 5px 0 5px 0; cursor: pointer;" onclick="location.href='food-product-details.php?product=<?php echo $product_id_hash;?>';">
    <?=$row['product_name'];?> <?=$row['product_description'];?></h2>
    <?php 

      $ppid = $row['product_id'];
      $query = $conn->query("SELECT * FROM food_product_reviews WHERE product_id = '$ppid'");
      $total_rate_tbl = 0;
      $total_rates = 0;
      $average_rate = 0;
      $total_rate_row = 0;
      $float_average_ratess = 0;
      while ($row = mysqli_fetch_array($query)){

      $total_rate_row += $query;
      $total_rate_tbl += $row['rate'];

      $average_rate = $total_rate_tbl / $total_rate_row;
      $float_average_ratess = number_format($average_rate, 1, '.', '');
      }
    ?>

    <?php 

      if($float_average_ratess <= 0) {
      ?>

    <?php } else {?>
  <i class="fas fa-star" style="color: #FF3838; font-size: 15px;"></i> 
  <span style="font-size: 13px; color: #686868;"><?=$float_average_ratess;?></span>
  <?php } ?>
  </div>

 <?php }?>

  </div>
  <button class="ctrl-btn pro-prev"><i class="fas fa-chevron-left"></i></button>
  <button class="ctrl-btn pro-next"><i class="fas fa-chevron-right"></i></button>
</div>



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

<?php require_once("../templates/footer3.php");?>
<script src="cart__functions.js"></script>

<script>
  let thumbnails = document.getElementsByClassName('thumbnail')
  let activeImages = document.getElementsByClassName('active')

  for (var i=0; i < thumbnails.length; i++) {

    
    thumbnails[i].addEventListener('mouseover', function() {
/*console.log(activeImages)*/
      if (activeImages.length > 0) {
        activeImages[0].classList.remove('active')
        
      }
      this.classList.add('active')
        document.getElementById('featured').src = this.src
    })
  }
</script>


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

<script>
    var height = $('#invisible').height();

    $(window).scroll(function () {
        if($(this).scrollTop() > height){
            $('.nav').addClass(' fixed');
        } else {
            $('.nav').removeClass(' fixed');
        }
    });
</script>

    

<!-- <script src="switchstylesheet/switchstylesheet.js"></script>  -->
    
<!-- <script>
        $(document).ready(function(){ 
            $(".changecolor").switchstylesheet( { seperator:"color"} );
            $('.show-theme-options').click(function(){
                $(this).parent().toggleClass('open');
                return false;
            });
        });

        $(window).bind("load", function() {
           $('.show-theme-options').delay(2000).trigger('click');
        });
 </script>  
 -->
<script>
var btnIncrement = document.getElementsByClassName('btn_increment');
var btnDecrement = document.getElementsByClassName('btn_decrement');

//INCREMENT
for(var i = 0; i < btnIncrement.length; i++) {
  var button = btnIncrement[i];
  button.addEventListener('click', function(event) {

      var buttonClicked = event.target;
      event.preventDefault();
      var input = buttonClicked.parentElement.children[2];
      var inputValue = input.value;
      var newValue = parseInt(inputValue) +1;

      input.value = newValue;

  })
}
//DECREMENT
  for(var i = 0; i < btnDecrement.length; i++) {
  var button = btnDecrement[i];
  button.addEventListener('click', function(event) {
      event.preventDefault();
      var buttonClicked = event.target;
      var input = buttonClicked.parentElement.children[2];
      var inputValue = input.value;
      var newValue = parseInt(inputValue) -1;

      if(newValue >= 1 ) {
        input.value = newValue;
      }



  })
}
</script> 
<script>
 const ratingStars = [...document.getElementsByClassName("rating__star")];

function executeRating(stars) {
  const starClassActive = "rating__star fas fa-star";
  const starClassInactive = "rating__star far fa-star";
  const starsLength = stars.length;
  let i;
  stars.map((star) => {
    star.onclick = () => {
      i = stars.indexOf(star);

      if (star.className===starClassInactive) {
        for (i; i >= 0; --i) stars[i].className = starClassActive;
      } else {
        for (i; i < starsLength; ++i) stars[i].className = starClassInactive;
      }
    };
  });
}
executeRating(ratingStars);
</script>
<!--  <script>
// Select your input element.
var input = document.getElementById('product_quantity');

// Listen for input event on numInput.
number.onkeydown = function(e) {
    if(!((e.keyCode > 95 && e.keyCode < 106)
      || (e.keyCode > 47 && e.keyCode < 58) 
      || e.keyCode == 8)) {
        return false;
    }
}
</script>  -->


<script>
  productScroll();

function productScroll() {
  let slider = document.getElementById("slider");
  let next = document.getElementsByClassName("pro-next");
  let prev = document.getElementsByClassName("pro-prev");
  let slide = document.getElementById("slide");
  let item = document.getElementById("slide");

  for (let i = 0; i < next.length; i++) {
    //refer elements by class name

    let position = 0; //slider postion

    prev[i].addEventListener("click", function() {
      //click previos button
      if (position > 0) {
        //avoid slide left beyond the first item
        position -= 1;
        translateX(position); //translate items
      }
    });

    next[i].addEventListener("click", function() {
      if (position >= 0 && position < hiddenItems()) {
        //avoid slide right beyond the last item
        position += 1;
        translateX(position); //translate items
      }
    });
  }

  function hiddenItems() {
    //get hidden items
    let items = getCount(item, false);
    let visibleItems = slider.offsetWidth / 300;
    return items - Math.ceil(visibleItems);
  }
}

function translateX(position) {
  //translate items
  slide.style.left = position * -245 + "px";
}

function getCount(parent, getChildrensChildren) {
  //count no of items
  let relevantChildren = 0;
  let children = parent.childNodes.length;
  for (let i = 0; i < children; i++) {
    if (parent.childNodes[i].nodeType != 3) {
      if (getChildrensChildren)
        relevantChildren += getCount(parent.childNodes[i], true);
      relevantChildren++;
    }
  }
  return relevantChildren;
}

</script>



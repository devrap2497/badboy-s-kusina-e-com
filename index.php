

<?php require_once("templates/header.php");?>
<?php require_once("controllers/functions.php");?>
<?php 
  
  /*if(isset($_SESSION['uid'])){
  header("Location: view/menu.php");
  }
*/
?>

<!-- home section starts  -->
<style>
    .img_banner{
        margin-top: -700px; height: 1200px; width: 100%; 
    }

    .home {
        margin-top: -500px;
    }

    .step-box {
        display:flex; 
        align-items: center; 
        justify-content: space-between;
        margin: auto;
        padding:1rem 21.3%;
        
    }
    .step-box .step-1-details {
        background: #fff;
        box-shadow: 0px 3px 1px 1px #DBDDDC;
        border-top-left-radius: .5rem;
        border-bottom-left-radius: .5rem;
        padding: 30px 20px;
        min-width: 50%;
    
    }

    .step-box .step-1-details h1{
        font-size: 25px;
        margin-bottom: 10px;

    }

    .step-box .step-1-details p{
        color: #AAA8B4;
        font-size: 12px;
        margin-bottom: 80px;

    }

    .step-box .step-1-details a{
        border: 1px solid #FA5051;
        border-radius: .5rem;
        padding: 8px 20px;
        color: #FA5051;
        font-size: 13px;
        font-weight: 600px;
        text-transform: uppercase;
        margin-bottom: 50px;

    }

    .step-box .step-1-details a:hover{
        border: 1px solid #AAA8B4;
        color: #AAA8B4;
    }

    .step-box .step-1-image img {
        border-top-right-radius: .5rem;
        border-bottom-right-radius: .5rem;


    }
    @media(max-width: 991px) {
        .step-box {
            padding: 3rem 12%;
        }
    }

     @media(max-width: 750px) {
        .step-box {
            padding: 3rem 5%;
        }
    }

    @media(max-width: 720px) {
        .step-box {
            padding: 3rem 3%;
        }
    }

    @media(max-width: 700px) {
        .step-box {
            padding: 3rem 0%;
        }
    }

    @media(max-width: 749px) {
      .img_banner {
        display: none;
        margin-top: 700px;
      }
      .home {
        margin-top: 10px;
      }

      .mylogo {
        color: #363A43;
      }
    }

    @media(max-width: 650px) {
        .step-box .step-1-image img, .step-box .step-2-image img{
           width: 100%;
        } 
        .step-box .step-1-details p {
            margin-bottom: 50px;
        }
    }

    @media(max-width: 500px) {
         .step-box .step-1-details p {
            margin-bottom: 30px;
        }
        .step-box .step-1-details h1 {
            font-size: 15px;
        }
    }

    @media(max-width: 460px) {
         .step-box .step-1-details p {
            margin-bottom: 15px;
        }
        .step-box .step-1-details h1 {
            font-size: 15px;
        }
        
    }
    @media(max-width: 320px) {
      .home {
        margin-bottom: 100px;
      }
     }

     @media(max-height: 600px) {
        .home {
           margin-bottom: 250px;
        }
     }
</style>
<img src="images/banner.jpg" class="img_banner">
<section class="home" id="home">

    <div class="content">
        
        <h3>Good food and great vibes.</h3>
        <p>Home made dishes to fill your cravings of affordable yet authentic from Filipino, Korean, Japanese, Persian and more.<br><br>My love for cooking turned into business. We will surely satisfy your cravings.</p>
        <a href="signin&signup.php" class="btn_order">Order now</a>
        
    </div>

     <div class="image">
        
    </div> 

</section>

<!-- home section ends -->

<!-- speciality section starts  -->
<br>
<section class="menu_index" id="menu" style="margin-top: -250px">

    <h1 class="heading"> We’ve Got <span>Something</span> For Everyone! </h1>

    <div class="box-container">

        <div class="box">
            <img class="image" src="images/meal4.jpg" alt="">
            <div class="content">
                <img src="images/grill.png" alt="">
                <h3>Samgyupsal</h3>
                <p>Samgyupsal, which is grilled fresh pork belly, is highly popular in Korea. It’s easy to prepare because you don’t need to marinate the meat.</p>
            </div>
        </div>
        <div class="box">
            <img class="image" src="images/meal2.jpg" alt="">
            <div class="content">
                <img src="images/rice.png" alt="" style="height: 75px;">
                <h3>Rice Bowl</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda inventore neque amet ipsa tenetur voluptates aperiam tempore libero labore aut.</p>
            </div>
        </div>
        <div class="box">
            <img class="image" src="images/meal3.jpg" alt="">
            <div class="content">
                <img src="images/sushi.png" alt="">
                <h3>Bake Sushi</h3>
                <p>It is sushi deconstructed as a casserole: steamed rice forms the bottom layer which is then topped with the elements we normally expect from a sushi roll such as kani, ebiko and furikake.</p>
            </div>
        </div>
        <div class="box">
            <img class="image" src="images/ramen.jpg" alt="">
            <div class="content">
                <img src="images/ramen.png" alt="">
                <h3>Ramen</h3>
                <p>Ramen is a type of Japanese noodle soup that's with the main components of flavourful homemade broth and noodles. The broth is usually made with bones and cooked for hours, to get that deep umami flavours.</p>
            </div>
        </div>
        <div class="box">
            <img class="image" src="images/drinks.jpg" alt="">
            <div class="content">
                <img src="images/softdrinks.png" alt="">
                <h3>Drinks</h3>
                <p>Sola Iced Tea with multiple flavours (Lemon, Raspberry, Peach, Orange, Strawberry, Apple, Green Tea Apple).<br><br></p>
            </div>
        </div>
        <div class="box">
            <img class="image" src="images/beers.png" alt="">
            <div class="content">
                <img src="images/beer.png" alt="">
                <h3>Beers</h3>
                <p>San Miguel Pale, Redhorse, San Mig Light. <br><br><br><br></p>
            </div>
        </div>
    </div>
    <br><br>
    <!-- <a href="signin&signup.php?menu" class="btn">More &nbsp;&nbsp;<i class="fas fa-chevron-right"></i></a> -->

</section>

<!-- speciality section ends -->

<!-- popular section starts  -->
<br>
<section class="popular" id="popular">

    <h1 class="heading"> Most <span>Popular</span> Foods </h1>

    <div class="box-container">

        <div class="box">
            <!-- <span class="price"> ₱0.00 </span> -->
            <img src="images/ramen.jpg" alt="">
            <h3>Ramen</h3>
            <!-- <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div> -->
            <a href="signin&signup.php" class="btn"><b><i class="fas fa-plus"></i></b></a>
        </div>
        <div class="box">
            <!-- <span class="price"> ₱0.00 </span> -->
            <img src="images/meal3.jpg" alt="">
            <h3>Bake Sushi</h3>
            <!-- <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div> -->
            <a href="signin&signup.php" class="btn"><b><i class="fas fa-plus"></i></b></a>
        </div>
        <div class="box">
            <!-- <span class="price"> ₱0.00 </span> -->
            <img src="images/meal2.jpg" alt="">
            <h3>Rice Bowl</h3>
            <!-- <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div> -->
            <a href="signin&signup.php" class="btn"><b><i class="fas fa-plus"></i></b></a>
        </div>
        
    </div>
    <br>
    <br>
    <br>
<a href="view/menu.php" class="" style="float: right; background-color: #ff3838; color: #fff; padding:.8rem 3rem; font-size: 1.7rem;
  border-radius: .5rem;
 ">More &nbsp;<i class="fa fa-chevron-right"></i></a>
</section>

<!-- popular section ends -->

<!-- steps section starts  -->
<!-- steps section starts  -->
<br><br><br><br><br>
<div class="step-container">

    <h1 class="heading">How It <span>Works</span></h1>

    <section class="steps">

        <!-- <div class="box">
            <img src="images/step-1.jpg" alt="">
            <h3>1. choose your favorite food</h3>
        </div>
        <div class="box">
            <img src="images/step-3.jpg" alt="">
            <h3>2. easy payments methods</h3>
        </div>
        <div class="box">
            <img src="images/step-2.jpg" alt="">
            <h3>3. fast delivery</h3>
        </div>
        <div class="box">
            <img src="images/step-4.jpg" alt="">
            <h3>4. and finally, enjoy your food</h3>
        </div> -->
        <div class="step-box">
            <div class="step-1-details">
                <h1>Choose your<br> favorite food</h1>
                <p>Breakfast, Lunch, Dinner</p>
                <a href="view/menu.php">View Menu</a>
            </div>
            <div class="step-1-image">
                <img src="images/choose-your-food.jpg">
            </div>
        </div>
        <br>
        <div class="step-box">
            <div class="step-2-image">
                <img src="images/payment-methods.jpg">
            </div>
            <div class="step-1-details">
                <h1>Easy payment<br> methods</h1>
                <p>Debit, Gcash, GrabPay</p>
                <a href="view/menu.php">payment methods</a>
            </div>
        </div>

        <div class="step-box">
            <div class="step-1-details">
                <h1>Deliver</h1>
                <p>Fast, Reliable, Anytime</p>
                <i class="fa fa-clock-o"> </i> 15 - 20 mins
            </div>
            <div class="step-2-image">
                <img src="images/deliver.jpg">
            </div>
        </div>
        
        <div class="step-box">
            <div class="step-2-image">
                <img src="images/enjoy.jpg">
            </div>
            <div class="step-1-details">
                <h1>Bon appetit</h1>
                <p>Family and Friends</p>
                <a href="view/signin&signup.php">order now</a>
            </div>
        </div>
    </section>

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
           /* $menu = "menu.php";*/
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

                    <td class='td_img' style='color: #666666;'><img src='images/<?php echo $image;?>'><?php echo $value['p_name'];?><br>
                   <?php echo $product_description;?>
                   </td>

                   

                    <td style='color: #666666;'>₱ <?php echo number_format($value['p_quantity'] * $value['p_price'], 0);?>

                    </td>

                    

                    <td><a id="<?php echo $value['p_id'];?>" class="delete" style='cursor: pointer;'>Remove</a>
                    </td>

                    <input type="hidden"
                       class="quantity" 
                       value="1"
                       min="1" 
                       id="product_quantity<?php echo $value['p_id'];?>" 
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
          <div style="position: fixed; bottom: 0; width: 95%;">
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
        <img src="images/empty_cart.svg" width="200" class="empty__cart__img">
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
      <li style="list-style-type: none; font-size: 15px; margin-bottom: 20px; margin-top: 40px;"><a href="view/profile.php" style="color: #686868;">Profile</a></li>
      <li style="list-style-type: none; font-size: 15px; margin-bottom: 20px; "><a href="view/my-orders.php" style="color: #686868;">My orders</a></li>
      <li style="list-style-type: none; font-size: 15px; margin-bottom: 20px; "><a href="logout.php" style="color: #686868;">Logout</a></li>
    </ul>
  </div>
</div>

<!-- steps section ends -->



<!-- steps section ends -->

<!-- gallery section starts  -->

<!-- <section class="gallery" id="gallery">

    <h1 class="heading"> our food <span> gallery </span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="images/g-1.jpg" alt="">
            <div class="content">
                <h3>tasty food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="#" class="btn">ordern now</a>
            </div>
        </div>
        <div class="box">
            <img src="images/g-2.jpg" alt="">
            <div class="content">
                <h3>tasty food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="#" class="btn">ordern now</a>
            </div>
        </div>
        <div class="box">
            <img src="images/g-3.jpg" alt="">
            <div class="content">
                <h3>tasty food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="#" class="btn">ordern now</a>
            </div>
        </div>
        <div class="box">
            <img src="images/g-4.jpg" alt="">
            <div class="content">
                <h3>tasty food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="#" class="btn">ordern now</a>
            </div>
        </div>
        <div class="box">
            <img src="images/g-5.jpg" alt="">
            <div class="content">
                <h3>tasty food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="#" class="btn">ordern now</a>
            </div>
        </div>
        <div class="box">
            <img src="images/g-6.jpg" alt="">
            <div class="content">
                <h3>tasty food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="#" class="btn">ordern now</a>
            </div>
        </div>
        <div class="box">
            <img src="images/g-7.jpg" alt="">
            <div class="content">
                <h3>tasty food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="#" class="btn">ordern now</a>
            </div>
        </div>
        <div class="box">
            <img src="images/g-8.jpg" alt="">
            <div class="content">
                <h3>tasty food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="#" class="btn">ordern now</a>
            </div>
        </div>
        <div class="box">
            <img src="images/g-9.jpg" alt="">
            <div class="content">
                <h3>tasty food</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Deleniti, ipsum.</p>
                <a href="#" class="btn">ordern now</a>
            </div>
        </div>

    </div>

</section> -->

<!-- gallery section ends -->

<!-- review section starts  -->

<!-- <section class="review" id="review">

    <h1 class="heading"> our customers <span>reviews</span> </h1>

    <div class="box-container">

        <div class="box">
            <img src="images/pic1.png" alt="">
            <h3>john deo</h3>
            <div class="stars">
                <i class="`s fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti delectus, ducimus facere quod ratione vel laboriosam? Est, maxime rem. Itaque.</p>
        </div>
        <div class="box">
            <img src="images/pic2.png" alt="">
            <h3>john deo</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti delectus, ducimus facere quod ratione vel laboriosam? Est, maxime rem. Itaque.</p>
        </div>
        <div class="box">
            <img src="images/pic3.png" alt="">
            <h3>john deo</h3>
            <div class="stars">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti delectus, ducimus facere quod ratione vel laboriosam? Est, maxime rem. Itaque.</p>
        </div>

    </div>

</section> -->

<!-- review section ends -->

<!-- order section starts  -->

<!-- <section class="order" id="order">

    <h1 class="heading"> <span>order</span> now </h1>

    <div class="row">
        
        <div class="image">
            <img src="images/order-img.jpg" alt="">
        </div>

        <form action="">

            <div class="inputBox">
                <input type="text" placeholder="name">
                <input type="email" placeholder="email">
            </div>

            <div class="inputBox">
                <input type="number" placeholder="number">
                <input type="text" placeholder="food name">
            </div>

            <textarea placeholder="address" name="" id="" cols="30" rows="10"></textarea>

            <input type="submit" value="Order now" class="btn">

        </form>

    </div>

</section> -->

<!-- order section ends -->
<!-- loader  -->
<!--  <div class="loader-container">
    <img src="images/loader2.gif" alt="">
</div>  -->


<?php require_once("templates/footer2.php");?>

<script src="cart__functions.js"></script>

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


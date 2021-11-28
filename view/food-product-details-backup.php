<?php session_start();

error_reporting(0);

  $servername = "localhost";
  $username   = "root";
  $password   = "";
  $dbname     = "badboyskusinadb";

  $conn = new mysqli($servername, $username, $password, $dbname); ?>


<link rel="stylesheet" href="../bootstrap.min.css">
<link rel="stylesheet" href="../assets/css/main.css">

<!-- <link rel="stylesheet" href="../assets/css/green.css"> -->

<link rel="stylesheet" href="../assets/css/owl.carousel.css">
<link rel="stylesheet" href="../assets/css/owl.transitions.css">
<link href="../assets/css/lightbox.css" rel="stylesheet">

<!-- <link rel="stylesheet" href="../assets/css/animate.min.css">
<link rel="stylesheet" href="../assets/css/rateit.css">
<link rel="stylesheet" href="../assets/css/bootstrap-select.min.css">
<link rel="stylesheet" href="../assets/css/config.css">  -->


<!-- <link href="../assets/css/green.css" rel="alternate stylesheet" title="Green color">
<link href="../assets/css/blue.css" rel="alternate stylesheet" title="Blue color">
<link href="../assets/css/red.css" rel="alternate stylesheet" title="Red color">
<link href="../assets/css/orange.css" rel="alternate stylesheet" title="Orange color">
<link href="../assets/css/dark-green.css" rel="alternate stylesheet" title="Darkgreen color"> -->
<?php require('menu-header.php')?>

<style>
  .check__out:hover {
    color: #fff;
  }
  .container {
    margin: 3rem 17%; 

  }

  @media(max-width: 991px) {
    .container {
      margin: 0;
      margin-left: -10px;
    }
  }
</style>


<br><br><br><br><br><br><br><br><br><br>

<div class="breadcrumb">
    <div class="container">
        <div class="breadcrumb-inner">
<?php 

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "badboyskusinadb";

$conn = new mysqli($servername, $username, $password, $dbname);

$pid=intval($_GET['product']);

$ret=mysqli_query($conn,"SELECT * FROM food_product WHERE product_id='$pid'");
while($row=mysqli_fetch_array($ret))
{

?>

<div class='col-md-9'>
    <div class="row  wow fadeInUp">
        <div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
            <div class="product-item-holder size-big single-product-gallery small-gallery">

                        <div id="owl-single-product">

                            <div class="single-product-gallery-item" id="slide1">
                                <a data-lightbox="image-1" data-title="<?php echo htmlentities($row['product_name'] ." ". $row['product_description']);?>" href="../images/<?php echo htmlentities($row['product_image']);?>" >
                                    <img class="img-responsive" alt="" src="../assets/images/blank.gif" data-echo="../images/<?php echo htmlentities($row['product_image']);?>" style="border-radius: .5rem; margin: 0 10px 0 0; display: flex; width: 100%;"  height="300"/>
                                </a>
                            </div>




                            <div class="single-product-gallery-item" id="slide1">
                                <a data-lightbox="image-1" data-title="<?php echo htmlentities($row['product_name'] ." ". $row['product_description']);?>" href="../images/<?php echo htmlentities($row['product_image']);?>">
                                    <img class="img-responsive" alt="" src="../assets/images/blank.gif" data-echo="../images/<?php echo htmlentities($row['product_image']);?>" style="border-radius: .5rem; margin: 0 10px 0 0; display: flex; width: 100%;"  height="300"/>
                                </a>
                            </div><!-- /.single-product-gallery-item -->

                            <div class="single-product-gallery-item" id="slide2">
                                <a data-lightbox="image-1" data-title="<?php echo htmlentities($row['product_name'] ." ". $row['product_description']);?>" href="../images/<?php echo htmlentities($row['product_image2']);?>">
                                    <img class="img-responsive" alt="" src="../assets/images/blank.gif" data-echo="../images/<?php echo htmlentities($row['product_image2']);?>" style="border-radius: .5rem; margin: 0 10px 0 0; display: flex; width: 100%;"  height="300"/>
                                </a>
                            </div><!-- /.single-product-gallery-item -->

                            <div class="single-product-gallery-item" id="slide3">
                                <a data-lightbox="image-1" data-title="<?php echo htmlentities($row['product_name'] ." ". $row['product_description']);?>" href="../images/<?php echo htmlentities($row['product_image3']);?>">
                                    <img class="img-responsive" alt="" src="../assets/images/blank.gif" data-echo="../images/<?php echo htmlentities($row['product_image3']);?>" style="border-radius: .5rem; margin: 0 10px 0 0; display: flex; width: 100%;"  height="300"/>
                                </a>
                            </div>

                        </div><!-- /.single-product-slider -->
                        <br>

                        <div class="single-product-gallery-thumbs gallery-thumbs" >

                            <div id="owl-single-product-thumbnails" >
                               <div class="item" >

                                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="1" href="#slide3" >
                                        <img class="img-responsive"  width="85" alt="" src="../assets/images/blank.gif" data-echo="../images/<?php echo htmlentities($row['product_image3']);?>"/ >
                                    </a>
                                </div>

                            <div class="item">
                                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="2" href="#slide2">
                                        <img class="img-responsive" width="85" alt="" src="../assets/images/blank.gif" data-echo="../images/<?php echo htmlentities($row['product_image2']);?>"/>
                                    </a>
                                </div>
                                <div class="item">

                                    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="3" href="#slide3">
                                        <img class="img-responsive" width="85" alt="" src="../assets/images/blank.gif" data-echo="../images/<?php echo htmlentities($row['product_image3']);?>"/>
                                    </a>
                                </div>

                               
                               
                                
                                </div><!-- /#owl-single-product-thumbnails -->

                            

                             </div>

                        </div>
                    </div>   
                </div>
            </div>
            <?php }?> 
         </div>
    </div>
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
        <h1 class="empty__cart__text">Your cart is empty.</h1>
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
      <li style="list-style-type: none; font-size: 15px; margin-bottom: 20px; margin-top: 40px;"><a href="" style="color: #686868;">On-going orders</a></li>
      <li style="list-style-type: none; font-size: 15px;"><a href="logout.php" style="color: #686868;">Logout</a></li>
    </ul>
  </div>
</div>

<?php require_once("../templates/footer3.php");?>
<script src="./cart__functions.js"></script>
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

    

<script src="switchstylesheet/switchstylesheet.js"></script> 
    
<script>
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

<script src="../assets/js/jquery-1.11.1.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/bootstrap-hover-dropdown.min.js"></script>
<script src="../assets/js/owl.carousel.min.js"></script>
<script src="../assets/js/echo.min.js"></script>
<script src="../assets/js/jquery.easing-1.3.min.js"></script>
<script src="../assets/js/bootstrap-slider.min.js"></script>
<script src="../assets/js/jquery.rateit.min.js"></script>
<script type="text/javascript" src="../assets/js/lightbox.min.js"></script>
<script src="../assets/js/bootstrap-select.min.js"></script>
<script src="../assets/js/wow.min.js"></script>
<script src="../assets/js/scripts.js"></script>

<!-- fixed subnavbar JS-->



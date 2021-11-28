<?php require_once("../controllers/functions.php")?>
<?php
  $servername = "localhost";
  $username   = "root";
  $password   = "";
  $dbname     = "badboyskusinadb";

  $conn = new mysqli($servername, $username, $password, $dbname);

      if(isset($_SESSION['user_type']) == 1 ) {
            //redirect from admin page
            /*header('Location: ./dashboard.php');*/
        } 


?>

<?php require('menu-header.php')?>

<style>

  #navbar {
    overflow: hidden;
    background-color: #fff;
  }

  #navbar a {
    float: left;
    display: block;
    color: #686868;
    text-align: center;
    font-weight: 400;
    font-size: 18px;
    margin-top: 35px;
    text-decoration: none;
    text-transform: capitalize;
  }

  #navbar a:nth-child(1) {
    width: 150px;
  }

  #navbar a:nth-child(2) {
    width: 150px;
  }
  
  #navbar a:nth-child(3) {
    width: 150px;
  }

  #navbar a:nth-child(4) {
    width: 150px;
  }

  #navbar a:nth-child(5) {
    width: 150px;
  }

  #navbar a:nth-child(6) {
    width: 150px;
  }

  #navbar a:nth-child(7) {
    width: 150px;
  }

  #navbar a:nth-child(8) {
    width: 150px;
  }

  #navbar a::after {
    content: '';
    display: block;
    height: 2px;
    background-color: #FA363D;

    position: ;
    margin-top: 10px;
    width: 0;

  }
  #navbar a.active::after {
    width: 100%;
    transition: all 0.3s ease 0s; 


  }
  #navbar a.active{
    color: #FA363D;
    font-weight: bolder;
  }

  .sticky {
    position: fixed;
    top: 60px;
    z-index: 999;
    width: 100%;
  }

  .food_heading {
    text-transform: capitalize; color: black; font-size: 30px; padding: 2rem;
  }

  .input-search {
    margin: 3rem 19.5%;
    position: absolute;
  }

  .input-search input {
    width: 500px;
    height: 50px;
    border: solid 1px #ccc;
    padding: 0 12px;
    font-size: 15px;
    font-family: Open Sans;
    color: #6D6D6D;
  }

  .input-search input:focus {
  border: 1px solid #363A43;
  }

  .input-search input:focus + label{
    color: #363A43;
    font-size: 12px;
  }

  .form-control-placeholder {
    background-color: #fff;
    padding: 0 3px 0 3px;
    font-size: 14px;
    color: #999;             
  }

  input:placeholder-shown + .form-control-placeholder {
   margin-top:3%;
  }

  input:not(:placeholder-shown) + .form-control-placeholder{
    font-size: 10px;
    color: #676767;
  }

  input + .form-control-placeholder ,
  .form-control:focus + .form-control-placeholder{
    position: absolute;
    transition: all .3s ease;
    margin-left:-87.5%;
    margin-top:-1.5%;

  }

  .input-search button{
    font-family: Open Sans;
    padding: 15px 20px;
    cursor: pointer;
    background: #ff3838;
    color: #fff;
    font-weight: 600;
    font-size: 14px;

  }

  .input-search button i {
    font-size: 16px;
  }

  .input-search button:hover {
    opacity: .8;
  }

  @media(max-width: 991px){
  .food_heading {
      font-size: 20px;
    }

  .popular .box-container .box{
      padding: 10px;
    } 
  .popular .box-container .box:hover {
    border: none;
    margin: 1px;
  }

   #navbar {
     margin-left: -10px;
     
   }

  #navbar a {
     padding-left: 0;
     font-size: 16px;
   }

   .popular .box-container .box img{
      height: 90px;
      width: 90px;
    }

    .input-search {
      margin: 2rem;
    } 

    .input-search input {
      max-width: 390px;
    }

    input:placeholder-shown + .form-control-placeholder {
      margin-top:3.5%;
    }

    input + .form-control-placeholder ,
    .form-control:focus + .form-control-placeholder{
      margin-left:-84.5%;
    }

  }


  @media(max-width: 767px){
    #navbar a {
      font-size: 14px;

      }
    #navbar {
      left: 3rem;
    }

    #navbar a:nth-child(1) {
     width: 110px;
    }
    #navbar a:nth-child(2) {
     width: 110px;
    }
    #navbar a:nth-child(3) {
     width: 110px;
    }
    #navbar a:nth-child(4) {
     width: 110px;
    }
    #navbar a:nth-child(5) {
     width: 110px;
    }
    #navbar a:nth-child(6) {
     width: 110px;
    }
    #navbar a:nth-child(7) {
     width: 110px;
    }

    .popular .box-container .box{
      padding: 2rem;
    }


    .popular .box-container {
      gap:2.3rem;
    }

    .popular {
      padding: 0;
    }

  }

@media(max-width: 483px) {
    .input-search input {
        max-width: 310px;
        height: 50px;
    }

   /* .input-search button{
      padding: 10px 15px;
    }

    .input-search button i{
      font-size: 15px;
    }

    input:placeholder-shown + .form-control-placeholder {
      margin-top:3.7%;
    }

    input + .form-control-placeholder ,
    .form-control:focus + .form-control-placeholder{
      margin-left:-81.5%;
    }*/
  }

@media(max-width: 400px) {
    .input-search input {
        max-width: 242px;
        height: 40px;
    }

    .input-search button{
      padding: 10px 15px;
    }

    .input-search button i{
      font-size: 15px;
    }

    input:placeholder-shown + .form-control-placeholder {
      margin-top:3.7%;
    }

    input + .form-control-placeholder ,
    .form-control:focus + .form-control-placeholder{
      margin-left:-81.5%;
    }
  }

/* @media(max-width: 320px) {
    .input-search input {
        max-width: 242px;
        height: 40px;
    }

    .input-search button{
      padding: 10px 15px;
    }

    .input-search button i{
      font-size: 15px;
    }

    input:placeholder-shown + .form-control-placeholder {
      margin-top:3.7%;
    }

    input + .form-control-placeholder ,
    .form-control:focus + .form-control-placeholder{
      margin-left:-81.5%;
    }
  }*/
</style>

<!-- header section starts  -->

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
    

</div>
<div class="food_nav" id="food_nav_section" style="padding-top: 100px;">
  <h1 class="food_heading">
      <div id="navbar">
        <?php 
        $availability = "available";
        $sql = "SELECT * FROM food_product_category WHERE availability = '$availability'";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {

          
          $category    = $row['category'];


        ?>
        <a class="" href="#<?php echo $category;?>" ><?php echo $category;?></a>
        
      <?php }?>
      </div>
  </h1>

    <!-- CART SPAN SECTION -->  
</div>

<div class="input-search">
  <input type="search" 
             id="search" 
             autocomplete="off" 
             class="form-control" 
             placeholder=" " 
             name="search">
  <label class="form-control-placeholder" for="search" id="label-search">Search your favorite food</label>
  <button type="submit"><i class="fa fa-search"></i></button>
</div>
<?php 
        
        $sql = "SELECT * FROM food_product_category WHERE availability = '$availability' ";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {

          $category_id = $row['category_id'];
          $category    = $row['category'];


        ?>    
<section class="popular" id="<?php echo $category;?>" style="padding-top: 130px;">
     <h1 class="food_heading">
        <?php echo $category;?>
     </h1>

     <div class="box-container">
        <?php 


        $query = $conn->query("SELECT * FROM food_product WHERE category_id = '$category_id'");
        

        while ($row = $query->fetch_assoc()){

            $product_id             = $row['product_id'];
            $product_name           = $row['product_name'];
            $product_description    = $row['product_description'];
            $product_review         = $row['product_review'];
            $product_image          = $row['product_image'];
            $product_price          = $row['product_price'];      

            $hash = (($product_id*123456789*5678)/956783);
            $product_id_hash = urldecode(base64_encode($hash));
        ?>
        
        <div class="box" >

                <!-- <span class="price">₱<?php echo $product_price?></span> -->
                <img src="../images/<?php echo $product_image?>" alt="" onclick="location.href='food-product-details.php?product=<?php
                    echo $product_id_hash;
                  ?>';">
                <h3 onclick="location.href='food-product-details.php?product=<?php echo $product_id_hash;?>';"><?php echo $product_name?><p><?php echo $product_description?></p></h3>




                <!-- <button class="btn_decrement">-</button> -->

                 <input type="hidden"
                       class="quantity" 
                       value="1"
                       min="1" 
                       id="product_quantity<?php echo $product_id?>" 
                       style="
                       text-align: center; 
                       padding: 10px 0 10px 10px; 
                       width: 60px; 
                       /*box-shadow: 0 10px 40px rgba(159, 162, 177, .8);*/ ">

               <!--  <button class="btn_increment">+</button>  -->

                <button type="button" 
                        name="add_to_cart" 
                        data-id="<?php echo $product_id?>"
                         
                        class="add_cart"> 
                <b><i class="fas fa-plus"></i></b>
                </button>
                <input type="hidden" id="product_name<?php echo $product_id?>" value="<?php echo $product_name?>" name="product_name">
                <input type="hidden" id="product_price<?php echo $product_id?>" value="<?php echo $product_price?>" name="product_price">

            </div>
          <?php
            }
           ?>
    </div>
</section>
      <?php } ?>


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

                    

                    <td><a id="<?php echo $value['p_id'];?>" class="delete" style='cursor: pointer;'>Remove</a>
                    </td>

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
<!-- fixed subnavbar JS-->

 <script>
  $('a[href^="#"]').click(function(event) {
    var id = $(this).attr("href");
    var target = $(id).offset().top;
    $('html, body').animate({scrollTop:target}, 500);
    event.preventDefault();
  });

function getTargetTop(elem){
  var id = elem.attr("href");
  var offset = 60;
  return $(id).offset().top - offset;
}


  $(window).scroll(function(e){
    isSelected($(window).scrollTop())
  });

var sections = $('a[href^="#"]');

function isSelected(scrolledTo){
   
  var threshold = 100;
  var i;

  for (i = 0; i < sections.length; i++) {
    var section = $(sections[i]);
    var target = getTargetTop(section);
     
    if (scrolledTo > target - threshold && scrolledTo < target + threshold) {
      sections.removeClass("active");
      section.addClass("active");
    }

  };
}
</script>

<script>
window.onscroll = function() {myFunction()};

var navbar = document.getElementById("navbar");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky")
  } else {
    navbar.classList.remove("sticky");
  }
}
</script>
<!-- <script>
    var height = $('#invisible').height();

    $(window).scroll(function () {
        if($(this).scrollTop() > height){
            $('.nav').addClass(' fixed');
        } else {
            $('.nav').removeClass(' fixed');
        }
    });
</script> -->

<!-- <script src="../js/script.js"></script> -->

<script>
var indicator = document.querySelector('.nav-indicator');
var items = document.querySelectorAll('.nav-item');

function handleIndicator(el) {
  items.forEach(function (item) {
    item.classList.remove('is-active');
    item.removeAttribute('style');
  });
  indicator.style.width = "".concat(el.offsetWidth, "px");
  indicator.style.left = "".concat(el.offsetLeft, "px");
  indicator.style.backgroundColor = el.getAttribute('active-color');
  el.classList.add('is-active');
  el.style.color = el.getAttribute('active-color');
}

items.forEach(function (item, index) {
  item.addEventListener('click', function (e) {
    handleIndicator(e.target);
  });
  item.classList.contains('is-active') && handleIndicator(item);
});


</script>

<!-- <script>
var btnIncrement = document.getElementsByClassName('btn_increment');
var btnDecrement = document.getElementsByClassName('btn_decrement');

//INCREMENT
for(var i = 0; i < btnIncrement.length; i++) {
  var button = btnIncrement[i];
  button.addEventListener('click', function(event) {

      var buttonClicked = event.target;
      event.preventDefault();
      var input = buttonClicked.parentElement.children[4];
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
      var input = buttonClicked.parentElement.children[4];
      var inputValue = input.value;
      var newValue = parseInt(inputValue) -1;

      if(newValue >= 1 ) {
        input.value = newValue;
      }



  })
}
</script> -->

<!-- <script>
  // Select your input element.
var quantity = document.getElementByClassName('quantity');

// Listen for input event on numInput.
quantity.onkeydown = function(e) {
    if(!((e.keyCode > 95 && e.keyCode < 106)
      || (e.keyCode > 47 && e.keyCode < 58) 
      || e.keyCode == 8)) {
        return false;
    }
}  
</script> -->

<script src="./cart__functions.js">

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

  <!-- <script>
  let arrow = document.querySelectorAll(".arrow");
  for (var i = 0; i < arrow.length; i++) {
    arrow[i].addEventListener("click", (e)=>{
   let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
   arrowParent.classList.toggle("showMenu");
    });
  }
  let sidebar = document.querySelector(".sidebar");
  let sidebarBtn = document.querySelector(".bx-menu");
  console.log(sidebarBtn);
  sidebarBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("close");
  });
  </script> -->


 



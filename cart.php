<?php require_once("controllers/functions.php")?>


 <?php 

$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "badboyskusinadb";

$conn = new mysqli($servername, $username, $password, $dbname);

    if(isset($_POST['cart_id'])){
            if($_POST['action'] == 'add'){
               
                if(isset($_SESSION['cart'])){
                    $isalreadyExist = 0;
                    foreach($_SESSION['cart'] as $key => $value){
                        
                        if($_SESSION['cart'][$key]['p_id'] == $_POST['cart_id']){

                           $sql = "SELECT stocks FROM food_product WHERE product_id = ".$_POST['cart_id']." ";
                           $result = $conn->query($sql);

                           $row = mysqli_fetch_array($result);

                           $stocks = $row['stocks'];

                           if($_SESSION['cart'][$key]['p_quantity'] < $stocks) {
                                $_SESSION['cart'][$key]['p_quantity'] =  $_SESSION['cart'][$key]['p_quantity'] + $_POST['cart_quantity'];
                                $isalreadyExist++;
                            }
                           

                          /* elseif (){
                                $_SESSION['cart'][$key]['p_quantity'] =  $_SESSION['cart'][$key]['p_quantity'];
                            } */
                        }

                    }
                    if($isalreadyExist < 1){
                        $itemArray = array(
                            'p_id' => $_POST['cart_id'],
                            'p_name' => $_POST['cart_name'], 
                            'p_price' => $_POST['cart_price'],
                            'p_quantity' => $_POST['cart_quantity'] 
                        );
                        $_SESSION['cart'][]  = $itemArray;
                        
                    }



                }else{
                    $itemArray = array(
                        'p_id' => $_POST['cart_id'],
                        'p_name' => $_POST['cart_name'], 
                        'p_price' => $_POST['cart_price'],
                        'p_quantity' => $_POST['cart_quantity'] 
                    );
                    $_SESSION['cart'][]  = $itemArray;
                }
           }

}



if($_POST['action'] == 'remove'){
    foreach($_SESSION['cart'] as $key => $val){
        if( $val['p_id'] == $_POST['id_to_remove']){
            unset($_SESSION['cart'][$key]);
        }
    }

}

if(isset($_POST['cart_id'])) {
    if($_POST['action'] == 'decrement') {
        if(isset($_SESSION['cart'])){
            foreach($_SESSION['cart'] as $key => $value){
                if($_SESSION['cart'][$key]['p_id'] == $_POST['cart_id']){
                    $_SESSION['cart'][$key]['p_quantity'] =  $_SESSION['cart'][$key]['p_quantity'] - $_POST['cart_quantity'];

                    if($_SESSION['cart'][$key]['p_quantity'] <= 0){
                            unset($_SESSION['cart'][$key]);     
                    }
                }
            }  

           /* foreach($_SESSION['cart'] as $key => $val){ 
                 
            }*/
     
        }
    }
}




if(!empty($_SESSION['cart'])){
    $outputTable = '';
    $total = 0; 
    $total_quantity = 0;

    $outputTable .= "
    <table>
        <thead>
            <tr>
                
            </tr>
        </thead>";
    foreach($_SESSION['cart'] as $key => $value){


        $sql = "SELECT product_image, product_description FROM food_product WHERE product_id = ".$value['p_id']." ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                    $image = $row['product_image'];
                    $product_description = $row['product_description'];
                  }
                } 

        $menu = "menu.php";
        $outputTable .= "
        <tr>
            <td>
            

              <a class='decrement_cart' data-id='".$value['p_id']."' style='background-color: transparent; position: relative ; font-size: 14px; color: #FF3838; padding: 0; -webkit-user-select: none;  
                  -moz-user-select: none;    
                  -ms-user-select: none;      
                  user-select: none;'>
              <b>
                <i class='fas fa-minus'></i>
              </b>
            
           

            <span style='color: #666666; padding: 0 5px 0 5px; -webkit-user-select: none;  
                  -moz-user-select: none;    
                  -ms-user-select: none;      
                  user-select: none;'>".$value['p_quantity']."
            </span>

    
            <a class='add_cart' name='add_to_cart' data-id='".$value['p_id']."' style='background-color: transparent; position: relative ; font-size: 14px; color: #FF3838; padding: 0; -webkit-user-select: none;  
                  -moz-user-select: none;    
                  -ms-user-select: none;      
                  user-select: none;'>
              <b>
                <i class='fas fa-plus'></i>
              </b>
        
            </td>


            <td class='td_img' style='color: #666666;'><img src='images/".$image."'>".$value['p_name']."<br>
            ".$product_description."
            </td>

            

            <td style='color: #666666;'>₱ ".number_format($value['p_quantity'] * $value['p_price'], 0)."</td>


            <td><a id=".$value['p_id']." class='delete' style='cursor: pointer;'>Remove</a></td>
            <input type='hidden'
                       class='quantity' 
                       value='1'
                       min='1' 
                       id='product_quantity".$value['p_id']."' 
                       style='
                       text-align: center; 
                       padding: 10px 0 10px 10px; 
                       width: 60px; 
                       ''>
            <input type='hidden' id='product_name".$value['p_id']."' value='".$value['p_name']."' name='product_name'>
            <input type='hidden' id='product_price".$value['p_id']."' value='".$value['p_price']."' name='product_price'>

           

            
        </tr>
        ";  

        $total = $total + ($value['p_price'] * $value['p_quantity']);

        $total_quantity = $total_quantity + $value['p_quantity'];
        global $total_notif;
        $total_notif = $total_quantity;
        

    }
    $outputTable .= "</tbody></table>";
    $outputTable .= "
    <div style='position: fixed; bottom: 0; width: 95%;''>
    <h1 style='color: #666666;  display:flex; align-items: center; justify-content: space-between; font-weight: 400; '>
    <p>Subtotal<br><small style='font-weight: 300; font-size: 15px;'>Delivery Fee will be shown after you review order</small></p>
    <p>₱ ".number_format($total, 2)."</p></h1>
    <a href='' class='check__out' style='margin: 15px 0 15px 0; font-weight: 800;'>Review Order</a>";

    $_SESSION['total']  = $total;

    
} else {

    unset($_SESSION['total']);
    unset($_SESSION['cart_quantity']);

    $outputTable = '<h1 class="empty__cart__text">Your cart is empty.</h1>
        <img src="images/empty_cart.svg" width="200" class="empty__cart__img">
        <h2 class="js-menu__close" style="text-align: center;
        color: #00A5D4; font-size: 15px; margin-top: 25px;">Continue browsing</h2>';     

}


        
error_reporting(0);
echo json_encode($outputTable);



?>






<?php require_once("../controllers/functions.php")?>


 <?php 


    if(isset($_POST['cart_id'])){
            if($_POST['action'] == 'add'){
               
                if(isset($_SESSION['cart'])){
                    $isalreadyExist = 0;
                    foreach($_SESSION['cart'] as $key => $value){
                        
                        if($_SESSION['cart'][$key]['p_id'] == $_POST['cart_id']){
                            $isalreadyExist++;
                            $_SESSION['cart'][$key]['p_quantity'] =  $_SESSION['cart'][$key]['p_quantity'] + $_POST['cart_quantity'];
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

        $servername = "localhost";
        $username   = "root";
        $password   = "";
        $dbname     = "badboyskusinadb";

        $conn = new mysqli($servername, $username, $password, $dbname);

        $sql = "SELECT product_image FROM food_product WHERE product_id = ".$value['p_id']." ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
                 while($row = $result->fetch_assoc()) {
                    $image = $row['product_image'];
                  }
                } 

        $menu = "menu.php";
        $outputTable .= "
        <tr>
            <td style='text-align: center; padding-bottom: 50px; color: #666666;'>
            ".$value['p_quantity']."
            </td>
            <td class='td_img' style='color: #666666;'><img src='".$image."'>".$value['p_name']."</td>
            <td style='color: #666666;'>₱ ".number_format($value['p_quantity'] * $value['p_price'], 2)."</td>
            <td><a id=".$value['p_id']." class='delete' style='cursor: pointer;'>Remove</a></td>
            <input type='hidden' id='product_price ".$value['p_id']."' value='".$value['p_name']."' name='product_name'>
            <input type='hidden' id='product_name ".$value['p_id']."' value='".$value['p_price']."' name='product_price'>

            <button type='button' class='add_cartt' name='add_to_cart' data-id='".$value['p_id']."'><b><i class='fas fa-plus'></i></b>
            </button>
        </tr>
        ";  

        $total = $total + ($value['p_price'] * $value['p_quantity']);

        $total_quantity = $total_quantity + $value['p_quantity'];
        $_SESSION['cart_quantity'] = $total_quantity;
        

    }
    $outputTable .= "</tbody></table>";
    $outputTable .= "<h1 style='color: #666666;  display:flex; align-items: center; justify-content: space-between; font-weight: 400; '>
            <p>Subtotal<br><small style='font-weight: 300; font-size: 15px;'>Delivery Fee will be shown after you review order</small></p>
            <p>₱".number_format($total, 2)."</p></h1>";

    $_SESSION['total']  = $total;

    
} else {

    unset($_SESSION['total']);
    unset($_SESSION['cart_quantity']);     

}

error_reporting(0);
     
        

echo json_encode($outputTable);



?>






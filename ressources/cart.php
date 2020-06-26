<?php require_once("config.php"); ?>
<?php include(TEMPLATE_FRONT . "/header.php");?>


<?php
// add will have the id of our product, everytime is called it will will be concatenating with session and add one
// so we click on add we get these request and we're going to increment one everytime.
if(isset($_GET['add'])){
    $query = query("SELECT * FROM products WHERE product_id=" . escape_string($_GET['add']));
    confirm($query);

    while($row= fetch_array($query)){
        if($row['product_quantity'] >= $_SESSION["product_".$_GET['add']]){
            $_SESSION["product_".$_GET['add']] += 1;
            redirect("../public/checkout.php");
        }else{
            set_message("We only have ".$row['product_quantity']." ". "{$row['product_title']}" . " available");
            redirect("../public/checkout.php");

        }

    }


//     $_SESSION["product_".$_GET['add']] += 1;
//     redirect("index.php");
}
if(isset($_GET['remove'])){
    $_SESSION["product_".$_GET["remove"]]--;
    if($_SESSION["product_".$_GET["remove"]] <= 0){
        unset($_SESSION['item_total']);
        unset($_SESSION['item_quantity']);
        redirect("../public/checkout.php");
    }else{
        redirect("../public/checkout.php");
        
    }
}

if(isset($_GET['delete'])) {

    $_SESSION["product_".$_GET["delete"]]= '0';
    unset($_SESSION['item_total']);
    unset($_SESSION['item_quantity']);
    redirect("../public/checkout.php");
}

function cart(){
    
    $total = 0;
    $item_quantity = 0;
    $item_name = 1;
    $item_number = 1;
    $amount = 1;
    $quantity = 1;
    foreach($_SESSION as $name=>$value){
        if($value>0){
            if(substr($name, 0, 8) == "product_"){ 
                $length = strlen($name)-8;
                // echo $length;
                $id = substr($name, 8, $length);
                // $id = str_replace("", "product_", $name);
  

                $query = query("SELECT * FROM products WHERE product_id = ".escape_string($id)."");
                confirm($query);
                while($row=fetch_array($query)){
                    // print_r($row);
                    $sub = $row['product_price'] * $value;
                    // $product = $row['product_id']+1; #  => 35
                    // echo $product;
                    $item_quantity += $value; 
                    $product = <<<DELIMETER
                        <tr>
                            <td>{$row["product_title"]}<br>
                            <img width=100 src="../ressources/uploads/{$row['product_image']}">
                            </td>
                            <td>{$row['product_price']} dh</td>
                            <td>{$value}</td>
                            <td>$sub dh</td>
                            <td><a class ="btn btn-warning" href="../ressources/cart.php?remove={$row['product_id']}"><span class='glyphicon glyphicon-minus' ></span></a>
                            <a class ="btn btn-success" href="../ressources/cart.php?add={$row['product_id']}"><span class='glyphicon glyphicon-plus' ></span></a>
                            <a class ="btn btn-danger" href="../ressources/cart.php?delete={$row['product_id']}"><span class='glyphicon glyphicon-remove' ></span></a></td>
                        </tr>
                        <input type="hidden" name="item_name_{$item_name}" value="{$row['product_title']}">
                        <input type="hidden" name="item_number_{$item_number}" value="{$row['product_id']}">
                        <input type="hidden" name="amount_{$amount}" value="{$row['product_price']}">
                        <input type="hidden" name="amount_{$quantity}" value="{$value}">
                    DELIMETER;
                    echo $product;
                    $item_name++;
                    $item_number++;
    
                    $amount++;
                    echo $amount;
        
                    $quantity++;
                    
                    
                    $_SESSION['item_total'] = $total += $sub;
                    $_SESSION['item_quantity'] = $item_quantity;
                    // echo $_SESSION['item_quantity'] ;
                
                    // echo "<script>alert('hello')</script>";
                    // $sql = "INSERT INTO orders(product_id,order_quantity)VALUES({$product},{$_SESSION['item_quantity']})";
                    // $last_id = last_id();
                    // // echo $last_id ;
                    // confirm($sql);
                    // echo $_SESSION['product_id'];
            
                    
                    // $final_quantity = $_SESSION['item_quantity'] - $quantity;
                    // $sql = "INSERT INTO orders(product_id,order_quantity)VALUES({$row['product_id']},{$_SESSION['item_quantity']})";
                   
                    // $send_order = query("UPDATE products SET product_quantity = {$item_number} WHERE  product_id = {escape_string($id)}");
                    // $last_id = last_id();
                    // session_destroy();
                    // confirm($send_order);
    
                }

            }
        }
        
    }
}
    

?>
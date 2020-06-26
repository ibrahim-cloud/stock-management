<?php 

// helper function
function set_message($msg){
    if(!empty($msg)){
        $_SESSION['message'] = $msg;
    }else{
        $msg = "";
    }
}

function display_message(){
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        // will go when we refresh
        unset($_SESSION['message']);
    }
}

function redirect($location){
    header("Location: $location");
}

function query($sql){
    global $connection;
    return mysqli_query($connection, $sql);
}

function confirm($result){
    global $connection;
    if(!$result){
        die("Query Failed".mysqli_error($connection));
    }
}

function escape_string($string){
    global $connection;
    return mysqli_real_escape_string($connection, $string);
}

function fetch_array($result){
    return mysqli_fetch_array($result);
}

// product function
function get_products(){
    $query = query("SELECT * FROM products");
    confirm($query);
    while($row = fetch_array($query)){
        $product = <<<DELIMETER
            <div class="col-sm-4 col-lg-4 col-md-4">
                <div class="thumbnail">
                    <a href="item.php?id={$row['product_id']}"><img src="{$row['product_image']}" alt=""></a>
                    <div class="caption">
                        <h4 class="pull-right">{$row['product_price']} dh</h4>
                        <h4><a href="product.html">{$row['product_title']}</a>
                        </h4>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsum incidunt neque blanditiis eum velit.</p>
                        <a class="btn btn-primary" target="_blank" href="cart.php?add={$row['product_id']}">Chri hani</a>
                    </div>
                </div>
            </div>
            DELIMETER;

        echo $product;
    }
}

// function get_categories(){
//     $query = query("SELECT * FROM categories");
//     confirm($query);

//     while($row= mysqli_fetch_array($query)){
//         $category = <<<DELIMETER
//         <a style="border:beige;" href="category.php?id={$row['cat_id']}" class="list-group-item">{$row['cat_title']}</a>
//         DELIMETER;
//         echo $category;
//     }
// }

function get_products_in_cat_page(){
    $query = query("SELECT * FROM products WHERE product_category_id=". escape_string($_GET['id'])." ");
    confirm($query);
    while($row = fetch_array($query)){
        $product = <<<DELIMETER
            <div class="col-md-3 col-sm-6 hero-feature ">
                <div class="thumbnail">
                    <a href="item.php?id={$row['product_id']}"><img src="{$row['product_image']}" alt=""></a>
                    <div class="caption">
                        <h3>{$row['product_title']}</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a style="color: black !important;" href="" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}" style="color: #000000 !important;" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
            DELIMETER;

        echo $product;
    }
}

function get_products_in_shop_page(){
    $query = query("SELECT * FROM products");
    confirm($query);
    while($row = fetch_array($query)){
        $product = <<<DELIMETER
            <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <a href="item.php?id={$row['product_id']}"><img src="{$row['product_image']}" alt=""></a>
                    <div class="caption">
                        <h3>{$row['product_title']}</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="#"  style="background-color:#00aeef!important;"class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}"  style="color: black !important;"class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
            DELIMETER;

        echo $product;
    }
}



// // LOGIN
// function login(){
//     if(isset($_POST['submit'])){
//         $username = escape_string($_POST['username']);
//         $email = $_POST['email'];
//         $password = escape_string($_POST['password']);
//         $query = query("SELECT * FROM users WHERE username = '{$username}'AND email='{$email}' AND password = '{$password}'");
//         confirm($query);
        

//         if(mysqli_num_rows($query) == 0){
//             set_message("Your PASSWORD or USERNAME are wrong");
//             redirect("login.php");
//         }else{
//             $_SESSION['username'] = $username;
//             set_message("Welcome To ADMIN {$username}");

//             redirect("admin");
//         }
//     }
// }

// contact : send msg
function send_message(){
    if(isset($_POST['submit'])){
        $to = "EmailAdress@gmail.com";
        $from_name = $_POST['name'];
        $email     = $_POST['email'];
        $subject   = $_POST['subject'];
        $message   = $_POST['message'];
    
        $headers = "From: {$from_name} {$email}";
        $result = mail($to, $subject, $message, $headers);
        if(!$result){
            set_message("Sorry we couldn't send your msg");
            redirect("contact.php");
        }else{
            set_message("Your message has been sent");
            redirect("contact.php");
        }
    }

}


// *********************************************BAck End**********************************************


?>
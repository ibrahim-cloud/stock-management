<?php require_once("../ressources/config.php");?>
<?php include(TEMPLATE_FRONT .DS. "header.php"); ?>

<?php
 if(isset($_POST["submit"])){
    foreach($_SESSION as $name=>$value){
        if($value>0){
            if(substr($name, 0, 8) == "product_"){ 
                $length = strlen($name)-8;
                // echo $length;
                $id = substr($name, 8, $length);
                // $id = str_replace("", "product_", $name);
  

                $query = query("INSERT INTO orders(product_id,order_amount,order_quantity)VALUES({$id},{$_SESSION['item_total']},{$value})");
                confirm($query);
     
            }
        }
    }
     
 }?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <?php include(TEMPLATE_FRONT . "/top-nav.php"); ?>
</nav>


<!-- Page Content -->
<div class="container">
<!-- /.row --> 
    <div class="row">
        <h4 class="text-center bg-danger"><?php echo display_message(); ?></h4>
        <!-- <h1>Panier</h1> -->
        <div id="tit" style='display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  background-color: #00aeef;
  height: 133PX;
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  margin-top: 4%;'><h1 id="cc" style='color:#ffffff;'>Panier</h1></div>
        <form action="" method="post">


                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Sub-total</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php cart(); ?>
                    </tbody>
                </table>
                <?php
                // if(isset($_GET['add'])){
                //     echo "<script>alert('hello')</script>";
                //     $sql = "INSERT INTO orders(product_id,order_quantity)VALUES({$_SESSION['product_'.$_GET['add']]},{$_SESSION["item_quantity"]})";
                //     echo $_SESSION['product_'.$_GET['add']];
                // }
                // ?>
                <div class="form-group">
            
                  <input style="background-color:#00aeef;" type="submit" name="submit" class="btn btn-primary">
                </div>
            </form>

<!--  ***********CART TOTALS*************-->
            
<div class="col-xs-4 pull-right ">
    <h2>Total</h2>
        <table class="table table-bordered" cellspacing="0">
            <tbody>
                <tr class="cart-subtotal">
                    <th>Articles:</th>
                    <td><span class="amount">                        
                        <?php  
                            echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity'] : $_SESSION['item_quantity'] = "0";
                        ?></span></td>
                </tr>
                <tr class="shipping">
                    <th>Frais TVA</th>
                    <td>Livraison gratuite</td>
                </tr>
                <tr class="order-total">
                    <th>Order Total</th>
                    <td><strong><span class="amount">
                        <?php  
                            echo isset($_SESSION['item_total']) ? $_SESSION['item_total'] : $_SESSION['item_total'] = "0";
                        ?>

            
                    </span>dh</strong> </td>
                </tr>
            </tbody>
        </table>

</div><!-- CART TOTALS-->
 </div><!--Main Content-->
<?php include(TEMPLATE_FRONT . "/footer.php")?>
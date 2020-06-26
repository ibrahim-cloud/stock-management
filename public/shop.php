<?php require_once("../ressources/config.php");?>

<?php include(TEMPLATE_FRONT . DS . "header.php");

if(!isset($_SESSION['username'])){
    header ('location:login.php');
}

?>

<?php include ('server.php');?>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
 
    <?php include(TEMPLATE_FRONT . DS . "top-nav.php");?>)
        
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <!-- Jumbotron Header -->
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
  margin-top: 4%;'><h1 id="cc" style='color:#ffffff;'>Shop</h1></div>
        
        </header>

        <hr>

  

        <!-- Page Features -->
        <?php get_products_in_shop_page() ?>

        <div class="row text-center">

        </div>


    <?php include(TEMPLATE_FRONT . DS . "footer.php");?>


    </div>
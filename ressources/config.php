<?php 

ob_start();
session_start();

// session destroy is just for debuggin
// session_destroy();

// setup my path so i can use my files easier when im including requiring or using it with fcts or displaying img
// want to make sure that whatever path we're using is compatible with mac windows or lunix
defined("DS") ? null : define("DS", DIRECTORY_SEPARATOR);

defined("TEMPLATE_FRONT") ? null: define("TEMPLATE_FRONT", __DIR__ . DS . "templates/front");
// echo TEMPLATE_FRONT;
defined("TEMPLATE_BACK") ? null: define("TEMPLATE_BACK", __DIR__ . DS . "templates/back");
defined("UPLOAD_DIRECTORY") ? null: define("UPLOAD_DIRECTORY", __DIR__ . DS . "uploads");


defined("DB_HOST") ? null: define("DB_HOST","localhost");
defined("DB_USER") ? null: define("DB_USER","root");

defined("DB_PASS") ? null: define("DB_PASS","root");
defined("DB_NAME") ? null: define("DB_NAME","ecommerce");
defined("DB_PORT") ? null: define("DB_PORT","3306");

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);
require_once("functions.php");
require_once("cart.php");

?>
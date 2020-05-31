<?php 
	session_start();

	$name = "";
	$prix = "";
	$id = 0;
	$num=0;
	$edit_state = false;
	$_SESSION['quantite']=$num;
	$db = mysqli_connect('localhost', 'root', '', 'stock');

	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$prix = $_POST['prix'];
		$num = $_POST['num'];
      $query = "INSERT INTO `info` (name, prix,quantite) VALUES ('$name', '$prix','$num')"; 
		mysqli_query($db, $query);
		$_SESSION['msg'] = "product saved" ;
		$_SESSION['qq'] =$num;
		header('location: index.php');
	}
	if (isset($_POST['update'])) {
		$name = $_POST['name'];
		$prix = $_POST['prix'];
		$num = $_POST['num'];
		$id = $_POST['id'];
	
		mysqli_query($db, "UPDATE `info` SET name='$name', prix='$prix',quantite='$num' WHERE id=$id");
	    $_SESSION['msg'] = "product updated" ;
		header('location: index.php');
	}
	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM info WHERE id=$id");
		$_SESSION['msg'] = "product delete" ;
		header('location: index.php');
	}
	
	// $qq =$_POST['qq'];
	// $dd = $row['quantite'];
	// if ($qq > $dd)
	// // echo "noooooooonnnnnnnnnnnnnnnnnnnnnnnnnon";
	// $_SESSION['msg'] = "pass" ;
	// 	header('location: panier.php');
  

	// $_SESSION['name']=$
	$results = mysqli_query($db, "SELECT * FROM info");
	?>
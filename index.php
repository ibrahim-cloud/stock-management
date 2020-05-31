<?php  include('server.php'); ?>
<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$edit_state = true;
		$rec = mysqli_query($db,"SELECT * FROM info WHERE id=$id");
		$record = mysqli_fetch_array($rec);
		$name = $record['name'];
		$prix = $record['prix'];
		$id =$record['id'];
		$num = $record['quantite'];

	
	}
	// if (isset($_GET['edit'])) {
	// 	$id = $_GET['edit'];
	// 	$update = true;
	// 	$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

	// 	if (count($record) == 1 ) {
	// 		$n = mysqli_fetch_array($record);
	// 		$name = $n['name'];
	// 		$address = $n['address'];
	// 	}
	// }
?>



<!DOCTYPE html>
<html>
<head>
	<title>CRUD: CReate, Update, Delete PHP MySQL</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php if (isset($_SESSION['msg'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['msg']; 
			unset($_SESSION['msg']);
		?>
	</div>
<?php endif ?>

<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Prix</th>
			<th>Quantité</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	<tbody>
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['prix']; ?></td>
			<td><?php echo $row['quantite']; ?></td>
			<td>
				<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
	</tbody>
</table>


	<form method="post" action="server.php" >
	<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Name</label>
			
			<input type="text" name="name" value="<?php echo $name; ?>">

		</div>
		<div class="input-group">
			<label>prix</label>
			<input type="text" name="prix" value="<?php echo $prix; ?>">
		</div>
		<div class="input-group">
			<label>quantité</label>
			<input type="number" name="num" value="<?php echo $num; ?>">
		</div>
		<div class="input-group">
		<?php if ($edit_state == false): ?>
			<button class="btn" type="submit" name="save" >Save</button>
<?php else: ?>
<button class="btn" type="submit" name="update" >update</button>
<?php endif ?>
		</div>
	</form>
	<td><a href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i> view Product</a></td>
</body>
</html>
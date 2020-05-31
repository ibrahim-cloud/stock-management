<?php include ('server.php');?>



<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:50%">Product</th>
							<th style="width:10%">Price</th>
							<th style="width:8%">Quantity</th>
							
							<th style="width:10%"></th>
						</tr>
					</thead>
					<tbody>	
                    <?php while ($row = mysqli_fetch_array($results)) { ?>
						<tr>
							<td data-th="Product">
								<div class="row">
									<div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive"/></div>
									<div class="col-sm-10">
										<h4 class="nomargin"><?php echo $row['name']; ?></h4>
										<p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>
									</div>
								</div>
							</td>
							<td data-th="Price"><?php echo $row['prix']; ?></td>
							<td data-th="Quantity">
                                <input type="number"class="form-control text-center" name="qq" value="<?php echo $row['quantite']; ?>">
							</td>
							
							<td class="actions" data-th="">
								<button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
								<button class="btn btn-danger btn-sm" href="index.php?edit=<?php echo $row['id']; ?>"><i class="fa fa-trash-o"></i></button>								
							</td>
						</tr>
                        <?php } ?>
					</tbody>
                    
					<tfoot>
						
						<tr>
							<td><a href="index.php" class="btn btn-warning"><i class="fa fa-angle-left"></i>  Add Product</a></td>
							<td colspan="2" class="hidden-xs"></td>
						
							<td><a href="#" class="btn btn-success btn-block" >Checkout <i class="fa fa-angle-right"></i></a></td>
						</tr>
					</tfoot>
				</table>
				<?php if (isset($_SESSION['msg'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['msg']; 
			unset($_SESSION['msg']);
		?>
	</div>
<?php endif ?>
               
</div>









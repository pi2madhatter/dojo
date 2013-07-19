<?php
	//connect to database
	require_once('include/connection.php');
	//get specific product details by product id
	$product = fetchRecord("SELECT * FROM products where products.id = '".$_GET['id']."' ");
?>
<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>App Store</title>
	<link rel="stylesheet" href="../static/css/style.css" />
	<link rel="stylesheet" href="../static/bootstrap/css/bootstrap.css" />
	<link rel="stylesheet" href="../static/bootstrap/js/bootstrap.js" />
</head>
<body>
	<div id="wrapper">
		<div id="search_bar" class="navbar">
			<div class="navbar-inner">
				<a class="brand" href="#"><?php echo $product['name'] ?></a>
				<ul class="nav pull-right">
					<li><a href="index.php">Go back</a></li>
				</ul>
			</div>
		</div>
		<div id="products" class="hero-unit">
			<div class="media">			
				<img class="product_logo pull-left" src="../static/img/<?php echo $product['logo_path'] ?>">			
				<div class="media-body">
					<h4 class="media-heading">Description</h4>
					<p>
						<small><?php echo $product['description'] ?></small>
					</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
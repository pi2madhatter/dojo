<?php
	//connect to database
	require_once('include/connection.php');
	//get all products and product category
	$products = fetchAll("SELECT * FROM products");
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
				<a class="brand" href="#">Products</a>
			</div>
		</div>
		<div id="products" class="hero-unit">
			<ul class="thumbnails">
<?php		foreach($products as $product)
			{	?>
				<li class="span4">
					<div class="media">
						<a class="pull-left" href="product.php?id=<?php echo $product['id'] ?>">
							<img class="product_logo" src="../static/img/<?php echo $product['logo_path'] ?>">
						</a>						
						<div class="media-body">
							<h4 class="media-heading"><?php echo $product['name'] ?></h4>
							<h6><small>Price: $ <?php echo $product['price'] ?></small></h6>
						</div>
					</div>
				</li>
<?php		}	?>				
			</ul>
		</div>
	</div>
</body>
</html>
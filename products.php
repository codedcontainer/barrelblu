<!DOCTYPE html>
<head>
	<title>Barrel Blu</title>
	<link type="text/css" rel="stylesheet" href="layout.css"/>
	<link type="text/css" rel="stylesheet" href="scrollpane/jscrollpane.css"/>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="scrollpane/jscrollpane.js"></script>
	<script type="text/javascript" src="scrollpane/mousewheel.js"></script>
	<script type="text/javascript" src="action.js"></script>	
</head>
<body>
<div id="overlay">
			<a href="index.php"><div id="logo"></div></a>
		<div id="nav">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="products.php">Products</a></li>
				<li><a href='contact.php'>Contact</a></li>
			</ul>
				<?php include("cart.php"); ?>
		</div>
		<div id="catbar">
		<?php 
			include('cat.php');
		?>
		</div>
		<div id="con">
			<?php
				include('content.php');
			?>
		</div>
		<div id="exit"></div>
		<div id="box"></div>
		<div id="desc"></div>
</div>
<div id="container">

	<div id="clouds"></div>
	<div id="sand"><span id="footer">Copyright <?php print date(Y) ?> Barrel Blu (Jason Utt & Sarah Balbach)</span></div>
</div>
</body>
</html>
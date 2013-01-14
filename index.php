<!DOCTYPE html>
<head>
	<title>Barrel Blu</title>
	<link type="text/css" rel="stylesheet" href="layout.css"/>
	<script type="text/javascript" src="jquery.js"></script>
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
		</div>
		<video controls id="vid"height="350" width="700" style="margin-left:150px;width:620px">
		<source src="video/1.ogg" type="video/ogg"/>
		<source src="video/1.webm" type="video/webm"/>
		</video>
		<img src="images/barrelblu_text.png" id="blogo"/>
		</div>
</div>
<div id="container">
	<div id="clouds"></div>
	<div id="sand"><span id="footer">Copyright <?php print date(Y) ?> Barrel Blu (Jason Utt & Sarah Balbach)</span></div>
</div>
</body>
</html>
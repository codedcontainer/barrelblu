<!DOCTYPE html>
<head>
<script type="text/javascript" src="jquery.js"></script>
<style type="text/css">
.title{
	font-family:Gothic;
	float:left;
	margin-left:20px;
	margin-top:20px;
	margin-bottom:7px;
	font-size:25px;
}
#img{
margin-top:25px;
margin-left:20px;
	float:left;
	width:200px;
	height:320px;
}
.desc{
	overflow:auto;
	font-family: gothic;
	width:425px;
	float:right;
	margin-right:20px;
	margin-top:0px;
	height:160px;
}
@font-face{
	font-family:'Gothic';
	src:url('fonts/century_gothic_reg.ttf');
}
fieldset{
	float:left;
	margin-right:150px;
	margin-left:30px;
	margin-bottom:0px;
	border:none;
}
button{
	float:left;
	margin-left:45px;
	margin-right:200px;
	margin-bottom:15px;
	background-color:#714d08;
	color:white;
	font-family:'Gothic';
}
</style>
</head>
<body>
<?php
include("php_connect.php");
mysql_select_db('barrelbl_bb');
$get=$_GET['id'];
$select=mysql_query("SELECT * FROM items WHERE imgsrc='$get'");

while($rows=mysql_fetch_array($select))
{
	print "<img src="."'".$rows['imgsrc']."'"." id='img'/>";
	print "<p class='title'>".$rows['title']."</p>";
	print "<br/>";
		$print=<<<PRINT
				<fieldset>Colors: <select>
				<option>Yellow</option>
				<option>Green</option>
				<option>Red</option>
				<option>Blue</option>
				<option>Purple</option>
				<option>Black</option>
				<option>Pink</option>
				</select>
				</fieldset>
				<fieldset>Sizes: <select>
				<option>XS</option>
				<option>S</option>
				<option>M</option>
				<option>L</option>
				<option>Xl</option>
				</select>
				</fieldset>
				<fieldset>Quantity:<select>
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
				</select>
				</fieldset>
				<button>Add to Cart</button>
PRINT;
print $print;
		print "<p class='desc'>".utf8_encode($rows['desc'])."</p>";
}
?>
</body>
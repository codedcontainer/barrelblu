<!DOCTYPE html>
<head>
	<title>Barrel Blue Upload</title>
	<link type="text/css" rel="stylesheet" href="layout.css"/>
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="action.js"></script>
</head>
<body>
<div id="container">
<?php
include("php_connect.php");
mysql_select_db("barrelbl_bb");
$select=mysql_query("SELECT * FROM login");
$row=mysql_fetch_array($select);
$userd=md5($row['user']);
$passd=md5($row['pass']);
$user=md5($_POST['user']);
$pass=md5($_POST['pass']);

if(filter_has_var(INPUT_POST,'user') AND $user==$userd AND $pass==$passd)

{
		upload_form();
}
else
{
	if(filter_has_var(INPUT_POST,'title'))
	{
	upload();
	upload_form();
	}
	else
	{
	login();
	}
}

function login()
{
$pass=<<<PASS
	<table border='0'>
	<tr>
	<form method='post' action='form.php'>
	<td>Username: <input type="text" name="user"/></td>
	</tr>
	<tr>
	<td>Password: <input type="password" name="pass"/></td>
	</tr><tr>
	<td><input type="submit"></td>
	</tr>
	</form>
	</tr>
	</table>
PASS;
	print $pass;
}
function upload_form()
{
$form=<<<FORM
	<table border='0'>
	<form method="post" action="form.php" enctype="multipart/form-data">
		<tr>
			<td id="pic" width="300">
				<p align="center">Before uploading, remember to name your images under these requirements:
				<ul><li>No spaces</li>
					<li>No uppercase letters</li>
				</ul></p>
				<input type="file" name="fe" id="file"><br/>
			</td>
			<td width="395">
				<h3>Title</h3><input type="text" name="title" id="title"/>
				<h3>Description</h3><textarea name="desc" maxlength="5000" cols="50" rows="10"></textarea><br/>
				Price: $ <input type="text" name="price" maxlength="6"/><br/>
				Sex:<select name="sex">
					<option>Mens</option>
					<option>Womens</option>
				</select><br/>
				Categories:
				<select name="cat">
					<option value="1">Tees</option>
					<option value="2">Tanks</option>
					<option value="3">Dresses</option>
					<option value="4">Swim</option>
					<option value="5">Jewelry</option>
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="2" id="submit"><input type="submit" onclick="validate()"/><input type="reset"/><a href="products.php" target="_blank">View Products</a></td>
		</tr>
	</form>
	</table>
FORM;
print $form;
}
function upload()
{
$title=$_POST['title'];
$price=$_POST['price'];
$img="uploads/".$_FILES['fe']['name'];
$type=$_POST['sex'];
$cat=$_POST['cat'];
$desc=$_POST['desc'];
include("php_connect.php");

mysql_query("CREATE DATABASE bb");
mysql_select_db("bb");
mysql_query("CREATE TABLE items (
`id` INT NOT NULL AUTO_INCREMENT ,
`title` VARCHAR( 10 ) NOT NULL ,
`imgsrc` VARCHAR(30) NOT NULL,
`desc` LONGTEXT NOT NULL ,
`price` DECIMAL( 4,2 ) NOT NULL ,
`sex` VARCHAR( 10 ) NOT NULL ,
`cat_id` VARCHAR( 20 ) NOT NULL ,
PRIMARY KEY (  `id` )
)");

$great=mysql_query("CREATE TABLE category(
`cat_id` INT NOT NULL AUTO_INCREMENT,
`cat_name` VARCHAR(20),
PRIMARY KEY(`cat_id`)
)");

//Creates array of categories associated with upload form values
$categories=array('Tees','Tanks','Dresses','Swim','Jewelry');
//if category table exsists, do not inservt the above values
//becuase these values are already in table.
if($great)
{
	foreach($categories as $value)
	{
		mysql_query("INSERT INTO category VALUES
		(
			NULL,
			'$value'
		)");
	}
}
else 
{
	NULL;
}
mysql_query("INSERT INTO items VALUES
(
	'',
	'$title',
	'$img',
	'$desc',
	'$price',
	'$type',
	'$cat'
)");
//Images
$target_path="uploads/";
$target_path.=basename($_FILES['fe']['name']);
move_uploaded_file($_FILES['fe']['tmp_name'], $target_path);
}
?>

<div id="clouds"><div id="logo">
		</div></div>
	<div id="sand"></div>
	</div>
</body>
</html>
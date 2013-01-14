<?php
include("php_connect.php");
mysql_select_db('barrelbl_bb');
if($_GET)
{
	print "<div id='what'>";
	$get=$_GET['id'];
	$type=(explode('_',$get, 2));
	print ucfirst($type[0])." ".ucfirst($type[1]);
	print "</div>";
}
else 
{
	print "<div id='what'>Most Popular Items";
	$sum_query=mysql_query("SELECT COUNT(cart_id) FROM cart");
	$row=mysql_fetch_array($sum_query);
	print "<a href='shopping_cart.php'></a>";
	print "</div>";
}			
?>
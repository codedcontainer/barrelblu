<?php
include("php_connect.php");
mysql_select_db("barrelbl_bb");
	//Number of Mens and Womens Items - MYSQL.
function genderitems($sex)
{
	$get=mysql_query("SELECT COUNT(*) FROM items WHERE sex='$sex' ");

	$rows=mysql_fetch_array($get);

	return $rows[0];
}
	//Number mens by item and number of womens by item - MYSQL.
function specific($sex,$cat)
{
	$select=mysql_query("SELECT COUNT(*) FROM category INNER JOIN items on items.cat_id=category.cat_id 
						WHERE sex='$sex' AND cat_name='$cat'");
		//$select=mysql_query("SELECT COUNT(*)FROM items WHERE sex='$sex' AND cat='$cat'");
	$row=mysql_fetch_array($select);
	return $row[0];
}
		/*Create an array for products associated for men and women.
 		 array must use same names associated with upload form, category names.*/
	$main=array('Tees','Tanks','Dresses','Swim','Jewelry');
	$womens=$main;
	$mens=$main;	
	//Create a function that will use above array information
	//and print a value when placed into the specific function.
function  genderarray($name,$type)
{
	//If there are not any items assosiated that show up then display nothing,
	//Otherwise show item name and the number of items.
	foreach($name as $item)
	{
		if(specific($type,$item)==0)
		{
			NULL;
		}
		else
		{
			$under="_";
			$typelower=strtolower($type);
			$lower=strtolower($item);
			print "<a href='?id=$typelower$under$lower'>";
			print $item." (".specific($type,$item).")";
			print "</a>\n";
		}
	}
}
	/*
	//Shows specific number of items by sex.
	genderarray($mens,"Mens");
	print "<br/>";
	genderarray($womens,"Womens");
	print "<br/>";
	 * 
	//Shows the total number of male and women items.
	print "There are ".genderitems("Womens")." Women Items";
	print "<br/>";
	print "There are ".genderitems("Mens")." Men Items";
	*/
print "<h3>Womens</h3>\r\t\n";
print genderarray($womens,"Womens");
print "<h3>Mens</h3>\n";
print genderarray($mens,"Mens");
?>
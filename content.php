<?php
		include('php_connect.php');
		mysql_select_db('barrelbl_bb');
		if(filter_has_var(INPUT_GET, 'id'))
		{
			$type=$_GET['id'];
				//Seperates string before and after '_' and creates array.
			$type=(explode('_',$type, 2));
			$gender=$type[0];
			$item=$type[1];
				//Change cat_name based on url id.				
			$select=mysql_query("SELECT items.title,items.imgsrc,items.desc,items.price,items.sex,category.cat_name
			 FROM items INNER JOIN category ON items.cat_id=category.cat_id 
			 WHERE cat_name='$item' AND sex='$gender'");
			while($rows=mysql_fetch_array($select))
			{
				print "<div class='product'>";
			
				print "<img class='lightbox' src="."'".$rows['imgsrc']."'"."/>";
				print "<div class='des'>";
				
				print $rows['title']."<br/>";
				print "$".$rows['price']."<br/>";
					//print substr($rows['desc'],1,200)." more";
				print "<br/>";
				print "</div>";
				print "</div>";
			}			
		}
		else{
				//Determine how many elements are in
			$select=mysql_query("SELECT COUNT(items.id),items.title,items.imgsrc,items.desc,items.price,items.sex,category.cat_name
			 FROM items INNER JOIN category ON items.cat_id=category.cat_id ORDER BY id");
			$row=mysql_fetch_array($select);
			$dditems=$row[0];
			$dditems++;
						
				$select=mysql_query("SELECT items.id,items.title,items.imgsrc,items.desc,items.price,items.sex,category.cat_name
			 FROM items INNER JOIN category ON items.cat_id=category.cat_id ORDER BY rand() LIMIT 10");
				while($rows=mysql_fetch_array($select))
			{
				print "<div class='product'>";
				print "<img class='lightbox' src="."'".$rows['imgsrc']."'"."/>";
				print "<div class='des'>";
				print $rows['title']."<br/>";
				print "$".$rows['price']."<br/>";
					//print substr($rows['desc'],1,200)." more";
				print "<br/>";
				print "</div>";
				print "</div>";
			}
		}
?>
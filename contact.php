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
			<div>
			<?php 
			
			if(filter_has_var(INPUT_POST, 'submit'))
			{
				print "<p id='form'>Your information has been sent!</p>";
				$name=$_POST['name'];
				$email=$_POST['email'];
				$mess=$_POST['mess'];
				$phone=$_POST['phone'];
				$mess.=" \r\n"."\r\n"."Telephone: ".$phone. "\r\n"." Email: ".$email;
				$to="jutt@jdudesign.com";
				$subject="Barrel Blu Form";
				mail($to, $subject, $mess);
				mail('sbalbach18@gmail.com',$subject,$mess);
			
				form();
				
			}
			else{
				form();
			}
function form()
{
$form=<<<FORM
			<form method='post' action='contact.php' id='form'>
			<fieldset>Name:<br/><input type="text" name="name" required/></fieldset>
			<fieldset>Email:<br/><input type="email" name="email" required/></fieldset>
			<fieldset>Phone:<br/><input type="number" name="phone" required/></fieldset>
			<fieldset>Message:<br/><textarea rows='10' cols='27' name='mess' required></textarea></fieldset>
			<fieldset><input type="submit" name='submit' value="Send" /></fieldset>
			</form>
FORM;
			print $form;
}
			?>
			</div>
		</div>
		
</div>
<div id="container">

	<div id="clouds"></div>
	<div id="sand"><span id="footer">Copyright <?php print date(Y) ?> Barrel Blu (Jason Utt & Sarah Balbach)</span></div>
</div>
</body>
</html>
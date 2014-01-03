<?php
	if ($_POST['user'] != 'user' || $_POST['pwd'] != 'password'){
		echo "Incorrect credentials. You do not have access to the database";
		exit;
	}
?>
<!DOCTYPE html>
<html>


<link type= "text/css" rel ="stylesheet" href = "testcss.css"/>

<body>
<p id = "title"><a href="homepage.htm" style="color: #FFFFFF; text-decoration: none;">Computer Hardware Database</a></p>
<p id = "greeter">Power Supply Admin Controls</p>

	<div id='contentBox' style='margin:0px auto; width:90%'>

    <div id='column1' style='float:left; margin:0;width:33%'>



	<p id = "greeter">Remove a Power Supply</p>
	<div id = "wrap">
	<div id = "content">
	<form id = insertbox name="input" action="postremovepowersupply.php" method="POST">
	Name: <input type="text" name="name"><br><br>

	<center><input type="image" src="removebutton.jpg" /></center>
	</form>
	</div>
	</div>




    </div>
    <div id='column2' style='float:left; margin:0;width:33%'>



	<p id = "greeter">Insert Power Supply specs</p>
	<div id = "wrap">
	<div id = "content">
	<form id = insertbox name="input" action="postinsertpowersupply.php" method="POST">
	Brand: <input type="text" name="brand"><br><br>
	Name: <input type="text" name="name"><br><br>
	Price: <input type="text" name="price"><br><br>
	Input Power: <input type="text" name="power"><br><br>
	Power Pin: <input type="text" name="power_pin"><br><br>
	Voltage: <input type="text" name="in_volt"><br><br>
	Current: <input type="text" name="in_curr"><br><br>
	URL: <input type="text" name="url"><br><br>

	<center><input type="image" src="insertbutton.jpg" /></center>
	</form>
	</div>
	</div>




    </div>

    <div id='column3' style='float:left; margin:0;width:33%'>

	<p id = "greeter">Update a Power Supply</p>
	<div id = "wrap">
	<div id = "content">
	<form id = insertbox name="input" action="postupdatepowersupply.php" method="POST">
	Provide URL: <input type="text" name="url"><br><p id = 'searchitem'>
	if the URL doesn't exist, insert it
	</p>
	<br>
	Brand: <input type="text" name="brand"><br><br>
	Name: <input type="text" name="name"><br><br>
	Price: <input type="text" name="price"><br><br>
	Input Power: <input type="text" name="power"><br><br>	
	Power Pin: <input type="text" name="power_pin"><br><br>
	Voltage: <input type="text" name="in_volt"><br><br>
	Current: <input type="text" name="in_curr"><br><br>

	<center><input type="image" src="updatebutton.jpg" /></center>
	</form>
	</div>
	</div>



    </div>

	</div>



<br><br>

<!--
<p id = "footer"><a href="hardware.htm" style="color: #FFFFFF; text-decoration: none;">Ehh.. Search again</a></p>
-->
</body>
</html>

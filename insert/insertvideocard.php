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
<p id = "greeter">Motherboard Admin Controls</p>

	<div id='contentBox' style='margin:0px auto; width:90%'>

    <div id='column1' style='float:left; margin:0;width:33%'>



	<p id = "greeter">Remove a Video Card
	<div id = "wrap">
	<div id = "content">
	<form id = insertbox name="input" action="postremovevideocard.php" method="POST">
	Name: <input type="text" name="name"><br><br>

	<center><input type="image" src="removebutton.jpg" /></center>
	</form>
	</div>
	</div>




    </div>
    <div id='column2' style='float:left; margin:0;width:33%'>



	<p id = "greeter">Insert Video Card specs</p>
	<div id = "wrap">
	<div id = "content">
	<form id = insertbox name="input" action="postinsertvideocard.php" method="POST">
	Name: <input type="text" name="name"><br><br>
	Price: <input type="text" name="price"><br><br>
	Brand: <input type="text" name="brand"><br><br>
	Interface: <input type="text" name="interface"><br><br>
	Chipset Brand: <input type="text" name="chipset_manf"><br><br>
	GPU: <input type="text" name="gpu"><br><br>
	Clock Speed: <input type="text" name="clock"><br><br>
	Memory Size: <input type="text" name="memory_size"><br><br>
	Memory Type: <input type="text" name="memory_type"><br><br>
	Power Usage: <input type="text" name="power"><br><br>
	URL: <input type="text" name="url"><br><br>
	<center><input type="image" src="insertbutton.jpg" /></center>
	</form>
	</div>
	</div>




    </div>

    <div id='column3' style='float:left; margin:0;width:33%'>

	<p id = "greeter">Update a Video Card</p>
	<div id = "wrap">
	<div id = "content">
	<form id = insertbox name="input" action="postupdatevideocard.php" method="POST">
	Provide URL: <input type="text" name="url">

	<p id = 'searchitem'>
	if the URL doesn't exist, insert it
	</p>
	<br>

	

	Name: <input type="text" name="name"><br><br>
	Price: <input type="text" name="price"><br><br>
	Brand: <input type="text" name="brand"><br><br>
	Interface: <input type="text" name="interface"><br><br>
	Chipset Brand: <input type="text" name="chipset_manf"><br><br>
	GPU: <input type="text" name="gpu"><br><br>
	Clock Speed: <input type="text" name="clock"><br><br>
	Memory Size: <input type="text" name="memory_size"><br><br>
	Memory Type: <input type="text" name="memory_type"><br><br>
	Power Usage: <input type="text" name="power"><br><br>

	<center><input type="image" src="updatebutton.jpg" /></center>
	</form>
	</div>
	</div>




<br><br>

<!--
<p id = "footer"><a href="hardware.htm" style="color: #FFFFFF; text-decoration: none;">Ehh.. Search again</a></p>
-->
</body>
</html>

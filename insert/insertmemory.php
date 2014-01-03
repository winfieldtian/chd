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
<p id = "greeter">Memory Admin Controls</p>

	<div id='contentBox' style='margin:0px auto; width:90%'>

    <div id='column1' style='float:left; margin:0;width:33%'>



	<p id = "greeter">Remove a RAM</p>
	<div id = "wrap">
	<div id = "content">
	<form id = insertbox name="input" action="postremovememory.php" method="POST">
	Name: <input type="text" name="name"><br><br>

	<center><input type="image" src="removebutton.jpg" /></center>
	</form>
	</div>
	</div>




    </div>
    <div id='column2' style='float:left; margin:0;width:33%'>



	<p id = "greeter">Insert RAM specs</p>
	<div id = "wrap">
	<div id = "content">
	<form id = insertbox name="input" action="postinsertmemory.php" method="POST">
	Name: <input type="text" name="name"><br><br>
	Series: <input type="text" name="series"><br><br>
	Price: <input type="text" name="price"><br><br>
	Brand: <input type="text" name="brand"><br><br>
	Type: <input type="text" name="type"><br><br>
	Capacity: <input type="text" name="capacity"><br><br>
	speed: <input type="text" name="speed"><br><br>
	URL: <input type="text" name="url"><br><br>

	<center><input type="image" src="insertbutton.jpg" /></center>
	</form>
	</div>
	</div>




    </div>

    <div id='column3' style='float:left; margin:0;width:33%'>

	<p id = "greeter">Update a RAM</p>
	<div id = "wrap">
	<div id = "content">
	<form id = insertbox name="input" action="postupdatememory.php" method="POST">
	Provide URL: <input type="text" name="url"><br><p id = 'searchitem'>
	if the URL doesn't exist, insert it
	</p>
	<br>
	Name: <input type="text" name="name"><br><br>
	Series: <input type="text" name="series"><br><br>
	Price: <input type="text" name="price"><br><br>
	Brand: <input type="text" name="brand"><br><br>
	Type: <input type="text" name="type"><br><br>
	Capacity: <input type="text" name="capacity"><br><br>
	Speed: <input type="text" name="speed"><br><br>

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

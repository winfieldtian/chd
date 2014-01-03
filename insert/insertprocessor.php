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
	<p id = "greeter">Processor Admin Controls</p>

	<div id='contentBox' style='margin:0px auto; width:90%'>

    <div id='column1' style='float:left; margin:0;width:33%'>



	<p id = "greeter">Remove a Processor</p>
	<div id = "wrap">
	<div id = "content">
	<form id = insertbox name="input" action="postremoveprocessor.php" method="POST">
	Name: <input type="text" name="name"><br><br>

	<center><input type="image" src="removebutton.jpg" /></center>
	</form>
	</div>
	</div>




    </div>
    <div id='column2' style='float:left; margin:0;width:33%'>



	<p id = "greeter">Insert Processor specs</p>
	<div id = "wrap">
	<div id = "content">
	<form id = insertbox name="input" action="postinsertprocessor.php" method="POST">
	Name: <input type="text" name="name"><br><br>
	Series: <input type="text" name="series"><br><br>
	Price: <input type="text" name="price"><br><br>
	Brand: <input type="text" name="brand"><br><br>
	Socket Type: <input type="text" name="cpu_socket_type"><br><br>
	Multi-Core: <input type="text" name="multi_core"><br><br>
	Frequency: <input type="text" name="frequency"><br><br>
	Power Usage: <input type="text" name="power"><br><br>
	Graphics: <input type="text" name="integrated_graphics"><br><br>
	URL: <input type="text" name="url"><br><br>

	<center><input type="image" src="insertbutton.jpg" /></center>
	</form>
	</div>
	</div>




    </div>

    <div id='column3' style='float:left; margin:0;width:33%'>

	<p id = "greeter">Update a Processor</p>
	<div id = "wrap">
	<div id = "content">
	<form id = insertbox name="input" action="postupdateprocessor.php" method="POST">
	Provide URL: <input type="text" name="url"><p id = 'searchitem'>
	if the URL doesn't exist, insert it
	</p>
	<br>
	Name to Update: <input type="text" name="name"><br><br>
	Series: <input type="text" name="series"><br><br>
	Price: <input type="text" name="price"><br><br>
	Brand: <input type="text" name="brand"><br><br>
	Socket Type: <input type="text" name="cpusocket_type"><br><br>
	Multi-Core: <input type="text" name="multi_core"><br><br>
	Frequency: <input type="text" name="frequency"><br><br>
	Power Usage: <input type="text" name="power"><br><br>
	Graphics: <input type="text" name="integrated_graphics"><br><br>
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

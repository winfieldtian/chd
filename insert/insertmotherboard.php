
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



	<p id = "greeter">Remove a Motherboard
	<div id = "wrap">
	<div id = "content">
	<form id = insertbox name="input" action="postremovemotherboard.php" method="POST">
	Name: <input type="text" name="name"><br><br>

	<center><input type="image" src="removebutton.jpg" /></center>
	</form>
	</div>
	</div>




    </div>
    <div id='column2' style='float:left; margin:0;width:33%'>



	<p id = "greeter">Insert Motherboard specs</p>
	<div id = "wrap">
	<div id = "content">
	<form id = insertbox name="input" action="postinsertmotherboard.php" method="POST">
	Name: <input type="text" name="name"><br><br>
	Price: <input type="text" name="price"><br><br>
	Brand: <input type="text" name="brand"><br><br>
	Socket Type: <input type="text" name="cpu_socket_type"><br><br>
	Memory Slots: <input type="text" name="num_memory_slots"><br><br>
	Max Memory: <input type="text" name="max_memory_support"><br><br>
	PCI Express 3.0: <input type="text" name="num_pci_express"><br><br>
	PCI Express 2/1: <input type="text" name="pci_express_reg"><br><br>
	USB 1.0/2.0: <input type="text" name="usb"><br><br>
	USB 3.0 <input type="text" name="usb_3"><br><br>
	SATA: <input type="text" name="sata"><br><br>
	Form: <input type="text" name="form"><br><br>
	Power Pin: <input type="text" name="power_pin"><br><br>
	URL: <input type="text" name="url"><br><br>

	<center><input type="image" src="insertbutton.jpg" /></center>
	</form>
	</div>
	</div>




    </div>

    <div id='column3' style='float:left; margin:0;width:33%'>

	<p id = "greeter">Update a Motherboard</p>
	<div id = "wrap">
	<div id = "content">
	<form id = insertbox name="input" action="postupdatemotherboard.php" method="POST">
	Provide URL: <input type="text" name="url"><p id = 'searchitem'>
	if the URL doesn't exist, insert it
	</p>
	<br>
	Name to Update: <input type="text" name="name"><br><br>
	Price: <input type="text" name="price"><br><br>
	Brand: <input type="text" name="brand"><br><br>
	Socket Type: <input type="text" name="cpu_socket_type"><br><br>
	Memory Slots: <input type="text" name="num_memory_slots"><br><br>
	Max Memory: <input type="text" name="max_memory_support"><br><br>
	PCI Express 3.0: <input type="text" name="num_pci_express"><br><br>
	PCI Express 2/1: <input type="text" name="pci_express_reg"><br><br>
	USB 1.0/2.0: <input type="text" name="usb"><br><br>
	USB 3.0 <input type="text" name="usb_3"><br><br>
	SATA: <input type="text" name="sata"><br><br>
	Form: <input type="text" name="form"><br><br>
	Power Pin: <input type="text" name="power_pin"><br><br>

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

<!DOCTYPE html>
<html>


<link type= "text/css" rel ="stylesheet" href = "testcss.css"/>

<body>
<p id = "title"><a href="homepage.htm" style="color: #FFFFFF; text-decoration: none;">Computer Hardware Database</a></p>


<?php
$con = mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","wtian4_user", "cs411" ,"wtian4_chd");


$toggle = 1;
$query = "SELECT * FROM motherboard WHERE name = " . "'" . $_POST['name'] . "'";
$result = mysqli_fetch_array(mysqli_query($con, $query));
$curr = $result;

$thename = $result['name'];
$max_memory_support = preg_replace("/[^0-9]/","", $result['max_memory_support']);
if ($max_memory_support == 0)
	$toggle = 0;

$cheapifyquery = "SELECT * FROM motherboard WHERE price <= " . $result['price'];
$cheapifyquery = $cheapifyquery . " && (convert(max_memory_support, unsigned) >= " . $max_memory_support . " )";
$cheapifyquery = $cheapifyquery . " && cpu_socket_type = " . "'" . $result['cpu_socket_type'] . "'";
$cheapifyquery = $cheapifyquery . " && num_memory_slots = " . "'" . $result['num_memory_slots'] . "'";


$cheapifyquery = $cheapifyquery . " && num_pci_express >= " . "'" . $result['num_pci_express'] . "'";

$cheapifyquery = $cheapifyquery . " && sata >= " . "'" . $result['sata'] . "'";

$cheapifyquery = $cheapifyquery . " && usb >= " . "'" . $result['usb'] . "'";
$cheapifyquery = $cheapifyquery . " && usb_3 >= " . "'" . $result['usb_3'] . "'";

$cheapifyquery = $cheapifyquery . " && form = " . "'" . $result['form'] . "'";
$cheapifyquery = $cheapifyquery . " && power_pin = " . "'" . $result['power_pin'] . "'";

$cheapifyquery = $cheapifyquery . " ORDER BY price ASC";
$result = mysqli_query($con, $cheapifyquery);

switch($toggle){
	case "0":
	echo "<p id = 'greeter'>";
	echo "Component is missing information in database";
	echo "</p>";
	echo "<p id = 'item'>";
	echo "Please contact administrator to update information";
	echo "</p>";
	break;

	case "1":
	echo "<p id = 'greeter'>";
	echo "Cheapify found these alternatives to " . $thename;
	echo "</p>";

function echo_one_result($row)
{
	echo "<p id = 'searchitem'>";
	echo "<b>";
	$link = $row['url'];
	echo "<a href='$link' style='color: #FFFFFF; text-decoration: none;'>";
	echo $row['name'];
	echo "</a>";
	echo "</b>";
	echo "<br>";
	echo "Brand: ";
	echo $row['brand'];
	echo "<br>";

	echo "Price: $";
	echo $row['price'];
	echo "<br>";

	echo "Socket Type: ";
	echo $row['cpu_socket_type'];
	echo "<br>";

	echo "Memory Slots: ";
	echo $row['num_memory_slots'];
	echo "<br>";

	echo "Memory Standard: ";
	echo $row['memory_standard'];
	echo "<br>";

	echo "Max Memory Support: ";
	echo $row['max_memory_support'];
	echo "<br>";

	echo "PCI Express 3.0 Slots: ";
	echo $row['num_pci_express'];
	echo "<br>";

	echo "PCI Express 2.0/1.0 Slots: ";
	echo $row['pci_express_reg'];
	echo "<br>";

	echo "SATA Port: ";
	echo $row['sata'];
	echo "<br>";

	echo "USB 1.0/2.0: ";
	echo $row['usb'];
	echo "<br>";

	echo "USB 3.0: ";
	echo $row['usb_3'];
	echo "<br>";

	echo "Form Factor: ";
	echo $row['form'];
	echo "<br>";

	echo "Power Pin: ";
	echo $row['power_pin'];
	echo "<br>";
	echo "</p>";
} 

/*
$query = "SELECT name FROM motherboard";
$result = mysqli_query($con, $query);
*/
echo "<div id='contentBox' style='margin:0px auto; width:80%'>";

    echo "<div id='column1' style='float:left; margin:0; width:25%'>";
    echo "<div id = 'breaker' style='    max-width:184px; word-wrap:break-word;'>";

    $counter = 0;
	$result = mysqli_query($con, $cheapifyquery);

	while($row = mysqli_fetch_array($result)){
		if ($counter%4 == 0)
			echo_one_result($row);

		$counter++;
	}
	echo "</div>";
	echo "</div>";

    echo "<div id='column2' style='float:left; margin:0;width:25%' >";
    echo "<div id = 'breaker' style='    max-width:184px; word-wrap:break-word;'>";
	$result = mysqli_query($con, $cheapifyquery);
    $counter = 0;

	while($row = mysqli_fetch_array($result)){
		if ($counter%4 == 1)
			echo_one_result($row);

		$counter++;
	}
	echo "</div>";
    echo "</div>";

    echo"<div id='column3' style='float:left; margin:0;width:25%'>";
    echo "<div id = 'breaker' style='    max-width:184px; word-wrap:break-word;'>";
	$result = mysqli_query($con, $cheapifyquery);
    $counter = 0;

	while($row = mysqli_fetch_array($result)){
		if ($counter%4 == 2)
			echo_one_result($row);

		$counter++;
	}
    echo"</div>";
    echo "</div>";

    echo"<div id='column4' style='float:left; margin:0;width:25%'>";
    echo "<div id = 'breaker' style='    max-width:184px; word-wrap:break-word;'>";
	$result = mysqli_query($con, $cheapifyquery);
    $counter = 0;

	while($row = mysqli_fetch_array($result)){
		if ($counter%4 == 3)
			echo_one_result($row);

		$counter++;
	}
    echo"</div>";
    echo "</div>";
	echo"</div>";
	break;
}

/*
$tablename = Motherboard;
$num_col = 2;
$col = array("Name", "Price");

$result = searchByAttribute($tablename, $num_col, $col, 0 , $con);

$row = mysqli_fetch_array($result);
echo "<p id = 'item'>";
echo $row['Name'] . " " . $row['Price'];
echo "</p>";

echo "<p id = 'item'>";
echo $_POST['name'];
echo $_POST['price'];
echo $_POST['brand'];
echo "</p>";
*/
?>
<br>

<br>
<div id='column4' style='right:2%; top: 25%; margin:0;width:9%; position: fixed'>
<?php
	if ($toggle != 0)
		echo_one_result($curr);
?>
<p id = "footer">Login to modify database</p>

<!--<p id = "itembold"><a href="insertprocessor.htm" style="color: #FFFFFF; text-decoration: none;">Click here to add one!</a></p>!-->
<br>


<center><form id = insertbox name="input" action="insertmotherboard.php" method="POST">
Username: <input type="text" name="user" size="11"><br><br>
Password: <input type="password" name="pwd" size="11"></center>

<center><input type="image" src="loginbutton.jpg" /></center>
</form>

<p id = "footer"><a href="hardware.htm" style="color: #FFFFFF; text-decoration: none;">New Search</a></p>
</div>
</body>
</html>

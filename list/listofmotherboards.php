<!DOCTYPE html>
<html>


<link type= "text/css" rel ="stylesheet" href = "testcss.css"/>

<body>
<p id = "title"><a href="homepage.htm" style="color: #FFFFFF; text-decoration: none;">Computer Hardware Database</a></p>



<p id = "greeter">Displaying motherboards in the database...</p>

<br>
<?php
$con = mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","wtian4_user", "cs411" ,"wtian4_chd");

/* Check Connection
if(mysqli_connect_errno($con))
{
	echo "Failed to connect";
}
else
{
	echo "Connected!";
}
*/

function insertElement($tablename, $num_attr, $attr, $con)
{
	
	//Create a working query, make sure there are values for everything.
	$query = "INSERT INTO" . $tablename . " VALUES (";
	for($i = 0; $i < $num_attr; $i++)
	{
		if($i == $num_attr - 1)
			$query = $query. "'" . $attr[$i] . "')";
		else
			$query = $query. "'" . $attr[$i] . "'";
	}
	//INSERT 
	mysqli_query($con, $query);
}

$postVals = array_values($_POST);
$postKeys = array_keys($_POST);
$postCount = count($_POST);
function searchByAttribute($tablename, $num_col, $attr, $keys, $con)
{
	$query = "SELECT * FROM motherboard WHERE";

	for ($i = 0; $i < $num_col - 3; $i++){
		if ($i != 1){
			if ($attr[$i] == "")
				$query = $query . " " . $keys[$i] . " != " . "'0'" . " && ";
			else 
				$query = $query . " " . $keys[$i] . " = " . "'" .$attr[$i] . "'" . " && ";
		}
		else {
			if ($attr[$i] == "")
				$query = $query . " " . $keys[$i] . " != " . "'0'" . " && ";
			else 
				$query = $query . " " . $keys[$i] . " <= " . "'" .$attr[$i] . "'" . " && ";
		}
	}
	if ($attr[$i] == "")
		$query = $query . " " . $keys[$i] . " != " . "'0'";
	else 
		$query = $query . " " . $keys[$i] . " = " . "'" .$attr[$i] . "'";

	$query = $query . " ORDER BY price ASC";
	return mysqli_query($con, $query);

}

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
    $result = searchbyAttribute("motherboard", $postCount, $postVals, $postKeys, $con);

	while($row = mysqli_fetch_array($result)){
		if ($counter%4 == 0)
			echo_one_result($row);

		$counter++;
	}
	echo "</div>";
	echo "</div>";

    echo "<div id='column2' style='float:left; margin:0;width:25%' >";
    echo "<div id = 'breaker' style='    max-width:184px; word-wrap:break-word;'>";
	$result = searchbyAttribute("motherboard", $postCount, $postVals, $postKeys, $con);
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
	$result = searchbyAttribute("motherboard", $postCount, $postVals, $postKeys, $con);
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
	$result = searchbyAttribute("motherboard", $postCount, $postVals, $postKeys, $con);
    $counter = 0;

	while($row = mysqli_fetch_array($result)){
		if ($counter%4 == 3)
			echo_one_result($row);

		$counter++;
	}
    echo"</div>";
    echo "</div>";
	echo"</div>";


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

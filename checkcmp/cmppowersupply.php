<!DOCTYPE html>
<html>


<link type= "text/css" rel ="stylesheet" href = "testcss.css"/>

<body>
<p id = "title"><a href="homepage.htm" style="color: #FFFFFF; text-decoration: none;">Computer Hardware Database</a></p>

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
$querysup = "SELECT power_pin FROM powersupply WHERE name = " . "'" . $_POST['powersupply'] . "'";
$querymb = "SELECT power_pin FROM motherboard WHERE name = " . "'" . $_POST['motherboard'] . "'";
$powsup = mysqli_fetch_array(mysqli_query($con, $querysup));
$mobo = mysqli_fetch_array(mysqli_query($con, $querymb));
$toggle = 2;

if ($powsup['power_pin'] == $mobo['power_pin'])
	$toggle = 1;

if ($powsup['power_pin'] == 0 || $mobo['power_pin'] == 0)
	$toggle = 0;

switch($toggle){
	case "0":
	echo "<p id = 'greeter'>";
	echo "Components do not exist in the database";
	echo "</p>";
	break;

	case "1":
	echo "<p id = 'greeter'>";
	echo "These two parts are compatible";
	echo "</p>";
	break;

	case "2":
	echo "<p id = 'greeter'>";
	echo "not compatible! here are some suggestions";
	echo "<br>";
	echo "</p>";
	$query = "SELECT * FROM powersupply WHERE power_pin = " . "'" . $mobo['power_pin'] . "'";
	$query = $query . " ORDER BY price ASC";

	$result = mysqli_query($con, $query);

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

	echo "Input Power: ";
	echo $row['power'];
	echo "<br>";

	echo "Power Pin: ";
	echo $row['power_pin'];
	echo "<br>";

	echo "Voltage: ";
	echo $row['in_volt'];
	echo "<br>";

	echo "Current: ";
	echo $row['in_curr'];
	echo "<br>";
	echo "</p>";
} 

echo "<div id='contentBox' style='margin:0px auto; width:80%'>";

    echo "<div id='column1' style='float:left; margin:0; width:25%'>";
    $counter = 0;
	$result = mysqli_query($con, $query);

	while($row = mysqli_fetch_array($result)){
		if ($counter%4 == 0)
			echo_one_result($row);

		$counter++;
	}
		    echo "</div>";

    echo "<div id='column2' style='float:left; margin:0;width:25%'>";
	$result = mysqli_query($con, $query);
    $counter = 0;

	while($row = mysqli_fetch_array($result)){
		if ($counter%4 == 1)
			echo_one_result($row);

		$counter++;
	}
    echo "</div>";

    echo"<div id='column3' style='float:left; margin:0;width:25%'>";
	$result = mysqli_query($con, $query);
    $counter = 0;

	while($row = mysqli_fetch_array($result)){
		if ($counter%4 == 2)
			echo_one_result($row);

		$counter++;
	}
    echo"</div>";

    echo"<div id='column4' style='float:left; margin:0;width:25%'>";
	$result = mysqli_query($con, $query);
    $counter = 0;

	while($row = mysqli_fetch_array($result)){
		if ($counter%4 == 3)
			echo_one_result($row);

		$counter++;
	}
    echo"</div>";
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

<p id = "footer">Login to modify database</p>

<!--<p id = "itembold"><a href="insertprocessor.htm" style="color: #FFFFFF; text-decoration: none;">Click here to add one!</a></p>!-->
<br>


<center><form id = insertbox name="input" action="insertpowersupply.php" method="POST">
Username: <input type="text" name="user" size="11"><br><br>
Password: <input type="password" name="pwd" size="11"></center>

<center><input type="image" src="loginbutton.jpg" /></center>
</form>

<p id = "footer"><a href="homepage.htm" style="color: #FFFFFF; text-decoration: none;">New Search</a></p>
</div>
</body>
</html>

<!DOCTYPE html>
<html>


<link type= "text/css" rel ="stylesheet" href = "testcss.css"/>

<body>
<p id = "title"><a href="homepage.htm" style="color: #FFFFFF; text-decoration: none;">Computer Hardware Database</a></p>






<?php
$con = mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","wtian4_user", "cs411" ,"wtian4_chd");

$querycase = 3;

$temp = $_POST['procname'];
$proc_power = "SELECT power FROM processor WHERE name = " . "'" . $temp . "'";
$proc_pow = mysqli_fetch_array(mysqli_query($con, $proc_power));
if (!(double)$proc_pow['power'])
	$querycase = 0;

$temp = $_POST['vidname'];
$vid_power = "SELECT power FROM videocard WHERE name = " . "'" . $temp . "'";
$vid_pow = mysqli_fetch_array(mysqli_query($con, $vid_power));
if (!(double)$vid_pow['power'])
	$querycase = 1;

$temp = $_POST['moboname'];
$mobo_pin = "SELECT power_pin FROM motherboard WHERE name = " . "'" . $temp . "'";
$mobo_p = mysqli_fetch_array(mysqli_query($con, $mobo_pin));
if (!(double)$proc_pow['power'])
	$querycase = 2;

if ($_POST['procname'] == "" || $_POST['vidname'] == "" || $_POST['moboname'] == "")
	$querycase = 4;

$total_power = (double)$proc_pow['power'] + (double)$vid_pow['power'];

$temp = $mobo_p['power_pin'];
$query = "SELECT * FROM powersupply WHERE power_pin = " . "'" . $temp . "'";
$query = $query . " && power >= " . "'" . $total_power . "'";
$query = $query . " ORDER BY price ASC";


switch($querycase){
	case "0":
		echo "<p id = 'greeter'>";
		echo "Select processor does not have a power value in the database";
		echo "</p>";
		$query = "SELECT * FROM powersupply WHERE url = '0'";
		break;
	case "1":
		echo "<p id = 'greeter'>";
		echo "Select video card does not have a power value in the database";
		echo "</p>";
		$query = "SELECT * FROM powersupply WHERE url = '0'";
		break;
	case "2":
		echo "<p id = 'greeter'>";
		echo "Select motherboard does not have a power pin value in the database";
		echo "</p>";
		$query = "SELECT * FROM powersupply WHERE url = '0'";
		break;
	case "3":
		$pin = $mobo_p['power_pin'];
		echo "<p id = 'item'>";
		echo "Power Supply is a ";
		echo $pin;
		echo " pin with at input least ";
		echo $total_power;
		echo " W";
		echo "</p>";

		echo "<p id = 'greeter'>";
		echo "Displaying compatible power supplies in the database...";
		echo "</p>";
		echo "<br>";
		break;
	case "4":
		echo "<p id = 'greeter'>";
		echo "You must fill in all three criterias";
		echo "</p>";
		$query = "SELECT * FROM powersupply WHERE url = '0'";
		break;
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

	echo "Input Power: ";
	echo $row['power'];
	echo " W";
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

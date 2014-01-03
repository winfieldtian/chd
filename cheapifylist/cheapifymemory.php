<!DOCTYPE html>
<html>


<link type= "text/css" rel ="stylesheet" href = "testcss.css"/>

<body>
<p id = "title"><a href="homepage.htm" style="color: #FFFFFF; text-decoration: none;">Computer Hardware Database</a></p>


<?php
$con = mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","wtian4_user", "cs411" ,"wtian4_chd");

$toggle = 1;
$query = "SELECT * FROM memory WHERE name = " . "'" . $_POST['name'] . "'";
$result = mysqli_fetch_array(mysqli_query($con, $query));
$curr = $result;

$thename = $result['name'];

$capacity = explode(" ", $result['capacity']);
$unit = strstr($capacity[0], 'G');
if ($unit == 'GB'){
	$pos = strpos($capacity[0], 'GB');
	$capacity = substr($capacity[0], 0, $pos);
}
else
	$capacity = substr($capacity[0], 0, 3);


$speed = explode(" ", $result['speed']);

if ($capacity == 0 || $result['speed'] == NULL)
	$toggle = 0;


$cheapifyquery = "SELECT * FROM memory WHERE price <= " . $result['price'];
$cheapifyquery = $cheapifyquery . " && type = " . "'" . $result['type'] . "'";

if ($capacity > 50) //GB
	$cheapifyquery = $cheapifyquery . " && (convert(capacity, unsigned) >= " . $capacity . " )";
else {
	$cheapifyquery = $cheapifyquery . " && (convert(capacity, unsigned) >= " . $capacity . " )";
	$cheapifyquery = $cheapifyquery . " && (convert(capacity, unsigned) < 50)";
}

$cheapifyquery = $cheapifyquery . " && speed LIKE '%" . $speed[0] . "%'";
$cheapifyquery = $cheapifyquery . " && speed LIKE '%" . $speed[1] . "%'";

$cheapifyquery = $cheapifyquery . " ORDER BY price ASC";

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
	echo "Series: ";
	echo $row['series'];
	echo "<br>";

	echo "Price: $";
	echo $row['price'];
	echo "<br>";

	echo "Brand: ";
	echo $row['brand'];
	echo "<br>";

	echo "Type: ";
	echo $row['type'];
	echo "<br>";

	echo "Capacity: ";
	echo $row['capacity'];
	echo "<br>";

	echo "Speed: ";
	echo $row['speed'];
	echo "<br>";
	echo "</p>";
} 



echo "<div id='contentBox' style='margin:0px auto; width:80%'>";

    echo "<div id='column1' style='float:left; margin:0; width:25%'>";
    $counter = 0;
	$result = mysqli_query($con, $cheapifyquery);

	while($row = mysqli_fetch_array($result)){
		if ($counter%4 == 0)
			echo_one_result($row);

		$counter++;
	}
		    echo "</div>";

    echo "<div id='column2' style='float:left; margin:0;width:25%'>";
	$result = mysqli_query($con, $cheapifyquery);
    $counter = 0;

	while($row = mysqli_fetch_array($result)){
		if ($counter%4 == 1)
			echo_one_result($row);

		$counter++;
	}
    echo "</div>";

    echo"<div id='column3' style='float:left; margin:0;width:25%'>";
	$result = mysqli_query($con, $cheapifyquery);
    $counter = 0;

	while($row = mysqli_fetch_array($result)){
		if ($counter%4 == 2)
			echo_one_result($row);

		$counter++;
	}
    echo"</div>";

    echo"<div id='column4' style='float:left; margin:0;width:25%'>";
	$result = mysqli_query($con, $cheapifyquery);
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
<?php
	if ($toggle != 0)
		echo_one_result($curr);
?>
<p id = "footer">Login to modify database</p>

<!--<p id = "itembold"><a href="insertprocessor.htm" style="color: #FFFFFF; text-decoration: none;">Click here to add one!</a></p>!-->
<br>


<center><form id = insertbox name="input" action="insertmemory.php" method="POST">
Username: <input type="text" name="user" size="11"><br><br>
Password: <input type="password" name="pwd" size="11"></center>

<center><input type="image" src="loginbutton.jpg" /></center>
</form>

<p id = "footer"><a href="hardware.htm" style="color: #FFFFFF; text-decoration: none;">New Search</a></p>
</div>
</body>
</html>

<!DOCTYPE html>
<html>


<link type= "text/css" rel ="stylesheet" href = "testcss.css"/>

<body>
<p id = "title"><a href="homepage.htm" style="color: #FFFFFF; text-decoration: none;">Computer Hardware Database</a></p>




<?php
$con = mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","wtian4_user", "cs411" ,"wtian4_chd");

$queryproc = "SELECT cpu_socket_type FROM processor WHERE name = " . "'" . $_POST['processor'] . "'";
$querymb = "SELECT cpu_socket_type FROM motherboard WHERE name = " . "'" . $_POST['motherboard'] . "'";
$proc = mysqli_fetch_array(mysqli_query($con, $queryproc));
$mobo = mysqli_fetch_array(mysqli_query($con, $querymb));
$toggle = 2;

if ($proc['cpu_socket_type'] == $mobo['cpu_socket_type'])
	$toggle = 1;

if ($proc['cpu_socket_type'] == NULL || $mobo['cpu_socket_type'] == NULL)
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
	$query = "SELECT * FROM processor WHERE cpu_socket_type = " . "'" . $mobo['cpu_socket_type'] . "'";
	$query = $query . " ORDER BY price ASC";
	$result = mysqli_query($con, $query);

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

function searchByAttribute($tablename, $num_col, $attr, $keys, $con)
{
	$query = "SELECT * FROM processor WHERE";

	for ($i = 0; $i < $num_col - 3; $i++){
		if ($i != 2){
			if ($attr[$i] == "")
				$query = $query . " " . $keys[$i] . " != " . "'NULL'" . " && ";
			else 
				$query = $query . " " . $keys[$i] . " = " . "'" .$attr[$i] . "'" . " && ";
		}
		else {
			if ($attr[$i] == "")
				$query = $query . " " . $keys[$i] . " != " . "'NULL'" . " && ";
			else 
				$query = $query . " " . $keys[$i] . " <= " . "'" .$attr[$i] . "'" . " && ";
		}
	}
	if ($attr[$i] == "")
		$query = $query . " " . $keys[$i] . " != " . "'NULL'";
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
	echo "Series: ";
	echo $row['series'];
	echo "<br>";

	echo "Price: $";
	echo $row['price'];
	echo "<br>";

	echo "Brand: ";
	echo $row['brand'];
	echo "<br>";

	echo "Socket Type: ";
	echo $row['cpu_socket_type'];
	echo "<br>";

	echo "Multi-core: ";
	echo $row['multi_core'];
	echo "<br>";

	echo "Frequency: ";
	echo $row['frequency'];
	echo "<br>";

	echo "Power Usage: ";
	echo $row['power'] . " W";
	echo "<br>";

	echo "Integrated Graphics: ";
	echo $row['integrated_graphics'];
	echo "<br>";
	echo "</p>";
} 

	$result = mysqli_query($con, $query);

//$query = "SELECT * FROM processor";
//$result = mysqli_query($con, $query);

	echo "<div id='contentBox' style='margin:0px auto; width:80%'>";

    echo "<div id='column1' style='float:left; margin:0; width:25%'>";
    $counter = 0;

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


<center><form id = insertbox name="input" action="insertprocessor.php" method="POST">
Username: <input type="text" name="user" size="11"><br><br>
Password: <input type="password" name="pwd" size="11"></center>

<center><input type="image" src="loginbutton.jpg" /></center>
</form>

<p id = "footer"><a href="hardware.htm" style="color: #FFFFFF; text-decoration: none;">New Search</a></p>
</div>
</body>
</html>

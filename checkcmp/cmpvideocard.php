<!DOCTYPE html>
<html>


<link type= "text/css" rel ="stylesheet" href = "testcss.css"/>

<body>
<p id = "title"><a href="homepage.htm" style="color: #FFFFFF; text-decoration: none;">Computer Hardware Database</a></p>



<br>
<?php
$con = mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","wtian4_user", "cs411" ,"wtian4_chd");

$queryvid = "SELECT url FROM videocard WHERE name = " . "'" . $_POST['videocard'] . "'";
$querymb = "SELECT url FROM motherboard WHERE name = " . "'" . $_POST['motherboard'] . "'";
$vidcard = mysqli_fetch_array(mysqli_query($con, $queryvid));
$mobo = mysqli_fetch_array(mysqli_query($con, $querymb));
$toggle = 1;

if ($vidcard['url'] == NULL || $mobo['url'] == NULL){
	$toggle = 0;
}
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
}
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
/*
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
	$query = "SELECT * FROM videocard WHERE";

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
	echo "Series: ";
	echo $row['series'];
	echo "<br>";

	echo "Price: $";
	echo $row['price'];
	echo "<br>";

	echo "Brand: ";
	echo $row['brand'];
	echo "<br>";

	echo "Interface: ";
	echo $row['interface'];
	echo "<br>";

	echo "Chipset Brand: ";
	echo $row['chipset_manf'];
	echo "<br>";

	echo "GPU: ";
	echo $row['gpu'];
	echo "<br>";

	echo "Clock Speed: ";
	echo $row['clock'];
	echo "<br>";

	echo "Memory Size: ";
	echo $row['memory_size'];
	echo "<br>";

	echo "Memory Type: ";
	echo $row['memory_type'];
	echo "<br>";


	echo "Power Usage: ";
	echo $row['power'];
	echo "<br>";
	echo "</p>";
} 



echo "<div id='contentBox' style='margin:0px auto; width:80%'>";

    echo "<div id='column1' style='float:left; margin:0; width:25%'>";
    $counter = 0;
    $result = searchbyAttribute("videocard", $postCount, $postVals, $postKeys, $con);

	while($row = mysqli_fetch_array($result)){
		if ($counter%4 == 0)
			echo_one_result($row);

		$counter++;
	}
		    echo "</div>";

    echo "<div id='column2' style='float:left; margin:0;width:25%'>";
	$result = searchbyAttribute("videocard", $postCount, $postVals, $postKeys, $con);
    $counter = 0;

	while($row = mysqli_fetch_array($result)){
		if ($counter%4 == 1)
			echo_one_result($row);

		$counter++;
	}
    echo "</div>";

    echo"<div id='column3' style='float:left; margin:0;width:25%'>";
	$result = searchbyAttribute("videocard", $postCount, $postVals, $postKeys, $con);
    $counter = 0;

	while($row = mysqli_fetch_array($result)){
		if ($counter%4 == 2)
			echo_one_result($row);

		$counter++;
	}
    echo"</div>";

    echo"<div id='column4' style='float:left; margin:0;width:25%'>";
	$result = searchbyAttribute("videocard", $postCount, $postVals, $postKeys, $con);
    $counter = 0;

	while($row = mysqli_fetch_array($result)){
		if ($counter%4 == 3)
			echo_one_result($row);

		$counter++;
	}
    echo"</div>";
	echo"</div>";


*/
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


<center><form id = insertbox name="input" action="insertvideocard.php" method="POST">
Username: <input type="text" name="user" size="11"><br><br>
Password: <input type="password" name="pwd" size="11"></center>

<center><input type="image" src="loginbutton.jpg" /></center>
</form>

<p id = "footer"><a href="hardware.htm" style="color: #FFFFFF; text-decoration: none;">New Search</a></p>
</div>
</body>
</html>

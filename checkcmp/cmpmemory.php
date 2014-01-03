<!DOCTYPE html>
<html>


<link type= "text/css" rel ="stylesheet" href = "testcss.css"/>

<body>
<p id = "title"><a href="homepage.htm" style="color: #FFFFFF; text-decoration: none;">Computer Hardware Database</a></p>

<?php
$con = mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","wtian4_user", "cs411" ,"wtian4_chd");

$queryram = "SELECT * FROM memory WHERE name = " . "'" . $_POST['memory'] . "'";
$querymb = "SELECT * FROM motherboard WHERE name = " . "'" . $_POST['motherboard'] . "'";
$ram = mysqli_fetch_array(mysqli_query($con, $queryram));
$mobo = mysqli_fetch_array(mysqli_query($con, $querymb));
$toggle = 1;

$ddr3 = explode(" ", $ram['speed']);
if ($ddr3[0] != 'DDR3')
	$toggle = 2;

$mobocompat = strstr($mobo['memory_standard'], $ddr3[1]);
if ($mobocompat == NULL )
	$toggle = 2;
echo $mobocompat;

if ($ram['url'] == NULL || $mobo['url'] == NULL)
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

	$query = "SELECT * FROM memory WHERE speed LIKE '%DDR3%'";

	$mbcompat = explode("/", $mobo['memory_standard']);

	for ($z = 0; $z < count($mbcompat); $z++)
		$mbcompat[$z] = preg_replace("/[^0-9]/","", $mbcompat[$z]);

	if ($mpcompat[0] != 1)
		$mbcompat[0] = substr($mbcompat[0], 1);

	for ($y = 0; $y < count($mbcompat); $y++)
		$query = $query . " || speed LIKE '%" . $mbcompat[$y] . "%'";

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


<center><form id = insertbox name="input" action="insertmemory.php" method="POST">
Username: <input type="text" name="user" size="11"><br><br>
Password: <input type="password" name="pwd" size="11"></center>

<center><input type="image" src="loginbutton.jpg" /></center>
</form>

<p id = "footer"><a href="hardware.htm" style="color: #FFFFFF; text-decoration: none;">New Search</a></p>
</div>
</body>
</html>

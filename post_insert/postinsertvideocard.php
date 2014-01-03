<!DOCTYPE html>
<html>


<link type= "text/css" rel ="stylesheet" href = "testcss.css"/>

<body>
<p id = "title"><a href="homepage.htm" style="color: #FFFFFF; text-decoration: none;">Computer Hardware Database</a></p>



<p id = "greeter">Successfully added into database!</p>


<?php
$con = mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","wtian4_user", "cs411" ,"wtian4_chd");

/* Check connection
if(mysqli_connect_errno($con))
{
	echo "Failed to connect";
}
else
{
	echo "Connected!";
}
*/

$postVals = array_values($_POST);
$postKeys = array_keys($_POST);
$postCount = count($_POST);
function insertElement($tablename, $num_attr, $attr, $column ,$con)
{
	
	//Create a working query, make sure there are values for everything.
	$query = "INSERT INTO " . $tablename . "(";

	for($i = 0; $i < $num_attr -2; $i++)
	{
		if($i == $num_attr -3)
			$query = $query . $column[$i] . ")"; 	
		else
			$query = $query . $column[$i] .", ";
	}
	
	$query = $query. " VALUES (";
	
	for($i = 0; $i < $num_attr-2; $i++)
	{
		if($i == $num_attr - 3)
			$query = $query. "'" . $attr[$i] . "')";
		else
			$query = $query. "'" . $attr[$i] . "',";
	}
	
	//echo $query;
	
	return mysqli_query($con, $query);
}

insertElement("videocard", $postCount, $postVals, $postKeys, $con);


//$query = "INSERT INTO Motherboard (Price, Name) VALUES ('10', 'MB5')";

//mysqli_query($con, $query);


?>
<br>

<p id = "footer"><a href="hardware.htm" style="color: #FFFFFF; text-decoration: none;">Back to hardware search</a></p>
<p id = "footer"><a href="videocard.htm" style="color: #FFFFFF; text-decoration: none;">Back to video card search</a></p>

</body>
</html>

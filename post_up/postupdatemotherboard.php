<!DOCTYPE html>
<html>


<link type= "text/css" rel ="stylesheet" href = "testcss.css"/>

<body>
<p id = "title"><a href="homepage.htm" style="color: #FFFFFF; text-decoration: none;">Computer Hardware Database</a></p>



<p id = "greeter">Successfully updated the database!</p>


<?php
$con = mysqli_connect("engr-cpanel-mysql.engr.illinois.edu","wtian4_user", "cs411" ,"wtian4_chd");


$values = array_values($_POST);
$keys = array_keys($_POST);
$count = count($_POST);
	
	$query = "UPDATE motherboard SET ";
	$where = "WHERE ";
	$andtoggle = 0;

	for ($i = 1; $i < $count - 2; $i++){

		if ($values[$i] != ""){
			if ($andtoggle){
				$query = $query . ", ";	
				$where = $where . ", ";
			}
			$andtoggle = 1;
			$query = $query . $keys[$i] . " = " . "'" . $values[$i] . "'";

		}

	}

	$link = $_POST['url'];
	$query = $query . " " . "WHERE url = " . "'" . $link . "'";

	mysqli_query($con, $query);


?>
<br>

<p id = "footer"><a href="hardware.htm" style="color: #FFFFFF; text-decoration: none;">Back to hardware search</a></p>
<p id = "footer"><a href="motherboard.htm" style="color: #FFFFFF; text-decoration: none;">Back to motherboard search</a></p>

</body>
</html>

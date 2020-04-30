<?php

include_once('connect.php');
// header("Access-Control-Allow-Origin: *");

$id = $_GET['sId'];
$conn = mysqli_connect("localhost", "root", "", "angular7php");
$qry = "SELECT * FROM `students` WHERE `sId`=`{$id} 	LIMIT 1";

// $result = mysqli_query($conn, $qry);
if($result= mysqli_query($conn, $qry)){
	while ($row = mysqli_fetch_assoc($result)) {
		# code...
	

print($row);
echo $json = json_encode($row);

}
}

//
?>
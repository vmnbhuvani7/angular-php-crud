<?php

include_once('connect.php');
// header("Access-Control-Allow-Origin: *");

$id = $_GET['sId'];
$conn = mysqli_connect("localhost", "root", "", "angular7php");
echo $qry = "DELETE FROM `students` WHERE sId = '{$id}'";
// $result = ;
if (mysqli_query($conn, $qry) > 0) {
	
	http_response_code(204);
} else {
	http_response_code(404);
}
?>
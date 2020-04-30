<?php

include_once('connect.php');
header("Access-Control-Allow-Origin: *");

$students = [];
$conn = mysqli_connect("localhost", "root", "", "angular7php");
$qry = "select * from students";
$result = mysqli_query($conn, $qry);
if (mysqli_num_rows($result) > 0) {
	$cr = 0;
	while ($array = mysqli_fetch_array($result)) {

		$students[$cr]['sId'] = $array['sId'];
		$students[$cr]['fname'] = $array['fname'];
		$students[$cr]['lname'] = $array['lname'];
		$students[$cr]['email'] = $array['email'];
		$cr++;
	}
	// print_r($students);
	echo json_encode($students);
} else {
	http_response_code(404);
}
?>
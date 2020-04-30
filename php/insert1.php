<?php

include_once('connect.php');
header("Access-Control-Allow-Origin: *");
$conn = mysqli_connect("localhost", "root", "", "angular7php");
$postdata = file_get_contents("php://input");
if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);
	
	$fname = mysqli_real_escape_string($conn, trim($request-> fname));
		$lname = mysqli_real_escape_string($conn, trim($request-> lname));
		$email = mysqli_real_escape_string($conn, $request-> email);
}
$qry = "INSERT INTO `students`(`fname`, `lname`, `email`) VALUES ('$fname','$lname','$email')";
if (mysqli_query($conn, $qry)) {
	
	http_response_code(201);

} else {
	echo "failed";
}
?>
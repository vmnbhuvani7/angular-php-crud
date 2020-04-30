<?php

include_once('connect.php');
header("Access-Control-Allow-Origin: *");

$postdata = file_get_contents("php://input");
if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  		$request = json_decode($postdata);
		$id = mysqli_real_escape_string($conn, (int)$_GET['sId']);
		$fname = mysqli_real_escape_string($conn, trim($request-> fname));
		$lname = mysqli_real_escape_string($conn, trim($request-> lname));
		$email = mysqli_real_escape_string($conn, $request-> email);
}
$qry = "UPDATE `students` SET 'sId'='$id',`fname` ='$fname' , `lname` = '$lname', `email` = '$email' WHERE 'sId'='{$id}' LIMIT 1";
if (mysqli_query($conn, $qry)) {
	
	http_response_code(204);

} else {
	return http_response_code(422);
}
?>
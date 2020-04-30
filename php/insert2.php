<?php
require 'connect.php';

// Get the posted data.
$postdata = file_get_contents("php://input");

if(isset($postdata) && !empty($postdata))
{
  // Extract the data.
  $request = json_decode($postdata);


  // Validate.
  if(trim($request->fname) === '' || trim($request->lname) === ''|| trim($request->email) === '')
  {
    return http_response_code(400);
  }

  // Sanitize.
  $fname = mysqli_real_escape_string($conn, trim($request->fname));
  $lname = mysqli_real_escape_string($conn, trim($request->lname));
  $email = mysqli_real_escape_string($conn, trim($request->email));


  // Create.
  $sql = "INSERT INTO `students`(`id`,`fname`,`lname`) VALUES (null,'{$fname}','{$lname}','{$email}')";

  if(mysqli_query($conn,$sql))
  {
    http_response_code(201);
    $policy = [
      'fname' => $fname,
      'lname' => $lname,
      'email' => $email,
      'sId'    => mysqli_insert_id($conn)
    ];
    echo json_encode($policy);
  }
  else
  {
    http_response_code(422);
  }
}
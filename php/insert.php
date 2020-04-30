<?php  

include 'connect.php';

$data = json_decode(file_get_contents("php://input"),true);
if(count($data) > 0 ) {

    // $fullname = mysqli_real_escape_string($connect,$data['fullname']);
    
    $fname = mysqli_real_escape_string($conn, $data['fname']);
    $lname = mysqli_real_escape_string($conn, $data['lname']);
    $email = mysqli_real_escape_string($conn, $data['email']);
}
$qry = "INSERT INTO students VALUES ('$fname','$lname','$email')";




    // -- $insert = "INSERT INTO tbl_user values ('','$fullname','$email','$role','$type','$password')";

    if (mysqli_query($conn, $qry) > 0) {
    // if(mysqli_query($conn,$qry)){
      echo "Data insdsderted";
    } else {
      echo "Data not inserted" . mysqli_error($conn);
    }
  

?>
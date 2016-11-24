<?php 

include_once('database.php');


$firstname = $_POST['first_name'];
$lastname =  $_POST['last_name'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$course = $_POST['course'];


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO students (first_name, last_name, email, dob) VALUES ('$firstname', '$lastname', '$email', '$dob')";
    if ($conn->query($sql) === TRUE) {
       $result = 'success';
    } else {
        $result = $conn->error;
    }


mysqli_close($conn);

header('Location: ' . $_SERVER['HTTP_REFERER']);

exit;

?> 
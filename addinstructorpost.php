<?php 

include_once('database.php');


$firstname = $_POST['first_name'];
$lastname =  $_POST['last_name'];
$email = $_POST['email'];
$qualification = $_POST['qualification'];
$course = $_POST['course'];


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['instructorid'])){
	$studentid = $_POST['studentid'];
	$sql = "UPDATE instructors SET first_name = '$firstname',last_name = '$lastname',email='$email',qualification='$qualification' WHERE id='$studentid'";
}else if(isset($_GET['delete'])){
	$sql = "DELETE FROM instructors WHERE id = ".$_GET['delete'];
}else{	
	$sql = "INSERT INTO instructors (first_name, last_name, email, qualification) VALUES ('$firstname', '$lastname', '$email', '$qualification')";
}


    if ($conn->query($sql) === TRUE) {
       $result = 'success';
    } else {
        $result = $conn->error;
    }


mysqli_close($conn);


$url = getBaseUrl().'instructors.php';

header('Location: ' . $url);

exit;

?> 
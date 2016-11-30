<?php 

include_once('database.php');

?> 

<!DOCTYPE html>
<html>
<head>
   <title>Students</title>
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.css" rel="stylesheet">
   <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
</head>
<body>
<div class="container">
<h3>Students</h3>
<a href="newstudent.php" class="pull-right">New Student</a>
<a href="instructors.php" class="pull-right">View Instructors |</a>
<a href="courses.php" class="pull-right">View Courses |</a>
<?php 

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM students";

$result = $conn->query($sql);

if ($result->num_rows > 0) { ?>

   	  <table class = "table table-striped">
      
      
      <thead>
         <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>DoB</th>
            <th>Action</th>
         </tr>
      </thead>
      
      <tbody>
   
  <?php  while($row = $result->fetch_assoc()) {
      //  echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

  		$editurl = getBaseUrl().'editstudent.php?id='.$row['id'];
  		$editlink =  '<a href="'.$editurl.'">Edit</a>';
  		$deleteurl = getBaseUrl().'addstudentpost.php?delete='.$row['id'];
  		$deletelink =  '<a href="'.$deleteurl.'">Delete</a>';
  		 echo "<tr><td>".$row['first_name']."</td><td>".$row['last_name']."</td><td>".$row['email']."</td><td>".$row['dob']."</td><td>".$editlink." ".$deletelink."</td></tr>";
   
    }  ?>

    </tbody>
      
   </table>
 	

<?php } else {
    echo "0 results";
}
$conn->close(); 

?>
</div>

</body>
</html>
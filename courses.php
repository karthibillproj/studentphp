<?php 

include_once('database.php');

?> 

<!DOCTYPE html>
<html>
<head>
   <title>Courses</title>
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.css" rel="stylesheet">
   <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
</head>
<body>
<div class="container">
<h3>Courses</h3>
<?php 

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM courses";

$result = $conn->query($sql);

if ($result->num_rows > 0) { ?>

   	  <table class = "table table-striped">
      
      
      <thead>
         <tr>
            <th>Course name</th>
            <th>duration</th>
            <th>Action</th>
         </tr>
      </thead>
      
      <tbody>
   
  <?php  while($row = $result->fetch_assoc()) {
      //  echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

  		$editurl = getBaseUrl().'editcourse.php?id='.$row['id'];
  		$editlink =  '<a href="'.$editurl.'">Edit</a>';
  		$deleteurl = getBaseUrl().'addcoursepost.php?delete='.$row['id'];
  		$deletelink =  '<a href="'.$deleteurl.'">Delete</a>';
  		 echo "<tr><td>".$row['coursename']."</td><td>".$row['duration']."</td><td>".$editlink." ".$deletelink."</td></tr>";
   
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
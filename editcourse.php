<?php 
 
 if(isset($_GET['id']))
 {
    $id = $_GET['id'];
 }else{
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
 }

include_once('database.php');

?> 
<!DOCTYPE html>
<html>
<head>
   <title>Edit Student</title>
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.css" rel="stylesheet">
   <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"></script>
</head>
<body>

<script type="text/javascript">
	$(document).ready(function() {
    $('#addcourse').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            coursename: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Please enter coursename'
                    }
                }
            },
             duration: {
                validators: {
                     stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please enter duration'
                    }
                }
            }
         
            }
        })
});

</script>

<div class="container">

<?php 

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM courses where id = ".$id;

$result = $conn->query($sql);

if ($result->num_rows > 0) { 
    while($row = $result->fetch_assoc()) {
  ?>

 <form class="well form-horizontal" action="addcoursepost.php" method="post"  id="addcourse">
<fieldset>

<!-- Form Name -->
<legend>Add student</legend>

<!-- Text input-->

<input type="hidden"  name="courseid" value="<?php echo $row['id']; ?>">


<div class="form-group">
  <label class="col-md-4 control-label">Course</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-education"></i></span>
  <input  name="coursename" placeholder="Course" class="form-control"  type="text" value="<?php echo $row['coursename']; ?>">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Duration</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
  <input name="duration" placeholder="Duration" class="form-control"  type="text"  value="<?php echo $row['duration']; ?>">
    </div>
  </div>
</div>

<!-- Success message -->
<!-- <div class="alert alert-success" role="alert" id="success_message">Success <i class="glyphicon glyphicon-thumbs-up"></i> Thanks for contacting us, we will get back to you shortly.</div> -->

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label"></label>
  <div class="col-md-4">
    <button type="submit" class="btn btn-warning" >Submit <span class="glyphicon glyphicon-send"></span></button>
  </div>
</div>

</fieldset>
</form>

<?php }} else {
    echo "No records found";
}

$conn->close(); 

?>

</div>
 </div><!-- /.container -->

</body>
</html>
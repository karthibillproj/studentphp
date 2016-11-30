<?php 
include_once('getcourse.php'); 
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
    $('#addstudent').bootstrapValidator({
        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            first_name: {
                validators: {
                        stringLength: {
                        min: 2,
                    },
                        notEmpty: {
                        message: 'Please supply your first name'
                    }
                }
            },
             last_name: {
                validators: {
                     stringLength: {
                        min: 2,
                    },
                    notEmpty: {
                        message: 'Please supply your last name'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Please supply your email address'
                    },
                    emailAddress: {
                        message: 'Please supply a valid email address'
                    }
                }
            },

            dob: {
            validators: {
	                notEmpty: {
	                    message: 'The date of birth is required'
	                },
	                date: {
	                    format: 'DD/MM/YYYY',
	                    message: 'The date is not a valid'
	                }
	            }
	        },
           
            course: {
                validators: {
                    notEmpty: {
                        message: 'Please select your course'
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

//$sql = "SELECT * FROM students where id = ".$id;
 $sql = "SELECT students.id id, students.first_name first_name, students.last_name last_name, students.email email, students.dob dob, student_courses.course_id course_id  FROM students LEFT JOIN student_courses on students.id = student_courses.student_id where students.id = ".$id; 

$result = $conn->query($sql);

if ($result->num_rows > 0) { 
    while($row = $result->fetch_assoc()) {
  ?>

    <form class="well form-horizontal" action="addstudentpost.php" enctype="multipart/form-data" method="post"  id="addstudent">
    <a href="students.php" class="pull-right">View Students</a>
<fieldset>

<!-- Form Name -->
<legend>Edit student</legend>

<!-- Text input-->

<input type="hidden"  name="studentid" value="<?php echo $row['id']; ?>">

<div class="form-group">
  <label class="col-md-4 control-label">First Name</label>  
  <div class="col-md-4 inputGroupContainer">
  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input  name="first_name" placeholder="First Name" class="form-control"  type="text" value="<?php echo $row['first_name']; ?>">
    </div>
  </div>
</div>

<!-- Text input-->

<div class="form-group">
  <label class="col-md-4 control-label" >Last Name</label> 
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input name="last_name" placeholder="Last Name" class="form-control"  type="text" value="<?php echo $row['last_name']; ?>">
    </div>
  </div>
</div>

<!-- Text input-->
 <div class="form-group">
  <label class="col-md-4 control-label">E-Mail</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input name="email" placeholder="E-Mail Address" class="form-control"  type="text" value="<?php echo $row['email']; ?>">
    </div>
  </div>
</div>

<!-- Text input-->
 <div class="form-group">
  <label class="col-md-4 control-label">Date of birth</label>  
    <div class="col-md-4 inputGroupContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
  		<input name="dob" placeholder="DD/MM/YYYY" class="form-control"  type="text" value="<?php echo $row['dob']; ?>">
    </div>
  </div>
</div>


<!-- Select Basic -->
   
<div class="form-group"> 
  <label class="col-md-4 control-label">Course</label>
    <div class="col-md-4 selectContainer">
    <div class="input-group">
        <span class="input-group-addon"><i class="glyphicon glyphicon-list"></i></span>
    <select name="course[]" class="form-control selectpicker" multiple="multiple">
      <option value=" " >Please select your Course</option>
        <?php $courses = explode(",", $row['course_id']);
        foreach($coursedata as $key=>$value){ 
          if(in_array($key, $courses)){ ?>
            <option value="<?php echo $key; ?>" selected="selected"><?php echo $value; ?></option>
          <?php }else { ?>
          <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
      <?php  }} ?>
     <!-- <option value="1">Maths</option>
      <option value="2">Science</option>
      <option value="3">English</option> -->
    </select>
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
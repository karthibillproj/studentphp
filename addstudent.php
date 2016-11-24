<!DOCTYPE html>
<html>
<head>
   <title>Try v1.2 Bootstrap Online</title>
   <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
   <script src="/scripts/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class = "container">
<h3>Add Student</h3>
 <form class = "form-horizontal" name="addstudent" method="post" action="addstudentpost.php" role = "form">

   <div class = "form-group">
      <label class = "col-sm-2 control-label">Firstname</label>
      
      <div class = "col-sm-10">
         <input class = "form-control" id = "firstname" name="firstname" type = "text" value = "">
      </div>
   </div>

   <div class = "form-group">
      <label class = "col-sm-2 control-label">Lastname</label>
      
      <div class = "col-sm-10">
         <input class = "form-control" id = "lastname" name="lastname" type = "text" value = "">
      </div>
   </div>
   

   <div class = "form-group">
      <label class = "col-sm-2 control-label">email</label>
      
      <div class = "col-sm-10">
         <input class = "form-control" id = "email" name="email" type = "text" value = "">
      </div>
   </div>

    <div class = "form-group">
      <label class = "col-sm-2 control-label">Date of birth</label>
      
      <div class = "col-sm-10">
         <input class = "form-control" id = "dob" name="dob" type = "text" value = "">
      </div>
   </div>

    <div class = "form-group">
         <label for = "Course"  class = "col-sm-2 control-label">
            Course
         </label>
         
         <div class = "col-sm-10">
            <select id = "course" class = "form-control">
               <option value="maths">Maths</option>
               <option value="science">Science</option>
               <option value="english">English</option>
            </select>
         </div>      
   </div>
   
   <div class="col-sm-12 center-block">
    <button id="submit" name="submit" type="submit" class="btn btn-primary center-block">
        Submit
    </button>
   </div>

</form>
</div>

</body>
</html>
<?php
session_start();
 require("dbcon.php");
  echo $_SESSION['anyname'];
  $id=$_GET['rollno'];               
 $desg_query="select student.*,district.Districtname,class.class,division.division from student
 INNER JOIN district on student.districtid=district.Districtid
 INNER JOIN division on student.divisionid=division.divisionid
 INNER join class on student.classid=class.classid where studentid='$id' LIMIT 1";
 $desg_query_run=mysqli_query($con,$desg_query);
 if($desg_query_run)
 {
   foreach($desg_query_run as $row)
   {
       $name=$row['studentname'];
       $class=$row['classid'];
       $classname=$row['class'];
       $district=$row['districtid'];
       $districtname=$row['Districtname'];
       $division=$row['divisionid'];
       $divisionname=$row['division'];
   }
 }
 ?>

<html>
    <head>
</head>
<body>
<form action="code.php" method="post">
  <label for="fname">Student name:</label><br>
  <input type="hidden" name="rollno" value="<?php echo $id; ?>">
  <input type="text"  name="studentname" value="<?php echo $name;?>"><br>
  <label for="lname">Class ID</label><br>  
  <select name="classid">
  <option value="<?php echo $class;?>"><?php echo $classname; ?></option>
  <?php
                  
                  $desg_query="SELECT * FROM `class`";
                 
                  $desg_query_run=mysqli_query($con,$desg_query);
                  if($desg_query_run)
                  {
                    foreach($desg_query_run as $row)
                    {
                      ?>
                     <option value="<?php echo $row['classid'];?>"><?php echo $row['class'] ?></option>
                    <?php
                    }
                  }
                  ?>
</select><br>
  <label for="mname">District Name</label><br>
  <select name="districtid">
  <option value="<?php echo $district;?>"><?php echo $districtname; ?></option>
  <?php
                  
                  $desg_query="SELECT * FROM `district`";
                 
                  $desg_query_run=mysqli_query($con,$desg_query);
                  if($desg_query_run)
                  {
                    foreach($desg_query_run as $row)
                    {
                      ?>
                     <option value="<?php echo $row['Districtid'];?>"><?php echo $row['Districtname'] ?></option>
                    <?php
                    }
                  }
                  ?>
</select><br>
  <label for="mname">Division</label><br>
  <select name="divisionid">
  <option value="<?php echo $division;?>"><?php echo $divisionname; ?></option>
  <?php
                  
                  $desg_query="SELECT * FROM `division`";
                 
                  $desg_query_run=mysqli_query($con,$desg_query);
                  if($desg_query_run)
                  {
                    foreach($desg_query_run as $row)
                    {
                      ?>
                     <option value="<?php echo $row['divisionid'];?>"><?php echo $row['division'] ?></option>
                    <?php
                    }
                  }
                  ?>
</select><br>
  <input type="submit" name="updatestudent" value="Update Data">
</form>

</body>
    </html>
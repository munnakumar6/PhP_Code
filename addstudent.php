<?php
session_start();
 require("dbcon.php");
?>
<html>
    <head>
</head>
<body>
<?php
     include("menupage.php");
     echo $_SESSION['anyname']."<br>";
    ?>
<form action="code.php" method="post">
  <label for="fname">Student name:</label><br>
  <input type="text"  name="studentname"><br>
  <label for="lname">Class ID</label><br>  
  <select name="classid">
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
  <input type="submit" name="addstudent" value="Add Data">
</form>
<table border="2px">

  <th>Roll no</th>
  <th>Student Name</th>
  <th>Class</th>
  <th>City</th>
  <th>Division</th>
  <th>Action</th>

<?php
                  
                      $desg_query="select student.studentid,student.studentname,district.Districtname,class.class,division.division from student
                      INNER JOIN district on student.districtid=district.Districtid
                      INNER JOIN division on student.divisionid=division.divisionid
                      INNER join class on student.classid=class.classid order by studentid";
                      $desg_query_run=mysqli_query($con,$desg_query);
                      if($desg_query_run)
                      {
                        foreach($desg_query_run as $row)
                        {
                          ?>
                          <tr>

                          <td><?php echo $row['studentid'];?></td>
                          <td><?php echo $row['studentname'];?></td>
                          <td><?php echo $row['class'];?></td>
                          <td><?php echo $row['Districtname'];?></td>
                          <td><?php echo $row['division'];?></td>
                           <td>
                           <a href="showdata2.php?rollno=<?php echo $row['studentid']; ?>">edit</a>&nbsp;
                           <a href="delsearch2.php?rollno=<?php echo $row['studentid']; ?>">Delete<a>


                           </td>
                          </tr>
                        <?php
                        }
                      }
                      ?>

    
    
</table>
</body>
    </html>
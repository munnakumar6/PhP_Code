<?php
 session_start(); 
 
require("dbcon.php");
    //adding vlues from form to database

    //add city code
        if(isset($_POST['addcity']))
            {   
        
        $dname=$_POST['districtname'];
        
        
        $user_query="INSERT INTO district (Districtname) VALUES ('$dname')";
        $user_query_run=mysqli_query($con,$user_query);

        if($user_query_run)
        {
            header("Location: addcity.php");           
        }
        else
        {   
            echo "Record addition failed";
        }
        }
    //  add student code
        if(isset($_POST['addstudent']))
        {   
    
                $studentname=$_POST['studentname'];
                $classid=$_POST['classid'];
                $divisionid=$_POST['divisionid'];
                $districtid=$_POST['districtid'];
                $user_query="INSERT INTO `student`(`studentname`, `classid`, `districtid`, `divisionid`) VALUES('$studentname','$classid','$districtid','$divisionid')";
                $user_query_run=mysqli_query($con,$user_query);

                if($user_query_run)
                {
                    header("Location: addstudent.php");           
                }
                else
                {   
                    echo "Record addition failed";
                }
    }
//update student code
if(isset($_POST['updatestudent']))
        {   
               $id=$_POST['rollno'];
                $studentname=$_POST['studentname'];
                $classid=$_POST['classid'];
                $divisionid=$_POST['divisionid'];
                $districtid=$_POST['districtid'];
                $user_query="UPDATE `student` SET `studentname`='$studentname',`classid`='$classid',`districtid`='$districtid',`divisionid`='$divisionid' WHERE `studentid`='$id'";
                $user_query_run=mysqli_query($con,$user_query);

                if($user_query_run)
                {
                    header("Location: addstudent.php");           
                }
                else
                {   
                    echo "Record addition failed";
                }
    }
    // Delete student code
    if(isset($_POST['deldata']))
        {   
               $id=$_POST['rollno'];
               
                $user_query="delete from student WHERE `studentid`='$id'";
                $user_query_run=mysqli_query($con,$user_query);

                if($user_query_run)
                {
                    header("Location: addstudent.php");           
                }
                else
                {   
                    echo "Record addition failed";
                }
    }

//add user
if(isset($_POST['adduser']))
        {   
    
                $name=$_POST['name'];
                $username=$_POST['username'];
                $password=$_POST['password'];
                
                $user_query="INSERT INTO `registration`(`name`,`username`,`password`) VALUES('$name','$username','$password')";
                $user_query_run=mysqli_query($con,$user_query);

                if($user_query_run)
                {
                    header("Location: registration.php");           
                }
                else
                {   
                    echo $con->error;
                }
    }
    //login code
if(isset($_POST['login']))
 {
 
 
  $username=$_POST['username'];               
  $password=$_POST['password'];
 $desg_query="select * from registration where username='$username' LIMIT 1";
 $desg_query_run=mysqli_query($con,$desg_query);
 if($desg_query_run)
 {
    foreach($desg_query_run as $row)
    {
        $uname=$row['username'];
        $upass=$row['password']; 
        $name=$row['name'];      
    }
    if($uname===$username and $upass===$password)
    {
        $_SESSION['anyname']=$name;
        header("location: welcome.php");
    }
    else
    {
        header("location: index.php");
    }
 }
 else
 {
  echo "No such records";
 }
}
?>

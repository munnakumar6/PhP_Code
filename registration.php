<?php
session_start();
 require("dbcon.php");
?>
<?php
     include("menupage.php");
     echo $_SESSION['anyname']."<br>";
    ?>
<html>
    <head>
</head>
<body>
  <?php $_SESSION['anyname']="Anjali-Munna-Amar";
         echo $_SESSION['anyname'];?>
<form action="code.php" method="post">
  <label for="fname">Name of the Employer:</label><br>
  <input type="text"  name="name"><br>
  <label for="fname">Emailid</label><br>
  <input type="text"  name="username"><br>
  <label for="fname">Password:</label><br>
  <input type="password"  name="password"><br>
  
  <input type="submit" name="adduser" value="Add User">
</form>
<table border="2px">

  <th>ID</th>
  <th>Name</th>
  <th>Username</th>
  <th>Password</th>
  

<?php
                  
                      $desg_query="select * from registration";
                      $desg_query_run=mysqli_query($con,$desg_query);
                      if($desg_query_run)
                      {
                        foreach($desg_query_run as $row)
                        {
                          ?>
                          <tr>

                          <td><?php echo $row['id'];?></td>
                          <td><?php echo $row['name'];?></td>
                          
                          <td><?php echo $row['username'];?></td>
                          <td><?php echo $row['password'];?></td>
                           
                          </tr>
                        <?php
                        }
                      }
                      else
                      {
                        echo "No records found";
                      }
                      ?>

    
    
</table>
</body>
    </html>
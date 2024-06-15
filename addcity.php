<?php
session_start();
?>
<html>

    <head>
</head>
<body>
<?php
     include("menupage.php");
    // echo $_SESSION['anyname']."<br>";
    ?>
<form action="code.php" method="post">
  <label for="fname">District name:</label><br>
  <input type="text"  name="districtname"><br>
  <input type="submit" name="addcity" value="Add Data">  
</form>
<table border="2px">

  <th>District ID</th>
  <th>Distrcit Name</th>
  

<?php
                   require("dbcon.php");
                      $desg_query="SELECT * FROM `district`";
                      $desg_query_run=mysqli_query($con,$desg_query);
                      if($desg_query_run)
                      {
                        foreach($desg_query_run as $row)
                        {
                          ?>
                          <tr>

                          <td><?php echo $row['Districtid'];?></td>
                          <td><?php echo $row['Districtname'];?></td>
                          

                          </tr>
                        <?php
                        }
                      }
                      ?>

    
    
</table>
</body>
    </html>
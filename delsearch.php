<?php session_start(); 
?>
<?php
     include("menupage.php");
     echo $_SESSION['anyname']."<br>";
    ?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="code.php" method="post">
    Enter your Roll no to Delete :
    <input type="text" name="rollno"><br>
    <input type="submit" name="deldata" value="Delete">
</form>

</body>
</html>
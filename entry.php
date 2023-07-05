<?php include("include/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Entry</title>
</head>
<body>
    <?php
        if(isset($_POST['submit'])){
            $sql = "insert into user (name, address, city) values ('".$_POST['name']."', '".$_POST['address']."', '".$_POST['city']."')";
            $result=mysqli_query($conn,$sql);
            if($result) {
                echo "Record inserted...";
                header("location:user_list.php");
            }
        }
    ?>
    <form action="entry.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name = "name"><br>
        <label for="address">Address:</label>
        <input type="text" name = "address"><br>
        <label for="city">City:</label>
        <input type="text" name = "city"><br>
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>
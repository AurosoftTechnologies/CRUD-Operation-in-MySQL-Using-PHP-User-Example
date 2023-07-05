<?php include("include/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Edit</title>
</head>
<body>
    <?php
        if(isset($_POST['submit'])){
           $sql = "update user set name = '".$_POST['name']."', address='".$_POST['address']."', city = '".$_POST['city']."' where id = '".$_POST['id']."' ";
           $result = mysqli_query($conn,$sql);
           if($result){
            echo "Record Updated...";
            header("location:user_list.php");
           }
        }
$id ="";
$name="";
$address ="";
$city="";

if(isset($_GET['action'])){
    $action = $_GET['action'];
    $id = $_GET['id'];
if($action == 'update'){
    $result = mysqli_query($conn,"select * from user where id = ".$id);
    $row = mysqli_fetch_assoc($result);
     if(isset($row)){
        $id = $row['id'];
        $name = $row['name'];
        $address = $row['address'];
        $city = $row['city'];
    }
}
}
    ?>
    <form action="edit.php" method="post">
        <input type="hidden" name="id" value = "<?php echo $id; ?>">
        <label for="name">Name:</label>
        <input type="text" name = "name" value ="<?php echo $name; ?>"><br>
        <label for="address">Address:</label>
        <input type="text" name = "address" value = "<?php echo $address; ?>"><br>
        <label for="city">City:</label>
        <input type="text" name = "city" value = "<?php echo "city"; ?>"><br>
        <input type="submit" value="Submit" name="submit">
    </form>
</body>
</html>
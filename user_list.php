<?php include("include/config.php"); ?>

<?php
if(isset($_GET['action']))
{
    $action = $_GET['action'];
    $id = $_GET['id'];
    if($action=='delete') {
        $result = mysqli_query($conn, "delete from user where id = ".$id);
        if($result) {
            echo "Record Deleted...";
            header("location:user_list.php");
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
</head>
<body>
    <h1>User List</h1>
    <table border = "1">
        <a href="entry.php"><button align = "center">Add New User</button></a>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Address</th>
            <th>City</th>
            <th>Action</th>
        </tr>
        <?php
            $sql = "select *from user";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['address']; ?></td>
            <td><?php echo $row['city']; ?></td>
            <td style="width:150px;">
                <a href="edit.php?action=update&id=<?php echo $row['id']; ?>"><button>Update</button></a>
                <a href="user_list.php?action=delete&id=<?php echo $row['id']; ?>"><button>Delete</button></a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
<?php
session_start();

require_once './db_connection.php';

$query = "SELECT * FROM imageInfo ORDER BY time DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../StyleSheet/table.css">
    <title>Image Panel</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['user_auth']['username']; ?></h1>
    <form action="login.php" method="POST">
        <button type="submit" name="logout" class="logout">Log Out</button>
    </form>

    <form action="imgUpload.php" method="POST">
        <button type="submit" name="upload" class="upload">Upload New Image</button>
    </form>

    <table>
        <tr>
            <th>Sl No.</th>
            <th>Image Description</th>
            <th>Uploaded At</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['time']; ?></td>
                <td>
                <a href="imgUpload.php">Update</a> || <a href="delete_image.php?id=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    
</body>
</html>

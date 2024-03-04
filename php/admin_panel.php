<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

require_once './db_connection.php';

$query = "SELECT * FROM mailtable";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../StyleSheet/table.css">
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Mail</th>
            <th>Text</th>
            <th>Time</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['mail']; ?></td>
                <td><?php echo $row['text']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td>
                    <a href="edit_item.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <a href="delete_item.php?id=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    <a href="logout.php">Logout</a>
</body>
</html>

<?php
session_start();
if (!isset($_SESSION['user_auth'])) {
    header('Location: login.php');
    exit();
}

require_once './db_connection.php';

$query = "SELECT * FROM mailtable ORDER BY date DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../StyleSheet/table.css">
    <title>Admin Panel</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['user_auth']['username']; ?></h1>
    <form action="login.php" method="POST">
        <button type="submit" name="logout">Log Out</button>
    </form>
    <table>
        <tr>
            <th>Name</th>
            <th>Mail</th>
            <th>Text</th>
            <th>Time</th>
            <th>Action</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['mail']; ?></td>
                <td><?php echo $row['text']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td>
                    <a href="delete_item.php?id=<?php echo $row['id']; ?>">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
    
</body>
</html>

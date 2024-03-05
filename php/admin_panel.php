<?php
session_start();
if (!isset($_SESSION['user_auth'])) {
    header('Location: login.php');
    exit();
}

require_once './db_connection.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../StyleSheet/admin.css">
    <title>Admin Panel</title>
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['user_auth']['username']; ?></h1>
    <form action="logout.php" method="POST">
        <button type="submit" name="logout" class="logout">Log Out</button>
    </form>
    <div class="button-section">
        <form action="mailTable.php" method="POST">
            <button type="submit" name="mail" class="mail">View Mails</button>
        </form>
        <form action="imgTable.php" method="POST">
            <button type="submit" name="image" class="img">View Images</button>
        </form>
    </div>
    
</body>
</html>

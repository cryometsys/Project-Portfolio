<?php
    session_start();
    require_once './db_connection.php';

    if (isset($_POST["signup"])) {
        header("location:reg.php");
        exit();
    }

    elseif(isset($_SESSION["user_auth"])) {
        header("location:admin_panel.php");
        exit();
    }

    elseif(isset($_POST["submit"])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username == null || $password == null) echo '<script>alert("Enter valid data!")</script>';

        else {
            $new_user = array('username'=> $username,'password'=> $password);
            $user_exist = false;

            $query = "SELECT * from users where username = '$username' ";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);

            if(mysqli_num_rows($result) == 0) echo '<script>alert("User is not registered!")</script>';

            elseif($username == $row['username'] && $password == $row['password']) {
                
                $user_exist = true;
                $_SESSION['user_auth'] = $new_user;
                echo '<script>alert("Successfully logged in!")</script>';
                echo "<script>window.location='admin-panel.php';</script>";
            }
        }
        mysqli_close($connection);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../StyleSheet/reg.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h2>User Login System</h2>

        <form action="login.php" method="POST">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="submit" value="Submit">
            <a href="reg.php" name="signup">Register User</a>
        </form>
    </div>
</body>
</html>
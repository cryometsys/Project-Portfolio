<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registration</title>
        <link rel="stylesheet" href="../StyleSheet/reg.css">
    </head> 
    <body>    
    <?php
    if (isset($_POST['submit'])) {
        require_once './db_connection.php';
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        if($username == null || $email == null || $password == null) 
            echo '<script>alert("Please enter all the fields!")</script>';
        else {
            
            $query = mysqli_query($conn, "select * from users where username = '$username'");
            if(mysqli_num_rows($query) > 0) echo '<script>alert("The username already exists!")</script>';
            elseif(strlen($password) <= 7) echo '<script>alert("Password must be 8 characters long or more!")</script>';
            else {
                $insert_query = "INSERT INTO users (username, email, password) ";
                $insert_query .= "VALUES ('$username', '$email', '$password')";
                $insert =  mysqli_query($conn, $insert_query);
                if(!$insert) die("Not inserted". mysqli_error($conn));
                else echo'<script>alert("Data successfully inserted!")</script>';
                echo "<script>window.location='login.php';</script>";
            }
        }
        mysqli_close($connection);
    }
    ?>
    <div class="container">
        <h2>User Registration Form</h2>
        <form action="reg.php" method="POST">
            <input type="text" name="username" placeholder="Username">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>

</html>
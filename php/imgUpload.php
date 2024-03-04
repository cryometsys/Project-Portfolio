<?php
    session_start();
    require_once './db_connection.php';

    if(isset($_POST["submit"])) {
        $name = $_POST["name"];
        if($_FILES["myImg"]["error"] === 4) {
            echo "<script>alert('Image does not exist!');</script>";
        } else {
            $fileName = $_FILES["myImg"]["name"];
            $fileSize = $_FILES["myImg"]["size"];
            $tmpName = $_FILES["myImg"]["tmp_name"];
            $validImgExt = ['jpg', 'jpeg'];
            $imgExt = explode('.', $fileName);
            $imgExt = strtolower(end($imgExt));
            if(!in_array($imgExt, $validImgExt)) {
                echo "<script>alert('Invalid Image Extension!');</script>";
            } else if($fileSize > 50000000) {
                echo "<script>alert('Image Size Is Too Large!');</script>";
            } else {
                $newImgName = uniqid();
                $newImgName .= '.' . $imgExt;

                move_uploaded_file($tmpName, 'img/' . $newImgName);
                $query = "INSERT INTO imageInfo(name, image) VALUES('$name', '$newImgName')";
                mysqli_query($conn, $query);
                echo "<script>alert('Image Successfully Added!');
                    document.location.href = 'imgTable.php';</script>";
            }
        }
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload</title>
</head>
<body>
    <form action="imgUpload.php" method="POST" enctype="multipart/form-data">
        <label for="name">Description: </label>
        <input type="text" name="name" id="name" required value=""> <br>
        <input type="file" name="myImg" id="myImg" accept=".jpg, .jpeg"> <br> <br>
        <input type="submit" value="Upload" name="submit">
    </form>
</body>
</html>
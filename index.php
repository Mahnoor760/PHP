<?php
$localhost="localhost";
$username="root";
$password="";
$db="fileupload";

$con = mysqli_connect($localhost, $username, $password, $db);

if (!$con) {
    die("connection failed" . mysqli_connect_error());
}

$upload = false; 

if (isset($_FILES["files"])) {
    //   echo "<pre>";
    //   print_r($_FILES["files"]);

    if (($_FILES["files"]["type"] == "image/pdf") && ($_FILES['files']['size'] > 0) && ($_FILES['files']['size'] < 5000000)) {

        $name = $_FILES["files"]["name"];
        $tmpName = $_FILES["files"]["tmp_name"];
        $type = $_FILES["files"]["type"];
        $size = $_FILES["files"]["size"];
        $path = $_FILES["files"]["full_path"];

        $upload = move_uploaded_file($tmpName, "images/" . $name);
    }

    if ($upload) {
        $sqlinsert = "INSERT INTO info(`name`, `tmpName`, `type`, `size`, `path`) VALUES ('$name', '$tmpName', '$type', '$size', '$path')";
        $res = mysqli_query($con, $sqlinsert);
        if ($res) {
            echo "File uploaded successfully!";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
</head>

<body>

<form action="index.php" method="post" enctype="multipart/form-data">
<h1>Upload Your File</h1>
    <label for="uf">File Uploading</label>
    <input type="file" name="files" id="uf">
    
    <input type="submit" value="submit">

</form>


</body>

</html>

<?php


if (isset($_POST["bookslug"])) {


    $bookslug = $_POST["bookslug"];

    $response = file_get_contents("https://hadithapi.com/api/' . $bookslug . '/chapters?apiKey=$2y$10$BylaBcXs5Lw7ZOtYmQ3PXO1x15zpp26oc1FeGktdmF6YeYoRd88e");
    $response = json_decode($response, true);

    // print_r($response);
    $dataquranindex = $response ["books"] ;
}




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri+Quran&family=Aref+Ruqaa&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu:wght@400..700&display=swap" rel="stylesheet">

    
    <style>
        body {
            direction: rtl;
            font-family: 'Amiri Quran', serif;
            background-color:#f9f9f9;
            font-size:20px;
            text-align:center;
           
           
        }


    </style>
</head>

<body>



    <?php
 

        foreach ($dataquranindex as $item) { 
            echo '<p>' . $item["text"] . '</p>';
            echo '<audio controls src="'.$value["audio"].'"></audio>';
    
}
 
    ?>
</body>

 
</html>
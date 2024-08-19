<?php
$response= file_get_contents('https://hadithapi.com/api/books?apiKey=$2y$10$BylaBcXs5Lw7ZOtYmQ3PXO1x15zpp26oc1FeGktdmF6YeYoRd88e');
$response= json_decode($response, true);

// print_r($response);

$dataquranindex= $response ["books"] ;


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bootstrap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri+Quran&family=Aref+Ruqaa&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Nastaliq+Urdu:wght@400..700&display=swap" rel="stylesheet">
    <style>
       body {
            direction: rtl;
            font-family: 'Amiri Quran', serif;
            background-color: black;
            
           
        }
        h2{
            color:white;
        }
        </style>

</head>
<body>
    <h2><center>Hadith Books</center></h2>
<div class="container" style="background-color: black; ">


<table  class="table table-striped table-bordered"  style="font-size:20px;">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">bookName</th>
            <th scope="col">writerName</th>
            <th scope="col">writerDeath</th>  
            <th scope="col">hadiths_count</th>
            <th scope="col">chapters_count</th>
            <th scope="col">bookSlug</th>
         
        </tr>
    </thead>
    <tbody>
     
  
    <?php

foreach ($dataquranindex as $key => $item) {
    echo '<tr>
<th scope="row">' . $item["id"] . '</th>
<td>' . $item["bookName"] . '</td>
<td>' . $item["writerName"] . '</td>
<td>' . $item["writerDeath"] . '</td>
<td>' .  $item["hadiths_count"] . '</td>
<td>' . $item["chapters_count"] . '</td>

<td>

   <form action="books.php" method="post"  >



<input type="hidden" name="id" value="' . $item["id"] . '">
<input class="btn btn-warning" type="submit" value="Book Slug">
</form>



</td>

</tr>';
}


?>
</tbody>
</table>

</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
</div>
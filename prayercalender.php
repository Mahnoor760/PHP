<?php

function getPrayerTimes($month) {
    $latitude = 24.906232697185235;
    $longitude = 67.08000914379674;
    $method = 1; // Muslim World League

    $url = "https://api.aladhan.com/v1/calendar/2024/{$month}?latitude={$latitude}&longitude={$longitude}&method={$method}";
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    return $data['data'];
}

function displayPrayerTimes() {

    echo "
    <style>
        body {
            font-family: PT Serif;
            background-color: #f5f5f5; /* Light grey background */
            color: #646e7d; /* Dark grey text */
        }
        h1, h2 {
            text-align:center;
              background-color: rgb(210, 210, 210);
            color: #000; /* Black headers */

        }
        table {
        lign-item:center;
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 1px solid #ccc; /* Light grey border */
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #ddd; /* Light grey background for header cells */
        }
        tr:nth-child(even) {
            background-color: #f9f9f9; /* Slightly lighter grey for even rows */
        }
    </style>
    ";




    echo "<h1>Prayer Times Calendar for 2024</h1>";
    
    for ($month = 1; $month <= 12; $month++) {
        $prayerTimes = getPrayerTimes($month);
        
        echo "<h2>Month: " . date('F', mktime(0, 0, 0, $month, 10)) . "</h2>";
        echo "<table border='1'>";
        echo "<tr><th>Date</th><th>Fajr</th><th>Dhuhr</th><th>Asr</th><th>Maghrib</th><th>Isha</th></tr>";

        foreach ($prayerTimes as $day) {
            echo "<tr>";
            echo "<td>" . $day['date']['gregorian']['date'] . "</td>";
            echo "<td>" . $day['timings']['Fajr'] . "</td>";
            echo "<td>" . $day['timings']['Dhuhr'] . "</td>";
            echo "<td>" . $day['timings']['Asr'] . "</td>";
            echo "<td>" . $day['timings']['Maghrib'] . "</td>";
            echo "<td>" . $day['timings']['Isha'] . "</td>";
            echo "</tr>";
        }

        echo "</table><br>";
    }
}

displayPrayerTimes();



function getReciters() {
    $url = "https://api.alquran.cloud/v1/edition?format=audio";
    $response = file_get_contents($url);
    $data = json_decode($response, true);

    return $data['data'];
}

function displayReciters() {
    $reciters = getReciters();

    echo "
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5; /* Light grey background */
            color: #333; /* Dark grey text */
        }
        h1 {
              text-align:center;
              background-color: rgb(210, 210, 210);
              color: #000; /* Black headers */
        }
        form {
            margin-bottom: 20px;
        }
        select {
            padding: 5px;
        }
        input[type='submit'] {
            background-color: #333; /* Black background */
            color: #fff; /* White text */
            border: none;
            padding: 6px;
            cursor: pointer;
            
        }
        input[type='submit']:hover {
            background-color: #555; /* Darker grey on hover */
        }
    </style>
    ";
    echo "<h1>Select a Reciter</h1>";
    echo "<form method='GET'>";
    echo "<select name='reciter'>";

    foreach ($reciters as $reciter) {
        echo "<option value='" . $reciter['identifier'] . "'>" . $reciter['englishName'] . "</option>";
    }

    echo "</select>";
    echo "<input type='submit' value='Listen'>";
    echo "</form>";
}

function displayQuranRecitation($reciter) {
    $url = "https://api.alquran.cloud/v1/quran/{$reciter}";
    $response = file_get_contents($url);
    $data = json_decode($response, true);


    echo "
    <style>
        body {
            font-family: PT Serif;
            background-color: #f5f5f5; /* Light grey background */
            color: #333; /* Dark grey text */
        }
        h1 {
            color: #000; /* Black headers */
        }
        h2 {
            color: #444; /* Slightly lighter grey for subheaders */
        }
        p {
            margin: 10px 0;
            padding: 5px;
            background-color: #fff; /* White background for text */
            border: 1px solid #ccc; /* Light grey border */
            border-radius: 5px;
        }
    </style>
    ";

    echo "<h1>Quran Recitation by " . $data['data']['edition']['englishName'] . "</h1>";
    
    foreach ($data['data']['surahs'] as $surah) {
        echo "<h2>Surah " . $surah['englishName'] . " (" . $surah['name'] . ")</h2>";
        foreach ($surah['ayahs'] as $ayah) {
            echo "<p>" . $ayah['text'] . "</p>";
        }
    }
}

if (isset($_GET['reciter'])) {
    displayQuranRecitation($_GET['reciter']);
} else {
    displayReciters();
}





























































echo "
<style>
    .footer {
        margin-top: 20px;
        padding: 10px;
        background-color: #333; /* Black background */
        color: #fff; /* White text */
        text-align: center;
        font-family: 'Arial', sans-serif;
       
    }
        
</style>
<div class='footer'>
    <p>&copy; 2024 Your Company. All rights reserved By Mahnoor Tabassum
    This content is totally Based in Islamic content.Hope so you get benefit from this site May 
    Allah Bless you with Everlasting Happiness in entire world AMEEN!
    Jazakallah.Regards Mahnoor Tabassum! </p>
</div>
";

?>
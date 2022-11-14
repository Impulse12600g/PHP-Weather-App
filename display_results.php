
<?php
$city = $_POST['city'];
$error_message = '';

if ($city == null ) {
    $error_message .= 'Please enter valid city name <br>';
}

if ($error_message != '') {
    include ('index.php');
    exit;
}

//Replace xxxx with your own key in the following url

$location1 = 'https://api.openweathermap.org/data/2.5/weather?q=';
$location2 = ',&units=imperial&appid=xxxxxxxxxxxx';
$location = $location1 . $city . $location2;
$news_contents = file_get_contents ($location);
$json = json_decode ($news_contents, true);
echo '<p>Conditions in '. $city. '</p>';



//Display current weather
echo '<p>Current Temperature: ' . $json['main']['temp'] .' F'. '</p>';
echo '<p>Feels like: ' . $json['main']['feels_like'] .' F'. '</p>';
echo '<p>Humidity: ' . $json['main']['humidity'].'% g.m^3'.  '</p>';
echo '<p>Wind Speed: ' . $json['wind']['speed'] .' MPH'. '</p>';
echo '<p>Wind Direction: ' . $json['wind']['deg'] .' degrees from North'. '</p>';
echo '<p>Condition: ' . $json['weather'][0]['description'] . '</p>';

//Extract image
$imagecode =  $json['weather'][0]['icon'];
$image_url = 'http://openweathermap.org/img/wn/' . $imagecode . '.png';
//echo $image_url; TEST
$image = file_get_contents($image_url);

//Save it on local drive
file_put_contents ('images/image.png', $image);
//Display image
//echo '<img style="border:5px solid black;" src="images/image.png" width="300" height="300" />';
//SHIFT RELOAD
?>

<!DOCTYPE html>
<html>
<head>
    <title>Weather App</title>
    <link rel="stylesheet" href="main.css"/>
</head>
<body>
<main>
    <img style="border:5px solid black;" src="images/image.png" width="300" height="300" />

</main>
</body>


</html>
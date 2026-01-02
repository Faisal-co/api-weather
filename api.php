<?php

// complete Url of api Request: 'http://api.weatherapi.com/v1/current.json?key=YOUR_API_KEY&q=bulk' 
// %s is used for values, and before the question mark %s is domain endpoint.
// ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="text-align: center; text-color: #fff; background-color: #0a3253ff; margin-top: 10%;">
    <h1 style="color: #fff;">Climate Now</h1>
    <form action="" method="POST">
    <label for="">
        <input type="text" placeholder="Enter City" name="search">
    </label>
    <button typpe="submit" style="cursor: pointer;">Search</button>
</form>  
<?php
if(isset($_POST['search'])){
    $weather_api_key = '88349e3932504c829de174212260101';
$end_point = 'http://api.weatherapi.com/v1/current.json';
$url = sprintf('%s?key=%s&q=%s',$end_point, $weather_api_key, $_POST['search']);
$data = file_get_contents($url);
$data = json_decode($data, true);
$data = $data['current'];
    echo '<h3 style="color: #fff;">'.$_POST['search']. ' Current Temperature is : ' . $data['temp_c']. ' °C'.'</h3>';
    echo "<h1 style='color: #ee7e15ff;'>Other Climate Details of " .$_POST['search']. " :</h1>";
     echo '<h3 style="color: #fff;">'. ' Current Wind speed is : ' . $data['wind_kph']. ' KPH'.'</h3>';
    echo '<h3 style="color: #fff;">'. ' Current Wind direction is : ' . $data['wind_degree']. ' ° angle'.'</h3>';
    echo '<h3 style="color: #fff;">'. ' Current Humidity is : ' . $data['humidity']. ' RH'.'</h3>';
    echo '<h3 style="color: #fff;">'. 'Cloudy : ' . $data['cloud']. '%'.'</h3>';
// To fetch array in loop if same key having different values is not equally in numbers of total repetion of loop then same key,values will be repeatedly shown in result.
// OR only One array to fetch or more than one array to fetch having same key but different values.
 /*foreach ($data as $current) {
    echo $data['temp_c'];
 } */
}
?>
</body>
</html>



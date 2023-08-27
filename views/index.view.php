<?php require 'inc/weather.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <title>Weather Information</title>
    <link rel="stylesheet" href="style/weather.css">

    <style>


    </style>
</head>

<body>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function getWeather() {
                var country = document.getElementById('country').value;
              
                var xhr = new XMLHttpRequest();

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        var temperature = response.main.temp;
                        var humidity = response.main.humidity;
                        var windSpeed = response.wind.speed;

                        document.getElementById('temperature').innerHTML = "Temperature: " + temperature + 'C';
                        document.getElementById('windSpeed').innerHTML = "Wind Speed: " + windSpeed + 'm/s';
                        document.getElementById('humidity').innerHTML = "Humidity: " + humidity + '%';
                        document.getElementById('p').innerHTML = "The current weather in " + country + ":";

                    }
                };

                xhr.open('GET', 'https://api.openweathermap.org/data/2.5/weather?q=' + encodeURIComponent(country) + '&appid=94a9083b814a961ebc33aab899ac9f1b', true); // Specify the request method, URL, and asynchronous flag
                xhr.send();
            }

            document.querySelector('form').addEventListener('submit', function (event) {
                event.preventDefault();
                getWeather();
            });
        });
    </script>
    <script src="jas/weather.js"></script>

    <div class="main-container">
        <form>
            <h2>Weather Information</h2>
            <label for="country">Select a country:</label>
            <select name="country" id="country">
                <?php foreach ($countries as $country): ?>
                    <option id="country" value="<?php echo $country['name']['common']; ?>"><?php echo $country['name']['common']; ?></option>
                <?php endforeach; ?>
            </select>
            <br><br>
            <input type="submit" value="Get Weather">
        </form>

        <div id="weather-container">
            <p id="p"></p>
            
            <span id="temperature"></span>

            <span id="windSpeed"></span>

            <span id="humidity"></span>
        </div>
    </div>
</body>

</html>
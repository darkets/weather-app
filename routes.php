<?php

const API_KEY = '04636b245be698e20d32a0fad56f9a9c';

function getLatLon(string $location): array
{
    $url = "https://api.openweathermap.org/geo/1.0/direct?q=$location&appid=" . API_KEY;
    $json = file_get_contents($url);

    $data = json_decode($json, true);

    $latlon = [];
    if ($data) {
        $latlon[] = $data[0]['lat'];
        $latlon[] = $data[0]['lon'];
    }

    return $latlon;
}

function getWeatherData(float $lat, float $lon): array
{
    $url = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&units=metric&appid=" . API_KEY;
    $json = file_get_contents($url);

    return json_decode($json, true);
}

if (!isset($_GET['submit']) || empty(getLatLon($_GET['city']))) {
    header("Location: index.view.php");
    die;
};

$geoLocation = getLatLon($_GET['city']);

if (!$geoLocation) {
    header("Location: index.view.php");
    die;
};

$weatherData = getWeatherData($geoLocation[0], $geoLocation[1]);

$queryString = http_build_query($weatherData);

header("Location: index.view.php?$queryString");
die;

<?php
$res = file_get_contents('https://restcountries.com/v3.1/all');

if ($res) {
    $countries = json_decode($res, true);
}

$countryy = "";

?>

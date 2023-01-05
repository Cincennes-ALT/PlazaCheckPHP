<?php
//az api dokumentációja innen származik: https://documenter.getpostman.com/view/10814064/TzRVf6Gi

//osztályok meghívása
require_once "classes.php";


// szám címe 
$szamCime = curl_init();
curl_setopt_array($szamCime, array(
    CURLOPT_URL => 'https://api.plaza.one/status/track',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
));

//eredmény
$szamEredmeny = curl_exec($szamCime);
curl_close($szamCime);

//véletlenszerű háttér
$hatterVeletlen = curl_init();

curl_setopt_array($hatterVeletlen, array(
  CURLOPT_URL => 'https://api.plaza.one/backgrounds/random',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$hatterVeletlenEredmeny = curl_exec($hatterVeletlen);

curl_close($hatterVeletlen);

?>
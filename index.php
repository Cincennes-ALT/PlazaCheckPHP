<?php
//az api dokumentációja innen származik: https://documenter.getpostman.com/view/10814064/TzRVf6Gi

//osztályok meghívása
require_once "classes.php";

//fontos váltzók deklarálása

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

//szótár tömbé konvertálás
$hatterVeletlenEredmeny = json_decode( curl_exec($hatterVeletlen),true);
curl_close($hatterVeletlen);

//dal információk
$dalNev = curl_init();

curl_setopt_array($dalNev, array(
  CURLOPT_URL => 'https://api.plaza.one/status/track',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$delInfoEredmeny = curl_exec($dalNev);
curl_close($dalNev);

//előző számok
$elozmenyek = curl_init();

curl_setopt_array($elozmenyek, array(
  CURLOPT_URL => 'https://api.plaza.one/history/1',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$elozmenyekEredmeny = curl_exec($elozmenyek);
curl_close($elozmenyek);

//dal meta
$dalMeta = curl_init();

curl_setopt_array($dalMeta, array(
  CURLOPT_URL => 'https://api.plaza.one/songs/10Lh84vdoZueem',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

//szótár tömb
$dalMetaEredmeny = json_decode( curl_exec($dalMeta));
curl_close($dalMeta);

//~~~

//Oldal felépítése
//háttér telfolgozása
var_dump($hatterVeletlenEredmeny);
$hatterOsztaly = new Hatter($hatterVeletlenEredmeny["id"], $hatterVeletlenEredmeny["filename"], $hatterVeletlenEredmeny["author"], $hatterVeletlenEredmeny["author_link"], $hatterVeletlenEredmeny["source"], $hatterVeletlenEredmeny["source_link"], $hatterVeletlenEredmeny["is_updated"], $hatterVeletlenEredmeny["num"], $hatterVeletlenEredmeny["src"], $hatterVeletlenEredmeny["video_src"]);

//háttér megjelenítve
echo "<img src='".$hatterOsztaly->hatterGif()."' alt = 'Az oldal háttere'>";

//dal feldolgozása
var_dump($dalMetaEredmeny);

?>
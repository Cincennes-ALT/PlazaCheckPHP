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
//levágja a felesleget
$feldolgoz = substr($elozmenyekEredmeny, 9,-81);
$elozmenyekEredmeny = json_decode($feldolgoz);
curl_close($elozmenyek);
/*
 * JSON konvertálás után is "stdClass" lesz belőle így egy különleges módszert kell majd használni hogy hozzáférhető legyen az adat
 * foreach ($elozmenyekEredmeny as $key => $value) {
    echo "<b>".$key."</b> <i>". gettype($value)." <b>".$value->artist."</b></i>";
 * }
 * A $value->artist -evvel lehet az adott objektum elemére hivatkozni.
 * Elemek amik az ojektben vannak: played_at, id, artist, itle. Példával:
 * {
    "played_at": 1673133163,
    "id": "0w1HaVkWPNTgOE",
    "artist": "Polygon Dream",
    "title": "7 t h E l e m e n t"
  }
 */

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

//mostani szám ami megy jelenleg
$szamMost = curl_init();
curl_setopt_array($szamMost, array(
  CURLOPT_URL => 'https://api.plaza.one/status',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$szamMostEredmeny = curl_exec($szamMost);
$szamMostEredmeny = json_decode($szamMostEredmeny);
/*
 * Használat:
 * mivel úgytűnik hogy ez egy object egy objectben ezért gy kell majd használni a későbbiekben:
 * echo $szamMostEredmeny->song->title;
 * Ez a tömb tartalmazza a song, lisaners és az updated_at.$szamMostEredmeny->song->title;
 * song használatánál tovább kell majd hivatkozni
 * $(akkori változó név)->song->title;
 * Amiket a song vissza ad: id, artist, title, album, position, lenght, arwork_src, artworkt_sm_src, rections
 */
curl_close($szamMost);

//~~~

//Oldal felépítése
//háttér telfolgozása
$hatterOsztaly = new Hatter($hatterVeletlenEredmeny["id"], $hatterVeletlenEredmeny["filename"], $hatterVeletlenEredmeny["author"], $hatterVeletlenEredmeny["author_link"], $hatterVeletlenEredmeny["source"], $hatterVeletlenEredmeny["source_link"], $hatterVeletlenEredmeny["is_updated"], $hatterVeletlenEredmeny["num"], $hatterVeletlenEredmeny["src"], $hatterVeletlenEredmeny["video_src"]);

//háttér megjelenítve
//echo "<img src='".$hatterOsztaly->hatterGif()."' alt = 'Az oldal háttere'>";



?>
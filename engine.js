/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

//oldal JavaScriptje

//nyers adat lekérése
indul();
function indul() {
    var kapcs = new XMLHttpRequest();
    let url = "index.php?load=now";
    kapcs.open("GET", url, true);
    kapcs.onreadystatechange = function () {
        if (kapcs.readyState === 4 && kapcs.status === 200) {
            var kapott = kapcs.responseText;
            feldolgozo(kapott);
        }
    };
    kapcs.send();
}

//ezzel fogom az oldalom megjeleníteni az adatokat. Tervezem a JQuery-vel
function feldolgozo(kapott) {
    console.log(kapott);
}
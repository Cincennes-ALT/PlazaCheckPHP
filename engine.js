/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

//oldal JavaScriptje

var xhttpKeres = new XMLHttpRequest();
xhttpKeres.onreadystatechange = function(){
  if (this.readyState == 4 && this.status == 200){
      document.getElementById("oldal").innerHTML = "<br>" + this.responseText;
  }  
};
xhttpKeres.open("POST", "index.php", true);
xhttpKeres.send();

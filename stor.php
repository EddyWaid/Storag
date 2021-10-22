<?php
  /*   ARRAY FILE E CARTELLE DELL'UTENTE   */
  if(!isset($_COOKIE['id'])){
    header('Location: index.php');
  }

  include 'shared.php';
?>


<html lang="en" dir="ltr">

<!-- AVANTI/INDIETRO -->
<div class="arrowBox disabled"id="forward" onclick="forward()">
  <i class="arrow right"></i>
</div>
<div class="arrowBox disabled" style="right:36%" id="back" onclick="back()">
  <i class="arrow left"></i>
</div>

  <div class="bg-img container_grid" id='Body' >
    <script>
      carica();
      function carica(x,y){


        xhr = new XMLHttpRequest();
        xhr.open('POST', 'php/cartelle.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        if(x){
          if (x=='b') {
            if(a==1){
              a--;
              x = 'n';
              document.getElementById('forward').classList.remove('disabled');
              document.getElementById('back').classList.add('disabled');
            }
            else if (a>1) {
              a--;
              x = dir[a];
              document.getElementById('forward').classList.remove('disabled');
            }
          }
          else if(x=='f'){
            a++;
            x = dir[a];
            document.getElementById("back").classList.remove('disabled');
          }
          else if(x=='r'){
            x = dir[a];
          }
          else {
            console.log(100000);
            empty();
            a++;
            dir[a]=x;
            document.getElementById("forward").classList.add('disabled');
            document.getElementById("back").classList.remove('disabled');
          }
          if(!dir[a+1]){
            document.getElementById('forward').classList.add('disabled');
          }
          params = "car="+x;
          xhr.send(params);
        }
        else{
          a=0;
          document.getElementById("back").classList.add('disabled');
          xhr.send();
        }
        changeDirectory();

        xhr.onload = function(){
          document.getElementById('Body').innerHTML = xhr.responseText;
          document.getElementById('Body').innerHTML += '<div id="NewFolderDiv" style="display:none;" >'
          +'<form  id="folderForm">'
          +'<img src="css/imag/fol1.png" class="icon">'
          +'<img src="css/imag/plus.png"  class="plus">'
          +'<br>'
          +'<input name="NewFolderName" id="FolderText" type="text" class="NForm"></input>'
          +'</form>'
          +'</div>'
          ;
          document.getElementById("folderForm").addEventListener('submit', prevent);
        }
      }

    </script>
  </div>




  <!-- MENU BOTTOM LEFT -->
  <div class='menuBL' id="menu">
    <img src="css/imag/maci.png" style="display: block;margin-right: auto;margin-left: auto; top:18%;" class="icon">
    <br><br><br>
    <div class='percentageBar'>
      <div class="percentage"></div>
    </div>

    <div class="hideMenu" onclick="hideMenu()">
      <div class="arrow down"></div>
    </div>

  </div>

  <div class="showMenu" onclick="showMenu()">
    <div class="arrow up"></div>
  </div>

  <script>
    //show or hide menu by cookie
    x = checkCookie('menu');
    if(x!='no')
    {
      document.getElementById('menu').style.display = 'block';
    }
  </script>



  <!-- MODIFICA BUTTON-->
  <div class="downButt" >
    <input type="button" class="dd"value="MODIFICA" style="" onClick="SelectShake()">
  </div>
  <!-- FINE MODIFICA  -->
  <div class="downButt" id="StopShake"style="width: 7%;height: 61; display:none; " onclick="StopShake()">
    <input type="button" class="cc"value="V" style="font-size: 29px;">
  </div>


  <!-- AGGIUNGI BUTTON -->
  <div class="downButt" style="right: 230;">
    <input type="button" value="AGGIUNGI" class="cc" onClick="ShowVignette()" >

    <!-- VIGNETTE -->
    <div class="dialog-2" id="vignette" >

      <!-- CARTELLA IN VIGNETTE -->
      <a href="#cart" onclick="hideVignette();ShowNewFolder();" style="position: relative; left: 20%;" id='vignetteFolder'>
        <img src="css/imag/fol1.png" class="icon">
        <header class="iconH" style="color:black;">Cartella</header>
      </a>

      <!-- FILE IN VIGNETTE-->
      <a href="#file" style="position: relative; left: 37%; top:1%;" onclick="showDrop()" id="vignetteFile">
        <img src="css/imag/file_im.png" class="icon">
        <header class="iconH" style="color:black; left:14%">File</header>
      </a>

      <div class="dropBox dropArea" id="dropArea">
        <!form action="php/NewFile.php?n=0" method="post" enctype="multipart/form-data">
          <br>
          <img src="css/imag/upload.png" style="width:60;"></img>
          <br>
          <h4>Trascina uno o più file</h4>
          <h6>oppure</h6>
          <input type="file" class="inputHidden" name="file" id="file" onchange=""></input>
          <label for="file" class='lab' ><h3 style="display:contents;">Premi qui</h3></label>
          <input type="button" onclick="sendFile()">
          <!input type="submit" name="" value="">
        <!/form>
      </div>


      <!-- X BUTTON  -->
      <span class="close" onclick="hideVignette()" style="top: ">&times;</span>

      <div class="right-point" id="rightPoint"></div>

    </div>
  </div>




  <!-- MODAL -->
  <div id="modal" class="modal">

    <div class="modal-content" id="modalDiv">
      <span class="close" onclick="hideModal()">&times;</span>
      <header>Sicuro di voler eliminare la cartella e tutti i files al suo interno?</header>
      <div class="field" style="float:left; width:20%">
        <input type="button" value="SI" class="si" onclick="deleteFolder()">
      </div>
      <div class="field" style="width:20%">
        <input type="button" value="No" class="no" onclick="hideModal()">
      </div>
    </div>

  </div>



  <script type="text/javascript">
    //DELETE folder
    function deleteFolder(){
      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'php/delete.php', true);
      params = "fID="+minus;
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

      xhr.onload = function(){
        //StopShake();
        hideModal();
        document.getElementById(minus).remove();
        console.log(this.responseText);
      }
      xhr.send(params);
    }


    function sendFile(){

   var files = document.getElementById("file").files;

   if(files.length > 0 ){

      var formData = new FormData();
      formData.append("file", files[0]);

      var xhttp = new XMLHttpRequest();

      // Set POST method and ajax file path
      xhttp.open("POST", 'php/NewFile.php?n='+dir[a], true);

      // call on request changes state
      xhttp.onreadystatechange = function() {
         if (this.readyState == 4 && this.status == 200) {

           var response = this.responseText;
           console.log(this.responseText);
           if(response == 0){
              alert("Errore:controlla la tua connesione o formato file non accettato.");
           }else{
             carica('r');
             alert("File caricato.");
           }
         }
      };

      // Send request with data
      xhttp.send(formData);

   }else{
      alert("Please select a file");
   }
    }


    //ADD new folder CALL "NewFolder.php"
    function prevent(e){
      e.preventDefault();
      sendFolderPhp();
    }
    function sendFolderPhp(){
      var name = document.getElementById('FolderText').value;
      var params = "name="+name;
      console.log(dir[a]);

      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'php/NewCartella.php?n='+dir[a], true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

      xhr.onload = function(){
        document.getElementById('NewFolderDiv').classList.add('shake');
        document.getElementById('NewFolderDiv').innerHTML = '<a onClick="carica(\''+this.responseText+'\');changeDirectory(\''+name+'\')">'
            +'<img src="css/imag/fol1.png"  class="icon">'
            +'<header class="iconH"">'+name+'</header>'
          +'</a>'
          +'<img class="minus" src="css/imag/minus.png" id="'+name+'" onClick="ShowModal('+this.responseText+')">'
        document.getElementById('NewFolderDiv').removeAttribute('id');
        document.getElementById('Body').innerHTML +='<div id="NewFolderDiv" style="display:none;" >'
            +'<form  id="folderForm" >'
              +'<img src="css/imag/fol1.png" class="icon">'
              +'<img src="css/imag/plus.png"  class="plus">'
              +'<br>'
              +'<input name="NewFolderName" id="FolderText" type="text" class="NForm"></input>'
            +'</form>'
          +'</div>'
        document.getElementById("folderForm").addEventListener('submit', prevent);
        console.log(this.responseText);
      }
      xhr.send(params);
    }

  </script>


</html>

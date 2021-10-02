<?php
  /*   ARRAY FILE E CARTELLE DELL'UTENTE   */
  if(!isset($_COOKIE['id']))
  {
    header('Location: index.php');
  }
  $conn = mysqli_connect("localhost","root","","Storag_mk1");

  if(!isset($_GET['n']))
  {
    if(isset($_COOKIE['dir']))
    {
      setcookie("dir", "", time() - 3600,"/");
    }
    $query = ("SELECT * FROM file WHERE utente = ".$_COOKIE['id']." AND cartella IS NULL ");
  }

  else
  {
    $query = ("SELECT * FROM file WHERE utente = ".$_COOKIE['id']." AND cartella = ".$_GET['n']." ");
  }

  $fill = mysqli_query($conn,$query);
  $fil = mysqli_fetch_array($fill);
  $num = mysqli_num_rows($fill);

  include 'shared.php';
?>


<html lang="en" dir="ltr">

  <body>
  <div class="bg-img container_grid" id='Body' >

    <?php

      if(isset($fil)){

        for($i=0;$i<$num;$i++)
        {

          /* CARTELLE */
          if(!isset($fil['root']))
          {
            echo  '<div class="shake" id="'.$fil["id"].'">
                    <a href="stor.php?n='.$fil["id"].'" onClick="changeDirectory(\''.$fil["nome"].'\')">
                      <img src="css/imag/fol1.png"  class="icon">
                      <header class="iconH">'.$fil["nome"].'</header>
                    </a>
                    <img class="minus" src="css/imag/minus.png" id="'.$fil["nome"].'" onClick="ShowModal('.$fil["id"].')">
                  </div>';
          }
          /*  FILES   */
          else
          {
            echo  '<div class="shake" id="'.$fil["id"].'">
                    <a href="'.$fil["root"].'" target="_blank onClick="changeDirectory(\''.$fil["nome"].'\')"">
                      <img src="css/imag/file_im.png" class="icon">
                      <header class="iconH">'.$fil["nome"].'</header>
                    </a>
                    <img class="minus" src="css/imag/minus.png" id="'.$fil["nome"].'" onClick="ShowModal('.$fil["id"].')" >
                  </div>';
          }

            $fil = mysqli_fetch_array($fill);
          }

        }
    ?>

    <!--   NEW FOLDER    -->
    <div id="NewFolderDiv" style="display:none;" >
      <form  id="folderForm">
        <img src="css/imag/fol1.png" class="icon">
        <img src="css/imag/plus.png"  class='plus'>
        <br>
        <input name="NewFolderName" id="FolderText" type="text" class="NForm"></input>
      </form>
    </div>
  </div>



    <!-- MENU BOTTOM LEFT -->
    <div class='menuBL' id="menu">

      <img src="css/imag/maci.png" style="display: block;margin-right: auto;margin-left: auto; top:18%;" class="icon">
      <br><br><br>
      <div class='percentageBar'>
        <div class="percentage">
        </div>
      </div>

      <div class="hideMenu" onclick="hideMenu()">
        <div class="arrow down">
        </div>
      </div>

    </div>

    <div class="showMenu" onclick="showMenu()">
      <div class="arrow up">
      </div>
    </div>
    <script>
       x = checkCookie('menu');
      if(x!=0)
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
        <a href="#cart" onclick="hideVignette();ShowNewFolder();" style="position: relative; left: 20%;">
          <img src="css/imag/fol1.png" class="icon">
          <header class="iconH" style="color:black;">Cartella</header>
        </a>

        <!-- FILE IN VIGNETTE-->
        <a href="#file" style="position: relative; left: 37%; top:1%;">
          <img src="css/imag/file_im.png" class="icon">
          <header class="iconH" style="color:black; left:14%">File</header>
        </a>


        <!-- X BUTTON  -->
        <span class="close" onclick="hideVignette()" style="top: ">&times;</span>

        <div class="right-point">
        </div>

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
      function deleteFolder()
      {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'php/delete.php', true);
        params = "fID="+minus;
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onload = function()
        {
          //StopShake();
          hideModal();
          document.getElementById(minus).remove();
          console.log(this.responseText);
        }
        xhr.send(params);
      }


      //ADD new folder CALL "NewFolder.php"
      document.getElementById("folderForm").addEventListener('submit', prevent);
      function prevent(e)
      {
        e.preventDefault();
        sendFolderPhp();
      }
      function sendFolderPhp()
      {
        var name = document.getElementById('FolderText').value;
        var params = "name="+name;

        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'php/NewCartella.php?<?php if(isset($_GET['n'])){echo "n=".$_GET['n']."";} ?>', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        xhr.onload = function()
        {
          document.getElementById('NewFolderDiv').classList.add('shake');
          document.getElementById('NewFolderDiv').innerHTML = '<a href="stor.php?n='+this.responseText+'" id="'+this.responseText+'" onClick="changeDirectory(\''+name+'\')">'
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
          document.getElementById("folderForm").addEventListener('submit', sendFolderPhp);
        }
        xhr.send(params);
      }

    </script>




</html>

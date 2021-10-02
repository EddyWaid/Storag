<?php
  include 'shared.php';

  /*   ARRAY FILE E CARTELLE DELL'UTENTE   */
  $conn = mysqli_connect("localhost","root","","Storag_mk1");

  if(!isset($_GET['n']))
  {
    $query = ("SELECT * FROM file WHERE utente = ".$_COOKIE['id']." AND cartella IS NULL ");
  }

  else
  {
    $query = ("SELECT * FROM file WHERE utente = ".$_COOKIE['id']." AND cartella = ".$_GET['n']." ");
  }

  $fill = mysqli_query($conn,$query);
  $fil = mysqli_fetch_array($fill);
  $num = mysqli_num_rows($fill);
?>


<html lang="en" dir="ltr">


  <div class="bg-img container_grid" id='Body'>

    <?php

      if(isset($fil)){

        for($i=0;$i<$num;$i++)
        {

          /* CARTELLE */
          if(!isset($fil['root']))
          {
            echo  '<div class="shake">
                    <a href="stor.php?n='.$fil["id"].'">
                      <img src="css/imag/fol1.png"  class="icon">
                      <header class="iconH">'.$fil["nome"].'</header>
                      <img class="minus" src="css/imag/minus.png" >
                    </a>
                  </div>';
          }
          /*  FILES   */
          else
          {
            echo  '<div class="shake">
                    <a href="'.$fil["root"].'" target="_blank">
                      <img src="css/imag/file_im.png" class="icon">
                      <header class="iconH">'.$fil["nome"].'</header>
                      <img class="minus" src="css/imag/minus.png" >
                    </a>
                  </div>';
          }

            $fil = mysqli_fetch_array($fill);
          }

        }
    ?>


    <!--   NEW FOLDER    -->
    <div id="NewFolderDiv" style="display:none;" >
      <form  id="NewFolderForm" >
        <img src="css/imag/fol1.png" class="icon">
        <img src="css/imag/plus.png"   class='plus'  >
        <br>
        <input name="NewFolderName" id="FolderText" type="text" class="NForm"></input>
      </form>
    </div>





    <!-- MODIFICA BUTTON-->
    <div class="field" style="z-index: 500; position: fixed;bottom: 3;width: 15%;right: 5;">
      <input type="button" class="dd"value="MODIFICA" style="" onClick="SelectShake()">
    </div>
    <!-- FINE MODIFICA  -->
    <div class="field" id="StopShake"style="z-index: 500; position: fixed;bottom: 3;width: 7%;height: 61;right: 5; display:none; " onclick="StopShake()">
      <input type="button" class="cc"value="V" style="font-size: 29px;">
    </div>


    <!-- AGGIUNGI BUTTON -->
    <div class="field" style="z-index: 500; position: fixed;bottom: 3;width: 15%;right: 230;">
      <input type="button" value="AGGIUNGI" class="cc" onClick="ShowVignette()" >

      <!-- VIGNETTE -->
      <div class="dialog-2" id="vignette" >

        <!-- CARTELLA IN VIGNETTE -->
        <a href="#cart" onclick="HideVignette();ShowNewFolder();"   style="">
          <img src="css/imag/fol1.png" height="70" style="position:relative; z-index: 100; left:20%">
          <header style="position:absolute; color:black; z-index:100; left:23%; width: 56;">Cartella</header>
        </a>

        <!-- FILE IN VIGNETTE-->
        <a href="#file"  style="left: 62%;position: absolute;bottom: 5%;">
          <img src="css/imag/file_im.png" height="70" style="position:relative; z-index: 100; bottom: 181%;">
          <header style="position:relative; color:black; z-index:100;left:10; text-decoration: none;">File</header>
        </a>


        <!-- X BUTTON  -->
        <div class="field" style="position: absolute;top: 1;right: 16;width: 19;height: 18;" onClick="HideVignette()">
          <input type="button" class="dd"value="X" style="font-size: 11px;">
        </div>

        <div class="right-point">
        </div>

      </div>

    </div>

  </div>

</html>

<?php

  $conn = mysqli_connect("localhost","root","","Storag_mk1");

  if(!isset($_POST['car'])||$_POST['car']=='n')
  {
    $query = ("SELECT * FROM file WHERE utente = ".$_COOKIE['id']." AND cartella IS NULL ");
  }

  else
  {
    $query = ("SELECT * FROM file WHERE utente = ".$_COOKIE['id']." AND cartella = ".$_POST['car']." ");
  }

  $fill = mysqli_query($conn,$query);
  $fil = mysqli_fetch_array($fill);
  $num = mysqli_num_rows($fill);

  if(isset($fil)){

    for($i=0;$i<$num;$i++)
    {

      /* CARTELLE */
      if(!isset($fil['root']))
      {
        echo  '<div class="shake" id="'.$fil["id"].'">
                <a onClick="carica(\''.$fil["id"].'\');changeDirectory(\''.$fil["nome"].'\')">
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
                <a target="_blank"  href="'.$fil["root"].'">
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

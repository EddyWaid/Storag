<?php
  if(!isset($conn))
  {
    $conn = mysqli_connect("localhost","root","","Storag_mk1");
  }

  $query = "DELETE FROM file WHERE utente = ".$_COOKIE['id']." AND id = ".$_POST['fID']." OR cartella = ".$_POST['fID']." ";

  if(mysqli_query($conn,$query))
  {
    echo 'yey';
  }
  else
  {
    echo 'no';
  }
 ?>

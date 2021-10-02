<?php

  $conn = mysqli_connect("localhost","root","","Storag_mk1");
  $query = "SELECT id FROM file WHERE nome = 'test' AND utente = ".$_COOKIE['id']."";
  $res = mysqli_query($conn,$query);
  $res = mysqli_fetch_array($res);
  echo $res[0];

?>

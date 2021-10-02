<?php


  $conn = mysqli_connect("localhost","root","","Storag_mk1");
  $query = "SELECT id FROM utenti WHERE codice = ".$_POST['cod']." ";
  $ut = mysqli_query($conn,$query);
  $uti = mysqli_fetch_array($ut);



  if(isset($uti)){
      header('Location: ../stor.php');
      setcookie("id", $uti[0], time() + (86400 * 30),"/");
      if(isset($_COOKIE["id"])){
        echo "cazzo";
      }
  }


  else {
      header('Location: ../index.php?err=1');
  }
?>

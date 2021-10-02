<?php
  $conn = mysqli_connect("localhost","root","","Storag_mk1");
  //if(!isset($_GET['n'])){
    $query = "INSERT INTO file (utente,nome) VALUES (".$_COOKIE['id'].",'".$_POST['name']."')";
  //}
  //else{
    //$query= "INSERT INTO file (utente,nome,cartella) VALUES (".$_COOKIE['id'].",'".$_POST['name']."',".$_GET['n'].")";
  //}
  if(mysqli_query($conn,$query)){
    echo "ok";
    }
    else{
    echo "cazz";
    }
?>

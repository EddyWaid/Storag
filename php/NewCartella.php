<?php
  if(!isset($conn))
  {
  $conn = mysqli_connect("localhost","root","","Storag_mk1");
  }
  if($_GET['n']== 'undefined')
  {
    $query = "INSERT INTO file (utente,nome) VALUES (".$_COOKIE['id'].",'".$_POST['name']."')";
  }
  else{
    $query= "INSERT INTO file (utente,nome,cartella) VALUES (".$_COOKIE['id'].",'".$_POST['name']."',".$_GET['n'].")";
  }
  if(mysqli_query($conn,$query)){
    $query = "SELECT id FROM file WHERE nome ='".$_POST['name']."' AND utente = ".$_COOKIE['id']."";
    $res = mysqli_query($conn,$query);
    $res = mysqli_fetch_array($res);
    echo $res[0];
    }
    else{
    echo $_GET['n'];
    }
?>

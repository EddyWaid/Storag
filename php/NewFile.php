<?php
if(!isset($conn)){
  $conn = mysqli_connect("localhost","root","","Storag_mk1");
}
if(isset($_FILES['file']['name'])){
   // file name
   $filename = $_FILES['file']['name'];

   // Location
   $location = '../aqui/'.$filename;
   $loc = 'aqui/'.$filename;

   // file extension
   $file_extension = pathinfo($location, PATHINFO_EXTENSION);
   $file_extension = strtolower($file_extension);

   // Valid extensions
   $valid_ext = array("pdf","doc","docx","jpg","png","jpeg");

   $response = 0;
   if(in_array($file_extension,$valid_ext)){
     if($_GET['n'] != 'undefined'){
       $query = 'INSERT INTO file (utente,nome,cartella,root) VALUES ('.$_COOKIE["id"].',"'.$filename.'",'.$_GET['n'].',"'.$loc.'")';
     }
     else {
       $query = 'INSERT INTO file (utente,nome,root) VALUES ('.$_COOKIE["id"].',"'.$filename.'","'.$loc.'")';
     }
      // Upload file
      if(move_uploaded_file($_FILES['file']['tmp_name'],$location) && mysqli_query($conn,$query)){
         $response = 1;
      }
   }

   echo $response;
   exit;
  }
   ?>

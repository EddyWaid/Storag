<?php

$conn = mysqli_connect("localhost","root","","Storag_mk1");
$query = ("SELECT * FROM file WHERE utente = ".$_COOKIE['id']." ");
$fill = mysqli_query($conn,$query);
$fil = mysqli_fetch_array($fill);
$num = mysqli_num_rows($fill);
if(isset($fil)){
  echo'w';
    for($i=0;$i<$num;$i++){
        echo 'w';
        if(!isset($fil['cartella'])){

            if(!isset($fil['root'])){
              echo  '     <div>
                      <a href="index.php">
                        <img src="css/imag/fol1.png" height="70" style="position:relative; z-index: 100;">
                        <header style="position:relative; color:white; z-index:100;">'.$fil["nome"].'</header>
                      </a>
                    </div>';

            }

        }
        $fil = mysqli_fetch_array($fill);

    }

}
?>

<html>

<head>

  <meta charset="utf-8">
  <title></title>

  <!link rel="stylesheet" href="css/template.css">
  <link rel="stylesheet" href="css/all.css">
  <script type="text/javascript" src="all.js"></script>


  <style>
    body {font-family: "Times New Roman", Georgia, Serif;}
    h1, h2, h3, h4, h5, h6 {
      font-family: "Playfair Display";
      letter-spacing: 5px;
    }

  </style>

</head>



<div class="topBox">
  <div class="topBar" style="letter-spacing:4px;">

    <?php if(!isset($_COOKIE['id'])){ echo '
              <a href="index.php" class="topLink">Storage</a>

              <a href="#Login" class="topLink" onclick="window.scrollTo({top: 20, behavior: "smooth"}); style="float: right!important;"" >Login</a>';
          }
          else {echo '
              <a href="stor.php" class="topLink">Storage</a>

              <a href="php/controlla_logout.php" class="topLink" style="float: right!important;">Logout</a> ' ;
          }
    ?>



  </div>
</div >

</html>

<?php
if(isset($_COOKIE['id'])){
  header ("Location:stor.php");
}
include 'shared.php';
?>


<html lang="en" dir="ltr">

  <body>

    <div class="bg-img" >
         <div class="content">
            <header>Login</header>
            <form action="php/controlla_login.php" method="post">
              <?php
                  if(isset($_GET['err'])){
                    echo  ' <header style="color: red;">  Codice errato  </header>';
                  }
              ?>
              <!-- <div class="field">
                  <span class="fa fa-user"></span>
                  <input type="text" required placeholder="Email or Phone">
               </div> -->

               <div class="field space">
                  <span class="fa fa-lock"></span>
                  <input type="password" name="cod" class="pass-key" required placeholder="Codice">
                  <span class="show">SHOW</span>
               </div>
               <div class="pass">
                  <a href="#">Forgot Password?</a>
               </div>
               <div class="field">
                  <input type="submit" value="LOGIN">
               </div>
            </form>
            <br>
         </div>
      </div>

      <script>
         const pass_field = document.querySelector('.pass-key');
         const showBtn = document.querySelector('.show');
         showBtn.addEventListener('click', function(){
          if(pass_field.type === "password"){
            pass_field.type = "text";
            showBtn.textContent = "HIDE";
            showBtn.style.color = "#3498db";
          }else{
            pass_field.type = "password";
            showBtn.textContent = "SHOW";
            showBtn.style.color = "#222";
          }
         });
      </script>


      <hr>


          <div class="container">

            <div class="box" style="margin-left:28%;">
              <img class="w3-image" src='css/imag/maci.webp' height="120" width="160" style=" display: block;" >
                <div class="percent">
                  <svg>
                    <circle cx="70" cy="70" r="70"></circle>
                    <circle cx="70" cy="70" r="70"></circle>
                  </svg>
                <div class="num">
                  <h2>87<span>%</span></h2>
                </div>
              </div>
                <h2 class="text">Progress</h2>
            </div>

            &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp

            <div class="box">
            <img class="w3-image" src='css/imag/exHD.png' height="70" width="100" style=" display: block;" >
                <div class="percent">
                  <svg>
                    <circle cx="70" cy="70" r="70"></circle>
                    <circle cx="70" cy="70" r="70"></circle>
                  </svg>
                <div class="num">
                  <h2>87<span>%</span></h2>
                </div>
              </div>
                <h2 class="text">Progress</h2>
            </div>

          </div>



          <br>
          <br>




  </body>



</html>

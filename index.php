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
            if(isset($_GET['err']))
            {
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
  </body>



</html>

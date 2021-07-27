<?php
  if (isset(shell_exec('cd /Applications/XAMPP/xamppfiles/htdocs/TEst/Test/ && git pull')))
  {
    header('Location: t1.html');
  }
?>

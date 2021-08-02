<?php
  $c = shell_exec('sudo cd /Applications/XAMPP/xamppfiles/htdocs/TEst/Test/ && sudo git reset--hard && sudo git pull 2>&1');
  if (isset($c))
  {
    header('Location: t1.html');
  }
  else
  {
    shell_exec(' sudo -S git pull 2>&1');
    header('Location: index.html');
  }
?>

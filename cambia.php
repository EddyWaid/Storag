<?php
  $c = shell_exec('sudo cd /Applications/XAMPP/xamppfiles/htdocs/TEst/Test/ && sudo git reset--hard && sudo git pull 2>&1');
  if (isset($c))
  {

  }
  else
  {
    echo shell_exec('id -un');

    echo shell_exec('sudo git stash && sudo -S git pull 2>&1');
  }
?>

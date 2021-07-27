<?php
  $c = shell_exec('cd /Applications/XAMPP/xamppfiles/htdocs/TEst/Test/ && git pull');
  echo $c;
  if (isset($c))
  {
    header('Location: t1.html');
  }
  else
  {
    echo shell_exec('ls');
    echo shell_exec('git pull');
    $c = shell_exec('git pull');
    echo $c;
    echo 'ci siamo quasi';
  }
?>

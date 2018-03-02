<?php
  // Basic but let's see...

  $_file = $_GET['title'];
  if (empty($_file)) {
    $_file = 'Main_Page';
  }
  $file = 'pages/' . $_file . '.htm';
  if (file_exists($file)) {

    include($file);
    echo '<link rel="stylesheet" href="mediawiki.css" />';
    echo '<link rel="stylesheet" href="style.css" />';

  } else {
    echo $file . ' does not exist!';
  }
?>

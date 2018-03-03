<?php
  // Basic but let's see...
  require_once 'lib/Twig/Autoloader.php';
  Twig_Autoloader::register();

  $_file = $_GET['title'];
  if (empty($_file)) {
    $_file = 'Main_Page';
  }
  $rootPath = 'app/';
  $file = 'pages/' . $_file . '.twig';
  $model = array();

  $loader = new Twig_Loader_Filesystem($rootPath);
  $twig = new Twig_Environment($loader, array(
    'cache' => 'cache'
  ));

  // Clean up the titles
  $charsToRemove = array(':', '_');
  $title = str_replace($charsToRemove, ' ', $_file);

  if (file_exists($rootPath . $file)) {
    $model = array(
      'page' => array(
        'title' => $title,
        'base' => pathinfo(__FILE__)['basename'],
      )
    );
  } else {
    $model = array(
      'page' => array(
        'title'=> '404',
        'message' => $title . ' does not exist!',
      )
    );
    $file = '404.twig';
  }
  echo $twig->render($file, $model);
?>

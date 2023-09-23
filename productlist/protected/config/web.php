<?php
   $params = require(__DIR__ . '/params.php');
   $config = [
      'id' => 'basic',
      'basePath' => dirname(__DIR__),
      'bootstrap' => ['log'],
      'catchAll' => ['productlist/api/site'],
      'components' => ['']
    ];
?>
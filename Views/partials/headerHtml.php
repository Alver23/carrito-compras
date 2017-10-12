<?php
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Config'.DIRECTORY_SEPARATOR.'App.php';
$app = new App();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$title ?? 'Carrito Compras'; ?></title>
    <link href="<?=$app->getUrlApp()?>/public/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?=$app->getUrlApp()?>/public/css/common.css?v=<?= time()?>" rel="stylesheet" type="text/css">
</head>
<body>
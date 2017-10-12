<?php
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Config'.DIRECTORY_SEPARATOR.'App.php';
$app = new App();
?>
<script src="<?=$app->getUrlApp()?>/public/plugins/jQuery/jquery-3.2.1.js"></script>
<script src="<?=$app->getUrlApp()?>/public/plugins/bootstrap/js/bootstrap.js"></script>
<script src="<?=$app->getUrlApp()?>/public/plugins/jQuery/jquery.form.min.js"></script>
<script src="<?=$app->getUrlApp()?>/public/plugins/jQuery/jquery.validate.min.js"></script>
<script src="<?=$app->getUrlApp()?>/public/js/common.js"></script>
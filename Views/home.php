<?php
$title = 'Home';
$path = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR;
require_once $path.'Helpers'.DIRECTORY_SEPARATOR.'helpers.php';
check_with_redirect();
require_once 'partials/headerHtml.php';
require_once $path.'Views'.DIRECTORY_SEPARATOR.'partials'.DIRECTORY_SEPARATOR.'sideBar.php';
?>
Home carrito de compras

<?php
require_once 'partials/script.php';
require_once 'partials/footer.php';
?>
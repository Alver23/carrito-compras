<?php
$path = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR;
require_once $path.'Helpers'.DIRECTORY_SEPARATOR.'helpers.php';
$path = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR;
require_once $path.'Services'.DIRECTORY_SEPARATOR.'Auth.php';
$host = host();
if ($_POST) {
    $auth = new Auth();
    $_SESSION['errors'] = null;
    if ($auth->login($_POST['email'], $_POST['password'])) {
        //redirect("$host/Views/home.php");
        return die(json_encode(["type" => "succes", "errors" => "", "url" => "$host/Views/home.php"]));
    }
    //$_SESSION['errors'] = $auth->getErrors();
    return die(json_encode(["type" => "error", "errors" => $auth->getErrors()]));
    //redirect(host());
} else {
    if (! empty($_GET) && $_GET['act'] === 'logout') {
        $auth = new Auth();
        $auth->logout();
        redirect("$host");
    }
}
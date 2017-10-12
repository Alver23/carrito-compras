<?php
$path = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR;
require_once $path.'Helpers'.DIRECTORY_SEPARATOR.'helpers.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Users.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Clients.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Services'.DIRECTORY_SEPARATOR.'Auth.php';

if ($_POST) {
	$_SESSION['error_registro'] = null;
    $validations = validate($_POST, ['celular', 'telefono', 'direccion']);
    if (!empty($validations)) {
    	$_SESSION['error_registro'] = $validations;
    	redirect("$host/Views/registrarUsuarios.php");
    }
    $user = new Users;
    $client = new Clients;
    $auth = new Auth;
    if (!empty($user->getUserByEmail($_POST['email']))) {
    	$_SESSION['error_registro'] = [sprintf("El correo %, ya se encuentra registrado", $_POST['email'])];
    	redirect("$host/Views/registrarUsuarios.php");
    }
    $user = $user->save($_POST);
    $userId = $user->id;
    $_POST['user_id'] = $userId;
    $client->save($_POST);
     if ($auth->login($_POST['email'], $_POST['password'])) {
        redirect("$host/Views/home.php");
    }
} else {
    
}
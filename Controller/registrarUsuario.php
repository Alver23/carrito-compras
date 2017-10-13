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
        return die(json_encode(["type" => "error", "errors" => $validations, "url" => ""]));
    	//$_SESSION['error_registro'] = $validations;
    	//redirect("$host/Views/registrarUsuarios.php");
    }
    $user = new Users;
    $client = new Clients;
    $auth = new Auth;
    if (!empty($user->getUserByEmail($_POST['email']))) {
    	$errors = [sprintf("El correo %, ya se encuentra registrado", $_POST['email'])];
        return die(json_encode(["type" => "error", "errors" => $errors, "url" => ""]));
    	//redirect("$host/Views/registrarUsuarios.php");
    }
    $user = $user->save($_POST);
    $userId = $user->id;
    $_POST['user_id'] = $userId;
    $client->save($_POST);
     if ($auth->login($_POST['email'], $_POST['password'])) {
         return die(json_encode(["type" => "success", "errors" => "", "url" => "$host/Views/home.php"]));
        //redirect("$host/Views/home.php");
    }
} else {
    
}
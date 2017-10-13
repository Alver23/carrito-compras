<?php
$path = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR;
require_once $path.'Helpers'.DIRECTORY_SEPARATOR.'helpers.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Users.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Products.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Documents.php';

if ($_POST) {
    $product = new Products;
    $productId = $product->save($_POST);
    if (!empty($_FILES["images"]) && count($_FILES["images"]) > 0) {
        foreach ($_FILES["images"] as $data) {
            $document = new Documents;
            $results = $document->upload($data, ['png', 'jpg', 'gif'], "public/images/products", "public/images/products");
            if (empty($results["errores"])) {

            }
        }
    }
    redirect("$host/Views/home.php");
} else {

}
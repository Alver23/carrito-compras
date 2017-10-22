<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$path = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR;
require_once $path.'Helpers'.DIRECTORY_SEPARATOR.'helpers.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Users.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Products.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Documents.php';

if ($_POST) {
    $results = [];
    $product = new Products;
    $productId = $product->save($_POST);
    if (!empty($_FILES["images"]) && count($_FILES["images"]) > 0) {
        $document = new Documents;
        $name = $productId;
        $rutaServer = dirname(__FILE__).DIRECTORY_SEPARATOR.'../public/images/products'.DIRECTORY_SEPARATOR.sanear_string($name).DIRECTORY_SEPARATOR;
        $rutaBD = 'public/images/products'.DIRECTORY_SEPARATOR.sanear_string($name).DIRECTORY_SEPARATOR;
        $ispath = $document->VerificFolder($rutaServer);
        if ($ispath) {
            $results = $document->uploadMultiple($_FILES['images'], ["gif", "jpeg", "jpg", "png"], $rutaServer, $rutaBD);
        }
    }
    if (!empty($results['idDocument']) && count($results['idDocument']) > 0) {
        foreach ($results['idDocument'] as $result) {
            print "id documento: ".$result;
            $product->saveProductHasImages($productId, $result);
        }
    }
    redirect("$host/Views/home.php");
} else {

}
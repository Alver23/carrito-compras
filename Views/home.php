<?php
$title = 'Home';
$path = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR;
require_once $path.'Helpers'.DIRECTORY_SEPARATOR.'helpers.php';
check_with_redirect();
require_once 'partials/headerHtml.php';
require_once $path.'Views'.DIRECTORY_SEPARATOR.'partials'.DIRECTORY_SEPARATOR.'sideBar.php';
$products = all_products();
?>
<?php if (!empty($products) && count($products) > 0): ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h1 style="text-align: center;">Listado de productos</h1>
                <ul style="list-style: none; text-align: center;">
                    <?php $x = 0; foreach ($products as $product): ?>
                        <li style="display: inline-block; max-width: 300px;">
                            <div class="thumbnail">
                                <img src="<?=host().'/'. $product->ruta?>" alt="<?=$product->nombre?>" width="200">
                                <div class="caption">
                                    <h3><?=$product->nombre?></h3>
                                    <p><strong>Categoria: </strong><?=$product->categoria?></p>
                                    <p><strong>Precio: </strong>$<?=number_format($product->precio, 2, ',', '.')?></p>
                                    <p><?=str_limit($product->descripcion)?></p>
                                    <p><a href="#" class="btn btn-primary" role="button">Ver más</a></p>
                                </div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php
require_once 'partials/script.php';
require_once 'partials/footer.php';
?>
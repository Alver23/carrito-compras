<?php
$title = 'Registro de Productos';
$path = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR;
require_once $path.'Helpers'.DIRECTORY_SEPARATOR.'helpers.php';
check_with_redirect();
require_once 'partials/headerHtml.php';
require_once $path.'Views'.DIRECTORY_SEPARATOR.'partials'.DIRECTORY_SEPARATOR.'sideBar.php';
$typeProducts = category_parent_id(4);
?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-lg-12">
                <div class="alert alert-danger" style="display: none;" role="alert" id="msgRegistro">
                </div>
                <?php if (!empty($_SESSION['error_registro']) && count($_SESSION['error_registro']) > 0): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php foreach ($_SESSION['error_registro'] as $error): ?>
                            <p>
                                * <?= $error?>
                            </p>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
                <form method="post" id="formRegistroProducts" action="<?=host()?>/Controller/Productscontroller.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="categoria_id"><strong class="text-red">*</strong> Categoria</label>
                                <select id="categoria_id" name="categoria_id" required="true" class="form-control">
                                    <option value="">Seleccione una opcion</option>
                                    <?php

                                    ?>
                                    <?php foreach ($typeProducts as $type): ?>
                                        <option value="<?=$type->id?>"><?=$type->nombre?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="precio"><strong class="text-red">*</strong> Precio</label>
                                <input type="text" class="form-control" name="precio" id="precio" placeholder="precio" required="true">
                            </div>
                            <div class="form-group">
                                <label for="images"><strong class="text-red">*</strong> Imagenes</label>
                                <input type="file" class="form-control" name="images[]" multiple="true" required="true">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                            <div class="form-group">
                                <label for="nombre"><strong class="text-red">*</strong> Nombre</label>
                                <input type="text" name="nombre" class="form-control" required="true" maxlength="255">
                            </div>
                            <div class="form-group">
                                <label for="cantidad"><strong class="text-red">*</strong> Cantidad</label>
                                <input type="number" name="cantidad" class="form-control" maxlength="20" required="true">
                            </div>

                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-group">
                                <label for="descripcion">Descripcion</label>
                                <textarea name="descripcion" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btnRegister">Registrar Producto</button>
                </form>
            </div>
        </div>
    </div>
<?php
require_once 'partials/script.php';
require_once 'partials/footer.php';
?>
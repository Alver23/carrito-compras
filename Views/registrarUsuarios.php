<?php
$title = 'Registrar Usuarios';
$path = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR;
require_once $path.'Helpers'.DIRECTORY_SEPARATOR.'helpers.php';

require_once 'partials/headerHtml.php';
require_once $path.'Views'.DIRECTORY_SEPARATOR.'partials'.DIRECTORY_SEPARATOR.'sideBar.php';
$typeclients = category_parent_id(1);
//print_r($typeclients);
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
            <form method="post" id="formRegistroUsuario" action="<?=host()?>/Controller/registrarUsuario.php">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                       <div class="form-group">
                            <label for="tipo_cliente_id"><strong class="text-red">*</strong> Tipo de Cliente</label>
                            <select id="tipo_cliente_id" name="tipo_cliente_id" required="true" class="form-control">
                                <option value="">Seleccione una opcion</option>
                                <?php
                                
                                ?>
                                <?php foreach ($typeclients as $type): ?>
                                    <option value="<?=$type->id?>"><?=$type->nombre?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nombre"><strong class="text-red">*</strong> Nombres</label>
                            <input type="text" name="nombres" class="form-control" required="true" maxlength="255">
                        </div>
                        <div class="form-group">
                            <label for="password"><strong class="text-red">*</strong> Contraseña</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" required="true">
                        </div>
                        <div class="form-group">
                            <label for="celular">Celular</label>
                            <input type="number" name="celular" class="form-control" maxlength="20">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="form-group">
                            <label for="identificacion" id="lbl_identificacion"><strong class="text-red">*</strong> Cedula</label>
                            <input type="number" name="identificacion" class="form-control" required="true" maxlength="10">
                        </div>
                        <div class="form-group">
                            <label for="email"><strong class="text-red">*</strong> Email</label>
                            <input type="email" name="email" class="form-control" required="true" maxlength="255">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password"><strong class="text-red">*</strong> Confirmar Contraseña</label>
                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirmar Contraseña" required="true">
                        </div>
                        <div class="form-group">
                            <label for="direccion">Direccion</label>
                            <input type="text" name="direccion" class="form-control" maxlength="255">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label for="telefono">Telefono Fijo</label>
                            <input type="number" name="telefono" class="form-control" maxlength="20">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" id="btnRegister">Registrarse</button>
            </form>
        </div>
    </div>
</div>
<?php
//print hash('sha512', '123456');
require_once 'partials/script.php';
?>
<script type="text/javascript" src="<?=host()?>/public/js/registroUsuario.js"></script>
<?php
require_once 'partials/footer.php';


    

?>

<?php
$title = 'Login';
$path = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR;
require_once $path.'Helpers'.DIRECTORY_SEPARATOR.'helpers.php';
if(check()) {
    redirect("Views/home.php");
}
require_once 'partials/headerHtml.php';
require_once $path.'Views'.DIRECTORY_SEPARATOR.'partials'.DIRECTORY_SEPARATOR.'sideBar.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-lg-push-8 col-md-push-8">
            <?php if (!empty($_SESSION['errors']) && count($_SESSION['errors']) > 0): ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach ($_SESSION['errors'] as $error): ?>
                        <p>
                            * <?= $error?>
                        </p>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
            <form method="post" action="<?=host()?>/Controller/login.php" id="formLogin">
                <div class="form-group">
                    <label for="exampleInputEmail1">Correo Electronico</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Contraseña</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                </div>
                <div class="row" style="display: none;" id="div_message_errors">
                    <div class="col-lg-12 col-md-12">
                        <div class="alert alert-danger" id="message_errors"></div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" id="buttonLogin">Iniciar Sesion</button>
            </form>
        </div>
        <div class="col-lg-8 col-md-8 col-lg-pull-4 col-md-pull-4 hidden-xs">
            <div class="row">
                <div class="col-lg-12 col-md-12 clearfix">
                    <img class="logo pull-left" src="<?=host()?>/public/images/fortinet.png" width="200">
                    <div class="page-header">
                        <h3 style="margin-top:5px;">Bienvenido a </h3>
                        <h2 style="margin-top:7px; margin-bottom:4px; font-weight:bold; word-wrap:break-word;">FORTINET</h2>
                        <h4>
                            Maxima Seguridad en la red para tu empresa con buenos productos                         </h4>
                    </div>
                </div>
            </div>
                       <div class="row" style="margin-bottom:10px;">
                <div class="col-lg-4 col-md-4">
                    <h4><i class="fa fa-group" style="color:#088A29"></i>&nbsp;Data Center</h4>
                    <p>Es un centro de procesamiento de datos, una instalación empleada para albergar un sistema de información de componentes asociados, como telecomunicaciones y los sistemas de almacenamientos donde generalmente incluyen fuentes de alimentación redundante o de respaldo de un proyecto típico de data center .</p>
                </div>
                <div class="col-lg-4 col-md-4">
                    <h4><i class="fa fa-gears" style="color:#01A9DB"></i>&nbsp;Infraestructura</h4>
                    <p>La infraestructura de red local y comunicaciones es una parte fundamental de un correcto funcionamiento de la plataforma informática. Es requisito fundamental un buen diseño de la misma, una correcta elección y configuración de la electrónica de red, para que el rendimiento de toda la plataforma sea el adecuado. Implantamos y mantenemos la mejor solución de acuerdo a las necesidades del cliente.
                    Disponemos de soluciones de:
                    Cableado estructurado.
                    Electrónica de red (Switch, routers, etc).
                    Redes inalámbricas.
                    Redes privadas virtuales (VPN)..</p>
                </div>
                <div class="col-lg-4 col-md-4">
                    <h4><i class="fa fa-cloud" style="color:#FF8000;"></i>&nbsp;Aplicaciones para seguridad</h4>
                    <p>Nuestras herramientas se fortalecen constantemente para ofrecerle una grata y confiable experiencia. ¡Prestigio y Productividad para su Institución!</p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
print hash('sha512', 'nikoll1sofia');
require_once 'partials/script.php';
?>
<script type="text/javascript" src="<?=host()?>/public/js/login.js" charset="UTF-8"></script>
<?php
require_once 'partials/footer.php';
?>

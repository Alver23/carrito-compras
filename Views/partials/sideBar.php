<?php
$path = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR;
require_once $path.'Helpers'.DIRECTORY_SEPARATOR.'helpers.php';
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="<?=host()?>/index.php">
                <img src="<?=host()?>/public/images/fortinet.svg" alt="Fortinet" width="170">
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <?php if(check()): ?>
                    <?php if(!empty($menus = parent_menu_user($userId = user()->id)) && count($menus) > 0): ?>
                        <?php foreach ($menus as $menu): ?>
                            <?php $subMenus = menu_child_user($userId, $menu->id); ?>
                            <?php if(!empty($subMenus)): ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=$menu->nombre ?> <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <?php foreach ($subMenus as $subMenu): ?>
                                            <li><a href="<?php print ($subMenu->url ? host().'/'.$subMenu->url : 'javascript:;');?>"><?=$subMenu->nombre ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </li>
                                <?php else: ?>
                                <li><a href="<?php print ($menu->url ? host().'/'.$menu->url : '#');?>"><?=$menu->nombre ?></a></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif ?>
                <?php endif ?>
                <?php if(!check()): ?>
                    <li><a href="<?=host()?>/">Iniciar Sesion</a></li>
                    <li><a href="<?=host()?>/Views/registrarUsuarios.php">Registrarse</a></li>
                <?php else: ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?=user()->nombres ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu"">
                            <li>
                                <a href="<?=host()?>/Controller/login.php?act=logout">Cerrar Cesion</a></li>
                            </li>
                        </ul>
                <?php endif ?>
            </ul>
        </div>
    </div>
</nav>
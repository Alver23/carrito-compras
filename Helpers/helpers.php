<?php

session_start();

$path = __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR;
require_once $path.'Services'.DIRECTORY_SEPARATOR.'CheckAuth.php';
require_once $path.'Services'.DIRECTORY_SEPARATOR.'Request.php';
require_once $path.'Config'.DIRECTORY_SEPARATOR.'App.php';
require_once $path.'Models'.DIRECTORY_SEPARATOR.'Menus.php';
require_once $path.'Models'.DIRECTORY_SEPARATOR.'Category.php';

if (! function_exists('auth_check')) {

    /**
     * function que nos permite validar si un usuario se encuentra logueado, en caso que no realiza una redireccion al index y en caso que si realiza una redireccion segun el parametro recibido
     *
     * @param string|null $route
     */
    function check_with_redirect(string $route = null)
    {
        $host = host();
        if (check()) {
            if ($route) {
                Request::redirect("$host/$route");
            }
        } else {
            Request::redirect("$host");
        }
    }
}

if (! function_exists('check')) {

    /**
     * funcion que valida si el usuario esta logueado
     *
     * @return bool|string
     */
    function check()
    {
        $checkAuth = new CheckAuth();

        return $checkAuth::check() ?? false;
    }
}

if (! function_exists('host')) {

    /**
     * Obtenemos el host configurado para la aplicacion
     *
     * @return string
     */
    function host()
    {
        $app = new App();

        return $app->getUrlApp();
    }
}

if (! function_exists('config')) {
    /**
     * Obtenemos la configuracion completa de nuestra aplicacion (.env)
     *
     * @return array|bool
     */
    function config()
    {
        $app = new App();

        return $app->getConfig();
    }
}

if (! function_exists('redirect')) {
    /**
     * funcion que nos redirecciona a una url en especifico
     *
     * @param string $url
     */
    function redirect(string $url)
    {
        return Request::redirect($url);
    }
}

if (! function_exists('parent_menu_user')) {

    /**
     * Obtenemos el menu padre del usuario
     *
     * @param int $userId
     * @return mixed
     */
    function parent_menu_user(int $userId)
    {
        $menu = new Menus();

        return $menu->parentMenuByUser($userId);
    }
}

if (! function_exists('menu_child_user')) {
    /**
     * @param int $userId
     * @param int $menuId
     * @return mixed
     */
    function menu_child_user(int $userId, int $menuId)
    {
        $menu = new Menus();

        return $menu->menuChildByParentId($userId, $menuId);
    }
}

if (! function_exists('user')) {

    /**
     * @return mixed
     * @throws \Exception
     */
    function user()
    {
        if (check()) {
            return $_SESSION['user'];
        }

        throw new Exception("El usuario no ha iniciado session");
    }
}

if (! function_exists('category_parent_id')) {

    /**
     * @return mixed
     * @throws \Exception
     */
    function category_parent_id($id = null)
    {
        $category = new Category;
        if ($id) {
            return $category->getCategoryByParent($id);
        }

        throw new Exception("El id de la categoria padre a buscar no puede ser vacio");
    }
}
if (! function_exists('validate')) {
    function validate($data, $notValidate = array()) {
        $error = array();
        if (COUNT($notValidate) > 0) {
            foreach ($notValidate as $val) {
                unset($data[$val]);
            }
        }
        foreach ($data as $key => $value) {
            if (empty($value)) {
                $error[] = "El campo ".ucwords(str_replace("_", " ", $key))." es obligatorio";
            }
        }
        return $error;
    }

}


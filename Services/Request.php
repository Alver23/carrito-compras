<?php
/**
 * Created by PhpStorm.
 * User: agrisales
 * Date: 31/08/17
 * Time: 11:18 AM
 */

class Request
{
    /**
     * Metodo para realizar redirecciones;
     * @param $route
     */
    public static function redirect($route)
    {
        header("Location: $route");
        exit();
    }
}
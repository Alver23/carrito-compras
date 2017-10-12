<?php

/**
 * Created by PhpStorm.
 * User: agrisales
 * Date: 31/08/17
 * Time: 11:01 AM
 */
class CheckAuth
{
    /**
     * Almacenamos la session del usuario
     *
     * @var
     */
    protected static $session;

    /**
     * CheckAuth constructor.
     */
    public function __construct()
    {
        self::$session = $_SESSION;
    }

    /**
     * Validamos si el usuario está logueado
     *
     * @return bool
     */
    public static function check()
    {
        if (! empty(self::$session) && !empty(self::$session['user'])) {
            return true;
        }

        return false;
    }
}
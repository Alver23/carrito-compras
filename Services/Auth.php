<?php
/**
 * Created by PhpStorm.
 * User: agrisales
 * Date: 31/08/17
 * Time: 09:55 AM
 */
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Models'.DIRECTORY_SEPARATOR.'Users.php';

class Auth
{
    /**
     * Variable para la instancia de users
     *
     * @var
     */
    protected $user;

    /**
     * Variable para almacenar los errores
     *
     * @var array
     */
    protected $errors = [];

    /**
     * Auth constructor. Instanciamos la clase Users
     */
    public function __construct()
    {
        $this->user = new Users();
    }

    /**
     * Metodo que valida que el usuario exista y que la contraeña coincida
     *
     * @param $email
     * @param $password
     * @return bool
     */
    public function login($email, $password)
    {
        $user = $this->user->getUserByEmail($email);
        if (empty($user)) {
            $this->errors[] = 'Email no existe';
        }
        if ($user->password !== $this->hash($password)) {
            $this->errors[] = 'Contraseña incorrecta';
        }
        if (! empty($this->errors) && count($this->errors) > 0) {
            return false;
        }
        $_SESSION['user'] = $user;

        return true;
    }

    /**
     * Obtenemos los errores ocurridos al intentar iniciar sesion
     *
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Metodo que nos encripta la contraseña en sha512, md5 es inseguro y no esta en uso
     *
     * @param $value
     * @return string
     */
    public function hash($value)
    {
        return hash('sha512', $value);
    }

    /**
     * Metodo que permite cerrar la sesion del usuario
     * @return bool
     */
    public function logout()
    {
        $_SESSION['user'] = null;
        session_destroy();
        return true;
    }
}
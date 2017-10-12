<?php
/**
 * Created by PhpStorm.
 * User: agrisales
 * Date: 31/08/17
 * Time: 07:32 AM
 */
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Config'.DIRECTORY_SEPARATOR.'Database.php';
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Services'.DIRECTORY_SEPARATOR.'Auth.php';

class Users
{
    /**
     * @var
     */
    protected $con;

    /**
     * Users constructor. Instanciamos la clase DataBase y obtenemos la conexion a la base de datos
     */
    public function __construct()
    {
        $this->con = new Database();
    }

    /**
     * Metodo para obtener los datos del usuario por email
     * @param $email
     * @return mixed
     */
    public function getUserByEmail($email)
    {
        $sql = ("SELECT * FROM usuarios WHERE email = '%s'");
        $tSql = sprintf($sql, $email);
        return $this->con->query($tSql, false);
    }

    public function save($data)
    {
        $auth = new Auth;
        $date = date('Y-m-d H:i');
        $sql = ("INSERT INTO `usuarios`(`nombres`, `email`, `password`, `created_at`, `updated_at`)
            VALUES ('%s', '%s', '%s', '%s', '%s')");
        $tSql = sprintf($sql, $data['nombres'], $data['email'], $auth->hash($data['password']), $date, $date);
        $this->con->query($tSql);
        return $this->getUserByEmail($data['email']);
    }
}
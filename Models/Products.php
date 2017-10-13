<?php
/**
 * Created by PhpStorm.
 * User: alver-grisales
 * Date: 12/10/17
 * Time: 10:57 PM
 */
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Config'.DIRECTORY_SEPARATOR.'Database.php';
class Products
{
    /**
     * @var
     */
    protected $con;

    /**
     * Documents constructor. Instanciamos la clase DataBase y obtenemos la conexion a la base de datos
     */
    public function __construct()
    {
        $this->con = new Database();
    }
    public function save($data)
    {
        $sql = ("INSERT INTO `productos`(`categoria_id`, `nombre`, `descripcion`, `precio`, `cantidad`) VALUES (%d, '%s', '%s', '%d', %d)");
        $tsql = sprintf($sql, $data["categoria_id"], $data["nombre"], $data["descripcion"], $data["precio"], $data["cantidad"]);
        $this->con->query($tsql);
        return $this->con->lastId("productos");
    }
}
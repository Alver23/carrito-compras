<?php
/**
 * Created by PhpStorm.
 * User: agrisales
 * Date: 6/09/17
 * Time: 04:34 PM
 */

require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Config'.DIRECTORY_SEPARATOR.'Database.php';

class Menus
{
    /**
     * @var
     */
    protected $con;

    /**
     * Menus constructor. Instanciamos la clase DataBase y obtenemos la conexion a la base de datos
     */
    public function __construct()
    {
        $this->con = new Database();
    }

    /**
     * Obtenemos todos los menus principales del sistema validando el usuario conectado
     *
     * @param int $userId
     * @return mixed
     */
    public function parentMenuByUser(int $userId)
    {
        $sql = ("SELECT men.id, men.nombre, men.url FROM menus men
                INNER JOIN menu_has_usuarios mus ON(mus.menu_id = men.id)
                WHERE mus.usuario_id = %d AND parent_menu_id IS NULL GROUP BY men.id  ORDER BY orden ASC");
        $tSql = sprintf($sql, $userId);

        return $this->con->query($tSql);
    }

    /**
     * Obtenemos todos los sub menus validando el usuario conectado
     *
     * @param int $userId
     * @param int $menuId
     * @return mixed
     */
    public function menuChildByParentId(int $userId, int $menuId)
    {
        $sql = ("SELECT men.id, men.nombre, men.url FROM menus men
                INNER JOIN menu_has_usuarios mus ON(mus.menu_id = men.id)
                WHERE mus.usuario_id = %d AND men.parent_menu_id = %d GROUP BY men.id  ORDER BY orden ASC");
        $tSql = sprintf($sql, $userId, $menuId);

        return $this->con->query($tSql);
    }
}
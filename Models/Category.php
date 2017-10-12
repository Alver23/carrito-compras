<?php

require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Config'.DIRECTORY_SEPARATOR.'Database.php';

class Category {
	/**
     * @var
     */
    protected $con;

    /**
     * Category constructor. Instanciamos la clase DataBase y obtenemos la conexion a la base de datos
     */
    public function __construct()
    {
        $this->con = new Database();
    }

    public function getCategoryByParent($categoryParentId)
    {
    	$sql = ("SELECT `id`, `nombre` FROM categorias WHERE `categoria_padre_id` = %d ORDER BY `nombre` ASC;");
        $tSql = sprintf($sql, $categoryParentId);

        return $this->con->query($tSql);
    }
}
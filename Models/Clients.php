<?php
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Config'.DIRECTORY_SEPARATOR.'Database.php';

class Clients {
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

    public function save($data)
    {
    	$date = date('Y-m-d H:s:i');
    	$sql = ("INSERT INTO `clientes`(`usuario_id`, `tipo_cliente_id`, `identificacion`,
    		`direccion`, `celular`, `telefono`, `created_at`, `updated_at`)
    		VALUES (%d, %d, %d, '%s', %d, %d, '%s', '%s') ");
    	$tSql = sprintf($sql, $data['user_id'], $data['tipo_cliente_id'], $data['identificacion'],
    		$data['direccion'], $data['celular'], $data['telefono'], $date, $date);
    	$this->con->query($tSql);
    }
}
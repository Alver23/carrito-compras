<?php
require_once __DIR__.DIRECTORY_SEPARATOR.'App.php';

class Database
{
    /**
     * Host de conexion
     *
     * @var
     */
    protected $host;

    /**
     * Driver de conexion
     *
     * @var
     */
    protected $driver;

    /**
     * Base de dato a conectar
     *
     * @var
     */
    protected $db;

    /**
     * Usuario de la base de datos
     *
     * @var
     */
    protected $user;

    /**
     * Contraseña de la base de datos
     *
     * @var
     */
    protected $pass;

    /**
     * Puerto de conexion
     *
     * @var
     */
    protected $port;

    /**
     * Datos de configuracion del programa
     *
     * @var string
     */
    protected $app;

    /**
     * Variable con la conexion a la base de datos
     *
     * @var
     */
    protected $con;

    /**
     * Variable para saber si hay una transaccion corriendo
     * @var bool
     */
    private $transactionStarted = false;//Prevent nested transaction, mysql don't support it.

    /**
     * Database constructor. Inicializa los parametros de conexion
     *
     * @throws \exception
     */
    public function __construct()
    {
        $app = new App();
        $this->app = $app->getConfig();
        $this->driver = $this->app['DB_CONNECTION'];
        $this->host = $this->app['DB_HOST'];
        $this->db = $this->app['DB_DATABASE'];
        $this->port = $this->app['DB_PORT'];
        $this->user = $this->app['DB_USERNAME'];
        $this->pass = $this->app['DB_PASSWORD'];
        $this->connect();
    }

    /**
     * Metodo que realiza la conexion a la base de datos
     *
     * @return \PDO
     */
    private function connect()
    {
        $DSN = "$this->driver:host=$this->host;port=$this->port;dbname=$this->db";
        try {
            return $this->con = new PDO($DSN, $this->user, $this->pass);
        } catch (PDOException $e) {
            print "Error! $e->getMessage() <br>";
            die();
        }
    }

    /**
     * Metodo publico que permite ejecutar los query
     *
     * @param $SQL
     * @param bool $all
     * @return mixed
     */
    public function query($SQL, $all = true)
    {  //funcion principal, ejecuta todas las consultas

        if ($statement = $this->con->prepare($SQL)) {  //prepara la consulta
            try {
                if (! $statement->execute()) { //si no se ejecuta la consulta...
                    $statement->rollBack();
                }
                if ($all) {
                    $resultado = $statement->fetchAll(PDO::FETCH_OBJ); //si es una consulta que devuelve valores los guarda en un objeto.
                } else {
                    $resultado = $statement->fetch(PDO::FETCH_OBJ); //si es una consulta que devuelve valores los guarda en un objeto.
                }
                $statement->closeCursor();
            } catch (PDOException $e) {
                echo "Error de ejecución: \n";
                die($e->getMessage());
            }
        }

        return $resultado;
        $this->con = null; //cerramos la conexión
    }
    public function lastId($table)
    {
        if ($this->transactionStarted === TRUE) {
            return $this->link->lastInsertId(); //only for transactions
        }
        if (!empty($table)) {
            $SQL = "SELECT LAST_INSERT_ID() AS ID FROM $table ORDER BY ID DESC LIMIT 1";
            $rst = $this->query($SQL);
            return $rst[0]->ID;
        }
    }
}
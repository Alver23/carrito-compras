<?php
/**
 * Created by PhpStorm.
 * User: agrisales
 * Date: 31/08/17
 * Time: 10:43 AM
 */

class App
{
    protected $config;

    /**
     * App constructor.
     *
     * @throws \exception
     */
    public function __construct()
    {
        $this->file = $file = dirname(__FILE__).DIRECTORY_SEPARATOR.'.env';
        if (file_exists($file) && is_readable($file)) {
            if (! $this->config = parse_ini_file($file, true)) {
                throw new exception ('No se puede abrir el archivo '.$file.'.');
            }

            return $this->getConfig();
        } else {
            throw new Exception("No se puede encontrar el archivo en la ruta especificada, ruta: $this->file");
        }
    }

    /**
     * Obtenemos el host de la aplicacion
     *
     * @return string
     */
    public function getUrlApp()
    {
        return $this->config['APP_URL'] ?? 'http://127.0.0.1/carrito_compras';
    }

    /**
     * Obtenemos la configuracion de la aplicacion
     *
     * @return array|bool
     */
    public function getConfig()
    {
        return $this->config;
    }
}
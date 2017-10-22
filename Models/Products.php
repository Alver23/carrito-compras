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
        //$this->con->begin();
        $this->con->query($tsql);
        //$this->con->commit();
        return $this->con->lastId("productos");
    }

    public function saveProductHasImages($productId, $imageId)
    {
        $sql = ("INSERT INTO `productos_has_imagenes`(`producto_id`, `documento_id`) VALUES (%d, %d)");
        $tsql = sprintf($sql, $productId, $imageId);
        $this->con->query($tsql);
    }

    public function allProducts()
    {
        $sql = ("SELECT pro.id, cat.nombre AS categoria, pro.nombre,pro.precio, pro.descripcion, doc.ruta, doc.nombre AS document_name
                FROM `productos` pro
                INNER JOIN categorias cat ON(cat.id = pro.categoria_id)
                INNER JOIN (SELECT * FROM productos_has_imagenes) pi ON (pi.producto_id = pro.id)
                INNER JOIN documentos doc ON(doc.id = pi.documento_id)
                GROUP BY pro.id");
        return $this->con->query($sql);
    }
}
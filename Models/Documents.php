<?php
require_once __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'Config'.DIRECTORY_SEPARATOR.'Database.php';
class Documents
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

	public function uploadMultiple($data = [], $allowedExts = [], $rutaServer, $rutaBD)
    {
		$error = [];
		foreach ($data['tmp_name'] as $key => $tmp_name) {
			$file_name = $data['name'][$key];
			$file_size = $data['size'][$key];
			$file_tmp = $data['tmp_name'][$key];
			$file_type= $data['type'][$key];
			$temp = explode(".", $data['name'][$key]);
			$extension = end($temp);
			if ($file_size > 2097152) {
				$error[] = "File size must be less than 2 MB";
			}
			if (!in_array($extension, $allowedExts)) {
				$error[] = 'Invalid file format '.$file_name;
			}
			if(is_dir($rutaServer) === false){
	   			mkdir("$rutaServer", 0777);// Create directory if it does not exist
			}
			$namefile = uniqid(str_replace(' ', '', $temp[0])).".".$extension;
			move_uploaded_file($file_tmp,"$rutaServer".$namefile);
            $filename = $rutaBD.$namefile;
            if (!empty($name)) {
                $documentName = $name;
            }else{
                $documentName = $temp[0];
            }

            $idDocument[] = $this->save([
                'name' => $documentName,
                'fileName' => $filename,
                'type' => $extension,
                'size' => $file_size,
            ]);
		}
        return [
            "idDocument" => $idDocument,
            "errores" => $error,
        ];
	}

	public function upload($data, $allowedExts = [], $rutaServer, $rutaBD, $name = ''){
		$idDocument = "";
		$error = "";
		$file_name = $data['name'];
		$file_size = $data['size'];
		$file_tmp = $data['tmp_name'];
		$file_type= $data['type'];
		$temp = explode(".", $data['name']);
		$extension = end($temp);
		if ($file_size > 2097152) {
			$error[] = "File size must be less than 2 MB";
		}
		if (!in_array($extension, $allowedExts)) {
			$error = "Invalid file format $file_name";
			return [
                "idDocument" => $idDocument,
                "errores" => $error
            ];
		}
		if(is_dir($rutaServer) === false){
   			mkdir("$rutaServer", 0777);// Create directory if it does not exist
		}
		if (!empty($error)) {
            return [
                "idDocument" => $idDocument,
                "errores" => $error
            ];
		}
		$namefile = uniqid(str_replace(' ', '', sanear_string($temp[0]))).".".$extension;
		move_uploaded_file($file_tmp,"$rutaServer".$namefile);
		$filename = $rutaBD.$namefile;
		if (!empty($name)) {
            $documentName = $name;
		}else{
            $documentName = $temp[0];
		}
        $idDocument = $this->save([
		    'name' => $documentName,
            'fileName' => $filename,
            'type' => $extension,
            'size' => $file_size,
        ]);
        return [
            "idDocument" => $idDocument,
            "errores" => "",
        ];
	}

	private function save($data)
    {
        $sql = ("INSERT INTO `documentos`(`nombre`, `ruta`, `tipo`, `tamano`) VALUES ('%s', '%s', '%s', '%s')");
        $tSql = sprintf($sql, $data['name'], $data['fileName'], $data['type'], $data['size']);
        $this->con->query($tSql);
        return $this->con->lastId("documentos");
    }
	public function DeleteFolder($ruta)
    {
		if (empty($ruta)) {
			die("No se puede eliminar el folder porque no se enviaron los parametros correctos");
		}
		if (is_dir($ruta) === true) {
			if(!$dh = @opendir($ruta)) return;
		    while (false !== ($current = readdir($dh))) {
		        if($current != '.' && $current != '..') {
		            //echo 'Se ha borrado el archivo '.$ruta.'/'.$current.'<br/>';
		            if (!@unlink($ruta.'/'.$current)) 
		                $this->DeleteFolder($ruta.'/'.$current);
		        }       
		    }
		    closedir($dh);
		    //echo 'Se ha borrado el directorio '.$ruta.'<br/>';
		    @rmdir($ruta);
		}
		//return $ruta.$namefolder;
	}
	public function Deleteimg($ruta)
    {
		if (empty($ruta)) {
			die("No se puede eliminar el item del servidor porque no se enviaron los parametros correctos");
		}
		$do = false;
		$do = unlink($ruta);
		return $do;
	}
	public function VerificFolder($ruta)
    {
		if (empty($ruta)) {
			die("La ruta se encuentra vacia");
		}
		if (file_exists($ruta)) {
			return true;
		}else{
			$this->CreateFolder($ruta);
			return true;
		}
		return false;
	}
	public function CreateFolder($ruta)
    {
		mkdir($ruta, 0777);
		return true;
	}
}
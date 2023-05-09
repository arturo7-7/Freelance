
<?php
require 'conpdo.php';

class Insert{
    private $conexion;
    private $conn;

    public function __construct() {
        $this->conexion = new Conexion();
        $this->conexion->conectar();
        $this->conn = $this->conexion->getConexion();
    }

    public function obtenerDatos() {
        $datos = array();
        if(isset($_POST['nombre'])) {
            $datos['nombre'] = $_POST['nombre'];
        }
        if(isset($_POST['telefono'])) {
            $datos['telefono'] = $_POST['telefono'];
        }
        if(isset($_POST['correo'])) {
            $datos['correo'] = $_POST['correo'];
        }
        if(isset($_POST['mensaje'])) {
            $datos['mensaje'] = $_POST['mensaje'];
        }
        return $datos;
    }

    public function insertarDatos($datos) {
        $stmt = $this->conn->prepare("INSERT INTO formulario (nombre, telefono, correo, mensaje) VALUES (:nombre, :telefono, :correo, :mensaje)");
        $stmt->bindParam(':nombre', $datos['nombre']);
        $stmt->bindParam(':telefono', $datos['telefono']);
        $stmt->bindParam(':correo', $datos['correo']);
        $stmt->bindParam(':mensaje', $datos['mensaje']);
        $stmt->execute();
        return $stmt->rowCount();
    }
}

$insert = new Insert();
$datos = $insert->obtenerDatos();
if(!empty($datos)) {
    $resultado = $insert->insertarDatos($datos);
    if($resultado > 0) {
        echo "El registro se insertó correctamente";
    } else {
        echo "Ocurrió un error al insertar el registro";
    }
}
?>







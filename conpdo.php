<?php


class conexion {
    private $username = "root";
    private $password = "papas123";
    private $conn;
    
    function conectar(){
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=freelance", $this->username, $this->password);
            // Establece el modo de error de PDO en excepciones
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexión exitosa";
        }
        catch(PDOException $error) {
            echo "Conexión fallida: " . $error->getMessage();
        }
    }
    
    function getConexion() {
        return $this->conn;
    }
}
?>




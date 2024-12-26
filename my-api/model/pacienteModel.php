<?php

require_once "mainModel.php";

class pacienteModel extends mainModel
{
    // Listar todas las atenciones (index)
    public static function index()
    {
        $conn = self::connect();
        $query = "SELECT * FROM usuarios";
        $stmt = $conn->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Crear una nueva atención (create)
    public static function create($datos)
    {
        $conn = self::connect();
        $sql = $conn->prepare('INSERT INTO usuarios (matricula , nombre, unidadID , rollID, contra) VALUES (:matricula, :nombre, :unidadID, :rollID)');
        $sql->bindParam(":matricula", $datos['matricula']);
        $sql->bindParam(":nombre", $datos['nombre']);
        $sql->bindParam(":unidadID", $datos['unidadID']);
        $sql->bindParam(":rollID", $datos['rollID']);
        $sql->bindParam(":contra", $datos['contra']);
        $sql->execute();
        return $conn->lastInsertId();
    }

    // Eliminar una atención (delete)
    public static function delete($id)
    {
        $conn = self::connect();
        $sql = $conn->prepare("DELETE FROM usuarios WHERE id = :id");
        $sql->bindParam(":id", $id);
        $result = $sql->execute();
        return $result;
    }
}
?>
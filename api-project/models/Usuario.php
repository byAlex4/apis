<?php
require_once './core/Database.php';

class Usuario
{
    public static function getAll()
    {
        $db = Database::connect();
        $query = $db->query('SELECT * FROM usuarios');
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id)
    {
        $db = Database::connect();
        $stmt = $db->prepare('SELECT * FROM usuarios WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $db = Database::connect();
        $stmt = $db->prepare(query: 'INSERT INTO usuarios (matricula , nombre, unidadID , rollID, contra) VALUES (?, ?, ?, ?, ?)');
        return $stmt->execute([$data['matricula'], $data['nombre'], $data['unidadID'], $data['rollID'], $data['contra']]);
    }

    public static function update($id, $data)
    {
        $db = Database::connect();
        $stmt = $db->prepare('UPDATE usuarios SET matricula = ?, nombre = ?, unidadID = ?, rollID = ?, contra = ? WHERE id = ?');
        return $stmt->execute([$data['matricula'], $data['nombre'], $data['unidadID'], $data['rollID'], $data['contra'], $id]);
    }

    public static function delete($id)
    {
        $db = Database::connect();
        $stmt = $db->prepare('DELETE FROM usuarios WHERE id = ?');
        return $stmt->execute([$id]);
    }
}

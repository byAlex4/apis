<?php
require_once './models/Usuario.php';

class UsuarioController
{
    public function index()
    {
        $usuarios = Usuario::getAll();
        if ($usuarios) {
            echo json_encode($usuarios);
        } else {
            echo json_encode(['message' => 'No users found']);
        }
    }

    public function store()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $result = Usuario::create($data);
        echo json_encode($result);
    }

    public function show($id)
    {
        $usuarios = Usuario::getById($id);
        echo json_encode($usuarios);
    }

    public function update($id)
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $result = Usuario::update($id, $data);
        echo json_encode($result);
    }

    public function destroy($id)
    {
        $result = Usuario::delete($id);
        echo json_encode($result);
    }
}

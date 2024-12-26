<?php

require_once './model/pacienteModel.php';

class pacienteController
{
    // Listar todas las atenciones
    public function index()
    {
        return pacienteModel::index();
    }

    // Crear una nueva atención
    public function create($datos)
    {
        return pacienteModel::create($datos);
    }

    // Eliminar una atención
    public function delete($id)
    {
        return pacienteModel::delete($id);
    }

    // Registrar un nuevo usuario
    public function register($datos)
    {
        return pacienteModel::register($datos);
    }

    // Iniciar sesión
    public function login($matricula, $contra)
    {
        return pacienteModel::login($matricula, $contra);
    }
}
?>
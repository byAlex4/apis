<?php
// Configurar los encabezados CORS
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Authorization');
header('Content-Type: application/json');

include_once('../core/initialize.php');

$paciente = new Paciente($db);
$result = $paciente->read();

$num = $result->rowCount();

if  ($num > 0){
    $pac_arr = array();
    $pac_arr['data'] = array();
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $pac_item = array(
            'id' => $id,
            'matricula' => $matricula,
            'nombre' => $nombre,
            'unidadID' => $unidadID,
            'rollID' => $rollID,
            'contra' => $contra,
            'created_at' => $created_at,
            'updated_at' => $updated_at,
        );
        array_push($pac_arr['data'], $pac_item);
    }
    echo json_encode($pac_arr);
} else{
    echo json_encode(array('message' => 'Paciente no encontrado'));
}
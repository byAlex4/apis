<?php

class Paciente
{
    private $conn;
    private $table = 'usuarios';

    //propiedades de la tabla
    public $id;
    public $matricula;
    public $nombre;
    public $unidadID;
    public $rollID;
    public $contra;
    public $created_at;
    public $updated_at;

    //constructor
    public function __construct($db){
        $this->conn = $db;
    }

    public function read(){
        $query = 'SELECT * FROM ' . $this->table;

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function create(){
        $query = 'INSERT INTO ' . $this->table . 'SET  
        matricula = :matricula,
        nombre = :nombre,
        unidadID = :unidadID,
        rollID = :rollID,
        contra = :contra,
        ';

        $stmt = $this->conn->prepare($query);
        $this->matricula = htmlspecialchars(strip_tags($this->matricula));
        $this->nombre = htmlspecialchars(strip_tags($this->nombre));
        $this->unidadID = htmlspecialchars(strip_tags($this->unidadID));
        $this->rollID = htmlspecialchars(strip_tags($this->rollID));
        $this->contra = htmlspecialchars(strip_tags($this->contra));

        $stmt->bindParam(':matricula', $this->matricula);
        $stmt->bindParam(':nombre', $this->nombre);
        $stmt->bindParam(':unidadID', $this->unidadID);
        $stmt->bindParam(':rollID', $this->rollID);
        $stmt->bindParam(':contra', $this->contra);

        if($stmt->execute()){
            return true;
        }
        printf("ERROR %s. \n", $stmt->error);
        return false;
    }
}

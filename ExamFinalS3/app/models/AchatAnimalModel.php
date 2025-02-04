<?php

namespace app\models;

use Exception;
use Flight;

class AchatAnimalModel {

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function insertAchatAnimal($animal,$date,$prix) {
        $sql="INSERT INTO farm_achat_animal(id_animal,date_achat,prix) VALUES (?,?,?)";
        $stmt=$this->db->prepare($sql);
        $stmt->execute([$animal,$date,$prix]);
    }
    
}
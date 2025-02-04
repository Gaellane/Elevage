<?php

namespace app\models;
use Flight;

class FinanceModel {

    private $db;

    public function __construct($db)
    {
       $this->db = $db;
    }

    public function insertFinance($type,$montant,$description){
        $sql = "INSERT INTO farm_finance (id_mouvement,argent,description) VALUES (? , ? , ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$type,$montant,$description]);
    }
    public function getTypeMouvement(){
        $sql = "SELECT * FROM farm_mouvement ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
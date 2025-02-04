<?php

namespace app\Models;
use Flight;

class ResetModel {
    private $db;
    function __construct($db){
        $this->db = $db;
    }
    public function reset(){
        $this->resetVente();
        $this->resetAchatAlimentation();
        $this->resetAchatAnimal();
        $this->resetFinance();
        $this->resetAnimal();
    }

    private function resetVente(){
        $sql = "DELETE FROM farm_vente_animal";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }
    private function resetAchatAlimentation(){
        $sql = "DELETE FROM farm_achat_alimentation";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }
    private function resetAchatAnimal(){
        $sql = "DELETE FROM farm_achat_animal";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
    }

    private function resetFinance(){
        $sql = "DELETE FROM farm_finance";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();    
    }

    private function resetAnimal(){
        $sql = "DELETE FROM farm_animal";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();        
    }

}

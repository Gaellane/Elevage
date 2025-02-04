<?php

namespace app\models;

use Exception;
use Flight;
use app\Object\Alimentation;
use app\Object\Categorie;
use app\models\CategorieModel;


class AlimentationModel {

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function insertAlimentation($nom,$categorie,$gain) {
        $sql="INSERT INTO farm_alimentation(nom_alimentation,id_categorie,gain_poids) VALUES (?,?,?)";
        $stmt=$this->db->prepare($sql);
        $stmt->execute([$nom,$categorie,$gain]);
    }

    public function getAll_Alimentation() {
        $sql="SELECT*FROM v_alimentation_categorie ";
        $stmt=$this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function deleteAlimentation($id) {
        $sql="DELETE FROM farm_alimentation WHERE id_alimentation=$id";
        $stmt=$this->db->prepare($sql);
        $stmt->execute([$id]);
    }

    public function updateAlimentation($nom,$categorie,$gain,$id) {
        $sql="UPDATE farm_alimentation SET nom_alimentation=? , id_categorie=?, gain_poids=? WHERE id_alimentation=?";
        $stmt=$this->db->prepare($sql);
        $stmt->execute([$nom,$categorie,$gain,$id]);
    }

    public function getLastId() {
        $sql="SELECT MAX(id_alimentation) as id_alimentation FROM farm_alimentation";
        $stmt=$this->db->prepare($sql);
        $stmt->execute();
        $retour=$stmt->fetchAll();
        foreach ($retour as $r) {
            return $r['id_alimentation'];
        }
    }

    public function getById($id) {
        $sql="SELECT*FROM v_alimentation_categorie WHERE id_alimentation=?";
        $stmt=$this->db->prepare($sql);
        $stmt->execute([$id]);
        $retour=$stmt->fetchAll();
        foreach ($retour as $r) {
            return $r;
        }
    }

    public function getByIdObject($id){
        $alim = $this->getById($id);
        $catModel = new CategorieModel(Flight::database());
        $categorie = $catModel->getById($alim['id_categorie']);
        return new Alimentation($alim['id_alimentation'],$alim['nom_alimentation'],0,$categorie , $alim['gain_poids']);
    }

    public function getAllObject(){
        $sql = "select id_alimentation from farm_alimentation";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $array = array();
        foreach ($result as $r) {
            $array[] = $this->getByIdObject($r['id_alimentation']);
        }
        return $array;
    }
}
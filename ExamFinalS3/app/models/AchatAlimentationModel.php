<?php

namespace app\models;

use Exception;
use Flight;

class AchatAlimentationModel {

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAll_Achat_details(){
        try {
            $query = "SELECT * FROM view_achat_alimentation_details";
            $stmt = $this->db->query($query);
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;

        } catch (\Exception $e) {
            return ['message' => 'Error on the recuperation of achat: ' . $e->getMessage()];
        }
    }

    public function insertAchatAlimentation($data) {
        $sql="INSERT INTO farm_achat_alimentation(id_alimentation,prix,quantite,date_achat) VALUES (?,?,?,?)";
        $stmt=$this->db->prepare($sql);
        $stmt->execute([$data['alimentation'],$data['prix'],$data['quantite'],$data['date']]);
    }


    public function searchByCriteria($criteria)
    {
        try {
            $query = "SELECT * FROM view_achat_alimentation_details WHERE 1=1";
            $params = [];

            if (!empty($criteria['id_alimentation'])) {
                $query .= " AND id_alimentation = :id_alimentation";
                $params[':id_alimentation'] = $criteria['id_alimentation'];
            }
            if (!empty($criteria['id_categorie'])) {
                $query .= " AND id_categorie = :id_categorie";
                $params[':id_categorie'] = $criteria['id_categorie'];
            }
            if (!empty($criteria['min_price'])) {
                $query .= " AND prix >= :min_price";
                $params[':min_price'] = $criteria['min_price'];
            }
            if (!empty($criteria['max_price'])) {
                $query .= " AND prix <= :max_price";
                $params[':max_price'] = $criteria['max_price'];
            }
            if (!empty($criteria['date_min'])) {
                $query .= " AND date_achat >= :date_min";
                $params[':date_min'] = $criteria['date_min'];
            }
            if (!empty($criteria['date_max'])) {
                $query .= " AND date_achat <= :date_max";
                $params[':date_max'] = $criteria['date_max'];
            }

            $stmt = $this->db->prepare($query);
            foreach ($params as $key => $value) {
                $paramType = is_int($value) ? \PDO::PARAM_INT : \PDO::PARAM_STR;
                $stmt->bindValue($key, $value, $paramType);
            }
            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } catch (\Exception $e) {
            return ['message' => 'Error on searchByCriteria: ' . $e->getMessage()];
        }
    }

}
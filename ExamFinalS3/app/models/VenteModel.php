<?php

namespace app\models;

class VenteModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAll_Vente()
    {
        try {
            $query = "SELECT * FROM farm_vente_animal";
            $stmt = $this->db->query($query);
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\Exception $e) {
            return ['message' => 'Error on the recuperation of vente: ' . $e->getMessage()];
        }
    }

    public function getVente_byId($id){
        try {
            $id = (string)(int)$id;

            $query = 'SELECT * FROM farm_vente_animal WHERE id_vente = ?';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(1, $id, \PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\Exception $e) {
            return ['message' => 'Error on the recuperation of vente: ' . $e->getMessage()];
        }
    }

    public function insertVente($data)
    {
        try {
            $query = "INSERT INTO farm_vente_animal (id_animal, date_vente)
                       VALUES (:id_animal, :date_vente)";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':id_animal', $data['id_animal'], \PDO::PARAM_STR);
            $stmt->bindValue(':date_vente', $data['date_vente']);
            $stmt->execute();
            return $this->db->lastInsertId();
            
        } catch (\Exception $e) {
            return ['message' => 'Error on inserting vente: ' . $e->getMessage()];
        }
    }

    public function searchByCriteria($criteria)
    {
        try {
            $query = "SELECT * FROM farm_vente_animal WHERE 1=1";
            $params = [];

            if (!empty($criteria['id_animal'])) {
                $query .= " AND id_animal = :id_animal";
                $params[':id_animal'] = $criteria['id_animal'];
            }
            if (!empty($criteria['date_vente_min'])) {
                $query .= " AND date_vente >= :date_vente_min";
                $params[':date_vente_min'] = $criteria['date_vente_min'];
            }
            if (!empty($criteria['date_vente_max'])) {
                $query .= " AND date_vente <= :date_vente_max";
                $params[':date_vente_max'] = $criteria['date_vente_max'];
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

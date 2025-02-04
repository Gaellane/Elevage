<?php

namespace app\models;

use app\Object\Categorie;
class CategorieModel
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAll_Categorie()
    {
        try {
            $query = "SELECT * FROM farm_categorie_animal";
            $stmt = $this->db->query($query);
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\Exception $e) {
            return ['message' => 'Error on the recuperation of Categorie: ' . $e->getMessage()];
        }
    }

    public function getCategorie_byId($id){
        try {
            $id = (string)(int)$id;

            $query = 'SELECT * FROM farm_categorie_animal WHERE id_categorie = ?';
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(1, $id, \PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\Exception $e) {
            return ['message' => 'Error on the recuperation of variete: ' . $e->getMessage()];
        }
    }
    public function getById($id){
        $cat = $this->getCategorie_byId($id);
        return new Categorie($cat['id_categorie'], $cat['nom_categorie'] , $cat['poids_max'] , $cat['j_sans_nourriture'] ,$cat['perte_poids'],$cat['poids_min_vente'],$cat['quota_journalier']);
    }

    public function insertCategorie($data)
    {
        try {
            $query = "INSERT INTO farm_categorie_animal (nom_categorie, poids_min_vente, prix_vente_kg, poids_max, j_sans_nourriture, perte_poids)
                       VALUES (:nom_categorie, :poids_min_vente, :prix_vente_kg, :poids_max, :j_sans_nourriture, :perte_poids)";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':nom_categorie', $data['nom_categorie'], \PDO::PARAM_STR);
            $stmt->bindValue(':poids_min_vente', $data['poids_min_vente']);
            $stmt->bindValue(':prix_vente_kg', $data['prix_vente_kg']);
            $stmt->bindValue(':poids_max', $data['poids_max']);
            $stmt->bindValue(':j_sans_nourriture', $data['j_sans_nourriture']);
            $stmt->bindValue(':perte_poids', $data['perte_poids']);
            $stmt->execute();
            return $this->db->lastInsertId();
        } catch (\Exception $e) {
            return ['message' => 'Error on inserting variete: ' . $e->getMessage()];
        }
    }

    public function updateCategorie($id, $data)
    {
        $sql = 'UPDATE farm_categorie_animal set nom_categorie = ?, poids_min_vente = ? , prix_vente_kg = ?, poids_max = ? , j_sans_nourriture = ? , perte_poids = ? where id_categorie = ? ';
        $stmt = $this->db->prepare($sql);
        $stmt->execute( [$data['nom_categorie']  , $data['poids_min_vente'] , $data['prix_vente_kg'] , $data['poids_max'] , $data['j_sans_nourriture'] , $data['perte_poids'] , $id ]);
    }

    public function deleteCategorie($id)
    {
        $id = (string)(int)$id;
        try {
            $query = "DELETE FROM farm_categorie_animal WHERE id_categorie = ? ";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(1, $id, \PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (\Exception $e) {
            return ['message' => 'Error on deleting variete: ' . $e->getMessage()];
        }
    }
}

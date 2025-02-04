<?php

namespace app\models;

class Variete
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * Récupère toutes les variétés.
     */
    public function getAll_Variete()
    {
        try {
            $query = "SELECT * FROM variete_the";
            $stmt = $this->db->query($query);
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\Exception $e) {
            return ['message' => 'Error on the recuperation of variete: ' . $e->getMessage()];
        }
    }

    /**
     * Récupère une variété par son ID.
     */
    public function getVariete_byId($id){
        try {
            // Ensure that the id is a valid integer and cast it to string for binding
            $id = (string)(int)$id;

            $query = 'SELECT * FROM variete_the WHERE id_variete = ?';
            $stmt = $this->db->prepare($query);
            // Here, even though we use PDO::PARAM_INT, the value is a string;
            // alternatively, you can switch to PDO::PARAM_STR if needed.
            $stmt->bindValue(1, $id, \PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\Exception $e) {
            return ['message' => 'Error on the recuperation of variete: ' . $e->getMessage()];
        }
    }



    /**
     * Insère une nouvelle variété.
     *
     * @param array $data Associatif contenant :
     *                    - nom_variete
     *                    - occupation_surface
     *                    - rendement_par_pied
     *                    - prix_unitaire
     * @return mixed L'ID inséré ou un tableau avec un message d'erreur.
     */
    public function insertVariete($data)
    {
        try {
            $query = "INSERT INTO variete_the (nom_variete, occupation_surface, rendement_par_pied, prix_unitaire)
                      VALUES (:nom_variete, :occupation_surface, :rendement_par_pied, :prix_unitaire)";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':nom_variete', $data['nom_variete'], \PDO::PARAM_STR);
            $stmt->bindValue(':occupation_surface', $data['occupation_surface']);
            $stmt->bindValue(':rendement_par_pied', $data['rendement_par_pied']);
            $stmt->bindValue(':prix_unitaire', $data['prix_unitaire']);
            $stmt->execute();
            return $this->db->lastInsertId();
        } catch (\Exception $e) {
            return ['message' => 'Error on inserting variete: ' . $e->getMessage()];
        }
    }

    /**
     * Met à jour une variété existante.
     *
     * @param int   $id   ID de la variété à mettre à jour.
     * @param array $data Associatif contenant les champs à mettre à jour, par exemple :
     *                    - nom_variete
     *                    - occupation_surface
     *                    - rendement_par_pied
     *                    - prix_unitaire
     * @return mixed Nombre de lignes affectées ou un tableau avec un message d'erreur.
     */
    public function updateVariete($id, $data)
    {
        $id = (string)(int)$id;
        try {
            $query = "UPDATE variete_the 
                      SET nom_variete = :nom_variete, 
                          occupation_surface = :occupation_surface, 
                          rendement_par_pied = :rendement_par_pied, 
                          prix_unitaire = :prix_unitaire
                      WHERE id_variete = :id_variete";
            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':nom_variete', $data['nom_variete'], \PDO::PARAM_STR);
            $stmt->bindValue(':occupation_surface', $data['occupation_surface']);
            $stmt->bindValue(':rendement_par_pied', $data['rendement_par_pied']);
            $stmt->bindValue(':prix_unitaire', $data['prix_unitaire']);
            $stmt->bindValue(':id_variete', $id, \PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (\Exception $e) {
            return ['message' => 'Error on updating variete: ' . $e->getMessage()];
        }
    }

    /**
     * Supprime une variété par son ID.
     *
     * @param int $id ID de la variété à supprimer.
     * @return mixed Nombre de lignes affectées ou un tableau avec un message d'erreur.
     */
    public function deleteVariete($id)
    {
        try {
            $query = "DELETE FROM variete_the WHERE id_variete = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(1, $id, \PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->rowCount();
        } catch (\Exception $e) {
            return ['message' => 'Error on deleting variete: ' . $e->getMessage()];
        }
    }

    /**
     * Recherche des variétés en fonction de critères donnés.
     *
     * Les critères possibles (dans le tableau associatif $criteria) sont :
     * - nom : recherche sur le nom de la variété (recherche partielle)
     * - min_surface : surface occupée minimale
     * - max_surface : surface occupée maximale
     * - min_price : prix unitaire minimal
     * - max_price : prix unitaire maximal
     *
     * @param array $criteria
     * @return mixed Tableau des variétés correspondant aux critères ou un tableau avec un message d'erreur.
     */
    public function searchByCriteria($criteria)
    {
        try {
            $query = "SELECT * FROM variete_the WHERE 1=1";
            $params = [];

            if (!empty($criteria['nom'])) {
                $query .= " AND nom_variete LIKE :nom";
                $params[':nom'] = '%' . $criteria['nom'] . '%';
            }
            if (!empty($criteria['min_surface'])) {
                $query .= " AND occupation_surface >= :min_surface";
                $params[':min_surface'] = $criteria['min_surface'];
            }
            if (!empty($criteria['max_surface'])) {
                $query .= " AND occupation_surface <= :max_surface";
                $params[':max_surface'] = $criteria['max_surface'];
            }
            if (!empty($criteria['min_price'])) {
                $query .= " AND prix_unitaire >= :min_price";
                $params[':min_price'] = $criteria['min_price'];
            }
            if (!empty($criteria['max_price'])) {
                $query .= " AND prix_unitaire <= :max_price";
                $params[':max_price'] = $criteria['max_price'];
            }

            $stmt = $this->db->prepare($query);
            foreach ($params as $key => $value) {
                // Détermine le type de paramètre selon la valeur.
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

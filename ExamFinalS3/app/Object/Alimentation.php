<?php
namespace app\Object;
use app\Object\Categorie;
use Flight;

class Alimentation {
    public $id;
    public $nom;
    public $qte;
    public $categorie;
    public $gain_poids;

    public function __construct($id,$nom,$qte,$categorie,$gain_poids){
        $this->id=$id;
        $this->nom=$nom;
        $this->qte=$qte;
        $this->categorie=$categorie;
        $this->gain_poids=$gain_poids;
    }

    public function updateQte($date){
        $sql = "SELECT id_alimentation ,sum(quantite) as quantite FROM farm_achat_alimentation WHERE id_alimentation = ? AND date(date_achat) = ? GROUP BY id_alimentation" ;
        $stmt = Flight::database()->prepare($sql);
        $stmt->execute([$this->id , $date]);
        $rs = $stmt->fetchAll();
        foreach ($rs as $r) {
            $this->qte += $r['quantite'];
        }
    }
    public function nourrit(){
        $this->qte-=$this->categorie->quota_journalier;
    }
    public function usable(){
        return $this->qte > $this->categorie->quota_journalier;
    }

}
<?php
namespace app\Object;
use Flight;

class Categorie {
    public $id;
    public $nom;
    public $poids_max;
    public $j_sans_nourriture;
    public $perte_poids;
    public $poids_min_vente;

    public $quota_journalier;
    public function __construct($id , $nom , $poids_max , $j_sans_nourriture , $perte_poids, $poids_min_vente ,$quota_journalier){
        $this->id=$id;
        $this->nom=$nom;
        $this->poids_max=$poids_max;
        $this->j_sans_nourriture=$j_sans_nourriture;
        $this->perte_poids=$perte_poids;
        $this->poids_min_vente=$poids_min_vente;
        $this->quota_journalier=$quota_journalier;

    }

    


}
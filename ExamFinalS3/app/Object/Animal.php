<?php

namespace app\Object;
use Flight;
use app\Object\Categorie;
use app\Object\Alimentation;


class Animal{
    public $id;
    public $nom;

    public $image;
    public $poids;
    public $isAlive;
    public $JourSansManger;
    public $categorie;
    public $isVendu;
    public $auto_vente;
    public $date_vente;
    public $date_mort;
    public function __construct($id , $nom ,$image , $poids ,$categorie,$date_mort,$auto_vente,$date_vente ){
        $this->id=$id;
        $this->nom=$nom;
        $this->poids=$poids;
        $this->isAlive=true;
        $this->JourSansManger=0;
        $this->categorie = $categorie;
        $this->date_mort=$date_mort;
        $this->auto_vente=$auto_vente;
        $this->date_vente=$date_vente;
        $this->isVendu=false;
        $this->image=$image;
    }

    public function nourrir($alimentation,$date){
        $alimentation->nourrit();
        $this->poids*=(1+($alimentation->gain_poids/100));
        $this->JourSansManger=0;
        if($this->poids > $this->categorie->poids_max ){
            $this->poids=$this->categorie->poids_max;
        }
        if($this->auto_vente){
            if($this->poids>=$this->categorie->poids_min_vente){
                $this->isVendu=true;
                $this->date_vente=$date;
            }
        }
    }


    public function notNourrit(){
        $this->JourSansManger++;
        $this->isAlive = ($this->JourSansManger < $this->categorie->j_sans_nourriture);
        $this->poids=$this->poids*(1-($this->categorie->perte_poids/100));
    }
    
    

}
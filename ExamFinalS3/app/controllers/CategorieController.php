<?php

namespace app\controllers;

use app\models\CategorieModel;
use Flight;

class CategorieController
{
    public function __construct() {}


    public function doGet(){
        $action = $_GET['action'] ?? null;
        switch ($action) {
            case 'new':
                $this->afficherFormulaireAjout();
                break;
            case 'delete':
                $this->supprimerCategorie();
                break;
            default:
                $this->listerCategorie();
        }
    }

    public function doPost()
    {
        $action = $_POST['action'] ?? null;


        switch ($action) {
            case 'add':
                $this->ajouterCategorie();
                break;
            case 'update':
                $this->modifierCategorie();
                break;
            default:
                $this->listerCategorie();
        }
    }

    public function afficherFormulaireAjout(){
        Flight::render('categorie_form');
    }
    public function afficherFormulaireModification(){
        $id = isset($_GET['id']) && is_numeric($_GET['id']) ? (int)$_GET['id'] : null;

        if ($id === null) {
            Flight::halt(400, 'Invalid ID'); 
        }

        $result = Flight::CategorieModel()->getCategorie_byId($id);

        if (!$result) {
            Flight::halt(404, 'Variete not found'); 
        }

        Flight::render('categorie_form', ['result' => $result]);
}



public function ajouterCategorie() {
    $VarieteData = [
        'nom_categorie'         => $_POST['nom_categorie'],         
        'poids_min_vente'  => $_POST['poids_min_vente'],  
        'prix_vente_kg'  => $_POST['prix_vente_kg'],  
        'poids_max'  => $_POST['poids_max'],  
        'j_sans_nourriture'  => $_POST['j_sans_nourriture'],  
        'perte_poids'       => $_POST['perte_poids'],
        'quota_journalier'       => $_POST['quota_journalier']
    ];

    $result = Flight::CategorieModel()->insertCategorie($VarieteData);

    Flight::redirect('/gestionCategorie');
}

public function modifierCategorie() {
    $id_categorie = Flight::request()->data->id_categorie;
    $nom_categorie = Flight::request()->data->nom_categorie;
    $poids_min_vente = Flight::request()->data->poids_min_vente;
    $prix_vente_kg = Flight::request()->data->prix_vente_kg;
    $poids_max = Flight::request()->data->poids_max;
    $j_sans_nourriture = Flight::request()->data->j_sans_nourriture;
    $perte_poids = Flight::request()->data->perte_poids;
    $quota_journalier = Flight::request()->data->quota_journalier;
    try {
        //code...
        for ($i=0; $i < count($id_categorie) ; $i++) { 
            $data = [
                'nom_categorie'=> $nom_categorie[$i],
                'poids_min_vente'=> $poids_min_vente[$i],
                'prix_vente_kg'=> $prix_vente_kg[$i],
                'poids_max'=> $poids_max[$i],
                'j_sans_nourriture'=> $j_sans_nourriture[$i],
                'perte_poids'=> $perte_poids[$i],
                'quota_journalier'=> $quota_journalier[$i],
                
                ] ;
            Flight::CategorieModel()->updateCategorie($id_categorie[$i],$data) ;
        }
    } catch (\Throwable $th) {
        $dataa['erreur'] = $th->getMessage();   
    }

    Flight::redirect('/gestionCategorie');
}

public function supprimerCategorie(){
    $id = $_GET['id_categorie'] ?? null;
    
    Flight::CategorieModel()->deleteCategorie($id);

    Flight::redirect('/gestionCategorie');
}



    public function listerCategorie(){
        $result = Flight::CategorieModel()->getAll_Categorie();

        Flight::render('categorie_list', ['result' => $result]);
    }
}

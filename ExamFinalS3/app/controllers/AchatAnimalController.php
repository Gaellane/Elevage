<?php

namespace app\controllers;


use Flight;

use app\models\AchatAnimalModel;
use app\models\AnimalModel;
use app\models\CategorieModel;
use app\models\FinanceModel;




class AchatAnimalController {

	public function __construct() {

	}

    public function doGet() {
        $categorie=new CategorieModel(Flight::database());
        $data['categories']=$categorie->getAll_Categorie();
        Flight::render('ajout_achat_animal',$data);
    }

    public function doPost() {
        $action=Flight::request()->data->action;
        $categorie=new CategorieModel(Flight::database());
        $data['categories']=$categorie->getAll_Categorie();
        switch ($action) {
            case 'add':
                $data['erreur']="Insertion reussie";
                $animal=new AnimalModel(Flight::database());
                $achat=new AchatAnimalModel(Flight::database());
                $finance=new FinanceModel(Flight::database());

                try {
                    $nom=Flight::request()->data->nom;
                    $categorie=Flight::request()->data->categorie;
                    $poids=Flight::request()->data->poids;
                    $date=Flight::request()->data->date;
                    $prix=Flight::request()->data->prix;
                    $auto_vente=Flight::request()->data->auto_vente;
                    $date_deces=Flight::request()->data->date_deces;
                    $file=$_FILES['image'];

                    $animal->upload($file);
                    if(empty($date_deces)) {
                        $date_deces=null;
                    }
                    $animal->insertAnimal($nom,$categorie,$poids,$auto_vente,$file,$date_deces);
                    $finance->insertFinance(2,$prix,'Achat animal');
                    $achat->insertAchatAnimal($animal->getLastId(),$date,$prix,);
                } catch(Throwable $th) {
                    $data['erreur']="Probleme lors de l'insertion ".$th.getMessage();
                } finally {
                    // Flight::render("ajout_achat_animal",$data);
                    Flight::redirect("/");
                }
                break;
            
            default:
                # code...
                break;
        }
    } 
}
<?php

namespace app\controllers;


use Flight;

use app\models\AlimentationModel;
use app\models\CategorieModel;





class AlimentationController {

	public function __construct() {

	}

    public function doGet() {
        $action=Flight::request()->query['action'];
        $alimentation=new AlimentationModel(Flight::database());
        $categorie=new CategorieModel(Flight::database());
        switch ($action) {
            case 'add':
                $data['categories']=$categorie->getAll_Categorie();
                Flight::render('alimentation_form',$data);
                break;

            case 'update' :
                $data['categories']=$categorie->getAll_Categorie();
                $id=Flight::request()->query["id_alimentation"];
                $data['alimentation']=$alimentation->getById($id);
                Flight::render('alimentation_form',$data);
                break;

            case 'delete' :
                echo "Etooo";
                $id=Flight::request()->query["id_alimentation"];
                $data['erreur']="Suppression Reussie";
                try {
                    $alimentation->deleteAlimentation($id);
                    $data['alimentations']=$alimentation->getAll_Alimentation();
                } catch (\Throwable $th) {
                    $data['erreur']="Erreur lors de la suppression ".$th.getMessage();
                } finally {
                    Flight::redirect("/alimentation");
                }
                break;

            default:
                $data['alimentations']=$alimentation->getAll_Alimentation();
                Flight::render("alimentation_list",$data);
                break;
        }
    }

    public function doPost() {
        $action=Flight::request()->data->action;
        $alimentation=new AlimentationModel(Flight::database());
        $data['erreur']="Action Reussie";
        switch ($action) {
            case 'add':
                $nom=Flight::request()->data['nom'];
                $categorie=Flight::request()->data['categorie'];
                $gain_poids=Flight::request()->data['gain_poids'];
                try {
                    $alimentation->insertAlimentation($nom,$categorie,$gain_poids);
                } catch (\Throwable $th) {
                    $data['erreur']="Probleme lors de l'ajout ".$th.getMessage();
                } finally {
                    Flight::redirect("/alimentation");
                }
                break;
            
            case 'update':  
                $id=Flight::request()->data->id_alimentation;
                $nom=Flight::request()->data->nom;
                $categorie=Flight::request()->data->categorie;
                $gain_poids=Flight::request()->data->gain_poids;
                try {
                    $alimentation->updateAlimentation($nom,$categorie,$gain_poids,$id);
                } catch (\Throwable $th) {
                    $data['erreur']="Probleme lors de la modifivation ".$th.getMessage();
                } finally {
                    Flight::redirect("/alimentation");
                }
                break;
        }
    } 
}
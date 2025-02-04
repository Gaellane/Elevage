<?php

namespace app\controllers;

use Flight;
use app\models\FinanceModel;

class AchatAlimentationController
{
    public function __construct() {}


    public function doGet()
    {
        $action = $_GET['action'] ?? null;
        switch ($action) {
            case 'new':
                $this->afficherFormulaireAjout();
                break;
            default:
                $this->listerAchatAlimentation();
        }
    }

    public function doPost()
    {
        $action = $_POST['action'] ?? null;
        switch ($action) {
            case 'add':
                $this->ajouterAchatAlimentation();

                break;
            default:
                $this->listerAchatAlimentation();
        }
    }

    public function afficherFormulaireAjout()
    {
        $result =[
            'alimentation' => Flight::AlimentationModel()->getAll_Alimentation()
        ];
        Flight::render('achat_alimentation_form', ['result' => $result]);
    }


    public function ajouterAchatAlimentation()
    {
        $VarieteData = [
            'alimentation' => $_POST['id_alimentation'],
            'prix'  => $_POST['prix'],
            'quantite'  => $_POST['quantite'],
            'date'  => $_POST['date']
        ];

        $result = Flight::AchatAlimentationModel()->insertAchatAlimentation($VarieteData);
        $finance = new FinanceModel(Flight::database());
        $finance->insertFinance(2,$_POST['prix'],"Achat d'aliment le ".$_POST['date']);

        Flight::redirect('/gestionAchatAlimentation');
    }



    public function listerAchatAlimentation()
    {
        $request = Flight::request();
        $criteria = [];

        if (!empty($request->query->nom_alimentation)) {
            $criteria['id_alimentation'] = $request->query->id_alimentation;
        }
        if (!empty($request->query->nom_categorie)) {
            $criteria['id_categorie'] = $request->query->id_categorie;
        }
        if (!empty($request->query->min_price)) {
            $criteria['min_price'] = $request->query->min_price;
        }
        if (!empty($request->query->max_price)) {
            $criteria['max_price'] = $request->query->max_price;
        }
        if (!empty($request->query->date_min)) {
            $criteria['date_min'] = $request->query->date_min;
        }
        if (!empty($request->query->date_max)) {
            $criteria['date_max'] = $request->query->date_max;
        }


        if (!empty($criteria)) {
            $result = [
                'achat_alimentation' => Flight::AchatAlimentationModel()->searchByCriteria($criteria),
                'alimentation' => Flight::AlimentationModel()->getAll_Alimentation(),
                'categorie' => Flight::CategorieModel()->getAll_Categorie()
            ];
            
        } else {
            $result = [
                'achat_alimentation' => Flight::AchatAlimentationModel()->getAll_Achat_details($criteria),
                'alimentation' => Flight::AlimentationModel()->getAll_Alimentation(),
                'categorie' => Flight::CategorieModel()->getAll_Categorie()
            ];
        }

        Flight::render('achat_alimentation_list', ['result' => $result]);
    }
}

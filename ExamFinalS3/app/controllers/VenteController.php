<?php

namespace app\controllers;

use Flight;

class VenteController
{
    public function __construct() {}


    public function doGet()
    {
        $action = $_GET['action'] ?? null;
        switch ($action) {
            case 'new':
                $this->afficherFormulaireAjout();
                break;
            // default:
            //     $this->listerVente();
        }
    }

    public function doPost()
    {
        $action = $_POST['action'] ?? null;
        switch ($action) {
            case 'add':
                $this->ajouterVente();
                break;
            // default:
            //     $this->listerVente();
        }
    }

    public function afficherFormulaireAjout(){
        $result = Flight::AnimalModel()->getAll_Animal();
        Flight::render('vente_form', ['result' => $result]);
    }



    public function ajouterVente()
    {
        $VarieteData = [
            'id_animal'   => $_POST['id_animal'],
            'date_vente'  => $_POST['date_vente']
        ];

        $result = Flight::VenteModel()->insertVente($VarieteData);

        Flight::redirect('/gestionVente');
    }

    // public function listerVente()
    // {
    //     $request = Flight::request();
    //     $criteria = [];

    //     if (!empty($request->query->id_animal)) {
    //         $criteria['id_animal'] = $request->query->id_animal;
    //     }
    //     if (!empty($request->query->date_vente_min)) {
    //         $criteria['date_vente_min'] = $request->query->date_vente_min;
    //     }
    //     if (!empty($request->query->date_vente_max)) {
    //         $criteria['date_vente_max'] = $request->query->date_vente_max;
    //     }
        
    //     if (!empty($criteria)) {
    //         $result = [
    //             'vente' => Flight::VenteModel()->searchByCriteria($criteria),
    //             'animal' => Flight::AnimalModel()->getAll_Animal()
    //         ];
            
    //     } else {
    //         $result = [
    //             'vente' => Flight::VenteModel()->getAll_Vente(),
    //             'animal' => Flight::AnimalModel()->getAll_Animal()
    //         ];
    //     }

    //     Flight::render('Vente_list', ['result' => $result]);
    // }
}

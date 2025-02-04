<?php

namespace app\controllers;

use app\models\FinanceModel;

use Flight;

class FinanceController {

	public function __construct() {

	}

    public function doPost(){
        $finance = new FinanceModel(Flight::database());
        $action = Flight::request()->data->action;
        $type = Flight::request()->data->type;
        $montant = Flight::request()->data->montant;
        $description = Flight::request()->data->description;

        switch($action){
            case 'add':
                $finance->insertFinance($type,$montant,$description);
                Flight::redirect("/");
                break;
            default :
                break;
        }
    }

    public function doGet() {
        $action = Flight::request()->query['action'];
        $data = array();
        $finance = new FinanceModel(Flight::database());
        switch($action){
            case 'form':
                $data['mouvement']=$finance->getTypeMouvement();
                Flight::render("ajout_finance" , $data);
                break;
            default :
                break;
        }
    }
}
<?php

namespace app\controllers;

use Flight;
use app\models\AnimalModel;


class AnimalController{
    function __construct(){

    }

    public function showState(){
        $date=Flight::request()->data->date;
        $aniModel = new AnimalModel(Flight::database());
        // Flight::render("state",['animals'=>$aniModel->estim($date)]);
        Flight::json($aniModel->estim($date));
    }
}

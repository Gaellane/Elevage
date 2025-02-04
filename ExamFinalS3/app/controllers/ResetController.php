<?php

namespace app\controllers;

use app\models\ResetModel;

use Flight;

class ResetController {

	public function __construct() {

	}
    public function doGet(){
        $reset = new ResetModel(Flight::database());
        $reset->reset();
        Flight::redirect("/");
    }
}
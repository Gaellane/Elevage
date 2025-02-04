<?php

namespace app\controllers;

use Flight;
use app\models\Admin;

class AdminController
{
    public function __construct() {}

    public function homePage()
    {
        Flight::render('home/Homepage');
    }

}

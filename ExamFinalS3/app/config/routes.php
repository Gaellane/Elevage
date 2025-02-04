<?php

use app\models\ReservationModel;
use flight\Engine;
use flight\net\Router;
//use Flight;
use app\controllers\AchatAnimalController;
use app\controllers\AlimentationController;
use app\controllers\CategorieController;
use app\controllers\AchatAlimentationController;
use app\controllers\VenteController;
use app\controllers\AnimalController;
use app\controllers\FinanceController;
use app\controllers\ResetController;
use app\controllers\AdminController;











/** 
 * @var Router $router 
 * @var Engine $app
 */


$achat_animal=new AchatAnimalController();
$router->get('/achatAnimal', [$achat_animal, 'doGet']);
$router->post('/achatAnimal', [$achat_animal, 'doPost']);

$alimentation= new AlimentationController();
$router->get('/alimentation', [$alimentation, 'doGet']);
$router->post('/alimentation', [$alimentation, 'doPost']);

$categorie_controller = new CategorieController();
$router->get('/gestionCategorie', [$categorie_controller, 'doGet']);
$router->post('/gestionCategorie_p', [$categorie_controller, 'doPost']);

$achat_alimentation_controller = new AchatAlimentationController();
$router->get('/gestionAchatAlimentation', [$achat_alimentation_controller, 'doGet']);
$router->post('/gestionAchatAlimentation_p', [$achat_alimentation_controller, 'doPost']);

$vente_controller = new VenteController();
$router->get('/gestionVente', [$vente_controller, 'doGet']);
$router->post('/gestionVente_p', [$vente_controller, 'doPost']);

$finance = new FinanceController();

$router->post("/financeP" ,[$finance , "doPost"]);
$router->get("/financeG" , [$finance , "doGet"]);


$reset = new ResetController();

$router->get("/reset" , [$reset , "doGet"]);

$achat=new AchatAnimalController();

$router->get('/formAchat', [$achat, 'doGet']);
$router->post('/achatAnimal', [$achat, 'doPost']);




$admin_controller = new AdminController();
$categorie_controller = new CategorieController();
// $router->get('/', [ $admin_controller, 'homePage']);

$router->get('/gestionCategorie', [$categorie_controller, 'doGet']);
$router->post('/gestionCategorie_p', [$categorie_controller, 'doPost']);

$animal = new AnimalController();
$router->get("/" , function(){
	Flight::render("state");
});
$router->post("/state" , [$animal , 'showState']);





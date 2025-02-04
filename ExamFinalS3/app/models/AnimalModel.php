<?php

namespace app\models;
use app\Object\Animal;
use app\Object\Categorie;
use app\models\CategorieModel;

use Exception;
use Flight;

class AnimalModel {

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    
    public function getAll_Animal(){
        try {
            $query = "SELECT * FROM farm_animal";
            $stmt = $this->db->query($query);
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\Exception $e) {
            return ['message' => 'Error on the recuperation of animal: ' . $e->getMessage()];
        }
    }
    
    function fileName($file)
    {
        $fichier=explode(".",$file['name']);
        $date=time();
        $rep=$fichier[0].$date.".".$fichier[1];
        echo $rep;
        return $rep;
    }
    

    public function upload($file)
    {
        $dossier="assets/img/animaux/";
        $fichier = $dossier.$this->fileName($file);
        $taille = filesize($file['tmp_name']);
        $extensions = array('.png', '.gif', '.jpg', '.jpeg','.PNG','.GIF','.JPG','.JPEG');
        $extension = strrchr($file['name'], '.');
        //Début des vérifications de sécurité...
        if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
        {
            $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt ou doc';
            throw new $erreur;
        }

        //On formate le nom du fichier ici...
            $fichier = strtr($fichier,
            'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
            'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            //$fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
            if(move_uploaded_file($file['tmp_name'], $fichier)) //Si
            {
            }
            
    }

    public function insertAnimal($nom,$categorie,$poids,$auto_vente,$file,$date) {
        $image=$this->fileName($file);
        $sql="INSERT INTO farm_animal(nom_animal,id_categorie,poids_initial,auto_vente,image,date_mort) VALUES (?,?,?,?,?,?)";
        $stmt=$this->db->prepare($sql);
        $stmt->execute([$nom,$categorie,$poids,$auto_vente,$image,$date]);
    }

    public function getLastId() {
        $sql="SELECT MAX(id_animal) as id_animal FROM farm_animal";
        $stmt=$this->db->prepare($sql);
        $stmt->execute();
        $resultat=$stmt->fetchAll();
        foreach ($resultat as $r) {
            return $r['id_animal'];
        }
    }
    public function getNouvDate($date){
        $sql = "select * from v_animal where date(date_achat) = ? ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$date]);
        $result = $stmt->fetchAll();
        $array = array();
        $catModel = new CategorieModel(Flight::database());
        foreach ($result as $r) {
            $cat = $catModel->getById($r['id_categorie']);
            $dateMort=null;
            if($r['date_mort']!=null){
                $dateMort=new \DateTime($r['date_mort']);
            }
            $dateVente=null;
            if($r['date_vente']!=null){
                $dateVente=new \DateTime($r['date_vente']);
            }
            $array[] = new Animal($r['id_animal'],$r['nom_animal'] , $r['image'],$r['poids_initial'],$cat ,$dateMort , $r['auto_vente']>0 , $dateVente);
        }
        return $array;
    }

    private function arrange($array){
        if(count($array)==1){
            return $array;
        }
        for ($i=0; $i < count($array) - 1 ; $i++) { 
            for ($j=$i; $j < count($array); $j++) { 
                if($array[$j]->date_vente==null){
                    continue;
                } else {
                    if($array[$i]->date_vente==null){
                        $temp = $array[$i];
                        $array[$i] = $array[$j];
                        $array[$j] = $temp;
                    } else {
                        if($array[$j]->date_vente<$array[$j]->date_vente){
                            $temp = $array[$i];
                            $array[$i] = $array[$j];
                            $array[$j] = $temp;
                        }
                    }
                }

            }
        }
        return $array;
    }
    
  
    function estim ($dateFin){
        $date = new \DateTime();
        $date_fin = new \DateTime($dateFin);
        $interval = new \DateInterval('P1D');

        $alimModel = new AlimentationModel(Flight::database());
        $alimentations = $alimModel->getAllObject();
        $animals = array();
        $i = 0;
        $cont = 0;
        $date_fin->add($interval);
        if($date_fin<$date ){
            return [];
        }
        ///debut de la simulation (sao dia gaga eo rams fa manomoboka very za )
        while ($date<=$date_fin) {
            $add = $this->getNouvDate($date->format('Y-m-d'));
            ///mise a jour des animaux
            foreach ($add as $animal) {
                $animals[]=$animal;
            }
            //mise ajour des aliments
            foreach ($alimentations as $alimentation) {
                $alimentation->updateQte($date->format('Y-m-d'));
            }
            $animals = $this->arrange($animals);
            ///nourrir les animaux
            foreach ($animals as $animal) {
                /// si morts on passe
                if(!$animal->isAlive || $animal->isVendu){
                    continue;
                }
                $nourrit = false;
                foreach ($alimentations as $alimentation) {
                    if($alimentation->usable()){
                        if($alimentation->categorie->id==$animal->categorie->id){
                            $nourrit=true;
                            $animal->nourrir($alimentation,$date);
                            break;

                        }
                    }
                }

                if(!$nourrit){
                    $animal->notNourrit();
                    if(!$animal->isAlive){
                        $animal->date_mort=$date;
                        
                    }
                }
                if($animal->date_vente!=null){

                    if($animal->date_vente<$date){
                        
                        $animal->isVendu=true;
                    }
                }
            }   
            $date->add($interval);
            $i++;
        }

        return $animals;
    }
}   
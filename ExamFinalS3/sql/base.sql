CREATE DATABASE farm ;
USE farm;
CREATE OR REPLACE TABLE farm_categorie_animal(
    id_categorie INT PRIMARY KEY AUTO_INCREMENT,
    nom_categorie VARCHAR(100) ,
    poids_min_vente DECIMAL(10,2) ,
    prix_vente_kg DECIMAL(10,2) ,
    poids_max DECIMAL(10,2) ,
    j_sans_nourriture INT ,
    perte_poids DECIMAL(10,2) ,
    quota_journalier DECIMAL(10 , 2)
);

CREATE OR REPLACE TABLE farm_animal(
    id_animal INT PRIMARY KEY AUTO_INCREMENT ,
    nom_animal VARCHAR(100) ,
    id_categorie INT REFERENCES farm_categorie_animal(id_categorie),
    poids_initial DECIMAL(10,2),
    auto_vente INT DEFAULT 0 ,
    image VARCHAR(100) ,
    date_mort DATE 
);

CREATE OR REPLACE TABLE farm_mouvement (
    id_mouvement INT PRIMARY KEY AUTO_INCREMENT ,
    type_mouvement VARCHAR(20)
);

CREATE OR REPLACE TABLE farm_finance (
    id_finance INT PRIMARY KEY AUTO_INCREMENT ,
    id_mouvement INT REFERENCES farm_mouvement(id_mouvement),
    argent DECIMAL(10,2) ,
    date_mouvement DATE DEFAULT CURRENT_DATE ,
    description text 
);

CREATE OR REPLACE TABLE farm_achat_animal (
    id_achat INT PRIMARY KEY AUTO_INCREMENT ,
    id_animal INT REFERENCES farm_animal(id_animal),
    date_achat DATE DEFAULT CURRENT_DATE ,
    prix DECIMAL(10,2)
);

CREATE OR REPLACE TABLE farm_alimentation (
    id_alimentation INT PRIMARY KEY AUTO_INCREMENT ,
    nom_alimentation VARCHAR(100) ,
    id_categorie INT REFERENCES farm_categorie_animal(id_categorie),
    gain_poids DECIMAL (5,2)
);

CREATE OR REPLACE TABLE farm_achat_alimentation (
    id_achat INT PRIMARY KEY AUTO_INCREMENT ,
    id_alimentation INT REFERENCES farm_alimentation(id_alimentation) ,
    prix DECIMAL(10,2) ,
    quantite DECIMAL (10,2) ,
    date_achat DATE DEFAULT CURRENT_DATE 
);

CREATE OR REPLACE TABLE farm_vente_animal (
    id_vente INT PRIMARY KEY AUTO_INCREMENT ,
    id_animal INT REFERENCES farm_animal(id_animal),
    date_vente DATE 
);

CREATE OR REPLACE VIEW view_achat_alimentation_details AS
SELECT
    faa.id_achat,
    faa.id_alimentation,
    fa.nom_alimentation,
    fc.id_categorie,
    fc.nom_categorie,
    faa.prix,
    faa.quantite,
    faa.date_achat
FROM farm_achat_alimentation faa
JOIN farm_alimentation fa
  ON faa.id_alimentation = fa.id_alimentation
JOIN farm_categorie_animal fc
  ON fa.id_categorie = fc.id_categorie;


CREATE VIEW v_alimentation_categorie AS
SELECT 
    id_alimentation,
    nom_alimentation,
    fa.id_categorie,
    nom_categorie,
    gain_poids
FROM farm_alimentation as fa 
JOIN farm_categorie_animal as fc 
ON fa.id_categorie=fc.id_categorie;



CREATE VIEW v_animal AS
select 
    a.id_animal ,
    a.nom_animal ,
    a.poids_initial ,
    a.id_categorie , 
    a.date_mort ,
    a.auto_vente ,
    va.date_vente ,
    aa.date_achat ,
    a.image

from farm_achat_animal as aa 
join farm_animal as a on a.id_animal=aa.id_animal
left join farm_vente_animal as va on va.id_animal=a.id_animal 

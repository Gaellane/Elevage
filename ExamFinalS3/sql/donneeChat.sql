-- Ajout de catégories d'animaux
INSERT INTO farm_categorie_animal (nom_categorie, poids_min_vente, prix_vente_kg, poids_max, j_sans_nourriture, perte_poids) VALUES
('Bovin', 200.00, 2.50, 500.00, 5, 10.00),
('Porcin', 50.00, 3.00, 200.00, 3, 5.00),
('Volaille', 2.00, 4.00, 10.00, 2, 0.50);

-- Ajout d'animaux
INSERT INTO farm_animal (nom_animal, id_categorie, poids_initial) VALUES
('Vache 1', 1, 250.00),
('Cochon 1', 2, 80.00),
('Poulet 1', 3, 3.00);

-- Ajout de types de mouvements financiers
INSERT INTO farm_mouvement (type_mouvement) VALUES
('entree'),
('Sortie');

-- Ajout d'achats d'animaux
INSERT INTO farm_achat_animal (id_animal, prix) VALUES
(1, 500.00),
(2, 200.00),
(3, 10.00);

-- Ajout d'alimentation
INSERT INTO farm_alimentation (nom_alimentation, id_categorie, gain_poids) VALUES
('Foin', 1, 5.00),
('Grain', 2, 3.00),
('Maïs', 3, 1.00);

-- Ajout d'achats d'alimentation
INSERT INTO farm_achat_alimentation (id_alimentation, prix, quantite) VALUES
(1, 50.00, 100.00),
(2, 30.00, 50.00),
(3, 20.00, 20.00);

-- Ajout de ventes d'animaux
INSERT INTO farm_vente_animal (id_animal , date_vente) VALUES
(1 , '2025-02-22'),
(2 ,null),
(3 ,null);

-- Ajout de finances
INSERT INTO farm_finance (id_mouvement, argent, description) VALUES
(1, -500.00, 'Achat de Vache 1'),
(1, -200.00, 'Achat de Cochon 1'),
(2, 1000.00, 'Vente de Vache 1'),
(1, -50.00, 'Achat de Foin');

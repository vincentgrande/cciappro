INSERT INTO `marque_produits` (`idMarqueProduit`, `marqueProduit`, `created_at`, `updated_at`) VALUES
(1, 'UHU', NULL, NULL),
(2, 'MAPED', NULL, NULL),
(3, 'BIC', NULL, NULL),
(4, 'STABILO', NULL, NULL),
(5, 'SCOTCH', NULL, NULL),
(6, 'OXFORD', NULL, NULL);


INSERT INTO `type_produits` (`idTypeProduit`, `typeProduit`, `created_at`, `updated_at`) VALUES
(1, 'colle', NULL, NULL),
(2, 'ciseaux', NULL, NULL),
(3, 'regle', NULL, NULL),
(4, 'surligneur', NULL, NULL),
(5, 'ruban adhesif', NULL, NULL),
(6, 'cahier', NULL, NULL);

INSERT INTO `produits` (`idProduit`, `nomProduit`, `descProduit`, `imgProduit`, `stockProduit`, `created_at`, `updated_at`, `idMarqueProduit`, `idTypeProduit`) VALUES
(1, 'Baton de colle', 'Baton de colle pour papier', './img/colle.png', 10, NULL, NULL, 1, 1),
(2, 'Ciseaux', 'Ciseaux pour découpe papier', './img/ciseaux.png', 10, NULL, NULL, 2, 2),
(3, 'Ruban adhésif', 'Ruban ashésif fixation forte', './img/scotch.png', 10, NULL, NULL, 5, 5),
(4, 'Colle liquide', 'Colle liquide fixation forte', './img/colle2.png', 10, NULL, NULL, 5, 1),
(5, 'Règle', 'Règle de 30cm', './img/regle.png', 10, NULL, NULL, 2, 3),
(6, 'Surligneurs', 'Surligneurs de couleur', './img/fluo.png', 10, NULL, NULL, 4, 4),
(7, 'Cahier', 'Cahiers grands carreaux', './img/cahier.png', 10, NULL, NULL, 6, 6);

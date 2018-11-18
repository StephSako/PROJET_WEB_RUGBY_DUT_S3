--INSERTIONS DES CATEGORIES
INSERT INTO Categorie (IdCategorie , NomCategorie , AgeMinimum, AgeMaximum) VALUES (1,’Poussin’,0,9);
INSERT INTO Categorie (IdCategorie , NomCategorie , AgeMinimum, AgeMinimum) VALUES (1,’Benjamin’,10,13);
INSERT INTO Categorie (IdCategorie , NomCategorie , AgeMinimum, AgeMinimum) VALUES (1,’Minime’,14,16);
INSERT INTO Categorie (IdCategorie , NomCategorie , AgeMinimum, AgeMinimum) VALUES (1,’Junior’,17,19);
INSERT INTO Categorie (IdCategorie , NomCategorie , AgeMinimum, AgeMinimum) VALUES (1,’Senior’,20,39);
INSERT INTO Categorie (IdCategorie , NomCategorie , AgeMinimum, AgeMinimum) VALUES (1,’Veteran’,39,99);

--INSERTIONS DES MOYENS DE PAIEMENT
INSERT INTO MoyentPaiement (IdMoyPaiement , CarteBancaire , Espece) VALUES (1, False, False);
INSERT INTO MoyentPaiement (IdMoyPaiement , CarteBancaire , Espece) VALUES (2, True, False);
INSERT INTO MoyentPaiement (IdMoyPaiement , CarteBancaire , Espece) VALUES (3, False, True);
INSERT INTO MoyentPaiement (IdMoyPaiement , CarteBancaire , Espece) VALUES (4, True, True);

--INSERTIONS DES PRODUITS SUPPLEMENTAIRES
INSERT INTO ProduitSupplementaire (NomProdSupp, PrixProdSupp, IdProdSupp) VALUES ('Tagada',2.50,1);
INSERT INTO ProduitSupplementaire (NomProdSupp, PrixProdSupp, IdProdSupp) VALUES ('Dragibus',2.00,2);
INSERT INTO ProduitSupplementaire (NomProdSupp, PrixProdSupp, IdProdSupp) VALUES ('Haribo_Pik',1.50,3);
INSERT INTO ProduitSupplementaire (NomProdSupp, PrixProdSupp, IdProdSupp) VALUES ('Croco',3.00,4);
INSERT INTO ProduitSupplementaire (NomProdSupp, PrixProdSupp, IdProdSupp) VALUES ('Chamalows',2.50,5);
INSERT INTO ProduitSupplementaire (NomProdSupp, PrixProdSupp, IdProdSupp) VALUES ('Réglisse',1.20,6);
INSERT INTO ProduitSupplementaire (NomProdSupp, PrixProdSupp, IdProdSupp) VALUES ('Assortiments',1.90,7);

--INSERTIONS DES STOCKS DE PRODUITS SUPPLEMENTAIRES
INSERT INTO StockProdSupp(IdStockProdSupp, QuantiteProdSupp, IdProdSupp) VALUES (1,100,1);
INSERT INTO StockProdSupp(IdStockProdSupp, QuantiteProdSupp, IdProdSupp) VALUES (2,100,2);
INSERT INTO StockProdSupp(IdStockProdSupp, QuantiteProdSupp, IdProdSupp) VALUES (3,100,3);
INSERT INTO StockProdSupp(IdStockProdSupp, QuantiteProdSupp, IdProdSupp) VALUES (4,100,4);
INSERT INTO StockProdSupp(IdStockProdSupp, QuantiteProdSupp, IdProdSupp) VALUES (5,100,5);
INSERT INTO StockProdSupp(IdStockProdSupp, QuantiteProdSupp, IdProdSupp) VALUES (6,100,6);
INSERT INTO StockProdSupp(IdStockProdSupp, QuantiteProdSupp, IdProdSupp) VALUES (7,100,7);


--INSERTIONS DES GOUTERS
--quatre types de goûter existent : un croisement entre le pain au chocolat, le sandwich au chocolat, le coca cola et le jus dorange
INSERT INTO Gouter (Gateau, Boisson, PrixGouter, IdGouter) VALUES ('Pain au chocolat','Coca-Cola', 3.50,1);
INSERT INTO Gouter (Gateau, Boisson, PrixGouter, IdGouter) VALUES ('Pain au chocolat','Jus Orange',3.20,2);
INSERT INTO Gouter (Gateau, Boisson, PrixGouter, IdGouter) VALUES ('Sandwich au chocolat','Coca-Cola',3.50,3);
INSERT INTO Gouter (Gateau, Boisson, PrixGouter, IdGouter) VALUES ('Sandwich au chocolat','Jus Orange', 3.40,4);

--INSERTIONS DES STOCKS DE GOUTERS
--quatre types de goûter existent : un croisement entre le pain au chocolat, le sandwich au chocolat, le coca cola et le jus dorange
INSERT INTO StockGouter (IdStockGouter, QuantiteGouter, IdGouter) VALUES (1,100,1);
INSERT INTO StockGouter (IdStockGouter, QuantiteGouter, IdGouter) VALUES (2,100,2);
INSERT INTO StockGouter (IdStockGouter, QuantiteGouter, IdGouter) VALUES (3,100,3);
INSERT INTO StockGouter (IdStockGouter, QuantiteGouter, IdGouter) VALUES (4,100,4);

--INSERTIONS DES ENFANTS
INSERT INTO Enfant (NomEnfant, PrenomEnfant,IdCategorie,IdEnfant) VALUES ('Sakovitch','Pico',5,1);
INSERT INTO Enfant (NomEnfant, PrenomEnfant,IdCategorie,IdEnfant) VALUES ('Sakovitch','Chico',2,2);
INSERT INTO Enfant (NomEnfant, PrenomEnfant,IdCategorie,IdEnfant) VALUES ('Hor','Raphael',4,3);

--INSERTIONS DES PARENTS
INSERT INTO Parent (NomParent, MotDePasse, Login, IdParent, IdMoyPaiement) VALUES ('Sakovitch','orelsan', 'sako@gmail.com',1,3);
INSERT INTO Parent (NomParent, MotDePasse, Login, IdParent, IdMoyPaiement) VALUES ('Hor','porte', 'hor@gmail.com',2,4);

--INSERTIONS DES CONSOMMATIONS
INSERT INTO Consommation(IdConso, DateConso, IdEnfant, IdProdSupp, IdGouter, QuantiteGouter, QuantiteProdSupp) VALUES (1,'24/02/2017',1,NULL,1,2,3);
INSERT INTO Consommation(IdConso, DateConso, IdEnfant, IdProdSupp, IdGouter, QuantiteGouter, QuantiteProdSupp) VALUES (2,'05/07/2017',1,2,NULL,1,0);
INSERT INTO Consommation(IdConso, DateConso, IdEnfant, IdProdSupp, IdGouter, QuantiteGouter, QuantiteProdSupp) VALUES (3,'19/09/2017',1,7,3,3,6);
INSERT INTO Consommation(IdConso, DateConso, IdEnfant, IdProdSupp, IdGouter, QuantiteGouter, QuantiteProdSupp) VALUES (4,'30/12/2017',1,5,4,1,1);
INSERT INTO Consommation(IdConso, DateConso, IdEnfant, IdProdSupp, IdGouter, QuantiteGouter, QuantiteProdSupp) VALUES (5,'24/02/2017',2,NULL,1,0,6);
INSERT INTO Consommation(IdConso, DateConso, IdEnfant, IdProdSupp, IdGouter, QuantiteGouter, QuantiteProdSupp) VALUES (6,'05/07/2017',2,2,NULL,2,2);
INSERT INTO Consommation(IdConso, DateConso, IdEnfant, IdProdSupp, IdGouter, QuantiteGouter, QuantiteProdSupp) VALUES (7,'19/09/2017',2,NULL,1,4,3);
INSERT INTO Consommation(IdConso, DateConso, IdEnfant, IdProdSupp, IdGouter, QuantiteGouter, QuantiteProdSupp) VALUES (8,'30/12/2017',2,NULL,1,5,2);
INSERT INTO Consommation(IdConso, DateConso, IdEnfant, IdProdSupp, IdGouter, QuantiteGouter, QuantiteProdSupp) VALUES (9,'24/02/2017',3,3,1,9,2);
INSERT INTO Consommation(IdConso, DateConso, IdEnfant, IdProdSupp, IdGouter, QuantiteGouter, QuantiteProdSupp) VALUES (10,'05/07/2017',3,4,NULL,1,1);
INSERT INTO Consommation(IdConso, DateConso, IdEnfant, IdProdSupp, IdGouter, QuantiteGouter, QuantiteProdSupp) VALUES (11,'19/09/2017',3,5,2,2,3);
INSERT INTO Consommation(IdConso, DateConso, IdEnfant, IdProdSupp, IdGouter, QuantiteGouter, QuantiteProdSupp) VALUES (12,'30/12/2017',3,NULL,1,4,2);

--INSERTIONS DES COMPTES ENFANT
INSERT INTO CompteEnfant (IdEnfant, IdParent, IdCompteEnfant) VALUES (1,1,1);
INSERT INTO CompteEnfant (IdEnfant, IdParent, IdCompteEnfant) VALUES (2,1,2); --Sakovitch a deux enfants
INSERT INTO CompteEnfant (IdEnfant, IdParent, IdCompteEnfant) VALUES (3,2,3);
DROP TABLE CONSOMMATION;
DROP TABLE StockGouter;
DROP TABLE StockProdSupp;
DROP TABLE Gouter;
DROP TABLE ProduitSupplementaire;
DROP TABLE CompteEnfant;
DROP TABLE Enfant;
DROP TABLE Parent;
DROP TABLE MoyenPaiement;
DROP TABLE Categorie;

------------------------------------------------------------
-- Table: ProduitSupplementaire
------------------------------------------------------------
CREATE TABLE ProduitSupplementaire(
	NomProdSupp VARCHAR2(25) NOT NULL,
    	PrixProdSupp FLOAT(4) NOT NULL,
	IdProdSupp  NUMBER(10) NOT NULL ,
	CONSTRAINT ProduitSupplementaire_Pk PRIMARY KEY (IdProdSupp)
);

------------------------------------------------------------
-- Table: StockProdSupp
------------------------------------------------------------
CREATE TABLE StockProdSupp(
	IdStockProdSupp NUMBER(10) NOT NULL,
   	QuantiteProdSuppStock NUMBER(10),
	IdProdSupp  NUMBER(10) NOT NULL ,
	CONSTRAINT IdStockProdSupp_Pk PRIMARY KEY (IdStockProdSupp),
	CONSTRAINT Gouter_Fk FOREIGN KEY (IdProdSupp )
REFERENCES ProduitSupplementaire(IdProdSupp )
);


------------------------------------------------------------
-- Table: Goûter
------------------------------------------------------------
CREATE TABLE Gouter(
	Gateau    VARCHAR2 (25) ,
	Boisson   VARCHAR2 (25) ,
	PrixGouter          FLOAT(5) NOT NULL,
	IdGouter  NUMBER(10)  NOT NULL,
	CONSTRAINT Gouter_Pk PRIMARY KEY (IdGouter)
);


------------------------------------------------------------
-- Table: StockGouter
------------------------------------------------------------
CREATE TABLE StockGouter(
	IdStockGouter NUMBER NOT NULL,
   	QuantiteGouter NUMBER,
	IdGouter  NUMBER NOT NULL ,
	CONSTRAINT IdStockGouter_Pk PRIMARY KEY (IdStockGouter),
	CONSTRAINT IdStockGouter_Fk FOREIGN KEY (IdGouter) REFERENCES Gouter(IdGouter)
);

------------------------------------------------------------
-- Table: Categorie
------------------------------------------------------------

CREATE TABLE Categorie(
    IdCategorie NUMBER(10) NOT NULL,
    NomCategorie VARCHAR2(20),
    AgeMaximum NUMBER(10),
    AgeMinimum NUMBER(10),
    CONSTRAINT IdCategoriecat_Pk PRIMARY KEY (IdCategorie)
);

------------------------------------------------------------
-- Table: Enfant
------------------------------------------------------------
CREATE TABLE Enfant(
	NomEnfant                    VARCHAR2 (30),
	PrenomEnfant		VARCHAR2(20),
	IdCategorie              NUMBER(10),
	IdEnfant               NUMBER(10) NOT NULL,
	CONSTRAINT Enfant_Pk PRIMARY KEY (IdEnfant),
	CONSTRAINT IdCat_Fk FOREIGN KEY (IdCategorie)
REFERENCES Categorie (IdCategorie )
);

------------------------------------------------------------
-- Table: MoyentPaiement
------------------------------------------------------------
CREATE TABLE MoyenPaiement(
	IdMoyPaiement          NUMBER(10)  ,
	CarteBancaire          NUMBER(1) ,
	Espece                 NUMBER(1)  ,
	CONSTRAINT IdMoyPaiement_Pk PRIMARY KEY (IdMoyPaiement )
);

------------------------------------------------------------
-- Table: Parent
------------------------------------------------------------
CREATE TABLE Parent(
	NomParent                    VARCHAR2 (25)  ,
	MotDePasse             VARCHAR2 (25)  ,
	Login                  VARCHAR2 (25)  ,
	IdParent               NUMBER NOT NULL,
	IdMoyPaiement	NUMBER(10) NOT NULL,
	CONSTRAINT IdMP_Pk PRIMARY KEY (IdParent),
	CONSTRAINT IdMoyPaie_Fk FOREIGN KEY (IdMoyPaiement)
REFERENCES MoyentPaiement(IdMoyPaiement)
);

------------------------------------------------------------
-- Table: Consommation
------------------------------------------------------------
CREATE TABLE Consommation(
    IdConso          NUMBER(10),
	DateConso        DATE  NOT NULL  ,
	IdEnfant         NUMBER(10) NOT NULL ,
	IdProdSupp       NUMBER(10),
	IdGouter         NUMBER(10),
	QuantiteGouter NUMBER(10),
	QuantiteProdSupp NUMBER(10),
	CONSTRAINT IdConsommation_Pk PRIMARY KEY (IdConso),
	CONSTRAINT IdConsoGouter_Fk FOREIGN KEY (IdGouter)
REFERENCES Gouter(IdGouter),
    CONSTRAINT IdProdSuppConso_Pk FOREIGN KEY (IdProdSupp )
REFERENCES ProduitSupplementaire(IdProdSupp)
);

------------------------------------------------------------
-- Table: CompteEnfant
------------------------------------------------------------
CREATE TABLE CompteEnfant(
	IdEnfant    NUMBER(10),
	IdParent    NUMBER(10),
	IdCompteEnfant  NUMBER(10) NOT NULL,
	CONSTRAINT IdCompteEnfant_Pk PRIMARY KEY (IdCompteEnfant ),
	CONSTRAINT IdEnfant_Fk FOREIGN KEY (IdEnfant)
REFERENCES Enfant(IdEnfant),
	CONSTRAINT IdParent_Fk FOREIGN KEY (IdParent)
REFERENCES Parent(IdParent)
);

CREATE OR REPLACE VIEW VoirSoldeChaqueEnfant AS
SELECT E.IdEnfant, E.NomEnfant, E.PrenomEnfant, CE.IDCOMPTEENFANT, SUM((Co.QuantiteProdSupp*PS.PrixProdSupp)+(Co.QuantiteGouter*G.PrixGouter)) AS Solde
FROM CompteEnfant CE,ENFANT E, Consommation Co, Gouter G, ProduitSupplementaire PS
WHERE E.IdEnfant = Co.IdEnfant
AND Co.IdGouter = G.IdGouter
AND Co.IdProdSupp = PS.IdProdSupp
GROUP BY  E.IdEnfant, E.NomEnfant, E.PrenomEnfant, CE.IDCOMPTEENFANT
ORDER BY  E.IdEnfant, E.NomEnfant, E.PrenomEnfant, CE.IDCOMPTEENFANT;

SET SERVEROUTPUT  ON
/

CREATE OR REPLACE TRIGGER PrevenirSoldeVide
	BEFORE UPDATE ON VoirSoldeChaqueEnfant INSTEAD OF INSERT
	WHEN (OLD.Solde = 0.0) 
	BEGIN
		 DBMS_OUTPUT.PUT_LINE('Erreur : solde nul !');
	END;
/

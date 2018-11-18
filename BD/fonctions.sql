DROP FUNCTION SeConnecter;
DROP PROCEDURE AJOUTERPARENT;
drop procedure ajouterconsommation;
drop procedure AjouterCreerCompteEnfant;
DROP PROCEDURE AjouterGouter;
drop procedure Ajouterprodsupp;
drop procedure ModifierPrixGouter;
drop procedure ModifierPrixprodsupp;
drop procedure SupprimerParent;
drop procedure Supprimercompteenfant;
drop procedure SupprimerConsommation;
/


CREATE FUNCTION SeConnecter (login VARCHAR2, mdpasse VARCHAR2)
RETURN BOOLEAN IS
    connexion BOOLEAN := FALSE;
    CURSOR C1 IS SELECT Login, MotDePasse FROM Parent 
                 WHERE Login = login AND MotDePasse = mdpasse;
BEGIN
    OPEN C1;    
    IF C1%ROWCOUNT = 1 THEN
        connexion:= TRUE;
    END IF;
    CLOSE C1;
    
    RETURN connexion;
END SeConnecter;
/

CREATE PROCEDURE AjouterParent(nomparent VARCHAR2, mdpasse VARCHAR2, login VARCHAR2, idparent NUMBER) AS
BEGIN
   INSERT INTO Parent (NomParent, MotDePasse, Login, IdParent) VALUES ( nomparent,mdpasse,login,idparent);
END AjouterParent;
/

CREATE PROCEDURE AjouterConsommation(idconso NUMBER, dateconso DATE, idenfant NUMBER, idprodsupp NUMBER, idgouter NUMBER, qg NUMBER, qps NUMBER) AS
BEGIN
   INSERT INTO Consommation(IdConso, DateConso, IdEnfant, IdProdSupp, IdGouter, QuantiteGouter, QuantiteProdSupp) VALUES (idconso, dateconso, idenfant, idprodsupp, idgouter, qg, qps);
END AjouterConsommation;
/

CREATE PROCEDURE AjouterCreerCompteEnfant(idenfant NUMBER, idparent NUMBER, idcompteenfant NUMBER) AS
BEGIN
   INSERT INTO CompteEnfant (IdEnfant, IdParent, IdCompteEnfant) VALUES (idenfant, idparent, idcompteenfant);
END AjouterCreerCompteEnfant;
/
CREATE PROCEDURE AjouterGouter(gateau VARCHAR2, boisson VARCHAR2, prix FLOAT, idgouter NUMBER) AS
BEGIN
   INSERT INTO Gouter (Gateau, Boisson, PrixGouter, IdGouter) VALUES (gateau, boisson, prix, idgouter);
END AjouterGouter;
/

CREATE PROCEDURE AjouterProdSupp(nomprodsupp VARCHAR2, prixprodsupp FLOAT, idprodsupp NUMBER) AS
BEGIN
    INSERT INTO ProduitSupplementaire (NomProdSupp, PrixProdSupp, IdProdSupp) VALUES (nomprodsupp, prixprodsupp, idprodsupp);
END AjouterProdSupp;
/

CREATE PROCEDURE ModifierPrixGouter(newprix FLOAT, idgouter NUMBER) AS
BEGIN
    UPDATE Gouter SET PrixGouter = newprix WHERE IdGouter = idgouter;
END ModifierPrixGouter;
/

CREATE PROCEDURE ModifierPrixProdSupp(newprix FLOAT, idprodsupp NUMBER) AS
BEGIN
    UPDATE ProduitSupplementaire SET PrixProdSupp = newprix WHERE IdProdSupp = idprodsupp;
END ModifierPrixProdSupp;
/

CREATE PROCEDURE SupprimerParent(nomparent VARCHAR2) AS
BEGIN
        DELETE FROM Parent WHERE NomParent = nomparent;
END SupprimerParent;
/

CREATE PROCEDURE SupprimerCompteEnfant(idenfant NUMBER) AS
BEGIN
        DELETE FROM CompteEnfant WHERE IdEnfant = idenfant;
END SupprimerCompteEnfant;
/

CREATE PROCEDURE SupprimerConsommation(idenfant NUMBER, dateconso DATE) AS
BEGIN
        DELETE FROM Consommation WHERE IdEnfant = idenfant AND DateConso = dateconso;
END SupprimerConsommation;
/

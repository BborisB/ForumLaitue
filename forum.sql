DROP TABLE IF EXISTS utilisateur;
CREATE TABLE utilisateur(
   idUtilisateur INT AUTO_INCREMENT,
   email VARCHAR(50)  NOT NULL,
   nom VARCHAR(50)  NOT NULL,
   prenom VARCHAR(50)  NOT NULL,
   motDePasse VARCHAR(60)  NOT NULL,
   photo VARCHAR(50)  NOT NULL,
   derniereConnexion DATETIME,
   PRIMARY KEY(idUtilisateur)
);

DROP TABLE IF EXISTS categorie;
CREATE TABLE categorie(
   idCategorie INT AUTO_INCREMENT,
   titreCategorie VARCHAR(50)  NOT NULL,
   descCategorie TEXT  NOT NULL,
   PRIMARY KEY(idCategorie)
);
INSERT INTO categorie (titreCategorie, descCategorie) VALUES
("Commerce", "Découvrez et échangez les meilleures astuces de cuisine avec la laitue, et partagez vos meilleures recettes de laitue ici."),
("Culture", "Découvrez et échangez les méthodes de culture de la laitue, et partagez avec les cultivateurs pour découvrir les secrets de la laitue."),
("Cuisine", "Découvrez et échangez avec les marchands, commercants et autres fans de laitue, et partagez vos meilleurs plans pour acheter de la laitue.");

DROP TABLE IF EXISTS sujet;
CREATE TABLE sujet(
   idSujet INT AUTO_INCREMENT,
   titreSujet VARCHAR(50)  NOT NULL,
   idUtilisateur INT NOT NULL,
   idCategorie VARCHAR(50)  NOT NULL,
   PRIMARY KEY(idSujet),
   FOREIGN KEY(idUtilisateur) REFERENCES utilisateur(idUtilisateur),
   FOREIGN KEY(idCategorie) REFERENCES Categorie(idCategorie)
);

DROP TABLE IF EXISTS  message;
CREATE TABLE message(
   idMessage INT AUTO_INCREMENT,
   textMessage TEXT  NOT NULL,
   dateMessage DATETIME NOT NULL,
   idUtilisateur INT NOT NULL,
   idSujet INT NOT NULL,
   PRIMARY KEY(idMessage),
   FOREIGN KEY(idUtilisateur) REFERENCES utilisateur(idUtilisateur),
   FOREIGN KEY(idSujet) REFERENCES sujet(idSujet)
);

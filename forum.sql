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

CREATE TABLE Categorie(
   idCategorie INT AUTO_INCREMENT,
   titreCategorie VARCHAR(50)  NOT NULL,
   descCategorie TEXT  NOT NULL,
   PRIMARY KEY(idCategorie)
);

CREATE TABLE sujet(
   idSujet INT AUTO_INCREMENT,
   titreSujet VARCHAR(50)  NOT NULL,
   idUtilisateur INT NOT NULL,
   idCategorie VARCHAR(50)  NOT NULL,
   PRIMARY KEY(idSujet),
   FOREIGN KEY(idUtilisateur) REFERENCES utilisateur(idUtilisateur),
   FOREIGN KEY(idCategorie) REFERENCES Categorie(idCategorie)
);

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

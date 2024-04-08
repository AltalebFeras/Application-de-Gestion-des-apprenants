
CREATE TABLE AGA_Cours
(
  ID_Cours       INTEGER NOT NULL AUTO_INCREMENT,
  Date_Cours     DATE    NOT NULL,
  Heure_Debut    TIME    NOT NULL,
  Heure_Fin      TIME    NOT NULL,
  Code_Aleatoire INTEGER NOT NULL,
  ID_Promo       INTEGER NOT NULL,
  PRIMARY KEY (ID_Cours)
);

ALTER TABLE AGA_Cours
  ADD CONSTRAINT UQ_ID_Cours UNIQUE (ID_Cours);

CREATE TABLE AGA_Participation_Statuts
(
  ID_Statuts     INTEGER NOT NULL AUTO_INCREMENT,
  ID_Cours       INTEGER NOT NULL,
  ID_Utilisateur INTEGER NOT NULL,
  PRIMARY KEY (ID_Statuts)
);

ALTER TABLE AGA_Participation_Statuts
  ADD CONSTRAINT UQ_ID_Statuts UNIQUE (ID_Statuts);

CREATE TABLE AGA_Promos
(
  ID_Promo    INTEGER      NOT NULL AUTO_INCREMENT,
  Nom         VARCHAR(255) NOT NULL,
  Date_Debut  DATE         NOT NULL,
  Date_Fin    DATE         NOT NULL,
  Place_Dispo INTEGER      NOT NULL,
  PRIMARY KEY (ID_Promo)
);

ALTER TABLE AGA_Promos
  ADD CONSTRAINT UQ_ID_Promo UNIQUE (ID_Promo);

CREATE TABLE AGA_Roles
(
  ID_Role  INTEGER      NOT NULL AUTO_INCREMENT,
  Nom_Role VARCHAR(255) NOT NULL,
  PRIMARY KEY (ID_Role)
);

ALTER TABLE AGA_Roles
  ADD CONSTRAINT UQ_ID_Role UNIQUE (ID_Role);

CREATE TABLE AGA_Utilisateurs
(
  ID_Utilisateur INTEGER      NOT NULL AUTO_INCREMENT,
  Nom            VARCHAR(255) NOT NULL,
  Prenom         VARCHAR(255) NOT NULL,
  Email          VARCHAR(255) NOT NULL,
  Mot_De_Passe   VARCHAR(255) NOT NULL,
  ID_Role        INTEGER      NOT NULL,
  PRIMARY KEY (ID_Utilisateur)
);

ALTER TABLE AGA_Utilisateurs
  ADD CONSTRAINT UQ_ID_Utilisateur UNIQUE (ID_Utilisateur);

ALTER TABLE AGA_Utilisateurs
  ADD CONSTRAINT UQ_Email UNIQUE (Email);

CREATE TABLE AGA_Utilisateurs_Promos
(
  ID_Utilisateur INTEGER NOT NULL,
  ID_Promo       INTEGER NOT NULL
);

ALTER TABLE AGA_Participation_Statuts
  ADD CONSTRAINT FK_AGA_Cours_TO_AGA_Participation_Statuts
    FOREIGN KEY (ID_Cours)
    REFERENCES AGA_Cours (ID_Cours);

ALTER TABLE AGA_Participation_Statuts
  ADD CONSTRAINT FK_AGA_Utilisateurs_TO_AGA_Participation_Statuts
    FOREIGN KEY (ID_Utilisateur)
    REFERENCES AGA_Utilisateurs (ID_Utilisateur);

ALTER TABLE AGA_Cours
  ADD CONSTRAINT FK_AGA_Promos_TO_AGA_Cours
    FOREIGN KEY (ID_Promo)
    REFERENCES AGA_Promos (ID_Promo);

ALTER TABLE AGA_Utilisateurs
  ADD CONSTRAINT FK_AGA_Roles_TO_AGA_Utilisateurs
    FOREIGN KEY (ID_Role)
    REFERENCES AGA_Roles (ID_Role);

ALTER TABLE AGA_Utilisateurs_Promos
  ADD CONSTRAINT FK_AGA_Utilisateurs_TO_AGA_Utilisateurs_Promos
    FOREIGN KEY (ID_Utilisateur)
    REFERENCES AGA_Utilisateurs (ID_Utilisateur);

ALTER TABLE AGA_Utilisateurs_Promos
  ADD CONSTRAINT FK_AGA_Promos_TO_AGA_Utilisateurs_Promos
    FOREIGN KEY (ID_Promo)
    REFERENCES AGA_Promos (ID_Promo);

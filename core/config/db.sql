SHOW DATABASES;

CREATE DATABASE biblioschool;

USE biblioschool;

CREATE Table `Categorie` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    categorie VARCHAR(100),
    description VARCHAR(500)
)ENGINE=INNODB;

CREATE Table `Etat` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    categorie VARCHAR(100),
    description VARCHAR(500)
)ENGINE=INNODB;

CREATE Table `Role` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    categorie VARCHAR(100),
    description VARCHAR(500)
)ENGINE=INNODB;

CREATE Table `Tag` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    categorie VARCHAR(100),
    description VARCHAR(500)
)ENGINE=INNODB;



CREATE Table `Livre` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    auteur VARCHAR(100),
    name VARCHAR(100),
    description VARCHAR(100),
    fk_categorie INT,
    FOREIGN KEY (fk_categorie) REFERENCES Categorie(id)
)ENGINE=INNODB;


CREATE Table `Reservation` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    duration INT,
    fk_etat INT,
    fk_livre INT,
    FOREIGN KEY (fk_etat) REFERENCES Etat (id),
    FOREIGN KEY (fk_livre) REFERENCES Livre (id)
)ENGINE=INNODB;

CREATE Table `Utilisateur` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    fullname VARCHAR(100),
    email VARCHAR(100),
    password VARCHAR(100),
    phone VARCHAR(100),
    fk_role INT,
    fk_reservation INT,
    fk_Ulivre INT,
    FOREIGN KEY (fk_role) REFERENCES Role (id),
    FOREIGN KEY (fk_reservation) REFERENCES Reservation (id),
    FOREIGN KEY (fk_Ulivre) REFERENCES Livre (id)
)ENGINE=INNODB;



CREATE Table `LivreTag` (
    tag_id INT,
    livre_id INT,
    PRIMARY KEY (tag_id , livre_id),
    Foreign Key (tag_id) REFERENCES  Tag(id),
    Foreign Key (livre_id) REFERENCES  Livre(id)
)ENGINE=INNODB;


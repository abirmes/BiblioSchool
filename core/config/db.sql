
SHOW DATABASES;

CREATE DATABASE biblioschool;

USE biblioschool;

CREATE Table `Categorie` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    categorie VARCHAR(100),
    description VARCHAR(500)
);
CREATE Table `Etat` (
    id INT PRIMARY KEY AUTO_INCREMENT,
    categorie VARCHAR(100),
    description VARCHAR(500)
);



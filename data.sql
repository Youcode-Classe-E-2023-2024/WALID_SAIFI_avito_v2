CREATE TABLE annonces (
    id_annonce INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    description TEXT,
    prix DECIMAL(10, 2) NOT NULL,
    telephone VARCHAR(20),
    email VARCHAR(255) NOT NULL,
    id_user INT NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users(user_id)
);
CREATE TABLE roles (
    id_role INT AUTO_INCREMENT PRIMARY KEY,
    role VARCHAR(50) NOT NULL
);


CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    id_role INT NOT NULL,
    FOREIGN KEY (id_role) REFERENCES roles(id_role)
);
INSERT INTO roles (role) VALUES ('admin');
INSERT INTO roles (role) VALUES ('annonceur');
INSERT INTO roles (role) VALUES ('client');


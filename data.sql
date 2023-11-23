CREATE DATABASE DB_anonce_v2;

CREATE TABLE annonces (
    id_annonce INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) ,
    description TEXT,
    prix DECIMAL(10, 2) ,
    telephone VARCHAR(20),
    email VARCHAR(255) ,
    id_user INT ,
    FOREIGN KEY (id_user) REFERENCES users(user_id)
);
CREATE TABLE roles (
    id_role INT AUTO_INCREMENT PRIMARY KEY,
    role VARCHAR(50) 
);


CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) ,
    password VARCHAR(255) ,
    id_role INT ,
    FOREIGN KEY (id_role) REFERENCES roles(id_role)
);


INSERT INTO roles (role) VALUES ('admin');
INSERT INTO roles (role) VALUES ('annonceur');
INSERT INTO roles (role) VALUES ('client');
INSERT INTO users (username, password, id_role) VALUES ('md@2018', '123', 1);
INSERT INTO users (username, password, id_role) VALUES ('yo@2013', '234', 2);
INSERT INTO users (username, password, id_role) VALUES ('a@2013', '234', 3);
INSERT INTO users (username, password, id_role) VALUES ('b@2013', '234', 3);
INSERT INTO users (username, password, id_role) VALUES ('c@2013', '234', 3);


SELECT users.user_id, users.username, users.password, roles.role
FROM users JOIN roles ON 
users.id_role = roles.id_role;
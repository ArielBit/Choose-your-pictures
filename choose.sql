CREATE DATABASE choose;
USE choose;
CREATE TABLE chose(
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  user VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL UNIQUE,
  mot_de_passe VARCHAR(255) NOT NULL,
  img ENUM('img1', 'img2', 'img3, 'img4', 'img5', 'img6') );

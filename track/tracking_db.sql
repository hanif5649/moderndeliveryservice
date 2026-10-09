CREATE DATABASE IF NOT EXISTS tracking_db;
USE tracking_db;

CREATE TABLE admin (
  id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL,
  password VARCHAR(255) NOT NULL
);

INSERT INTO admin (username, password) VALUES ('admin', MD5('admin123'));

CREATE TABLE packages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  tracking_number VARCHAR(50) NOT NULL UNIQUE,
  sender_name VARCHAR(100),
  sender_address VARCHAR(200),
  sender_phone VARCHAR(50),
  receiver_name VARCHAR(100),
  receiver_address VARCHAR(200),
  receiver_phone VARCHAR(50),
  receiver_email VARCHAR(100),
  weight VARCHAR(50),
  type VARCHAR(50),
  ship_date DATE,
  status VARCHAR(100),
  location VARCHAR(100),
  last_update DATETIME,
  details TEXT,
  image VARCHAR(200)
);

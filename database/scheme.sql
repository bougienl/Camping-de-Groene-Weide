CREATE DATABASE contact_form_db;

USE contact_form_db;

CREATE TABLE contact_form (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone INT(15) UNSIGNED,
    message TEXT NOT NULL,
    submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    status ENUM('new', 'read', 'archived') DEFAULT 'new'
);

CREATE INDEX email_index ON contact_form (email);

INSERT INTO contact_form (name, email, message) 
VALUES 
('John Doe', 'johndoe@example.com', 'Hallo, ik wil meer informatie over jullie diensten.'),
('Jane Smith', 'janesmith@example.com', 'Kun je mij bellen over mijn vragen?');

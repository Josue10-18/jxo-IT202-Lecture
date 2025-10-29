SHOW DATABASES;
CREATE TABLE admins (
adminID      INT(11)      NOT NULL   AUTO_INCREMENT,
emailAddress VARCHAR(255) NOT NULL   UNIQUE,
password     CHAR(64)     NOT NULL,
firstName    VARCHAR(60)  NOT NULL,
lastName     VARCHAR(60)  NOT NULL,
PRIMARY KEY (adminID)
);
SHOW TABLES;

SHOW CREATE TABLE admins;

DESCRIBE admins;

INSERT INTO admins
(emailAddress, password, firstName, lastName)
VALUES
('josue@shirt.com', SHA2('FZD#2005', 256), 'Josue', 'Ortiz');
INSERT INTO admins (emailAddress, password, firstName, lastName)
VALUES ('juan@shirtmanager.com', SHA2('Juan123', 256), 'Juan', 'Placenino');

SELECT * FROM admins;
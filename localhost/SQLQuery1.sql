create database imagesBase1;
use imagesBase1;

CREATE TABLE Images (
    ImageID INT PRIMARY KEY AUTO_INCREMENT,
    ImageData LONGBLOB,
    ImageName VARCHAR(255)
);

CREATE TABLE Requests (
    requestId INT PRIMARY KEY AUTO_INCREMENT,
    userName varchar(255),
    email VARCHAR(255),
    details MEDIUMTEXT
);

CREATE TABLE Admins (
    adminId INT PRIMARY KEY AUTO_INCREMENT,
    userName varchar(255),
    admPassword CHAR(255)
);

SELECT * FROM Admins WHERE userName = 'admin1';

select * from Images;
select * from Requests;
select * from Admins;

delete from Images where ImageID = '3';
delete from Admins where adminId = '1';

select ImageData from Images where ImageName = 'aboutus1';
CREATE USER 'root'@'%' IDENTIFIED BY 'root';
GRANT ALL PRIVILEGES ON imagesBase1.* TO 'root'@'%';
FLUSH PRIVILEGES;

update Images set ImageID = '3' where ImageName = 'imgint2';
update Images set ImageID = '5' where ImageName = 'imgint3';

imgint2 imgint3 imgint4
GRANT ALL PRIVILEGES ON your_database_name.* TO 'root'@'%';
FLUSH PRIVILEGES;
SHOW GRANTS FOR 'root'@'%';

SELECT ImageData FROM Images WHERE ImageName = 'mainimg'
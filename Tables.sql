USE [Cosmetics] 
CREATE TABLE Customer(
id_customer int IDENTITY PRIMARY KEY,
email varchar(40) NOT NULL UNIQUE,
pass varchar(30) NOT NULL,
isAdmin bit,
lastName varchar(20) NOT NULL,
firstName varchar(20) NOT NULL,
secondName varchar(20),
clientAddress varchar(40) NOT NULL,
clientPhone varchar(20) CHECK(ClientPhone LIKE '+375[234][3459][0-9][0-9][0-9][0-9][0-9][0-9][0-9]'))

CREATE TABLE Category(
id_category int IDENTITY PRIMARY KEY,
categoryName varchar(30) NOT NULL)

CREATE TABLE Suppliers(
id_supplier int IDENTITY PRIMARY KEY,
companyName varchar(40) NOT NULL,
supplierPhone varchar(20) NOT NULL,
contactName varchar(30),
Country varchar(20) NOT NULL,
City varchar(20) NOT NULL,
SupplierAddress varchar(40) NOT NULL)
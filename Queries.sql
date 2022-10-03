CREATE TABLE AdminTable(AName VARCHAR(30), UName VARCHAR(30),Id INT PRIMARY KEY ,AdRegion VARCHAR(30),AdPassword VARCHAR(30));
CREATE TABLE Officer(OName VARCHAR(30),Id INT PRIMARY KEY,OfPassword VARCHAR(30),OfAddress VARCHAR(50),PhoneNo CHAR(10), Job VARCHAR(15),UName VARCHAR(30));
CREATE TABLE Criminal(CNo INT PRIMARY KEY,CName VARCHAR(30), DOB DATE, Height FLOAT, CWeight FLOAT, Gender VARCHAR(10),Age INT,IdMark VARCHAR(100));
CREATE TABLE FIR(FIRId INT,FIRDate DATE,FIRType VARCHAR(30),FIRDesc VARCHAR(100),CNo INT FOREIGN KEY REFERENCES Criminal(CNo));
CREATE TABLE Crime(Section VARCHAR(5),Proof VARCHAR(30),Descr VARCHAR(50),Loc VARCHAR(10),Punishment VARCHAR(30),CType VARCHAR(30),CNo INT FOREIGN KEY REFERENCES Criminal(CNo));
CREATE TABLE Court(CoName VARCHAR(30),CNo INT FOREIGN KEY REFERENCES Criminal(CNo),PubPro VARCHAR(25),GovPro VARCHAR(25),CoAddress VARCHAR(50),Mode VARCHAR(30),Judge VARCHAR(25));
CREATE TABLE Prison(Place VARCHAR(15),PType VARCHAR(15),Loc VARCHAR(15),Duration VARCHAR(30),RDate DATE,CNo INT FOREIGN KEY REFERENCES Criminal(CNo));
CREATE TABLE CWitness(WName VARCHAR(25),Age INT,Relation VARCHAR(25), Gender VARCHAR(10), DOB DATE,WAddress VARCHAR(50),PhoneNo CHAR(10),CNo INT FOREIGN KEY REFERENCES Criminal(CNo));
CREATE SEQUENCE seq_1 START WITH 1000 INCREMENT BY 5;
INSERT INTO AdminTable VALUES('Fred','AdminRjpm',NEXT VALUE FOR seq_1,'Rajapalayam','123');
SELECT * FROM AdminTable;
SELECT * FROM Officer;
SELECT * FROM Criminal;
SELECT * FROM Crime;
SELECT * FROM FIR;
SELECT * FROM Court;
DROP TABLE CWitness;
DROP SEQUENCE seq_1;
TRUNCATE TABLE Prison;
DELETE FROM Criminal;
exec sp_help CWitness;

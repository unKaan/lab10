CREATE TABLE Dentist_Auth(
  nom varchar(255),
  auth varchar(255) default md5(random()::text)
);

CREATE TABLE Dentist_client(
  auth_d varchar(255),
  client_nom varchar(255),
  adhesion date default current_date
);

INSERT INTO Dentist_Auth(nom)
VALUES('A'),
      ('B');

INSERT INTO Dentist_client(auth_d, client_nom)
VALUES('f7474ec2279b14cf21adf56b19953ade','Rachel'),
      ('f7474ec2279b14cf21adf56b19953ade','Charan'),
      ('f7474ec2279b14cf21adf56b19953ade','Maude'),
      ('f7474ec2279b14cf21adf56b19953ade','Rickie'),
      ('5fc2dd7ac5ee01f5a289e232722b7481','Richie'),
      ('5fc2dd7ac5ee01f5a289e232722b7481','Rac'),
      ('d7d85f7eac7360d725b44d327445473e','Big Co.'),
      ('9f8983a8494c8a003e064374ffb77cb6','Small Co.'),
      ('5fc2dd7ac5ee01f5a289e232722b7481','Rahel');

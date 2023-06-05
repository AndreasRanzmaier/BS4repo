create schema autohaus;
-- drop schema autohaus;
use autohaus;

-- Create Fahrzeugart table
CREATE TABLE Fahrzeugart (
  ID INT PRIMARY KEY,
  Bezeichnung VARCHAR(50) NOT NULL
);

-- Create Marke table
CREATE TABLE Marke (
  ID INT PRIMARY KEY,
  Bezeichnung VARCHAR(50) NOT NULL
);

-- Create Fahrzeugtyp table
CREATE TABLE Fahrzeugtyp (
  ID INT PRIMARY KEY,
  Bezeichnung VARCHAR(50) NOT NULL
);

-- Create Person table
CREATE TABLE Person (
  ID INT PRIMARY KEY,
  Name VARCHAR(50) NOT NULL,
  Adresse VARCHAR(100) NOT NULL
);

-- Create Kunde table
CREATE TABLE Kunde (
  PersonID INT PRIMARY KEY,
  FOREIGN KEY (PersonID) REFERENCES Person(ID)
);

-- Create Angestellter table
CREATE TABLE Angestellter (
  PersonID INT PRIMARY KEY,
  FOREIGN KEY (PersonID) REFERENCES Person(ID)
);

-- Create Sonderausstattung table
CREATE TABLE Sonderausstattung (
  ID INT PRIMARY KEY,
  Bezeichnung VARCHAR(100) NOT NULL
);

-- Create Fahrzeug table
CREATE TABLE Fahrzeug (
  Fahrgestellnummer VARCHAR(50) PRIMARY KEY,
  Baujahr INT NOT NULL,
  Kilometerstand INT NOT NULL,
  FahrzeugartID INT,
  MarkeID INT,
  FahrzeugtypID INT,
  PersonID INT,
  FOREIGN KEY (FahrzeugartID) REFERENCES Fahrzeugart(ID),
  FOREIGN KEY (MarkeID) REFERENCES Marke(ID),
  FOREIGN KEY (FahrzeugtypID) REFERENCES Fahrzeugtyp(ID),
  FOREIGN KEY (PersonID) REFERENCES Person(ID)
);

-- Create Besitzt relationship table
CREATE TABLE Besitzt (
  FahrzeugID VARCHAR(50),
  PersonID INT,
  PRIMARY KEY (FahrzeugID, PersonID),
  FOREIGN KEY (FahrzeugID) REFERENCES Fahrzeug(Fahrgestellnummer),
  FOREIGN KEY (PersonID) REFERENCES Person(ID)
);

-- Create Verkauft relationship table
CREATE TABLE Verkauft (
  FahrzeugID VARCHAR(50),
  KundeID INT,
  AngestellterID INT,
  PRIMARY KEY (FahrzeugID, KundeID),
  FOREIGN KEY (FahrzeugID) REFERENCES Fahrzeug(Fahrgestellnummer),
  FOREIGN KEY (KundeID) REFERENCES Kunde(PersonID),
  FOREIGN KEY (AngestellterID) REFERENCES Angestellter(PersonID)
);

-- Create Hat_Sonderausstattung relationship table
CREATE TABLE Hat_Sonderausstattung (
  FahrzeugID VARCHAR(50),
  SonderausstattungID INT,
  PRIMARY KEY (FahrzeugID, SonderausstattungID),
  FOREIGN KEY (FahrzeugID) REFERENCES Fahrzeug(Fahrgestellnummer),
  FOREIGN KEY (SonderausstattungID) REFERENCES Sonderausstattung(ID)
);
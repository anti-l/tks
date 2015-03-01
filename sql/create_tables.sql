-- Lisää CREATE TABLE lauseet tähän tiedostoon

CREATE TABLE Genre(
	id SERIAL PRIMARY KEY,
	genretxt varchar(255)
);


CREATE TABLE Kayttaja(
	id SERIAL PRIMARY KEY ,
	nimi varchar(255) NOT NULL,
	salasana varchar(255) NOT NULL
);

CREATE TABLE Peli(
	id SERIAL PRIMARY KEY ,
	omistaja INTEGER REFERENCES Kayttaja(id) ON DELETE CASCADE,
	nimi varchar(255) NOT NULL,
	julkaisuvuosi INTEGER,
	julkaisija varchar(255),
	pelaajat_min INTEGER,
	pelaajat_max INTEGER,
	lisayspaiva DATE,
	kuvaus varchar(5000)
);

CREATE TABLE Arvostelu(
	id SERIAL PRIMARY KEY ,
	arvostelija INTEGER REFERENCES Kayttaja(id) ON DELETE CASCADE,
	peli INTEGER REFERENCES Peli(id) ON DELETE CASCADE,
	arvostelu varchar(5000),
	arvio decimal
);

CREATE TABLE Statistiikka(
	id SERIAL PRIMARY KEY ,
	peli_id INTEGER REFERENCES Peli(id) ON DELETE CASCADE,
	kayttaja_id INTEGER REFERENCES Kayttaja(id) ON DELETE CASCADE,
	stats varchar(5000)
);

CREATE TABLE Peli_Genre(
	id SERIAL PRIMARY KEY ,
	peli_id INTEGER REFERENCES Peli(id) ON DELETE CASCADE,
	genre_id INTEGER REFERENCES Genre(id) ON DELETE CASCADE
);





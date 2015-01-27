-- Lisää CREATE TABLE lauseet tähän tiedostoon

CREATE TABLE Kayttaja(
	id SERIAL PRIMARY KEY,
	nimi varchar(255) NOT NULL,
	salasana varchar(255) NOT NULL
);

CREATE TABLE Peli(
	id SERIAL PRIMARY KEY,
	omistaja INTEGER REFERENCES Kayttaja(id),
	nimi varchar(255) NOT NULL,
	julkaisuvuosi INTEGER,
	julkaisija varchar(255),
	tyyppi INTEGER,
	pelaajat_min INTEGER,
	pelaajat_max INTEGER,
	lisayspaiva DATE,
	kuvaus varchar(5000)
);

CREATE TABLE Arvostelu(
	id SERIAL PRIMARY KEY,
	arvostelija INTEGER REFERENCES Kayttaja(id),
	arvostelu varchar(5000),
	arvio decimal
);

CREATE TABLE Statistiikka(
	id SERIAL PRIMARY KEY,
	peli_id INTEGER REFERENCES Peli(id),
	stats varchar(5000)
);

CREATE TABLE Genre(
	id SERIAL PRIMARY KEY,
	genretxt varchar(255)
);


CREATE TABLE Peli_Genre(
	id SERIAL PRIMARY KEY,
	peli_id INTEGER REFERENCES Peli(id),
	genre_id INTEGER REFERENCES Genre(id)
);





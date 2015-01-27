-- Lisää INSERT INTO lauseet tähän tiedostoon
INSERT INTO Kayttaja (nimi, salasana) VALUES ('Antti', 'porkkana3');
INSERT INTO Kayttaja (nimi, salasana) VALUES ('Matti', 'peruna2');

INSERT INTO Peli (omistaja, nimi, julkaisuvuosi, julkaisija, pelaajat_min, pelaajat_max, lisayspaiva) VALUES ('1', 'Arkham Horror', '2005', 'Fantasy Flight Games', '1', '8', NOW());

INSERT INTO Genre (genretxt) VALUES ('Horror');

INSERT INTO Statistiikka (peli_id, stats) VALUES ('1', 'Voitto');

INSERT INTO Arvostelu (arvostelija, arvostelu, arvio) VALUES ('1', 'Hyvä yhteistyötä vaativa lautapeli. Lisäosilla hankala. Nopea omaksua!', '5');




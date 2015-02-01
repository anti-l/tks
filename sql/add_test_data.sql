-- Lisää INSERT INTO lauseet tähän tiedostoon
INSERT INTO Kayttaja (nimi, salasana) VALUES ('Antti', 'porkkana3');
INSERT INTO Kayttaja (nimi, salasana) VALUES ('Matti', 'peruna2');

INSERT INTO Peli (omistaja, nimi, julkaisuvuosi, julkaisija, pelaajat_min, pelaajat_max, lisayspaiva, kuvaus) VALUES ('1', 'Arkham Horror', '2005', 'Fantasy Flight Games', '1', '8', '2015-01-25', 'Richard Launiuksen suunnittelema H.P. Lovecraftin maailmaan sijoittuva yhteistyö- ja seikkailulautapeli.');
INSERT INTO Peli (omistaja, nimi, julkaisuvuosi, julkaisija, pelaajat_min, pelaajat_max, lisayspaiva, kuvaus) VALUES ('1', 'Agricola', '2007', 'Lookout Games', '1', '5', '2015-01-27', 'Monimutkainen maanviljelykseen, oman maatilan kehittämiseen ja eläinten kasvatukseen keskittyvä europeli.');
INSERT INTO Peli (omistaja, nimi, julkaisuvuosi, julkaisija, pelaajat_min, pelaajat_max, lisayspaiva) VALUES ('2', 'Twilight Imperium III', '2005', 'Fantasy Flight Games', '3', '6', '2015-01-30', 'Yksi eeppisimmistä avaruusstrategiapeleistä. Vie noin 12 tuntia aikaa pelata läpi. Kuin entisaikojen Master of Orion, mutta lautapelinä.');
INSERT INTO Peli (omistaja, nimi, julkaisuvuosi, julkaisija, pelaajat_min, pelaajat_max, lisayspaiva) VALUES ('1', 'Eclipse', '2011', 'LautapelitFi', '2', '6', '2015-02-01', 'Suomalainen, erinomainen avaruusstrategiapeli. Lainaa paljon europeleistä ja muista avaruusstrategiapeleistä, mutta luo oman maailmansa.');

INSERT INTO Genre (genretxt) VALUES ('Horror');

INSERT INTO Statistiikka (peli_id, stats) VALUES ('1', 'Voitto');

INSERT INTO Arvostelu (arvostelija, arvostelu, arvio) VALUES ('1', 'Hyvä yhteistyötä vaativa lautapeli. Lisäosilla hankala. Nopea omaksua!', '5');




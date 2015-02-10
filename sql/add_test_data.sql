-- Lisää INSERT INTO lauseet tähän tiedostoon
INSERT INTO Kayttaja (nimi, salasana) VALUES ('Antti', 'porkkana3');
INSERT INTO Kayttaja (nimi, salasana) VALUES ('Matti', 'peruna2');
INSERT INTO Kayttaja (nimi, salasana) VALUES ('Pekka', 'sipuli1');
INSERT INTO Kayttaja (nimi, salasana) VALUES ('Juhani', 'lanttu4');
INSERT INTO Kayttaja (nimi, salasana) VALUES ('Ville', 'punajuuri5');

INSERT INTO Peli (omistaja, nimi, julkaisuvuosi, julkaisija, pelaajat_min, pelaajat_max, lisayspaiva, kuvaus) VALUES ('5', 'Arkham Horror', '2005', 'Fantasy Flight Games', '1', '8', '2015-01-25', 'Richard Launiuksen suunnittelema H.P. Lovecraftin maailmaan sijoittuva yhteistyö- ja seikkailulautapeli.');
INSERT INTO Peli (omistaja, nimi, julkaisuvuosi, julkaisija, pelaajat_min, pelaajat_max, lisayspaiva, kuvaus) VALUES ('1', 'Agricola', '2007', 'Lookout Games', '1', '5', '2015-01-27', 'Monimutkainen maanviljelykseen, oman maatilan kehittämiseen ja eläinten kasvatukseen keskittyvä europeli.');
INSERT INTO Peli (omistaja, nimi, julkaisuvuosi, julkaisija, pelaajat_min, pelaajat_max, lisayspaiva, kuvaus) VALUES ('2', 'Twilight Imperium III', '2005', 'Fantasy Flight Games', '3', '6', '2015-01-30', 'Yksi eeppisimmistä avaruusstrategiapeleistä. Vie noin 12 tuntia aikaa pelata läpi. Kuin entisaikojen Master of Orion, mutta lautapelinä.');
INSERT INTO Peli (omistaja, nimi, julkaisuvuosi, julkaisija, pelaajat_min, pelaajat_max, lisayspaiva, kuvaus) VALUES ('3', 'Eclipse', '2011', 'LautapelitFi', '2', '6', '2015-02-01', 'Suomalainen, erinomainen avaruusstrategiapeli. Lainaa paljon europeleistä ja muista avaruusstrategiapeleistä, mutta luo oman maailmansa.');
INSERT INTO Peli (omistaja, nimi, julkaisuvuosi, julkaisija, pelaajat_min, pelaajat_max, lisayspaiva, kuvaus) VALUES ('5', 'Ticket to Ride', '2004', 'Days of Wonder', '2', '5', '2015-02-10', 'Yksinkertainen mutta viihdyttävä lautapeli junaratojen rakentamisesta. Sopii hyvin aloittelijoillekin. Parhaimmillaan neljällä pelaajalla.');
INSERT INTO Peli (omistaja, nimi, julkaisuvuosi, julkaisija, pelaajat_min, pelaajat_max, lisayspaiva, kuvaus) VALUES ('3', 'Blood Bowl', '1986', 'Games Workshop', '2', '2', '2015-02-10', 'Jenkkifudiksen ja Warhammerin maailman yhdistävä verinen lautapeli.');
INSERT INTO Peli (omistaja, nimi, julkaisuvuosi, julkaisija, pelaajat_min, pelaajat_max, lisayspaiva, kuvaus) VALUES ('4', 'Twilight Struggle', '2005', 'GMT Games', '2', '2', '2015-02-10', 'Kylmää sotaa kuvaava 1vs1 lautapeli, jossa tehdään huonoja päätöksiä ja toivotaan niiden johtavan parempiin oloihin..');
INSERT INTO Peli (omistaja, nimi, julkaisuvuosi, julkaisija, pelaajat_min, pelaajat_max, lisayspaiva, kuvaus) VALUES ('1', 'Portobello Market', '2007', 'LautapelitFi', '2', '4', '2015-02-10', 'Lontoon Portobello Marketin kauppakojujen rakentelua ja kaupassa dominoimista vuonna 1901. Samoja elementtejä kuin Ticket to Ridessä, tämäkin on aloittelijaystävällinen peli.');
INSERT INTO Peli (omistaja, nimi, julkaisuvuosi, julkaisija, pelaajat_min, pelaajat_max, lisayspaiva, kuvaus) VALUES ('4', 'Puerto Rico', '2002', 'alea', '2', '5', '2015-02-10', 'Oman trooppisen banaanivaltion kehittämistä kolonialismin aikana. Klassinen europeli.');
INSERT INTO Peli (omistaja, nimi, julkaisuvuosi, julkaisija, pelaajat_min, pelaajat_max, lisayspaiva, kuvaus) VALUES ('4', 'Dead of Winter', '2014', 'Plaid Hat Games', '2', '5', '2015-02-10', 'Zombie apocalypsen jälkeinen peli, jossa eloonjääneet kokoontuvat yhteen rakennukseen ja koittavat yhdessä voittaa pelin. Yhteisen tavoitteen lisäksi jokaisella pelaajalla on oma tavoite, jolla pelin päättyessä hän voittaa.');

INSERT INTO Genre (genretxt) VALUES ('Horror');
INSERT INTO Genre (genretxt) VALUES ('Strategy');
INSERT INTO Genre (genretxt) VALUES ('Adventure');
INSERT INTO Genre (genretxt) VALUES ('Casual');
INSERT INTO Genre (genretxt) VALUES ('Advanced');
INSERT INTO Genre (genretxt) VALUES ('Sci-Fi');

INSERT INTO Statistiikka (peli_id, kayttaja_id, stats) VALUES ('1', '2', 'Voitto');
INSERT INTO Statistiikka (peli_id, kayttaja_id, stats) VALUES ('4', '1', 'Pitkän ja junnaavan pelin jälkeinen kirvelevä tappio, pisteet 21, 18, 12.');

INSERT INTO Arvostelu (arvostelija, peli, arvostelu, arvio) VALUES ('1', '1', 'Hyvä yhteistyötä vaativa lautapeli. Lisäosilla hankala. Nopea omaksua!', '5');
INSERT INTO Arvostelu (arvostelija, peli, arvostelu, arvio) VALUES ('2', '2', 'Monipuolinen harrastajan peli, ei aloittelijoille.', '4');
INSERT INTO Arvostelu (arvostelija, peli, arvostelu, arvio) VALUES ('1', '3', 'Eeppinen monen pelaajan avaruusstrategiapeli, vaatii paljon aikaa.', '5');

INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('1', '1');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('1', '3');
INSERT INTO Peli_genre (peli_id, genre_id) VALUES ('2', '2');
INSERT INTO Peli_genre (peli_id, genre_id) VALUES ('2', '5');
INSERT INTO Peli_genre (peli_id, genre_id) VALUES ('3', '6');
INSERT INTO Peli_genre (peli_id, genre_id) VALUES ('3', '5');
INSERT INTO Peli_genre (peli_id, genre_id) VALUES ('4', '6');





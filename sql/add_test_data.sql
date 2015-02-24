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

INSERT INTO Genre (genretxt) VALUES ('Co-Operative');
INSERT INTO Genre (genretxt) VALUES ('Competitive');
INSERT INTO Genre (genretxt) VALUES ('Horror');
INSERT INTO Genre (genretxt) VALUES ('Strategy');
INSERT INTO Genre (genretxt) VALUES ('Adventure');
INSERT INTO Genre (genretxt) VALUES ('Casual');
INSERT INTO Genre (genretxt) VALUES ('Advanced');
INSERT INTO Genre (genretxt) VALUES ('Sci-Fi');
INSERT INTO Genre (genretxt) VALUES ('Eurogame');
INSERT INTO Genre (genretxt) VALUES ('Simple');
INSERT INTO Genre (genretxt) VALUES ('Cardgame');
INSERT INTO Genre (genretxt) VALUES ('Boardgame');
INSERT INTO Genre (genretxt) VALUES ('Miniatures');
INSERT INTO Genre (genretxt) VALUES ('Sport');
INSERT INTO Genre (genretxt) VALUES ('Fantasy');
INSERT INTO Genre (genretxt) VALUES ('Trains');
INSERT INTO Genre (genretxt) VALUES ('Cold War');


INSERT INTO Statistiikka (peli_id, kayttaja_id, stats) VALUES ('1', '2', 'Voitto');
INSERT INTO Statistiikka (peli_id, kayttaja_id, stats) VALUES ('4', '1', 'Pitkän ja junnaavan pelin jälkeinen kirvelevä tappio, pisteet 21, 18, 12.');

INSERT INTO Arvostelu (arvostelija, peli, arvostelu, arvio) VALUES ('1', '1', 'Hyvä yhteistyötä vaativa lautapeli. Lisäosilla hankala. Nopea omaksua!', '5');
INSERT INTO Arvostelu (arvostelija, peli, arvostelu, arvio) VALUES ('2', '2', 'Monipuolinen harrastajan peli, ei aloittelijoille.', '4');
INSERT INTO Arvostelu (arvostelija, peli, arvostelu, arvio) VALUES ('1', '3', 'Eeppinen monen pelaajan avaruusstrategiapeli, vaatii paljon aikaa.', '5');
INSERT INTO Arvostelu (arvostelija, peli, arvostelu, arvio) VALUES ('4', '7', 'Huono peli, hävisin.', '1');
INSERT INTO Arvostelu (arvostelija, peli, arvostelu, arvio) VALUES ('5', '5', 'Kiva, yksinkertainen ja värikäs peli.', '4');
INSERT INTO Arvostelu (arvostelija, peli, arvostelu, arvio) VALUES ('2', '9', 'Monipuolinen europeli. Tätä lisää!', '5');
INSERT INTO Arvostelu (arvostelija, peli, arvostelu, arvio) VALUES ('3', '3', 'Parasta avaruusstrategiaa ikinä. Politiikkakortteja ehkä vähän liikaa, ensi kerralla katsotaan pakka läpi ja valitaan mukaan vain järkevimmät.', '5');
INSERT INTO Arvostelu (arvostelija, peli, arvostelu, arvio) VALUES ('3', '4', 'Suomessakin osataan tehdä laatua. Vähän turhan paljon pieniä puunappuloita tosin, eivät pysy laudalla.', '4');
INSERT INTO Arvostelu (arvostelija, peli, arvostelu, arvio) VALUES ('5', '8', 'Simppeli idea ymmärtää, kenties vaikea pelata hyvin? Parhaimmillaan 3+ pelaajalla.', '4');
INSERT INTO Arvostelu (arvostelija, peli, arvostelu, arvio) VALUES ('1', '6', 'Jenkkifutista ja warhammeria? Liian paljon nopanheittoja. Illegal procedure ärsyttää.', '2');
INSERT INTO Arvostelu (arvostelija, peli, arvostelu, arvio) VALUES ('4', '1', 'Tämä peli paranee, kun mukaan otetaan muutama lisäosa. Peruspeli liian helppo. Plussaa hyvästä tunnelmasta.', '4');
INSERT INTO Arvostelu (arvostelija, peli, arvostelu, arvio) VALUES ('2', '3', 'Hyökkää naapurisi kimppuun, toinen naapuri hyökkää sinun kimppuusi. Rauhassa elänyt sivilisaatio vahvistuu, kun muut sotivat.', '3');
INSERT INTO Arvostelu (arvostelija, peli, arvostelu, arvio) VALUES ('3', '5', 'Junapeli, josta junafanaatikot tykkäävät. Märklin-korteilla junafaneilta sulaa naamat. Sveitsi-lauta parasta pienille pelaajamäärille, eurooppa isommille.', '4');
INSERT INTO Arvostelu (arvostelija, peli, arvostelu, arvio) VALUES ('5', '2', 'Saksalainen maanviljely- ja suvunkasvatuspeli. Hankalahko ymmärtää, mutta peliin sisään päästyä loistava peli.', '4');
INSERT INTO Arvostelu (arvostelija, peli, arvostelu, arvio) VALUES ('4', '10', 'Co-op zombieapocalypse-peli. Ekassa pelissä minut heitettiin ulos kommuunista, kun ruoka loppui, ja jouduin lopettamaan pelini hylätyllä bensa-asemalla, jonne zombie-lauma hyökkäsi. Lohduttaa sekin, että muut hävisivät.', '4');
INSERT INTO Arvostelu (arvostelija, peli, arvostelu, arvio) VALUES ('2', '7', 'Kahden pelaajan kylmää sotaa simuloiva peli. Suurvallat kurmottaa toisiaan, jokainen kierros tuntuu sietämättömältä, kun pitää tehdä valintoja jotka satuttavat itseään. Silti loistava peli. Katso myös saman valmistajan Labyrinth!', '5');
INSERT INTO Arvostelu (arvostelija, peli, arvostelu, arvio) VALUES ('1', '7', 'Liikaa kortteja, liikaa valintoja. Ei nopeaan pelaamiseen.', '1');
INSERT INTO Arvostelu (arvostelija, peli, arvostelu, arvio) VALUES ('1', '8', 'Lontoon markkinakojujen tycoon. Jotain samaa kuin Ticket to Ridessa.', '4');
INSERT INTO Arvostelu (arvostelija, peli, arvostelu, arvio) VALUES ('3', '1', 'Taas se Cthulhu nousi merestä ja maailma tuhoutui.', '3');
INSERT INTO Arvostelu (arvostelija, peli, arvostelu, arvio) VALUES ('2', '6', 'Blood Bowl - kova 80-luvulla, kova edelleen.', '5');
INSERT INTO Arvostelu (arvostelija, peli, arvostelu, arvio) VALUES ('5', '10', 'Oma voittotavoite vaikea saavuttaa. Niin se on toisaalta muillakin.', '3');

-- 1: Arkham Horror, 2: Agricola, 3: TI3, 4: Eclipse, 5: Menolippu, 6: Bloodbowl, 7:TwilightStruggle, 8:Portobello, 9:PuertoRico, 10:DeadOfWinter
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('1', '1');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('1', '3');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('1', '12');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('1', '5');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('2', '2');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('2', '7');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('2', '4');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('2', '12');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('2', '9');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('3', '2');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('3', '4');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('3', '7');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('3', '8');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('3', '12');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('4', '2');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('4', '4');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('4', '7');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('4', '8');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('4', '9');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('4', '12');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('5', '2');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('5', '4');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('5', '6');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('5', '12');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('5', '16');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('6', '2');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('6', '4');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('6', '12');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('6', '13');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('6', '14');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('6', '15');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('7', '2');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('7', '4');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('7', '7');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('7', '12');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('7', '17');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('8', '2');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('8', '4');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('8', '6');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('8', '12');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('9', '2');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('9', '4');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('9', '7');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('9', '9');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('9', '12');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('10', '1');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('10', '2');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('10', '3');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('10', '4');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('10', '7');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('10', '9');
INSERT INTO Peli_Genre (peli_id, genre_id) VALUES ('10', '12');




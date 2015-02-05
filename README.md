# Aineopintojen harjoitustyö: Tietokantasovellus

Projektin aiheena on lautapeliarkisto. Arkistossa sisään kirjauduttuaan käyttäjä voi lisätä/poistaa/muokata arkiston sisältöä, tehdä arvosteluja ja selata arkiston sisältöä.

## Palautukset

### Viikko 1
Projektin [dokumentaatio](https://github.com/anti-l/tks/blob/master/doc/dokumentaatio.pdf) aloitettu.

Ensimmäinen päivitys: Sovellus alustettu ja versionhallinta otettu käyttöön.

### Viikko 2

Sovellukselle luotu suunnitelma sen käyttöliittymäksi:

* [Etusivu](http://luan.users.cs.helsinki.fi/tks/game/esim)
* [Sisäänkirjautuminen](http://luan.users.cs.helsinki.fi/tks/esim_login)
* [Yhden pelin näyttäminen](http://luan.users.cs.helsinki.fi/tks/esim_1)
* [Muokkaaminen](http://luan.users.cs.helsinki.fi/tks/game/esim_edit)

[Tietokantayhteys](http://luan.users.cs.helsinki.fi/tks/tietokantayhteys) muodostettu ja tauluja pystytetty.

[Dokumentaatioon](https://github.com/anti-l/tks/blob/master/doc/dokumentaatio.pdf) päivitetty järjestelmän tietosisältö sekä relaatiotietokantakaavio.

### Viikko 3

* Toteuta yksi malliluokka, jossa on
  * listaus- (all)
  * haku- (find)
  * lisäystoiminto (create) mukana
* Toteuta malli käyttämään kontrollerin metodit
  * Toteuta kontrolleriinmetodi tietokohteen olion lisäämisen tietokantaan käyttäjän lähettämän lomakkeen tiedoilla

### Viikko 4

* Lisää malliisi muokkaus- ja poistotoiminnot 
  * *Peli-luokassa*
* Lisää käyttäjälle mahdollisuus muokkaukseen ja poistoon lisäämällä kontrolleriin tarvittavat metodit ja toteuttamalla tarvittavat näkymät 
  * *Metodit lisätty reitteihin ja kontrolleriin, muut kesken*
* Lisää malliisi tarvittavat validaattorit ja estä kontrollereissa virheellisten olioiden lisäys tietokantaan. Muista näyttää lomakkeissa virhetilanteissa virheilmoitukset ja täyttää kentät käyttäjän antamilla syötteillä. 
  * *validaattorit Peli-luokassa, samoin virheiden käsittely. Virheiden esittäminen tehty, samoin kenttiin käyttäjän syötteiden palauttaminen*
* Toteuta malliluokka sovelluksen käyttäjälle ja toteuta käyttäjän kirjautuminen. Toteuta get_user_logged_in-metodi ja käytä tarvittaessa kirjautuneen käyttäjän tietoa hyväksi näkymissä ja malleissa. 
  * *Täysin tekemättä*
* Kirjoita alustava käynnistys- / käyttöohje dokumentaatioosi.
  * *Täysin tekemättä*



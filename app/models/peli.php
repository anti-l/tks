<?php

class Peli extends BaseModel {

    // Attribuutit
    public $id, $omistaja, $nimi, $julkaisuvuosi, $julkaisija, $genre, $tyyppi, $pelaajat_min, $pelaajat_max, $lisayspaiva, $kuvaus;

    // Konstruktori
    public function __construct($attributes) {
        parent::__construct($attributes);

        //$this->validators = array('validate_nimi', 'validate_omistaja', 'validate_julkaisuvuosi', 'validate_pelaajat_min', 'validate_pelaajat_max');
//        $this->validators = array('validate_nimi', 'validate_omistaja');
        $this->validators = array('validate_nimi');
    }

    // Metodi, joka hakee pelit tietokannasta ja palauttaa ne olioina
    public static function all() {
        $pelit = array();

        // Haetaan tietokannasta rivit
        $rows = DB::query('SELECT * from Peli ORDER BY nimi');

        // Käydään rivit läpi
        foreach ($rows as $row) {
            $pelit[] = new Peli(array(
                'id' => $row['id'],
                'omistaja' => $row['omistaja'],
                'nimi' => $row['nimi'],
                'julkaisuvuosi' => $row['julkaisuvuosi'],
                'julkaisija' => $row['julkaisija'],
                //'genre' => $row['genre'],
                'tyyppi' => $row['tyyppi'],
                'pelaajat_min' => $row['pelaajat_min'],
                'pelaajat_max' => $row['pelaajat_max'],
                'lisayspaiva' => $row['lisayspaiva'],
                'kuvaus' => $row['kuvaus']
            ));
        }

        return $pelit;
    }

    // Metori, joka hakee tietyn pelin tietokannasta
    public static function find($id) {
        $rows = DB::query('SELECT * from Peli WHERE id = :id LIMIT 1', array('id' => $id));

        if (count($rows) > 0) {
            $row = $rows[0];

            $peli = new Peli(array(
                'id' => $row['id'],
                'omistaja' => $row['omistaja'],
                'nimi' => $row['nimi'],
                'julkaisuvuosi' => $row['julkaisuvuosi'],
                'julkaisija' => $row['julkaisija'],
                //'genre' => $row['genre'],
                'tyyppi' => $row['tyyppi'],
                'pelaajat_min' => $row['pelaajat_min'],
                'pelaajat_max' => $row['pelaajat_max'],
                'lisayspaiva' => $row['lisayspaiva'],
                'kuvaus' => $row['kuvaus']
            ));

            return $peli;
        }
        return null;
    }

    public static function create($uusitaulukko) {
        // Onko mahdollista, että erroreita tulee, koska taulukossa on tyhjiä alkioita?

        // Talletetaan parametrinä annetun taulukon tiedot tietokantaan, otetaan rivi talteen
        $row = DB::query('INSERT INTO Peli (nimi, omistaja, julkaisuvuosi, julkaisija, pelaajat_min, pelaajat_max, kuvaus, lisayspaiva) VALUES (:nimi, :omistaja, :julkaisuvuosi, :julkaisija, :pelaajat_min, :pelaajat_max, :kuvaus, :lisayspaiva) RETURNING id', $uusitaulukko);

        // Palautetaan lisätyn pelin rivin id
        return $row[0]['id'];
//        return $row;
    }

    public static function destroy($id) {
        // Pelien deletointi
        DB::query('DELETE from Peli WHERE id=' . $id);
    }

    public static function update($uusitaulukko) {

        // Talletetaan parametrinä annetun taulukon tiedot tietokantaan, otetaan rivi talteen
        $row = DB::query('UPDATE Peli SET nimi = :nimi, omistaja = :omistaja, julkaisija = :julkaisija, julkaisuvuosi = :julkaisuvuosi, pelaajat_min = :pelaajat_min, pelaajat_max = :pelaajat_max, kuvaus = :kuvaus WHERE id = :id RETURNING id', $uusitaulukko);

        // Palautetaan lisätyn pelin rivin id
        return $row[0]['id'];
    }

// Validaattorit tästä eteenpäin


    public function validate_nimi() {

        // Nimen validointi: Nimi ei saa olla tyhjä, nimessä pitää olla vähintään 3 merkkiä.
        $validointivirheet = array();

        if ($this->nimi == '' || $this->nimi == null) {
            $validointivirheet[] = 'Nimi ei saa olla tyhjä.';
        }
        return $validointivirheet;
    }

    public function validate_omistaja() {

        // Omistajan validointi: Pakko syöttää numero (myöhemmin drop-down box)
        $validointivirheet[] = array();

        if (is_numeric($this->omistaja) == false) {
            $validointivirheet[] = 'Omistajan on oltava (käyttäjän) numero (1-2).';
        }
        return $validointivirheet;
    }

    public function validate_julkaisuvuosi() {

        // Julkaisuvuoden validointi: oltava tyhjä tai luku
        $validointivirheet[] = array();

//    if($this->julkaisuvuosi != '' || $this->julkaisuvuosi != null || is_numeric($this->julkaisuvuosi)){
        if (is_numeric($this->julkaisuvuosi)) {
            $validointivirheet[] = 'Julkaisuvuosi on oltava numero.';
        }
        return $validointivirheet;
    }

    public function validate_pelaajat_min() {

        // Pelaajamäärän validointi: jätettävä tyhjäksi tai syötettävä luku
        $validointivirheet[] = array();

//    if($this->pelaajat_min != '' || $this->pelaajat_min != null || is_numeric($this->pelaajat_min)){
        if ($this->pelaajat_min != '' && is_numeric($this->pelaajat_min) == false) {
            $validointivirheet[] = 'Pelaajien minimimäärän on oltava tyhjä tai numero.';
        }
        return $validointivirheet;
    }

    public function validate_pelaajat_max() {

        // Pelaajamäärän validointi: jätettävä tyhjäksi tai syötettävä luku
        $validointivirheet[] = array();

//    if($this->pelaajat_max != '' || $this->pelaajat_max != null || is_numeric($this->pelaajat_max)){
        if ($this->pelaajat_max != '' && is_numeric($this->pelaajat_max) == false) {
            $validointivirheet[] = 'Pelaajien maksimimäärän on oltava tyhjä tai numero.';
        }
        return $validointivirheet;
    }

}

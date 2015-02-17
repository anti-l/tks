<?php

class Peli extends BaseModel {

    // Attribuutit
    public $id, $omistaja, $nimi, $julkaisuvuosi, $julkaisija, $genre, $tyyppi, $pelaajat_min, $pelaajat_max, $lisayspaiva, $kuvaus;

    // Konstruktori
    public function __construct($attributes) {
        parent::__construct($attributes);

        //$this->validators = array('validate_nimi', 'validate_omistaja', 'validate_julkaisuvuosi', 'validate_pelaajat_min', 'validate_pelaajat_max');
        $this->validators = array('validate_nimi', 'validate_julkaisuvuosi', 'validate_pelaajat_min', 'validate_pelaajat_max');
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

    /* Tää toteutus ei skulaa vielä.
      // Metodi, joka etsii tietokannasta tietyn nimisiä pelejä ja palauttaa ne oliotauluna
      public static function search($options) {
      //$user_id = $options['user_id'];
      $query = 'SELECT * FROM Peli ';
      //$options = array('user_id' => $user_id);

      if (isset($options['search'])) {
      $like = '%' . $options['search'] . '%';
      $query .= ' WHERE nimi LIKE :like ORDER BY nimi';
      $options['like'] = $like;
      }

      $rows = DB::query($query, $options);
      $games = array();

      foreach ($rows as $row) {
      $games[] = new Game($row);
      }

      return $games;
      }
     * 
     */

    // Metodi, joka hakee tietyn pelin tietokannasta
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
        //return $row;
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

    // Metodi, joka hakee pelit tietokannasta ja palauttaa ne olioina
    public static function all_owner($id) {
        $pelit = array();

        // Haetaan tietokannasta rivit
        $rows = DB::query('SELECT * from Peli WHERE omistaja=' . $id . ' ORDER BY nimi');

        // Käydään rivit läpi
        foreach ($rows as $row) {
            $pelit[] = new Peli(array(
                'id' => $row['id'],
                'omistaja' => $row['omistaja'],
                'nimi' => $row['nimi'],
                'julkaisuvuosi' => $row['julkaisuvuosi'],
                'julkaisija' => $row['julkaisija'],
                'tyyppi' => $row['tyyppi'],
                'pelaajat_min' => $row['pelaajat_min'],
                'pelaajat_max' => $row['pelaajat_max'],
                'lisayspaiva' => $row['lisayspaiva'],
                'kuvaus' => $row['kuvaus']
            ));
        }

        return $pelit;
    }

    
// Validaattorit tästä eteenpäin


    public function validate_nimi() {

        // Nimen validointi: Nimi ei saa olla tyhjä.
        $validointivirheet = array();

        if ($this->nimi == '' || $this->nimi == null) {
            $validointivirheet[] = 'Nimi ei saa olla tyhjä.';
        }
        return $validointivirheet;
    }

    public function validate_omistaja() {

        // Omistajan validointi: Pakko syöttää numero (myöhemmin drop-down box)
        $validointivirheet = array();

        if (!is_numeric($this->omistaja) == false) {
            $validointivirheet = 'Omistajan on oltava (käyttäjän) id (numero).';
        }
        return $validointivirheet;
    }

    public function validate_julkaisuvuosi() {

        // Julkaisuvuoden validointi: oltava tyhjä tai luku
        $validointivirheet = array();

        if (!is_numeric($this->julkaisuvuosi)) {
            $validointivirheet[] = 'Julkaisuvuosi on oltava numero.';
        }
        return $validointivirheet;
    }

    public function validate_pelaajat_min() {

        // Pelaajamäärän validointi: jätettävä tyhjäksi tai syötettävä luku
        $validointivirheet = array();

        if (is_numeric($this->pelaajat_min) == false) {
            $validointivirheet[] = 'Pelaajien minimimäärän on oltava numero.';
        }
        return $validointivirheet;
    }

    public function validate_pelaajat_max() {

        // Pelaajamäärän validointi: jätettävä tyhjäksi tai syötettävä luku
        $validointivirheet = array();

        if (is_numeric($this->pelaajat_max) == false) {
            $validointivirheet[] = 'Pelaajien maksimimäärän on oltava numero.';
        }
        return $validointivirheet;
    }

}

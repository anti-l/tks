<?php

class Kayttaja extends BaseModel {

    // Attribuutit
    public $nimi, $salasana, $id;

    // Konstruktori
    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_nimi', 'validate_salasana');
    }

    public static function find($user_id) {
        $rows = DB::query('SELECT * from Kayttaja WHERE id= :id LIMIT 1', array('id' => $user_id));

        if (count($rows) > 0) {
            $row = $rows[0];
            $kayttaja = new Kayttaja(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
                'salasana' => $row['salasana']
            ));

            return $kayttaja;
        }
    }

    public static function authenticate($username, $password) {
        // Haetaan tietokannasta rivi, jolla on sama käyttäjänimi
        $rows = DB::query('SELECT * from Kayttaja WHERE nimi= :nimi LIMIT 1', array('nimi' => $username));

        // Käyttäjää ei löydy
        if ($rows == null) {
            return null;
        }

        // Onko tietokannassa oleva salasana sama kuin käyttäjän syöttämä?
        if ($rows[0]['salasana'] == $password && $rows[0]['nimi'] == $username) {

            // Salasanat täsmäävät, kirjoitetaan muuttujiin tiedot
            if (count($rows) > 0) {
                $row = $rows[0];

                $kayttaja = new Kayttaja(array(
                    'id' => $row['id'],
                    'nimi' => $row['nimi'],
                    'salasana' => $row['salasana']
                ));

                // Palautetaan tämä käyttäjä
                return $kayttaja;
            }
        }
        // salasanat eivät täsmää, palautetaan null
        return null;
    }

    public static function all() {
        $kayttajat = array();

        // Haetaan tietokannasta rivit
        $rows = DB::query('SELECT * from Kayttaja ORDER BY nimi');

        // Käydään rivit läpi
        foreach ($rows as $row) {
            $kayttajat[] = new Kayttaja(array(
                'id' => $row['id'],
                'nimi' => $row['nimi'],
                'salasana' => $row['salasana']
            ));
        }

        return $kayttajat;
    }

    public static function luo($attribuutit) {
        // Talletetaan parametrinä annetun taulukon tiedot tietokantaan, otetaan rivi talteen
        $row = DB::query('INSERT INTO Kayttaja (nimi, salasana) VALUES (:nimi, :salasana) RETURNING id', $attribuutit);

        // Palautetaan lisätyn pelin rivin id
        return $row[0]['id'];
    }

    public static function poista($id) {
        // Käyttäjän poistaminen
        DB::query('DELETE from Kayttaja WHERE id=' . $id);
    }

    
    public static function update($uusi) {

        // Talletetaan parametrinä annetun taulukon tiedot tietokantaan, otetaan rivi talteen
        $row = DB::query('UPDATE kayttaja SET nimi=:nimi, salasana=:salasana WHERE id=:id RETURNING id', $uusi);
        //$row = DB::query('UPDATE kayttaja SET nimi=' . :nimi . ', salasana=' . :salasana . ' WHERE id=' . :id . ' RETURNING id', $uusi);

        // Palautetaan lisätyn pelin rivin id
        return $row[0]['id'];
    }

    
    
    // VALIDAATTORIT
    
    public function validate_nimi() {

        // Nimen validointi: Nimi ei saa olla tyhjä.
        $validointivirheet = array();

        if ($this->nimi == '' || $this->nimi == null) {
            $validointivirheet[] = 'Nimi ei saa olla tyhjä.';
        }
        return $validointivirheet;
    }

    public function validate_salasana() {

        // Salasanan validointi: Salasana ei saa olla tyhjä.
        $validointivirheet = array();

        if ($this->salasana == '' || $this->salasana == null) {
            $validointivirheet[] = 'Salasana ei saa olla tyhjä.';
        }
        return $validointivirheet;
    }

}

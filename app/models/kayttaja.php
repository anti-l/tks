<?php

class Kayttaja extends BaseModel {

    // Attribuutit
    public $nimi, $salasana, $id;

    // Konstruktori
    public function __construct($attributes) {
        parent::__construct($attributes);
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

}

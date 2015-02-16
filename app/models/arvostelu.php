<?php

class Arvostelu extends BaseModel {

    // Attribuutit
    public $id, $arvostelija, $peli, $arvostelu, $arvio;

    // Konstruktori
    public function __construct($attributes) {
        parent::__construct($attributes);
    }

    // Metodi, joka hakee arviot tietokannasta ja palauttaa ne oliolistana
    public static function review_all() {
        $arvostelut = array();

        // Haetaan tietokannasta rivit
        $rows = DB::query('SELECT * FROM arvostelu');
        //$rows = DB::query('SELECT arvostelu.id, kayttaja.nimi, peli.nimi, arvostelu, arvio FROM arvostelu, kayttaja, peli WHERE arvostelu.arvostelija=kayttaja.id AND arvostelu.peli=peli.id');

        // Käydään rivit läpi
        foreach ($rows as $row) {
            $arvostelut[] = new Arvostelu(array(
                'id' => $row['id'],
                'arvostelija' => $row['arvostelija'],
                'peli' => $row['peli'],
                'arvostelu' => $row['arvostelu'],
                'arvio' => $row['arvio']
            ));
        }

        return $arvostelut;
    }

    // Metodi, joka hakee yhden pelin arvostelut ja palauttaa ne oliolistana
    public static function review_list($peli) {
        $arvostelut = array();

        // Haetaan tietokannasta rivit
        $rows = DB::query('SELECT * FROM arvostelu WHERE peli=' . $peli);

        // Käydään rivit läpi
        foreach ($rows as $row) {
            $arvostelut[] = new Arvostelu(array(
                'id' => $row['id'],
                'arvostelija' => $row['arvostelija'],
                'peli' => $row['peli'],
                'arvostelu' => $row['arvostelu'],
                'arvio' => $row ['arvio']
            ));
        }

        return $arvostelut;
    }

    public static function review_find($arvostelu_id) {
        $rows = DB::query('SELECT * FROM arvostelu WHERE id= :arvostelu_id LIMIT 1', array('arvostelu_id' => $arvostelu_id));

        if (count($rows) > 0) {
            $row = $rows[0];
            $arvostelu = new Arvostelu(array(
                'id' => $row['id'],
                'arvostelija' => $row['arvostelija'],
                'peli' => $row['peli'],
                'arvostelu' => $row['arvostelu'],
                'arvio' => $row ['arvio']
            ));

            return $arvostelu;
        }
    }

    public static function review_luo($attribuutit) {
        // Talletetaan parametrinä annetun taulukon tiedot tietokantaan, otetaan rivi talteen
        $row = DB::query('INSERT INTO arvostelu (arvostelija, peli, arvostelu, arvio) VALUES (:arvostelija, :peli, :arvostelu, :arvio) RETURNING id', $attribuutit);

        // Palautetaan lisätyn arvostelun rivin id
        return $row[0]['id'];
    }

    public static function review_poista($id) {
        // Arvostelun poistaminen
        DB::query('DELETE FROM arvostelu WHERE id=' . $id);
    }

    public static function review_uusi() {
        // Arvostelun poistaminen
        DB::query('DELETE FROM arvostelu WHERE id=' . $id);
    }
    
    public static function review_show() {
        // Arvostelun poistaminen
        DB::query('DELETE FROM arvostelu WHERE id=' . $id);
    }
    
    // Metodi, joka hakee arvostelut tietokannasta ja palauttaa ne olioina
    public static function all_reviewer($id) {
        $arvostelut = array();

        // Haetaan tietokannasta rivit
        $rows = DB::query('SELECT * FROM arvostelu WHERE arvostelija=' . $id . ' ORDER BY peli');

        // Käydään rivit läpi
        foreach ($rows as $row) {
            $arvostelut[] = new Arvostelu(array(
                'id' => $row['id'],
                'arvostelija' => $row['arvostelija'],
                'peli' => $row['peli'],
                'arvostelu' => $row['arvostelu'],
                'arvio' => $row ['arvio']
            ));
        }

        return $arvostelut;
    }

    
    

}

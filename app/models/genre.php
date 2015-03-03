<?php

class Genre extends BaseModel {

    // Attribuutit
    public $id, $genretxt;

    // Konstruktori
    public function __construct($attributes) {
        parent::__construct($attributes);
        $this->validators = array('validate_genretxt');
    }

    // Metodi, joka hakee arviot tietokannasta ja palauttaa ne oliolistana
    public static function list_genres() {
        $genret = array();

        // Haetaan tietokannasta rivit
        $rows = DB::query('SELECT * FROM genre ORDER BY genretxt');

        // Käydään rivit läpi
        foreach ($rows as $row) {
            $genret[] = new Genre(array(
                'id' => $row['id'],
                'genretxt' => $row['genretxt']
            ));
        }

        return $genret;
    }

    // Metodi, joka listaa yhden pelin kaikki genret
    public static function get_genres($id){
        $genret = array();
        $rows = DB::query('SELECT peli_genre.genre_id AS id, genre.genretxt AS genretxt FROM peli_genre, genre WHERE peli_genre.genre_id=genre.id AND peli_genre.peli_id=' . $id . ' ORDER BY genretxt');
        //$rows = DB::query('SELECT peli_genre.peli_id AS id, genre.genretxt AS genretxt FROM peli_genre, genre WHERE peli_genre.genre_id=genre.id AND peli_genre.peli_id=' . $id . ' ORDER BY genretxt');
        
        foreach ($rows as $row) {
            $genret[] = new Genre(array(
                'id' => $row['id'],
                'genretxt' => $row['genretxt']
            ));
        }

        return $genret;
    }
    
    public function luo($tiedot){
        // Talletetaan parametrinä annetun taulukon tiedot tietokantaan, otetaan rivi talteen
        $row = DB::query('INSERT INTO genre (genretxt) VALUES (:genretxt);', $tiedot);
    }
    
    public function delete($id){
        // Genren poistaminen
        DB::query('DELETE FROM genre WHERE id=' . $id);
    }


    public function lisaa_yksi($tiedot){
        //DB::query('INSERT INTO peli_genre (peli_id, genre_id) VALUES (:id, :gid)', $tiedot);
        // Hieman elegantimpi tapa: ei lisätä toista samanlaista riviä, jos sellainen löytyy jo
        DB::query('INSERT INTO peli_genre (peli_id, genre_id) SELECT :id, :gid WHERE NOT EXISTS ( SELECT peli_id, genre_id FROM peli_genre WHERE peli_id=:id AND genre_id=:gid)', $tiedot);
        
    }

    public function poista_yksi($tiedot){
        DB::query('DELETE FROM peli_genre WHERE peli_id=:id AND genre_id=:gid', $tiedot);
    }


// VALIDAATTORIT
    
    public function validate_genretxt() {

        // Nimen validointi: Nimi ei saa olla tyhjä.
        $validointivirheet = array();

        if ($this->genretxt == '' || $this->genretxt == null) {
            $validointivirheet[] = 'Genren nimi ei saa olla tyhjä.';
        }
        return $validointivirheet;
    }

}



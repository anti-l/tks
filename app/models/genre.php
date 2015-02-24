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
        $rows = DB::query('SELECT peli_genre.peli_id AS id, genre.genretxt AS genretxt FROM peli_genre, genre WHERE peli_genre.genre_id=genre.id AND peli_genre.peli_id=' . $id . ' ORDER BY genretxt');
        
        foreach ($rows as $row) {
            $genret[] = new Genre(array(
                'id' => $row['id'],
                'genretxt' => $row['genretxt']
            ));
        }

        return $genret;
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



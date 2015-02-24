<?php

class GenreKontrolleri extends BaseController {

    public static function list_all() {
        // Kutsutaan genre-luokan listaa-kaikki -metodia.
        $genret = Genre::list_genres();
        self::render_view('genre/index.html', array('genret' => $genret));
    }

    public static function list_one($id) {
        // Haetaan yhden arvostelijan arvostelut tietokannasta
        $pelit = Peli::get_all_games_one_genre($id);
        self::render_view('game/index.html', array('pelit' => $pelit));
        
    }

}

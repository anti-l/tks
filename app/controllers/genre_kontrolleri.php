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
    
    public static function add(){
        // Tarkistetaan sisäänkirjautuminen
        self::check_logged_in();
        // Ohjataan käyttäjä genrenluontisivulle.
        self::render_view('genre/uusi.html');
    }
    
    public static function save(){
        // Tarkistetaan sisäänkirjautuminen
        self::check_logged_in();
        //Post-pyynnön muuttujat haetaan $_POST -assosiaatiolistasta
        $params = $_POST;

        $tiedot = array(
            //'id' => $params['id'],
            'genretxt' => $params['genretxt']
        );

        $uusi_genre = new Genre($tiedot);
        $virheet = $uusi_genre->errors();

        if (count($virheet) == 0) {
            // Jos attribuutit on kunnossa, luodaan uusi genre ja siirretään käyttäjä pääsivulle
            Genre::luo($tiedot);
            self::redirect_to('/genre', array('message' => 'Genre lisätty.'));
        } else {
            // Genren tiedoissa oli jotain vikaa, palautetaan virheet ja attribuutit
            self::render_view('/genre/uusi.html', array('virheet' => $virheet, 'genre' => $tiedot));
        }
    }
    
    public static function delete($id){
        // Tarkistetaan sisäänkirjautuminen
        self::check_logged_in();
        // Poistetaan kyseisen ID:n genre
        Genre::delete($id);
        self::redirect_to('/genre', array('message' => 'Genre poistettu.'));
    }

    public static function edit($id){
        // Tarkistetaan sisäänkirjautuminen
        self::check_logged_in();
        
        // Haetaan pelin tiedot
        $peli = Peli::find($id);
        
        // Haetaan genret
        $genret = Genre::list_genres();
        $nykyiset = Genre::get_genres($id);
        
        // Ohjataan käyttäjä genren editointisivulle.
        self::render_view('genre/edit.html', array('peli' => $peli, 'genret' => $genret, 'nykyiset' => $nykyiset));
    }
    
    public static function poista_yksi($id){
        // Tarkistetaan sisäänkirjautuminen
        self::check_logged_in();
        
        $params = $_POST;
        $tiedot = array(
            
            'id' => $params['id'],
            'gid' => $params['nykyiset.id']
        );
        
        // Poistetaan yksi genremerkintä
        Genre::poista_yksi($tiedot);

        // Haetaan pelin tiedot
        $peli = Peli::find($id);
        
        // Haetaan genret
        $genret = Genre::list_genres();
        $nykyiset = Genre::get_genres($id);
        
        // Ohjataan käyttäjä genren editointisivulle.
        self::render_view('genre/edit.html', array('peli' => $peli, 'genret' => $genret, 'nykyiset' => $nykyiset, 'message'=>'Yksi poistettu.'));
    }
    
    public static function lisaa_yksi($id){
        // Tarkistetaan sisäänkirjautuminen
        self::check_logged_in();
        
        $params = $_POST;
        $tiedot = array(
            'id' => $params['id'],
            'gid' => $params['genret.id']
        );
        
        // Lisätään yksi genremerkintä
        //Genre::lisaa_yksi($tiedot);

        // Haetaan pelin tiedot
        $peli = Peli::find($id);
        
        // Haetaan genret
        $genret = Genre::list_genres();
        $nykyiset = Genre::get_genres($id);
        
        // Ohjataan käyttäjä genren editointisivulle.
        self::render_view('genre/edit.html', array('peli' => $peli, 'genret' => $genret, 'nykyiset' => $nykyiset, 'message'=>'Yksi lisätty.'));
    }
    
}

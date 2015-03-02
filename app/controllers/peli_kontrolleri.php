<?php

class PeliKontrolleri extends BaseController {

    public static function index() {
        self::render_view('home.html');
    }

    public static function game_list() {

        // Haetaan kaikki pelit tietokannasta
        $pelit = Peli::all();

        // Renderöidään views/game -kansiossa sijaitseva tiedosto index.html muuttujan $pelit datalla
        self::render_view('game/index.html', array('pelit' => $pelit));
    }

    public static function game_list_owner($id) {

        // Haetaan yhden omistajan pelit tietokannasta
        $pelit = Peli::all_owner($id);

        // Renderöidään views/game -kansiossa sijaitseva tiedosto index.html muuttujan $pelit datalla
        self::render_view('game/index.html', array('pelit' => $pelit));
    }

    public static function game_show($id) {

        // Haetaan id:tä vastaava peli tietokannasta
        $peli = Peli::find($id);
        
        // Haetaan käyttäjät tietokannasta omistajatietoa varten
        $omistaja = Kayttaja::find($peli->omistaja);

        // Haetaan pelin id:tä vastaava arvostelu tietokannasta
        $arvostelut = Arvostelu::review_list($id);
        
        // Haetaan vielä genret tietokannan eri tauluista
        $genret = Genre::get_genres($id);

        // Näytetään haetun pelin tiedot ja arvostelut
        self::render_view('game/pelinakyma.html', array('peli' => $peli, 'arvostelut' => $arvostelut, 'omistaja' => $omistaja, 'genret' => $genret));
    }

    public static function tallenna() {

        self::check_logged_in();
        //Post-pyynnön muuttujat haetaan $_POST -assosiaatiolistasta
        $params = $_POST;
        $omistajat = Kayttaja::all();

        $attribuutit = array(
            'nimi' => $params['nimi'],
            'omistaja' => $params['omistaja'],
            'julkaisija' => $params['julkaisija'],
            'julkaisuvuosi' => $params['julkaisuvuosi'],
            'pelaajat_min' => $params['pelaajat_min'],
            'pelaajat_max' => $params['pelaajat_max'],
            'lisayspaiva' => date("Y-m-d"),
            'kuvaus' => $params['kuvaus']
        );

        $peli = new Peli($attribuutit);
        $virheet = $peli->errors();

        if (count($virheet) == 0) {
            // Jos attribuutit on kunnossa, luodaan peli ja siirretään käyttäjä esittelysivulle
            $id = Peli::create($attribuutit);
            self::redirect_to('/game/' . $id, array('message' => 'Peli lisätty.'));
        } else {
            // Pelissä oli jotain vikaa, palautetaan virheet ja attribuutit
            self::render_view('game/uusi.html', array('virheet' => $virheet, 'attribuutit' => $attribuutit, 'omistajat' => $omistajat));
        }
    }

    public static function luoUusi() {
        self::check_logged_in();
        $omistajat = Kayttaja::all();
        self::render_view('game/uusi.html', array('omistajat' => $omistajat));
    }

    public static function game_edit($id) {
        self::check_logged_in();
        // Haetaan id:tä vastaava peli tietokannasta
        $peli = Peli::find($id);
        $omistajat = Kayttaja::all();

        // Näytetään haetun pelin tiedot
        self::render_view('game/edit.html', array('attribuutit' => $peli, 'omistajat' => $omistajat));
    }

    // Pelin päivittäminen järjestelmässä
    public static function update($id) {
        // otetaan updatesta attribuutit talteen
        $omistajat = Kayttaja::all();
        $params = $_POST;

        // talletetaan attribuutit omaan muuttujataulukkoon oikein
        $attribuutit = array(
            'id' => $params['id'],
            'nimi' => $params['nimi'],
            'omistaja' => $params['omistaja'],
            'julkaisija' => $params['julkaisija'],
            'julkaisuvuosi' => $params['julkaisuvuosi'],
            'pelaajat_min' => $params['pelaajat_min'],
            'pelaajat_max' => $params['pelaajat_max'],
            'kuvaus' => $params['kuvaus']
        );

        // Luodaan uusi peli annetuilla attribuuteilla ja lasketaan virheet
        $peli = new Peli($attribuutit);
        $virheet = $peli->errors();
        
        if (count($virheet) > 0) {

            // epäonnistui, takaisin editointiin, kirjoitetaan virheet sivulle
            self::render_view('/game/edit.html', array('virheet' => $virheet, 'attribuutit' => $attribuutit, 'omistajat' => $omistajat));
        } else {
            // onnistui, takaisin sivulle onnistuneen tekstin kera
            
            Peli::update($attribuutit);
            self::redirect_to('/game/' . $id, array('message' => 'Muokkaus onnistui.'));
        }
    }

    // Pelin poistaminen järjestelmästä
    public static function destroy($id) {
        self::check_logged_in();
        // Peli poistetaan Peli-luokan metodilla destroy($id)
        Peli::destroy($id);
        // Viedään käyttäjä takaisin etusivulle
        self::redirect_to('/game', array('message' => 'Peli poistettu.'));
    }

}

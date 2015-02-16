<?php

class ArvosteluKontrolleri extends BaseController {

    public static function review_all() {
        // Kutsutaan arvostelu-luokan listaa-kaikki -metodia.
        $kayttajat = Kayttaja::all();
        $pelit = Peli::all();
        $arvostelut = Arvostelu::review_all();
        self::render_view('review/index.html', array('arvostelut' => $arvostelut, 'kayttajat' => $kayttajat, 'pelit' => $pelit));
    }

    public static function review_list_reviewer($id) {
        // Haetaan yhden arvostelijan arvostelut tietokannasta
        $kayttajat = Kayttaja::all();
        $pelit = Peli::all();
        $arvostelut = Arvostelu::all_reviewer($id);

        self::render_view('review/index.html', array('arvostelut' => $arvostelut, 'kayttajat' => $kayttajat, 'pelit' => $pelit));
    }

    public static function review_show($id) {
        // Kutsutaan arvostelu-luokan listaa-yksi -metodia.
        $arvostelu = Arvostelu::review_list($id);
        $peli = Peli::find($id);
        $kayttaja = Kayttaja::find($id);
//        $peli = Peli::find($arvostelu->peli);
//        $kayttaja = Kayttaja::find($arvostelu->arvostelija);
        self::render_view('review/show.html', array('arvostelu' => $arvostelu, 'kayttaja' => $kayttaja, 'peli' => $peli));
    }

    public static function review_edit($id){
        // Ensin tarkistetaan, ollaanko kirjauduttu sisään
        self::check_logged_in();
        
        // talletetaan käyttäjä-luokalta käyttäjän id:llä saadut tiedot tauluun ja näytetään ne sivulla
        $attribuutit = Arvostelu::find($id);
        self::render_view('review/review_edit.html', array('attribuutit' => $attribuutit));
    }
    
    public static function review_update($id){
        self::check_logged_in();
        self::redirect_to('/review', array('message' => 'Toiminto tulossa.'));
    }
    
    public static function review_poista($id){
        // Ennen arvostelun poistamista tarkistetaan ollaanko kirjauduttu sisään
        self::check_logged_in();
        // Poistetaan arvostelun id:llä oleva arvostelu taulusta, haetaan kaikki arvostelut ja esitetään ne pääsivulla
        Arvostelu::poista($id);
        $arvostelut = Arvostelu::all();
        self::redirect_to('/review', array('message' => 'Arvostelu poistettu.'));
    }
    
    public static function review_luo(){
        // Ennen arvostelun luomista tarkistetaan sisäänkirjaus, sitten ohjataan uuden arvostelunn luomissivulle
        self::check_logged_in();
        //self::redirect_to('/review', array('message' => 'Toiminto tulossa.'));

        //Post-pyynnön muuttujat haetaan $_POST -assosiaatiolistasta
        $params = $_POST;

        $attribuutit = array(
            'arvostelija' => $params['arvostelija'],
            'peli' => $params['peli'],
            'arvio' => $params['arvio'],
            'arvostelu' => $params['arvostelu']
        );

        $arvostelu = new Arvostelu($attribuutit);
        $id = Arvostelu::review_luo($attribuutit);
        self::redirect_to('/review/', array('message' => 'Arvostelu lisätty.'));
    }
    
    public static function review_uusi(){
        $pelit = Peli::all();
        self::render_view('/review/uusi.html', array('pelit' => $pelit));
    }
    

}

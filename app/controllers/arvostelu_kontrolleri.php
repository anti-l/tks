<?php

class ArvosteluKontrolleri extends BaseController {

    public static function review_all() {
        // Kutsutaan arvostelu-luokan listaa-kaikki -metodia.
        $arvostelut = Arvostelu::review_all();
        self::render_view('review/index.html', array('arvostelut' => $arvostelut));
    }

    public static function review_list($id) {
        // Kutsutaan arvostelu-luokan listaa-yksi -metodia.
        $arvostelut = Arvostelu::review_list($id);
        self::render_view('review/index.html', array('arvostelut' => $arvostelut));
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
        self::redirect_to('/review', array('message' => 'Toiminto tulossa.'));
    }
    
    public static function review_tallenna(){
        self::redirect_to('/review', array('message' => 'Toiminto tulossa.'));
    }
    
}

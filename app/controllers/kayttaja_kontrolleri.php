<?php

class KayttajaKontrolleri extends BaseController {

    public static function login() {
        self::render_view('login.html');
    }

    public static function handle_login() {
        // Otetaan talteen lomakkeen tiedot, kutsutaan käyttäjä-luokan autentikointimetodia
        $params = $_POST;
        $user = Kayttaja::authenticate($params['username'], $params['password']);

        // jos metodin palauttama olio ei ole käyttäjä, annetaan virheilmoitus ja odotetaan kunnollista syötettä
        if (!$user) {
            self::redirect_to('/login', array('error' => 'Väärä käyttäjätunnus tai salasana!'));
        } else {
            // Kirjataan käyttäjä sisään ja tervehditään
            $_SESSION['user'] = $user->id;
            self::redirect_to('/game', array('message' => 'Tervetuloa takaisin ' . $user->nimi . '!'));
        }
    }

    public static function logout() {
        // Ulos kirjautuessa talletetaan session käyttäjäksi null, hyvästellään käyttäjä
        $_SESSION['user'] = null;
        self::redirect_to('/', array('message' => 'Olet kirjautunut ulos.'));
    }

    public static function list_users() {
        self::check_logged_in();
        // Kutsutaan käyttäjä-luokan listaa-kaikki -metodia.
        $kayttajat = Kayttaja::all();
        self::render_view('user/users.html', array('kayttajat' => $kayttajat));
    }

    
    public static function user_edit($id){
        // Ensin tarkistetaan, ollaanko kirjauduttu sisään
        self::check_logged_in();
        
        // talletetaan käyttäjä-luokalta käyttäjän id:llä saadut tiedot tauluun ja näytetään ne sivulla
        $attribuutit = Kayttaja::find($id);
        self::render_view('user/user_edit.html', array('attribuutit' => $attribuutit));
    }
    
    public static function user_poista($id){
        // Ennen käyttäjän poistamista tarkistetaan ollaanko kirjauduttu sisään
        self::check_logged_in();
        // Poistetaan käyttäjän id:llä oleva käyttäjä taulusta, haetaan kaikki käyttäjät ja esitetään ne pääsivulla
        Kayttaja::poista($id);
        $kayttajat = Kayttaja::all();
        self::redirect_to('/user', array('message' => 'Kayttaja poistettu.'));
    }
    
    public static function user_uusi(){
        // Ennen käyttäjän luomista tarkistetaan sisäänkirjaus, sitten ohjataan uuden käyttäjän luomissivulle
        self::check_logged_in();
        self::render_view('user/user_uusi.html');
    }
    
    public static function user_tallenna(){
        self::check_logged_in();
        //Post-pyynnön muuttujat haetaan $_POST -assosiaatiolistasta
        $params = $_POST;

        $attribuutit = array(
            'nimi' => $params['nimi'],
            'salasana' => $params['salasana']
        );

        $uusi_kayttaja = new Kayttaja($attribuutit);
        $virheet = $uusi_kayttaja->errors();

        if (count($virheet) == 0) {
            // Jos attribuutit on kunnossa, luodaan käyttäjä ja siirretään käyttäjä pääsivulle
            $id = Kayttaja::luo($attribuutit);
            self::redirect_to('/user', array('message' => 'Kayttaja lisätty.'));
        } else {
            // Käyttäjän tiedoissa oli jotain vikaa, palautetaan virheet ja attribuutit
            self::render_view('/user/user_uusi.html', array('virheet' => $virheet, 'attribuutit' => $attribuutit));
        }
    }
    
    public static function user_update($id){
        self::check_logged_in();
        
        /*
        $tiedot = array(
            'nimi' => $_POST['nimi'],
            'salasana' => $_POST['salasana']
        );
        
        $uusi_kayttaja = new Kayttaja($tiedot);
        $virheet = $uusi_kayttaja->errors();
        
        if (count($virheet) == 0) {
            // Jos attribuutit on kunnossa, päivitetään käyttäjän tiedot ja siirretään käyttäjä pääsivulle
            //$id = Kayttaja::update($tiedot);
            Kayttaja::update($tiedot);
            self::redirect_to('/user', array('message' => 'Muokkaus onnistui.'));
        } else {
            // Käyttäjän tiedoissa oli jotain vikaa, palautetaan virheet ja attribuutit
            self::render_view('/user/user_uusi.html', array('virheet' => $virheet, 'attribuutit' => $tiedot));
        }
        */
        self::redirect_to('/user', array('message' => 'Toiminto tulossa.'));
    }
    
}

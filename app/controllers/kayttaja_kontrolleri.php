<?php

class KayttajaKontrolleri extends BaseController {

    public static function login() {
        self::render_view('login.html');
    }

    public static function handle_login() {
        $params = $_POST;

        $user = Kayttaja::authenticate($params['username'], $params['password']);

        if (!$user) {
            self::redirect_to('/login', array('error' => 'Väärä käyttäjätunnus tai salasana!'));
        } else {
            $_SESSION['user'] = $user->id;

            self::redirect_to('/game', array('message' => 'Tervetuloa takaisin ' . $user->nimi . '!'));
        }
    }

    public static function logout() {
        $_SESSION['user'] = null;
        self::redirect_to('/', array('message' => 'Olet kirjautunut ulos.'));
    }

    public static function list_users() {
        $kayttajat = Kayttaja::all();

        self::render_view('user/users.html', array('kayttajat' => $kayttajat));
    }

    
    public static function user_edit($id){
        $attribuutit = Kayttaja::find($id);
        self::render_view('user/user_edit.html', array('attribuutit' => $attribuutit));
    }
    
    public static function user_update($id){
        self::redirect_to('/user', array('message' => 'Toiminto tulossa.'));
    }
    
    public static function user_poista($id){
        $kayttajat = Kayttaja::all();
        self::render_view('user/users.html', array('kayttajat' => $kayttajat));
    }
    
    public static function user_uusi(){
        self::render_view('user/user_uusi.html');
    }
    
    public static function user_tallenna(){
        self::redirect_to('/user', array('message' => 'Toiminto tulossa.'));
    }
    
}

<?php

class KayttajaKontrolleri extends BaseController{
    
  public static function login(){
      self::render_view('login.html');
  }

  public static function handle_login(){
    $params = $_POST;

    $user = Kayttaja::authenticate($params['username'], $params['password']);

    if(!$user){
      self::redirect_to('/login', array('error' => 'Väärä käyttäjätunnus tai salasana!'));
    }else{
      $_SESSION['user'] = $user->id;

      self::redirect_to('/game', array('message' => 'Tervetuloa takaisin ' . $user->nimi . '!'));
    }
  }
    
  public static function logout(){
      $_SESSION['user'] = null;
      self::redirect_to('/', array('message' => 'Olet kirjautunut ulos.'));
  }
}


<?php

require 'app/models/peli.php';

class HelloWorldController extends BaseController{

  public static function index(){
 	  self::render_view('home.html');
  	//echo 'Tämä on etusivu!';
  }

  public static function game_list(){
    self::render_view('suunnitelmat/game_list.html');
  }

  public static function game_show(){
    self::render_view('suunnitelmat/game_show.html');
  }

  public static function game_edit(){
    self::render_view('suunnitelmat/game_edit.html');
  }

  public static function login(){
    self::render_view('suunnitelmat/login.html');
  }
    

  public static function sandbox(){
    // Testaa koodiasi täällä 
    //echo 'Hello World!';
    //self::render_view('helloworld.html');
    //print_r('test');

    $kaikki_pelit = Peli::all();
    print_r($kaikki_pelit);

    //$eka_peli = Peli::find('0');
    //print_r($eka_peli);
  }


}

<?php

class Kayttaja extends BaseModel{

  // Attribuutit
  public $nimi, $salasana, $id;

  // Konstruktori
  public function __construct($attributes){
    parent::__construct($attributes);
  }

  public static function find($user_id){
      
  }
  
  public static function authenticate($username, $password){
      // Haetaan tietokannasta rivi, jolla on sama käyttäjänimi
      $row = DB::query('SELECT * from Kayttaja WHERE nimi=' . $username . 'RETURNING id, nimi, salasana');
      
      // Onko tietokannassa oleva salasana sama kuin käyttäjän syöttämä?
      if($row[0]['salasana'] != $password){
//      if($row['salasana'] != $password){
          // ei ollut, poistutaan
          return null;
      }
      
      // Salasanat täsmäävät, kirjoitetaan muuttujiin tiedot
      $nimi = $row[0]['nimi'];
      $salasana = $row[0]['salasana'];
//      $nimi = $row['nimi'];
//      $salasana = $row['salasana'];
      
      // Palautetaan tämä käyttäjä
      return $this;
  }
  
}



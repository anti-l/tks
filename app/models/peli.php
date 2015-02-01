<?php

class Peli extends BaseModel{

  // Attribuutit
  public $id, $omistaja, $nimi, $julkaisuvuosi, $julkaisija, $genre, $tyyppi, $pelaajat_min, $pelaajat_max, $lisayspaiva, $kuvaus;

  // Konstruktori
  public function __construct($attributes){
    parent::__construct($attributes);
  }

  // Metodi, joka hakee pelit tietokannasta ja palauttaa ne olioina
  public static function all(){
  	$pelit = array();

  	// Haetaan tietokannasta rivit
  	$rows = DB::query('SELECT * from Peli');

  	// Käydään rivit läpi
  	foreach($rows as $row){
	  	$pelit[] = new Peli(array(
  			'id' => $row['id'],
	  		'omistaja' => $row['omistaja'],
  			'nimi' => $row['nimi'],
  			'julkaisuvuosi' => $row['julkaisuvuosi'],
  			'julkaisija' => $row['julkaisija'],
	  		//'genre' => $row['genre'],
  			'tyyppi' => $row['tyyppi'],
  			'pelaajat_min' => $row['pelaajat_min'],
  			'pelaajat_max' => $row['pelaajat_max'],
  			'lisayspaiva' => $row['lisayspaiva'],
  			'kuvaus' => $row['kuvaus']
  		));
  	}

  	return $pelit;
  }

  // Metori, joka hakee tietyn pelin tietokannasta
  public static function find($id) {
  	$rows = DB::query('SELECT * from Peli WHERE id = :id LIMIT 1', array('id' => id));

  	if(count($rows) > 0){
  		$row = $rows[0];

  		$peli = new Peli(array(
  			'id' => $row['id'],
	  		'omistaja' => $row['omistaja'],
  			'nimi' => $row['nimi'],
  			'julkaisuvuosi' => $row['julkaisuvuosi'],
  			'julkaisija' => $row['julkaisija'],
	  		//'genre' => $row['genre'],
  			'tyyppi' => $row['tyyppi'],
  			'pelaajat_min' => $row['pelaajat_min'],
  			'pelaajat_max' => $row['pelaajat_max'],
  			'lisayspaiva' => $row['lisayspaiva'],
  			'kuvaus' => $row['kuvaus']
  		));

  		return $peli;
  	}
  	return null;
  }

}


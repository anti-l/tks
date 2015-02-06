<?php

class Peli extends BaseModel{

  // Attribuutit
  public $id, $omistaja, $nimi, $julkaisuvuosi, $julkaisija, $genre, $tyyppi, $pelaajat_min, $pelaajat_max, $lisayspaiva, $kuvaus;

  // Konstruktori
  public function __construct($attributes){
    parent::__construct($attributes);

    $this->validators = array('validate_nimi', 'validate_julkaisuvuosi', 'validate_julkaisija', 'validate_pelaajat_min', 'validate_pelaajat_max');
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
  	$rows = DB::query('SELECT * from Peli WHERE id = :id LIMIT 1', array('id' => $id));

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


  public static function create($uusitaulukko){

    // Talletetaan parametrinä annetun taulukon tiedot tietokantaan, otetaan rivi talteen
    $row = DB::query('INSERT INTO Peli (nimi, omistaja, julkaisuvuosi, julkaisija, pelaajat_min, pelaajat_max, kuvaus) VALUES (:nimi, :omistaja, :julkaisuvuosi, :julkaisija, :pelaajat_min, :pelaajat_max, :kuvaus) RETURNING id', $uusitaulukko);

    // Palautetaan lisätyn pelin rivin id
    return $row[0]['id'];
  }


  public function validate_nimi(){

    // Nimen validointi: Nimi ei saa olla tyhjä, nimessä pitää olla vähintään 3 merkkiä.
    $errors = array();

    if($this->nimi == '' || $this->nimi == null){
      $errors[] = 'Nimi ei saa olla tyhjä.';
    }
    if(strlen($this->nimi) < 3){
      $errors[] = 'Nimen pituuden tulee olla vähintään kolme merkkiä.';
    }
    return $errors;
  }
  
  public function validate_julkaisija(){

    // Julkaisijan validointi: Nimi ei saa olla tyhjä, julkaisijan nimessä pitää olla vähintään 3 merkkiä.
    $errors[] = array();

    if($this->julkaisija == '' || $this->julkaisija == null){
      $errors[] = 'Julkaisijan nimi ei saa olla tyhjä.';
    }
    if(strlen($this->julkaisija) < 3){
      $errors[] = 'Julkaisijan nimessä tulee olla vähintään kolme merkkiä.';
    }
    return $errors;
  }



  public function validate_julkaisuvuosi(){

    // Julkaisuvuoden validointi: oltava tyhjä tai luku
    $errors[] = array();

    if($this->julkaisija != '' || $this->julkaisija != null || is_numeric($this->julkaisuvuosi)){
      $errors[] = 'Julkaisuvuosi on oltava numero.';
    }
    return $errors;
  }


  public function validate_pelaajat_min(){

    // Pelaajamäärän validointi: jätettävä tyhjäksi tai syötettävä luku
    $errors[] = array();

    if($this->pelaajat_min != '' || $this->pelaajat_min != null || is_numeric($this->pelaajat_min)){
      $errors[] = 'Pelaajien minimimäärän on oltava numero.';
    }
    return $errors;
  }


  public function validate_pelaajat_max(){

    // Pelaajamäärän validointi: jätettävä tyhjäksi tai syötettävä luku
    $errors[] = array();

    if($this->pelaajat_max != '' || $this->pelaajat_max != null || is_numeric($this->pelaajat_max)){
      $errors[] = 'Pelaajien minimimäärän on oltava numero.';
    }
    return $errors;
  }

  public static function destroy($id){
    // Pelien deletointi
  }

}


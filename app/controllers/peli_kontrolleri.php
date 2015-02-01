<?php

class PeliKontrolleri extends BaseController{

	public static function index(){
 		self::render_view('home.html');
	}


	public static function game_list(){

		// Haetaan kaikki pelit tietokannasta
		$pelit = Peli::all();

		// Renderöidään views/game -kansiossa sijaitseva tiedosto index.html muuttujan $pelit datalla
		self::render_view('game/index.html', array('pelit' =>  $pelit));
	}


	public static function game_show($id){

		// Haetaan id:tä vastaava peli tietokannasta
		$peli = Peli::find($id);

		// Näytetään haetun pelin tiedot
		self::render_view('game/pelinakyma.html', array('peli' => $peli));
	}

/* *
	public static function tallenna(){

		//Post-pyynnön muuttujat haetaan $_POST -assosiaatiolistasta
		$params = $_POST;

		// Luodaan uusi peli syötetyistä tiedoista
		$id = Peli::create(array(
			'nimi' => $params['nimi'],
			'omistaja' => $params['omistaja'],
			'julkaisuvuosi' => $params['julkaisuvuosi'],
			'julkaisija' => $params['julkaisija'],
			'tyyppi' => $params['tyyppi'],
			'pelaajat_min' => $params['pelaajat_min'],
			'pelaajat_max' => $params['pelaajat_max'],
			'kuvaus' => $params['kuvaus']
		));

		// Lopuksi ohjataan käyttäjä luodun pelin esittelysivulle
		self::redirect_to('/game/' . $id, array('message' => 'Peli lisätty.'))
	}
/* */

	public static function luoUusi(){
		self::render_view('game/uusi.html');
	}


	public static function login(){
		self::render_view('login.html');
	}

	public static function game_edit($id) {
		// Haetaan id:tä vastaava peli tietokannasta
		$peli = Peli::find($id);

		// Näytetään haetun pelin tiedot
		self::render_view('game/edit.html', array('peli' => $peli));
	}

}

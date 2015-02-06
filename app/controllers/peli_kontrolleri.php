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

	public static function tallenna() {

		//Post-pyynnön muuttujat haetaan $_POST -assosiaatiolistasta
		$params = $_POST;

		$attribuutit = array(
			'nimi' => $params['nimi'],
			'omistaja' => $params['omistaja'],
			'julkaisija' => $params['julkaisija'],
			'julkaisuvuosi' => $params['julkaisuvuosi'],
			//'tyyppi' => $params['tyyppi'],
			'pelaajat_min' => $params['pelaajat_min'],
			'pelaajat_max' => $params['pelaajat_max'],
			'kuvaus' => $params['kuvaus']
			);

		$peli = new Peli($attribuutit);
		$virheet = $peli->errors();
		
		

		if(count($virheet) == 0) {
			// Jos attribuutit on kunnossa, luodaan peli ja siirretään käyttäjä esittelysivulle
			$id = Peli::create($attribuutit);
			self::redirect_to('/game/' . $id, array('message' => 'Peli lisätty.'));

		} else {
			// Pelissä oli jotain vikaa, palautetaan virheet ja attribuutit
			self::render_view('game/uusi.html', array('virheet' => $virheet, 'attribuutit' => $attribuutit));
		}
	}


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
		self::render_view('game/edit.html', array('attribuutit' => $peli));
	}


	// Pelin päivittäminen järjestelmässä
	public static function game_update($id){
		// otetaan updatesta attribuutit talteen
		$params =  $_POST;

		// talletetaan attribuutit omaan muuttujataulukkoon oikein
		$attribuutit = array(
			'nimi' => $params['nimi'],
			'omistaja' => $params['omistaja'],
			'julkaisija' => $params['julkaisija'],
			'julkaisuvuosi' => $params['julkaisuvuosi'],
			//'tyyppi' => $params['tyyppi'],
			'pelaajat_min' => $params['pelaajat_min'],
			'pelaajat_max' => $params['pelaajat_max'],
			'kuvaus' => $params['kuvaus']
			);

		// Luodaan uusi peli annetuilla attribuuteilla ja lasketaan virheet
		$peli = new Peli($attribuutit);
		$virheet = $peli->errors();

		if(count($virheet > 0)) {
			// epäonnistui, takaisin editointiin, kirjoitetaan virheet sivulle
			self::render_view('/game/edit.html', array('virheet' => $virheet, 'attribuutit' => $attribuutit));
		} else {
			// onnistui, takaisin sivulle onnistuneen tekstin kera
			Peli::update($id, $attribuutit);
			redirect_to('/game/' . $id, array('message' => 'Muokkaus onnistui.'));
		}
	}


	// Pelin poistaminen järjestelmästä
	public static function destroy($id){
		// Peli poistetaan Peli-luokan metodilla destroy($id)
		Peli::destroy($id);
		// Viedään käyttäjä takaisin etusivulle
		self::redirect_to('/game', array('message' => 'Peli poistettu.'));
	}


}

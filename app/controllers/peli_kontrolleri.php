<?php

class PeliKontrolleri extends BaseController{

	public static function index(){

		// Haetaan kaikki pelit tietokannasta
		$pelit = Peli::all();

		// Renderöidään views/game -kansiossa sijaitseva tiedosto index.html muuttujan $pelit datalla
		self::render_view('game/index.html', array('pelit' =>  $pelit));
	}


	public static function login(){
		self::render_view('suunnitelmat/login.html');
	}

	public static function show($id){

		// Haetaan id:tä vastaava peli tietokannasta
		$peli = Peli::find($id);

		// Näytetään haetun pelin tiedot
		self::render_view('game/pelinakyma.html', array('peli' => $peli));
	}

	public static function tallenna(){
		self::render_view('game/index.html');
	}

	public static function luoUusi(){
		self::render_view('game/index.html');
	}

}
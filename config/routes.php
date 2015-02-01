<?php

/* Bootstrapperin vakiot */

  $app->get('/', function() {
    HelloWorldController::index();
  });

  $app->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });

/* Esimerkkisivut, viikon 2 vaatimuksia */

  /* Viikko 3 korvaa tämän jo *
  $app->get('/game/esim', function() {
    HelloWorldController::game_list();
  });
  */
 
  $app->get('/game/esim1', function() {
    HelloWorldController::game_show();
  });

  $app->get('/game/edit', function() {
    HelloWorldController::game_edit();
  });

  $app->get('/login', function() {
    HelloWorldController::login();
  });


/* Oman projektin reitit */

  // Etusivu (listaa pelit)
  $app->get('/', function(){
    PeliKontrolleri::index();
  });

  // Pelien listaussivu
  $app->get('/game', function(){
    PeliKontrolleri::index();
  });

  // Yksittäisen pelin esittelysivu
  $app->get('/game/:id', function($id){
    PeliKontrolleri::show($id);
  });

/*
  // Uuden pelin luonti
  $app->post('/game', function(){
    PeliKontrolleri::tallenna();
  });

  // Lisäyslomakkeen näyttäminen
  $app-get('/game/new', function(){
    PeliKontrolleri::luoUusi();
  });

/*
  // Login-sivu
  $app->get('login', function(){
    PeliKontrolleri::login();
  })
*/


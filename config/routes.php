<?php

/* Bootstrapperin vakiot */

  $app->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });

/* Esimerkkisivut, viikon 2 vaatimuksia */

  /* Viikko 3 korvaa tämän jo */
  $app->get('/game/esim', function() {
    HelloWorldController::game_list();
  });
 
  $app->get('/game/esim_1', function() {
    HelloWorldController::game_show();
  });

  $app->get('/game/esim_edit', function() {
    HelloWorldController::game_edit();
  });

  $app->get('/esim_login', function() {
    HelloWorldController::login();
  });


/* Oman projektin reitit */

  // Etusivu 
  $app->get('/', function(){
    PeliKontrolleri::index();
  });

  // Pelien listaussivu
  $app->get('/game', function(){
    PeliKontrolleri::game_list();
  });

  // Lisäyslomakkeen näyttäminen
  $app->get('/game/uusi', function(){
    PeliKontrolleri::luoUusi();
  });

  // Uuden pelin luonti
  $app->post('/game', function(){
    PeliKontrolleri::tallenna();
  });

  // Yksittäisen pelin esittelysivu
  $app->get('/game/:id', function($id){
    PeliKontrolleri::game_show($id);
  });

  // Yksittäisen pelin muokkaussivu
  $app->get('/game/:id/edit', function($id){
    PeliKontrolleri::game_edit($id);
  });

  // Login-sivu
  $app->get('/login', function(){
    PeliKontrolleri::login();
  });




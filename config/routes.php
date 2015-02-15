<?php

/* Bootstrapperin vakiot */

$app->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
});

/* Esimerkkisivut, viikon 2 vaatimuksia */

/* Viikko 3 korvaa tämän jo, nämä on tässä vain githubin readme:tä varten */
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
$app->get('/', function() {
    PeliKontrolleri::index();
});

// Pelien listaussivu
$app->get('/game', function() {
    PeliKontrolleri::game_list();
});

// Pelien haku
//$app->post('/game/:options', function($options) {
//    PeliKontrolleri::search($options);
//});

// Lisäyslomakkeen näyttäminen
$app->get('/game/uusi', function() {
    PeliKontrolleri::luoUusi();
});

// Uuden pelin luonti
$app->post('/game/uusi', function() {
    PeliKontrolleri::tallenna();
});

// Yksittäisen pelin esittelysivu
$app->get('/game/:id', function($id) {
    PeliKontrolleri::game_show($id);
});

// Yksittäisen pelin muokkaussivu
$app->get('/game/:id/edit', function($id) {
    PeliKontrolleri::game_edit($id);
});

// Yksittäisen pelin päivitys
$app->post('/game/:id/edit', function($id) {
    PeliKontrolleri::update($id);
});

// Pelin poistaminen
$app->post('/game/:id/delete', function($id) {
    PeliKontrolleri::destroy($id);
});

// Yhden omistajan pelit listattuna
$app->get('/game/owner/:id', function($id) {
    PeliKontrolleri::game_list_owner($id);
});

// Login-sivu
$app->get('/login', function() {
    KayttajaKontrolleri::login();
});

// Sisään kirjautuminen
$app->post('/login', function() {
    KayttajaKontrolleri::handle_login();
});

// Ulos kirjautuminen
$app->get('/logout', function() {
    KayttajaKontrolleri::logout();
});

$app->post('/logout', function() {
    KayttajaKontrolleri::logout();
});

// Käyttäjien listaaminen
$app->get('/user', function() {
    KayttajaKontrolleri::list_users();
});

// Uuden käyttäjän luominen
$app->get('/user/uusi', function() {
    KayttajaKontrolleri::user_uusi();
});

// Uuden käyttäjän tallentaminen
$app->post('/user/uusi', function() {
    KayttajaKontrolleri::user_tallenna();
});

// Käyttäjän poistaminen
$app->post('/user/:id/delete', function($id) {
    KayttajaKontrolleri::user_poista($id);
});

// Käyttäjän editointi
$app->get('/user/:id/edit', function($id) {
    KayttajaKontrolleri::user_edit($id);
});

// Käyttäjän editointi ja päivitys
$app->post('/user/:id/edit', function($id) {
    KayttajaKontrolleri::user_update($id);
});

// Arvioiden esittäminen
$app->get('/review', function() {
    ArvosteluKontrolleri::review_all();
});

// Uuden arvion luominen
$app->get('/review/uusi', function() {
    ArvosteluKontrolleri::review_luo();
});

// Uuden arvion luominen
$app->get('/review/delete', function() {
    ArvosteluKontrolleri::review_poista();
});



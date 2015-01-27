<?php

  $app->get('/', function() {
    HelloWorldController::index();
  });

  $app->get('/hiekkalaatikko', function() {
    HelloWorldController::sandbox();
  });

$app->get('/game', function() {
  HelloWorldController::game_list();
});

$app->get('/game/1', function() {
  HelloWorldController::game_show();
});

$app->get('/game/edit', function() {
  HelloWorldController::game_edit();
});

$app->get('/login', function() {
  HelloWorldController::login();
});


<?php
/**
 *  SectorSearch
 *  v.1
 *
 */

session_start();


if (isset($_REQUEST['logoff'])) {
  session_destroy();
  header('location: /');
}



require_once 'vendor/autoload.php';

require 'includes/rb.php';
R::setup('mysql:host=database;dbname=lamp','lamp', 'lamp');

require 'Classes/Player.php';
require 'Classes/Resource.php';
require 'Classes/Sector.php';
require 'Classes/Sectors.php';
require 'Classes/CreatePlayer.php';


$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader, array(
    'cache' => false,
));

$player = new Player();

if (!isset($_SESSION['player'])) {
  if (isset($_REQUEST['login'])) {
     $Player = new Player();
     $checkPlayer = $Player->checkPlayer($_REQUEST['name'], $_REQUEST['pass']);


     if ($checkPlayer[1] == 'try again') {
       $return = $player->playerLogin();
     }
     if ($checkPlayer[1] == 'register') {
        $return = $player->playerRegistration();
     }



     if ($checkPlayer[1]> 0) {
       $return = $player->homeScreen();
     }

  }

       else {
          $return = $player->playerLogin();
      }

  if (isset($_REQUEST['register'])) {

      $cor['x'] = rand(0, 9);
      $cor['y'] = rand(0, 9);
      $cor['z'] = rand(0, 9);
      $coordinates = $cor['x'] . '-' . $cor['y'] . '-' . $cor['z'];

      $player = R::dispense( 'players' );
      $player->name = $_REQUEST['name'];
      $player->email = $_REQUEST['email'];
      $player->password = md5($_REQUEST['password']);
      $player->level = 1;
      $player->legion = rand(0,12);
      $id = R::store($player);

      $recourse = R::dispense( 'resource' );
      $recourse->pid = $id;
      $recourse->home = $coordinates;
      $recourse->start = date('U');
      $rid = R::store($recourse);

      $sectors_mapped = R::dispense( 'sectorsmapped' );
      $sectors_mapped->pid = $id;
      $sectors_mapped->home = $coordinates;
      $sec_map = R::store($sectors_mapped);

      $home = R::findOne('players', 'id = ?', array($id));
      $home->home =  $rid;
      R::store($home);
    $_SESSION['player'] = $id;
    $return = $id;
  }


}
  else {
    $return = $player->homeScreen();
  }

$twigData = [];

include 'includes/screen_logic.php';




 R::close();





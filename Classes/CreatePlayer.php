<?php
//require 'Classes/Sector.php';

class CreatePlayer{

    public $id;
    public $player;

    /**
     *  Create Player
     */
    public function __construct() {

      $cor['x'] = rand(0, 10);
      $cor['y'] = rand(0, 10);
      $cor['z'] = rand(0, 10);
      $coordinates = $cor['x'] . '-' . $cor['y'] . '-' . $cor['z'];

      print '<pre>';
      $player = R::dispense( 'players' );
      $player->name = 'admin';
      $player->pass = '098f6bcd4621d373cade4e832627b4f6';
      $player->level = 1;
      $player->legion = NULL;
      $id = R::store($player);

      $recourse = R::dispense( 'recourse' );
      $recourse->pid = $id;
      $recourse->home = $coordinates;
      $recourse->start = date('U');
      $rid = R::store($recourse);

      $home = R::findOne('players', 'id = ?', array($id));
      $home->home =  $rid;
      R::store($home);

      return $id;
    }

}





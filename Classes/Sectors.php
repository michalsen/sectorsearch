<?php

/**
  Neighboring Sectors to home and surveyed areas
 **/

class Sectors {


    public $coor;
    // private $coordinates;

    public function __construct($coor) {
      $breakdown = explode('-', $coor);
      $this->coor = $breakdown[0];

      print_r($nearby);
      return $nearby;
    }

    // private function getNear($coordinates)
    // {

    //   $nearby = explode('-', $coordinates->coor);
    //   return $nearby[0];

    // }

}

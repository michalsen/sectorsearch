<?php

/**
  Neighboring Sectors to home and surveyed areas
 **/

class Sectors {


    public $coor;

    public function __construct($coor) {
       return $this->getNear($coor);
    }

    public function getNear($coordinates)
    {

      return $coordinates;

    }

}

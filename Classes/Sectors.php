<?php

/**
  Neighboring Sectors to home and surveyed areas
 **/

class Sectors {

    public $id;
    public $coordinate;
    public $coor;

    public function __construct($coor) {
       return $this->getNear($coor->coordinates);
    }

    public function getNear($coordinate)
    {

      print $coordinate;

    }

}

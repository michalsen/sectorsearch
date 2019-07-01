<?php

/**
  Neighboring Sectors to home and surveyed areas
 **/

class Sectors {

    public $id;
    public $name;
    public $coor;

    public function __construct($coor) {
       print 'coor: ' . $coor;
    }
}

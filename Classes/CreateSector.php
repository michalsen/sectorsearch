<?php

class CreateSector extends Sector {

    public $id;
    public $sector;
    public $spot;

    public function __construct() {
      $this->sector = createName();
      print_r($this->sector);
    }



}




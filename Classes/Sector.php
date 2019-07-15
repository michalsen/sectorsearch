<?php

class Sector {

    public $id;
    public $name;
    public $coor;
    // public $sectorStat;
    // public $sectorReturn;

    // public function __construct() {

    // }

    public function readSector($coor) {
        $sector = R::findOne('sectors',' coordinates = ? ',
                array( $coor )
               );
      $name = preg_replace('/-/', '<br>', $sector['name']);
       return $name;
    }

    public function readSectorname($name) {
      //return 'id: ' . $name;
    }

    public function readSectorcorrodinates($corrodinates) {
      return $corrodinates;
    }

    public function destroySector() {

    }

    /**
     *  Random Coordinates
     */
    public function randomCoordinates() {
      $cor['x'] = rand(0, 10);
      $cor['y'] = rand(0, 10);
      $cor['z'] = rand(0, 10);
      return $cor['x'] . '-' . $cor['y'] . '-' . $cor['z'];
    }

}


// $sectorparse = json_decode($sector);
// $sectorname = $sectorparse->name->f . '-' .
//               $sectorparse->name->m . '-' .
//               $sectorparse->name->l;



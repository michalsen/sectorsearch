<?php

class Sector {

    public $id;
    public $name;
    public $corrodinates;
    // public $sectorStat;
    // public $sectorReturn;

    // public function __construct() {

    // }

    public function readSector($coor) {
     // $sectorStat = new SplFileObject('db/sectors.lst');
     //    while (!$sectorStat->eof()) {
     //       $sectorReturn = json_decode($sectorStat->fgets());
     //       if (is_object($sectorReturn)) {
     //         if ($sectorReturn->coordinates == $id) {
     //           $return = $sectorReturn;
     //         }
     //       }
     //     }
     return 'coor: ' . $coor;
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



<?php

/**
  Neighboring Sectors to home and surveyed areas
 **/

class Sectors {


    public $coor;
    // private $coordinates;

    public function __construct($coor) {
      $breakdown = explode('-', $coor);

      $sector = new Sector();



      // Sigma
      $this->Sa = $sector->readSector(($breakdown[0] - 1) . '-' . ($breakdown[1] - 1 . '-' . ($breakdown[2] - 1)));
      $this->Sb = $sector->readSector(($breakdown[0] ) . '-' . ($breakdown[1] - 1 . '-' . ($breakdown[2] - 1)));
      $this->Sc = $sector->readSector(($breakdown[0] + 1) . '-' . ($breakdown[1] - 1 . '-' . ($breakdown[2] - 1)));

      $this->Sd = $sector->readSector(($breakdown[0] - 1) . '-' . ($breakdown[1] . '-' . ($breakdown[2] - 1)));
      $this->Se = $sector->readSector(($breakdown[0]) . '-' . ($breakdown[1] . '-' . ($breakdown[2] - 1)));
      $this->Sf = $sector->readSector(($breakdown[0] + 1) . '-' . ($breakdown[1] . '-' . ($breakdown[2] - 1)));

      $this->Sg = $sector->readSector(($breakdown[0]-1) . '-' . ($breakdown[1] + 1 . '-' . ($breakdown[2] - 1)));
      $this->Sh = $sector->readSector(($breakdown[0]) . '-' . ($breakdown[1] + 1 . '-' . ($breakdown[2] - 1)));
      $this->Si = $sector->readSector(($breakdown[0] + 1) . '-' . ($breakdown[1] + 1 . '-' . ($breakdown[2] - 1)));

      // Tao
      $this->Ta = $sector->readSector(($breakdown[0] - 1) . '-' . ($breakdown[1] - 1 . '-' . ($breakdown[2])));
      $this->Tb = $sector->readSector(($breakdown[0] ) . '-' . ($breakdown[1] - 1 . '-' . ($breakdown[2])));
      $this->Tc = $sector->readSector(($breakdown[0] + 1) . '-' . ($breakdown[1] - 1 . '-' . ($breakdown[2])));
      $this->Td = $sector->readSector(($breakdown[0] - 1) . '-' . ($breakdown[1] . '-' . ($breakdown[2])));
      // $this->Td = $sectorTd;


      $this->Te = $sector->readSector(($breakdown[0]) . '-' . ($breakdown[1] . '-' . ($breakdown[2])));
      $this->Tf = $sector->readSector(($breakdown[0] + 1) . '-' . ($breakdown[1] . '-' . ($breakdown[2])));
      $this->Tg = $sector->readSector(($breakdown[0]-1) . '-' . ($breakdown[1] + 1 . '-' . ($breakdown[2])));

      $this->Th = $sector->readSector(($breakdown[0]) . '-' . ($breakdown[1] + 1 . '-' . ($breakdown[2])));
      $this->Ti = $sector->readSector(($breakdown[0] + 1) . '-' . ($breakdown[1] + 1 . '-' . ($breakdown[2])));


      $this->Za = $sector->readSector(($breakdown[0] - 1) . '-' . ($breakdown[1] - 1 . '-' . ($breakdown[2] + 1)));
      $this->Zb = $sector->readSector(($breakdown[0] ) . '-' . ($breakdown[1] - 1 . '-' . ($breakdown[2] + 1)));
      $this->Zc = $sector->readSector(($breakdown[0] + 1) . '-' . ($breakdown[1] - 1 . '-' . ($breakdown[2] + 1)));

      $this->Zd = $sector->readSector(($breakdown[0] - 1) . '-' . ($breakdown[1] . '-' . ($breakdown[2] + 1)));
      $this->Ze = $sector->readSector(($breakdown[0]) . '-' . ($breakdown[1] . '-' . ($breakdown[2] + 1)));
      $this->Zf = $sector->readSector(($breakdown[0] + 1) . '-' . ($breakdown[1] . '-' . ($breakdown[2] + 1)));

      $this->Zg = $sector->readSector(($breakdown[0]-1) . '-' . ($breakdown[1] + 1 . '-' . ($breakdown[2] + 1)));
      $this->Zh = $sector->readSector(($breakdown[0]) . '-' . ($breakdown[1] + 1 . '-' . ($breakdown[2] + 1)));
      $this->Zi = $sector->readSector(($breakdown[0] + 1) . '-' . ($breakdown[1] + 1 . '-' . ($breakdown[2] + 1)));
    }

    // private function getNear($coordinates)
    // {

    //   $nearby = explode('-', $coordinates->coor);
    //   return $nearby[0];

    // }

}

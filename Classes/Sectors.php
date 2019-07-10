<?php

/**
  Neighboring Sectors to home and surveyed areas
 **/

class Sectors {


    public $coor;
    // private $coordinates;

    public function __construct($coor) {
      $breakdown = explode('-', $coor);

      // Sigma
      $this->Sa = ($breakdown[0] - 1) . '-' . ($breakdown[1] - 1 . '-' . ($breakdown[2] - 1));
      $this->Sb = ($breakdown[0] ) . '-' . ($breakdown[1] - 1 . '-' . ($breakdown[2] - 1));
      $this->Sc = ($breakdown[0] + 1) . '-' . ($breakdown[1] - 1 . '-' . ($breakdown[2] - 1));

      $this->Sd = ($breakdown[0] - 1) . '-' . ($breakdown[1] . '-' . ($breakdown[2] - 1));
      $this->Se = ($breakdown[0]) . '-' . ($breakdown[1] . '-' . ($breakdown[2] - 1));
      $this->Sf = ($breakdown[0] + 1) . '-' . ($breakdown[1] . '-' . ($breakdown[2] - 1));

      $this->Sg = ($breakdown[0]-1) . '-' . ($breakdown[1] + 1 . '-' . ($breakdown[2] - 1));
      $this->Sh = ($breakdown[0]) . '-' . ($breakdown[1] + 1 . '-' . ($breakdown[2] - 1));
      $this->Si = ($breakdown[0] + 1) . '-' . ($breakdown[1] + 1 . '-' . ($breakdown[2] - 1));

      // Tao
      $this->Ta = ($breakdown[0] - 1) . '-' . ($breakdown[1] - 1 . '-' . ($breakdown[2]));
      $this->Tb = ($breakdown[0] ) . '-' . ($breakdown[1] - 1 . '-' . ($breakdown[2]));
      $this->Tc = ($breakdown[0] + 1) . '-' . ($breakdown[1] - 1 . '-' . ($breakdown[2]));

      $this->Td = ($breakdown[0] - 1) . '-' . ($breakdown[1] . '-' . ($breakdown[2]));
      $this->Te = ($breakdown[0]) . '-' . ($breakdown[1] . '-' . ($breakdown[2]));
      $this->Tf = ($breakdown[0] + 1) . '-' . ($breakdown[1] . '-' . ($breakdown[2]));

      $this->Tg = ($breakdown[0]-1) . '-' . ($breakdown[1] + 1 . '-' . ($breakdown[2]));
      $this->Th = ($breakdown[0]) . '-' . ($breakdown[1] + 1 . '-' . ($breakdown[2]));
      $this->Ti = ($breakdown[0] + 1) . '-' . ($breakdown[1] + 1 . '-' . ($breakdown[2]));

      // Zeta
      $sectorZa = ($breakdown[0] - 1) . '-' . ($breakdown[1] - 1 . '-' . ($breakdown[2] + 1));
      $this->Za = $sectorZa . ';;;';

      $this->Zb = ($breakdown[0] ) . '-' . ($breakdown[1] - 1 . '-' . ($breakdown[2] + 1));
      $this->Zc = ($breakdown[0] + 1) . '-' . ($breakdown[1] - 1 . '-' . ($breakdown[2] + 1));

      $this->Zd = ($breakdown[0] - 1) . '-' . ($breakdown[1] . '-' . ($breakdown[2] + 1));
      $this->Ze = ($breakdown[0]) . '-' . ($breakdown[1] . '-' . ($breakdown[2] + 1));
      $this->Zf = ($breakdown[0] + 1) . '-' . ($breakdown[1] . '-' . ($breakdown[2] + 1));

      $this->Zg = ($breakdown[0]-1) . '-' . ($breakdown[1] + 1 . '-' . ($breakdown[2] + 1));
      $this->Zh = ($breakdown[0]) . '-' . ($breakdown[1] + 1 . '-' . ($breakdown[2] + 1));
      $this->Zi = ($breakdown[0] + 1) . '-' . ($breakdown[1] + 1 . '-' . ($breakdown[2] + 1));
    }

    // private function getNear($coordinates)
    // {

    //   $nearby = explode('-', $coordinates->coor);
    //   return $nearby[0];

    // }

}

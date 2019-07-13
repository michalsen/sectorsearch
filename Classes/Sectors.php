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


     $sectors = [
                  ['name' => 'Sa', 'compute' => ['-1', '-1', '-1']],
                  ['name' => 'Sb', 'compute' => ['+0', '-1', '-1']],
                  ['name' => 'Sc', 'compute' => ['+1', '-1', '-1']],
                  ['name' => 'Sd', 'compute' => ['-1', '+0', '-1']],
                  ['name' => 'Se', 'compute' => ['+0', '+0', '-1']],
                  ['name' => 'Sf', 'compute' => ['+1', '+0', '-1']],
                  ['name' => 'Sg', 'compute' => ['-1', '+1', '-1']],
                  ['name' => 'Sh', 'compute' => ['+0', '+1', '-1']],
                  ['name' => 'Si', 'compute' => ['+1', '+1', '-1']],
                  ['name' => 'Ta', 'compute' => ['-1', '-1', '-1']],
                  ['name' => 'Tb', 'compute' => ['+0', '-1', '-1']],
                  ['name' => 'Tc', 'compute' => ['+1', '-1', '-1']],
                  ['name' => 'Td', 'compute' => ['-1', '+0', '-1']],
                  ['name' => 'Te', 'compute' => ['+0', '+0', '+0']],
                  ['name' => 'Tf', 'compute' => ['+1', '+0', '-1']],
                  ['name' => 'Tg', 'compute' => ['-1', '+1', '-1']],
                  ['name' => 'Th', 'compute' => ['+0', '+1', '-1']],
                  ['name' => 'Ti', 'compute' => ['+1', '+1', '-1']],
                  ['name' => 'Za', 'compute' => ['-1', '-1', '-1']],
                  ['name' => 'Zb', 'compute' => ['+0', '-1', '-1']],
                  ['name' => 'Zc', 'compute' => ['+1', '-1', '-1']],
                  ['name' => 'Zd', 'compute' => ['-1', '+0', '-1']],
                  ['name' => 'Ze', 'compute' => ['+0', '+0', '-1']],
                  ['name' => 'Zf', 'compute' => ['+1', '+0', '-1']],
                  ['name' => 'Zg', 'compute' => ['-1', '+1', '-1']],
                  ['name' => 'Zh', 'compute' => ['+0', '+1', '-1']],
                  ['name' => 'Zi', 'compute' => ['+1', '+1', '-1']],
                ];


      foreach ($sectors as $key => $value) {
        $compute0  = $this->compute($breakdown[0], $value['compute'][0]);
        $compute1  = $this->compute($breakdown[1], $value['compute'][1]);
        $compute2  = $this->compute($breakdown[2], $value['compute'][2]);
        $this->{$value['name']} = $sector->readSector($compute0 . '-' . $compute1 . '-' .  $compute2);
      }

    }

    public function compute($num1, $num2) {
        $length = strlen($num2);

        $operator = array();
        for ($i=0; $i<$length; $i++) {
            $operator[$i] = $num2[$i];
        }

        switch($operator[0]) {
            case "+": return $num1 + $operator[1];
            case "-": return $num1 - $operator[1];
            case "*": return $num1 * $operator[1];
            case "/": return $num1 / $operator[1];
        return pow($num1, $operator[1]);
        }
      }


}



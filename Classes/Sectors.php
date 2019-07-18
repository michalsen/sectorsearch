<?php

/**
  Neighboring Sectors to home and surveyed areas
 **/

class Sectors {


    public $coor;
    // private $coordinates;

    public function __construct($coor) {
      print 'coor' . $coor;
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

                  ['name' => 'Ta', 'compute' => ['-1', '-1', '+0']],
                  ['name' => 'Tb', 'compute' => ['+0', '-1', '+0']],
                  ['name' => 'Tc', 'compute' => ['+1', '-1', '+0']],
                  ['name' => 'Td', 'compute' => ['-1', '+0', '+0']],
                  ['name' => 'Te', 'compute' => ['+0', '+0', '+0']],
                  ['name' => 'Tf', 'compute' => ['+1', '+0', '+0']],
                  ['name' => 'Tg', 'compute' => ['-1', '+1', '+0']],
                  ['name' => 'Th', 'compute' => ['+0', '+1', '+0']],
                  ['name' => 'Ti', 'compute' => ['+1', '+1', '+0']],

                  ['name' => 'Za', 'compute' => ['-1', '-1', '+1']],
                  ['name' => 'Zb', 'compute' => ['+0', '-1', '+1']],
                  ['name' => 'Zc', 'compute' => ['+1', '-1', '+1']],
                  ['name' => 'Zd', 'compute' => ['-1', '+0', '+1']],
                  ['name' => 'Ze', 'compute' => ['+0', '+0', '+1']],
                  ['name' => 'Zf', 'compute' => ['+1', '+0', '+1']],
                  ['name' => 'Zg', 'compute' => ['-1', '+1', '+1']],
                  ['name' => 'Zh', 'compute' => ['+0', '+1', '+1']],
                  ['name' => 'Zi', 'compute' => ['+1', '+1', '+1']],
                ];


      foreach ($sectors as $key => $value) {

        // if ($value['name'] != 'Te') {
          $value0 = ($breakdown[0] > 0 ? $breakdown[0] : 9);
          $value1 = ($breakdown[1] > 0 ? $breakdown[1] : 9);
          $value2 = ($breakdown[2] > 0 ? $breakdown[2] : 9);
          print $value0 . '-' . $value1 . '-' . $value2 . '<br>';
            $compute0  = $this->compute($value0, $value['compute'][0]);
            $compute1  = $this->compute($value1, $value['compute'][1]);
            $compute1  = $this->compute($value2, $value['compute'][2]);
        // }
        //  else {
        //   $value0 = ($breakdown[0] > 0 ? $breakdown[0] : 9);
        //   $value1 = ($breakdown[1] > 0 ? $breakdown[1] : 9);
        //     $compute0 = $this->compute($value0, $value['compute'][0]);
        //     $compute1 = $this->compute($value1, $value['compute'][1]);
        //     $compute2 = $breakdown[2];
        //  }


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



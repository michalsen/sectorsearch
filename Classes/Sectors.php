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
                  ['name' => 'Sb', 'compute' => ['', '-1', '-1']],
                  ['name' => 'Sc', 'compute' => ['+1', '-1', '-1']],
                  ['name' => 'Sd', 'compute' => ['-1', '', '-1']],
                  ['name' => 'Se', 'compute' => ['', '', '-1']],
                  ['name' => 'Sf', 'compute' => ['+1', '', '-1']],
                  ['name' => 'Sg', 'compute' => ['-1', '+1', '-1']],
                  ['name' => 'Sh', 'compute' => ['', '+1', '-1']],
                  ['name' => 'Si', 'compute' => ['+1', '+1', '-1']],
                  ['name' => 'Ta', 'compute' => ['-1', '-1', '-1']],
                  ['name' => 'Tb', 'compute' => ['', '-1', '-1']],
                  ['name' => 'Tc', 'compute' => ['+1', '-1', '-1']],
                  ['name' => 'Td', 'compute' => ['-1', '', '-1']],
                  ['name' => 'Te', 'compute' => ['', '', '-1']],
                  ['name' => 'Tf', 'compute' => ['+1', '', '-1']],
                  ['name' => 'Tg', 'compute' => ['-1', '+1', '-1']],
                  ['name' => 'Th', 'compute' => ['', '+1', '-1']],
                  ['name' => 'Ti', 'compute' => ['+1', '+1', '-1']],
                  ['name' => 'Za', 'compute' => ['-1', '-1', '-1']],
                  ['name' => 'Zb', 'compute' => ['', '-1', '-1']],
                  ['name' => 'Zc', 'compute' => ['+1', '-1', '-1']],
                  ['name' => 'Zd', 'compute' => ['-1', '', '-1']],
                  ['name' => 'Ze', 'compute' => ['', '', '-1']],
                  ['name' => 'Zf', 'compute' => ['+1', '', '-1']],
                  ['name' => 'Zg', 'compute' => ['-1', '+1', '-1']],
                  ['name' => 'Zh', 'compute' => ['', '+1', '-1']],
                  ['name' => 'Zi', 'compute' => ['+1', '+1', '-1']],
                ];


      foreach ($sectors as $key => $value) {
        print $value['compute'][0] . '<br>';
        $compute = compute($breakdown[0], $value['compute'][0]);
        print  $compute . '<br>';
        // $this->{$value['name']} = $sector->readSector(($breakdown[0] . $compute[0]) . '-' . ($breakdown[1] . $compute[1]) . '-' . ($breakdown[2] . $compute[2]));
      }

    }


}

function compute($num1, $num2) {

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

        // and handle errors:
        // default: throw new UnexpectedValueException("Invalid operator");
    }
  }


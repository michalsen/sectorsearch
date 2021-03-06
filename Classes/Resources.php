<?php

class Resources {

    public $player

    public function getResource($player)
    {

    }

    public function purchase($player)
    {

    }

    public function playerResources($id, $stats, $playerdata)
    {

      $startTime = $stats['start'];
      $currentTime = date('U');


      $purchases = R::find('purchase',' player = ? ',
             array( $_SESSION['player'] )
           );

      $metal = 0;
      $fuel = 0;
      $food = 0;

      foreach ($purchases as $key => $value) {
        if ($value->type == 'purchase') {
          if ($value->item == 'miner') {
            $metal = $metal + 500;
            $fuel = $fuel + 200;
            $food = $food + 300;
          }
          if ($value->item == 'scout') {
            $metal = $metal + 200;
            $fuel = $fuel + 800;
            $food = $food + 200;
          }
        }
      }

      $resourceAllotment = ($currentTime - $startTime)/10000000 * $stats['level'];

      $upper = $playerdata['moons'] * 2;
      $Resource = [];
      $Resource['power'] = round($playerdata['sun'] * 3.2 * $upper + $resourceAllotment);
      $Resource['material'] = round($playerdata['rocky_planets'] * 3 * $upper + $resourceAllotment);
      $Resource['food'] = round($playerdata['goldilocks_planets'] * 2.5 * $upper + $resourceAllotment) - $food;
      $Resource['metal'] = round($playerdata['belts'] * 2.2 * $upper + $resourceAllotment) - $metal;
      $Resource['fuel'] = round($playerdata['gas_planets'] * 2.1 * $upper + $resourceAllotment) - $fuel;

      $playerdata['Resources'] = $Resource;

      return $playerdata;

    }

}

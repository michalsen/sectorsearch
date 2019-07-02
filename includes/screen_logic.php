<?php

switch ($return['screen']) {
  case 'Home':



    $resource = new Resource();
    $stats = $player->stats($_SESSION['player']);


    $homeID = R::findOne('resource',' id = ? ',
                array($stats->home)
               );

    $coor = R::findOne('sectors',' coordinates = ? ',
                array($homeID->home)
               );


    $Resources = $resource->getResource($coor->coordinates);


    $player = [];

    foreach ($stats as $key => $value) {

      if ($key == 'name') {
        $player['name'] = $value;
      }
      if ($key == 'level') {
        $player['level'] = $value;
      }
      if ($key == 'legion') {
        $player['legion'] = $value;
      }
    }

    foreach ($Resources as $key => $value) {
      $playerdata[$key] = $value;
    }

    foreach ($playerdata as $key => $value) {
      if (!preg_match('/danger/', $key)) {
        $playerData[$key] = $value;
      }
    }


    $sectors = new Sectors($playerData['coordinates']);
    print '<hr>';
    // print 'coor:' . $playerData['coordinates'];
    print_r($sectors);

    $Resource = playerResources($_SESSION['player'], $stats, $playerdata);

    $template = $twig->loadTemplate('home.html');

    echo $template->render(array(
              'player' => $player,
              'playerdata' => $playerData,
              'Resources' => $Resource['Resources'],
              'Sectors' => $sectors,
            )
          );
    break;
  case 'registration':
    $content = $return['content'];
    $return = ['name' => 'Registration', 'content' => $content];
    $template = $twig->loadTemplate('index.html');
    echo $template->render($return);
    break;
  case 'Login':
    $content = $return['content'];
    $return = ['name' => 'Login', 'content' => $content];

    $template = $twig->loadTemplate('index.html');
    echo $template->render($return);

    break;
}



function playerResources($id, $stats, $playerdata) {

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

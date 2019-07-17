<?php
session_start();
require_once '../../vendor/autoload.php';
require '../../Classes/Resource.php';
require '../../includes/rb.php';
R::setup('mysql:host=database;dbname=lamp','lamp', 'lamp');


// print_r($_REQUEST);

$sector = preg_replace('/<br>/', '-', $_REQUEST['data']);
// print $sector;


    $sectorDetail = R::find('sectors',' name = ? ', [$sector]);

foreach ($sectorDetail as $key => $value) {

  $sectorDetail = R::findOne('sectorsmapped',' pid = ?  AND home = ?', [$_SESSION['player'], $value->coordinates]);

  if(is_object($sectorDetail)) {
  $return = '<ul>
    <li> Suns: ' . $value->sun . ' </li>
    <li> Planets: </li>
    <ul>
      <li> Goldilocks: ' . $value->goldilocks_planets . ' </li>
      <li> Rocky: ' . $value->rocky_planets . ' </li>
      <li> Gas Giants: ' . $value->gas_planets . ' </li>
    </ul>
    <li> Moons: ' . $value->moons . ' </li>
    <li> Asteroid Belts: ' . $value->belts . ' </li>
  </ul>';
  }
   else {
    $return = 'Send Scouts';
   }

  print $return;

}


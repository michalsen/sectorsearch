<?php
session_start();
require_once '../../vendor/autoload.php';
require '../../Classes/Resource.php';
require '../../includes/rb.php';
R::setup('mysql:host=database;dbname=lamp','lamp', 'lamp');




$sector = preg_replace('/<br>/', '-', $_REQUEST['data']);
// print $sector;


$sectorDetail = R::find('sectors',' name = ? ', [$sector]);
// print '<pre>';
// print_r($sectorDetail);
// print '</pre>';

foreach ($sectorDetail as $key => $value) {
  print $value->coordinates . '<br>';
  $sectorDetail = R::findOne('sectorsmapped',' pid = ?  AND home = ?', [$_SESSION['player'], $value->coordinates]);

  if(is_object($sectorDetail)) {
  $return = $sector . '<ul>
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
    $return = 'Send Scouts to ' . $value->coordinates;
   }

  print $return;

}


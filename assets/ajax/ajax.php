<?php
session_start();
require_once '../../vendor/autoload.php';
require '../../Classes/Resource.php';
require '../../includes/rb.php';
R::setup('mysql:host=database;dbname=lamp','lamp', 'lamp'););

$return = '';
if (count($_REQUEST) > 0) {
  foreach ($_REQUEST as $type => $item) {
    $return .= $type . ': ' . $item . '<br>';

      $purchase = new Resource();
      $purchaseID = $purchase->resourcePurchase($type, $item);

    echo 'purchaseID: ' . $purchaseID;

  }
}
 else {
  $return = 'nope';
 }

//echo $return;

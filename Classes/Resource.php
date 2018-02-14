<?php

class Resource {

    public $coordinates;
    public $coord;
    public $type;
    public $item;

    public function getResource($coordinates)
    {
      $coord = R::findOne('sectors',' coordinates = ? ',
                 array( $coordinates )
               );
      return $coord;
    }

    public function resourcePurchase($type, $item)
    {

      $purchase = R::dispense( 'purchase' );
      $purchase->player = $_SESSION['player'];
      $purchase->type = $type;
      $purchase->item = $item;
      $purchase->start = date('U');
      $purchaseID = R::store($purchase);

      return $purchaseID;

    }
}

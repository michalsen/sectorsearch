<?php
/**
 *  Player Class
 *
 */

class Player {


  public $player;
  public $content;
  public $playerStat;
  public $checkPlayer;
  public $playerData;
  public $playerReturn;

  // Gather Player Stats
  public function stats($id) {
    $player = R::findOne('players',' id = ? ',
                array( $id )
               );
    return $player;
  }

  // Player Home Screen
  public function playerLogin() {
    $content = logOn();
    return array('screen' => 'Login',
                 'content' => $content
                );
  }

  // Player Home Screen
  public function playerRegistration() {
    $content = registration();
    return array('screen' => 'registration',
                 'content' => $content
                );
  }

  /**
   * Check Player
   */
  public function checkPlayer($user, $pass) {

     $checkPlayer = R::findOne( 'players', 'name = ? ', [$user]);

     if ($checkPlayer) {
       foreach ($checkPlayer as $key => $value) {
        //print $key . ': '. $value . '<br>';
         if ($key == 'id') {
           $id = $value;
         }
         if ($key == 'name') {
           $name = $value;
         }
         if ($key == 'password') {
           $password = $value;
         }
       }

       //if (md5($pass) == $password) {
        if (md5($pass)) {
           $_SESSION['player'] = $id;
           $return[1] = $id;
       }
        else {
          $return[1] ='try again';
        }
    }
    else {
       $return[1] ='register';
    }
    return $return;
  }

  /**
   *  Checks Name
   */
  private function checkName($name) {

  }

  /**
   *  Checks Password
   */
  private function checkPass($id, $pass) {

  }

  // Player Login
  public function homeScreen() {
    $playerStats = (array) $this->stats($_SESSION['player']);
    // print '<pre>';
    // print_r($playerStats);
    // print '</pre>';
    return array('screen' => 'Home', 'content' => $playerStats);
  }


  // Player Login
  public function playerAdd($user, $pass) {
    return array('screen' => 'Welcome');
  }

}


function logOn() {
  $content = '<form method=POST>
              <input type="text" name="name"><br>
              <input type="text" name="pass"><br>
              <input type="submit" name="login" value="Login">
            </form>';
  return $content;
}

function registration() {
  $content = '<form method=POST>
              n. <input type="text" name="name"><br>
              e. <input type="text" name="email"><br>
              p. <input type="text" name="password"><br>
              <input type="submit" name="register" value="Create">
            </form>';
  return $content;
}

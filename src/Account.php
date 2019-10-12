<?php
/*
 * This file is part of the harvest sync tool.
 *
 * (c) vipomx <vpolancop@gmail.com>
 *
 */

namespace  vipomx\harvestSync;

class Account
{
  function __construct($accessToken, $harvestID) {
    $this->token = $accessToken;
    $this->id = $harvestID;
  }
  private $token;
  private $id;

  public function Get($property, $filters = []) {
    $url = '';
    switch ($property){
      case 'account':
        $url = "https://api.harvestapp.com/v2/users/me";
        break;

      case 'time':
        $url = 'https://api.harvestapp.com/v2/time_entries';
        break;
    }
    if (!empty($url)) {
      $request = new RequestHandler();
      return $request->Get($url, $this->token, $this->id, $filters);
    }
    else {
      return "Error can't found the property: " . $property;
    }
  }
}
<?php
/*
 * This file is part of the harvest sync tool.
 *
 * (c) vipomx <vpolancop@gmail.com>
 *
 */

namespace vipomx\harvestSync;

use Curl\Curl;

class RequestHandler
{
  public static function Get($url, $accessToken, $harvestID, $filters = []) {
    $handler = new Curl();
    $handler->setHeader("Authorization", "Bearer ". $accessToken);
    $handler->setHeader("Harvest-Account-ID", $harvestID);
    $handler->setUserAgent('Harvest API Sync');
    $handler->setOpt(CURLOPT_RETURNTRANSFER, TRUE);
    $handler->get($url, $filters);

    if ($handler->error) {
      return $handler->error_code;
    }
    else {
      return $handler->response;
    }
  }
}

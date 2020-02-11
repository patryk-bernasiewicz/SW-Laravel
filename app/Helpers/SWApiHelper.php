<?php

namespace App\Helpers;

use App\Helpers\ApiCallsHelper;
use App\SWCharacter;
use App\DTO\CharacterFromApiDTO;

class SWApiHelper {
  private static $_sleep = 30;
  private static $base_url = 'https://swapi.co/api/people/';

  public static function updateCharacters($url = null) {
    $url = $url ?? static::$base_url;

    $helper = ApiCallsHelper::getInstance();

    // Request JSON data from API
    $response = $helper->request_json($url ?? self::$base_url);

    if (!empty($response['error'])) {
      throw new Error('Could not load data from API!' . $response['error']);
    }

    $results = $response['results'];

    // Convert all results to array
    foreach ($results as &$result) {
        $result = (array)new CharacterFromApiDTO($result);
    }

    // Insert characters batch into DB
    SWCharacter::insert($results);

    // Recurrently retrieve more data until we run out of characters
    if (!empty($response['next'])) {
        usleep(self::$_sleep);
        $results = array_merge($results, static::updateCharacters($response['next']));
    }

    return $results;
  }
}
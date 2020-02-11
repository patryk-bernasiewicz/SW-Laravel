<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Exception\ClientException;
use GuzzleRetry\GuzzleRetryMiddleware;

class ApiCallsHelper {
  private $_client;
  private $_sleep = 20;

  public $name = 'ApiCallsHelper!';

  private static $instance;

  final public static function getInstance() {
    self::$instance = self::$instance ?? new self();
    return self::$instance;
  }

  public function __construct() {
    $stack = HandlerStack::create();
    $stack->push(GuzzleRetryMiddleware::factory());

    $this->_client = new Client(['handler' => $stack]);
  }

  /**
   * Return all attributes from provided URL
   */
  public function request_json($url, $assoc = true) {
    try {
      $response = $this->_client->request('GET', $url);
    } catch (ClientException $e) {
      $responseBodyAsString = $response->getBody()->getContents();
      return ['error' => $responseBodyAsString];
    }
    
    if ($response->getStatusCode() === 200) {
      $body = $response->getBody();
      $data = $body->getContents();

      return json_decode($data, true);
    }

    return false;
  }

  /**
   * Return data from provided URLs as JSON
   */
  public function request_json_array($urls) {
    $data = [];

    foreach ($urls as $url) {
      usleep($this->_sleep);
      
      try {
        $response = $this->_client->request('GET', $url);
      } catch (ClientException $e) {
        $responseBodyAsString = $response->getBody()->getContents();
        return ['error' => $responseBodyAsString];
      }

      if ($response->getStatusCode() === 200) {
        $body = $response->getBody();
        $_data = $body->getContents();
      }

      if (!empty($_data)) {
        $data[] = $_data;
      }
    }

    return $data;
  }
}
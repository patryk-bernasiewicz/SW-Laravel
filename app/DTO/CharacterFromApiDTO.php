<?php

namespace App\DTO;

class CharacterFromApiDTO {
  public $name;
  public $height;
  public $mass;
  public $hair_color;
  public $skin_color;
  public $eye_color;
  public $birth_year;
  public $gender;
  public $homeworld;
  public $films;
  public $species;
  public $vehicles;
  public $starships;
  public $created;
  public $edited;
  public $url;
  
  public function __construct($character) {
    $this->name = $character['name'];
    $this->height = intval($character['height']);
    $this->mass = intval($character['mass']);
    $this->hair_color = $character['hair_color'];
    $this->skin_color = $character['skin_color'];
    $this->eye_color = $character['eye_color'];
    $this->birth_year = $character['birth_year'];
    $this->gender = $character['gender'];
    $this->homeworld = $character['homeworld'];
    $this->films = json_encode($character['films']);
    $this->species = json_encode($character['species']);
    $this->vehicles = json_encode($character['vehicles']);
    $this->starships = json_encode($character['starships']);
    $this->created = date('Y-m-d H:i:s', preg_replace('/[^0-9]/', '', (int)$character['created'] / 1000));
    $this->edited = date('Y-m-d H:i:s', preg_replace('/[^0-9]/', '', (int)$character['edited'] / 1000));
    $this->url = $character['url'];
  }
}
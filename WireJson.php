<?php namespace ProcessWire;

/**
* Object to encode JSON into from FieldtypeJson
*/
class WireJson extends WireData {

  /*
    Shorthand methods to import/export
   */
  function __construct($value = null) {
    parent::__construct();

    // string = json (probably)
    if (is_string($value)){
      $this->fromJson($value);
    }

    if (is_array($value)){
      $this->setArray($value);
    }
  }

  public function __toString() {
    return $this->toJson();
  }

  /*
    Custom methods to import/export
   */
  public function fromJson($jsonString = null) {
    if (!is_string($jsonString)) { return $this; }

    $jsonDecoded = json_decode($jsonString);
    if (is_object($jsonDecoded)){
      return $this->setArray(get_object_vars($jsonDecoded));
    }
  }

  public function toJson() {
    return wireEncodeJSON($this->getArray(), true, true);
  }

}
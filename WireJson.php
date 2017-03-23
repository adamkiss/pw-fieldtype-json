<?php namespace ProcessWire;

/**
* Object to encode JSON into from FieldtypeJson
*/
class WireJson extends WireData {

  function __construct($jsonString = '') {
    parent::__construct();

    if (!empty($jsonString)){
      $this->fromJson($jsonString);
    }
  }

  public function __toString() {
    return $this->toJson();
  }

  public function fromJson($jsonString) {
    $jsonDecoded = json_decode($jsonString);
    return $this->setArray(get_object_vars($jsonDecoded));
  }

  public function toJson() {
    return wireEncodeJSON($this->getArray(), true);
  }

}
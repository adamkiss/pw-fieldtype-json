<?php namespace ProcessWire;

/**
* Object to encode JSON into from FieldtypeJson
*/
class WireJson extends WireData {

  public function fromJson($jsonString) {
    $jsonDecoded = json_decode($jsonString);
    return $this->setArray(get_object_vars($jsonDecoded));
  }

  public function toJson() {
    return wireEncodeJSON($this->getArray(), true);
  }

}
<?php namespace ProcessWire;

/**
* Fieldtype that stores arbitrary data as JSON text (for ease of editability in PW)
*/
class FieldtypeJson extends FieldtypeTextarea {

  public function init() {
    parent::init();
    require_once dirname(__FILE__) . '/WireJson.php';
  }

}
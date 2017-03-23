<?php namespace ProcessWire;

/**
* Fieldtype that stores arbitrary data as JSON text (for ease of editability in PW)
*/
class FieldtypeJson extends FieldtypeTextarea {

  /**
   * Initialize the fieldtype: include custom object (once)
   */
  public function init() {
    parent::init();

    require_once dirname(__FILE__) . '/WireJson.php';

    $this->allowTextFormatters(false);
  }

  public function getDefaultValue(Page $page, Field $field) {
    return $this->___getBlankValue($page, $field);
  }

  public function ___getBlankValue(Page $page, Field $field) {
    return new WireJson();
  }

  public function ___wakeupValue(Page $page, Field $field, $value) {
    // if $value is already WireJson (for whatever reason)
    if (is_object($value) && $value instanceof WireJson){
      return $value;
    }

    // else create new WireJson
    return new WireJson($value);
  }

  public function ___formatValue(Page $page, Field $field, $value) {
    // if $value is already WireJson (for whatever reason)
    if (is_object($value) && $value instanceof WireJson){
      return $value;
    }

    // else create new WireJson
    return new WireJson($value);
  }

  public function ___sleepValue(Page $page, Field $field, $value) {
    // if $value is already string
    if (is_string($value)) { return $value; }

    // else return JSON
    return $value->toJson();
  }
}

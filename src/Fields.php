<?php
class ExtJsTypes_Fields extends ExtJsTypes_TypeAbstract
{
  /**
   * List of fields for the grid.
   * @var array A list of field-names.
   */
  protected $items = array();

  public function __construct()
  {
    $this->setXtype('fields');
  }

  /**
   * Appends a single field.
   * @param string $fieldName The name of the field.
   * @return ExtJsTypes_Fields
   */
  public function add($fieldName)
  {
    $this->items[] = $fieldName;
    return $this;
  }

  /**
   * Prepare the type-structure.
   * @return array A list of stdClass instances.
   */
  public function prepare()
  {
    return $this->items;
  }
}
<?php
class ExtJsTypes_Data extends ExtJsTypes_Fields
{
  /**
   * Appends a single field.
   * @param array $field The data for the fields.
   * @return ExtJsTypes_Fields
   */
  public function put(array $field)
  {
    parent::add($field);
    return $this;
  }
}
<?php
/**
 * A interface for the Ext.form.field.VTypes
 */
interface ExtJsTypes_VTypes_TypeInterface
{
  /**
   * VTypes can be applied to a Text Field using the vtype configuration.
   * @return string The validation type.
   */
  public function getType();
}
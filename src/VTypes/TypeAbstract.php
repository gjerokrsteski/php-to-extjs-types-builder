<?php
/**
 * Abstract class for the field validation object-summary.
 * @uses ExtJsTypes_VTypes_TypeAbstract
 */
abstract class ExtJsTypes_VTypes_TypeAbstract implements ExtJsTypes_VTypes_TypeInterface
{
  /**
   * @var string
   */
  protected $type;

  /**
   * VTypes can be applied to a Text Field using the vtype configuration.
   * @return string The validation type.
   */
  public function getType()
  {
    return $this->type;
  }
}
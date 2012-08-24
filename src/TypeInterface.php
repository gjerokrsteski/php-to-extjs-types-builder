<?php
interface ExtjsTypes_TypeInterface
{
  /**
   * The xtype configuration option must be used
   * to optimize Component creation and rendering.
   * @param string $xtype
   */
  public function setXtype($xtype);

  /**
   * @return string
   */
  public function getXtype();

  /**
   * Prepare the type-structure.
   * @return array
   */
  public function prepare();
}
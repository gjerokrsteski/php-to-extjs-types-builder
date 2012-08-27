<?php
/**
 * PHP Version 5
 *
 * The ExtJS-Types-Builder is a OOP-PHP-Framework
 * and creates JSON suitable strings for the communication
 * with your ExtJS-GUI.
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.
 * It is also available through the world-wide-web at this URL:
 * http://krsteski.de/new-bsd-license/
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to gjero@krsteski.de so we can send you a copy immediately.
 *
 * @copyright Copyright (c) 2010-2011 Gjero Krsteski (http://krsteski.de)
 * @license   http://krsteski.de/new-bsd-license New BSD License
 */

/**
 * @package ExtJsTypes
 * @author Gjero Krsteski <gjero@krsteski.de>
 */
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
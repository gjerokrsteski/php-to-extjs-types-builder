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
 * Abstract class for the field validation object-summary.
 *
 * @package ExtJsTypes_VTypes
 * @author Gjero Krsteski <gjero@krsteski.de>
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
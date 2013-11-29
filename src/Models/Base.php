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
namespace ExtJsTypes\Models;

/**
 * @package Models
 * @author Gjero Krsteski <gjero@krsteski.de>
 */
abstract class Base
{
  /**
   * Returns the properties of the given model-object.
   * For another properties output format, please overide this method.
   * @see \ExtjsTypes\InterfaceModel::prepare()
   * @return \ExtJsTypes\Base[]
   */
  public function prepare()
  {
    return $this->mapProperties(
      $this->fetchClassVars()
    );
  }

  /**
   * Get the default properties of the class.
   * @return array
   */
  protected function fetchClassVars()
  {
    return get_class_vars(get_class($this));
  }

  /**
   * Maps the properties to array with actual values.
   * For another properties-mapping, please overide this method.
   * @param array $properties
   * @return array
   */
  protected function mapProperties(array $properties)
  {
    $propertiesMap = array();

    foreach ($properties as $name => $defaultVal) {
      $propertiesMap[$name] = (true === empty($this->$name)) ? $defaultVal : $this->$name;
    }

    return $propertiesMap;
  }
}
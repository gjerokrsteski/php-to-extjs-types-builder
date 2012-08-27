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
 * This class specifies the definition for a column inside a Ext.grid.Panel.
 * It encompasses both the grid header configuration as well as displaying
 * data within the grid itself.
 *
 * @package ExtJsTypes
 * @author Gjero Krsteski <gjero@krsteski.de>
 */
class ExtJsTypes_Columns extends ExtJsTypes_TypeAbstract
{
  /**
   * List of columns for the grid.
   * @var array A list of stdClass instances.
   */
  protected $columns = array();

  public function __construct()
  {
    $this->setXtype('columns');
  }

  /**
   * Appends a single column.
   * @param string  $header    Sets the header text for the column.
   * @param string  $dataIndex The field in the underlying Ext.data.Store to use as the value for the column.
   * @param boolean $flex      A column can either be given an explicit width value or a flex configuration.
   * @return ExtJsTypes_Columns
   */
  public function add($header, $dataIndex, $flex = false)
  {
    $this->columns[] = (object)array(
      'header'    => $header,
      'dataIndex' => $dataIndex,
      'flex'      => $flex
    );

    return $this;
  }

  /**
   * Prepare the type-structure.
   * @return array A list of stdClass instances.
   */
  public function prepare()
  {
    return $this->columns;
  }
}
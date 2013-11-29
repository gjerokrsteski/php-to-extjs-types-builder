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
namespace ExtJsTypes;

/**
 * @package ExtJsTypes
 * @author Gjero Krsteski <gjero@krsteski.de>
 */
class Grid extends Base
{
  /**
   * The title text to be used to display in the panel header.
   * @var string
   */
  protected $title;

  /**
   * Map to Store fields.
   * @var object
   */
  protected $fields;

  /**
   * @var Columns
   */
  protected $columns;

  /**
   * The initial set of data to apply to the tpl
   * to update the content area of the Component.
   * @var object
   */
  protected $data;

  /**
   * Dock position of this component in its parent panel.
   * @var array
   */
  protected $dockedItems = array();

  /**
   * @param string $title
   */
  public function __construct($title)
  {
    $this->setXtype('gridpanel')->setTitle($title);
  }

  /**
   * Prepare the type-structure.
   * @return array
   */
  public function prepare()
  {
    return array(
      'xtype'  => $this->getXtype(),
      'config' => array(
        'title'       => $this->title,
        'fields'      => $this->fields,
        'columns'     => $this->columns,
        'data'        => $this->data,
        'dockeditems' => $this->dockedItems
      ),
    );
  }

  /**
   * @param string $title
   * @return Grid
   */
  public function setTitle($title)
  {
    $this->title = $title;
    return $this;
  }

  /**
   * @param Columns $columns
   * @return Grid
   */
  public function setColumns(Columns $columns)
  {
    $this->columns = $columns->prepare();
    return $this;
  }

  /**
   * @param Data $data
   * @return Grid
   */
  public function setData(Data $data)
  {
    $this->data = $data->prepare();
    return $this;
  }

  /**
   * @param Fields $fields
   * @return Grid
   */
  public function setFields(Fields $fields)
  {
    $this->fields = $fields->prepare();
    return $this;
  }

  /**
   * Sets the dock position of this component in its parent panel.
   * Note that this only has effect if this item is part of the dockedItems
   * collection of a parent that has a DockLayout
   * (note that any Panel has a DockLayout by default)
   * @param ItemsDocker $item
   * @return Grid
   */
  public function dockItem(ItemsDocker $item)
  {
    $this->dockedItems[] = $item->prepare();
    return $this;
  }
}
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
abstract class Base implements Preparable
{
  /**
   * The xtype configuration option can be used
   * to optimize Component creation and rendering.
   * @var string
   */
  protected $xtype;

  /**
   * The name of the field. This is used as the
   * parameter name when including the field value
   * in a form submit(). If no name is configured,
   * it falls back to the inputId.
   * @var string
   */
  protected $name;

  /**
   * A value to initialize this field with.
   * @var string
   */
  protected $value = '';

  /**
   * The label for the field.
   * @var string
   */
  protected $fieldLabel;

  /**
   * Specify false to validate that the value's length is > 0.
   * @var boolean
   */
  protected $allowBlank = false;

  /**
   * An optional extra CSS class that will be added to
   * this component's Element. This can be useful for
   * adding customized styles to the component or any
   * of its children using standard CSS rules.
   * @var string
   */
  protected $cls = '';

  /**
   * A single item, or an array of child Components to
   * be added to this container. Each item may be
   * ExtJsTyp* configuration object.
   * @var array
   */
  protected $items = array();

  /**
   * @param string $xtype
   * @return Base
   */
  public function setXtype($xtype)
  {
    $this->xtype = $xtype;
    return $this;
  }

  /**
   * @param string $name
   * @return Base
   */
  public function setName($name)
  {
    $this->name = $name;
    return $this;
  }

  /**
   * @param string $value
   * @return Base
   */
  public function setValue($value)
  {
    $this->value = $value;
    return $this;
  }

  /**
   * @param string $fieldLabel
   * @return Base
   */
  public function setFieldLabel($fieldLabel)
  {
    $this->fieldLabel = $fieldLabel;
    return $this;
  }

  /**
   * @param boolean $allowBlank
   * @return Base
   */
  public function setAllowBlank($allowBlank)
  {
    $this->allowBlank = $allowBlank;
    return $this;
  }

  /**
   * @param string $cls
   * @return Base
   */
  public function setCls($cls)
  {
    $this->cls = $cls;
    return $this;
  }

  /**
   * @return string
   */
  public function getXtype()
  {
    return $this->xtype;
  }

  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }

  /**
   * @return string
   */
  public function getValue()
  {
    return $this->value;
  }

  /**
   * @return string
   */
  public function getFieldLabel()
  {
    return $this->fieldLabel;
  }

  /**
   * @return boolean
   */
  public function getAllowBlank()
  {
    return $this->allowBlank;
  }

  /**
   * @return string
   */
  public function getCls()
  {
    return $this->cls;
  }

  /**
   * Appends an form-item.
   *
   * @param Preparable $item
   *
   * @return $this
   */
  public function addItem(Preparable $item)
  {
    $this->items[] = $item->prepare();
    return $this;
  }

  /**
   * @return Preparable[]
   */
  public function getItems()
  {
    return $this->items;
  }
}
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
class ComboBox extends Base
{
  /**
   * The underlying data field name to bind to this ComboBox.
   * @var string
   */
  protected $displayField = '';

  /**
   * The underlying data value name to bind to this ComboBox
   * (defaults to match the value of the displayField config).
   * @var string
   */
  protected $valueField = '';

  /**
   * The options for section.
   * @var array
   */
  protected $data = array();

  /**
   * @var string
   */
  protected $fieldLabel = '';

  /**
   * @param string $fieldLabel
   */
  public function __construct($fieldLabel)
  {
    $this->setXtype('combo');
    $this->fieldLabel = $fieldLabel;
  }

  /**
   * Prepare the type-structure.
   * @return array
   */
  public function prepare()
  {
    return array(
      'xtype'          => $this->getXtype(),
      "mode"           => "static",
      "editable"       => false,
      "triggerAction"  => "all",
      'fieldLabel'     => $this->fieldLabel,
      'displayField'   => $this->displayField,
      'valueField'     => $this->valueField,
      'store'          => $this->data
    );
  }

  /**
   * Set witch of the fields should be displayed.
   * @param string $displayField
   * @return ComboBox
   */
  public function setDisplayField($displayField)
  {
    $this->displayField = $displayField;
    return $this;
  }

  /**
   * @return string
   */
  public function getDisplayField()
  {
    return $this->displayField;
  }

  /**
   * Set witch of the fields should be the value of the combobox.
   * @param string $valueField
   * @return ComboBox
   */
  public function setValueField($valueField)
  {
    $this->valueField = $valueField;
    return $this;
  }

  /**
   * @return string
   */
  public function getValueField()
  {
    return $this->valueField;
  }

  /**
   * @param string $field The name of the field.
   * @param string $value The value of the field.
   * @return ComboBox
   */
  public function addData($field, $value)
  {
    $this->data[] = array(
      $field,
      $value
    );

    return $this;
  }

  /**
   * @return array
   */
  public function getData()
  {
    return $this->data;
  }
}
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
class TextField extends Base
{
  /**
   * The from validation.
   * With the default configuration, form fields are validated
   * on-the-fly while the user edits their values.
   * @var \ExtJsTypes\Preparable
   */
  protected $vtype;

  /**
   * @param string $name
   * @param string $fieldLabel
   */
  public function __construct($name, $fieldLabel)
  {
    $this->setXtype('textfield')->setName($name)->setFieldLabel($fieldLabel);
  }

  /**
   * Prepare the type-structure.
   * @return array
   */
  public function prepare()
  {
    $structure = array(
      'xtype'      => $this->getXtype(),
      'name'       => $this->getName(),
      'fieldLabel' => $this->getFieldLabel(),
      'allowBlank' => $this->getAllowBlank()
    );

    if ($this->getValue() != '' && $this->getValue() != null) {
      $structure['value'] = $this->getValue();
    }

    if ($this->vtype instanceof VTypes\Base) {
      $structure['vtype'] = $this->vtype->getType();
    }

    return $structure;
  }

  /**
   * Set the validation object.
   * @param VTypes\Base $vtype
   * @return $this
   */
  public function setVtype(VTypes\Base $vtype)
  {
    $this->vtype = $vtype;
    return $this;
  }
}
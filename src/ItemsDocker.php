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
class ItemsDocker extends Base
{
  /**
   * @var \ExtJsTypes\Base
   */
  protected $dockedItem;

  public function __construct(\ExtJsTypes\Preparable $item)
  {
    $this->dockedItem = $item;
  }

  public function prepare()
  {
    if ($this->dockedItem instanceof Textfield) {
      return array(
        'xtype'       => $this->dockedItem->getXtype(),
        'buttonLabel' => $this->dockedItem->getFieldLabel()
      );
    }

    if ($this->dockedItem instanceof ComboBox) {
      return array(
        'xtype'             => $this->dockedItem->getXtype(),
        'buttonLabel'       => $this->dockedItem->getFieldLabel(),
        'comboDisplayField' => $this->dockedItem->getDisplayField(),
        'comboValueField'   => $this->dockedItem->getValueField(),
        'comboStore'        => $this->dockedItem->getData()
      );
    }

    return array();
  }
}
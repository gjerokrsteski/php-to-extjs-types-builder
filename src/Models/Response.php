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
class Response extends Base
{
  protected $success  = true;
  protected $data     = array();
  protected $messages = array();
  protected $errors   = array();

  /**
   * @param array   $data     The data to send to the gui.
   * @param array   $messages The messages corresponding to the user.
   * @param array   $errors    The error-messages from the validation or process corresponding to the user.
   * @param boolean $success  Was the request successful.
   */
  public function __construct(array $data, array $messages, array $errors, $success = true)
  {
    $this->data     = $data;
    $this->messages = $messages;
    $this->errors   = $errors;
    $this->success  = $success;
  }

  /**
   * Overrides the parent::mapProperties
   * @param array $properties The list of inner properties.
   * @see \ExtjsTypes\Base:::mapProperties()
   * @return array
   */
  protected function mapProperties(array $properties)
  {
    $itemsToSend = array();

    foreach ($properties as $name => $defaultVal) {

      // We append all properties of type boolean and all who are not empty.
      if (true === is_bool($this->$name) || false === empty($this->$name)) {
        $itemsToSend[$name] = $this->$name;
        continue;
      }
    }

    return $itemsToSend;
  }
}
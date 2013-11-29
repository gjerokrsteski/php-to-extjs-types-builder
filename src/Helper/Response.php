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
namespace ExtJsTypes\Helper; use ExtJsTypes\Models\Response as Model;

/**
 * @package Helper
 * @author Gjero Krsteski <gjero@krsteski.de>
 */
class Response
{
  protected $data           = array();
  protected $messages       = array();
  protected $errors         = array();
  protected $dataDecoration = true;

  /**
   * @param bool $success
   * @return string
   * @throws \InvalidArgumentException
   */
  public function sendJson($success = true)
  {
    if ($success !== (boolean)$success) {
      throw new \InvalidArgumentException(
        'param success must be a boolean!'
      );
    }

    if (false === $this->dataDecoration) {
      return json_encode($this->data);
    }

    $model = new Model(
      $this->data, $this->messages, $this->errors, $success
    );

    return json_encode($model->prepare());
  }

  /**
   * @param string $requestMethod
   * @param string $expectedMethod
   * @param bool $testing
   */
  public function checkRequestMethod($requestMethod, $expectedMethod = 'GET', $testing = false)
  {
    if (strtoupper($expectedMethod) !== strtoupper($requestMethod)) {

      echo $this
        ->setErrors(array( 'wrong request-method for handshake' ))
        ->sendJson(false);

      if (false === $testing) {
        exit;
      }
    }
  }

  /**
   * The data to send.
   * @param array $data
   * @return Response
   */
  public function setData(array $data)
  {
    $this->data = $data;
    return $this;
  }

  /**
   * The positive messages to send.
   * @param array $messages
   * @return Response
   */
  public function setMessages(array $messages)
  {
    $this->messages = $messages;
    return $this;
  }

  /**
   * The errors messages to send.
   * @param array $errors
   * @return Response
   */
  public function setErrors(array $errors)
  {
    $this->errors = $errors;
    return $this;
  }

  /**
   * Decides if the data-decoration should be ignored and the
   * data should be send in raw format.
   * @return Response
   */
  public function ignoreDataDecoration()
  {
    $this->dataDecoration = false;
    return $this;
  }
}
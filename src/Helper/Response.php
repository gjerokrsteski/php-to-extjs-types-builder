<?php
class ExtJsTypes_Helper_Response
{
  protected $data           = array();
  protected $messages       = array();
  protected $errors         = array();
  protected $dataDecoration = true;

  /**
   * @param bool $success
   * @return string
   * @throws InvalidArgumentException
   */
  public function sendJson($success = true)
  {
    if ($success !== (boolean)$success) {
      throw new InvalidArgumentException(
        'param success must be a boolean!'
      );
    }

    if (false === $this->dataDecoration) {
      return json_encode($this->data);
    }

    $model = new ExtJsTypes_Models_Response(
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
   * @return ExtJsTypes_Helper_Response
   */
  public function setData(array $data)
  {
    $this->data = $data;
    return $this;
  }

  /**
   * The positive messages to send.
   * @param array $messages
   * @return ExtJsTypes_Helper_Response
   */
  public function setMessages(array $messages)
  {
    $this->messages = $messages;
    return $this;
  }

  /**
   * The errors messages to send.
   * @param array $errors
   * @return ExtJsTypes_Helper_Response
   */
  public function setErrors(array $errors)
  {
    $this->errors = $errors;
    return $this;
  }

  /**
   * Decides if the data-decoration should be ignored and the
   * data should be send in raw format.
   * @return ExtJsTypes_Helper_Response
   */
  public function ignoreDataDecoration()
  {
    $this->dataDecoration = false;
    return $this;
  }
}
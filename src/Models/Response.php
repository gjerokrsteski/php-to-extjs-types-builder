<?php
class ExtJsTypes_Models_Response extends ExtJsTypes_Models_AbstractModel
{
  protected $success  = true;
  protected $data     = array();
  protected $messages = array();
  protected $errors   = array();

  /**
   * @param array   $data     The data to send to the gui.
   * @param array   $messages The messages coresponding to the user.
   * @param array   $errors    The error-messages from the validation or process coresponding to the user.
   * @param boolean $success  Was the request successfull.
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
   * @see ExtJsTypes_ExtjsTypes_Models_AbstractModel::mapProperties()
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
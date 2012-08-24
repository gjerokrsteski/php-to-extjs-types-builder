<?php
abstract class ExtJsTypes_Models_AbstractModel implements ExtJsTypes_Models_InterfaceModel
{
  /**
   * Returns the properties of the given model-object.
   * For another properties output format, please overide this method.
   * @see ExtJsTypes_ExtjsTypes_Models_InterfaceModel::prepare()
   * @return array A list of ExtJsTypes_ExtjsTypes_Models_AbstractModel properties.
   */
  public function prepare()
  {
    return $this->mapProperties(
      $this->fetchClassVars()
    );
  }

  /**
   * Get the default properties of the class.
   * @return array
   */
  protected function fetchClassVars()
  {
    return get_class_vars(get_class($this));
  }

  /**
   * Maps the properties to array with actual values.
   * For another properties-mapping, please overide this method.
   * @param array $properties
   * @return array
   */
  protected function mapProperties(array $properties)
  {
    $propertiesMap = array();

    foreach ($properties as $name => $defaultVal) {
      $propertiesMap[$name] = (true === empty($this->$name)) ? $defaultVal : $this->$name;
    }

    return $propertiesMap;
  }
}
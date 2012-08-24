<?php
class ExtJsTypes_TextField extends ExtJsTypes_TypeAbstract
{
  /**
   * The from validation.
   * With the default configuration, form fields are validated
   * on-the-fly while the user edits their values.
   * @var ExtJsTypes_VTypes_TypeInterface
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

    if ($this->vtype instanceof ExtJsTypes_VTypes_TypeInterface) {
      $structure['vtype'] = $this->vtype->getType();
    }

    return $structure;
  }

  /**
   * Set the validation object.
   * @param ExtJsTypes_VTypes_TypeInterface $vtype
   * @return ExtJsTypes_TextField
   */
  public function setVtype(ExtJsTypes_VTypes_TypeInterface $vtype)
  {
    $this->vtype = $vtype;
    return $this;
  }
}
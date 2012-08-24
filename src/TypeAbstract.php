<?php
abstract class ExtJsTypes_TypeAbstract implements ExtJsTypes_TypeInterface
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
   * @return ExtJsTypes_TypeAbstract
   */
  public function setXtype($xtype)
  {
    $this->xtype = $xtype;
    return $this;
  }

  /**
   * @param string $name
   * @return ExtJsTypes_TypeAbstract
   */
  public function setName($name)
  {
    $this->name = $name;
    return $this;
  }

  /**
   * @param string $value
   * @return ExtJsTypes_TypeAbstract
   */
  public function setValue($value)
  {
    $this->value = $value;
    return $this;
  }

  /**
   * @param string $fieldLabel
   * @return ExtJsTypes_TypeAbstract
   */
  public function setFieldLabel($fieldLabel)
  {
    $this->fieldLabel = $fieldLabel;
    return $this;
  }

  /**
   * @param boolean $allowBlank
   * @return ExtJsTypes_TypeAbstract
   */
  public function setAllowBlank($allowBlank)
  {
    $this->allowBlank = $allowBlank;
    return $this;
  }

  /**
   * @param string $cls
   * @return ExtJsTypes_TypeAbstract
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
   * @param ExtJsTypes_TypeInterface $item
   * @return ExtJsTypes_TypeAbstract
   */
  public function addItem(ExtJsTypes_TypeInterface $item)
  {
    $this->items[] = $item->prepare();
    return $this;
  }

  /**
   * @return array A list of ExtJsTypes_TypeInterface items.
   */
  public function getItems()
  {
    return $this->items;
  }
}
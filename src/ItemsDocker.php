<?php
class ExtJsTypes_ItemsDocker extends ExtJsTypes_TypeAbstract
{
  /**
   * @var ExtjsTypes_TypeAbstract
   */
  protected $dockedItem;

  public function __construct(ExtjsTypes_TypeInterface $item)
  {
    $this->dockedItem = $item;
  }

  public function prepare()
  {
    if ($this->dockedItem instanceof ExtJsTypes_Textfield) {
      return array(
        'xtype'       => $this->dockedItem->getXtype(),
        'buttonLabel' => $this->dockedItem->getFieldLabel()
      );
    }

    if ($this->dockedItem instanceof ExtJsTypes_ComboBox) {
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
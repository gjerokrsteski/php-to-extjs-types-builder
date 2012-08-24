<?php
class ExtJsTypes_ToolBar extends ExtJsTypes_TypeAbstract
{
  public function __construct()
  {
    $this->setXtype('toolbar');
  }

  public function prepare()
  {
    return array(
      'xtype' => $this->getXtype(),
      'items' => $this->getItems(),
    );
  }
}
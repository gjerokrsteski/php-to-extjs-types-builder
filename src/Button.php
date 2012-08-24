<?php
class ExtJsTypes_Button extends ExtJsTypes_TypeAbstract
{
  /**
   * The size of the Button.
   * @var string
   */
  protected $scale = 'small';

  /**
   * @param string $text The name or label of the button.
   */
  public function __construct($text)
  {
    $this->setXtype('button')->setName($text);
  }

  public function prepare()
  {
    return array(
      'xtype' => $this->getXtype(),
      'text'  => $this->getName()
    );
  }
}
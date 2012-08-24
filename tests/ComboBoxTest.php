<?php
class ComboBoxTest extends PHPUnit_Framework_TestCase
{
  /**
   * @test
   */
  public function CreatingNewInstance()
  {
    new ExtJsTypes_ComboBox('My friends');
  }

  /**
   * @test
   */
  public function PreparingOfItemsStructureData()
  {
    $comboBox = new ExtJsTypes_ComboBox('My friends as combo-box');
    $comboBox->setDisplayField('name')
             ->setValueField('name-value')
             ->addData('freunde', 'Miki')
             ->addData('freunde', 'Joe')
             ->addData('freunde2', 'Miki')
             ->addData('freunde2', 'Joe');

    $data = $comboBox->prepare();

    $this->assertNotEmpty($data);
    $this->assertEquals('combo', $data['xtype']);
    $this->assertNotEmpty($data['store']);
  }
}
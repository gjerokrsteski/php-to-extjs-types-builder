<?php
class TextfieldTest extends PHPUnit_Framework_TestCase
{
  /**
   * @test
   */
  public function CreatingNewInstance()
  {
    new ExtJsTypes_TextField('email', 'Ihre E-Mail:');
  }

  /**
   * @test
   */
  public function PreparingOfItemsStructureData()
  {
    $item = new ExtJsTypes_TextField('email', 'Ihre E-Mail:');
    $data = $item->prepare();

    $this->assertArrayHasKey('xtype', $data);
    $this->assertEquals($data['xtype'], 'textfield');
  }

  /**
   * @test
   */
  public function PreparingWithValueAndValidation()
  {
    $item = new ExtJsTypes_TextField('email', 'Ihre E-Mail:');
    $data = $item->setValue('meine-email@web.de')
                 ->setVtype(new ExtJsTypes_VTypes_Alpha())
                 ->prepare();

    $this->assertArrayHasKey('xtype', $data);
	
    $this->assertEquals($data['value'], 'meine-email@web.de');
    $this->assertEquals($data['vtype'], 'alpha');
  }
}
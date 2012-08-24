<?php
class ColumnsTest extends PHPUnit_Framework_TestCase
{
  /**
   * @test
   */
  public function CreatingNewInstance()
  {
    new ExtJsTypes_Columns();
  }

  /**
   * @test
   */
  public function PreparingOfItemsStructureData()
  {
    $columns = new ExtJsTypes_Columns();

    $columns->add('Ihr Name', 'name')
           ->add('Ihr Vorname', 'vorname')
           ->add('Ihre E-Mail', 'email');

    $data = $columns->prepare();

    $this->assertNotEmpty($data);
    $this->assertInstanceOf('stdClass', current($data));
  }
}
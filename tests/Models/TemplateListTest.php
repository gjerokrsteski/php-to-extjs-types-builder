<?php
class ModelTemplateListTest extends PHPUnit_Framework_TestCase
{
  /**
   * @test
   */
  public function CreatingNewInstance()
  {
    new ExtJsTypes_Models_TemplateList(1, 'hoho', '1.8');
  }

  /**
   * @test
   */
  public function PreparingModelData()
  {
    $model = new ExtJsTypes_Models_TemplateList(123, 'TextMatrix', '2.8');

    $res = $model->prepare();

    $this->assertArrayHasKey('id', $res);
    $this->assertArrayHasKey('label', $res);
    $this->assertArrayHasKey('version', $res);
  }

}
<?php
class ModelQuestionTemplatesTest extends PHPUnit_Framework_TestCase
{
  /**
   * @test
   */
  public function CreatingNewInstance()
  {
    new \ExtJsTypes\Models\QuestionTemplate(
      'global', 'Globaltemplates'
    );

  }

  /**
   * @test
   */
  public function PreparingModelData()
  {
    $questionTemplateModel = new \ExtJsTypes\Models\QuestionTemplate(
      'global', 'Globaltemplates'
    );

    $questionTemplateModel
    ->addTemplate(
      new \ExtJsTypes\Models\TemplateList(123, 'TextMatrix', '2.8')
    )
    ->addTemplate(
      new \ExtJsTypes\Models\TemplateList(456, 'TextMatrix', '2.8')
    );

    $res = $questionTemplateModel->prepare();

    $this->assertArrayHasKey('type', $res);
    $this->assertArrayHasKey('label', $res);
    $this->assertArrayHasKey('templates', $res);
    $this->assertInternalType('array', $res['templates']);
    $this->assertNotEmpty($res['templates']);
  }
}
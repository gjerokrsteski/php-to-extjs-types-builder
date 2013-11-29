<?php
class ResponseTest extends PHPUnit_Framework_TestCase
{
  /**
   * @test
   */
  public function CreatingNewInstance()
  {
    new \ExtJsTypes\Models\Response(
      array(), array(), array(), false
    );
  }

  /**
   * @test
   */
  public function PreparingOfDataForBooleanTypes()
  {
    $model = new \ExtJsTypes\Models\Response(
      array(), array(), array(), false
    );

    $result = $model->prepare();

    // run the assertions.
    $this->assertNotEmpty($result);
    $this->assertInternalType('array', $result);
    $this->assertArrayHasKey('success', $result);

    $this->assertArrayNotHasKey('data', $result);
    $this->assertArrayNotHasKey('errors', $result);
    $this->assertArrayNotHasKey('messages', $result);
  }
}

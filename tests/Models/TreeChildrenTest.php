<?php
class ModelsTreeChildrenTest extends PHPUnit_Framework_TestCase
{
  /**
   * @test
   */
  public function CreatingNewInstance()
  {
    new ExtJsTypes_Models_TreeChildren(1, 'New node 123');
  }

  /**
   * @test
   */
  public function PreparingNestedData()
  {
    $node = new ExtJsTypes_Models_TreeChildren(1, 'New node 1');

    $node
      ->addChildren(
        new ExtJsTypes_Models_TreeChildren(1, 'New question 1', 'question', true)
      )
      ->addChildren(
        new ExtJsTypes_Models_TreeChildren(2, 'New question 2', 'question', true)
      );

    $res = $node->prepare();

    $this->assertArrayHasKey('id', $res);
    $this->assertArrayHasKey('text', $res);
    $this->assertArrayHasKey('type', $res);
    $this->assertInternalType('array', $res['children']);
    $this->assertNotEmpty($res['children']);
    $this->assertArrayNotHasKey('children', current($res['children']));
  }

  /**
   * @test
   * @expectedException UnexpectedValueException
   */
  public function testTrowingExceptionIfChildnodesOfTypeLeafTriesToAddSubnodes()
  {
    $nodeTypeLeaf = new ExtJsTypes_Models_TreeChildren(1, 'New node 1', 'question', true);

    $nodeTypeLeaf
      ->addChildren(
        new ExtJsTypes_Models_TreeChildren(1, 'New question 1', 'question', true)
      );
  }
}
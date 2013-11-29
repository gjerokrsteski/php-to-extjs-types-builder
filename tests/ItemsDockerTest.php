<?php
class ItemsDockerTest extends PHPUnit_Framework_TestCase
{
  /**
   * @test
   */
  public function PreparingOnllyExpectedItemInstances()
  {
    // is allowed.
    $docker1 = new \ExtJsTypes\ItemsDocker(
      new \ExtJsTypes\TextField('name', 'label')
    );

    // is allowed.
    $docker2 = new \ExtJsTypes\ItemsDocker(
      new \ExtJsTypes\ComboBox('label')
    );

    // is not allowed.
    $docker3 = new \ExtJsTypes\ItemsDocker(
      new \ExtJsTypes\Button('label')
    );

    $this->assertNotEmpty($docker1->prepare());
    $this->assertNotEmpty($docker2->prepare());
    $this->assertEmpty($docker3->prepare());
  }

  /**
   * @test
   */
  public function BuildDockItemandDockToGrid()
  {
    $fields = new \ExtJsTypes\Fields();
    $fields->add('name')
           ->add('vorname');

    $columns = new \ExtJsTypes\Columns();
    $columns->add('Name', 'name')
            ->add('Vorname', 'vorname', true);

    $data = new \ExtJsTypes\Data();
    $data->put(array('name' => 'Miki',  'vorname' => 'Maus'))
         ->put(array('name' => 'Olie',  'vorname' => 'Otto'));

    $grid = new \ExtJsTypes\Grid('My friends');
    $grid->setFields($fields)
         ->setColumns($columns)
         ->setData($data)
          ->dockItem(
            new \ExtJsTypes\ItemsDocker(
              new \ExtJsTypes\TextField('new-scale', 'Add Scale')
            )
          );

    $data = $grid->prepare();


    $this->assertNotEmpty($data);
    $this->assertEquals('gridpanel', $data['xtype']);
    $this->assertInstanceOf('stdClass', current($data['config']['columns']));
    $this->assertNotEmpty($data['config']['dockeditems']);
  }
}
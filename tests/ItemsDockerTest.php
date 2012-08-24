<?php
class ItemsDockerTest extends PHPUnit_Framework_TestCase
{
  /**
   * @test
   */
  public function PreparingOnllyExpectedItemInstances()
  {
    // is allowed.
    $docker1 = new ExtJsTypes_ItemsDocker(
      new ExtJsTypes_TextField('name', 'label')
    );

    // is allowed.
    $docker2 = new ExtJsTypes_ItemsDocker(
      new ExtJsTypes_ComboBox('label')
    );

    // is not allowed.
    $docker3 = new ExtJsTypes_ItemsDocker(
      new ExtJsTypes_Button('label')
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
    $fields = new ExtJsTypes_Fields();
    $fields->add('name')
           ->add('vorname');

    $columns = new ExtJsTypes_Columns();
    $columns->add('Name', 'name')
            ->add('Vorname', 'vorname', true);

    $data = new ExtJsTypes_Data();
    $data->put(array('name' => 'Miki',  'vorname' => 'Maus'))
         ->put(array('name' => 'Olie',  'vorname' => 'Otto'));

    $grid = new ExtJsTypes_Grid('My friends');
    $grid->setFields($fields)
         ->setColumns($columns)
         ->setData($data)
          ->dockItem(
            new ExtJsTypes_ItemsDocker(
              new ExtJsTypes_TextField('new-scale', 'Add Scale')
            )
          );

    $data = $grid->prepare();


    $this->assertNotEmpty($data);
    $this->assertEquals('gridpanel', $data['xtype']);
    $this->assertInstanceOf('stdClass', current($data['config']['columns']));
    $this->assertNotEmpty($data['config']['dockeditems']);
  }
}
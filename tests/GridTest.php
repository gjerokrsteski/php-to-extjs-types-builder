<?php
class GridTest extends PHPUnit_Framework_TestCase
{
  /**
   * @test
   */
  public function CreatingNewInstance()
  {
    new ExtJsTypes_Grid('My friends');
  }

  /**
   * @test
   */
  public function PreparingOfItemsStructureData()
  {
    $fields = new ExtJsTypes_Fields();
    $fields->add('name')
           ->add('vorname')
           ->add('email');

    $columns = new ExtJsTypes_Columns();
    $columns->add('Name', 'name')
            ->add('Vorname', 'vorname')
            ->add('E-Mail', 'email', true);

    $data = new ExtJsTypes_Data();
    $data->put(array('name' => 'Miki',  'vorname' => 'Maus', 'email' => 'miki@maus.de'))
         ->put(array('name' => 'Olie',  'vorname' => 'Otto', 'email' => 'olie@maus.de'));

    $grid = new ExtJsTypes_Grid('My friends');
    $grid->setFields($fields)
         ->setColumns($columns)
         ->setData($data);

    $data = $grid->prepare();

    $this->assertNotEmpty($data);
    $this->assertEquals('gridpanel', $data['xtype']);
    $this->assertInstanceOf('stdClass', current($data['config']['columns']));
  }
}
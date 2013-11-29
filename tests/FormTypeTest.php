<?php
class FormTypeTest extends PHPUnit_Framework_TestCase
{
  /**
   * @test
   */
  public function CreatingNewInstance()
  {
    new \ExtJsTypes\Form(
    	'Node details',
    	'controller=extjstemplate&act=gettemplates'
    );
  }

  /**
   * @test
   */
  public function PreparingFormMethod()
  {
    $typeForm = new \ExtJsTypes\Form(
    	'Node details',
    	'controller=extjstemplate&act=gettemplates'
    );

    $textFildName = new \ExtJsTypes\TextField('name', 'Ihr  Name');
    $textFildEmail = new \ExtJsTypes\TextField('email', 'Ihre  E-Mail');

    $comboBox = new \ExtJsTypes\ComboBox('My friends as combo-box');
    $comboBox->setDisplayField('name')
             ->setValueField('name-value')
             ->addData('freunde', 'Miki')
             ->addData('freunde', 'Joe');

    $data = $typeForm->addItem($textFildName)
                     ->addItem($textFildEmail)
                     ->addItem($comboBox)
                     ->prepare();

    $this->assertArrayHasKey('xtype', $data);
    $this->assertEquals($data['xtype'], 'form');
    
    $this->assertNotEmpty($data['config']['items']);
    $this->assertInternalType('array', $data['config']['items']);
  }
}
<?php
class ExtJsTypes_Grid extends ExtJsTypes_TypeAbstract
{
  /**
   * The title text to be used to display in the panel header.
   * @var string
   */
  protected $title;

  /**
   * Map to Store fields.
   * @var object
   */
  protected $fields;

  /**
   * @var ExtJsTypes_Columns
   */
  protected $columns;

  /**
   * The initial set of data to apply to the tpl
   * to update the content area of the Component.
   * @var object
   */
  protected $data;

  /**
   * Dock position of this component in its parent panel.
   * @var array
   */
  protected $dockedItems = array();

  /**
   * @param string $title
   */
  public function __construct($title)
  {
    $this->setXtype('gridpanel')->setTitle($title);
  }

  /**
   * Prepare the type-structure.
   * @return array
   */
  public function prepare()
  {
    return array(
      'xtype'  => $this->getXtype(),
      'config' => array(
        'title'       => $this->title,
        'fields'      => $this->fields,
        'columns'     => $this->columns,
        'data'        => $this->data,
        'dockeditems' => $this->dockedItems
      ),
    );
  }

  /**
   * @param string $title
   * @return ExtJsTypes_Grid
   */
  public function setTitle($title)
  {
    $this->title = $title;
    return $this;
  }

  /**
   * @param ExtJsTypes_Columns $columns
   * @return ExtJsTypes_Grid
   */
  public function setColumns(ExtJsTypes_Columns $columns)
  {
    $this->columns = $columns->prepare();
    return $this;
  }

  /**
   * @param ExtJsTypes_Data $data
   * @return ExtJsTypes_Grid
   */
  public function setData(ExtJsTypes_Data $data)
  {
    $this->data = $data->prepare();
    return $this;
  }

  /**
   * @param ExtJsTypes_Fields $fields
   * @return ExtJsTypes_Grid
   */
  public function setFields(ExtJsTypes_Fields $fields)
  {
    $this->fields = $fields->prepare();
    return $this;
  }

  /**
   * Sets the dock position of this component in its parent panel.
   * Note that this only has effect if this item is part of the dockedItems
   * collection of a parent that has a DockLayout
   * (note that any Panel has a DockLayout by default)
   * @param ExtJsTypes_ItemsDocker $item
   * @return ExtJsTypes_Grid
   */
  public function dockItem(ExtJsTypes_ItemsDocker $item)
  {
    $this->dockedItems[] = $item->prepare();
    return $this;
  }
}
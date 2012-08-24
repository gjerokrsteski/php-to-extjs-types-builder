<?php
/**
 * ExtJsTypes_Columns
 *
 * This class specifies the definition for a column inside a Ext.grid.Panel.
 * It encompasses both the grid header configuration as well as displaying
 * data within the grid itself.
 */
class ExtJsTypes_Columns extends ExtJsTypes_TypeAbstract
{
  /**
   * List of columns for the grid.
   * @var array A list of stdClass instances.
   */
  protected $columns = array();

  public function __construct()
  {
    $this->setXtype('columns');
  }

  /**
   * Appends a single column.
   * @param string  $header    Sets the header text for the column.
   * @param string  $dataIndex The field in the underlying Ext.data.Store to use as the value for the column.
   * @param boolean $flex      A column can either be given an explicit width value or a flex configuration.
   * @return ExtJsTypes_Columns
   */
  public function add($header, $dataIndex, $flex = false)
  {
    $this->columns[] = (object)array(
      'header'    => $header,
      'dataIndex' => $dataIndex,
      'flex'      => $flex
    );

    return $this;
  }

  /**
   * Prepare the type-structure.
   * @return array A list of stdClass instances.
   */
  public function prepare()
  {
    return $this->columns;
  }
}
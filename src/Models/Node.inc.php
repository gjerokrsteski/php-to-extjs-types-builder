<?php
class ExtJsTypes_Models_Node extends ExtJsTypes_Models_AbstractModel
{
  /**
   * Set to true or false to show a checkbox alongside this node.
   * @var boolean
   */
  protected $checked = null;

  /**
   * The number of parents this node has.
   * A root node has depth 0,
   * a child of it depth 1, and so on...
   * @var integer
   */
  protected $depth = 1;

  /**
   * The unique node-id.
   * @var string
   */
  protected $id;

  /**
   * The position of the node inside its parent.
   * When parent has 4 children and the node is
   * third amongst them, index will be 2.
   * @var integer
   */
  protected $index;

  /**
   * ID of parent node.
   * @var string
   */
  protected $parentId;

  /**
   * The text for to show on node label.
   * @var string
   */
  protected $text;

  /**
   * Is it node or node-child.
   * @var string node|question|root
   */
  protected $type = 'question';

  /**
   * @param string  $id        The unique node-id.
   * @param integer $index    The position of the node inside its parent.
   * @param string  $parentId ID of parent node.
   * @param string  $text      The text for to show on node label.
   * @param integer $depth    The number of parents this node has.
   * @param string  $type      Is it a node|question|root.
   */
  public function __construct($id, $index, $parentId, $text, $depth, $type = 'question')
  {
    $this->id       = $id;
    $this->index    = $index;
    $this->parentId = $parentId;
    $this->text     = $text;
    $this->depth    = $depth;
    $this->type     = $type;
  }
}
<?php
/**
 * PHP Version 5
 *
 * The ExtJS-Types-Builder is a OOP-PHP-Framework
 * and creates JSON suitable strings for the communication
 * with your ExtJS-GUI.
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.
 * It is also available through the world-wide-web at this URL:
 * http://krsteski.de/new-bsd-license/
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to gjero@krsteski.de so we can send you a copy immediately.
 *
 * @copyright Copyright (c) 2010-2011 Gjero Krsteski (http://krsteski.de)
 * @license   http://krsteski.de/new-bsd-license New BSD License
 */

/**
 * @package ExtJsTypes_Models
 * @author Gjero Krsteski <gjero@krsteski.de>
 */
class ExtJsTypes_Models_TreeChildren extends ExtJsTypes_Models_AbstractModel
{
  /**
   * Is it node or node-child.
   * @var string node|question|root
   */
  protected $type = 'node';

  /**
   * The text for to show on node label.
   * @var string
   */
  protected $text = '';

  /**
   * The node-id from the storage.
   * @var integer
   */
  protected $id;

  /**
   * Set to true to indicate that this child
   * can have no children, like a node of type=question.
   * @var boolean
   */
  protected $leaf = false;

  /**
   * One node can have many children-nodes from type=question.
   * A list of ExtJsTypes_ExtjsTypes_Models_TreeChildren instances.
   * @var array
   */
  protected $children = array();

  /**
   * @param integer $id  The node-id from the storage.
   * @param string  $text The node-label.
   * @param string  $type The node-type node|question|root.
   * @param boolean $leaf  The flag to indicate that this is child-node.
   */
  public function __construct($id, $text, $type = 'node', $leaf = false)
  {
    $this->id   = $id;
    $this->text = $text;
    $this->type = $type;
    $this->leaf = $leaf;
  }

  /**
   * Appends children to the node as nested data.
   * @param ExtjsTypes_Models_TreeChildren $children
   * @return ExtJsTypes_Models_TreeChildren
   * @throws UnexpectedValueException
   */
  public function addChildren(ExtjsTypes_Models_TreeChildren $children)
  {
    if (true === $this->leaf) {
      throw new UnexpectedValueException(
        'only nodes with property of leaf=false can have child-nodes'
      );
    }

    $this->children[] = $children->prepare();
    return $this;
  }

  /**
   * Returns the properties of the given model-object.
   * @see ExtJsTypes_ExtjsTypes_Models_AbstractModel::prepare()
   * @return array A list of ExtJsTypes_ExtjsTypes_Models_TreeChildren properties.
   */
  public function prepare()
  {
    $properties = parent::prepare();

    // unset the property if the node is a child.
    if (true === $this->leaf) {
      unset($properties['children']);
    }

    return $properties;
  }
}
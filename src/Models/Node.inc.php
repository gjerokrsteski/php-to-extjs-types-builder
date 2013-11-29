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
namespace ExtJsTypes\Models;

/**
 * @package Models
 * @author Gjero Krsteski <gjero@krsteski.de>
 */
class Node extends Base
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
   * @param string  $id       The unique node-id.
   * @param integer $index    The position of the node inside its parent.
   * @param string  $parentId ID of parent node.
   * @param string  $text     The text for to show on node label.
   * @param integer $depth    The number of parents this node has.
   * @param string  $type     Is it a node|question|root.
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
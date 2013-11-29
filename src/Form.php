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
namespace ExtJsTypes;

/**
 * @package ExtJsTypes
 * @author Gjero Krsteski <gjero@krsteski.de>
 */
class Form extends Base
{
  /**
   * The title text to be used to display in the panel header.
   * @var string
   */
  protected $title;

  /**
   * The form will submit an AJAX request to this URL when submitted.
   * @var string
   */
  protected $url;

  /**
   * @param string $title
   * @param string $url
   */
  public function __construct($title, $url)
  {
    $this->setXtype('form')->setTitle($title)->setUrl($url);
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
        'title'  => $this->getTitle(),
        'url'    => $this->getUrl(),
        'items'  => $this->getItems(),
      ),
    );
  }

  /**
   * @param string $title
   * @return Form
   */
  public function setTitle($title)
  {
    $this->title = $title;
    return $this;
  }

  /**
   * @param string $url
   * @return Form
   */
  public function setUrl($url)
  {
    $this->url = $url;
    return $this;
  }

  public function getTitle()
  {
    return $this->title;
  }

  public function getUrl()
  {
    return $this->url;
  }
}
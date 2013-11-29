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
class QuestionTemplate extends Base
{
  protected $type  = '';
  protected $label = '';

  /**
   * A list of prepared templateList data.
   * @var array
   */
  protected $templates = array();

  /**
   * @param string $type A global or project type.
   * @param string $label A type-name.
   */
  public function __construct($type, $label)
  {
    $this->type  = $type;
    $this->label = $label;
  }

  /**
   * @param TemplateList $templateList
   *
   * @return $this
   */
  public function addTemplate(\ExtJsTypes\Models\TemplateList $templateList)
  {
    $this->templates[] = $templateList->prepare();
    return $this;
  }
}
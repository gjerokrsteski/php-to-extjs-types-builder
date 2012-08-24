<?php
class ExtJsTypes_Models_TemplateList extends ExtJsTypes_Models_AbstractModel
{
  protected $id      = '';
  protected $label   = '';
  protected $version = '';

  /**
   * @param integer $id The template-id.
   * @param string $label The template-label.
   * @param string $version The template-version.
   */
  public function __construct($id, $label, $version)
  {
    $this->id      = $id;
    $this->label   = $label;
    $this->version = $version;
  }
}
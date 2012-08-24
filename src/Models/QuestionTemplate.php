<?php
class ExtJsTypes_Models_QuestionTemplate extends ExtJsTypes_Models_AbstractModel
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
   * @param ExtJsTypes_Models_TemplateList $templateList
   * @return ExtJsTypes_Models_QuestionTemplate
   */
  public function addTemplate(ExtJsTypes_Models_TemplateList $templateList)
  {
    $this->templates[] = $templateList->prepare();
    return $this;
  }
}
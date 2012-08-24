<?php
class ExtJsTypes_Form extends ExtJsTypes_TypeAbstract
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
   * @return ExtJsTypes_Form
   */
  public function setTitle($title)
  {
    $this->title = $title;
    return $this;
  }

  /**
   * @param string $url
   * @return ExtJsTypes_Form
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
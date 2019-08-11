<?php

/**
 *
 */
class Template {

  private $ci;
  private $elements = array();
  private $template;

  function __construct($config = null){
    $this->ci = & get_instance();
    $this->initialize();
  }

  private function initialize(){
    $this->ci->load->config('template');
    $this->template = $this->ci->config->item('default_template');
    $this->elements['title'] = $this->ci->config->item('default_title');
  }

  public function __set($name, $value){
    $this->element($name)->set($value);
  }

  public function __get($name){
    return $this->element($name);
  }

  public function require_resources($_shim){
    $this->ci->load->config('template');
    $shim = $this->ci->config->item('shim');
    if (array_key_exists($_shim, $shim)){
      $paths = $this->ci->config->item('paths');
      foreach ($shim[$_shim] as $key => $value) {
        $this->{substr($value, -10)}->add($paths[$value]);
      }
    }

  }

  public function set_template($template){
    $this->template = $template;
  }

  public function element($name, $default = false){
    if (array_key_exists($name, $this->elements)){
      $element = $this->elements[$name];
    } else {
      $element = new Element($name);
      $this->elements[$name] = $element;
    }
    return $element;
  }

  public function render($view, $data = array()){
    $this->elements['content'] = $this->ci->load->view($view, $data, true);
    $this->ci->load->view($this->template, $this->element);
  }
}

class Element {

  protected $ci, $content, $name;
  protected $args = array();

  function __construct($name, $args = array()){
    $this->ci = &get_instance();
    $this->name = $name;
    $this->args = $args;
  }

  function __get($name){
    return $this->ci->$name;
  }

  function __call($name, $args){
    if (method_exists($this, 'trigger_' . $this->name)){
      $args = call_user_func_array(array($this, 'trigger_'.$this->name), $args);
    } else {
      $args = $args;
    }

    switch ($name) {
      case 'default':
        return call_user_func_array(array($this, 'set_default'), $args);
        break;
      case 'add':
        return call_user_func_array(array($this, 'append'), $args);
        break;
    }
  }

  public function __toString(){
    return (string) $this->content;
  }

  public function set(){
    $this->content = (string) $this->trigger(func_get_args());
    return $this;
  }

  public function append(){
    $this->content .= (string) $this->trigger(func_get_args());
    return $this;
  }

  public function prepend(){
    $this->content = (string) $this->trigger(func_get_args()) . $this->content;
    return $this;
  }

  public function set_default($default){
    $this->content = $default;
    return $this;
  }

  public function trigger($args){
    return implode('', $args);
  }

  private function trigger_javascript($url, $search_path = false){
    if ($search_path){
      $this->ci->load->config('template');
      $paths = $this->ci->config->item('paths');
      $url = $paths[$url];
    }
    if (!stristr($url, 'http://') && !stristr($url, 'https://') && substr($url, 0, 2) != '//') {
      $url = base_url() . $url;
    }
    $js = '<script src="'. $url .'" charset="utf-8"></script>';
    return array($js);
  }

  private function trigger_stylesheet($url, $search_path = false){
    if ($search_path){
      $this->ci->load->config('template');
      $paths = $this->ci->config->item('paths');
      $url = $paths[$url];
    }
    if (!stristr($url, 'http://') && !stristr($url, 'https://') && substr($url, 0, 2) != '//') {
      $url = base_url() . $url;
    }
    $css = '<link rel="stylesheet" href="'. $url .'">';
    return array($css);
  }
}
?>

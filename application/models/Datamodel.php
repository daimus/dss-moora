<?php

class Datamodel extends MY_Model {

  function __construct(){
    parent::__construct();
  }

  public function get_result(){
    $this->db->select('alternative.id, alternative.name, result.score');
    $this->db->from('result');
    $this->db->join('alternative', 'result.alternative_id = alternative.id');
    $this->db->order_by('result.score', 'desc');
    return $this->db->get();
  }

}


?>

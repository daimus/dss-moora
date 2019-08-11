<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Result extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->model('datamodel', 'data');
	}

	// Display the result
	public function index()
	{
		$data['data'] = $this->data->get_result();
		$this->template->render('result', $data);
	}

	// Calculate the result
	public function get_result(){
		// First, we empty the previous result
		$this->data->empty_table('result');
		// Get alternative and criteria
		$criteria = $this->data->get('criteria');
		$alternative = $this->data->get('alternative');

		// Count normalized criteria
		foreach ($criteria->result() as $key => $value) {
			$powed = 0;
			foreach ($this->data->get('assessment', array('criteria_id' => $value->id))->result() as $k => $v) {
				$powed += pow($v->value,2);
			}
			$normalized_criteria[$value->id] = sqrt($powed);
		}

		// Get normalized matrix
		foreach ($criteria->result() as $key => $value) {
			foreach ($alternative->result() as $k => $v) {
				$assessed_val = $this->data->get('assessment', array('alternative_id' => $v->id, 'criteria_id' => $value->id))->row('value');
				$normalized_matrix[$value->id][$v->id] = $assessed_val / $normalized_criteria[$value->id];
			}
		}

		// Find normalized weighted matrix
		foreach ($criteria->result() as $key => $value) {
			foreach ($alternative->result() as $k => $v) {
				$normalized_weighted_matrix[$value->id][$v->id] = $normalized_matrix[$value->id][$v->id] * $value->weight;
			}
		}

		// Find max and min
		// We must define the variable first
		$max = array();
		$min = array();
		foreach ($criteria->result() as $key => $value) {
			foreach ($alternative->result() as $k => $v) {
				if ($value->type == 'benefit'){
					$max[$v->id] = 0;
				} else {
					$min[$v->id] = 0;
				}
			}
		}

		// Then we calc max and min
		foreach ($criteria->result() as $key => $value) {
			foreach ($alternative->result() as $k => $v) {
				if ($value->type == 'benefit'){
					$max[$v->id] += $normalized_weighted_matrix[$value->id][$v->id];
				} else {
					$min[$v->id] += $normalized_weighted_matrix[$value->id][$v->id];
				}
			}
		}

		// And the last, find value of Yi and insert them to the database
		$yi = array();
		foreach ($alternative->result() as $k => $v) {
			$data = array(
				'alternative_id'	=> $v->id,
				'score'						=> $max[$v->id] - $min[$v->id]
			);
			$this->data->insert('result', $data);
		}

		// Redirect to result page
		redirect('result', 'refresh');
	}
}

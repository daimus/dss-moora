<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assessment extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->model('datamodel', 'data');
	}

	public function index()
	{
		$data['alternative'] = $this->data->get('alternative');
		$data['criteria'] = $this->data->get('criteria');
		$this->template->render('assessment', $data);
	}

	public function do_assessment(){
		$this->data->empty_table('assessment');
		$val = $this->input->post('value');
		$alternative = $this->input->post('alternative');
		foreach ($this->input->post('criteria') as $k => $v) {
			$data = array(
				'alternative_id'	=> $alternative[$k],
				'criteria_id'			=> $v,
				'value'						=> $val[$k]
			);
			$this->data->insert('assessment', $data);
		}
		redirect('result', 'refresh');
	}
}

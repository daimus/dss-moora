<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Criteria extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->model('datamodel', 'data');
	}

	public function index()
	{
		$data['data'] = $this->data->get('criteria');
		$this->template->render('criteria/show', $data);
	}

	public function add()
	{
		$this->template->render('criteria/add');
	}

	public function do_add()
	{
		$this->data->insert('criteria', $this->input->post());
		redirect('criteria', 'refresh');
	}

	public function edit($id){
		$data['data'] = $this->data->get('criteria', array('id' => $id))->row();
		$this->template->render('criteria/edit', $data);
	}

	public function do_edit($id){
		$this->data->update('criteria', array('id' => $id), $this->input->post());
		redirect('criteria', 'refresh');
	}

	public function do_delete($id){
		$this->data->delete('criteria', array('id' => $id));
		redirect('criteria', 'refresh');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alternative extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('template');
		$this->load->model('datamodel', 'data');
	}

	public function index()
	{
		$data['data'] = $this->data->get('alternative');
		$this->template->render('alternative/show', $data);
	}

	public function add()
	{
		$this->template->render('alternative/add');
	}

	public function do_add()
	{
		$this->data->insert('alternative', $this->input->post());
		redirect('alternative', 'refresh');
	}

	public function edit($id){
		$data['data'] = $this->data->get('alternative', array('id' => $id))->row();
		$this->template->render('alternative/edit', $data);
	}

	public function do_edit($id){
		$this->data->update('alternative', array('id' => $id), $this->input->post());
		redirect('alternative', 'refresh');
	}

	public function do_delete($id){
		$this->data->delete('alternative', array('id' => $id));
		redirect('alternative', 'refresh');
	}
}

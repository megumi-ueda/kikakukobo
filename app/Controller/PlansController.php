<?php
App::uses('AppController', 'Controller');
/**
 * Plans Controller
 *
 */
class PlansController extends AppController {

/**
 * Scaffold
 *
 * @var mixed
 */
//	public $scaffold;
	public $helpers = array('Html', 'Form');
	
	public function index() {
		$this->set('plans', $this->Plan->find('all'));
		$this->set('title_for_layout', 'Plans Index');
	}
	
	public function view($id = null) {
		$this->Plan->id = $id;
		$this->set('plan', $this->Plan->read());
	}
	
	public function add() {
		if ($this->request->is('post')) {
			if ($this->Plan->save($this->request->data)) {
				$this->Session->setFlash('Success!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('failed!');
			}
		}
	}
	public function edit($id = null) {
		$this->Plan->id = $id;
		if ($this->request->is('get')) {
			$this->request->data = $this->Plan->read();
		} else {
			if ($this->Plan->save($this->request->data)) {
				$this->Session->setFlash('success!');
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash('failed!');
			}
		}
	}


}

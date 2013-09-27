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

}

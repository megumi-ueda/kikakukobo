<?php
App::uses('AppModel', 'Model');
/**
 * Plan Model
 *
 */
class Plan extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

	public $validate = array(
		'title' =>array(
			'rule' => 'notEmpty',
		)
	);

}

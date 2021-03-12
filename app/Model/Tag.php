<?php
App::uses('AppModel', 'Model');
/**
 * Tag Model
 *
 * @property Post $Post
 */
class Tag extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed



	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
		public $hasMany = array(
			'PostTag' => array(
				'className' => 'PostTag',
				'foreignKey' => 'post_id',
				'conditions' => '',
				'fields' => '',
				'order' => '',
			),
		);

}

<?php
App::uses('AppModel', 'Model');
/**
 * Category Model
 *
 * @property Topic $Topic
 */
class Category extends AppModel {

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
		public $hasMany = array(
			'Post' => array(
				'className' => 'Post',
				'foreignKey' => 'category_id',
				'dependent' => false,
				'conditions' => '',
				'fields' => '',
				'order' => '',
				'limit' => '',
				'offset' => '',
				'exclusive' => '',
				'finderQuery' => '',
				'counterQuery' => ''
			),
			// 'ChildCategory' => array(
			// 	'className' => 'Category',
			// 	'foreignKey' => 'parent_id',
			// 	'dependent' => false,
			// 	'conditions' => '',
			// 	'fields' => '',
			// 	'order' => '',
			// 	'limit' => '',
			// 	'offset' => '',
			// 	'exclusive' => '',
			// 	'finderQuery' => '',
			// 	'counterQuery' => ''
			// ),
		);



/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'parent' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'level' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'description' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	// The Associations below have been created with all possible keys, those that are not needed can be removed




}

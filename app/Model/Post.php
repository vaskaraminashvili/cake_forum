<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 * @property Topic $Topic
 * @property User $User
 * @property Reply $Reply
 */
class Post extends AppModel {


	// The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
		public $belongsTo = array(
			'User' => array(
				'className' => 'User',
				'foreignKey' => 'user_id',
				'conditions' => '',
				'fields' => '',
				'order' => ''
			),
			'Category' => array(
				'className' => 'Category',
				'foreignKey' => 'category_id',
				'conditions' => '',
				'fields' => '',
				'order' => '',
				'counterCache' => 'post_count',
			),

		);



	/**
	 * hasMany associations
	 *
	 * @var array
	 */
		public $hasMany = array(
			'Reply' => array(
				'className' => 'Reply',
				'foreignKey' => 'post_id',
				'dependent' => false,
				'conditions' => '',
				'fields' => '',
				'order' => '',
				'limit' => '',
				'offset' => '',
				'exclusive' => '',
				'finderQuery' => ''
			),
			'PostTag' => array(
				'className' => 'PostTag',
				'foreignKey' => 'post_id',
				'conditions' => '',
				'fields' => '',
				'order' => '',
			),
		);



/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'hash' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'text' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'created' => array(
			'datetime' => array(
				'rule' => array('datetime'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);


	public function beforeSave($options = array()) {
		$this->data['Post']['hash'] = hash('sha1', microtime().'posts');
	    return true;
	}


}

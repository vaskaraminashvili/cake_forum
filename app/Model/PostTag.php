<?php
App::uses('AppModel', 'Model');
/**
 * Post Model
 *
 * @property Topic $Topic
 * @property User $User
 * @property Reply $Reply
 */
class PostTag extends AppModel {

	// The Associations below have been created with all possible keys, those that are not needed can be removed

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
		public $belongsTo = array(
			'Post' ,'Tag'
		);


}

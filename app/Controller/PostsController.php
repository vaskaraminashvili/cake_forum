<?php
App::uses('AppController', 'Controller');
/**
 * Posts Controller
 *
 * @property Post $Post
 * @property PaginatorComponent $Paginator
 */
class PostsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
    var $uses = array('Post');



/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Post->recursive = 0;
		$this->set('posts', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
		$this->set('post', $this->Post->find('first', $options));
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
		public function show($id = null) {
			$this->layout = 'site';
			// $this->Post->recursive =1;

			$options = array(

				'conditions' => array('Post.hash' => $id),
				'contain' => array(
					'Reply' => array(
						'order' => array(
							'date ASC'
						),

						'User' => array(
							'fields' => array(
								'User.username'
							),
							'conditions' => array(
								'User.active' => 1
							)
						),
					),
					'PostTag' => array(
						'fields' => array(),
						'conditions' => array(
							'PostTag.active' => 1
						),
						'Tag' => array(
							'fields' => array(
								'name'
							)
						)

					),
				),

			);
			$post= $this->Post->find('first', $options);
			// debug($post);
			// die( __LINE__ . ' died' );
			$this->set('post', $post);
		}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Post->create();
			if ($this->Post->save($this->request->data)) {
				$this->Flash->success(__('The post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The post could not be saved. Please, try again.'));
			}
		}
		$topics = $this->Post->Topic->find('list');
		$users = $this->Post->User->find('list');
		$this->set(compact('topics', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Post->save($this->request->data)) {
				$this->Flash->success(__('The post has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The post could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Post.' . $this->Post->primaryKey => $id));
			$this->request->data = $this->Post->find('first', $options);
		}
		$topics = $this->Post->Topic->find('list');
		$users = $this->Post->User->find('list');
		$this->set(compact('topics', 'users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {

		if (!$this->Post->exists($id)) {
			throw new NotFoundException(__('Invalid post'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Post->delete($id)) {
			$this->Flash->success(__('The post has been deleted.'));
		} else {
			$this->Flash->error(__('The post could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	/**
	 * add method
	 *
	 * @return void
	 */
		public function addReply() {

			if ($this->request->is('post')) {
				$this->loadModel('Reply');
				$this->Reply->create();
				$this->request->data['Reply']['date'] = date("Y-m-d H:i:s");
				$post =$this->Post->find('first',array(
					'conditions' => array('Post.hash' => $this->request->data['Reply']['hash']),
					'fields' =>array('id')
				));
				$this->request->data['Reply']['post_id'] = $post['Post']['id'];

				if ($this->Reply->save($this->request->data)) {
					$this->Flash->success(__('The post has been saved.'));
					return $this->redirect($this->referer());
					// return $this->redirect(array('action' => './' , $this->request->data['post_id']));
				} else {
					$this->Flash->error(__('The post could not be saved. Please, try again.'));
				}
			}
		}
	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function deletePost($id = null) {
		$this->Post->id = $this->Post->field('id', array('hash' => $id));
		// if (!$this->Post->exists($id)) {
		// 	throw new NotFoundException(__('Invalid post'));
		// }
		$this->request->allowMethod('post');

		if ($this->Post->saveField('active' , 0)) {
			$this->Flash->success(__('The post has been deleted.'));
		} else {
			$this->Flash->error(__('The post could not be deleted. Please, try again.'));
		}
		return $this->redirect('/categories/show/aJZ1wS4oWBor');
	}

	public function postsAdd(){
		if ($this->request->is('post')) {

			$this->Post->create();
			// $this->request->data['Post']['date'] = date("Y-m-d H:i:s");

			$this->request->data['Post']['active'] =1;

			if ($this->Post->save($this->request->data)) {
				$this->Flash->success(__('The post has been saved.'));
				return $this->redirect($this->referer());
				// return $this->redirect(array('action' => './' , $this->request->data['post_id']));
			} else {
				$this->Flash->error(__('The post could not be saved. Please, try again.'));
			}
		}

	}


}

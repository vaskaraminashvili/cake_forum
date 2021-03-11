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
		public function viewSite($id = null) {

			$this->layout = 'site';
			// $this->Post->recursive =1;

			$options = array(
				'conditions' => array('Post.hash' => $id),
				'contain' => array(
					'User',
					'Reply' => array(
						'order' => array(
							'reply_date DESC'
						)
					)
				),
			    // 'recursive' => 1
			);
			$post= $this->Post->find('first', $options);
			// debug($post);
			// die( __LINE__ . ' died' );


			$this->set('user', $this->Auth->user());
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
			// debug($this->request->data);
			// die( __LINE__ . ' died' );
			// die( __LINE__ . ' died' );
			if ($this->request->is('post')) {
				$this->Reply->create();
				$this->request->data['reply_date'] = date("Y-m-d H:i:s");
				if ($this->Reply->save($this->request->data)) {
					$this->Flash->success(__('The post has been saved.'));
					return $this->redirect(array('action' => './' , $this->request->data['post_id']));
				} else {
					$this->Flash->error(__('The post could not be saved. Please, try again.'));
				}
			}
			die( __LINE__ . ' died' );
			$topics = $this->Post->Topic->find('list');
			$users = $this->Post->User->find('list');
			$this->set(compact('topics', 'users'));
		}
}

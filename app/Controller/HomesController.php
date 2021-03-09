<?php

App::uses('AppController', 'Controller');
class HomesController extends AppController {
    /**
     * Components
     *
     * @var array
     */
        public $components = array('Paginator');

    var $uses = array('Category' , 'Post');


    public function index(){

        $this->Category->recursive = 0;
       $categories = $this->Category->query("SELECT
                categories.*,
                COUNT( posts.id ) AS Total
            FROM
                categories
                INNER JOIN posts ON categories.hash_id = posts.category_id
            GROUP BY
                categories.`name`
        ");


        $categories_sorted = array();
        foreach ($categories as $key => $item) {
            $category = (object) $item['categories'];
            $category->total = $item[0]['Total'];
            if ($category->level == 1) {
                $categories_sorted[$category->id] = $category;
            } elseif ($category->level == 2) {
                $categories_sorted[$category->parent]->children[$category->id] = $category;
            }
        }

        $this->set('categories', $categories_sorted);

    }
    public function posts($id = null){

        $this->Post->recursive =-1;

        $options = array(
            'conditions' => array('Post.category_id' => $id),

        );

        $category= $this->Category->find('first',  array(
            'conditions' => array('Category.hash_id' => $id),
            'recursive' => -1, // int
            'limit' => 1
        ));
        // debug($category);
        // die( __LINE__ . ' died' );
        $posts= $this->Post->find('all', $options);
        $this->set('posts', $posts);
        $this->set('category', $category);
        // debug($post);
        // die( __LINE__ . ' died' );

    }

    public function beforeRender() {
        parent::beforeRender();

        $this->layout = 'site';
    }
}

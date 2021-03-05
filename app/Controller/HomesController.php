<?php

App::uses('AppController', 'Controller');
class HomesController extends AppController {
    /**
     * Components
     *
     * @var array
     */
        public $components = array('Paginator');

    var $uses = array('Category');


    public function index(){
        $this->Category->recursive = 0;
        $categories = $this->Category->find('all', array(
            'order' => array(
                'level ASC'
            )
        ));

        $categories_sorted = array();
        foreach ($categories as $key => $item) {
            $category = (object) $item['Category'];

            if ($category->level == 1) {
                $categories_sorted[$category->id] = $category;
            } elseif ($category->level == 2) {
                $categories_sorted[$category->parent]->children[$category->id] = $category;
            }
        }

        $this->set('categories', $categories_sorted);

    }

    public function beforeRender() {
        parent::beforeRender();

        $this->layout = 'site';
    }
}

<?php
// debug($category['Post']);
// die( __LINE__ . ' died' );
?>
<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <h1 class="h1 mb-xl-5"><?php echo $category['Category']['name'] ?></h1>
        </div>
    </div>
    <div class="row">
        <?php foreach ($category['Post'] as $post['Post']):
            // debug($post['Post']['title']);
            // die( __LINE__ . ' died' );
        ?>
            <div class="col-xl-12">

                <h2>
                     <?php
                    echo $this->Html->link($post['Post']['title'] , array(
                        'action' => '../posts/',
                        $post['Post']['hash']
                    )); ?>
                </h2>
                <p><?php echo $post['Post']['text'] ?></p>
            </div>
        <?php endforeach ?>
    </div>
</div>

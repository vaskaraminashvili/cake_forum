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
                // debug(AuthComponent::user('role'));
                // die( __LINE__ . ' died' );
            ?>

            <div class="col-xl-12">
                <?php if (AuthComponent::user('role') == 'admin'): ?>

                <?php echo $this->Form->create('Post', array('type' => 'POST' , 'url' => '/posts/deletePost/'. $post['Post']['hash'])); ?>

                    <?php echo $this->Form->Submit('Delete', array('class'=>'btn btn-danger btn-sm', 'div'=> false, 'id'=>'registerButton')); ?>

                <?php echo $this->Form->end(); ?>


                <?php endif ?>

                <h2 class ="d-flex justify-content-between">
                    <?php
                        echo $this->Html->link(
                            $post['Post']['title'],
                            '/posts/show/' . $post['Post']['hash'],
                            array('class' => 'button')
                        );
                    ?>
                    <?php if ($post['Post']['reply_count'] != null && $post['Post']['reply_count'] > 0): ?>

                    <span class="badge bg-warning text-dark"> <?php echo $post['Post']['reply_count'] ?>  Replies</span>
                    <?php endif ?>

                </h2>

                <p><?php echo $post['Post']['text'] ?></p>
            </div>

            <?php endforeach ?>

        </div>
    </div>

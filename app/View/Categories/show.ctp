<?php
// debug($category['Post'][0]['category_id']);
// debug(AuthComponent::user());
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
        <?php if (AuthComponent::user()): ?>

        <div class="row">
            <div class="col-xl-12">

                <?php echo $this->Form->create('Post', array('type' => 'POST' , 'url' => '/posts/postAdd')); ?>

                    <div class="mb-3">
                        <?php echo $this->Form->hidden('user_id' , array('value' => AuthComponent::user('id') )) ?>
                        <?php echo $this->Form->hidden('category_id' , array('value' => $category['Post'][0]['category_id'] )) ?>

                        <label for="exampleFormControlInput1" class="form-label">User name</label>
                        <?php
                            echo $this->Form->input('username' , array(
                                'type' => 'text',
                                'label' => false,
                                'class' => 'form-control',
                                'value' => AuthComponent::user('username'),
                                'readonly' => true
                            ));
                        ?>
                    </div>
                    <div class="mb-3">

                        <label for="exampleFormControlInput1" class="form-label">TItle</label>
                        <?php
                            echo $this->Form->input('title' , array(
                                'type' => 'text',
                                'label' => false,
                                'class' => 'form-control',
                                'placeholder' => __('text sdf sdf sd '),
                            ));
                        ?>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                        <?php
                        echo $this->Form->input('text', array(
                            'type' => 'textarea',
                            'label'=> false,
                            'div'=>true,
                            'class' => 'form-control',
                            'id' => 'exampleFormControlTextarea1',
                            'rows' => 6,
                            'autocomplete' => "off",
                            'placeholder' => __('text sdf sdf sd '),

                        ));
                        ?>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Submit Reply</button>
                    </div>

                <?php echo $this->Form->end(); ?>
                </form>
            </div>
        </div>

        <?php endif ?>
    </div>

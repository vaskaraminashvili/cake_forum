    <div class="container">
        <div class="row">
            <div class="col-xl-12 py-3 bg-secondary"></div>
            <div class="col-xl-12 py-3 bg-info"></div>
            <div class="col-xl-12 py-3 bg-light">
                <?php foreach ($post['PostTag'] as $key => $tag): ?>

                <span class="badge rounded-pill bg-success me-xl-3"><?php echo $tag['Tag']['name'] ?></span>
                <?php endforeach ?>

            </div>
            <div class="col-xl-12">
                <div class="row mb-xl-5">
                    <div class="col-xl-12">
                        <h1><?php echo $post['Post']['title'] ?></h1>
                    </div>
                    <div class="col-xl-12">
                        <?php echo $post['Post']['text'] ?>

                    </div>
                </div>

                    <?php foreach ($post['Reply'] as $key => $reply):
                        // debug($reply);
                        // die;
                    ?>

                <div class="row mb-xl-2 bg-light py-3">
                    <div class="col-xl-3 ">
                        <?php echo $reply['user_id'] ?>

                    </div>
                    <div class="col-xl-9">
                        <?php echo $reply['User']['username'] ?>

                        <span class="badge bg-info ms-xl-3">
                             this is user who replied
                        </span>
                        <hr>

                        <?php echo $reply['text'] ?>

                        <span class="badge bg-info ms-xl-3">
                            this is replyies text with date
                        </span>
                        <span class="badge bg-secondary ms-xl-3"><?php echo $reply['date'] ?></span>
                    </div>
                </div>

                    <?php endforeach ?>
                <?php if (AuthComponent::user()): ?>

                <div class="row">
                    <div class="col-xl-12">

                        <?php echo $this->Form->create('Reply', array('type' => 'POST' , 'url' => '/posts/addReply')); ?>
                        <?php echo $this->Form->hidden('user_id' , array('value' => AuthComponent::user('id'))) ?>
                        <?php echo $this->Form->hidden('hash' , array('value' =>  $post['Post']['hash'])) ?>
                            <div class="mb-3">

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
        </div>
    </div>

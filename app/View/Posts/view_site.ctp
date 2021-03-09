<div class="container">
    <div class="row">
        <div class="col-xl-12 py-3 bg-secondary"></div>
        <div class="col-xl-12 py-3 bg-info"></div>
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-3">
                    <?php echo $post['Post']['user_id'] ?>
                </div>
                <div class="col-xl-9">
                    <?php echo $post['Post']['text'] ?>
                </div>
            </div>
            <div class="row">
                <?php foreach ($post['Reply'] as $key => $reply):
                    // debug($reply);
                    // die;
                ?>
                    <div class="col-xl-3">
                        <?php echo $reply['user_id'] ?>
                    </div>
                    <div class="col-xl-9">
                        reply
                        <hr>
                        <?php echo $reply['text'] ?>
                        <span class="badge bg-secondary ms-xl-3">
                            <?php echo $reply['reply_date'] ?>
                        </span>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</div>

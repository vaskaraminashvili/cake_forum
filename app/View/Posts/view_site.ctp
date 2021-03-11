<div class="container">
    <div class="row">
        <div class="col-xl-12 py-3 bg-secondary"></div>
        <div class="col-xl-12 py-3 bg-info"></div>
        <div class="col-xl-12">
            <div class="row bg-secondary mb-xl-5">
                <div class="col-xl-3">
                    <?php echo $post['Post']['user_id'] ?>
                </div>
                <div class="col-xl-9">
                    <?php echo $post['Post']['text'] ?>
                </div>
            </div>
            <div class="row mb-xl-5">
                <div class="col-xl-12">
                    <div class="alert alert-primary" role="alert">
                      Tags Associetied with post
                      after addd to filter with tags
                    </div>
                    <?php foreach ($post['Tag'] as $key => $tag): ?>
                        <span class="badge rounded-pill bg-secondary"><?php echo $tag['name'] ?></span>
                    <?php endforeach ?>
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
                        reply
                        <hr>
                        <?php echo $reply['text'] ?>
                        <span class="badge bg-secondary ms-xl-3">
                            <?php echo $reply['reply_date'] ?>
                        </span>
                    </div>
            </div>
                <?php endforeach ?>
            <div class="row">
                <div class="col-xl-12">
                    <form action="./addReply" method="POST">
                        <div class="mb-3">
                            <input type="hidden" name="user_id" value="<?php echo $user['id'] ?>">
                            <input type="hidden" name="post_id" value="<?php echo $post['Post']['hash_id'] ?>">
                            <label for="exampleFormControlInput1" class="form-label">User name</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" readonly  value="<?php echo $user['username'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                            <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Submit Reply</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

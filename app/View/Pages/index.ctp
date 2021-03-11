<?php
    // debug($categories);
    // die( __LINE__ . ' died' );
?>

    <div class="container">
        <div class="row">
        <?php foreach ($categories as $category): ?>

            <div class="col-xl-12"><?php echo $category['Category']['name'] ?></div>
            <?php if (!empty($category['LevelOne'])): ?>
                <?php foreach ($category['LevelOne'] as $levelOne['Category']): ?>
                <?php
                // debug($levelOne['Category']);
                // die( __LINE__ . ' died' );
                ?>

            <div class="col-xl-12 ms-xl-3">
                <?php echo $this->Html->link(
                    $levelOne['Category']['name'],
                    '/categories/show/'. $levelOne['Category']['hash'],
                    array('class' => 'btn btn-link',)
                ); ?>
                <?php if ($levelOne['Category']['post_count'] != null && $levelOne['Category']['post_count'] > 0): ?>

                <span class="badge bg-warning text-dark"> <?php echo $levelOne['Category']['post_count'] ?>  Posts</span>
                <?php endif ?>

            </div>
                        <?php if (!empty($levelOne['Category']['LevelTwo'][0]['id'])): ?>
                            <?php foreach ($levelOne['Category']['LevelTwo'] as $levelTwo['Category']): ?>

            <div class="col-xl-12 ms-xl-5">
                <?php
                    echo $this->Html->link(
                        $levelTwo['Category']['name'],
                        '/categories/show/'. $levelOne['Category']['hash'],
                        array('class' => 'btn btn-link',)
                    )
                ?>

            </div>
                            <?php endforeach ?>
                        <?php endif ?>
                <?php endforeach ?>
            <?php endif ?>
        <?php endforeach ?>

        </div>
    </div>

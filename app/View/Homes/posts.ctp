<div class="container">
    <div class="row">
        <div class="col-xl-12">
            <h1 class="h1 mb-xl-5"><?php echo $category['Category']['name'] ?></h1>
        </div>
    </div>
    <div class="row">
        <?php foreach ($posts as $key => $item):
            // debug();
            // die( __LINE__ . ' died' );
        ?>
            <div class="col-xl-12">

                <h2>
                     <?php
                    echo $this->Html->link($item['Post']['title'] , array(
                        'action' => '../posts/',
                        $item['Post']['hash_id']
                    )); ?>
                </h2>
                <p><?php echo $item['Post']['text'] ?></p>
            </div>
        <?php endforeach ?>
    </div>
</div>

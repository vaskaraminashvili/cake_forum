<?php
// debug($categories)
 ?>
<div class="p-5"></div>
<div class="container">
    <div class="row">
        <?php foreach ($categories as $key => $item):
        ?>
                <div class="col-xl-12">
                    <h4> <?=$item->name?> <span class="badge bg-secondary"> <?=$item->description?></span></h4>
                </div>
                <?php if (!empty($item->children)): ?>
                    <?php foreach ($item->children as $key => $child):
                        // debug($child);
                        // die( __LINE__ . ' died' );
                    ?>
                        <div class="row ms-xl-3 mb-xl-3">
                            <div class="col-xl-2 bg-warning">child category icon</div>
                            <div class="col-xl-10 bg-light">
                                 <?php
                                echo $this->Html->link($child->name , array(
                                    'action' => '../category/',
                                    $child->hash_id
                                )); ?>
                                <span class="badge bg-secondary ms-auto"><?=$child->total?></span>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php endif ?>

        <?php endforeach ?>
    </div>
</div>

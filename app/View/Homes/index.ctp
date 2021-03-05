<?php
// debug($categories)
 ?>
<div class="p-5"></div>
<div class="container">
    <?php foreach ($categories as $key => $item):
    ?>
        <div class="row">
            <div class="col-xl-12">
                <h4> <?=$item->name?> <span class="badge bg-secondary"> <?=$item->description?></span></h4>
            </div>
            <?php if (!empty($item->children)): ?>
                <?php foreach ($item->children as $key => $child):

                ?>
                    <div class="row ms-xl-3 mb-xl-3">
                        <div class="col-xl-2 bg-warning">child category icon</div>
                        <div class="col-xl-10 bg-light">
                             <?php
                            echo $this->Html->link($child->name , array(
                                'action' => '../topics/',
                                $child->id
                            )); ?>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>

        </div>
    <?php endforeach ?>
</div>

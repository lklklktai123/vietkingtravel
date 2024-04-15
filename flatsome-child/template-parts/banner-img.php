<?php
?><div class="row-banner">
    <?php
    $a =  get_field('banner_sidebar_tour', 'option');
    foreach ($a as $value) {
    ?>
        <div class="banner-img">
            <a href=""><img src="<?= $value['banner-sidebar-img']; ?>"></a>
        </div>
    <?php } ?>
</div>
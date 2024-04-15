<?php
    $banner_slider = get_field("banner-slider");
    ?>
<div class="slider-home-wp">
    <?php foreach($banner_slider as $data) : ?>
    <div class="item-slider">
        <a href="<?= $data['link_hinh_anh']?>">
            <img src="<?= $data['hinh_anh']?>" alt="hình ảnh">
        </a>
    </div>
    <?php endforeach; ?>
</div>
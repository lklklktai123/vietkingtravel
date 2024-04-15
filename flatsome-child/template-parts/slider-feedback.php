<?php
$dataFeedBack = get_field('repeat_client','option');
?>
<div class="feedback-wp">
    <?php foreach($dataFeedBack as $data): ?>
    <div class="item-feedback">
        <div class="item-feedback-content">
            <p><?= $data['feedback']?></p>
        </div>
        <div class="item-feedback-client">
            <div class="client-avt">
                <img src="<?= $data['hinh_anh']?>" alt="hình ảnh client">
            </div>
            <div class="feedback-content">
                <div class="client-name"><p><?= $data['ten_kh']?></p></div>
                <div class="client-location"><?= $data['vi-tri']?></div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
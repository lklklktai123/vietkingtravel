<?php
// Lấy biến `name` từ hàm `short_code_logo()`
$dataLogo;
if($name == 'client') {
    $dataLogo = get_field('logo_khach_hang', 'option');
} else {
    $dataLogo = get_field('logo_bao_chi', 'option');
}
?>
<div class="logo-wp">
    <?php foreach ($dataLogo as $data) : ?>
        <div class="logo-item">
            <a href="<?= $data['link'] ?>">
                <img src="<?= $data['hinh_anh'] ?>" alt="hình ảnh logo">
            </a>
        </div>
    <?php endforeach; ?>
</div>
<?php
$tour_category_id = $idCat; // Thay 123 bằng ID của danh mục tour_category

$args = array(
    'post_type' => 'tour',
    'tax_query' => array(
        array(
            'taxonomy' => 'tour_category',
            'field' => 'term_id',
            'terms' => $tour_category_id,
        ),
    ),
    'orderby' => 'date',
    'order' => 'DESC',
    'posts_per_page' => 3,
);
$query = new WP_Query($args);
?>
<div class="tour-wp container">
    <?php
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            $tour_id = get_the_ID(); // Lấy ID của bài viết
            $thumbnail_url = get_the_post_thumbnail_url();
            $title = get_the_title();
            $link = get_the_permalink();
            $tour_price = get_field('tour_price', $tour_id);
            $thoi_luong = get_field('thoi_luong', $tour_id);
            $ngay_khoi_hanh = get_field('ngay_khoi_hanh', $tour_id);

    ?>
            <div class="item-tour">
                <div class="tour-image">
                    <a href="<?= $link; ?>"><img src="<?= $thumbnail_url; ?>" alt="tour"></a>
                </div>
                <div class="tour-content">
                    <div class="tour-title"><a href="<?= $link; ?>"><span class="limit-2"><?= $title; ?></span></a></div>
                    <div class="tour-date"><span class="tour-icon"><i class="fas fa-calendar-alt"></i></span> <?= $ngay_khoi_hanh ?></div>
                    <div class="tour-day-number">
                        <span class="tour-date-icon"><i class="fas fa-clock"></i></span><span><?= $thoi_luong ?></span>
                    </div>
                </div>
                <div class="tour-price">
                    <span class="price"><?php echo number_format($tour_price) ?> </span>
                    <span>đ/khách</span>
                </div>
            </div>
    <?php }
    }
    wp_reset_postdata();
    ?>
</div>
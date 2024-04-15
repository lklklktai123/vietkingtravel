<?php
$hddnMain = new WP_Query(array(
    'posts_per_page' => 1,
    'post_type' => 'post',
    'orderby' => 'date',
    'order' => 'DESC',
));
$hddnSub = new WP_Query(array(
    'posts_per_page' => 4,
    'post_type' => 'post',
    'orderby' => 'date',
    'order' => 'DESC',
    'offset' => 1, // Bỏ qua bài viết đầu tiên
));
?>
<div class="log-container">
    <div class="item-log-main">
        <?php
        if ($hddnMain->have_posts()) {
            while ($hddnMain->have_posts()) {
                $hddnMain->the_post();
                $date = get_the_date('d/m/Y');
                $excerpt = get_the_excerpt();
        ?>
                <div class="item-log">
                    <div class="log-img">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="hình ảnh post">
                        </a>
                    </div>
                    <div class="log-content">
                        <div class="log-date"><?php echo $date; ?></div>

                        <div class="log-title">
                            <a href="<?php the_permalink(); ?>" class="limit-2"><?php the_title(); ?></a>
                        </div>
                        <div class="log-excerp">
                            <span class="limit-2">
                                <?= $excerpt ?>
                            </span>
                        </div>
                        <div class="log-btn">
                            <a href="<?php the_permalink(); ?>">Xem thêm</a>
                        </div>
                    </div>
                </div>
        <?php  }
        }
        wp_reset_postdata(); ?>
    </div>
    <div class="item-log-sub">
        <?php
        if ($hddnSub->have_posts()) {
            while ($hddnSub->have_posts()) {
                $hddnSub->the_post();
                $date = get_the_date('d/m/Y');
                $excerpt = get_the_excerpt();
        ?>
                <div class="item-log">
                    <div class="log-img">
                        <a href="<?php the_permalink(); ?>">
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="hình ảnh post">
                        </a>
                    </div>
                    <div class="log-content">
                        <div class="log-date"><?php echo $date; ?></div>

                        <div class="log-title">
                            <a href="<?php the_permalink(); ?>" class="limit-2"><?php the_title(); ?></a>
                        </div>
                        <div class="log-excerp">
                            <span class="limit-2">
                                <?= $excerpt ?>
                            </span>
                        </div>
                    </div>
                </div>
        <?php  }
        }
        wp_reset_postdata(); ?>
    </div>
</div>
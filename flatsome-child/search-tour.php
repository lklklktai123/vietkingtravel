<?php
/*
Template Name: filter tour
*/

get_header();
?>
<?php


?>
<div class="container">
	<div class="wp_breadcrumbs"><?php wp_breadcrumbs(); ?></div>
	<div class="search-tour-main-wp">
		<div class="search-tour-main-content">
			<?php
			
			// Kiểm tra xem form đã được submit hay chưa

			if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['find'])) {
				// Kiểm tra xem trường 'location' đã được gửi đi và tồn tại
				if (isset($_GET['location'])) {
					$location = $_GET['location']; // Lấy giá trị từ trường select "location"
				}
				// Kiểm tra xem trường 'destination' đã được gửi đi và tồn tại
				if (isset($_GET['destination'])) {
					$destination = $_GET['destination']; // Lấy giá trị từ trường input "destination"
				}
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$data = new WP_Query(array(
					'post_type' => 'tour', // your post type name
					'meta_query' => array(
						'relation' => 'AND',
						array(
							'key' => 'dia_diem_khoi_hanh',
							'value' => $location,
							'compare' => 'like',
						),
					),
					's' => $destination,
					'posts_per_page' => 10, // post per page
					'paged' => $paged,
				));
				if ($data->have_posts()) :
					while ($data->have_posts()) : $data->the_post();
						// Lấy thông tin bài viết
						$post_id = get_the_ID();
						$title = get_the_title();
						$id = get_the_ID();
						$content = get_the_content();
						$thumbnail_url = get_the_post_thumbnail_url();
						$permalink = get_permalink();
						$location = get_field('dia_diem_khoi_hanh', $post_id);
						// Duyệt qua mảng $location và gán giá trị tương ứng vào $location_Text;
				$location_Text = "";
						$destination = get_field('diem_den', $post_id);
						$number_day = get_field('thoi_luong', $post_id);
						$hotel = get_field('khach_san', $post_id);
						$price;
						$price = get_field('tour_price', $post_id) >= 0 ? get_field('tour_price', $post_id) : 0;
			?>
						<div class="search-tour-item">
							<div class="search-item-img">
								<img src="<?= $thumbnail_url;  ?>" />
							</div>
							<div class="search-tour-item-content">
								<div class="search-tour-title">
									<a class="limit-3" href="<?= $permalink ?>"><?= $title ?></a>
								</div>
								<div class="search-tour-item-infor">
									<div>
										<span class="search-icon"><i class="fa-solid fa-house"></i></span>
										<span class="search-text"><span class="text-grey">Khởi hành:</span> <span class="dau-phay">  <?php foreach($location as $key => $val ){ ?> <?= $key==1 || $key==2 ? ', ' :'' ?><span > <?php if($val == 1){ echo'Hồ Chí Minh'; } elseif($val == 3){ echo'Đà Nẵng'; }else{ echo'Hà Nội';}   ?> </span><?php } ?></span> </span>
									</div>
									<div>
										<span class="search-icon"><i class="fa-solid fa-plane-arrival"></i></span>
										<span class="search-text"><span class="text-grey">Điểm đến:</span> <?= $destination ?> </span>
									</div>
									<div>
										<span class="search-icon"><i class="fa-solid fa-clock"></i></span>
										<span class="search-text"><span class="text-grey">Thời lượng:</span> <?= $number_day ?> </span>
									</div>
									<div>
										<span class="search-icon"><i class="fa-solid fa-hotel"></i></span>
										<span class="search-text"><span class="text-grey">Khách sạn:</span> <?= $hotel ?></span>
									</div>
								</div>
							</div>
							<div class="search-tour-btn">
								<div class="search-tour-price">
									<span><?php echo number_format($price) ?>đ</span>
								</div>
								<a href="<?= $permalink ?>" class="link-search-tour">Đặt tour</a>
							</div>
						</div>

					<?php endwhile;
					// Phần phân trang
					$current_page = max(1, get_query_var('paged'));
					$pagination_base = str_replace(999999999, '%#%', get_pagenum_link(999999999));
					$paginate_links = paginate_links(array(
						'base' => $pagination_base,
						'format' => '?paged=%#%',
						'current' => $current_page,
						'total' => $data->max_num_pages,
						'prev_text' => __('«'),
						'next_text' => __('»'),
					));

					if ($paginate_links) {
						echo "<div class='paginate_wp'>$paginate_links</div>";
					}
					?>
				<?php endif; ?>
			<?php wp_reset_postdata();
			} else {
			?>
				<span>Không có dữ liệu được tìm thấy</span>
			<?php } ?>
		</div>
		<div class="siderbar-search">
			<?php get_sidebar(); ?>
		</div>
		<?php
		get_footer();
		?>
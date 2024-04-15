<?php

get_header();
?>
<?php


$site_url = get_site_url();

$tour_cate = get_queried_object(); // Lấy đối tượng taxonomi hiện tại
$tour_cate_name = $tour_cate->name; // Lấy tên taxonomi hiện tại
$tour_cate_url = get_term_link($tour_cate);

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$tour_cate_id = $tour_cate->term_id; // Lấy ID của danh mục
$data_tour_cate = new WP_Query( array(
    'post_type' => 'tour',
    'posts_per_page' => 10, 
    'paged' => $paged, // Lấy số trang hiện tại
    'tax_query' => array(
        array(
            'taxonomy' => 'tour_category',
            'field'    => 'term_id',
            'terms'    => $tour_cate_id,
        ),
    ),
));

$category = get_term_by('id', $tour_cate_id, 'tour_category');
$category_description = $category->description;

// echo '<pre>';
// print_r($tour_cate_url);
// echo '</pre>';
// Kiểm tra xem form đã được submit hay chưa

// print_r($tour_cate_id);


$data_tour_cate = new WP_Query( array(
    'post_type' => 'tour',
    'posts_per_page' => -1, 
    'tax_query' => array(
        array(
            'taxonomy' => 'tour_category',
            'field'    => 'term_id',
            'terms'    => $tour_cate_id,
            // 'terms'    => 18,
            'include_children' => true, // Bao gồm cả danh mục con
        ),
    ),  
    // 'meta_query' => array(
    //     'relation' => 'AND',
    //     array(
    //         'key' => 'dia_diem_khoi_hanh', 
    //         'value' => '"' . 3 . '"', // Đặt giá trị vào dấu ngoặc kép để giữ nguyên định dạng mảng
    //         'compare' => 'LIKE',
    //     )
    // )
));


if($data_tour_cate -> have_posts()){
    while($data_tour_cate -> have_posts()){ 
        $data_tour_cate -> the_post();
         // Lấy thông tin bài viết
         $post_id = get_the_ID();
         $title = get_the_title();
         $content = get_the_content();
         $thumbnail_url = get_the_post_thumbnail_url();
         $permalink = get_permalink();
         $location = get_field('dia_diem_khoi_hanh', $post_id);
			if (is_array($location)) {
				if (count($location) == 1) {
					if (in_array(1, $location)) {
						$location_Text = 'Hồ Chí Minh';
					} elseif (in_array(2, $location)) {
						$location_Text = 'Hà Nội';
					} elseif (in_array(3, $location)) { 
                        $location_Text = 'Đà Nẵng';
                    }
				} elseif (count($location) == 2 && in_array(1, $location) && in_array(2, $location)) {
					$location_Text = 'Hồ Chí Minh, Hà Nội';
				} elseif (count($location) == 2 && in_array(1, $location) && in_array(3, $location)) {
                    $location_Text = 'Hồ Chí Minh, Đà Nẵng';
                } elseif (count($location) == 2 && in_array(2, $location) && in_array(3, $location)) { 
                    $location_Text = 'Đà Nẵng , Hà Nội';
                } elseif (count($location) == 3 && in_array(1, $location) && in_array(2, $location) && in_array(3, $location)) { 
                    $location_Text = 'Hồ Chí Minh, Đà Nẵng, Hà Nội';
                }
			}
         $destination = get_field('diem_den', $post_id);
         $number_day = get_field('thoi_luong', $post_id);
         $hotel = get_field('khach_san', $post_id);
         $price = get_field('tour_price', $post_id);


         $final_data[] = array(
            'post_id' => $post_id,
            'title' => $title,
            'content' => $content,
            'thumbnail_url' => $thumbnail_url,
            'permalink' => $permalink,
            'location' => $location_Text,
            'diemden' => $destination,
            'thoi_luong' => $number_day,
            'hotel' => $hotel,
            'price' => number_format($price),
            // 'loca' => $locationId

         );
         }
    // Đặt lại giá trị của global $post
    wp_reset_postdata();
}

// print_r($final_data);



?>
<div class="find-tour-wp search-page-tour">
	<div class="search-page-tour_box" >
		<div class="tour-search-post">
			<?php echo get_search_form(); ?>
		</div>
		<form class="form-search-home" action="/loc-tour/" method="GET">
			<div class="input-search-wrapper">
				<div class="select-input-wp">
					<svg class="location" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
						<path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
					</svg>
					<select class="dropdow-custom" name="location">
						<option class="option-input-text" value="1">Từ Hồ Chí Minh</option>
						<option class="option-input-text" value="3">Từ Đà Nẵng</option>
						<option class="option-input-text" value="2">Từ Hà Nội</option>
					</select>
				</div>
				<div class="input-search-wp">
					<svg class="location" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
						<path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z" />
					</svg>
					<input type="text" placeholder="Bạn muốn đi đâu" name="destination">
				</div>
				<div class="btn-search-wp">
					<button type="submit" name="find">
						<span><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
								<path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
							</svg>Tìm kiếm</span>
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
<div class="container">
	<div class="wp_breadcrumbs"><?php wp_breadcrumbs();?></div>
	<div class="search-tour-main-wp">
		<div class="search-tour-main-content">
            <div class="tour-cate-title">
                <h1><?php echo $tour_cate_name; ?></h1>
            </div>
            <div class="tour-cate-fillter-tt">
                <a href="<?php echo $tour_cate_url; ?>" class="btn-fillter-cate active-cate" data="0"><span>Tất cả</span></a>
                <a href="#" class="btn-fillter-cate" data="1"><span>Từ TP Hồ Chí Minh</span></a>
                <a href="#" class="btn-fillter-cate" data="3"><span>Từ Đà Nẵng</span></a>
                <a href="#" class="btn-fillter-cate" data="2"><span>Từ Hà Nội</span></a>
            </div>
			<div class="search-tour-box">
			<?php
			$destination = "";
            if ($data_tour_cate->have_posts()) {
                while ($data_tour_cate->have_posts()) { $data_tour_cate->the_post();
                    // Lấy thông tin bài viết
                    $post_id = get_the_ID();
                    $title = get_the_title();
                    $id = get_the_ID();
                    $content = get_the_content();
                    $thumbnail_url = get_the_post_thumbnail_url();
                    $permalink = get_permalink();
                    $location = get_field('dia_diem_khoi_hanh', $post_id);
                    // $location_Text = $location == 1 ? 'Hồ Chí Minh' : 'Hà Nội';
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
                                <span><?php echo $price ? number_format($price) : '' ?>đ</span>
                            </div>
                            <a href="<?= $permalink ?>" class="link-search-tour">Đặt tour</a>
                        </div>
                    </div>

                <?php }; 
                $total_pages = $data_tour_cate->max_num_pages;
                if ($total_pages > 1) {

                	$current_page = max(1, get_query_var('paged'));
                	echo "<div class='paginate_wp'>";
                	echo paginate_links(array(
                		'base' => get_pagenum_link(1) . '%_%',
                		'format' => 'page/%#%',
                		'current' => $current_page,
                		'total' => $total_pages,
                		'prev_text'    => __('«'),
                		'next_text'    => __('»'),
                	));
                	echo '</div>';
                }
                ?>
          
        <?php wp_reset_postdata();
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
				// Kiểm tra xem trường 'location' đã được gửi đi và tồn tại
				if (isset($_POST['location'])) {
					$location = $_POST['location']; // Lấy giá trị từ trường select "location"
				}
				// Kiểm tra xem trường 'destination' đã được gửi đi và tồn tại
				if (isset($_POST['destination'])) {
					$destination = $_POST['destination']; // Lấy giá trị từ trường input "destination"
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
					// 'posts_per_page' => 5, // post per page
					// 'paged' => $paged,
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
						// $location_Text = $location == 1 ? 'Hồ Chí Minh' : 'Hà Nội';
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
					// $total_pages = $data->max_num_pages;
					// if ($total_pages > 1) {

					// 	$current_page = max(1, get_query_var('paged'));
					// 	echo "<div class='paginate_wp'>";
					// 	echo paginate_links(array(
					// 		'base' => get_pagenum_link(1) . '%_%',
					// 		'format' => '/page/%#%',
					// 		'current' => $current_page,
					// 		'total' => $total_pages,
					// 		'prev_text'    => __('«'),
					// 		'next_text'    => __('»'),
					// 	));
					// 	echo '</div>';
					// }
					?>
				<?php endif; ?>
			<?php wp_reset_postdata();
			} else {
			?>
				<span>Không có dữ liệu được tìm thấy</span>
			<?php } ?>
		</div>
        <?php if($category_description){ ?>
        <div class="cate-decs">
            <h3>Mô tả</h3>
            <?= $category_description ?>
        </div>
        <?php } ?>
	</div>
		<div class="siderbar-search tour-cate-page">
			<?php get_sidebar(); ?>
		</div>

<script>
    var catId = '<?php echo $tour_cate_id ?>'
    var itemCate = jQuery('.btn-fillter-cate');
    jQuery('.btn-fillter-cate').on('click', function(e) {
        e.preventDefault();
        
        var locationId = jQuery(this).attr('data');

		console.log(locationId);

        itemCate.removeClass('active-cate');
        jQuery(this).addClass('active-cate');

		// console.log('---');
		// console.log(catId);

        jQuery.ajax({
            url: '<?php echo $site_url; ?>/wp-content/themes/flatsome-child/data-template/data-cate-fillter.php',
            type: 'POST',
            data: {
                locationId: locationId,
                catId : catId,
                  },

        }).done((ketqua) => {
			console.log(ketqua);
            const result = JSON.parse(ketqua);
            // Xử lý giá trị của dataFilter ở đây

            console.log(result);

			        // Kiểm tra locationId và tải lại trang nếu cần
			if (locationId === '0') {
				location.reload();
				return;
			}
			
           if(result.length) {
            dataProduct = result.map(val => ` <div class="search-tour-item">
							<div class="search-item-img">
								<img src="${val.thumbnail_url}" />
							</div>
							<div class="search-tour-item-content">
								<div class="search-tour-title">
									<a class="limit-3" href="${val.permalink}">${val.title}</a>
								</div>
								<div class="search-tour-item-infor">
									<div>
										<span class="search-icon"><i class="fa-solid fa-house"></i></span>
										<span class="search-text"><span class="text-grey">Khởi hành:</span> ${val.location} </span>
									</div>
									<div>
										<span class="search-icon"><i class="fa-solid fa-plane-arrival"></i></span>
										<span class="search-text"><span class="text-grey">Điểm đến:</span> ${val.diemden} </span>
									</div>
									<div>
										<span class="search-icon"><i class="fa-solid fa-clock"></i></span>
										<span class="search-text"><span class="text-grey">Thời lượng:</span> ${val.thoi_luong} </span>
									</div>
									<div>
										<span class="search-icon"><i class="fa-solid fa-hotel"></i></span>
										<span class="search-text"><span class="text-grey">Khách sạn:</span> ${val.hotel}</span>
									</div>
								</div>
							</div>
							<div class="search-tour-btn">
								<div class="search-tour-price">
									<span> ${val.price}đ</span>
								</div>
								<a href="${val.permalink}" class="link-search-tour">Đặt tour</a>
							</div>
 						</div>`).join('');
                jQuery('.search-tour-box').html(`
                    
                        ${dataProduct}
                    
                    `)
           }else {
                jQuery('.search-tour-box').html(`
                <span>Không có dữ liệu theo yêu cầu </span>
                `)
                }
        }).fail((xhr, status, error) => {
            console.log(`Error: ${error}`);
        });
    });
</script>
<?php
get_footer();
?>

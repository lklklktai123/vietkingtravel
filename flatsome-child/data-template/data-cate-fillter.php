<?php
require('../../../../wp-load.php');


$locationId = $_POST['locationId'];
$catId = $_POST['catId'];





$data_tour_cate = new WP_Query( array(
    'post_type' => 'tour',
    'posts_per_page' => -1, 
    'tax_query' => array(
        array(
            'taxonomy' => 'tour_category',
            'field'    => 'term_id',
            'terms'    => $catId,
            // 'terms'    => 18,
            'include_children' => true, // Bao gồm cả danh mục con
        ),
    ),  
    'meta_query' => array(
        'relation' => 'AND',
        array(
            'key' => 'dia_diem_khoi_hanh', 
            'value' => '"' . $locationId . '"', // Đặt giá trị vào dấu ngoặc kép để giữ nguyên định dạng mảng
            'compare' => 'LIKE',
        )
    )
));

$final_data = array();
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
            // 'content' => $content,
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


echo json_encode($final_data);

?>
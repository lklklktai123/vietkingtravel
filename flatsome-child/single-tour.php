<?php
get_header();

$galerry = get_field('anh_lien_quan');
$lichtrinh = get_field('lich_trinh_gr');
$cacdieukhoan = get_field('cac_dieu_khoan');
$giatour = get_field('tour_price');
$diemkhoihanh = get_field('dia_diem_khoi_hanh');
$diemden = get_field('diem_den');
$thoiluong = get_field('thoi_luong');
$ngaykhoihanh = get_field('ngay_khoi_hanh');
$khachsan = get_field('khach_san');
$phonenumber = get_field('tour_phone', 'option');
$banggia = get_field('bang_gia_tour');
$banner_sidebar = get_field('banner_sidebar_tour', 'option');
$voucher = get_field('khuyen_mai');

$tour_id = get_the_ID();
$data_tour_khac = new WP_Query(
    array(
        'post_type' => 'tour',
        'post__not_in' => array($tour_id),
        'post_per_page' => 8,
    )
);



// echo "<pre>";
// print_r($galerry);
// echo "</pre>";
?>
<div class="find-tour-wp search-page-tour">
    <div class="search-page-tour_box">
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
                        <option class="option-input-text" value="3">Từ Đ Nẵng</option>
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
<section class="sec-tour">
    <div class="tour-post-tt">
        <h1><?php the_title(); ?></h1>
    </div>
    <div class="tour-container">
        <div class="tour-container_content">
            <?php if ($galerry) { ?>
                <div class="tour-post-galerry">
                    <div class="tour-post-slider-for">
                        <?php foreach ($galerry as $img_g) { ?>
                            <img src="<?php echo $img_g ?>" alt="galerry-img">
                        <?php } ?>
                    </div>
                <?php } ?>
                <?php if ($galerry) { ?>
                    <div class="tour-post-slider-nav">
                        <?php foreach ($galerry as $img) { 
                            echo $img;
                            ?>
                            <img src="<?php echo $img ?>" alt="galerry-img">
                        <?php } ?>
                    </div>
                </div>
            <?php } else { ?>
                <div class="tour-avt">
                    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                </div>
            <?php } ?>
            <div class="tour-container_sidebar_mb">
            <div class="thong-tin-tour">
                <div class="gia-tour">
                    <p>Giá tour từ</p>
                    <span><?php echo number_format($giatour) ?> VNĐ</span>
                </div>
                <div class="thong-tin-ct-tour">
                    <?php if ($diemkhoihanh) { ?>
                        <p><i class="fa fa-house"></i> Địa điểm khởi hành: <strong> <span class="dau-phay">  <?php foreach($diemkhoihanh as $key => $val ){ ?> <?= $key==1 || $key==2 ? ', ' :'' ?><span > <?php if($val == 1){ echo'Hồ Chí Minh'; } elseif($val == 3){ echo'Đà Nẵng'; }else{ echo'Hà Nội';}   ?> </span><?php } ?></span> </strong></p>
                    <?php } ?>
                    <?php if ($diemden) { ?>
                        <p><i class="fa fa-plane-arrival"></i> Điểm đến: <strong><?php echo $diemden ?></strong></p>
                    <?php } ?>
                    <?php if ($thoiluong) { ?>
                        <p><i class="fa fa-clock"></i> Thời lượng: <strong><?php echo $thoiluong ?></strong></p>
                    <?php } ?>
                    <?php if ($ngaykhoihanh) { ?>
                        <p><i class="fa fa-calendar-days"></i> Khởi hành: <strong><?php echo $ngaykhoihanh ?></strong></p>
                    <?php } ?>
                    <?php if ($khachsan) { ?>
                        <p><i class="fa fa-hotel"></i> Khách sn: <strong><?php echo $khachsan ?></strong></p>
                    <?php } ?>
                </div>
                <div class="khuyen-mai-tour">
                    <?php if ($voucher) { ?>
                        <a class="khuyen-mai-tour-title-main" >
                            <h2 class="khuyen-mai-tour-title"><i class="fas fa-gift"></i><span>Khuyn Mãi</span></h2>
                        </a>
                        <?php foreach ($voucher as $key => $item) { ?>
                            <ul class="khuyen-mai-tour-contents">
                                <li>
                                    <span class="khuyen-mai-tour-icon"><i class="fas fa-check-circle"></i></span>
                                    <span class="khuyen-mai-tour-content-list"><?= $item['content']; ?></span>
                                </li>
                            </ul>
                    <?php }
                    } ?>
                </div><br>
                <div class="btn-dat-tour">
                    <a class="open-popup-mb" href="#"><i class="fa fa-cart-plus"></i> Đặt tour <br /><span>(Giữ chỗ ngay bây giờ ,thanh toán sau)</span></a>
                </div>
                <div class="btn-lien-he-tour">
                    <a href="tel:<?php echo $phonenumber; ?>"><i class="fa fa-phone"></i> Gọi đặt tour <br /><span>phục vụ 24/7</span></a>
                </div>
                <div class="tour-text-cn">
                    <span>Hoặc để lại SĐT - Vietkingtravel sẽ gọi lại cho bạn</span>
                </div>
                <div class="tour-form">
                    <?php echo do_shortcode('[contact-form-7 id="184" title="Form lin hệ đặt tour (sdt)"]'); ?>
                </div>
            </div>
            <?php if ($banggia) { ?>
                <div class="tour-price-table">
                    <div class="tour-tb">
                        <table style="border-collapse: collapse; width: 100%;">
                            <tbody>
                                <tr>
                                    <td style="width: 25%;">Ngày đi</td>
                                    <td style="width: 25%;">Khách sạn</td>
                                    <td style="width: 25%;">Giá Tour</td>
                                    <td style="width: 25%;">Số chỗ còn trống</td>
                                </tr>
                                <?php foreach ($banggia as $key => $item) { ?>
                                    <tr class="<?php echo ($key % 2 !== 0) ? 'bg-sl' : '' ?>">
                                        <td style="width: 25%;"><?php echo $item['bg_ngay_di']; ?></td>
                                        <td style="width: 25%;"><?php echo $item['bg_so_sao']; ?></td>
                                        <td style="width: 25%;"><?php echo $item['bg_gia_tour']; ?></td>
                                        <td style="width: 25%;"><?php echo $item['bg_so_cho_trong']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php } ?>
            <?php if ($banner_sidebar) { ?>
                <div class="tour-banner-sidebar">
                    <?php foreach ($banner_sidebar as $banner_item) { ?>
                        <div class="tour-banner-sidebar_item">
                            <a href="<?php echo $banner_item['banner_url'] ? $banner_item['banner_url'] : '#' ?>"><img src="<?php echo $banner_item['banner-sidebar-img'] ?>" alt="banner-sidebar"></a>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>

            <div class="tour-click-to-go">
                <p>
                    <span><a href="#giothieu">Giới thiu</a></span>
                    <?php if ($lichtrinh) { ?>
                        <span><a href="#lichtrinh">Lịch trình</a></span>
                    <?php } ?>
                    <?php if ($cacdieukhoan) { ?>
                        <span><a href="#baogomdieukhoan">Bao gồm điều khoản</a></span>
                    <?php } ?>
                </p>
            </div>
            <div id="giothieu" class="tour-gioi_thieu">
                <div class="tour_title">
                    <h2><span>Giới thiệu</span></h2>
                </div>
                <div class="tour-gioi_thieu_content">
                    <?php the_content(); ?>
                </div>
            </div>
            <?php if ($lichtrinh) { ?>
                <div id="lichtrinh" class="tour-lich_trinh">
                    <div class="tour_title">
                        <h2><span>Lịch trình</span></h2>
                    </div>
                    <div class="tour-lich_trinh_content">
                        <div class="accordion accordion-flush" id="accordionFlush">
                            <?php if ($lichtrinh) {
                                foreach ($lichtrinh as $key => $value) { ?>
                                    <!-- <div class="accordion-item">
                                        <h2 class="accordion-header tt-lichtrinh" id="heading<?php echo $key; ?>">
                                            <button class="accordion-button <?php echo $key == 0 ?  '' : 'collapsed'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $key; ?>" aria-expanded="<?php echo $key == 0 ?  'true' : 'false'; ?>" aria-controls="collapse<?php echo $key; ?>">
                                                <?php echo $value['tieu_de_lt']; ?>
                                            </button>
                                        </h2>
                                        <div id="collapse<?php echo $key; ?>" class="accordion-collapse nd-lichtrinh collapse <?php echo $key == 0 ?  'show' : ''; ?>" aria-labelledby="heading<?php echo $key; ?>" data-bs-parent="#myAccordion">
                                            <div class="accordion-body">
                                                <?php echo $value['noi_dung_lt']; ?>
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header tt-lichtrinh" id="heading<?php echo $key; ?>">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $key; ?>" aria-expanded="false" aria-controls="collapse<?php echo $key; ?>">
                                                <?php echo $value['tieu_de_lt']; ?>
                                            </button>
                                        </h2>
                                        <div id="collapse<?php echo $key; ?>" class="accordion-collapse nd-lichtrinh collapse show" aria-labelledby="heading<?php echo $key; ?>" data-bs-parent="#myAccordion">
                                            <div class="accordion-body">
                                                <?php echo $value['noi_dung_lt']; ?>
                                            </div>
                                        </div>
                                    </div>
                            <?php }
                            } ?>
                        </div>
                    </div>

                </div>
            <?php } ?>
            <?php if ($cacdieukhoan) { ?>
                <div id="baogomdieukhoan" class="tour-dieu_khoan">
                    <div class="tour_title">
                        <h2><span>Bao gồm điều khoản</span></h2>
                    </div>
                    <div class="tour-dieu_khoan_content"><?php echo $cacdieukhoan; ?></div>
                </div>
            <?php } ?>
        </div>
        <div class="tour-container_sidebar">
            <div class="thong-tin-tour">
                <div class="gia-tour">
                    <p>Giá tour từ</p>
                    <span><?php echo number_format($giatour) ?> VNĐ</span>
                </div>
                <div class="thong-tin-ct-tour">
                    <?php if ($diemkhoihanh) { ?>
                        <p><i class="fa fa-house"></i> Đa điểm khởi hành: <strong> <span class="dau-phay">  <?php foreach($diemkhoihanh as $key => $val ){ ?> <?= $key==1 || $key==2 ? ', ' :'' ?><span > <?php if($val == 1){ echo'Hồ Chí Minh'; } elseif($val == 3){ echo'à Nẵng'; }else{ echo'Hà Ni';}   ?> </span><?php } ?></span> </strong></p>
                    <?php } ?>
                    <?php if ($diemden) { ?>
                        <p><i class="fa fa-plane-arrival"></i> Điểm đến: <strong><?php echo $diemden ?></strong></p>
                    <?php } ?>
                    <?php if ($thoiluong) { ?>
                        <p><i class="fa fa-clock"></i> Thời lượng: <strong><?php echo $thoiluong ?></strong></p>
                    <?php } ?>
                    <?php if ($ngaykhoihanh) { ?>
                        <p><i class="fa fa-calendar-days"></i> Khởi hành: <strong><?php echo $ngaykhoihanh ?></strong></p>
                    <?php } ?>
                    <?php if ($khachsan) { ?>
                        <p><i class="fa fa-hotel"></i> Khách sạn: <strong><?php echo $khachsan ?></strong></p>
                    <?php } ?>
                </div>
                <div class="khuyen-mai-tour">
                    <?php if ($voucher) { ?>
                        <a class="khuyen-mai-tour-title-main" >
                            <h2 class="khuyen-mai-tour-title"><i class="fas fa-gift"></i><span>Khuyến Mãi</span></h2>
                        </a>
                        <?php foreach ($voucher as $key => $item) { ?>
                            <ul class="khuyen-mai-tour-contents">
                                <li>
                                    <span class="khuyen-mai-tour-icon"><i class="fas fa-check-circle"></i></span>
                                    <span class="khuyen-mai-tour-content-list"><?= $item['content']; ?></span>
                                </li>
                            </ul>
                    <?php }
                    } ?>
                </div><br>
                <div class="btn-dat-tour">
                    <a class="open-popup" href="#"><i class="fa fa-cart-plus"></i> Đặt tour <br /><span>(Giữ chỗ ngay bây giờ ,thanh toán sau)</span></a>
                </div>
                <div class="btn-lien-he-tour">
                    <a href="tel:<?php echo $phonenumber; ?>"><i class="fa fa-phone"></i> Gọi đặt tour <br /><span>phục vụ 24/7</span></a>
                </div>
                <div class="tour-text-cn">
                    <span>Hoặc để lại SĐT - Vietkingtravel sẽ gọi lại cho bạn</span>
                </div>
                <div class="tour-form">
                    <?php echo do_shortcode('[contact-form-7 id="184" title="Form liên hệ đặt tour (sdt)"]'); ?>
                </div>
            </div>
            <?php if ($banggia) { ?>
                <div class="tour-price-table">
                    <div class="tour-tb">
                        <table style="border-collapse: collapse; width: 100%;">
                            <tbody>
                                <tr>
                                    <td style="width: 25%;">Ngày đi</td>
                                    <td style="width: 25%;">Khách sạn</td>
                                    <td style="width: 25%;">Giá Tour</td>
                                    <td style="width: 25%;">Số chỗ còn trống</td>
                                </tr>
                                <?php foreach ($banggia as $key => $item) { ?>
                                    <tr class="<?php echo ($key % 2 !== 0) ? 'bg-sl' : '' ?>">
                                        <td style="width: 25%;"><?php echo $item['bg_ngay_di']; ?></td>
                                        <td style="width: 25%;"><?php echo $item['bg_so_sao']; ?></td>
                                        <td style="width: 25%;"><?php echo $item['bg_gia_tour']; ?></td>
                                        <td style="width: 25%;"><?php echo $item['bg_so_cho_trong']; ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php } ?>
            <?php if ($banner_sidebar) { ?>
                <div class="tour-banner-sidebar">
                    <?php foreach ($banner_sidebar as $banner_item) { ?>
                        <div class="tour-banner-sidebar_item">
                            <a href="<?php echo $banner_item['banner_url'] ? $banner_item['banner_url'] : '#' ?>"><img src="<?php echo $banner_item['banner-sidebar-img'] ?>" alt="banner-sidebar"></a>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<section class="tour-khac">
    <div class="tour-khac-tt tour_title">
        <h2><span>Các tour khác</span></h2>
    </div>
    <div class="tour-khac-box">
        <?php if ($data_tour_khac->have_posts()) {
            while ($data_tour_khac->have_posts()) {
                $data_tour_khac->the_post();
                $tour_id_lq = get_the_ID();
                $giatour_lq = get_field('tour_price', $tour_id_lq);
                $ngaykhoihanh_lq = get_field('ngay_khoi_hanh', $tour_id_lq);
                $thoiluong_lq = get_field('thoi_luong', $tour_id_lq);
                $title_lq = the_title();
        ?>
                <div class="tour-khac-item">
                    <div class="tour-item-img">
                        <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                    </div>
                    <div class="tour-item-content">
                        <h3><?php the_title() ?></h3>
                        <div class="tour-item-content_txt">
                            <div>
                                <p><span><?php echo number_format($giatour_lq); ?> VNĐ</span></p>
                                <p><i class="fas fa-calendar-alt"></i><span> <?php echo $ngaykhoihanh_lq; ?></span></p>
                                <p><i class="fas fa-clock"></i><span> <?php echo $thoiluong_lq; ?></span></p>
                            </div>
                            <a href="<?php the_permalink(); ?>"><span>Xem ngay</span></a>
                        </div>
                    </div>
                </div>
        <?php } wp_reset_postdata();
        }  ?>
    </div>
</section>
<div class="form-dat-tour-pp">
    <div class="btn-close-pp">
        X
    </div>
    <div class="form-title">
        <h2>ĐẶT TOUR ONLINE</h2>
    </div>
    <div class="form-tour-infor">
        <div class="form-tour-img">
            <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
        </div>
        <div class="form-tour-infor-ct">
            <p><strong><?php the_title(); ?></strong></p>
            <p><i class="fa fa-house"></i> Địa iểm khởi hành: <strong> <span class="dau-phay">  <?php foreach($diemkhoihanh as $key => $val ){ ?> <?= $key==1 || $key==2 ? ', ' :'' ?><span > <?php if($val == 1){ echo'Hồ Chí Minh'; } elseif($val == 3){ echo'Đà Nẵng'; }else{ echo'Hà Nội';}   ?> </span><?php } ?></span> </strong> </p>
            <p><i class="fa fa-plane-arrival"></i> Điểm đến: <strong><?php echo $diemden; ?></strong></p>
            <p><i class="fa fa-clock"></i> Thời lượng: <strong><?php echo $thoiluong; ?></strong></p>
            <p><i class="fa fa-calendar-days"></i> Khi hành: <strong><?php echo $ngaykhoihanh; ?></strong></p>
        </div>
    </div>
    <div class="form-popup-content">
        <?php echo do_shortcode('[contact-form-7 id="210" title="form đặt tour"]'); ?>
    </div>
</div>
<script>
    // Lấy các phần tử cần sử dụng
    var popup = document.querySelector('.form-dat-tour-pp');
    var overlay = document.querySelector('.overlay');

    // Xử lý sự kiện khi click vào nút đóng popup
    var closeButton = popup.querySelector('.btn-close-pp');
    closeButton.addEventListener('click', function() {
        closePopup();
    });

    // Xử lý sự kiện khi click vào overlay
    overlay.addEventListener('click', function(event) {
        if (event.target === overlay) { // Kiểm tra nếu nhấp chuột trực tiếp vào overlay
            closePopup();
        }
    });

    // Xử lý sự kiện khi click vào nút mở popup
    var openButton = document.querySelector('.open-popup');
    var openButtonMb = document.querySelector('.open-popup-mb');
    openButton.addEventListener('click', function() {   
        openPopup();
    });
    openButtonMb.addEventListener('click', function() {   
        openPopup();
    });

    // Hàm mở popup và thêm overlay
    function openPopup() {
        popup.classList.add('active');
        overlay.classList.add('active');
        document.body.style.overflow = 'hidden'; // Không cho phép cuộn trang

        console.log('123123');
    }

    // Hàm đóng popup và overlay
    function closePopup() {
        popup.classList.remove('active');
        overlay.classList.remove('active');
        document.body.style.overflow = 'auto'; // Cho phép cuộn trang
    }
</script>


<?php
get_footer();
?>
<!-- <div class="overlay"></div> -->

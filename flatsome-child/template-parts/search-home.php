<?php 
$banner = get_field('banner_infor');

?>


<div class="search-home-wp">
    <div class="logo-search">
        <!-- <img src="/wp-content/uploads/2023/07/logo-tet-viet-king-1-1.png" alt=""> -->
        <img src="<?= $banner['logo']['url'] ?>" alt="<?= $banner['logo']['alt'] ? $banner['logo']['alt'] : $banner['logo']['title'] ?>">
    </div>
    <div class="search-slogan">
        <!-- <p>Đặt tour và yên tâm tận hưởng chuyến i của bạn với sự đồng hành của đội ngũ
            chuyên gia du lịch <span>Vietkingtravel</span></p> -->
            <?= $banner['slogan'] ?>
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
                        </svg>Tìm tour ngay</span>
                </button>
            </div>
        </div>
    </form>
</div>
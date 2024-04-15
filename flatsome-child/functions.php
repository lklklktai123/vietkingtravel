<?php
// Add custom Theme Functions here
require_once 'short-code.php';
require_once 'create-custom-post-type.php';

function web_files()
{
    wp_enqueue_style('web_slick_styles', get_theme_file_uri('/libary/css/slick.css'));
    wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css');
    // wp_enqueue_style('boostrap-5', '//cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css');
    wp_enqueue_style('web_extra_styles', get_theme_file_uri('/assets/css/main.css'));
    wp_enqueue_style('web1_extra_styles', get_theme_file_uri('/assets/css/custom.css'));
    wp_enqueue_style('web2_extra_styles', get_theme_file_uri('/assets/css/contact.css'));
    wp_enqueue_style('web3_extra_styles', get_theme_file_uri('/assets/css/blog.css'));
}

add_action('wp_enqueue_scripts', 'web_files');

function file_custom_js()
{
    wp_enqueue_script('slick_slide_js', get_theme_file_uri('/libary/js/slick.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('slick_slide_js_custom', get_theme_file_uri('/libary/js/slider-home.js'), array('jquery'), '1.0', true);
//     wp_enqueue_script('main_js', get_theme_file_uri('/libary/js/main.js'), array('jquery'), '1.0', true);
    // wp_enqueue_script('boostrap-5', '//cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.min.js');
}
add_action('wp_footer', 'file_custom_js');

// Đăng ký trang cài đặt
function my_acf_options_page()
{
    // Cấu hình website
    acf_add_options_page(array(
        'page_title'    => 'Theme settings',
        'menu_title'    => 'Theme settings',
        'menu_slug'     => 'theme-settings',
        'capability'    => 'manage_options',
        'position'      => 3,
        'redirect'      => false
    ));

    acf_add_options_page(array(
        'page_title'    => 'Feedback Client',
        'menu_title'    => 'Feedback Client',
        'menu_slug'     => 'feedback-client',
        'capability'    => 'manage_options',
        'position'      => 4,
        'redirect'      => false,
        'icon_url'      => 'dashicons-buddicons-buddypress-logo' // Tên lớp CSS của Dashicon
    ));
    acf_add_options_page(array(
        'page_title'    => 'Logo khách hàng & Báo Chí',
        'menu_title'    => 'Logo khách hàng & Báo Chí',
        'menu_slug'     => 'logo-client-article',
        'capability'    => 'manage_options',
        'position'      => 5,
        'redirect'      => false,
        'icon_url'      => 'dashicons-grid-view' // Tên lớp CSS của Dashicon
    ));
}
add_action('acf/init', 'my_acf_options_page');
// function custom_search_filter($query) {
//     if (is_search() && $query->is_main_query()) {
//         $query->set('post_type','any'); // Tìm kiếm trong tất cả các post type
//         $query->set('s', get_search_query()); // Sử dụng từ khóa tìm kiếm
//         $query->set('posts_per_page', -1); // Hiển thị tất cả các kết quả

//         $query->set('fields', 'ids'); // Chỉ trả về ID của các bi viết

//         $query->set('meta_query', array(
//             'relation' => 'OR',
//             array(
//                 'key' => 'title',
//                 'value' => get_search_query(),
//                 'compare' => 'LIKE',
//             ),
//         ));
//     }
// }
// add_action('pre_get_posts', 'custom_search_filter');

function wp_breadcrumbs()
{
        $delimiter = '<i class="fa-solid fa-angle-right"></i>';
        $name = 'Home';
        $currentBefore = '<span class="current">';
        $currentAfter = '</span>';

        if (!is_home() && !is_front_page() || is_paged()) {

                global $post;
                $home = get_bloginfo('url');
                echo '<a href="' . $home . '">' . $name . '</a> ' . '<span class="icon_bread">' . $delimiter . '</span>' . ' ';

                if (is_tax()) {
                        $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
                        echo $currentBefore . $term->name . $currentAfter;
                } elseif (is_category()) {
                        global $wp_query;
                        $cat_obj = $wp_query->get_queried_object();
                        $thisCat = $cat_obj->term_id;
                        $thisCat = get_category($thisCat);
                        $parentCat = get_category($thisCat->parent);
                        if ($thisCat->parent != 0) echo (get_category_parents($parentCat, TRUE, ' ' . '<span class="icon_bread">' . $delimiter . '</span>' . ' '));
                        echo $currentBefore . '';
                        single_cat_title();
                        echo '' . $currentAfter;
                } elseif (is_day()) {
                        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . '<span class="icon_bread">' . $delimiter . '</span>' . ' ';
                        echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . '<span class="icon_bread">' . $delimiter . '</span>' . ' ';
                        echo $currentBefore . get_the_time('d') . $currentAfter;
                } elseif (is_month()) {
                        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . '<span class="icon_bread">' . $delimiter . '</span>' . ' ';
                        echo $currentBefore . get_the_time('F') . $currentAfter;
                } elseif (is_year()) {
                        echo $currentBefore . get_the_time('Y') . $currentAfter;
                } elseif (is_single()) {
                        $postType = get_post_type();
                        if ($postType == 'post') {
                                $cat = get_the_category();
                                $cat = $cat[0];
                                echo get_category_parents($cat, TRUE, ' ' . '<span class="icon_bread">' . $delimiter . '</span>' . ' ');
                        } elseif ($postType == 'portfolio') {
                                $terms = get_the_term_list($post->ID, 'portfolio-category', '', '###', '');
                                $terms = explode('###', $terms);
                                echo $terms[0] . ' ' . '<span class="icon_bread">' . $delimiter . '</span>' . ' ';
                        }
                        echo $currentBefore;
                        the_title();
                        echo $currentAfter;
                } elseif (is_page() && !$post->post_parent) {
                        echo $currentBefore;
                        the_title();
                        echo $currentAfter;
                } elseif (is_page() && $post->post_parent) {
                        $parent_id  = $post->post_parent;
                        $breadcrumbs = array();
                        while ($parent_id) {
                                $page = get_page($parent_id);
                                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                                $parent_id  = $page->post_parent;
                        }
                        $breadcrumbs = array_reverse($breadcrumbs);
                        foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . '<span class="icon_bread">' . $delimiter . '</span>' . ' ';
                        echo $currentBefore;
                        the_title();
                        echo $currentAfter;
                } elseif (is_search()) {
                        echo $currentBefore . __('Search Results for:', 'wpinsite') . ' &quot;' . get_search_query() . '&quot;' . $currentAfter;
                } elseif (is_tag()) {
                        echo $currentBefore . __('Post Tagged with:', 'wpinsite') . ' &quot;';
                        single_tag_title();
                        echo '&quot;' . $currentAfter;
                } elseif (is_author()) {
                        global $author;
                        $userdata = get_userdata($author);
                        echo $currentBefore . __('Author Archive', 'wpinsite') . $currentAfter;
                } elseif (is_404()) {
                        echo $currentBefore . __('Page Not Found', 'wpinsite') . $currentAfter;
                }
                if (get_query_var('paged')) {
                        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ' ';
                        echo ' ' . '<span class="icon_bread">' . $delimiter . '</span>' . ' ' . __('Page') . ' ' . get_query_var('paged');
                        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) echo ' ';
                }
        }
}

function search_only_titles($search, $wp_query)
{
  if (!empty($search) && !is_admin() && $wp_query->is_search) {
    global $wpdb;

    $search = preg_replace('/\s+/', ' ', $search); // Loại bỏ khoảng trắng tha
    $q = $wp_query->query_vars;
    $n = !empty($q['exact']) ? '' : '%';

    $search = $searchand = '';
    foreach ((array) $q['search_terms'] as $term) {
      $term = esc_sql($wpdb->esc_like($term));
      $search .= "{$searchand}($wpdb->posts.post_title LIKE '{$n}{$term}{$n}')";
      $searchand = ' AND ';
    }

    if (!empty($search)) {
      $search = " AND ({$search}) ";
      if (!is_user_logged_in()) {
        $search .= " AND ($wpdb->posts.post_password = '') ";
      }
    }

    // Thêm iều kiện chỉ search post_type là "post"
//     $search .= " AND ($wpdb->posts.post_type = 'post') ";

    return $search;
  }
  return $search;
}
add_filter('posts_search', 'search_only_titles', 10, 2);

function wpbsearchform( $form ) {
    $form = '<form role="search" method="get" id="searchform" action="' . home_url( '/' ) . '" >
        <div class="tour-search-box"><label class="screen-reader-text" for="s">' . __('Search for:') . '</label>
        <input type="text" value="' . get_search_query() . '" name="s" id="s" />
        <button type="submit" id="searchsubmit"><i class="fas fa-search"></i></button>
        </div>
    </form>';
    
    return $form;
}

add_filter( 'wpseo_canonical', '__return_false' );

remove_filter('template_redirect', 'redirect_canonical');

add_action('wp_footer','devvn_readmore_taxonomy_flatsome');
function devvn_readmore_taxonomy_flatsome(){
    if(is_tax('tour_category')):
        ?>
        <style>
            .cate-decs {
                overflow: hidden;
                position: relative;
                margin-bottom: 20px;
                padding-bottom: 25px;
            }
            .devvn_readmore_taxonomy_flatsome {
                text-align: center;
                cursor: pointer;
                position: absolute;
                z-index: 10;
                bottom: 0;
                /* width: 55%; */
                width: 100%;
                background: #fff;
            }
            .devvn_readmore_taxonomy_flatsome:before {
                height: 55px;
                margin-top: -45px;
                content: "";
                background: -moz-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,1) 100%);
                background: -webkit-linear-gradient(top, rgba(255,255,255,0) 0%,rgba(255,255,255,1) 100%);
                background: linear-gradient(to bottom, rgba(255,255,255,0) 0%,rgba(255,255,255,1) 100%);
                filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff00', endColorstr='#ffffff',GradientType=0 );
                display: block;
            }
            .devvn_readmore_taxonomy_flatsome a {
                color: #318A00;
                display: block;
            }
            .devvn_readmore_taxonomy_flatsome a:after {
                content: '';
                width: 0;
                right: 0;
                border-top: 6px solid #318A00;
                border-left: 6px solid transparent;
                border-right: 6px solid transparent;
                display: inline-block;
                vertical-align: middle;
                margin: -2px 0 0 5px;
            }
            .devvn_readmore_taxonomy_flatsome_less:before {
                display: none;
            }
            .devvn_readmore_taxonomy_flatsome_less a:after {
                border-top: 0;
                border-left: 6px solid transparent;
                border-right: 6px solid transparent;
                border-bottom: 6px solid #318A00;
            }
        </style>
        <script>
            (function($){
                $(window).on('load', function(){
                    if($('.cate-decs').length > 0){
                        var wrap = $('.cate-decs');
                        var current_height = wrap.height();
                        var your_height = 300;
                        if(current_height > your_height){
                            wrap.css('height', your_height+'px');
                            wrap.append(function(){
                                return '<div class="devvn_readmore_taxonomy_flatsome devvn_readmore_taxonomy_flatsome_show" ><a title="Xem thêm" href="javascript:void(0);">Xem thêm</a></div>';
                            });
                            wrap.append(function(){
                                return '<div class="devvn_readmore_taxonomy_flatsome devvn_readmore_taxonomy_flatsome_less" style="display: none;" ><a title="Thu gọn" href="javascript:void(0);">Thu gn</a></div>';
                            });
                            $('body').on('click','.devvn_readmore_taxonomy_flatsome_show', function(){
                                wrap.removeAttr('style');
                                $('body .devvn_readmore_taxonomy_flatsome_show').hide();
                                $('body .devvn_readmore_taxonomy_flatsome_less').show();
                            });
                            $('body').on('click','.devvn_readmore_taxonomy_flatsome_less', function(){
                                wrap.css('height', your_height+'px');
                                $('body .devvn_readmore_taxonomy_flatsome_show').show();
                                $('body .devvn_readmore_taxonomy_flatsome_less').hide();
                            });
                        }
                    }
                });
            })(jQuery);
        </script>
    <?php
    endif;
}


/*
 * Chống spam cho contact form 7
 * Author: levantoan.com
 * */
/*Thêm 1 field ẩn vào form cf7*/
add_filter('wpcf7_form_elements', 'devvn_check_spam_form_cf7');
function devvn_check_spam_form_cf7($html){
    $html = '<div style="display: none"><p><span class="wpcf7-form-control-wrap" data-name="devvn"><input size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" value="" type="text" name="devvn"></span></p></div>' . $html;
    return $html;
}
/*Kiểm tra form đó mà được nhập giá trị thì là spam*/
add_action('wpcf7_posted_data', 'devvn_check_spam_form_cf7_vaild');
function devvn_check_spam_form_cf7_vaild($posted_data) {
    $submission = WPCF7_Submission::get_instance();
    if (!empty($posted_data['devvn'])) {
        $submission->set_status( 'spam' );
        $submission->set_response( 'You are Spamer' );
    }
    unset($posted_data['devvn']);
    return $posted_data;
}

// Tắt thông báo cập nhật của plugin (CF7)
function filter_plugin_updates( $value ) {
    unset( $value->response['contact-form-7/wp-contact-form-7.php'] );
    return $value;
}
add_filter( 'site_transient_update_plugins', 'filter_plugin_updates' );
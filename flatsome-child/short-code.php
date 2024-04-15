<?php
function short_code_search_home_mobile(){
    get_template_part('template-parts/search', 'home');
}
add_shortcode("short_code_search_home_mobile", "short_code_search_home_mobile");

function short_code_search_home()
{
    get_template_part('template-parts/search', 'home');
}
add_shortcode("short_code_search_home", "short_code_search_home");

function short_code_slider_home()
{
    get_template_part('template-parts/slider', 'home');
}
add_shortcode("short_code_slider_home", "short_code_slider_home");

function short_code_tour_item($atts)
{
    $default = array(
        'idcat' => 17,
    );
    $idCatHandler = shortcode_atts($default, $atts);

    // Truyền biến `idCat` vào template
    $idCat = $idCatHandler['idcat'];
    ob_start();
    include(locate_template('template-parts/tour-item.php'));
    $output = ob_get_clean();

    return $output;
}
add_shortcode("short_code_tour_item", "short_code_tour_item");
function short_code_feedback_client()
{
    get_template_part('template-parts/slider', 'feedback');
}
add_shortcode("short_code_feedback_client", "short_code_feedback_client");

function short_code_logo($atts)
{
    $default = array(
        'name' => 'client',
    );
    $nameHandler = shortcode_atts($default, $atts);

    // Truyền biến `name` vào template
    $name = $nameHandler['name'];
    ob_start();
    include(locate_template('template-parts/slider-logo.php'));
    $output = ob_get_clean();

    return $output;
}
add_shortcode('short_code_logo', 'short_code_logo');

function short_code_log()
{
    get_template_part('template-parts/log', 'home');
}
add_shortcode("short_code_log", "short_code_log");

function short_code_banner_img()
{
    get_template_part('template-parts/banner', 'img');
}
add_shortcode("short_code_banner_img", "short_code_banner_img");

function short_code_breadcrumbs_contact()
{
    get_template_part('template-parts/breadcrumbs', 'contact');
}
add_shortcode("short_code_breadcrumbs_contact", "short_code_breadcrumbs_contact");

function short_code_find_tour()
{
    get_template_part('template-parts/find', 'tour');
}
add_shortcode("short_code_find_tour", "short_code_find_tour");

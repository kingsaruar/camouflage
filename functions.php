<?php
/**
 * @package WordPress
 * @subpackage Camouflage_Theme
 */

include_once('includes/cf_pages.php');
include_once('includes/cf_widgets.php');

automatic_feed_links();

if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'before_widget' => '<li id="%1$s" class="widget %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));
}

function register_my_menus() {	
	register_nav_menus(
		array(
		'header-menu' => __( 'Header Menu' )
		)
	);
} 

add_action( 'init', 'register_my_menus' );


function box_func($atts,$content = null) {
	extract(shortcode_atts(array(
		'color' => '#F5F5F5',
		'border_color'=>'#A62500',
	), $atts));
	
	return "<div class='box' style='background-color:{$color};border: solid {$border_color} 1px'>".do_shortcode($content)."</div>";
}
add_shortcode('box', 'box_func');

function line_func($atts) {
	extract(shortcode_atts(array(
		'type' => 'normal',
	), $atts));
	
	if('back'==$type) return "<div class='line'><span><a href='#'>Back to top</a></span></div>";
	else 		  	  return "<div class='line'></div>";
}
add_shortcode('line', 'line_func');

function icon_func($atts) {
	extract(shortcode_atts(array(
		'type' => 'right',
	), $atts));
	
	return "<div class='icon'><img src='".get_bloginfo('stylesheet_directory')."/images/icons/{$type}.png'></div>";
}
add_shortcode('icon', 'icon_func');


function cf_one_third( $atts, $content = null ) {
   return '<div class="one_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_third', 'cf_one_third');

function cf_one_third_last( $atts, $content = null ) {
   return '<div class="one_third last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_third_last', 'cf_one_third_last');

function cf_two_third( $atts, $content = null ) {
   return '<div class="two_third">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_third', 'cf_two_third');

function cf_two_third_last( $atts, $content = null ) {
   return '<div class="two_third last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('two_third_last', 'cf_two_third_last');

function cf_one_half( $atts, $content = null ) {
   return '<div class="one_half">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_half', 'cf_one_half');

function cf_one_half_last( $atts, $content = null ) {
   return '<div class="one_half last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_half_last', 'cf_one_half_last');

function cf_one_fourth( $atts, $content = null ) {
   return '<div class="one_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fourth', 'cf_one_fourth');

function cf_one_fourth_last( $atts, $content = null ) {
   return '<div class="one_fourth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_fourth_last', 'cf_one_fourth_last');

function cf_three_fourth( $atts, $content = null ) {
   return '<div class="three_fourth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fourth', 'cf_three_fourth');

function cf_three_fourth_last( $atts, $content = null ) {
   return '<div class="three_fourth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('three_fourth_last', 'cf_three_fourth_last');

function cf_one_fifth( $atts, $content = null ) {
   return '<div class="one_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_fifth', 'cf_one_fifth');

function cf_one_fifth_last( $atts, $content = null ) {
   return '<div class="one_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_fifth_last', 'cf_one_fifth_last');

function cf_two_fifth( $atts, $content = null ) {
   return '<div class="two_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('two_fifth', 'cf_two_fifth');

function cf_two_fifth_last( $atts, $content = null ) {
   return '<div class="two_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('two_fifth_last', 'cf_two_fifth_last');

function cf_three_fifth( $atts, $content = null ) {
   return '<div class="three_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('three_fifth', 'cf_three_fifth');

function cf_three_fifth_last( $atts, $content = null ) {
   return '<div class="three_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('three_fifth_last', 'cf_three_fifth_last');

function cf_four_fifth( $atts, $content = null ) {
   return '<div class="four_fifth">' . do_shortcode($content) . '</div>';
}
add_shortcode('four_fifth', 'cf_four_fifth');

function cf_four_fifth_last( $atts, $content = null ) {
   return '<div class="four_fifth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('four_fifth_last', 'cf_four_fifth_last');

function cf_one_sixth( $atts, $content = null ) {
   return '<div class="one_sixth">' . do_shortcode($content) . '</div>';
}
add_shortcode('one_sixth', 'cf_one_sixth');

function cf_one_sixth_last( $atts, $content = null ) {
   return '<div class="one_sixth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('one_sixth_last', 'cf_one_sixth_last');

function cf_five_sixth( $atts, $content = null ) {
   return '<div class="five_sixth">' . do_shortcode($content) . '</div>';
}
add_shortcode('five_sixth', 'cf_five_sixth');

function cf_five_sixth_last( $atts, $content = null ) {
   return '<div class="five_sixth last">' . do_shortcode($content) . '</div><div class="clearboth"></div>';
}
add_shortcode('five_sixth_last', 'cf_five_sixth_last');

//add_filter("the_content","get_the_content");


add_filter("the_excerpt","get_the_excerpt");

function new_excerpt_more($more) {
    global $post;
	return '<a href="'. get_permalink($post->ID) . '">' . '  [Read More...]' . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/*
function get_blog_page($content)
{
	if(stristr($content,'<!--Camouflage Blog Page, Dont Remove This-->'))
	{
		echo "Ok...";
		//global $wpdb;
		
	}
	else
	return $content;
}

add_filter("the_content","get_blog_page");
*/

function show_posts_nav() {
global $wp_query;
return ($wp_query->max_num_pages > 1);
}

?>

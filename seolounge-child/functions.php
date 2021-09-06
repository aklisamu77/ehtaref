<?php
/**
 * Child functions.php
 *
 * @package SEOLounge Child
 */

/**
 * Enqueue child theme css.
 */
/* add arabic style*/
// exlode from translate 
add_filter( 'trp_no_translate_selectors', 'trpc_no_stranslate_selectors', 10, 2);
function trpc_no_stranslate_selectors($selectors_array, $language){
    $selectors_array[] = '.do_not_translate_css_class';
    return $selectors_array;
}

function add_theme_scripts() {
  //wp_enqueue_style( 'style', get_stylesheet_uri() );
  global $TRP_LANGUAGE;
  if ( $TRP_LANGUAGE== 'ar')
		  wp_enqueue_style( 'arabic_style', get_stylesheet_directory_uri() . '/css/arabic_style.css', array(), '1.3', 'all');

}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' , 2, 10000);
/* show_login_signup_links */
add_shortcode('show_login_signup_links','show_login_signup_links_handler');
function show_login_signup_links_handler(){
	if (is_user_logged_in()) return ;
	
	global $post;
	$active_login = $active_signup = '';
    if ( $post->post_name=='my-account')
		$active_login = 'active';
	else if ( $post->post_name=='registration')
		$active_signup = 'active';
  return get_template_part( 'template-parts/login_btns',
                              null,
                              array( 
                                      'active_login' => $active_login,
                                      'active_signup' => $active_signup,
                                      
                                      ) 
        );
 
}
add_shortcode('login_count_width','login_count_width_handler');
function login_count_width_handler(){
	return (is_user_logged_in()) ? '' : 'col-md-6  col-md-offset-3';
}
function seolounge_child_enqueue_styles() {
	wp_enqueue_style(
		'child-style',
		get_stylesheet_directory_uri() . '/style.css?v=5',
		array(),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'seolounge_child_enqueue_styles' );

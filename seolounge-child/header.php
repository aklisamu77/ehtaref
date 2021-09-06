<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package seolounge
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<?php
	$data_nicescroll_cursorcolor = ( ! empty( seolounge_global_var( 'scrollbar_color', 'color', true ) ) ) ? seolounge_global_var( 'scrollbar_color', 'color', true ) : '';
	$data_nicescroll_cursorwidth = ( ! empty( seolounge_global_var( 'scrollbar_width', 'width', true ) ) ) ? seolounge_global_var( 'scrollbar_width', 'width', true ) : '';
	$scrollbar_switch            = ( ! empty( seolounge_global_var( 'scrollbar_switch', '', false ) ) ) ? 'infinity-scroll' : '';
?>


<?php if ( ( 'default' != get_post_meta( get_the_id(), 'selectheader', true ) ) && ( get_post_meta( get_the_id(), 'selectheader', true ) ) ) { ?>
	<body <?php echo esc_html( $scrollbar_switch ); ?> <?php body_class(); ?> data-page-transition="<?php echo esc_attr( seolounge_global_var( 'page_transition_switch', '', false ) ); ?>" data-header-style="header-style-<?php echo esc_attr( get_post_meta( get_the_id(), 'selectheader', true ) ); ?>" data-nicescroll-cursorcolor="<?php echo esc_attr( $data_nicescroll_cursorcolor ); ?>" data-nicescroll-cursorwidth="<?php echo esc_attr( $data_nicescroll_cursorwidth ); ?>">
<?php } elseif ( ( seolounge_global_var( 'header-style', '', false ) ) ) { ?>
	<body <?php echo esc_html( $scrollbar_switch ); ?> <?php body_class(); ?> data-page-transition="<?php echo esc_attr( seolounge_global_var( 'page_transition_switch', '', false ) ); ?>" data-header-style="<?php echo esc_attr( seolounge_global_var( 'header-style', '', false ) ); ?>" data-nicescroll-cursorcolor="<?php echo esc_attr( $data_nicescroll_cursorcolor ); ?>" data-nicescroll-cursorwidth="<?php echo esc_attr( $data_nicescroll_cursorwidth ); ?>">
<?php } else { ?>
	<body <?php echo esc_html( $scrollbar_switch ); ?> <?php body_class(); ?> data-page-transition="0" data-nicescroll-cursorcolor="09276f" data-nicescroll-cursorwidth="10px">
<?php } ?>
<?php wp_body_open(); ?>

	<?php
	if ( ! is_user_logged_in() && ! empty( seolounge_global_var( 'coming_soon_switch', '', false ) ) ) {
		include get_parent_theme_file_path( 'coming-soon.php' );
		die;
	} elseif ( ! is_user_logged_in() && ! empty( seolounge_global_var( 'maintenance_mode_switch', '', false ) ) ) {
		include get_parent_theme_file_path( 'maintenance.php' );
		die;
	} elseif ( ! is_user_logged_in() && ! empty( seolounge_global_var( 'coming_soon_switch', '', false ) ) && ! empty( seolounge_global_var( 'maintenance_mode_switch', '', false ) ) ) {
		include get_parent_theme_file_path( 'coming-soon.php' );
		die;
	}
	?>

	<?php if ( seolounge_global_var( 'preloader_switch', '', false ) ) { ?>
		<!-- preloader -->
		<div class="preloader" data-preloader-timeout="<?php echo esc_attr( seolounge_global_var( 'preloader_timeout', '', false ) ); ?>">
			<div class="table">
				<div class="table-cell">
					<?php
					if ( ! empty( seolounge_global_var( 'preloader_style', '', false ) ) ) {
						include get_parent_theme_file_path( 'inc/preloader/' . seolounge_global_var( 'preloader_style', '', false ) . '.php' );
					}
					?>
				</div>
			</div>
		</div>
		<!-- preloader -->
	<?php } ?>

	<!-- overlay -->
	<div class="overlay"></div>
	<!-- overlay -->

	<?php if ( seolounge_global_var( 'page_transition_switch', '', false ) ) { ?>
		<!-- page-transition-layer -->
		<div class="page-transition-layer i-am-active">
			<svg class="page-transition-layer-spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
				<circle class="page-transition-layer-spinner-path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
			</svg>
		</div>
		<!-- page-transition-layer -->
	<?php } ?>

	<!-- scrollup -->
	<?php if ( seolounge_global_var( 'scroll_to_top_switch', '', false ) ) { ?>
		<?php if ( ! empty( seolounge_global_var( 'scroll_to_top_direction', '', false ) ) ) : ?>
			<div class="scrollup <?php echo esc_attr( seolounge_global_var( 'scroll_to_top_direction', '', false ) ); ?>">
		<?php else : ?>
			<div class="scrollup left">
		<?php endif; ?>
			<i class="fa fa-angle-up"></i>
		</div>
	<?php } ?>
	<!-- scrollup -->

	<?php if ( seolounge_global_var( 'gdpr_notice_switch', '', false ) ) { ?>
		<!-- gdpr-notice -->
		<div class="gdpr-notice alert alert-dismissible">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
			<!-- row -->
			<div class="row">
				<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12 text-left">
					<p><?php echo esc_html( seolounge_global_var( 'gdpr_notice_content', '', false ) ); ?></p>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 text-center">
					<a class="btn" href="<?php echo esc_url( seolounge_global_var( 'gdpr_notice_button_link', '', false ) ); ?>"><?php echo esc_html( seolounge_global_var( 'gdpr_notice_button_text', '', false ) ); ?></a>
				</div>
			</div>
			<!-- row -->
		</div>
		<!-- gdpr-notice -->
	<?php } ?>

	<!-- radiantthemes-website-layout -->
	<?php if ( class_exists( 'ReduxFrameworkPlugin' ) ) { ?>
		<?php if ( 'full-width' === seolounge_global_var( 'layout_type', '', false ) ) { ?>
			<div class="radiantthemes-website-layout full-width">
		<?php } elseif ( 'boxed' === seolounge_global_var( 'layout_type', '', false ) ) { ?>
			<div class="radiantthemes-website-layout boxed">
		<?php } ?>
	<?php } else { ?>
		<div id="page" class="site full-width">
	<?php } ?>

		<?php
		if ( ! class_exists( 'ReduxFrameworkPlugin' ) ) {
			include get_parent_theme_file_path( 'inc/header/header-style-default.php' );
		} else {
			if ( is_404() || is_search() ) {
				if ( ( seolounge_global_var( 'header-style', '', false ) ) ) {
					include get_parent_theme_file_path( 'inc/header/' . seolounge_global_var( 'header-style', '', false ) . '.php' );
				} else {
					include get_parent_theme_file_path( 'inc/header/header-style-default.php' );
				}
			} else {
				if ( ( 'default' != get_post_meta( $post->ID, 'selectheader', true ) ) && ( get_post_meta( $post->ID, 'selectheader', true ) ) ) {
					include get_theme_file_path( 'inc/header/header-style-' . get_post_meta( $post->ID, 'selectheader', true ) . '.php' );
				} elseif ( ( seolounge_global_var( 'header-style', '', false ) ) ) {
					include get_theme_file_path( 'inc/header/' . seolounge_global_var( 'header-style', '', false ) . '.php' );
				} else {
					include get_parent_theme_file_path( 'inc/header/header-style-default.php' );
				}
			}
		}
		?>

		<!-- hamburger-menu-holder -->
		<div class="hamburger-menu-holder hidden">
			<!-- hamburger-menu -->
			<div class="hamburger-menu">
				<!-- hamburger-menu-close -->
				<div class="hamburger-menu-close">
					<div class="hamburger-menu-close-lines"><span></span><span></span></div>
				</div>
				<!-- hamburger-menu-close -->
				<!-- hamburger-menu-main -->
				<div class="row hamburger-menu-main">
					<?php dynamic_sidebar( 'seolounge-hamburger-sidebar' ); ?>
				</div>
				<!-- hamburger-menu-main -->
			</div>
			<!-- hamburger-menu -->
		</div>
		<!-- hamburger-menu-holder -->

			<?php
			$team_page_info           = '';
			$rt_team_bannercheck      = '';
			$portfolio_page_info      = '';
			$rt_portfolio_bannercheck = '';
			$case_studies_page_info   = '';
			$rt_case_studies_banner   = '';
			$rt_shop_banner           = '';
			$posts_page_id            = '';
			$rt_posts_page_bann       = '';

			if ( is_singular( 'team' ) || is_tax( 'profession' ) ) {
				$team_page_info      = get_page_by_path( 'team', OBJECT, 'page' );
				$team_page_id        = $team_page_info->ID;
				$rt_team_bannercheck = get_post_meta( $team_page_id, 'bannercheck', true );
			} elseif ( is_singular( 'portfolio' ) || is_tax( 'portfolio-category' ) ) {
				$portfolio_page_info      = get_page_by_path( 'portfolio', OBJECT, 'page' );
				$portfolio_page_id        = $portfolio_page_info->ID;
				$rt_portfolio_bannercheck = get_post_meta( $portfolio_page_id, 'bannercheck', true );
			} elseif ( is_singular( 'case-studies' ) || is_tax( 'case-study-category' ) ) {
				$case_studies_page_info = get_page_by_path( 'case-studies', OBJECT, 'page' );
				$case_studies_page_id   = $case_studies_page_info->ID;
				$rt_case_studies_banner = get_post_meta( $case_studies_page_id, 'bannercheck', true );
			} elseif ( class_exists( 'woocommerce' ) && ( is_shop() || is_singular( 'product' ) || is_tax( 'product_cat' ) || is_tax( 'product_tag' ) )
			) {
				$shop_page_info = get_page_by_path( 'shop', OBJECT, 'page' );
				$shop_page_id   = $shop_page_info->ID;
				$rt_shop_banner = get_post_meta( $shop_page_id, 'bannercheck', true );
			} elseif ( is_home() || is_search() || is_category() || is_archive() || is_tag() || is_author() || is_singular( 'post' ) || is_attachment() ) {
				$posts_page_id      = get_option( 'page_for_posts' );
				$rt_posts_page_bann = get_post_meta( $posts_page_id, 'bannercheck', true );
			}

			$rt_bannercheck = get_post_meta( get_the_id(), 'bannercheck', true );
			?>
			<?php
			if ( ( seolounge_global_var( 'header-style', '', false ) ) ) {
				if (
					in_array( $rt_bannercheck, array( 'bannerbreadcumbs', 'banneronly', 'breadcumbsonly', 'nobannerbreadcumbs' ), true ) ||
					in_array( $rt_team_bannercheck, array( 'bannerbreadcumbs', 'banneronly', 'breadcumbsonly', 'nobannerbreadcumbs' ), true ) ||
					in_array( $rt_portfolio_bannercheck, array( 'bannerbreadcumbs', 'banneronly', 'breadcumbsonly', 'nobannerbreadcumbs' ), true ) ||
					in_array( $rt_case_studies_banner, array( 'bannerbreadcumbs', 'banneronly', 'breadcumbsonly', 'nobannerbreadcumbs' ), true ) ||
					in_array( $rt_shop_banner, array( 'bannerbreadcumbs', 'banneronly', 'breadcumbsonly', 'nobannerbreadcumbs' ), true ) ||
					in_array( $rt_posts_page_bann, array( 'bannerbreadcumbs', 'banneronly', 'breadcumbsonly', 'nobannerbreadcumbs' ), true )
				) {
					require get_parent_theme_file_path( '/inc/header/banner.php' );
				} else {
					require get_parent_theme_file_path( '/inc/header/theme-banner.php' );
				}
			} else {
				require get_parent_theme_file_path( '/inc/header/banner-default.php' );
			}
			?>


		<!-- #page -->
		<div id="page" class="site">
			<!-- #content -->
			<div id="content" class="site-content">

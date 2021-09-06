<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package seolounge
 */

?>

        	</div>
        	<!-- #content -->
        </div>
        <!-- #page -->

        <?php
        if ( ! class_exists( 'ReduxFrameworkPlugin' ) ) {
            include get_parent_theme_file_path( 'inc/footer/footer-style-default.php' );
        } else {
        	if ( ( seolounge_global_var( 'footer-style', '', false ) ) ) {
        		include get_theme_file_path( 'inc/footer/' . seolounge_global_var( 'footer-style', '', false ) . '.php' );
        	} else {
        		include get_parent_theme_file_path( 'inc/footer/footer-style-default.php' );
        	}
        }
        ?>

    </div>
    <!-- radiantthemes-website-layout -->

<?php wp_footer(); ?>
<?php
//var_dump(get_stylesheet_directory());
?>
</body>
</html>

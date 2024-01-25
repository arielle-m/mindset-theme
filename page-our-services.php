<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif;

		endwhile; // End of the loop.
		?>

		<?php
		$args = array(
			'post_type'      => 'fwd-service',
			'posts_per_page' => -1,
			'orderby'		 => 'title',
			'order'		     => 'ASC',
		);
		
		$query = new WP_Query( $args );
		
		if ( $query -> have_posts() ){
			echo '<section>';

			while ( $query -> have_posts() ) {
				$query -> the_post();
				echo '<a href="' . get_site_url() . get_the_ID() . '">';
				the_title();
				echo '</a>';

			}
			wp_reset_postdata();
			
			echo '</section>';
		} 
		?>

		<?php
		$args = array(
			'post_type'      => 'fwd-service',
			'posts_per_page' => -1,
			'orderby'		 => 'title',
			'order'		     => 'ASC',
		);
		
		$query = new WP_Query( $args );
		
		if ( $query -> have_posts() ){
			echo '<section>';

			while ( $query -> have_posts() ) {
				$query -> the_post();
				echo '<h2>';
				the_title();
				echo '</h2>';

				if ( function_exists( 'get_field' ) ) {

					if ( get_field( 'service' ) ) {
						echo '<p>';
						the_field( 'service' );
						echo '</p>';
					}
				}
			}
			wp_reset_postdata();
			
			echo '</section>';
		} 

		// if ( $query -> have_posts() && function_exists( 'get_field' ) ){
		// 	if ( get_field( 'service' ) ) {
		// 		echo '<section>';

		// 		while ( $query -> have_posts() ) {
		// 			$query -> the_post();
		// 			echo '<h2>';
		// 			the_title();
		// 			echo '</h2>';

		// 			echo '<p>';
		// 			the_field( 'service' );
		// 			echo '</p>';
		// 		}
				
		// 	}
		// 	wp_reset_postdata();
			
		// 	echo '</section>';
		// } 

		?>

	</main><!-- #primary -->

<?php
get_sidebar();
get_footer();

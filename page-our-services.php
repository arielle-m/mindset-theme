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

	<?php while ( have_posts() ) : the_post(); ?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header>

			<div class="entry-content">
				<?php the_content(); ?>

				<?php 
				$args = array(
					'post_type'      => 'fwd-service',
					'posts_per_page' => -1,
					'orderby'		 => 'title',
					'order'		     => 'ASC',
				);
				
				$query = new WP_Query( $args );
				
				// Output Navigation
				if ( $query -> have_posts() ){
					while ( $query -> have_posts() ) {
						$query -> the_post();

						echo '<a href="#' . esc_attr( get_the_ID() ) . '">'. esc_html( get_the_title() ) .'</a>';
	
					}
					wp_reset_postdata();
			
					while ( $query -> have_posts() ) {
						$query -> the_post();
		
						if ( function_exists( 'get_field' ) ) {
							if ( get_field( 'service' ) ) {
								echo '<h2>'. esc_html( get_the_title() ) .'</h2>';
								the_field( 'service' );
							}
						}
					}
					wp_reset_postdata();
				} 
				?>
			</div>

		</article>

		<?php endwhile; ?>
	</main><!-- #primary -->

<?php
get_sidebar();
get_footer();

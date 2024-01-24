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
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			</header><!-- .entry-header -->

			<?php fwd_post_thumbnail(); ?>

			<div class="entry-content">
				<?php
				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fwd' ),
						'after'  => '</div>',
					)
				);
				?>
			</div><!-- .entry-content -->
			<?php
			if ( function_exists( 'get_field' ) ) {

				if ( get_field( 'bottom_section' ) ) {
					echo '<p>';
					the_field( 'bottom_section' );
					echo '</p>';
				}

				if ( get_field( 'bottom_email' ) ) {
					echo '<p>';
					the_field( 'bottom_email' );
					echo '</p>';
				}
			}

		endwhile; // End of the loop.
		?>
		</article><!-- #post-<?php the_ID(); ?> -->

		

	</main><!-- #primary -->

<?php
get_sidebar();
get_footer();

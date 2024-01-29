<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package FWD_Starter_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<header class="page-header">
			<?php
			the_archive_title( '<h1 class="page-title">', '</h1>' );
			the_archive_description( '<div class="archive-description">', '</div>' );
			?>
		</header><!-- .page-header -->
		
		<?php 
		$args = array(
			'post_type'			=> 'fwd-work',
			'posts_per_page'	=> -1,
			// adding in the tax query
			'tax_query'			=> array(
				array(
					'taxonomy' 	=> 'fwd-work-category',
					'field'		=> 'slug',
					// filters work posts by 'web'
					'terms'		=> 'web',
				)
			)
		);
		$query = new WP_Query( $args );
		if ( $query -> have_posts() ) {
			echo '<section><h2>'. esc_html__( 'Web', 'fwd' ).'</h2>';
			while ( $query -> have_posts() ) {
				$query -> the_post();
				// after the base, we now do the page formatting / html structure below
				?>
			
				<article>
					<a href="<?php the_permalink(); ?>">
						<h2><?php the_title(); ?></h2>
						<?php the_post_thumbnail( 'large' ); ?>
					</a>
					<?php the_excerpt(); ?>
				</article>

				<?php
			}
			// need this bc it would return the wrong data
			// returns the data of the previous title it looked at, not the current one
			wp_reset_postdata();

			echo '</section>';
		}
		?>
		<?php 
		$args = array(
			'post_type'			=> 'fwd-work',
			'posts_per_page'	=> -1,
			'tax_query'			=> array(
				array(
					'taxonomy' 	=> 'fwd-work-category',
					'field'		=> 'slug',
					'terms'		=> 'photo',
				)
			)
		);
		$query = new WP_Query( $args );
		if ( $query -> have_posts() ) {
			echo '<section><h2>'. esc_html__( 'Photo', 'fwd' ).'</h2>';
			while ( $query -> have_posts() ) {
				$query -> the_post();
				// after the base, we now do the page formatting / html structure below
				?>
			
				<article>
					<a href="<?php the_permalink(); ?>">
						<h2><?php the_title(); ?></h2>
						<?php the_post_thumbnail( 'large' ); ?>
					</a>
					<?php the_excerpt(); ?>
				</article>

				<?php
			}
			// need this bc it would return the wrong data
			// returns the data of the previous title it looked at, not the current one
			wp_reset_postdata();

			echo '</section>';
		}
		?>

	</main><!-- #primary -->

<?php
get_footer();

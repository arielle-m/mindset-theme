<?php
/**
 * The template for displaying the Front Page
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

			<section class="home-intro">
				<h1><?php the_title(); ?></h1>
				<?php the_post_thumbnail( 'large' ); ?>
				<?php 
				if ( function_exists( 'get_field' ) ) {
					if ( get_field( 'top_section' ) ) {
						the_field( 'top_section' );
					}
				}
				?>
			</section>

			<section class="home-work">
				<h2>Featured Works</h2>
				<?php 
					$args = array(
						'post_type'			=> 'fwd-work',
						'posts_per_page'	=> 4,
						'tax_query'			=> array(
							array(
								'taxonomy' => 'fwd-featured',
								'field'    => 'slug',
								'terms'    => 'front-page'
							)
						)
					);
					$query = new WP_Query( $args );
					if ( $query -> have_posts() ) {
						while ( $query -> have_posts() ) {
							$query -> the_post();
							?>
						
							<article>
								<a href="<?php the_permalink(); ?>">
									<h3><?php the_title(); ?></h3>
									<?php the_post_thumbnail( 'medium' ); ?>
								</a>
							</article>

							<?php
						}
						// need this bc it would return the wrong data
						// returns the data of the previous title it looked at, not the current one
						wp_reset_postdata();
					}
					?>
			</section>

			<section class="home-work"></section>
			<?php
				// Add an ACF relationship field and assign it to the Home page
				if ( function_exists( 'get_field' ) ) : 
					$featured_works = get_field('featured_works');
					if ($featured_works) :
						foreach($featured_works as $post) :
							setup_postdata($post); 
							?>
							<article class="front-portfolio">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail('medium'); ?>
									<h3><?php the_title(); ?></h3>
								</a>
							</article>
							<?php 
						endforeach;
						wp_reset_postdata();
					endif;
				endif;
			?>
			<section class="home-left"></section>
			<?php
			if ( function_exists( 'get_field' ) ) {

				if ( get_field( 'left_section_heading' ) ) {
					echo '<h2>' . esc_html( get_field( 'left_section_heading' ) ) . '</h2>';
				}

				if ( get_field( 'left_section_content' ) ) {
					echo '<p>' . esc_html( get_field( 'left_section_content' ) ) . '</p>';
				}
			}
			?>
			<section class="home-right"></section>
			<?php
				if ( function_exists( 'get_field' ) ) :

					if ( get_field( 'right_section_heading' ) ) {
						echo '<h2>';
						the_field( 'right_section_heading' );
						echo '</h2>';
					}

					if ( get_field( 'right_section_content' ) ) {
						echo '<p>';
						the_field( 'right_section_content' );
						echo '</p>';
					}
				endif;
				?>
				<section class="home-slider"></section>
					<?php
					$args = array(
						'post_type'      => 'fwd-testimonial',
						'posts_per_page' => -1
					);

					$query = new WP_Query( $args );

					if ( $query->have_posts() ) : ?>
						<div class="swiper">
							<div class="swiper-wrapper">
								<?php 
								while ( $query->have_posts() ) : $query->the_post(); 
								?>
									<div class="swiper-slide">
										<?php the_content(); ?>
									</div>
								<?php endwhile; ?>
							</div>
							<div class="swiper-pagination"></div>
							<!-- <div class="swiper-button-prev"></div> -->
							<!-- <div class="swiper-button-next"></div> -->
						</div>
						<?php
						wp_reset_postdata();
					endif;
					?>

				</div>
				<?php
				// while ( $query->have_posts() ) :
				// 	$query->the_post();
				// 	the_content();
				// endwhile;
				// wp_reset_postdata();
				// endif;
		?>
			<section class="home-blog"></section>
				<!-- escapes html, makes it translatable, and echoes it out -->
				<h2><?php esc_html_e( 'Latest Blog Posts', 'fwd' ); ?></h2>
				<?php
					// doesn't need to be args but jonathon always uses it so
					// this makes a request to the database
					$args = array(
						// do i want it to look at the post or pages database:
						'post_type'			=> 'post',

						// by default, always takes the 2 most recent blog posts
						'posts_per_page'	=> 4,
					);

					// sends query to database
					$blog_query = new WP_Query( $args );

					// if generates results, run statement
					if ( $blog_query -> have_posts() ) {
						// runs through the query as long as it has posts
						while ( $blog_query -> have_posts() ) {
							// make sure its the_post, not the_posts, because then it runs an infinite loop and crashes
							$blog_query -> the_post();
							?>

							<!-- then we put the html for the article here -->
							<article>
								<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail( 'landscape-blog' ); ?>
									<h3><?php the_title() ?></h3>
									<p><?php echo get_the_date() ?></p>
								</a>
							</article>

							<?php
						}

						wp_reset_postdata();
					}
				?>
			<?php
		endwhile; // End of the loop.
		?>

	</main><!-- #primary -->

<?php
// get_sidebar();
get_footer();

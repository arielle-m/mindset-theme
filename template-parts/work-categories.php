<!-- can be named anything -->

<?php
	$terms = get_terms(
		array(
			// this is like wp_query and making a request to the server
			'taxonomy' => 'fwd-work-category'
		)
	);
	// checking if its empty or not, and if its returning an error message or not
	if ( $terms && ! is_wp_error( $terms ) ) :
		?>
		<section>
			<!-- escaping the text, making it translatable, and echoing it out -->
			<h2><?php esc_html_e( 'See Our Work', 'fwd' ); ?></h2>
			<ul>
				<?php foreach( $terms as $term ) : ?>
					<li><a href="<?php echo get_term_link( $term ) ?>"><?php echo $term->name; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</section>
		<?php
	endif;
	?>
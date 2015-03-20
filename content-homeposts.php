<?php
/**
 * @package russbrown
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('home-post'); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="article__title">', esc_url( get_permalink() ) ), '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="timeline"><?php echo(get_post_custom_values('Year')[0]); ?></div>

	<div class="article__content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'russbrown' ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'russbrown' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
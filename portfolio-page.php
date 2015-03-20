<?php
/*
Template Name: Portfolio Page
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<h3 class="section-header section-header--portfolio"> Portfolio </h3>
		<main id="main" class="site-main" role="main">

		<?php $loop = new WP_Query( array( 'post_type' => 'portfolio', 'posts_per_page' => -1 ) ); ?>

		<?php if ( have_posts() ) : ?>

			<?php /* Start the Loop */ ?>
			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class('portfolio-post'); ?>>
					<header class="article__header">
						<?php the_title( sprintf( '<h1 class="article__title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
					</header><!-- .entry-header -->

					<div class="article__content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->

					<button type="button" class="article__button js-switch-panels"><i class="icon-fa fa fa-caret-right"></i></button>

				</article><!-- #post-## -->

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
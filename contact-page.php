<?php
/*
Template Name: Contact Page
*/

get_header(); ?>

	<div id="primary" class="content-area">
		<h3 class="section-header"> Contact </h3>
		<main id="main" class="site-main" role="main">

				<article class="post-contact">

					<?php echo do_shortcode( '[contact-form-7 id="32" title="Contact form 1"]' ); ?>

				</article><!-- #post-## -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
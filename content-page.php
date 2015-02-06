<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package russbrown
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="article__header">
		<?php the_title( '<h1 class="article__title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="article__content">
		<?php the_content(); ?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->

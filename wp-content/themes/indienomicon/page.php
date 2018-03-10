<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

<section class="grid-container">
  <div class="grid-x grid-margin-x">
    <div class="small-12 cell">
      <h2><?php echo get_the_title(); ?></h2>

          <?php
      		// Start the loop.
      		while ( have_posts() ) : the_post();

            the_content();

      		// End the loop.
      		endwhile;
      		?>

    </div>
  </div>
</section>

<?php get_footer(); ?>

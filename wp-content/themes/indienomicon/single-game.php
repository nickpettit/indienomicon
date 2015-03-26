<?php

get_header();

// gather all of the game images
$game_media = array(
  $screenshot_1 = get_field('screenshot_1'),
  $screenshot_2 = get_field('screenshot_2'),
  $screenshot_3 = get_field('screenshot_3')
);

$banner_image = get_field('banner_image');
$game_logo = get_field('game_logo');

?>

<?php while ( have_posts() ) : the_post(); ?>
<script>
  jQuery(document).ready(function(){
    jQuery('.screenshot-slider').slick({
      autoplay: true,
      autoplaySpeed: 3000,
      dots: true,
      arrows: false
    });
  });
</script>

  <div class="parallax">


    <!-- NOTE: This parallax__group div is closed in the footer template -->
    <div class="parallax__group">

      <div class="parallax__layer parallax__layer--deep">
      <?php if ($banner_image): // If there's a game banner, set it as the background. ?>
        <section class="game-banner" style="background-image:
                                              radial-gradient(ellipse, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.3) 80%, rgba(0,0,0,0.8) 100%),
                                              url('<?php echo $banner_image['url']; ?>')">
      <?php else: // Otherwise, if there's no game banner, just make it a nice color. ?>
        <section class="game-banner" style="background-color: rgb(24, 154, 153);">
      <?php endif; ?>
        </section>
      </div>


      <!-- NOTE: This parallax__layer div is closed in the footer template -->
      <div class="parallax__layer parallax__layer--base">

        <section class="game-basic-info">
          <h2><?php the_field('project_title'); ?></h2>
          <p class="studio-name"><?php the_field('studio_name'); ?></p>
        </section>

        <section class="row game-full-info content-block">

          <div class="small-12 medium-9 columns">

            <?php if ($game_media): ?>
              <ul class="screenshot-slider">
                <?php foreach ($game_media as $image): ?>
                  <?php if ($image): ?>
                    <li>
                      <a href="<?php echo $image['url']; ?>" target="new"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>" /></a>
                    </li>
                  <?php endif; ?>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>

            <?php if (get_field('short_game_description') || get_field('long_game_description')): ?>
              <div class="game-description">
                <h3>Synopsis</h3>
                <?php if (get_field('long_game_description')): ?>
                  <?php the_field('long_game_description'); ?>
                <?php elseif (get_field('short_game_description')): ?>
                  <?php the_field('short_game_description'); ?>
                <?php endif; ?>
              </div>
            <?php endif; ?>

            <?php if (get_field('long_game_description')): ?>
              <div class="studio-description">
                <h3>About <?php the_field('studio_name'); ?></h3>
                <p><?php the_field('studio_description'); ?></p>
              </div>
            <?php endif; ?>

          </div>


          <div class="small-12 medium-3 columns sidebar">

            <?php if ($game_logo): ?>
              <img src="<?php echo $game_logo['url']; ?>" alt="<?php the_field('project_title'); ?>" class="game-logo" />
            <?php endif; ?>

            <?php if (get_field('studio_name')): ?>
              <p><strong>Studio:</strong><br>
                <?php if (get_field('studio_website')): ?>
                  <a href="<?php the_field('studio_website'); ?>" target="new"><?php the_field('studio_name'); ?></a>
                <?php else: ?>
                  <?php the_field('studio_name'); ?>
                <?php endif; ?>
              </p>
            <?php endif; ?>

            <?php if (get_field('genre')): ?>
              <?php $term = get_field('genre'); ?>
          		<p><strong>Genre:</strong><br><?php echo $term->name; ?></p>
            <?php endif; ?>

            <?php if (get_field('platforms')): ?>
              <strong>Platforms:</strong>
              <?php $terms = get_field('platforms'); ?>
              <ul>
              	<?php foreach( $terms as $term ): ?>
              		<li><?php echo $term->name; ?></li>
              	<?php endforeach; ?>
            	</ul>
            <?php endif; ?>

            <?php if (get_field('development_status')): ?>
              <p><strong>Development Status:</strong><br> <?php the_field('development_status'); ?></p>
            <?php endif; ?>

            <?php if (get_field('expected_completion')): ?>
              <?php $expected_completion = DateTime::createFromFormat('Ymd', get_field('expected_completion')); ?>
              <p><strong>Expected Completion:</strong><br> <?php echo $expected_completion->format('M Y'); ?></p>
            <?php endif; ?>

            <?php if (get_field('game_website')): ?>
              <p><strong>Game Website:</strong><br> <a href="<?php the_field('game_website'); ?>" target="new"><?php the_field('game_website'); ?></a></p>
            <?php endif; ?>

            <?php if (get_field('campaign_links')): ?>
              <p><strong>Campaign Links:</strong><br> <?php the_field('campaign_links'); ?></p>
            <?php endif; ?>

            <?php if (get_field('social_links')): ?>
              <p><strong>Social Links:</strong><br> <?php the_field('social_links'); ?></p>
            <?php endif; ?>

          </div>


        </section>





<?php endwhile; // end of the loop. ?>

<?php get_footer(); ?>

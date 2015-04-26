<?php $game_logo = get_field('game_logo') ?>

<div class="game row collapse content-block">
  <div class="small-12 medium-4 large-3 columns game-logo" style="background-image: url('<?php echo $game_logo['url']; ?>')"></div>
  <div class="small-12 medium-8 large-9 columns">
    <h3 class="game-title"><a href="<?php the_permalink(); ?>"><?php the_field('project_title'); ?></a></h3>
    <h4 class="studio-name">
      <?php if ($studio_website = get_field('studio_website')): ?>
        <a href="<?php echo $studio_website['url']; ?>" target="new"><?php the_field('studio_name'); ?></a>
      <?php else: ?>
        <?php the_field('studio_name'); ?>
      <?php endif; ?>
    </h4>
    <p class="game-description"><?php the_field('short_game_description'); ?></p>
  </div>
</div>

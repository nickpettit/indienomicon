<?php

// get the game logo
$game_logo = get_field('game_logo');

// gather the studio relationship
$studios = get_field('studio');

?>

<div class="game row collapse content-block">
  <div class="small-12 medium-3 columns logo" style="background-image: url('<?php echo $game_logo['url']; ?>')"></div>
  <div class="small-12 medium-9 columns">
    <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_field('project_title'); ?></a></h3>
    <?php if ($studios): ?>
      	<?php foreach( $studios as $studio ): ?>
              <h4 class="studio-name"><a href="<?php echo get_permalink( $studio->ID ); ?>"><?php the_field('studio_name', $studio->ID); ?></a></h4>
      	<?php endforeach; ?>
    <?php endif; ?>
    <p class="description"><?php the_field('short_game_description'); ?></p>
  </div>
</div>

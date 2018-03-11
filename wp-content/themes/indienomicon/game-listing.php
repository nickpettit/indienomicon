<?php

// get the game logo
// first, get the image object returned by ACF
$image_object = get_field('game_logo');
// and the image size you want to return
$image_size = 'medium';
// now, we'll exctract the image URL from $image_object
$game_logo = $image_object['sizes'][$image_size];

// gather the studio relationship
$studios = get_field('studio');

?>

<a class="card game-card" href="<?php the_permalink(); ?>">
  <div class="image-container" style="background-image: url('<?php echo $game_logo; ?>')"></div>
  <div class="card-section">
    <h3 class="title truncate"><?php the_field('project_title'); ?></h3>
    <?php if ($studios): ?>
    	<?php foreach( $studios as $studio ): ?>
        <h4 class="studio-name"><?php the_field('studio_name', $studio->ID); ?></h4>
    	<?php endforeach; ?>
    <?php endif; ?>
    <?php if (get_field('genre')): ?>
      <?php $term = get_field('genre'); ?>
      <p class="genre"><?php echo $term->name; ?></p>
    <?php endif; ?>
  </div>
</a>

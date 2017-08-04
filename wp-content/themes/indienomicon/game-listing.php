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

<div class="item">
    <div class="content-block game-item">
      <a class="game-image" href="<?php the_permalink(); ?>">
        <img src="<?php echo $game_logo; ?>">
      </a>
      <a href="<?php the_permalink(); ?>" ><h3 class="title"><?php the_field('project_title'); ?></h3></a>
      <?php if ($studios): ?>
        	<?php foreach( $studios as $studio ): ?>
                <h4 class="studio-name"><a href="<?php echo get_permalink( $studio->ID ); ?>"><?php the_field('studio_name', $studio->ID); ?></a></h4>
        	<?php endforeach; ?>
      <?php endif; ?>
      <?php if (get_field('genre')): ?>
        <?php $term = get_field('genre'); ?>
        <p class="genre"><?php echo $term->name; ?></p>
      <?php endif; ?>
    </div>
</div>

<?php
// get the game logo
// first, get the image object returned by ACF
$image_object = get_field('studio_logo');
// and the image size you want to return
$image_size = 'medium';
// now, we'll exctract the image URL from $image_object
$studio_logo = $image_object['sizes'][$image_size];

?>
<?php if ($studio_logo): ?>
  <a class="card link-card" href="<?php the_permalink(); ?>">
    <div class="image-container" style="background-image: url('<?php echo $studio_logo; ?>')"><?php the_field('studio_name'); ?></div>
  </a>
<?php endif; ?>

<?php $studio_logo = get_field('studio_logo') ?>
<?php if ($studio_logo): ?>
  <div class="content-block item studio"><a class="background-image-container" href="<?php the_permalink(); ?>" style="background-image: url('<?php echo $studio_logo['url']; ?>')"><?php the_field('studio_name'); ?></a></div>
<?php endif; ?>

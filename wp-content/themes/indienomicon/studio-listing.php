<?php $studio_logo = get_field('studio_logo') ?>
<?php $gdc = get_field('gdc') ?>

<div class="game row collapse content-block">
  <?php if ($studio_logo): ?>
    <div class="small-12 medium-3 columns logo" style="background-image: url('<?php echo $studio_logo['url']; ?>')">
      <?php if ($gdc): ?>
        <span class="gdc-banner">At GDC 2016</span>
      <?php endif; ?>
    </div>
    <div class="small-12 medium-9 columns">
      <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_field('studio_name'); ?></a></h3>
      <p class="description"><?php echo mb_strimwidth(get_field('studio_description'), 0, 500, "..."); ?></p>
    </div>
  <?php else: ?>
    <div class="small-12 columns">
      <h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_field('studio_name'); ?></a></h3>
      <p class="description"><?php echo mb_strimwidth(get_field('studio_description'), 0, 500, "..."); ?></p>
    </div>
  <?php endif; ?>
</div>

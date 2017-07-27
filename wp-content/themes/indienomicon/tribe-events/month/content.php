<?php
/**
 * Month View Content Template
 * The content template for the month view of events. This template is also used for
 * the response that is returned on month view ajax requests.
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/month/content.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<div id="tribe-events-content" class="tribe-events-month">

	<!-- Month Title -->
	<?php do_action( 'tribe_events_before_the_title' ) ?>
	<h2 class="tribe-events-page-title"><?php tribe_events_title() ?></h2>
	<?php do_action( 'tribe_events_after_the_title' ) ?>

	<!-- Event Submission -->
	<div class="content-block-padded">
		<div class="row game-submission">
			<?php if ( is_user_logged_in() ): ?>
				<div class="small-12 medium-4 columns">
					<a href="<?php echo admin_url( 'post-new.php?post_type=tribe_events' ); ?>" class="button">Submit an Event</a>
				</div>
				<div class="small-12 medium-8 columns">
					<p>Don't see your favorite event listed here? Submit an event!</p>
				</div>
			<?php else: ?>
				<div class="small-12 medium-4 columns">
					<a href="<?php echo wp_registration_url(); ?>" class="button">Register</a>
				</div>
				<div class="small-12 medium-8 columns">
					<p>Don't see your favorite event listed here? Register your Indienomicon account and then come back to this page to submit your event!</p>
				</div>
			<?php endif; ?>
		</div>
	</div>

	<!-- Notices -->
	<?php tribe_the_notices() ?>

	<!-- Month Header -->
	<?php do_action( 'tribe_events_before_header' ) ?>
	<div id="tribe-events-header" <?php tribe_events_the_header_attributes() ?>>

		<!-- Header Navigation -->
		<?php tribe_get_template_part( 'month/nav' ); ?>

	</div>
	<!-- #tribe-events-header -->
	<?php do_action( 'tribe_events_after_header' ) ?>

	<!-- Month Grid -->
	<?php tribe_get_template_part( 'month/loop', 'grid' ) ?>

	<!-- Month Footer -->
	<?php do_action( 'tribe_events_before_footer' ) ?>
	<div id="tribe-events-footer">

		<!-- Footer Navigation -->
		<?php do_action( 'tribe_events_before_footer_nav' ); ?>
		<?php tribe_get_template_part( 'month/nav' ); ?>
		<?php do_action( 'tribe_events_after_footer_nav' ); ?>

	</div>
	<!-- #tribe-events-footer -->
	<?php do_action( 'tribe_events_after_footer' ) ?>

	<?php tribe_get_template_part( 'month/mobile' ); ?>
	<?php tribe_get_template_part( 'month/tooltip' ); ?>

</div><!-- #tribe-events-content -->

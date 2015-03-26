<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Indienomicon
 * @since Indienomicon 1.0
 */
?>
			<?php

				// If this is NOT the registration or the login page...
				if (!is_page( 'register' ) &&
						!wp_custom_login_is_login_page()) {

					// ...then include the page content template.
					get_template_part( 'mailchimp' );

					// ...and include the page content template.
					get_template_part( 'sponsors' );

				}
			?>

			<footer>
				<div class="row">
					<div class="small-6 columns">
						<h2>Follow Us</h2>
						<ul>
							<li><a href="http://www.facebook.com/indienomicon">Facebook</a></li>
							<li><a href="http://www.twitter.com/indienomicon">Twitter</a></li>
							<li><a href="https://www.youtube.com/user/IndieNomicon">YouTube</a></li>
							<li><a href="https://www.linkedin.com/company/indienomicon?trk=company_logo">LinkedIn</a></li>
						</ul>
					</div>
					<div class="small-6 columns">
						<img class="footer-logo" src="<?php bloginfo('template_directory'); ?>/images/indienomicon-logo.svg" alt="Indienomicon Logo" />
					</div>
				</div>
			</footer>

	<?php if (get_post_type() != "game"): ?>
				</div> <!-- end parallax layer -->
			</div> <!-- end parallax footer group -->
		</div> <!-- end parallax 3d context -->
	<?php endif;?>

	<script>
	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	ga('create', 'UA-47120034-1', 'indienomicon.com');
	ga('send', 'pageview');
	</script>

<?php wp_footer(); ?>

</body>
</html>

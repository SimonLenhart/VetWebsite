<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package main
 */

?>

<footer id="colophon" class="site-footer">
	<div class="container">
		<?php
		if (is_active_sidebar('sidebar-1')) : ?>
			<?php dynamic_sidebar('sidebar-1'); ?>
		<?php endif; ?>
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->


<?php wp_footer(); ?>

</body>

</html>
			<!-- end content -->
		</div> <!-- end of div.body -->
		<?php get_sidebar(); ?>
		<div id="footer" class="wrap">
			<p>Crafted by <a href="http://bryanjswift.com" title="Post-Swiftalism">Bryan J Swift</a> | Powered by <a href="http://wordpress.org/" title="Wordpress">Wordpress</a></p>
			<!-- <p>Development aided by <a href="http://www.github.com/bryanjswift" title="bryanjswift's GitHub profile">GitHub</a></p> -->
		</div>
		<script type="text/javascript"> var stylesheetDirectory = '<?php bloginfo('template_directory'); ?>'; </script>
		<?php $themeOptions = get_option('Horizontally Delicious'); ?>
		<?php if ($themeOptions["include_sifr"] == 1) : ?>
			<script src="<?php bloginfo('template_directory'); ?>/js/sifr.js" type="text/javascript"></script>
		<?php endif; ?>
		<?php if ($themeOptions["include_sifr"] != 1 && isset($themeOptions["sifr_alternate_path"]) && $themeOptions["sifr_alternate_path"] != '') : ?>
			<script src="<?php echo $themeOptions["sifr_alternate_path"]; ?>" type="text/javascript"></script>
		<?php endif; ?>
		<?php if (isset($themeOptions["hdjs_alternate_path"]) && $themeOptions["hdjs_alternate_path"] != '') : ?>
			<script src="<?php echo $themeOptions["hdjs_alternate_path"]; ?>" type="text/javascript"></script>
		<?php else : ?>
			<script src="<?php bloginfo('template_directory'); ?>/js/mootools.js" type="text/javascript"></script>
			<script src="<?php bloginfo('template_directory'); ?>/js/hd.js" type="text/javascript"></script>
		<?php endif; ?>
	</body>
</html>

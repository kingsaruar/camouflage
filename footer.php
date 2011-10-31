<div style="clear:both;height:20px;">&nbsp;</div>


<div id="footer">
	<div id="footerl"></div>
	
	<div id="footerm">
	
	<div class="left">
			<?php
			$cf_gs=get_option('camouflage_gs');
			$cf_footer=$cf_gs['footer'];
			$cf_footer=str_replace(array('%y','%b'),array(date('Y'),get_bloginfo('name')),$cf_footer);
			echo $cf_footer;
		?>
	</div>
	<div class="right">
	<a class="rss" href="<?php bloginfo('rss2_url'); ?>">Entries (RSS)</a>&nbsp;
	<a class="rss" href="<?php bloginfo('comments_rss2_url'); ?>">Comments (RSS)</a>
	</div>
	
	</div>
	<div id="footerr"></div>
</div>

</div>
<?php wp_footer() ?>
</body>
</html>

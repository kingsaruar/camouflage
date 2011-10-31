<?php
$temp = $wp_query;
$wp_query= null;
$wp_query = new WP_Query();
$wp_query->query('posts_per_page=10'.'&paged='.$paged);
while ($wp_query->have_posts()) : $wp_query->the_post();
?>
<div class="post"  id="post-<?php the_ID();?>">
		<div class="post-date"><span class="post-month"><?php the_time('M') ?></span> <span class="post-day"><?php the_time('j') ?></span></div>
		<h2><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h2>

		<div class="entry">
		
		
			<p class="postmetadata">
				<span class="post-cat"><?php //_e('Filed under&#58;'); ?> <?php the_category(', ') ?> <?php _e('by'); ?> <?php  the_author(); ?></span>
				<span class="post-comments"><?php comments_popup_link('No Comments ', '1 Comment ', '% Comments '); ?> <?php edit_post_link	('Edit', ' &#124; ', ''); ?></span>
			</p>
				<p class="thecontent">
			<?php the_excerpt();?>
			</p>
		</div>
		
</div>
	
<?php
endwhile;
?>
<div class="navigation">
		<span class="previous-entries"><?php next_posts_link('&laquo; Older Entries') ?>&nbsp;&nbsp;</span>
		<span class="next-entries"><?php previous_posts_link('Newer Entries &raquo;') ?></span>
		<?php //posts_nav_link(); ?>
</div>
<?php
$wp_query = null; $wp_query = $temp;
?>

<?php get_header(); ?>

<div id="contentwrap">
<div id="conten-top"></div>
<div id="conten-middle">
<?php
$gb=get_option("camouflage_gb");
$wid='700px';
if(!is_page() || (is_page() && get_the_title()==$gb['blog_title']) ) get_sidebar();
if(is_page() && get_the_title()!=$gb['blog_title'])
$wid='96%'; 
?>
<div class='cfwrapper'>
	<?php 
	if(have_posts()): while(have_posts()):the_post();
	?>

	<div class="post"  id="post-<?php the_ID();?>">
		<div class="post-date"><span class="post-month"><?php the_time('M') ?></span> <span class="post-day"><?php the_time('j') ?></span></div>
		<h2><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h2>

		<div class="entry">
		
			<p class="postmetadata">

				<span class="post-cat"><?php //_e('Filed under&#58;'); ?> <?php the_category(', ') ?> <?php _e('by'); ?> <?php  the_author(); ?></span>

				<span class="post-comments"><?php comments_popup_link('No Comments ', '1 Comment ', '% Comments '); ?> <?php edit_post_link	('Edit', ' &#124; ', ''); ?></span>

			</p>
			<p class="thecontent"><?php  the_excerpt();?></p>
		</div>
		
	</div>

	<?php endwhile;?>
		
		<div class="navigation">
		<span class="previous-entries"><?php next_posts_link('&laquo; Older Entries') ?>&nbsp;&nbsp;</span>
		<span class="next-entries"><?php previous_posts_link('Newer Entries &raquo;') ?></span>
			<?php //posts_nav_link(); ?>
		</div>
		
	<?php else: ?>
	
		<div class="post"  id="post-<?php the_ID();?>">
			<h2 style="text-align:center;margin:0 0 0 0;padding:0 0 0 0;color:red;"><?php _e('Oops ! Not Found');?></h2>
		</div>
	<?php
	endif;
	?>
</div>

<div id="clear"></div>
</div>
<div id="conten-bottom"></div>
</div>


<?php get_footer(); ?>

<?php get_header(); ?>

<div id="contentwrap">
<div id="conten-top"></div>
<div id="conten-middle">
<?php
$gb=get_option("camouflage_gb");
$wid='650px';
if(!is_page() || (is_page() && get_the_title()==$gb['blog_title']) ) get_sidebar();
if(is_page() && get_the_title()!=$gb['blog_title'])
$wid='96%'; 
?>
<div class='cfwrapper' style='width:<?php echo $wid; ?>'>
	<?php 
	if(have_posts()): while(have_posts()):the_post();
	?>

	<div class="post"  id="post-<?php the_ID();?>">
		<div class="post-date"><span class="post-month"><?php the_time('M') ?></span> <span class="post-day"><?php the_time('j') ?></span></div>
		<h2><a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_title();?></a></h2>

		<div class="entry">
		
		<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>
			<p class="postmetadata">

				<span class="post-cat"><?php //_e('Filed under&#58;'); ?> <?php the_category(', ') ?> <?php _e('by'); ?> <?php  the_author(); ?></span>

			</p>
			<div class="thecontent" style='width:<?php echo $wid; ?>'><?php the_content(); ?></div>
		</div>
	<br /><br />
	
	
	
		<div class="comments-template">
			<?php comments_template(); ?>
		</div>
		
	</div>

	<?php endwhile;?>
		
		<div class="navigation">
			<?php //previous_post_link('&laquo; %link') ?> 
			<?php //next_post_link(' %link &raquo;') ?>
			<span class="previous-entries"><?php previous_post_link('&laquo; %link') ?>&nbsp;&nbsp;</span>
			<span class="next-entries">&nbsp;&nbsp;<?php next_post_link('%link &raquo;') ?></span> 
		</div>
		
	<?php else: ?>
	
		<div class="post"  id="post-<?php the_ID();?>">
			<h2 style="text-align:center;margin:0 0 0 0;padding:0 0 0 0;color:red;"><?php _e('Not Found');?></h2>
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

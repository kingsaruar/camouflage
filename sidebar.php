<div id="sidebarwrap">
<div id="sidebar-top"></div>
<div id="sidebar-middle">
<ul id='widget-ul'>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar() ) : else : ?>

<li id='calendar'>
<h2><?php _e('Calendar'); ?></h2>
<?php get_calendar(); ?>
</li>

<li>
<h2><?php _e('Categories'); ?></h2>
<ul class="cat">
<?php wp_list_cats('show_count=1&title_li='); ?>
</ul>
</li>

<li>
<h2><?php _e('Archives'); ?></h2>

<ul>
<?php wp_get_archives('type=monthly'); ?>
</ul>

</li>

<?php endif; ?>

</ul>
</div>
<div id="sidebar-bottom"></div>
</div>
<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>
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
	
		
		<h2 style="text-align:center;margin:0 0 0 0;padding:0 0 0 0;color:red;">Error 404 - Not Found</h2>

</div>

<div id="clear"></div>
</div>
<div id="conten-bottom"></div>
</div>	



<?php get_footer(); ?>

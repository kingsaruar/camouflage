<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style.css" type="text/css" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/style.php" type="text/css" />
	

	
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	
	
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	
	
	
	<script src="<?php echo bloginfo('stylesheet_directory')?>/js/jquery-1.4.2.min.js" type="text/javascript"></script> 
	<script src="<?php echo bloginfo('stylesheet_directory')?>/js/jquery.easing.min.1.3.js" type="text/javascript"></script> 
	<script src="<?php echo bloginfo('stylesheet_directory')?>/js/jquery.coda-slider-2.0.js" type="text/javascript"></script> 
	<script src="<?php echo bloginfo('stylesheet_directory')?>/js/camouflage.js" type="text/javascript"></script> 
	
	<?php echo get_option('camouflage_ga'); ?>
	
	<?php
			$cf_gs=get_option('camouflage_gs');
			extract($cf_gs);
   ?>
	<script type="text/javascript">
	
	
	$().ready(function() {
	
	//////////////Heera//////////////
	
	function makemenu()
	{
		mee=$('.menubar > ul');
		numm=mee.children();
		slength=numm.length; //alert(numm.length);
		if(slength > 5) 
		{	
			nmenu=4;
			newul=$('<ul class=\'more_ul\' id=\'more_ul\'></ul>');
			for(i=0;i<slength;i++)	
			{
				if(i > nmenu)
				{
					newul.append(numm.get(i));
				}
			}
			newli=$('<li class=\'more_li\' id=\'more_li\'><a class=\'more_a\' id=\'more_a\' href=\'#\'>More</a></li>').append(newul);
			mee.append(newli);
			//$('.menubar > ul > li:last').css({'background':'none'});
		}
		
		$('.menubar > ul > li:first:even').css({'background':'none'});
		$('.menubar ul li a').removeAttr('title');
		$('.menubar > ul > li > ul li').css('background-color','#E5EAEE');
		$('.menubar ul li ul').hide();
	}
	
	function disable_parent_menuitem()
	{
		itsme=$('.menubar ul li');
		for(i=0;i<=itsme.length;i++)
		{
			if($(itsme[i]).children().length > 1)
			$(itsme[i]).find('a:first').attr('href','#');
		}
	}
	
	function add_bottomarrow()
	{
	
		itsmeee=$('.menubar > ul > li');
		for(i=0;i<=itsmeee.length;i++)
		{
		if($(itsmeee[i]).children().length > 1)
		$('a:first', itsmeee[i]).css({'background':'url(<?php echo bloginfo('stylesheet_directory')?>/images/bc-down.png) no-repeat bottom center'});
		$('a:first', itsmeee[i]).css({'padding':'0 0px 10px 0'});
		$('.menubar > ul > li').css('padding-bottom','10px');
		}
	}
	
	
	function add_sidearrow()
	{
		//alert();
		itsmee=$('.menubar ul li ul li');
		for(i=0;i<=itsmee.length;i++)
		{
		//alert($(itsmee[i]).text());
		if($(itsmee[i]).children().length > 1)
		$(itsmee[i]).css({'background':'url(<?php echo bloginfo('stylesheet_directory')?>/images/bc1.png) no-repeat right center','border':'solid red 0px'});
		$(itsmee[i]).css({'border-bottom': 'solid #CCC 1px','background-color':'#E5EAEE'});
		}
	}
	var isblog;
	function curli()
	{
	me=$('.menubar ul li');
	<?php
	$gb=get_option("camouflage_gb");
	$isblog = $gb['blog_title'];
	?>
	isblog='<?php echo $isblog;?>';
	if(isblog != '')
	$('.menubar > ul > li a:contains('+isblog+')').css('color','#950909');
		try
		{
			
			for(i=0;i<=$(me).length;i++)
			{
				stris=$($(me))[i].className;
				if(stris.match('current_page_ancestor|current_page_parent|current_page_item'))
				{
					$('.menubar > ul > li a:contains('+isblog+')').css('color','#3BA2FE');
					$('a:first', me[i]).css('color','#950909');
					if($(me[i]).parent().attr('class')=='more_ul' || $(me[i]).parent().attr('class')=='more_li')
					{
					$('.menubar > ul > li > .more_a').css('color','#950909');
					}
					
				}
				
			}
			
		}
		catch(err)
		{
		//alert(err);
		}
	}
	
	makemenu();
	<?php $parent_mitem_status = get_option('camouflage_gp'); ?>
	parent_mitem_status = '<?php echo $parent_mitem_status['parent_link'] ; ?>';
	if(parent_mitem_status=='on') disable_parent_menuitem();
	add_bottomarrow();
	add_sidearrow();
	curli();
	
	function chk(selected_li)
	{
		itsmee=$('ul:first > li', selected_li);//alert(itsmee.length);
		for(i=0;i<=itsmee.length;i++)
		{
			if($(itsmee[i]).children().length > 1)
			{
				
				thisoffset=$(itsmee[i]).offset();
				scrwidth=screen.width;
				availaable_space=scrwidth - (thisoffset.left+180);
				if(availaable_space <= 180)
				{
						
					$(itsmee[i]).css({'background':'url(<?php echo bloginfo('stylesheet_directory')?>/images/bc1l.png) no-repeat left center','border':'solid red 0px'});
					$(itsmee[i]).css({'border-bottom': 'solid #CCC 1px','background-color':'#E5EAEE'});
				}
				else
				{
						
					$(itsmee[i]).css({'background':'url(<?php echo bloginfo('stylesheet_directory')?>/images/bc1.png) no-repeat right center','border':'solid red 0px'});
					$(itsmee[i]).css({'border-bottom': 'solid #CCC 1px','background-color':'#E5EAEE'});
				}
				
			}
		}
	}
	
	//$('.menubar ul li').mousemove(function(){
	//chk(this);
	//});
		
	//OnHover Show SubLevel Menus
	$('.menubar > ul > li').hover(
		//OnHover
		function(){
			stris=$(this).attr('class');
			ptrn='current_page_item|current_page_ancestor|current_page_parent|more_li';
			
			$('a:first', this).animate({'margin-left':'10px'},'fast');
			$('a:first', this).animate({'margin-left':'-8px'},'fast');
			$('a:first', this).animate({'margin-left':'0px'},'300', 'swing');
			//if(!stris.match(ptrn))
			//{
			//$('a:first', this).css('color','#3BA2FE');
			//}
			//$('ul li', this).css({'width':'200px'});
			$('ul:first', this).slideDown('fast');
			$('ul li ul', this).fadeOut('fast');
		},
		//OnOut
		function(){
			
			stris=$(this).attr('class');
			ptrn='current_page_item|current_page_ancestor|current_page_parent|more_li';
			if(!stris.match(ptrn))
			{
				if($('a:first', this).text()!=isblog)
				$('a:first', this).css('color','#3BA2FE');
				//$('.menubar > ul > li a:contains('+isblog+')').css('color','#950909');
			}
			$('ul:first', this).fadeOut('fast');
		}
		
	);
	
	$('.menubar ul li').click(function(e) {
	window.location=$(this).find('a').attr('href');
	e.stopPropagation();
	});
	
	$('.menubar ul li ul li').hover(function(){
	//on-hover
	thisoffset=$(this).offset();
	scrwidth=screen.width;
	availaable_space=(scrwidth - thisoffset.left)-180;
	
	if(availaable_space >= 180)
	{
		$('ul:first', this).css({'top':-21,'left':$(this).width(),'margin':'0 0 0 0'});
		left=false;
	}
	else
	{
		$('ul:first', this).css({'top':-36,'left':-($(this).width()+2)});
		left=true;
	}
	
	stris=$(this).attr('class');
	ptrn='current_page_item|current_page_ancestor';
	$(this).css('background-color','#fff');
	
	if(!stris.match(ptrn))
	{
	$('a:first', this).css('color','#3BA2FE');
	}
		
	$('ul:first', this).show();
	curul=$('ul:first', this);
	if(left==true)
	{
		$(curul.parent()).css({'background':'url(<?php echo bloginfo('stylesheet_directory')?>/images/bc1l.png) no-repeat left center','border':'solid red 0px'});
		$(curul.parent()).css({'border-bottom': 'solid #CCC 1px','background-color':'#fff'});
		
		$('li', curul).css('overflow','hidden');
		$('li a', curul).css({'margin-left':'180px'});
		$('li a', curul).animate({'margin-left':'0px'},'fast', function(){
		$('li', curul).css('overflow','');
		});
	}
	else
	{
		$('li', curul).css('overflow','hidden');
		$('li a', curul).css({'margin-left':'-180px'});
		$('li a', curul).animate({'margin-left':'0px'},'fast', function(){
		$('li', curul).css('overflow','');
		});
	}
	$('ul li ul', this).fadeOut('fast');
	},
	//on-hover-out
	function(){
	stris=$(this).attr('class');
	ptrn='current_page_item|current_page_ancestor';
	if(!stris.match(ptrn))
	{
		$('a', this).css('color','#3BA2FE');
	}
	curul=$('ul:first', this);
	$(curul.parent()).css({'background':'url(<?php echo bloginfo('stylesheet_directory')?>/images/bc1.png) no-repeat right center','border':'solid red 0px'});
	$(curul.parent()).css({'border-bottom': 'solid #CCC 1px','background-color':'#E5EAEE'});
	$(this).css('background-color','#E5EAEE');
	$('ul:first', this).hide();
	});
	
	//////////////Heera//////////////
	
	$('#rightarrow,#leftarrow').hover(
		function(){
			$(this).animate({'opacity':'100'},500);
		},
		function(){
			$(this).animate({'opacity':'0.4'},500);
		}
		
	);
	
       $('#coda-slider-1').codaSlider({
			autoSlide: true,
			autoSlideInterval: 5000,
			dynamicArrows: false,
			dynamicTabs: false
       });
		<?php if('on'==$sidebar_ani){ ?>
	   	$("#widget-ul").effectize({
			timeout: 500,			
			speed: 700,						
			easing: '',
			direction: 'vertical'
		});	
		<?php } ?>
		
		<?php if('on'==$menu_ani){ ?>
		$(".menubar ul").effectize({
			timeout: 500,			
			speed: 400,						
			easing: '',
			direction: 'horizontal'
		});
		
		<?php } ?>
		
		if($.browser.msie && $.browser.version<7)
		{
			$('#imground-right').css('background-image','none');
			$('#imground-left').css('background-image','none');
		}
		
	});
	
	
	</script>
	
	<?php wp_head(); ?>
</head>

<body>
<noscript>
	<div>
        <p>Unfortunately your browser does not have JavaScript capabilities which are required to exploit full functionality of our site. This could be the result of two possible scenarios:</p>
        <ol>
            <li>You are using an old web browser, in which case you should upgrade it to a newer version. We recommend the latest version of <a href="http://www.getfirefox.com">Firefox</a>.</li>
            <li>You have disabled JavaScript in you browser, in which case you will have to enable it to properly use our site. <a href="http://www.google.com/support/bin/answer.py?answer=23852">Learn how to enable JavaScript</a>.</li>
        </ol>
    </div>
</noscript>


<div id="main">

<div id="logo">
<div id="thelogo"><img src="<?php echo bloginfo('stylesheet_directory')?>/images/sample-slide-1.png" /></div>
<div id="thetitle"><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></div>
</div>

<div id="searchbar">

<div id="finduson"></div>
<div id="findusicons">
<?php
$csarray=array(
				'Facebook'=>'csfacebook',
				'Twitter'=>'cstwitter',
				'Linkedin'=>'cslinkedin',
				'Flickr'=>'csflickr',
				'FriendFeed'=>'csfriendfeed',
				'RSS'=>'csrss',
				);
					
		$cs=get_option('camouflage_connect');
		$cs['csrss']=get_bloginfo('rss2_url');
		foreach($csarray as $key=>$value){
						if($cs[$value]!='')
						echo '<div id="cs"><a href="'.$cs[$value].'" target="_blank"><img width="60px" height="60px" title="'.$key.'" src="'.get_bloginfo('stylesheet_directory').'/images/'.$value.'.png" /></a></div>';
		}
?>

</div>
<div class="searchform">
<form id="searchform" action="<?php bloginfo('home'); ?>" method="get">
<div class="btnsearch"><input class="sbtn" id="btnsrc" type="submit" value="" /></div>
<div class="txtsearch"><input class="stextbox" id="s" name="s" type="text" value="<?php echo wp_specialchars($s, 1); ?>" /></div>
</form>
</div>

</div>

<?php //wp_page_menu(array('title_li' =>'', 'show_home'=> true, 'menu_class'=>'menubar')); ?>

<?php wp_nav_menu( array('container_class' => 'menubar', 'menu_class' => 'menubar', 'theme_location' => 'header-menu','show_home' => true ));   ?> 


<?php
//$gb=get_option("camouflage_gb");
//(is_page() && get_the_title()!=$gb['blog_title'])
setup_postdata($post);
$cf_pid=get_the_ID();
if(get_post_type()==$showslide || 'all'==$showslide || ('selected'==$showslide && $slidepage==$cf_pid) ||  ('selected'==$showslide && $slidepage=='0' && is_front_page() ) )
{
	$slides=get_option('camouflage_slides');
	
	?>
	<div id="clear"></div>
	<div id="topanim">
			
				
			<div class="coda-slider-wrapper">
			<div class="coda-slider preload" id="coda-slider-1">
			<?php foreach($slides as $slide){ ?>
				<div class="panel">
					<div class="panel-wrapper">
						<a href="<?php echo $slide['image_link']; ?>"><img alt="<?php echo $slide['image_alt']; ?>" src="<?php echo $slide['image_url']; ?>" /></a>
					</div>
				</div>	
				<? } ?>
			</div>
			</div>

			
			
			<div id="coda-nav-left-1" class="coda-nav-left"><a href="#"><div id="leftarrow" title="Previous"></div></a></div>
			<div id="coda-nav-right-1" class="coda-nav-right"><a href="#"><div id="rightarrow" title="Next"></div></a></div>
				


	</div>
	<?php
}
?>

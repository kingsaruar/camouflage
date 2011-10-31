<?php
header('Content-type: text/css');

include_once('../../../wp-load.php');
//echo get_option('camouflage_skin');
$current_skin='skins/'.get_option('camouflage_skin').'/index.php';
include_once($current_skin);

if(!isset($style_vars)){
	$style_vars = array(
	"acolor"=>"#14B1FF",
	"acolorhov"=>"#950909",
	"menuacolor"=>"#3BA2FE",
	"menuacolorhover"=>"#950909",
	"li_back_hov_col"=>"#3BA2FE",
	"li_back_nor_col"=>"#EEF0F3",
	"alicolor"=>"#3BA2FE",
	"alicolorhover"=>"#950909",
	"posth2acolor"=>"#A1C34D",
	"posth2acolorhov"=>"#14B1FF",
	"bodyback"=>"black",
	"bodytextcolor"=>"black",
	"mainback"=>"black",
	"postcat"=>"#999999",
	"datemm"=>"white",
	"datedd"=>"#999999",
	);
}

if(!function_exists('main_style'))
{
function main_style()
{
global $style_vars;
extract($style_vars);
?>
h1{
font-size:15px;
font-weight:bold;
font-color:<?php echo $acolor;?>;
} 

h2{
font-size:13px;
font-weight:bold;
font-color:<?php echo $acolor;?>;
} 

h3{
font-size:11px;
font-weight:bold;
font-color:<?php echo $acolor;?>;
}

h4{
font-size:9px;
font-weight:bold;
font-color:<?php echo $acolor;?>;
} 

h5{
font-size:7px;
font-weight:bold;
font-color:<?php echo $acolor;?>;
}


body{
margin:0 0 0 0;
font-family: Arial, Helvetica, Georgia, Sans-serif;
font-size: 14px;
text-align: center;
vertical-align: top;
background:<?php echo $bodyback;?>;
color:<?php echo $bodytextcolor; ?>
line-height:1.5;
}

img{
border:none;
}

li{
margin:3px 0px;
}

a{
text-decoration:none;
color:<?php echo $acolor; ?>;
}

a:hover{
text-decoration:none;
color:<?php echo $acolorhov;?>;
}

#main{
width:947px;
background:<?php echo $mainback;?>;
margin: 0px auto 0px auto;
/*overflow:hidden;*/
}

#logo{
width:280px;
height:128px;
margin:0px;
background: url(images/logo-back.png) no-repeat;
float:left;
border:solid blue 0px;
}

#thelogo{
margin:10px auto 0 auto;
width:148px;
height:70px;
border:solid blue 0px;
}

#thelogo img{
margin:auto;
width:128px;
height:70px;
border:none;
outline:none;
}

#thetitle{
margin:5px auto 0 auto;
width:270px;
font-size:20px;
font-weight:bold;
color:<?php echo $alicolor; ?>;
border:solid red 0px;
}

#searchbar{
width:646px;
height:50px;
margin-top:18px;
float:right;
border:solid red 0px;
}

#finduson{
background: url(images/find-us-on.png) no-repeat left center;
width:88px;
height:50px;
float:left;
margin-left:5px;
border:solid red 0px;
}

#findusicons{
height:50px;
float:left;
margin-left:5px;
border:solid red 0px;
}

#cs{
width:50px;
height:50px;
float:left;
}

#cs img{
width:50px;
height:50px;
}

.blogtitle{
margin:15px 0 0 10px;
float:left;
height:32px;
font-size:28px;
font-weight:bold;
color:<?php echo $alicolor; ?>;
border:solid red 0px;
}

.searchform{
margin:5px 0 0 0px;
float:right;
width:220px;
height:34px;
border:solid red 0px;
}

.txtsearch{
margin:0px 0 0 0px;
width:180px;
height:34px;
background: url(images/textbox.png) no-repeat;
border:none;
outline:none;
float:right;
border:solid red 0px;
}

.stextbox focus{
border:none;
outline:none;
}

.stextbox{
width:170px;
height:22px;
float:left;
margin:3px 0 0 5px;
border:none;
outline:none;
background:none;
}

.btnsearch{
width:40px;
height:36px;
float:right;
margin:0px 0px 0 0px;
border:solid green 0px;
}

.sbtn{
width:40px;
height:36px;
background: url(images/search-icon.png) no-repeat;
font-weight:bold;
color:#69B7FE;
border:none;
outline:none;
cursor:pointer;
border:solid red 0px;
}

.sbtn:hover{
color:#FC076F;
}

#topanim{
background:url(images/slider-border.png) no-repeat center;
padding:0px 0 0 0;
margin:0px auto 0 auto;
text-align:left;
width:947px;
height:276px;
border:solid red 0px;
overflow:hidden;
clear:both;
position:relative;
}

#imground{
position:absolute;
padding:0px 0 0 0;
margin:0px 0 0 0px;
width:947px;
height:225px;
background: url(images/img-round.png) no-repeat;
border:solid yellow 1px;
}

#imground-left{
float:left;
position:absolute;
padding:0px 0 0 0;
margin:0px 0 0 0px;
width:10px;
height:225px;
background: url(images/img-round-left.png) no-repeat;

}

#imground-right{
margin-left:788px;
position:absolute;
padding:0px 0 0 0;
width:10px;
height:225px;
background: url(images/img-round-right.png) no-repeat;

}

#topanim img{
padding:0px;
margin:0px;
width:905px;
height:234px;
border:none;
outline:none;
border:solid blue 0px;
}

#leftarrow{
position:absolute;
background: url(images/arrow-left.png) no-repeat;
width:70px;
height:70px;
float:left;
margin:103px 0 0 0px;
cursor:pointer;
border:solid red 0px;
opacity:0.4;
}

/*#leftarrow:hover{
background: url(images/arrow-left-hover.png) no-repeat;
}*/

#rightarrow{
position:absolute;
background: url(images/arrow-right.png) no-repeat;
width:70px;
height:70px;
float:right;
margin:103px 0px 0px 0px;
cursor:pointer;
border:solid red 0px;
opacity:0.4;
}

/*#rightarrow:hover{
background: url(images/arrow-right-hover.png) no-repeat;
}*/

.menubar{
width:646px;
height:52px;
margin-top:7px;
background: url(images/menu-back.png) no-repeat;
float:right;

}

.menubar ul{
/*width:640px;*/
list-style:none;
float:left;
margin:0px 0px 0px 0px;
padding:0px 0px 0px 0px;
border:solid red 0px;
}

.menubar ul li{
display:inline;
float:left;
margin:12px 0px 0 0;
padding:6px 0px 0 0px;
width:116px;
height:35px;
background:url("images/menu-seperator.png") no-repeat top left;
text-align:center;
cursor:pointer;
border:solid red 0px;
}

/* Sub Level Nav */

.menubar ul li ul {
/*For Shadow*/
/*-moz-box-shadow: 3px 3px 4px #000;
-webkit-box-shadow: 3px 3px 4px #000;
box-shadow: 3px 3px 4px #000;*/
/* For IE 8 
-ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=135, Color='#000000')";
*/
/* For IE 5.5 - 7 
filter: progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=135, Color='#000000');
*/
/*For Shadow*/

background: #F4F4F4;
border: 1px solid #3BA2FE;
margin: 14px 0px 0px 0px;
padding: 0 0px 0 0px;
position: relative;
width: 180px;
opacity:10;
z-index:600;
display:none;


/*-webkit-border-radius: 5px;
-moz-border-radius: 5px;
-webkit-box-shadow: 0px 0px 3px rgba(0, 0, 0, 0.5);
-moz-box-shadow: 3px 3px 4px #000;
-webkit-box-shadow: 3px 3px 4px #000;
box-shadow: 3px 3px 4px #000;
/*filter:alpha(opacity=80);
border-radius: 5px;*/
}

.menubar ul li ul li {
/*background-color:<?php //echo $li_back_nor_col; ?>;*/
border-bottom: solid #CCC 1px;
display: block;
float: left;
width: 180px;
height: 14px;
padding: 5px 0 5px;
text-align: left;
margin: 0px;
text-indent:10px;
background:none;
opacity:10;
/*filter:alpha(opacity=80);*/
z-index:601;
}

.menubar ul li ul li a {
color: <?php echo $menuacolor;?>;
text-shadow: none;
width: 100%;
font-weight:bold;
font-variant:strong;
border:solid black 0px;
font-size:12px;
}

.menubar ul li ul li a:hover {
color: <?php echo $menuacolorhover;?>;
}


/* Arrow 
.menubar ul li ul li:last-child:not(li.arrow) {
border: 0;
}

.arrow {
background: url(arrow.png) no-repeat;
border: 0;
display: none;
position: absolute;
top: -10px;
left: 63px;
height: 11px;
width: 20px;
text-indent: -9999px;
}
*/
.menubar ul li a{
text-decoration:none;
font-size:13px;
font-weight:normal;
color:<?php echo $menuacolor;?>;
width:136px;
border:solid red 0px;
font-weight:bold;
}

.menubar ul li a:hover{
color:<?php echo $menuacolorhover; ?>;
}

.menubar ul li.current_page_item a{
color:<?php echo $menuacolorhover; ?>;
}



#contentwrap{
width:947px;
float:left;
margin-top:10px;
border:solid red 0px;
}

#conten-top{
padding:0 0 0 0px;
margin:0 0 0 0px;
width:100%;
height:37px;
background: url(images/content-top.png) no-repeat ;
border:solid black 0px;
}

#conten-middle{
width:100%;
background:url(images/content-middle.png) repeat-y ;
border:solid blue 0px;
padding:0px 0px 0px 0px;
margin:0 0 0 0px;
min-height:400px;
border:solid red 0px;
/*overflow:hidden;*/
}

#conten-middle .cfwrapper{
text-align:justify;
margin:0 0 0 20px;
padding-right:20px;
width:650px;
float:left;
border:solid red 0px;
}

#clear{
clear:both;
width:100%;
height:10px;
}

h2.pagetitle{
background: url(images/mini-nav-right.gif) no-repeat center left;
margin:0 0 20px 20px;
padding:0 0 0 20px;
font-size:12px;
color:<?php echo $posth2acolor;?>;
text-align:left;
border:solid black 0px;
}

#conten-bottom{
width:100%;
height:68px;
background: url(images/content-bottom.png) no-repeat ;
border:solid white 0px;
}

#sidebarwrap{
width:210px;
float:right;
margin:0 0px 0 0;
padding:0px 15px;
border:solid red 0px;
}

#sidebar-top{
width:100%;
height:0px;
}

#sidebar-middle{
margin:0 0 0 0;
padding:1px 0 5px 0;
width:100%;
border:solid red 0px;
}

#sidebar-middle ul{
width:100%;
text-align:left;
margin:0 auto 0 auto;
padding:0 0 0 0px;
}

#sidebar-middle ul li{
color:<?php echo $bodytextcolor;?>;
list-style:none;
margin:0 0 10px 0;
}

#sidebar-middle ul li ul{
text-align:justify;
margin:0 0 0px 0;
}

#sidebar-middle ul li ul li{
background: url(images/sidebar-item-seperator.png) no-repeat bottom;
background: url(images/bullet.png) no-repeat left;
margin:0px 0 8px 5px;
padding:0 0 0 12px;
}

#sidebar-middle ul li.widget_site_connect ul li{
background-image:none;
margin:0 0 0 0;
padding:0 0 0 0;
}

#sidebar-middle ul li h2{
height:30px;
background: url(images/sidebar-item-header.png) no-repeat left;
background: url(images/bullet-big.png) no-repeat left;
color:<?php echo $acolorhov;?>;
margin:0px 0px 0px 0px;
padding:10px 0 0 25px;
font-size:15px;
}

#sidebar-middle ul li ul a{
text-decoration:none;
color:<?php echo $alicolor; ?>;
}

#sidebar-middle ul li ul li a:hover{
text-decoration:none;
color:<?php echo $alicolorhover; ?>;
}

#sidebar-bottom{
width:100%;
height:16px;
}

.widget_calendar tbody a{
color:<?php echo $acolor; ?>;
}

.widget_calendar tbody a:hover{
color:<?php echo $acolorhov; ?>;
}

.widget_calendar #today{
border:solid gray 1px;
}

#footer{
clear:both;
width:947px;
margin:0px 0 0px 0px;
color:<?php echo $bodytextcolor;?>;
font-size:11px;
border:solid red 0px;
}

#footerl{
background: url(images/footer-left.png) no-repeat;
width:8px;
height:40px;
float:left;
border:solid black 0px;
}

#footerm{
background: url(images/footer-middle.png) repeat-x;
width:930px;
height:40px;
float:left;
}

#footerr{
background: url(images/footer-right.png) no-repeat;
width:8px;
height:40px;
float:left;
}

.left{
margin-top:13px;
float:left;
text-align:left;
width:20%;
border:solid pink 0px;
}

.right{
margin-top:13px;
float:right;
text-align:right;
width:30%;
border:solid pink 0px;
}

.rss {
background: url(images/mini-rss.gif) no-repeat left center;
padding-left: 18px;
padding-bottom: 0px;
margin-left: 10px;
}

#footer a{
color:<?php echo $bodytextcolor;?>;
}

#footer a:hover{
color:<?php echo $acolorhov; ?>;
}
/*Blog's Styles*/

.navigation{
clear:left;
padding: 2px 0 0 0;
text-align:left;
margin-top:10px;
height:18px;
cursor:pointer;
border:none;
font-weight:bold;
font-size:12px;
width:590px;
float:left;
border:solid black 0px;
}

.post{
float:left;
padding: 1px 0 10px 0;
margin: 0px 0 0px 0;
border:solid yellow 0px;
width:100%;
}

.post h2{
font-family: Georgia, Sans-serif;
font-size: 16px;
text-align:left;
padding:0 0 0 0;
margin:0 0 0 0;
border:solid red 0px;
}

.post h2 a{
color:<?php echo $posth2acolor; ?>;
font-weight:normal;
padding:0 0 0 0;
margin:0 0 0 0;
border:solid black 0px;
}

.post h2 a:hover{
color:<?php echo $posth2acolorhov; ?>;
}

.entry{
line-height: 18px;
padding:1px 0 0 0;
margin:0 0 0 0;
border:solid green 0px;
}

p.postmetadata{
padding: 5px 0 10px 0;
margin:0 0 0 0;
border:solid gray 0px;
}

.thecontent{
width:700px;
border-top:solid black 0px;
padding: 5px 0 10px 0;
margin:0 0 0 20px;
text-align:justify;
float:left;
clear:left;
border:solid black 0px;
}

.previous-entries {
	float: left;
	padding-left: 18px;
	background: url(images/mini-nav-left.gif) no-repeat left center;
	color:<?php echo $acolor ;?>;
}
.next-entries {
	float: left;
	padding-right: 18px;
	background: url(images/mini-nav-right.gif) no-repeat right center;
	color:<?php echo $acolor ;?>;
}

.post-date {
	width: 45px;
	height: 49px;
	float:left;
	background: url(images/date-bg.gif) no-repeat;
	margin:0 5px 0 18px;
	border:solid black 0px;
}
.post-month {
	font-size: 11px;
	text-transform: uppercase;
	color: <?php echo $datemm;?>;
	text-align: center;
	display:block;
	line-height: 11px;
	padding-top: 2px;
	margin-left: -3px;
}
.post-day {
	font-size: 18px;
	text-transform: uppercase;
	color: <?php echo $datedd;?>;
	text-align: center;
	display:block;
	line-height: 18px;
	padding-top: 7px;
	margin-left: -3px;
}

.post-comments {
background: url(images/mini-comments.gif) no-repeat left center;
padding-left: 18px;
float: right;
font-size: 95%;
}

.post-cat{
	background: url(images/mini-category.gif) no-repeat left center;
	padding-left: 18px;
	float:left;
	font-size: 95%;
	color: <?php echo $postcat;?>;
}

.comments-template{
margin: 10px 0 0 0;
border-top: 0px solid #ccc;
padding: 10px 0 0 0;
}

.comments-template p{
margin-left:20px;
}

.comments-template ol{
margin: 0;
padding: 0 0 15px;
list-style: none;
}

.comments-template ol li{
margin: 10px 0 0;
line-height: 18px;
padding: 0 0 10px;
border-bottom: 0px solid #ccc;
}

.comments-template h2, .comments-template h3{
font-family: Georgia, Sans-serif;
font-size: 15px;
}

.commentmetadata{
font-size: 12px;
text-align:left;
border:solid black 0px;
}

.comments-template p.nocomments{
padding: 0;
}

.comments-template textarea{
font-family: Arial, Helvetica, Georgia, Sans-serif;
font-size: 12px;
}

#comments{
margin:20px;
}

.thepst{
font-weight:bold;
color:<?php echo $bodytextcolor;?>;
}

#respond{
width:130px;
margin:auto;
}

#avatar{
margin:0 5px 0 20px;;
float:left;
}

.comment-text{
margin:10px 0 0 0;
text-align:left;
border:solid black 0px;
}

.txt_big{
width:180px;
height:22px;
float:left;
margin:3px 0 0 5px;
border:none;
outline:none;
background:none;
border:solid black 0px;
}

.txt_bg{
background:url(images/txt.png) no-repeat;
width:192px;
height:32px;
outline:none;
text-align:left;
vertical-align:center;
margin:0 0 5px 20px;;

border:solid red 0px;
}


textarea.comment{
width:400px;
height:100px;
background-color:#FAFAFA;
border:solid #82C0DF 1px;
outline:none;
clear:left;
float:left;
}

#lbl1{
float:right;
border:solid black 0px;
margin:10px 430px 0 0;
}

#lbl2{
float:right;
border:solid black 0px;
margin:10px 330px 0 0;
}

#lbl3{
float:right;
border:solid black 0px;
margin:10px 468px 0 0;
}

.sb{
background:url(images/btn.png);
color:#0E82BB;
height:32px;
width:85px;
cursor:pointer;
border:none;
font-weight:bold;
float:left;
clear:left;
margin:5px 0 0 0;
}

.sb:hover{
color:<?php echo $menuacolorhover;?>;
}

noscript div { background: #ccc; border: 1px solid #900; margin: 20px 0; padding: 15px }

.coda-nav-left{
position:absolute;
width:70px;
margin-left:20px;
border:solid black 0px;
}
.coda-nav-right{
position:absolute;
width:70px;
margin-left:857px;
border:solid black 0px;

}

#more_li{
width:60px;
height:35px;
}

#more_li a:hover{
color:#3BA2FE;
}

.textwidget, .widget{
float:left;
}

.aligncenter{
clear: both;
display: block;
margin-left: auto;
margin-right: auto;
}

.coda-slider-wrapper { padding: 0px 0px;border:solid yellow 0px;}
.coda-slider { background: #ebebeb }

/* Use this to keep the slider content contained in a box even when JavaScript is disabled */
.coda-slider-no-js .coda-slider {  overflow: auto !important; padding-right: 20px }

/* Change the width of the entire slider (without dynamic arrows) */
.coda-slider { width: 905px;height:234px;margin:21px 21px;padding:0px;border:solid red 0px;  } 
.coda-slider .panel { width: 905px;height:234px;margin:0px 0px;padding:0px;border:solid red 0px;  } 
/*

.coda-slider-wrapper.arrows .coda-slider, .coda-slider-wrapper.arrows .coda-slider .panel { width: 947px;height:225px; }
.coda-slider-wrapper.arrows .coda-slider { margin: 0 10px }


.coda-nav-left a, .coda-nav-right a { background: #000; color: #fff; padding: 5px; width: 100px }


.coda-nav ul li a.current { background: #39c }
*/


/* Panel padding */
.coda-slider .panel-wrapper {  }

/* Preloader */
.coda-slider p.loading { padding: 20px; text-align: center }

/* Don't change anything below here unless you know what you're doing */

.submenu-back{
background:url(images/bc.png) no-repeat right center;
}

.coda-slider-wrapper { clear: both; overflow: auto }
.coda-slider { float: left; overflow: hidden; position: absolute }
.coda-slider .panel { display: block; float: left }
.coda-slider .panel-container { position: relative }
<?php
}
}

//$col['menuacolor']=$style_vars['menuacolor'];
//$col['menuacolorhover']=$style_vars['menuacolorhover'];
//$col['li_back_nor_col']=$style_vars['li_back_nor_col'];
//$col['li_back_hov_col']=$style_vars['li_back_hov_col'];

//update_option("camouflage_col",$col);
		
main_style();

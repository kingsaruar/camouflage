<?php
$gbcur=array();
$gb=array();
get_default_options();
add_action('admin_menu', 'my_plugin_menu');


function my_plugin_menu() {
	add_menu_page( 'Camouflage General Settings', 'Camouflage', 'manage_options', 'camouflage-theme-settings', 'camouflage_settings', $icon_url, 3 );
	add_submenu_page( 'camouflage-theme-settings', 'Camouflage Skins Settings', 'Skins', 'manage_options', 'camouflage-skins-settings', 'camouflage_skins');
	//add_submenu_page( 'camouflage-theme-settings', 'Camouflage General Settings', 'Camouflage', 'manage_options', 'camouflage-theme-settings', 'camouflage_settings');
	add_submenu_page( 'camouflage-theme-settings', 'Camouflage Slide Settings', 'Silde Images', 'manage_options', 'camouflage-slide-settings', 'camouflage_slide');
	add_submenu_page( 'camouflage-theme-settings', 'Camouflage Featured Posts', 'Featured Posts', 'manage_options', 'camouflage-fp-settings', 'camouflage_fp');
	add_submenu_page( 'camouflage-theme-settings', 'Camouflage Connections Settings', 'Site Connect', 'manage_options', 'camouflage-connections-settings', 'camouflage_connect');
	add_submenu_page( 'camouflage-theme-settings', 'Camouflage Google Analytics', 'Google Analytics', 'manage_options', 'camouflage-ga-settings', 'camouflage_ga');

}

function camouflage_sample() {
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	
	$page_url=get_admin_url()."admin.php?page=camouflage-sample-settings";
	?>
		<div class="wrap">
			<p>Sample Settings</p>
		</div>
	<?php
}

function camouflage_settings() {
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	
	$page_url=get_admin_url()."admin.php?page=camouflage-theme-settings";
	
	if(isset($_POST['btn']))
	{
		
		$gs['fpnumber']=$_POST['fpnumber'];
		$gs['showslide']=$_POST['showslide'];
		$gs['slidepage']=$_POST['slidepage'];
		$gs['footer']=$_POST['footer'];
		$gs['menu_ani']=$_POST['menu_ani'];
		$gs['sidebar_ani']=$_POST['sidebar_ani'];
		$gs['logo_url']=$_POST['logo_url'];
		
		update_option("camouflage_gs",$gs);
		
		if($_POST['blog_menu']==true)
		{
			if($_POST['blog_title']!=''):
			
			$gb['blog_menu']=$_POST['blog_menu'];
			$gb['blog_title']=$_POST['blog_title'];
			$gb['blog_title_order']=$_POST['blog_title_order'];
			
			$gbcur=get_option("camouflage_gb");
			update_option("camouflage_gb",$gb);
			$gb=get_option("camouflage_gb");
			mysql_query("delete from wp_posts where post_title='".$gbcur['blog_title']."'");
			
			global $user_ID;
			$new_post = array(
			'post_title' => $gb['blog_title'],
			'post_content' => '<!--Camouflage Blog Page-->',
			'post_status' => 'publish',
			'post_date' => date('Y-m-d H:i:s'),
			'post_author' => $user_ID,
			'post_type' => 'page',
			'menu_order' => $gb['blog_title_order'],
			'post_name' => 'cfblog',
			'post_category' => array(0)
			);
			wp_insert_post($new_post);
			
			endif;
		}
		else
		{
			$gb=get_option("camouflage_gb");
			mysql_query("delete from wp_posts where post_title='".$gb['blog_title']."'");
			delete_option(camouflage_gb);
			$gb=get_option("camouflage_gb");
			
		}
		
		$gp['parent_link']=$_POST['parent_link'];
		update_option("camouflage_gp",$gp);
		$gp=get_option("camouflage_gp");
		
			
		
		echo "<div id='setting-error-settings_updated' class='updated settings-error'><strong>Settings Updated</strong></div>";
	}
	
	$gp=get_option("camouflage_gp"); 
	$gs=get_option("camouflage_gs");
	$gb=get_option("camouflage_gb");
	$allposts =  get_posts('post_type=page&numberposts=-1&orderby=post_date&order=DESC');
    $posts = array();
	
    foreach($allposts as $p){
        $posts[$p->ID]=$p->post_title;
    }

	?>
		<div class="wrap">
			<p>&nbsp;</p>
			<form name="form1" method="post" action="<?php echo $page_url; ?>">
				<table style='width: 40%;'>
					<tr>
						<td>
							Show maximum	<select name='fpnumber'>
										<?php for($i=0;$i<10;$i++){ 
												if( ($i+1) ==$gs['fpnumber']) $sel="selected='selected'";
												else					$sel="";
										?>
										<option <?php echo $sel ?> value='<?php echo $i+1 ?>'><?php echo $i+1 ?></option>
										 
										<?php } ?>
							</select> posts in Featured Post.
						</td>
					</tr>
					
					<tr>
						<td>
							<fieldset style='border: solid darkgray 1px;padding:10px 0 0 10px;'><legend>Show Slide Animation in:</legend>
								<p><label for="all"><input <?php if('all'==$gs['showslide']) echo "checked='checked'"; ?> id="all" type='radio' name='showslide' value='all' />All Pages and Posts</label></p>
								<p><label for="page"><input <?php if('page'==$gs['showslide']) echo "checked='checked'"; ?> id="page" type='radio' name='showslide' value='page' />All Pages</label></p>
								<p><label for="post"><input  <?php if('post'==$gs['showslide']) echo "checked='checked'"; ?>  id="post" type='radio' name='showslide' value='post' />All Posts</label></p>
								<p><label for="selected"><input  <?php if('selected'==$gs['showslide']) echo "checked='checked'"; ?>  id="selected" type='radio' name='showslide' value='selected' />This page only: 
									<select id='selected' name='slidepage'>
										<?php foreach($posts as $key=>$value){ 
												if($key==$gs['slidepage']) $sel="selected='selected'";
												else					$sel="";
										?>
										<option <?php echo $sel ?> value='<?php echo $key ?>'><?php echo $value ?></option>
										<?php } ?>
									</select>
									</label></p>
							</fieldset>
						</td>
					</tr>
					
					<tr>
						<td>
							<p><label for='menu_ani'><input <?php if($gs['menu_ani']=='on') echo "checked='checked'" ?> id='menu_ani' type='checkbox' name='menu_ani'  />Enable startup animated effect on Menubar</label></p>
							<p><label for='sidebar_ani'><input <?php if($gs['sidebar_ani']=='on') echo "checked='checked'" ?> id='sidebar_ani' type='checkbox' name='sidebar_ani'  />Enable startup animated effect on Sidebar</label></p>
							<p><label for='parent_link'><input <?php if($gp['parent_link']=='on') echo "checked='checked'" ?> id='parent_link' type='checkbox' name='parent_link'  />Disable link on parent menu item</label></p>
							<fieldset style='border: solid darkgray 1px;padding:10px 0 0 10px;'><legend>Blog Page Setup</legend>
							<p><label for='blog_menu'><input <?php if($gb['blog_menu']=='on') echo "checked='checked'" ?> id='blog_menu' type='checkbox' name='blog_menu'  />Show Blog Menu</label></p>
							<p>Blog Title <input type="text" id="blog_title" name="blog_title" value="<?php if($gb['blog_title']!='') echo $gb['blog_title']; else echo "Blog"; ?>" />&nbsp;&nbsp;Page Order <input style='width:30px;' type="text" id="blog_title_order" name="blog_title_order" value="<?php if($gb['blog_title_order']!='') echo $gb['blog_title_order']; else echo "0"; ?>" /></p>
							</fieldset>
						</td>
					</tr>
					
					<tr>
						<td>
							<p>Footer Text:-   &nbsp; (use %y to display current year, %b for blog title)</p>
							<textarea name="footer" rows="3" cols="60"><?php echo $gs['footer']; ?></textarea>
						</td>
					</tr>
					<tr>
						<td>
							<p>Logo:-   &nbsp; (keep blank for no logo)</p>
							<p><input value='<?php echo $gs['logo_url']  ?>' id='logo_url' type='textbox' name='logo_url'  /></p>
						</td>
					</tr>
					
				<tr>
					
					<td><br/><input type='submit' name='btn' value='   Save   ' /></td>
				</tr>
				</table>
			</form>
		</div>
	<?php
}

function camouflage_ga() {
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	$page_url=get_admin_url()."admin.php?page=camouflage-ga-settings";
	
	if(isset($_POST['btn']))
	{
		update_option("camouflage_ga",$_POST['ga']);
		
		echo "<div id='setting-error-settings_updated' class='updated settings-error'><strong>Settings Updated</strong></div>";
		
	}
	
	?>
		<div class="wrap">
			<p>Enter your Google Analytics code</p>
			
			<form name="form1" method="post" action="<?php echo $page_url; ?>">
				<p><textarea name="ga" rows="5" cols="60"><?php echo get_option('camouflage_ga'); ?></textarea></p>
				<p><input type='submit' name='btn' value='   Save   ' /></p>
			</form>
		</div>
	<?php
}



function camouflage_fp() {
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
  
	$page_url=get_admin_url()."admin.php?page=camouflage-fp-settings";
	
	
	if(isset($_POST['btn']))
	{
		$fp=array();
		for($i=0;$i<10;$i++)
		{
			$fp[]=$_POST['fp'.($i+1)];
		}
		
		update_option("camouflage_fp",$fp);
		echo "<div id='setting-error-settings_updated' class='updated settings-error'><strong>Settings Updated</strong></div>";
	}
	
	$fp=get_option("camouflage_fp");
	
	$allposts =  get_posts('numberposts=-1&orderby=post_date&order=DESC');
    $posts = array();
	
    foreach($allposts as $p){
        $posts[$p->ID]=$p->post_title;
    }
	?>
		<div class="wrap">
			<p>Select your featured posts here.</p>
			<form name="form1" method="post" action="<?php echo $page_url; ?>">
			<table style='width: 40%;'>
				<thead>
					<th></th>
					<th></th>
				</thead>
				
				<?php for($i=0;$i<10;$i++)
				{
				?>
				<tr>
					<td>Featured Post <?php echo $i+1; ?></td>
					<td>
						<select name='fp<?php echo $i+1; ?>'>
							<?php
								foreach($posts as $key=>$value)
								{
									if($key==$fp[$i]) $sl="selected='selected'";
									else $sl='';
									?>
										<option <?php echo $sl; ?> value='<?php echo $key; ?>'><?php echo $value; ?></option>
									<?php
								}
							?>
						</select>
					</td>
				</tr>
				<?php
				}
				?>
				<tr>
					<td></td>
					<td><input type='submit' name='btn' value='   Save   ' /></td>
				</tr>
			</table>
			</form>
		</div>
	<?php
}

function camouflage_connect() {
	if (!current_user_can('manage_options'))  {
	wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	$page_url=get_admin_url()."admin.php?page=camouflage-connections-settings";
	
	$csarray=array(
					'Facebook'=>'csfacebook',
					'Twitter'=>'cstwitter',
					'Linkedin'=>'cslinkedin',
					'Flickr'=>'csflickr',
					'FriendFeed'=>'csfriendfeed',
					);
	
	if(isset($_POST['btn']))
	{
		foreach($csarray as $key => $value)
					$cs[$value]=$_POST[$value];
		
		update_option("camouflage_connect",$cs);
		echo "<div id='setting-error-settings_updated' class='updated settings-error'><strong>Settings Updated</strong></div>";
	}
	
	$cs=get_option("camouflage_connect");
	
	?>
		<div class="wrap">
			<p>Connections Settings</p>
			<p>Provide your links:-</p>
			<form name="form1" method="post" action="<?php echo $page_url; ?>">
			<table style='width: 40%;'>
				<thead>
					<th></th>
					<th></th>
				</thead>
				
				<?php foreach($csarray as $key=>$value)
				{
				?>
				<tr>
					<td><?php echo $key; ?></td>
					<td><input type="textbox" name="<?php echo $value; ?>" value="<?php echo $cs[$value]; ?>"/></td>
				</tr>
				<?php
				}
				?>
				
				<tr>
					<td></td>
					<td><input type='submit' name='btn' value='   Save   ' /></td>
				</tr>
				
			</table>
			</form>
		</div>
	<?php
}

function camouflage_slide() {
  if (!current_user_can('manage_options'))  {
    wp_die( __('You do not have sufficient permissions to access this page.') );
  }
  $page_url=get_admin_url()."admin.php?page=camouflage-slide-settings";


  $slides=get_option("camouflage_slides");
  
  if(isset($_GET['delete']))
  {
	//print_r($slides);
	
	foreach($slides as $key=>$value)
		if($_GET['delete']==$key) unset($slides[$key]);;
	
	/*
	for($i=0;$i<count($slides);$i++)
	{
		echo $slides[$i]['image_url']."--<br/>";
		if($_GET['delete']==$slides[$i]['image_url']) break;
	}
	
	unset($slides[$i]);
	*/
	
	update_option("camouflage_slides", $slides);
	//wp_redirect($page_url);
  }
  
  if(isset($_POST['btn']))
  {
	
	if(''==$_POST['image_url'])
	{
		echo "<div id='setting-error-settings_updated' class='updated settings-error'><strong>Blank URL!</strong></div>";
		return;
	}
	
	$sub_options=array();
	$sub_options['image_url']=$_POST['image_url'];
	$sub_options['image_link']=$_POST['image_link'];
	$sub_options['image_alt']=$_POST['image_alt'];
	
	$slides[]=$sub_options;
	update_option("camouflage_slides", $slides);
  }
  
  $slides=get_option("camouflage_slides");
  
  //print_r($_SERVER);
	?>
  <div class="wrap">
		<p>Add or delete your slide images here. (Recommended image size is 905px x 234px, different size will be auto resized.)</p>
	<form name="form1" method="post" action="<?php echo $page_url; ?>">
		<table>
			<tr>
				<td>Image URL</td>
				<td><input type="textbox" name="image_url" value="" /></td>
			</tr>

			<tr>
				<td>Image Link</td>
				<td><input type="textbox" name="image_link" value="" /></td>
			</tr>

			<tr>
				<td>Alt Text</td>
				<td><input type="textbox" name="image_alt" value="" /></td>
			</tr>
			
			<tr>
				<td></td>
				<td><input type="submit" name="btn" value="   Add   " /></td>
			</tr>
		</table>
	</form>
	
	<?php
	if(is_array($slides))
	{
	?>
	<table style="width: 70%; border: solid black 1px;">
		<thead>
			<th>Image URL</th>
			<th>Link</th>
			<th>Alt Text</th>
			<th>Action</th>
		</thead>
	<?php
		
			foreach($slides as $key=>$slide)
			{
				echo "
						<tr>
							<td>".$slide['image_url']."</td>
							<td>".$slide['image_link']."</td>
							<td>".$slide['image_alt']."</td>
							<td><a href='".$page_url."&delete=".$key."'>Delete</a></td>
						</tr>
						";
			}
		
	?>
	</table>
	<?php
	}
	?>

  </div>
  <?php

}

function get_default_options()
{
	if(!get_option('camouflage_gs'))
		update_option('camouflage_gs',array(
						'fpnumber'=>5,
						'showslide'=>'page',
						'footer'=>'&copy %y %b',
						'page_ani'=>'on',
						'sidebar_ani'=>'on',
						'blog_menu'=>'on',
						'logo_url'=>get_bloginfo('template_url').'/images/sample-logo.png',
						));	
						
	if(!get_option('camouflage_slides'))
		update_option('camouflage_slides',array(
						'0'=>array('image_url'=>'http://www.demo.halalit.net/camouflage/wp-content/uploads/2010/09/1.jpg','image_link'=>'http://www.halalit.net','image_alt'=>''),
						'1'=>array('image_url'=>'http://www.demo.halalit.net/camouflage/wp-content/uploads/2010/09/2.jpg','image_link'=>'http://www.halalit.net','image_alt'=>''),
						'2'=>array('image_url'=>'http://www.demo.halalit.net/camouflage/wp-content/uploads/2010/09/3.jpg','image_link'=>'http://www.halalit.net','image_alt'=>''),
						'3'=>array('image_url'=>'http://www.demo.halalit.net/camouflage/wp-content/uploads/2010/09/4.jpg','image_link'=>'http://www.halalit.net','image_alt'=>''),
						'4'=>array('image_url'=>'http://www.demo.halalit.net/camouflage/wp-content/uploads/2010/09/5.jpg','image_link'=>'http://www.halalit.net','image_alt'=>''),

						));
						
	if(!get_option('camouflage_skin')) update_option('camouflage_skin','redmania');
}

function camouflage_skins() {
	if (!current_user_can('manage_options'))  {
		wp_die( __('You do not have sufficient permissions to access this page.') );
	}
	
	$page_url=get_admin_url()."admin.php?page=camouflage-skins-settings";
	
	if(isset($_GET['activate']))
	{
		update_option('camouflage_skin',$_GET['activate']);
		echo "<div id='setting-error-settings_updated' class='updated settings-error'><strong>Skin Activated</strong></div>";
	}
	
	$cskin=get_option('camouflage_skin');
	
	$dir="../wp-content/themes/camouflage/skins";
	if(!is_dir($dir))
	{
		echo "Error: Couldn't access Camouflage skins directory.";
		return;
	}
	
	$dir_handler=opendir($dir);
	$skin_arr=array();
	while($skin=readdir($dir_handler))
	{
		$skin_dir=$dir.'/'.$skin;
		$skin_file=$skin_dir.'/index.php';
		if(!is_file($skin_file)) continue;
		
		$skin_details=get_skin_details($skin_file,$skin_dir);
		if(is_array($skin_details)) $skin_arr[$skin]= $skin_details;
	}
	
	$cskin=get_option('camouflage_skin');
	$cskin_arr=$skin_arr[$cskin];
	unset($skin_arr[$cskin]);
	extract($cskin_arr,EXTR_SKIP);
	$screenshot=$skindirectory."/screenshot.png";
	
	?>
		<div class="wrap">
			<div>
				<h2>Current Skin</h2>
				<div>
					<?php if(is_file($screenshot)) echo "<img alt='{$skinname}' width='200px' height='150px' src='{$screenshot}' />"; ?>
				</div>
				<div>
					<h4><?php echo $skinname ." ".$version." by ".$author  ?></h4>
				</div>
			</div>
			<br/>
			<h3>Available Skins</h3>
		<?php
		foreach ($skin_arr as $key=>$value)
		{
			unset($skinname,$version,$author,$description,$authoruri,$skinuri,$skindirectory,$skinfile);
			extract($value,EXTR_SKIP);
			$screenshot=$skindirectory."/screenshot.png";
		?>
			<div style='float:left;margin-right:10px;width:300px;'>
				<h4><?php echo $skinname ?></h4>
				
				<div style="width:200px;height:150px;border:solid darkgray 1px;">
					<?php if(is_file($screenshot)) echo "<img alt='{$skinname}' width='200px' height='150px' src='{$screenshot}' />"; ?>
				</div>
				
				<table>
					<tr>
						<td>Description:</td>
						<td><?php echo $description ?></td>
					</tr>
					<tr>
						<td>Version:</td>
						<td><?php echo $version ?></td>
					</tr>
					<tr>
						<td>Author:</td>
						<td><a target='_blank' href='<?php echo $authoruri; ?>'><?php echo $author; ?></a></td>
					</tr>
					<tr>
						<td>Skin URI:</td>
						<td><a target='_blank' href='<?php echo $skinruri; ?>'><?php echo $skinuri; ?></a></td>
					</tr>
					<tr>
						<td></td>
						<td><a href='<?php echo $page_url; ?>&activate=<?php echo $key ?>'>Activate</a></td>
					</tr>
				</table>
			</div>
		<?php
		}
		?>
		</div>
	<?php
}

function get_skin_details($skfile,$skdir){
		$fp=fopen($skfile,'r');
		$skin_details=array();
		$skin_record=false;
		while(!feof($fp))
		{
			$skin_text=trim(fgets($fp,1024));
			if("/*"==$skin_text) $skin_record=true;
			
			if(false==$skin_record)	continue;
			
			if($skin_text!="/*" && $skin_text!="*/" && $skin_text!="")
			{
				//$skin_text=str_replace('http:','http|',$skin_text);
				$nameval=explode(':',$skin_text,2);
				$nameval['0']=strtolower(str_replace(' ','',$nameval['0']));
				if(is_array($nameval)) $skin_details[$nameval['0']]=trim($nameval['1']);
			}
		
			$skin_details['skinfile']=$skfile;
			$skin_details['skindirectory']=$skdir;
			if("*/"==$skin_text) break;
			
		}
		if(count($skin_details)==0) $skin_details=false;
		return $skin_details;
}
?>

<?php
add_action('widgets_init', create_function('', 'return register_widget("cf_site_connect");'));
add_action('widgets_init', create_function('', 'return register_widget("cf_featured_posts");'));

class cf_site_connect extends WP_Widget {
	function cf_site_connect() {
		parent::WP_Widget(false, $name = 'Camouflage Site Connect');	
	}
	
	function form($instance) {
		extract($instance);
		$title = esc_attr($instance['title']);
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
		<p>To configure this goto <a title='Click to go' href='<?php echo get_admin_url()."admin.php?page=camouflage-connections-settings" ?>'>Camouflage > Site Connect</a></p>
		<?php 
	}

	function update($new_instance, $old_instance) {				
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
    }

	function widget($args, $instance) {
		if(''==$instance['title']) $instance['title']="Connect";
		
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
		
		?>
		
		
			<li id="site_connect" class="widget widget_site_connect">
			<h2><?php echo $instance['title'] ?></h2>		
				<ul>
					<?php foreach($csarray as $key=>$value){
						if($cs[$value]!='')
						echo '<li style="display:inline;"><a href="'.$cs[$value].'" target="_blank"><img width="50px" height="50px" title="'.$key.'" src="'.get_bloginfo('stylesheet_directory').'/images/'.$value.'.png" /></a></li>';
					}
					?>
				</ul> 
			</li> 
		
		<?php
	}
}


class cf_featured_posts extends WP_Widget {
	function cf_featured_posts() {
		parent::WP_Widget(false, $name = 'Camouflage Featured Posts');	
	}
	
	function form($instance) {
		extract($instance);
		$title = esc_attr($instance['title']);
		?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
		<p>To configure this goto <a title='Click to go' href='<?php echo get_admin_url()."admin.php?page=camouflage-fp-settings" ?>'>Camouflage > Featured Posts</a></p>
		<?php 
	}

	function update($new_instance, $old_instance) {				
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		return $instance;
    }

	function widget($args, $instance) {

		if(''==$instance['title']) $instance['title']="Featured Posts";
					
		$num=get_option('camouflage_gs');
		$num=$num['fpnumber'];
		$fp=get_option('camouflage_fp');
		if(is_array($fp)) $fp=array_unique($fp);
		
		if(count($fp)==0 || !is_array($fp))
		{
			echo "No featured posts selected";
			return;
		}
		
		$posts=array();
		$i=0;
		foreach($fp as $value)
		{
			if($i==$num) break;
			
			$posts[]=array('guid'=>get_permalink($value) , 'post_title'=>get_the_title($value) );
			$i++;
		}

		?>
		
		 
			<li id="featured_posts" class="widget widget_featured_posts">
			<h2><?php echo $instance['title'] ?></h2>		
				<ul>
					<?php
					foreach($posts as $value)
						echo "<li><a href='".$value['guid']."'>".$value['post_title']."</a></li>";
					?>
				</ul> 
			</li> 
		
		<?php
	}
}
		
?>

<?php

defined("ABSPATH") or exit;
$contents = get_grab_content('google_play');
?>
<div style="width: 15%; float: left; margin: 50px; padding: 25px; background-color: white; border-radius: 5px; line-height: 1.4em; border: 1px solid #F0F3FE;">
	<a style="font-size:16px; cursor: pointer;" onclick="<?php get_grab_content('google_play'); ?>"><img src="<?php echo BOT_PLUGIN_URL; ?>/includes/imgs/google_play.png" style="margin-right: 10px; top: 7px; position: relative;"> google play store</a>
</div>
<div style="width: 70%; float: left; padding: 50px;">
<h1 style="margin-bottom: 60px;">Google App Store</h1>
<?php foreach($contents as $content) { ?>
	<a href="<?php echo $content['href']?>" target="_blank" style="float: left; width: 150px; height: 200px; margin: 0 10px 10px 0; border: 1px solid #000; border-radius: 3px; background-color: #000; text-decoration: none;">
		<img src="<?php echo $content['image']?>" width="150" height="150"/>
		<p style="color: #fff; text-align: center; font-size: 12px;"><?php echo $content['title']?></p>
	</a>
<?php } ?>
<div>
<?php ?>
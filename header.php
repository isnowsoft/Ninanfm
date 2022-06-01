<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

<?php include_once("description.php"); ?>
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
	<link rel="stylesheet" type="text/css"  href="<?php echo esc_url( get_template_directory_uri() ); ?>/style.css" media="screen" />
	<meta name="baidu-site-verification" content="fuqotl6Po9" />
	<?php wp_head(); ?>
	<script type="text/javascript" src="https://upcdn.b0.upaiyun.com/libs/jquery/jquery-2.0.2.min.js"></script>
	<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/ccoooo.js"></script>
	<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/akina.js"></script>
//<![CDATA[
if (typeof jQuery == 'undefined') {
  document.write(unescape("%3Cscript src='/wp-includes/js/jquery/jquery.js' type='text/javascript'%3E%3C/script%3E")); 
}
// ]]>
</script>
<script type="text/javascript">

$(function(){

	$(".case li").hover(function(){

		$(".x",this).stop().css({'left':'20px'}).animate({'left':"100px"},400).show();



		$('.fire',this).show();

	},function(){

		$('.case_w',this).stop().animate({},400);

		$('.fire, .x, .y',this).hide();

	});	

});

</script>
</head>
	<body>
		<div id="wrapper"><div class="gdtou">
			<div id="header">
				<div class="headerTopa"></div>
				
				<div class="headerMain">
					<div class="logo">
						<h1>
							<a title="<?php bloginfo('name'); ?>" href="<?php bloginfo('url'); ?>">
								<img border="0" alt="<?php bloginfo('name'); ?>" src="<?php bloginfo('template_directory'); ?>/images/logo.png" />
							</a>
						</h1>
					</div><div class="nvada">
					<div class="nav clear">
						<?php wp_nav_menu( array( 'menu' => 'mymenu', 'depth' => 1) );?><!--列出顶部导航菜单，菜单名称为mymenu，只列出一级菜单-->     				
					</div>
</div>
<div class="geren">
<div class="headerTop">
<div class="navBar clear">
<ul class="rightFloat">
						<?php
							$current_user = wp_get_current_user();
							if ( 0 == $current_user->ID ) {
						?>
							<li><a href="<?php bloginfo('url'); ?>/so">搜索</a></li>
							<li><a href="<?php bloginfo('url'); ?>/wp-login.php?action=register">注册</a></li>
							<li><a href="<?php bloginfo('url'); ?>/login">登录</a></li>
						<?php
							} else {
						?>
							<li><a href="<?php bloginfo('url'); ?>/archives/author/<?php echo $current_user->user_login;?>">个人中心</a></li>
							<?php
							if( $current_user->roles[0] == 'administrator'|| $current_user->roles[0] == 'editor') {
							?>
							<li><a href="<?php bloginfo('url'); ?>/wp-admin/">高级管理</a></li>
							<?php
							}
							?>
							<li><a href="<?php echo wp_logout_url( get_permalink() ); ?>" title="Logout">注销</a></li>
						<?php
							}
						?> 
</ul>
</div>
</div>

</div>
</div>
			</div></div>
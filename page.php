<?php
/*
Template Name: 默认页面模板
*/
?>
<?php get_header(); ?>
<div id="main">
				<div class="mainContent clear">
					<div class="pageNav leftFloat">
						<div class="aboutMenu">
							<h3><span>About</span><a class="pageIndex" href="<?php bloginfo('url'); ?>/about">关于我们</a></h3>
						</div>
						<div class="aboutMenu">
							<h3><span>Contact Us</span><a href="<?php bloginfo('url'); ?>/about/contactus">招募信息</a></h3>
						</div>
						<div class="aboutMenu">
							<h3><span>Contact Us</span><a href="<?php bloginfo('url'); ?>/tougao">投稿注明</a></h3>
						</div>
						<div class="aboutMenu">
							<h3><span>Link</span><a href="<?php bloginfo('url'); ?>/about/link">友情链接</a></h3>
						</div>
						<div class="aboutMenu">
							<h3><span>Guestbook</span><a href="<?php bloginfo('url'); ?>/copyright">版权声明</a></h3>
						</div>

					</div>
					<div class="pageContainer rightFloat">
						<h2 class="pageTitel"><?php the_title(); ?></h2>
<div class="pageContent">
	<?php while(have_posts()) : the_post(); ?>
						<?php the_content(); ?>
						<?php endwhile; ?>

        				</div>
						<?php if (comments_open()) comments_template( '', true ); ?>
					</div>			
				</div>
				
			</div>
<?php get_footer(); ?>
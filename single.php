<?php get_header(); ?>
<div id="main">
				<div class="mainContent clear">
					<div class="artContainer leftFloat" id="post-<?php the_ID(); ?>">
					<?php while(have_posts()) : the_post(); ?>
					<?php setPostViews(get_the_ID()); ?>
						<div class="artTop">
							<div class="artCommentNumber">
								<span class="commentNumber"> 
          							<a><?php comments_popup_link('0', '1', '%', '', '0'); ?></a> 
          						</span>
								<span class="corner"></span>
							</div>
							<h1 class="artTitle"><?php the_title(); ?></h1>
							<p class="artMeta"><div class="summary"><?php echo get_avatar(get_the_author_meta('ID')); ?>
								<div class="zuozhex">作者：<?php the_author_posts_link(); ?>　
								发表时间：<?php the_time('Y-m-d G:i') ?></div>
        					</p>
						</div>
						

        				</div>
        				<div class="artContent">
							<?php the_content(); ?>
        				</div>
        				<div class="summary"><div class="frontback clear">
  	   						<div class="artPre">
  	   							<em class=""><?php if (get_previous_post()) { previous_post_link('上一篇: %link','%title',true);} else { echo "没有了，已经是最后文章";} ?></em>
  	   						</div>
    						<div class="artNext">
    							<em class=""><?php if (get_next_post()) { next_post_link('下一篇: %link','%title',true);} else { echo "没有了，已经是最新文章";} ?> </em>
    						</div>
						</div></div>
						
						<?php comments_template( '', true ); ?>
					<?php endwhile; ?>
					</div>

				</div>
				
			</div>
<?php get_footer(); ?>
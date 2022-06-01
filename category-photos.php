<?php get_header(); ?>
<div id="main">
				<div class="mainContent clear">
					
	
<div class="summary"><div class="fmwm3">记录最美好的画面，<span style="color: #339966;">印刻时光</span>。留得住的才是<span style="color: #339966;">最美</span>的.</div></div>				
<div class="bookContent">
							<ul>
<?php $posts = query_posts($query_string . '&orderby=date&showposts=20&cat=3'); ?>   
							<?php while(have_posts()) : the_post(); ?>
							 <li class="bookPostOne">
									<div class="bookPost">
										<a title="<?php the_title(); ?>" target="_blank" href="<?php the_permalink(); ?>">
											<img width="235" height="152" alt="<?php the_title(); ?>" src="<?php echo catch_that_image() ?>">
										<h3><?php the_title(); ?></h3></a>
										<?php
										$custom_fields = get_post_custom_keys($post_id);
										if (!in_array ('post_copyright', $custom_fields)) :
										?>

										<?php else: ?>

										<?php endif; ?>
									</div>
								</li>
							<?php endwhile; ?>
							</ul>
						</div>
						<div class="navigation clear">
							<div class="prevPage"><?php previous_posts_link('上一页'); ?></div>
							<div class="nextPage"><?php next_posts_link('下一页'); ?></div>
						</div>
					</div>

				</div>
				
			</div>
<?php get_footer(); ?>
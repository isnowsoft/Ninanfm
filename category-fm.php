<?php get_header(); ?>
<div id="main">
				<div class="mainContent clear">
					

<div class="summary"><div class="fmwm3">倾听文字的<span style="color: #339966;">呢喃细语</span>.《呢喃FM》主播交流群：<span style="color: #339966;">476609042</span> 欢迎您加入.</div></div>
<div class="bkContent">
							<ul>
<?php $posts = query_posts($query_string . '&orderby=date&showposts=6&cat=2'); ?>  
							<?php while(have_posts()) : the_post(); ?>
							<li class="bkPostOne"><div class="fmwm2"><a title="<?php the_title(); ?>" target="_blank" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
									<div class="bkPost">
<a title="<?php the_title(); ?>" target="_blank" href="<?php the_permalink(); ?>"><img width="235" height="152" alt="<?php the_title(); ?>" src="<?php echo catch_that_image() ?>"></a></div>

<div class="fmwm">
<?php 
									if ($post->post_excerpt) {
										_e(wp_trim_words( $post->post_excerpt, 38,'...' ));
									} else {
										_e(wp_trim_words( $post->post_content, 38,'...' )); 
									}
									?>
<div class="fmwm4">共 <em class="artViews"><?php echo getPostViews(get_the_ID()); ?> </em>人围观　　♪ <a title="<?php the_title(); ?>" target="_blank" href="<?php the_permalink(); ?>">点击试听</a></div>

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
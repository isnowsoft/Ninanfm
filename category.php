<?php get_header(); ?>
<div id="main">
				<div class="mainContent clear">
					<div class="articleList leftFloat">
						<div class="postList clear">
							<div class="articleListTitle">
<div class="summary"><div class="fmwm3">凹凸的文字<span style="color: #339966;"> 潜移默化着 </span>迷人的情操.</div></div>
							</div>
							<ul>
							<?php while(have_posts()) : the_post(); ?>
								<li>
									<div class="entryImg">
										<a title="<?php the_title(); ?>" target="_blank" href="<?php the_permalink(); ?>">
											<img width="235" height="152" alt="<?php the_title(); ?>" src="<?php echo catch_that_image() ?>">
										</a>
										<?php
										$custom_fields = get_post_custom_keys($post_id);
										if (!in_array ('post_copyright', $custom_fields)) :
										?>
										<span class="entryCopyright">原创</span>
										<?php else: ?>
										<span class="entryCopyright">精选</span>
										<?php endif; ?>
									</div>
									<h3 class="entryTitle">
										<a title="<?php the_title(); ?>" target="_blank" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
									</h3>
									<p class="entryContent">
									<?php 
									if ($post->post_excerpt) {
										_e(wp_trim_words( $post->post_excerpt, 80,'......' ));
									} else {
										_e(wp_trim_words( $post->post_content, 80,'......' )); 
									}
									?>
									</p>
									<div class="entryMeta">
										<?php the_author_posts_link(); ?>
										<em class="entryDate"> / <?php the_time('Y-m-d') ?></em>
									</div>
									<div class="entryCover">
										<em class="entryViews ml2"><?php echo getPostViews(get_the_ID()); ?></em>
										<em class="entryReplys ml2"><?php comments_popup_link('0', '1', '%', '', '0'); ?></em>
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
					<?php include_once("sidebarIndex.php"); ?>
				</div>
				
			</div>
<?php get_footer(); ?>
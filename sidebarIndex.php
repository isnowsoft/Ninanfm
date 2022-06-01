				<div class="sideBar rightFloat">
<div class="mod">
<div class="articleListTitle">
<div class="mod1"><div class="hotNews rightFloat">
<li class="clear">最新推荐</li>

   <?php query_posts('showposts=10'); ?>
<ul>
 <?php while (have_posts()) : the_post(); ?> 
  <li><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></li>  
  <?php endwhile;?>  
     </ul>  

</div></div>
   							
							<h3>活跃会员</h3>	
</div>
							<div class="textwidget">
								<dl class="artAuthor">
									<dd class="artAuthorAvatar">
										<a>
											<img alt="用户头像" src="<?php bloginfo('template_directory'); ?>/images/yiran.jpg">
											<i></i>
										</a>
									</dd>
									<dt>
									<span>站长</span>
										<a href="<?php bloginfo('url'); ?>/archives/author/ninan" title="呢喃" rel="author">呢喃FM</a>
										
									</dt>
									<dd class="artAuthorLink">
										<a class="artAuthorHome" href="<?php bloginfo('url'); ?>/archives/author/ninan">主页</a>
										<a class="artAuthorUrl" href="#">网站</a>
										<a class="artAuthorMessage" href="">空间</a>
									</dd>
								</dl>
								<dl class="artAuthor">
									<dd class="artAuthorAvatar">
										<a>
											<img alt="用户头像" src="<?php bloginfo('template_directory'); ?>/images/yiran.jpg">
											<i></i>
										</a>
									</dd>
									<dt>
										<span>投稿</span>
										<a href="<?php bloginfo('url'); ?>/archives/author/635245397" title="然而" rel="author">然而</a>
										
									</dt>
									<dd class="artAuthorLink">
										<a class="artAuthorHome" href="#">主页</a>
										<a class="artAuthorUrl" href="">空间</a>
										<a class="artAuthorMessage" href="#">微博</a>
									</dd>
								</dl>
								<dl class="artAuthor">
									<dd class="artAuthorAvatar">
										<a>
											<img alt="用户头像" src="<?php bloginfo('template_directory'); ?>/images/yiran.jpg">
											<i></i>
										</a>
									</dd>
									<dt>
										<span>实习</span>
										<a href="<?php bloginfo('url'); ?>/archives/author/jidong" title="ArtofPms" rel="author">悸动</a>
										
									</dt>
									<dd class="artAuthorLink">
										<a class="artAuthorHome" href="#">主页</a>
										<a class="artAuthorUrl" href="">空间</a>
										<a class="artAuthorMessage" href="#">微博</a>
									</dd>
								</dl>
								<dl class="artAuthor">
									<dd class="artAuthorAvatar">
										<a>
											<img alt="用户头像" src="<?php bloginfo('template_directory'); ?>/images/avatar.jpg">
											<i></i>
										</a>
									</dd>
									<dt>
										<span>官方</span>
										<a href="#" title="呢喃fm" rel="author">虚位以待</a>
										
									</dt>
									<dd class="artAuthorLink">
										<a class="artAuthorHome" href="#">主页</a>
										<a class="artAuthorUrl" href="#">网站</a>
										<a class="artAuthorMessage" href="#">微博</a>
									</dd>
								</dl>
								<dl class="artAuthor">
									<dd class="artAuthorAvatar">
										<a>
											<img alt="用户头像" src="<?php bloginfo('template_directory'); ?>/images/avatar.jpg">
											<i></i>
										</a>
									</dd>
									<dt>
										<span>官方</span>
										<a href="#" title="呢喃fm" rel="author">虚位以待</a>
										
									</dt>
									<dd class="artAuthorLink">
										<a class="artAuthorHome" href="#">主页</a>
										<a class="artAuthorUrl" href="#">网站</a>
										<a class="artAuthorMessage" href="#">微博</a>
									</dd>
								</dl>
							</div>
						</div>
						<div class="mod">
							
							<div class="textwidget">
								<div class="adImg">
									<a target="_blank" href="#">
<a href="" target=_blank><img width="100%" src="<?php bloginfo('template_directory'); ?>/images/ad/ad-1.jpg"></a></br>
<a href="" target=_blank><img width="100%" src="<?php bloginfo('template_directory'); ?>/images/ad/ad-2.jpg"></a>
									</a>
								</div>
								
							</div>
						</div>
					</div>
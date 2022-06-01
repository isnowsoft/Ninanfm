<?php get_header(); ?>
<?php

$current_user = wp_get_current_user();
//处理表单，更新用户个人档案
if(isset($_POST['submit_personal'])){
	if ( is_user_logged_in() ) {
		$art=array(
			  'ID' => $current_user->ID,
			  'display_name' => strip_tags(trim($_POST["displayName"])),
			  'user_email' => strip_tags(trim($_POST["userEmail"])),
			  'user_url' => strip_tags(trim($_POST["userUrl"])),
			  'user_qq' => strip_tags(trim($_POST["userQq"])),
			  'user_weibo' => strip_tags(trim($_POST["userWeibo"])),
			  'description' => strip_tags(trim($_POST["description"]))
			  
			);
			$user_id=wp_update_user($art);
		if($user_id){
			//$success_msg = '个人信息更新成功！';
			echo "<script language=\"JavaScript\">alert(\"个人信息更新成功！\");</script>"; 
		}else{
			$success_msg = '个人信息更新失败！';
		}
	}else{
		echo "<script language=\"JavaScript\">alert(\"请登录！\");</script>"; 
	}
}
if(isset($_POST['submit_password'])){
	if ( is_user_logged_in() ) {
		if($_POST['password'] == $_POST['password2']){
			$user = wp_authenticate($current_user->user_login, $_POST['passwordOld']);
			if(is_wp_error($user)){
				$error_msg = '原始密码不正确';
			}else{
				wp_set_password( $_POST['password'], $current_user->ID );
				echo "<script language=\"JavaScript\">alert(\"密码修改成功，可能需要您重新登录！\");</script>"; 
			}
		}else{
			$error_msg = '两次输入的密码不一致！';
		}
	}else{
		echo "<script language=\"JavaScript\">alert(\"请登录！\");</script>"; 
	}
}
if(isset($_GET['author_name'])) :
$curauth = get_userdatabylogin($author_name);
else :
$curauth = get_userdata(intval($author));
endif;
?>
			<div id="main">
				<div class="mainContent clear">
					<div class="authorMain clear">
						<div class="authorMenuBox">
							<div class="userAvatar">
								<div class="zuozhetx"><?php echo get_avatar(get_the_author_meta('ID')); ?></div>
								<p><?php if($curauth->display_name){ echo $curauth->display_name; } ?></p>
							</div>
							<div class="authorMenuSub">
							<?php wp_zan();?>
							<a href="#article">私信TA</a>
							</div>
							<div class="authorMenu">
                 				<a id="authorMenu1" onclick="setTab('authorContent',1,5)" class="hover" href="#article">TA的文章</a>
		                		<a id="authorMenu2" onclick="setTab('authorContent',2,5)" href="#comment">TA的评论</a>
								<?php
								if ( is_user_logged_in() ) {
									if($curauth->ID == $current_user->ID){
								?>
								<a id="authorMenu3" onclick="setTab('authorContent',3,5)" href="#detail">修改</a>
								<?php }} ?>
               				</div>
						</div>
						<div class="authorContentBox clear">  
							<div id="authorContent_1" class="authorContent leftFloat">
								<div class="articleList leftFloat">
									<div class="postList clear">
										<ul>
										<?php if(have_posts()):while(have_posts()) : the_post(); ?>
											<li>
												<div class="entryImg">
													<a title="<?php the_title(); ?>" target="_blank" href="<?php the_permalink(); ?>">
														<img width="235" height="152" alt="<?php the_title(); ?>" src="<?php echo catch_that_image() ?>">
													</a>
												</div>
												<h3 class="entryTitle">
													<a title="<?php the_title(); ?>" target="_blank" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</h3>
												<p class="entryContent"><?php _e(wp_trim_words( $post->post_content, 80,'......' ));?></p>
												<div class="entryMeta">
													<?php the_author_posts_link(); ?>
													<em class="entryDate"> / <?php the_time('Y-m-d') ?></em>
												</div>
												<div class="entryCover">
													<em class="entryViews ml2"><?php echo getPostViews(get_the_ID()); ?></em>
													<em class="entryReplys ml2"><?php comments_popup_link('0', '1', '%', '', '0'); ?></em>
												</div>
											</li>
										<?php endwhile; else: ?>
											<li>
												<div class="entryImg">
													<a title="他还没发表任何文章" target="_blank" href="<?php the_permalink(); ?>">
														<img width="235" height="152" alt="<?php the_title(); ?>" src="<?php echo catch_that_image() ?>">
													</a>
												</div>
												<h3 class="entryTitle">
													<a title="<?php the_title(); ?>" target="_blank" href="<?php the_permalink(); ?>">他还没发表任何文章</a>
												</h3>
												<p class="entryContent">他还没发表任何文章</p>
												<div class="entryMeta">
													<?php the_author_posts_link(); ?>
													<em class="entryDate"> / 0000-00-00</em>
												</div>
												<div class="entryCover">
													<em class="entryViews ml2"><?php echo getPostViews(get_the_ID()); ?></em>
													<em class="entryReplys ml2"><?php comments_popup_link('0', '1', '%', '', '0'); ?></em>
												</div>
											</li>
										<?php endif; ?>
										</ul>
									</div>
									<div class="navigation clear">
										<div class="prevPage"><?php previous_posts_link('上一页'); ?></div>
										<div class="nextPage"><?php next_posts_link('下一页'); ?></div>
									</div>
								</div>
							</div>
							<div id="authorContent_2" class="authorContent leftFloat" style="display:none">
							    <h3 class="authorCommentTitle">最新10条评论</h3>
								<ol class="commentlist">
								<?php
								$show_comments = 10; //评论数量
								//$my_email = get_bloginfo ('admin_email'); //获取博主自己的email
								$my_id = $curauth->ID; 
								$i = 1;
								$comments = get_comments('number=200&status=approve&type=comment&user_id='.$my_id); //取得前200个评论，如果你每天的回复量超过200可以适量加大
								foreach ($comments as $rc_comment) {
										$comment_post_id= $rc_comment->comment_post_ID;
										
										//	if ($rc_comment->comment_author_email != $my_email) {
										?>
										<li class="comment"><?php echo get_avatar($rc_comment->comment_author_email,32); ?>
											<span class="comment_author">
											<?php echo $rc_comment->comment_author; ?> says:<a href="<?php echo get_permalink($rc_comment->comment_post_ID); ?>"><?php echo get_post($rc_comment->comment_post_ID)->post_title;?></a></span>
											<a href="<?php echo get_permalink($rc_comment->comment_post_ID); ?>#comment-<?php echo $rc_comment->comment_ID; ?>">
											<section class="comment-content comment">
											<p>
											<?php if( $rc_comment->comment_parent > 0) {
													echo'@<a href="'.get_permalink($rc_comment->comment_post_ID).'#comment-' . $rc_comment->comment_parent . '">'.get_comment_author( $rc_comment->comment_parent ) . '</a> ' .convert_smilies($rc_comment->comment_content);
												} else { echo convert_smilies($rc_comment->comment_content);}?>
											</p>
											</section>
											</a></li>
										<?php
										if ($i == $show_comments) break; //评论数量达到退出遍历
										$i++;
								//	} // End if
								} //End foreach
								?>
								</ol>
							</div>
							<?php
							if ( is_user_logged_in() ) {
								if($curauth->ID == $current_user->ID){
							?>
						  	<div id="authorContent_3" class="authorContent leftFloat" style="display:none">
								<div class="authorInfoForm">
									<form action="" method="post" name="authorInfoMeta">
										<ul class="authorInfoFormMeta">
											<li><label>注意事项</label>
												带*的必须填写！
											</li>
											<li><label>昵称</label>
												<input type="text" required="" onblur="checkDisplayName()" placeholder="请输入用户名" value="<?php if($curauth->display_name){ echo $curauth->display_name; } ?>" name="displayName" class="authorInfoFormControl">
												<span id="displayName" class="authorFormTips">长度1~12个字符</span>
											</li>
											<li><label>邮箱</label>
												<input type="text" required="" onblur="checkUserEmail()" placeholder="请输入用户邮箱"  value="<?php if($curauth->user_email){ echo $curauth->user_email; } ?>" name="userEmail" class="authorInfoFormControl">
												<span id="userEmail" class="authorFormTips">必须包含@和.符号</span>
											</li>
											<li><label>网址</label>
												<input type="text" onblur="checkUserUrl()" placeholder="请输入个人网站或博客"   value="<?php if($curauth->user_url){ echo $curauth->user_url; } ?>" name="userUrl" class="authorInfoFormControl">
												<span id="userUrl" class="authorFormTips">必须包含http://</span>
											</li>
											<li><label>QQ</label>
												<input type="text"onblur="checkUserQq()" placeholder="请输入个人QQ"  value="<?php if($curauth->qq){ echo $curauth->qq; } ?>" name="userQq" class="authorInfoFormControl">
												<span id="userQq" class="authorFormTips">长度1~12个字符</span>
											</li>
											<li><label>微博地址</label>
												<input type="text" onblur="checkUserWeibo()" placeholder="请输入微博个性域名"   value="<?php if($curauth->weibo){ echo $curauth->weibo; } ?>" name="userWeibo" class="authorInfoFormControl">
												<span id="userWeibo" class="authorFormTips">如：weibo.com/abc，只需填写abc</span>
											</li>
											<li><label>个人介绍</label>
												<textarea type="text" onblur="checkDescription()" placeholder="请输入个人介绍" name="description" class="authorInfoFormControl"><?php if($curauth->description){ echo $curauth->description; } ?></textarea>
												<span id="description" class="authorFormTips">简单介绍</span>
											</li>
											<li>
												<button type="submit" name="submit_personal" class="authorBtnPrimary">确认修改资料</button>
											</li>
										</ul>
									</form>
									<form action="" method="post" name="authorInfoPassword">
										<ul class="authorInfoFormMeta">
											<li><label>原密码</label>
												<input type="password" required="" onblur="checkPasswordOld()" placeholder="请输入你的密码" name="passwordOld" class="authorInfoFormControl">
												<span id="passwordOld" class="authorFormTips">请输入您原来的密码</span>
											</li>
											<li><label>新密码</label>
												<input type="password" required="" onblur="checkPassword()" placeholder="请输入你的新密码" name="password" class="authorInfoFormControl">
												<span id="password" class="authorFormTips">密码必须由字母和数字组成</span>
											</li>
											<li><label>重复新密码</label>
												<input type="password" required="" onblur="checkPassword2()" placeholder="请重复输入你的新密码"  name="password2" class="authorInfoFormControl">
												<span id="password2" class="authorFormTips">两次密码需要相同</span>
											</li>
											<li>
												<button type="submit" name="submit_password" class="authorBtnPrimary">确认修改密码</button>
											</li>
										</ul>
									</form>
								</div>
							</div>
							<?php }} ?> 
							<?php include_once("sidebarIndex.php"); ?>
						</div>
					</div>
				</div>
			</div>
 <?php get_footer(); ?>
<title><?php 
if ( is_home() ) { bloginfo('name');_e(' - ');$paged = get_query_var('paged'); if ( $paged > 1 ) printf('第%s页 - ',$paged); bloginfo('description');

}elseif ( is_search() ) {
$key = wp_specialchars($s, 1);$count = $allsearch->post_count; _e('');_e($key.'"');_e('的结果 - ');$paged = get_query_var('paged');if ( $paged > 1 ) printf('第%s页 - ',$paged);bloginfo('name');wp_reset_query();
}elseif ( is_404() ) {
	_e('404 Not Found(页面未找到) - '); bloginfo('name');
}elseif ( is_author() ) {
	_e('"');_e(trim(wp_title('',0)));_e('"的文章归档 - ');bloginfo('name');
}elseif ( is_single() ){
	_e(trim(wp_title('',0)));_e(' - ');$category = get_the_category();echo $category[0]->cat_name;_e(' - ');bloginfo('name');
}elseif(is_page()){
		_e(trim(wp_title('',0)));_e(' - ');$paged = get_query_var('paged'); if ( $paged > 1 ) printf('第%s页 - ',$paged); bloginfo('name');
}elseif ( is_category() ) { 
		_e(trim(wp_title('',0)));_e(' - ');$paged = get_query_var('paged'); if ( $paged > 1 ) printf('第%s页 - ',$paged); bloginfo('name');
}elseif ( is_month() ) {
	the_time('Y年n月');_e('的文章归档');_e(' - ');$paged = get_query_var('paged'); if ( $paged > 1 ) printf('第%s页 - ',$paged); bloginfo('name');
}elseif ( is_day() ) {
	the_time('Y年n月j日');_e('的文章归档');_e(' - ');$paged = get_query_var('paged'); if ( $paged > 1 ) printf('第%s页 - ',$paged); bloginfo('name');
}elseif (function_exists('is_tag')){
	if ( is_tag() ) {
		_e('标签为"');single_tag_title("", true);_e('"的文章');_e(' - ');$paged = get_query_var('paged'); if ( $paged > 1 ) printf('第%s页 - ',$paged); bloginfo('name');
	}
}
?>
</title>
<?php
    $description = "呢喃fm,是一群热爱小清新文字、图片、有声电台的爱好者组织而成的业余团队.呢喃FM成立于2015年7月25,我们致力于分享有声读物,网络电台,原创文章,小清新文字,小清新图片.";
    $keywords = "呢喃fm,音乐电台,网络电台,小清新文字,小清新图片,呢喃有声电台";
 if (is_home()){
    $description = "呢喃fm,是一群热爱小清新文字、图片、有声电台的爱好者组织而成的业余团队.呢喃FM成立于2015年7月25,我们致力于分享有声读物,网络电台,原创文章,小清新文字,小清新图片.";
    $keywords = "呢喃fm,音乐电台,网络电台,小清新文字,小清新图片,呢喃有声电台";
} elseif ( is_category() ) { 
	if(is_category('article')){
	    $description = "呢喃fm,是一群热爱小清新文字、图片、有声电台的爱好者组织而成的业余团队.呢喃FM成立于2015年7月25,我们致力于分享有声读物,网络电台,原创文章,小清新文字,小清新图片.";
    $keywords = "小清新文字,伤感文章,青春文章,原创文章";
	}elseif(is_category('photos')){
	    $description = "呢喃fm,是一群热爱小清新文字、图片、有声电台的爱好者组织而成的业余团队.呢喃FM成立于2015年7月25,我们致力于分享有声读物,网络电台,原创文章,小清新文字,小清新图片.";
    $keywords = "小清新壁纸,苹果手机壁纸,小清新手机壁纸,精美手机壁纸,小清新图片";
	}elseif(is_category('fm')){
	    $description = "呢喃fm,是一群热爱小清新文字、图片、有声电台的爱好者组织而成的业余团队.呢喃FM成立于2015年7月25,我们致力于分享有声读物,网络电台,原创文章,小清新文字,小清新图片.";
    $keywords = "呢喃fm,音乐电台,网络电台,网络电台在线收听,";
	}elseif(is_category('salon')){
	    $description = "呢喃fm,是一群热爱小清新文字、图片、有声电台的爱好者组织而成的业余团队.呢喃FM成立于2015年7月25,我们致力于分享有声读物,网络电台,原创文章,小清新文字,小清新图片.";
    $keywords = "呢喃fm,音乐电台,网络电台,小清新文字,小清新图片,呢喃有声电台";
	}
} elseif (is_single()){
    if ($post->post_excerpt) {
        $description     = $post->post_excerpt;
    } else {
        $description = wp_trim_words( $post->post_content, 80,'......' ); 
    }
	$keywords="呢喃fm";
	if(wp_get_post_tags($post->ID)){
		$tags = wp_get_post_tags($post->ID);
		foreach ($tags as $tag ) {
        $keywords = $tag->name.",".$keywords;
    }
	}else{
    $keywords = "呢喃fm,音乐电台,网络电台,小清新文字,小清新图片,呢喃有声电台";      
    }
    

} elseif(function_exists('is_tag')){
 if( is_tag() ) {
		$description =  "标签为“".trim(wp_title('',0))."”的文章 - 呢喃FM";
    	$keywords = "呢喃fm,音乐电台,网络电台,小清新文字,小清新图片,呢喃有声电台";
		$keywords = trim(wp_title('',0)).",".$keywords;
	}
}
/* if ( is_search() ) {$allsearch = &new WP_Query("s=$s&showposts=-1"); $key = wp_specialchars($s, 1); $count = $allsearch->post_count;
	$description = "搜索“".$key."”的结果 - 呢喃FM"; wp_reset_query();
    	$keywords = "呢喃fm,音乐电台,网络电台,小清新文字,小清新图片,呢喃有声电台";
} */
?>
	
	<meta name="description" content="<?=$description?>" />
	<meta name="keywords" content="<?=$keywords?>" />
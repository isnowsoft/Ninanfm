/*
Author: Dean
Update: 2014/11/06
Author URI: http://www.janezen.com/
*/
var addComment={moveForm:function(a,b,c,d){var e,f=this,g=f.I(a),h=f.I(c),i=f.I("cancel-comment-reply-link"),j=f.I("comment_parent"),k=f.I("comment_post_ID");if(g&&h&&i&&j){f.respondId=c,d=d||!1,f.I("wp-temp-form-div")||(e=document.createElement("div"),e.id="wp-temp-form-div",e.style.display="none",h.parentNode.insertBefore(e,h)),g.parentNode.insertBefore(h,g.nextSibling),k&&d&&(k.value=d),j.value=b,i.style.display="",i.onclick=function(){var a=addComment,b=a.I("wp-temp-form-div"),c=a.I(a.respondId);if(b&&c)return a.I("comment_parent").value="0",b.parentNode.insertBefore(c,b),b.parentNode.removeChild(b),this.style.display="none",this.onclick=null,!1};try{f.I("comment").focus()}catch(l){}return!1}},I:function(a){return document.getElementById(a)}};
//轮播
$(document).ready(function() {
 $(".imageRotation").each(function(){
 // 获取有关参数
 var imageRotation = this,  // 图片轮换容器
 imageBox = $(imageRotation).children(".imageBox")[0],  // 图片容器
 titleBox = $(imageRotation).children(".titleBox")[0],  // 标题容器
 titleArr = $(titleBox).children(),  // 所有标题（数组）
 icoBox = $(imageRotation).children(".icoBox")[0],  // 图标容器
 icoArr = $(icoBox).children(),  // 所有图标（数组）
 imageWidth = $(imageRotation).width(),  // 图片宽度
 imageNum = $(imageBox).children().size(),  // 图片数量
 imageReelWidth = imageWidth*imageNum,  // 图片容器宽度
 activeID = parseInt($($(icoBox).children(".active")[0]).attr("rel")),  // 当前图片ID
 nextID = 0,  // 下张图片ID
 setIntervalID,  // setInterval() 函数ID
 intervalTime = 4000,  // 间隔时间
 imageSpeed =500,  // 图片动画执行速度
 titleSpeed =250;  // 标题动画执行速度
 // 设置 图片容器 的宽度
 $(imageBox).css({'width' : imageReelWidth + "px"});
 // 图片轮换函数
 var rotate=function(clickID){
 if(clickID){ nextID = clickID; }
 else{ nextID=activeID<=4 ? activeID+1 : 1; }
 // 交换图标
 $(icoArr[activeID-1]).removeClass("active");
 $(icoArr[nextID-1]).addClass("active");
 // 交换标题
 $(titleArr[activeID-1]).animate(
 {bottom:"-40px"},
 titleSpeed,
 function(){
 $(titleArr[nextID-1]).animate({bottom:"0px"} , titleSpeed);
 }
 );
 // 交换图片
 $(imageBox).animate({left:"-"+(nextID-1)*imageWidth+"px"} , imageSpeed);
 // 交换IP
 activeID = nextID;
 }
 setIntervalID=setInterval(rotate,intervalTime);
 $(imageBox).hover(
 function(){ clearInterval(setIntervalID); },
 function(){ setIntervalID=setInterval(rotate,intervalTime); }
 ); 
 $(icoArr).click(function(){
 clearInterval(setIntervalID);
 var clickID = parseInt($(this).attr("rel"));
 rotate(clickID);
 setIntervalID=setInterval(rotate,intervalTime);
 });
 });
});
//选项卡
function setTab(name,cursel,n){
 for(i=1;i<=n;i++){
  var menu=document.getElementById("authorMenu"+i);
  var con=document.getElementById(name+"_"+i);
  menu.className=i==cursel?"hover":"";
  con.style.display=i==cursel?"block":"none";
 }
}
	    function checkDisplayName(){
			na=authorInfoMeta.displayName.value;
		  	if( na.length <1 || na.length >12)  
	  		{  	
	  			displayName.innerHTML='<font class="authorFormTipsFalse">长度是1~12个字符</font>';
	  		     
	  		}else{  
	  		    displayName.innerHTML='<font class="authorFormTipsTrue">输入正确</font>';
	  		   
	  		}  
	  	
	  }
//追加@评论
	function reply(authorId, commentId, commentBox) {
	        // 评论者名字
	        var author = document.getElementById(authorId).innerHTML;
	        // 拼接成 '@评论者名字' 链接
	        var insertStr = '<a href="#' + commentId + '">@' + author.replace(/\t|\n/g, "") + '</a> \n';
	 // 追加到评论输入框
	        appendReply(insertStr, commentBox);
	};
	function appendReply(insertStr, commentBox) {
	    // 如果指定的输入框存在, 将它设为目标区域
	    if(document.getElementById(commentBox) && document.getElementById(commentBox).type == 'textarea') {
	        field = document.getElementById(commentBox);
	    // 否则提示不能追加, 并退出操作
	    } else {
	        alert("The comment box does not exist!");
	        return false;
	    }
	  
	    // 如果一次评论中重复回复, 提示并退出操作
	    if (field.value.indexOf(insertStr) > -1) {	        alert("You've already appended this reply!");
	        return false;
	    }
	  
	    // 如果输入框内无内容 (忽略空格, 跳格和换行), 将输入框内容设置为需要追加的字符串
	    if (field.value.replace(/\s|\t|\n/g, "") == '') {
	        field.value = insertStr;
	    // 否则清除多余换行, 并将字符串追加到输入框中	    } else {
        field.value = field.value.replace(/[\n]*$/g, "") + '\n\n' + insertStr;
	    }
	  
	    // 聚焦评论输入框
	    field.focus();
	};
	  //验证邮箱
		
		function checkUserEmail(){
					apos=authorInfoMeta.userEmail.value.indexOf("@");
					dotpos=authorInfoMeta.userEmail.value.lastIndexOf(".");
					if (apos<1||dotpos-apos<2) 
					  {
					  	userEmail.innerHTML='<font class="authorFormTipsFalse">必须包含@和.符号</font>' ;
					  }
					else {
						userEmail.innerHTML='<font class="authorFormTipsTrue">输入正确</font>' ;
					}
		}
	   function checkUserUrl(){
			url=authorInfoMeta.userUrl.value;
			url=url.match(/^http:\/\/.+\..+/i);
		  	if( url == null)  
	  		{  	
	  			userUrl.innerHTML='<font class="authorFormTipsFalse">输入无效，必须包含http://</font>';
	  		     
	  		}else{  
	  		    userUrl.innerHTML='<font class="authorFormTipsTrue">输入正确</font>';
	  		   
	  		}  
	  	
	  }
	  function checkUserQq(){
			qq=authorInfoMeta.userQq.value;
			var flagQQ=false ;
			for(i=0;i < qq.length;i++)   
					{    
						if(qq.charAt(i)>='0' && qq.charAt(i)<='9')    
						{ 
							flagQQ=true;
						}   
					}   
					if(!flagQQ){
					userQq.innerHTML='<font class="authorFormTipsFalse">QQ必须是数字的</font>'; 
					 
					}else{
						
					userQq.innerHTML='<font class="authorFormTipsTrue">输入正确</font>';
					 
					}  
	  	
	  }
	  function checkUserWeibo(){
			weibo=authorInfoMeta.userWeibo.value;

		  	if( weibo.length <1)  
	  		{  	
	  			userWeibo.innerHTML='<font class="authorFormTipsFalse">如：weibo.com/abc，只需填写abc</font>';
	  		     
	  		}else{  
	  		    userWeibo.innerHTML='<font class="authorFormTipsTrue">输入正确</font>';
	  		   
	  		}  
	  	
	  }
	  //验证密码 
		function checkPassword(){    
			psd1=authorInfoPassword.password.value;  
			var flagZM=false ;
			var flagSZ=false ; 
			var flagQT=false ;
			if(psd1.length<6 || psd1.length>12){   
				password.innerHTML='<font class="authorFormTipsFalse">长度错误</font>';
			}else
				{   
				  for(i=0;i < psd1.length;i++)   
					{    
						if((psd1.charAt(i) >= 'A' && psd1.charAt(i)<='Z') || (psd1.charAt(i)>='a' && psd1.charAt(i)<='z')) 
						{   
							flagZM=true;
						}
						else if(psd1.charAt(i)>='0' && psd1.charAt(i)<='9')    
						{ 
							flagSZ=true;
						}else    
						{ 
							flagQT=true;
						}   
					}   
					if(!flagZM||!flagSZ||flagQT){
					password.innerHTML='<font class="authorFormTipsFalse">密码必须是字母数字的组合</font>'; 
					 
					}else{
						
					password.innerHTML='<font class="authorFormTipsTrue">输入正确</font>';
					 
					}  
				 
				}	
		}
		//验证确认密码 
		function checkPassword2(){ 
				if(authorInfoPassword.password.value!=authorInfoPassword.password2.value) { 
				     password2.innerHTML='<font class="authorFormTipsFalse">您两次输入的密码不一样</font>';
				} else { 
				     password2.innerHTML='<font class="authorFormTipsTrue">输入正确</font>';
				}
		}
		
//归档页展开
(function ($, window) {
$(function() {
		var $a = $('#archive'),
			$m = $('.al-mon', $a),
			$l = $('.al-post-list', $a),
			$l_f = $('.al-post-list:first', $a);
		$l.hide();
		$l_f.show();
		$m.css('cursor', 's-resize').on('click', function(){
			$(this).next().slideToggle(400);
		});
		var animate = function(index, status, s) {
			if (index > $l.length) {
				return;
			}
			if (status == 'up') {
				$l.eq(index).slideUp(s, function() {
					animate(index+1, status, (s-10<1)?0:s-10);
				});
			} else {
				$l.eq(index).slideDown(s, function() {
					animate(index+1, status, (s-10<1)?0:s-10);
				});
			}
		};
		$('#al-expand-collapse').on('click', function(e){
			e.preventDefault();
			if ( $(this).data('s') ) {
				$(this).data('s', '');
				animate(0, 'up', 100);
			} else {
				$(this).data('s', 1);
				animate(0, 'down', 100);
			}
		});
	});
})(jQuery, window);

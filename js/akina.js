

$(document).ready(function(){
	$(".artAuthor").hover(function(){
		$(".artAuthorAvatar img").css({
			"-webkit-transform": "rotate(360deg)",
			"animation":"rotation 3s linear infinite",
			"-moz-animation":"rotation 3s linear infinite",
			"-webkit-animation":"rotation 3s linear infinite",
			"-o-animation":"rotation 3s linear infinite",
		});
	},
		function(){
        $(".artAuthorAvatar img").css({
			"-webkit-transform": "none",
			"animation":"none",
			"-moz-animation":"none",
			"-webkit-animation":"none",
			"-o-animation":"none",
		});
    });
	
	
});
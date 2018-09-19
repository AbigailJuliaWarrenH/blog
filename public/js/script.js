$('.a-comment-edit').click(function(e) {
	e.preventDefault();
	const commentID = $(this).data('comment_id');
	// console.log(commentID); return;
	$.ajax({
		url: '/comments/'+commentID+'/get_content',
		success: function (data) {
			$('#modal-comment-edit [action="/comments/"]').attr('action',"/comments/"+commentID);
			$('#modal-comment-edit [name="content"]').val(data);
		}
	});
});

$('.a-post-edit').click(function(e) {
	e.preventDefault();
	const postID = $(this).data('post_id');
	// console.log(postID); return;
	$.ajax({
		url: '/posts/'+postID+'/get_content',
		success: function (post) {
			// console.log(post); return;
			$('#modal-post-edit [action="/posts/"]').attr('action',"/posts/"+postID);
			$('#modal-post-edit [name="content"]').val(post.content);
			$('#modal-post-edit [name="title"]').val(post.title);
			$('#modal-post-edit [name="category_id"]').val(post.category_id);
		}
	});
});
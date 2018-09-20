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

$("#input-upload-image").change(function() {
	$(this).parent().submit();
});

$("#form-upload-image").submit(function(e) {
	e.preventDefault();    
    const formData = new FormData(this);

    $.ajax({
        url: $(this).attr("action"),
        type: 'POST',
        data: formData,
        success: function (images) {
            for (let image of images) {
            	$('div#uploaded-images').prepend(`
            		<img src="${image}" style="width: 100%"><br>
            	`);
            }
        },
        cache: false,
        contentType: false,
        processData: false
    });
});

// $("div#upload-image").dropzone({ url: "/file/post" });
// var myDropzone = new Dropzone("div#upload-image", { url: "/file/post"});
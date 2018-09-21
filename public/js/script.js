$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

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

$(document).on('click','.a-post-like',function(e) {
	e.preventDefault();
	const postID = $(this).data('post-id');
	const userID = $(this).data('user-id');
	$.ajax({
		method: 'post',
		url: '/posts/like',
		data: { post_id: postID, user_id: userID },
		success: function(data) {
			// console.log(data);
			console.log('liked!');
		}
	});
	let count = $('#badge-post-like-count-'+postID);
	count.html( Number(count.html()) + 1 );
	$(this).html('unlike');
	$(this).removeClass('a-post-like');
	$(this).addClass('a-post-unlike');
});

$(document).on('click','.a-post-unlike',function(e) {
	e.preventDefault();
	const postID = $(this).data('post-id');
	const userID = $(this).data('user-id');
	$.ajax({
		method: 'post',
		url: '/posts/unlike',
		data: { post_id: postID, user_id: userID },
		success: function(data) {
			// console.log(data);
			console.log('unliked!');
		}
	});
	let count = $('#badge-post-like-count-'+postID);
	count.html( Number(count.html()) - 1 );
	$(this).html('like');
	$(this).removeClass('a-post-unlike');
	$(this).addClass('a-post-like');
});
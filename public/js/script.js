$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).on('click','.a-post-edit',function(e) {
	e.preventDefault();
	const postID = $(this).data('post_id');
	// console.log(postID); return;
	$.ajax({
		url: '/posts/'+postID+'/get_content',
		success: function (post) {
			// console.log(post); return;
			$('#modal-post-edit [action^="/posts/"]').attr('action',"/posts/"+postID);
			$('#modal-post-edit [name="content"]').val(post.content);
			$('#modal-post-edit [name="title"]').val(post.title);
			$('#modal-post-edit [name="category_id"]').val(post.category_id);
		}
	});
});

$(document).on('change',"#input-upload-image",function() {
	$(this).parent().submit();
});

$(document).on('submit',"#form-upload-image",function(e) {
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

$(document).on('submit','.form-comment-create',function(e) {
	e.preventDefault();
	const postID = $(this).data('post-id');
	const form = $(this);
	const textAreaInForm = $('textarea',this);
	const formData = form.serialize();
	// const formData = new FormData(this);

	$.post(form.attr('action'), formData, function(data) {
		$(`#post-${postID} .comments`).append(data);
		textAreaInForm.val('');
	});
});

$(document).on('click','.a-comment-delete',function(e) {
	e.preventDefault();
	const commentID = $(this).data('comment_id');
	$('#form-comment-delete-'+commentID).submit();
});

$(document).on('submit','.form-comment-delete',function(e) {
	e.preventDefault();
	const form = $(this);
	const formData = form.serialize();

	$.post(form.attr('action'), formData, function() {
		form.parentsUntil('body','.comment').remove();
	});
});

$(document).on('click','.a-comment-edit',function(e) {
	e.preventDefault();
	const commentID = $(this).data('comment_id');
	// console.log(commentID); return;
	$.ajax({
		url: '/comments/'+commentID+'/get_content',
		success: function (data) {
			$('#modal-comment-edit [action^="/comments/"]').attr('action',"/comments/"+commentID);
			$(`#modal-comment-edit [action="/comments/${commentID}"]`).data('comment_id',commentID);
			$('#modal-comment-edit [name="content"]').val(data);
		}
	});
});

$(document).on('submit','.form-comment-edit',function(e) {
	e.preventDefault();
	$('#modal-comment-edit').modal('hide');
	const form = $(this);
	const commentID = $(this).data('comment_id');
	const formData = form.serialize();
	const commentContent = $('textarea[name="content"]',this).val();

	$.post(form.attr('action'), formData, function() {
		// form.parentsUntil('body','.comment').remove();
		$(`#comment-${commentID} .comment-content`).html(commentContent.replace(/(?:\r\n|\r|\n)/g, '<br>'));
	});
});
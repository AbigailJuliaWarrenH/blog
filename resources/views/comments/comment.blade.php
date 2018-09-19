<li class="list-group-item comment">
	<div class="comment-header">
		{{ $comment->user->name }}
	</div>
	<div class="comment-body">
		{{ $comment->content }}
		<div>
			@if ($comment->user->id == Auth::id())
				<a class="a-comment-edit" data-comment_id="{{ $comment->id }}" data-toggle="modal" href="#modal-comment-edit">edit</a>
				<span>&middot;</span>
				<a href="#"
                    onclick="event.preventDefault();
                             document.getElementById('form-comment-delete-{{ $comment->id }}').submit();">
					delete
				</a>
                <form id="form-comment-delete-{{ $comment->id }}" action="/comments/{{ $comment->id }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    {{ method_field('DELETE')}}
                </form>
			@endif
		</div>
	</div>
</li>
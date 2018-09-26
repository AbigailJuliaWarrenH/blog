<li id="comment-{{ $comment->id }}" class="list-group-item comment">
	<div class="comment-header">
		{{ $comment->user->name }}
	</div>
	<div class="comment-body">
		<span class="comment-content">
			{!! nl2br($comment->content) !!}
		</span>
		<div>
			@if ($comment->user->id == Auth::id())
				<a href="#" data-toggle="modal" data-target="#modal-comment-edit" class="a-comment-edit" data-comment_id="{{ $comment->id }}">edit</a>
				<span>&middot;</span>
				<a href="#" class="a-comment-delete" data-comment_id="{{ $comment->id }}">
					delete
				</a>
                <form class="form-comment-delete" id="form-comment-delete-{{ $comment->id }}" action="/comments/{{ $comment->id }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    {{ method_field('DELETE')}}
                </form>
			@endif
		</div>
	</div>
</li> 
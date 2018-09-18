<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">
        {{ $post->title }}
    </h3>
    <small>by {{ $post->user->name }}</small>
    <small>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}</small>
    <div><i class="fas fa-tag"></i> {{ $post->category->name }}</div>
  </div>
  <div class="panel-body">
    {!! nl2br($post->content) !!}
  </div>
  <div class="panel-footer">
  	{{-- comments section --}}
  	@foreach ($post->comments as $comment)
  		<div class="well well-sm">
  			{{ $comment->content }}
  		</div>
  	@endforeach
	<div class="well well-sm">
	    <form action="/comments" method="POST" enctype="multipart/form-data">
	        {{csrf_field()}}
	        <input type="hidden" name="post_id" value="{{ $post->id }}">
	        <div class="form-group">
	          <label for="content">Add comment:</label>
	          <textarea required class="form-control" rows="2" id="create-comment-content" name="content"></textarea>
	        </div>
	        <button type="submit" class="btn btn-primary">Submit</button>
	    </form>
	</div>
  </div>
</div>
<div class="card mb-3">
  <div class="card-header">
    <h3 class="card-title">
        {{ $post->title }}
    </h3>
    <small>by {{ $post->user->name }}</small>
    <small>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($post->created_at))->diffForHumans() }}</small>
    <div><i class="fas fa-tag"></i> {{ $post->category->name }}</div>
  </div>
  <div class="card-body">
    <div class="post-content">
      {!! nl2br($post->content) !!}
    </div>
    @if ($post->user->id == Auth::id())
      <a class="a-post-edit" data-post_id="{{ $post->id }}" data-toggle="modal" href="#modal-post-edit">edit</a>
      <span>&middot;</span>
      <a href="#"
                  onclick="event.preventDefault();
                           document.getElementById('form-post-delete-{{ $post->id }}').submit();">
        delete
      </a>
              <form id="form-post-delete-{{ $post->id }}" action="/posts/{{ $post->id }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
                  {{ method_field('DELETE')}}
              </form>
    @endif
  </div>
  <div class="card-footer">
  	{{-- comments section --}}
    <ul class="list-group">
      @foreach ($post->comments as $comment)
        @include('comments.comment')
      @endforeach
    </ul>
    @include('comments.comment_edit_modal')
    @include('comments.comment_create')
  </div>
</div>
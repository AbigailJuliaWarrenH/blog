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
      {!! ($post->content) !!}
    </div>
    @if ($post->isLikedByAuthUser())
      <a href="#" class="a-post-unlike" data-post-id="{{ $post->id }}" data-user-id="{{ Auth::id() }}">unlike</a>
    @else
      <a href="#" class="a-post-like" data-post-id="{{ $post->id }}" data-user-id="{{ Auth::id() }}">like</a>
    @endif
    <span id="badge-post-like-count-{{ $post->id }}" class="badge badge-pill badge-primary">{{ $post->likes->count() }}</span>
    @if ($post->user->id == Auth::id())
    <span>&middot;</span>
      {{-- <a href="/posts/{{ $post->id }}/edit">edit</a> --}}
      {{-- <a class="a-post-edit" data-post_id="{{ $post->id }}" data-toggle="modal" href="#modal-post-edit">edit</a> --}}
      <a href="#" onclick="event.preventDefault(); document.getElementById('form-post-edit-{{ $post->id }}').submit();">
        edit
      </a>
      <form id="form-post-edit-{{ $post->id }}" action="/posts/{{ $post->id }}/edit" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
      <span>&middot;</span>
      <a href="#" onclick="event.preventDefault(); document.getElementById('form-post-delete-{{ $post->id }}').submit();">
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
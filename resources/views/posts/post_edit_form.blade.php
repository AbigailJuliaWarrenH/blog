@extends('template')

@section('content')
<div class="card mb-3">
  <div class="card-body">
    <form action="/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="form-group">
          <label for="title">Title:</label>
          <input required type="text" class="form-control" id="create-post-title" value="{{ $post->title }}" name="title">
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <select class="form-control" id="create-post-category" value="{{ $post->category->id }}" name="category_id">
                @foreach (\App\Category::all() as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
          <label for="content">Content:</label>
          <textarea required class="form-control" rows="5" id="create-post-content" name="content">{{ $post->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </div>
</div>
@endsection
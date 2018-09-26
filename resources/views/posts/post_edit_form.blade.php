@extends('template')

@section('content')
<div class="jumbotron text-white jumbotron-fluid">
  <div class="container">
    <h5 class="display-4">{{ Auth::user()->name }}, </h5>
     <p class="lead">edit your post here.</p>
  </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9" style="background-color: #49edb6">
           <br>
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
                              @if ($post->category->id == $category->id)
                                <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                              @else
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                              @endif
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
        </div>
        <div class="col-md-3" style="background-color: #28e3ed">
            <br>
            @include('images.right_sidebar')
        </div>
    </div>
</div>
@endsection
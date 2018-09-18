<div class="card">
  <div class="card-body">
    <h3>Create Post</h3>
    <form action="/posts" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
          <label for="title">Title:</label>
          <input required type="text" class="form-control" id="create-post-title" name="title">
        </div>
        <div class="form-group">
            <label for="category">Category:</label>
            <select class="form-control" id="create-post-category" name="category_id">
                @foreach (\App\Category::all() as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
          <label for="content">Content:</label>
          <textarea required class="form-control" rows="5" id="create-post-content" name="content"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Post</button>
    </form>
  </div>
</div>
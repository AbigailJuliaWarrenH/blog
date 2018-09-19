<div class="comment-create">
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
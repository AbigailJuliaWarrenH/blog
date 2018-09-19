<form action="/comments/" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    {{method_field('PATCH')}}
    <div class="form-group">
      {{-- <label for="edit-comment-content">Edit comment:</label> --}}
      <textarea required class="form-control" rows="2" id="edit-comment-content" name="content"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
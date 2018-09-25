<div>
<h4>Upload Images here:</h4>
</div> 
<div class="card mb-3">
  <div class="card-body">
    <h3>Upload Images</h3>
    {{-- <input type="file" name="file" multiple> --}}
    {{-- <div id="upload-image"></div> --}}
    <form id="form-upload-image" method="post" enctype="multipart/form-data" action="/images/upload">
      {{ csrf_field() }}
      <input id="input-upload-image" name="file[]" type="file" multiple />
      {{-- <button>Submit</button> --}}
    </form>
{{--     <form action="/images/upload" class="dropzone" style="min-height: 200px">
      {{ csrf_field() }}
      <div class="fallback">
        <input name="file" type="file" multiple />
      </div>
    </form> --}}
  </div>
</div>

<div class="card mb-3">
  <div class="card-body">
    <h3>Photos Uploaded</h3>
    <div id="uploaded-images" style="text-align: center;"></div>
  </div>
</div>

<div>
  <h4>then transfer images to your post.</h4>
</div>
<br>
<div>
  <img src="/images/macaroons1.jpg" id="rightimage">
</div>
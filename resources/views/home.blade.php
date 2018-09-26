@extends('template')

@section('content')

<div class="jumbotron text-white jumbotron-fluid">
  <div class="container">
    <h1 class="display-4" id="welcome">Welcome, {{ Auth::user()->name }}!</h1>
     <p class="lead">"For me, I don't expect to have a really amazing meal each time I dine out. Having a good meal with your loved ones - that's what makes the experience." -Wolfgang Puck</p>
  </div>
</div>

<div class="container-fluid maca px-0 py-0">
    <div class="container-fluid" id="blog-repeat">
       <h2 class="text-center mb-2 bake" id="bakeblogfont">Bake Blog Repeat</h2>
  </div>
</div>

{{-- <div class="container-fluid maca px-0 py-0">
    <div class="container-fluid" id="blog-repeat">
       <h2 class="text-right mb-2 bake text-white" id="bakeblogfont">Bake Blog Repeat</h2>
  </div>
</div> --}}


{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>

            </div>
        </div>
    </div>
</div> --}}
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9" style="background-color: #49edb6">
           <br>
            @include('posts.create_post')

            @foreach (Auth::user()->posts as $post)
                @include('posts.post')
            @endforeach
            {{-- @include('posts.post_edit_modal') --}}
        </div>
        <div class="col-md-3" style="background-color: #F5E5C2">
            <br>
            @include('images.right_sidebar')
        </div>
    </div>
</div>
@endsection

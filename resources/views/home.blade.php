@extends('template')

@section('content')

<div class="jumbotron text-white jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Welcome, {{ Auth::user()->name }}</h1>
     <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
  </div>
</div>


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
        <div class="col-md-9" style="background-color: lightgreen">
            left - My Posts
            @include('posts.create_post')

            @foreach (Auth::user()->posts as $post)
                @include('posts.post')
            @endforeach
            {{-- @include('posts.post_edit_modal') --}}
        </div>
        <div class="col-md-3" style="background-color: lightblue">
            right - My Images
            @include('images.right_sidebar')
        </div>
    </div>
</div>
@endsection

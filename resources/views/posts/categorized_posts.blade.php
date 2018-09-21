@extends('template')

@section('content')
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
<div class="jumbotron text-white jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Welcome, {{ Auth::user()->name }}</h1>
     <p class="lead">No matter what the recipe, any baker can do wonders in the kitchen with some good ingredients and an upbeat attitude!</p>
  </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-9" style="background-color: #49edb6">
            <br>
            @foreach ($posts as $post)
                @include('posts.post')
            @endforeach
        </div>
        <div class="col-md-3" style="background-color: #28e3ed">
           <br>
        </div>
    </div>
</div>
@endsection

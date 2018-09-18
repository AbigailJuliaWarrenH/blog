@extends('layouts.app')

@section('content')
<div class="container">
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
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-9" style="background-color: lightgreen">
            left
            @foreach ($posts as $post)
                @include('posts.post')
            @endforeach
        </div>
        <div class="col-md-3" style="background-color: lightblue">
            right
        </div>
    </div>
</div>
@endsection

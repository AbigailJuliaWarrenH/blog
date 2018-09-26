@extends('template')

@section('content')

<div class="jumbotron text-white jumbotron-fluid">
  <div class="container">
    <h1 class="display-4">Welcome, {{ Auth::user()->name }}!</h1>
     <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
  </div>
</div>

<div class="container-fluid macatop px-0 py-0">
    <div class="container-fluid" id="about-repeat">
       <h2 class="text-center mb-2 bake text-white">Our Community</h2>

       <p class="text-center mb-2 bake text-white" id="textabt">Patisserie
Patisserie is the style developed over the years baking in tiny kitchens all the way to a Michelin-Starred restaurant. It’s about taking risks in the kitchen and being confident that you can create the best results. No special equipment needed, no rare ingredients, just a daring approach to making something impressive for yourself or to share. And you don’t have to be a professional to do it.

BACKGROUND & BOLD BAKING JOURNEY
I was born in a small town in the South East of Ireland, and my passion for baking drove me to train as a professional chef before studying with legendary chef Darina Allen at the world-renowned Ballymaloe cookery school in County Cork.

After that I used my new skills as a passport to travel the globe and open doors into the culinary world. I've worked as a personal chef in Italy and on the slopes in Australia, but I was drawn to the United States and the possibilities it might hold. Working in bakeries and a Michelin-Starred restaurant in San Francisco, I gained more knowledge and drive to open my own catering business for top tech companies specializing in over-the-top breakfast creations.



</p>
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
{{-- <div class="container-fluid">
    <div class="row">
        <div class="col-md-9" style="background-color: #49edb6">
           <br>
            @include('posts.create_post')

            @foreach (Auth::user()->posts as $post)
                @include('posts.post')
            @endforeach --}}
            {{-- @include('posts.post_edit_modal')
        </div>
        <div class="col-md-3" style="background-color: #28e3ed">
            <br>
            @include('images.right_sidebar')
        </div>
    </div>
</div> --}}
@endsection
